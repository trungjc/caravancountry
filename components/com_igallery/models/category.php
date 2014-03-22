<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.modeladmin');

class igalleryModelcategory extends JModelAdmin
{

	static $categories = array();
	static $profiles = array();

	function __construct()
	{
		parent::__construct();
	}
	
	public function getForm($data = array(), $loadData = true)
	{
		return;
	}
	
	function getCategory($id)
	{
        if( !isset(self::$categories[$id]) )
		{
        	$db	= $this->getDbo();
			$query = $db->getQuery(true);

			$query->select('c.*');
			$query->from('#__igallery AS c');

			$query->select('u.name AS displayname, u.username');
			$query->join('LEFT', '`#__users` AS u ON c.user = u.id');

			$query->where('c.id = '.(int)$id);
			$query->where('c.published = 1');
			$query->where('c.moderate = 1');

			$nullDate = $db->Quote($db->getNullDate());
			$nowDate = $db->Quote(JFactory::getDate()->toSql());
			$query->where('(c.publish_up = ' . $nullDate . ' OR c.publish_up <= ' . $nowDate . ')');
			$query->where('(c.publish_down = ' . $nullDate . ' OR c.publish_down >= ' . $nowDate . ')');

			$db->setQuery($query);
			$category = $db->loadObject();

			self::$categories[$id] = $category;
		}
	    return self::$categories[$id];
    }
    
	function getProfile($id)
	{
        if( !isset(self::$profiles[$id]) )
		{
        	$db	= $this->getDbo();
			$query = 'SELECT * FROM #__igallery_profiles WHERE published = 1 AND id = '.(int)$id;
			$db->setQuery($query);
			$profile = $db->loadObject();

			if( ($profile->thumb_position == 'left' || $profile->thumb_position == 'right') && $profile->images_per_row == 0)
			{
				$profile->images_per_row = 1;
			}

			if( ($profile->lbox_thumb_position == 'left' || $profile->lbox_thumb_position == 'right') && $profile->lbox_images_per_row == 0)
			{
				$profile->lbox_images_per_row = 1;
			}

			if( JRequest::getInt('iglimit', 0) > 0)
			{
				$profile->thumb_pagination = 0;
			}

			$client = IG_J30 ? new JApplicationWebClient() : new JWebClient();
			$mobile = $client->mobile;
			if($mobile)
			{
				$profile->thumb_scrollbar = 1;
				$profile->lbox_thumb_scrollbar = 1;
			}

			self::$profiles[$id] = $profile;
		}
		
	    return self::$profiles[$id];
    }

	function getPagination($total, $limit)
	{
		jimport('joomla.html.pagination');
		$pagination = new JPagination($total, JRequest::getInt('limitstart', 0), $limit );
		return $pagination;
	}

	function getCategoryChildren($catId, $profile, $type, $source, $limit)
	{
        $db	= $this->getDbo();
		$user = JFactory::getUser();
		$query = $db->getQuery(true);

		$query->select('c.*');
		$query->from('#__igallery AS c');
		
		$query->select('p.menu_max_width, p.menu_max_height, p.img_quality, p.menu_access');
		$query->join('INNER', '`#__igallery_profiles` AS p ON p.id = c.profile');
		
		$query->select('u.name AS displayname, u.username');
		$query->join('LEFT', '`#__users` AS u ON c.user = u.id');
		
		$query->select('COUNT(i.id) AS numimages');

		
		$query->where('c.published = 1');
		$query->where('c.moderate = 1');

        switch($type)
        {
            case 'latest_menu_images' :
                $children = $this->getChildIds($catId);
                $query->where('FIND_IN_SET(c.id,"'.implode(',',$children).'")');
                $query->join('INNER', '#__igallery_img AS i ON (i.gallery_id = c.id AND i.published = 1 AND i.moderate = 1)' );
                $query->order('c.date DESC');
                break;
            case 'hits_menu_images' :
                $children = $this->getChildIds($catId);
                $query->where('FIND_IN_SET(c.id,"'.implode(',',$children).'")');
                $query->join('INNER', '#__igallery_img AS i ON (i.gallery_id = c.id AND i.published = 1 AND i.moderate = 1)' );
                $query->order('c.hits DESC');
                break;
            case 'random_menu_images' :
                $children = $this->getChildIds($catId);
                $query->where('FIND_IN_SET(c.id,"'.implode(',',$children).'")');
                $query->join('INNER', '#__igallery_img AS i ON (i.gallery_id = c.id AND i.published = 1 AND i.moderate = 1)' );
                $query->order('RAND()');
                break;
            default:
                $query->where('c.parent = '.(int)$catId);
                $query->join('LEFT', '#__igallery_img AS i ON (i.gallery_id = c.id AND i.published = 1 AND i.moderate = 1)' );
                $query->order('ordering');
                break;
        }

        $query->select('i2.filename AS selected_menu_filename, i2.rotation as selected_menu_rotation');
		$query->join('LEFT', '`#__igallery_img` AS i2 ON (i2.gallery_id = c.id AND i2.published = 1 AND i2.moderate = 1 AND i2.menu_image = 1)');

		$query->select('i3.filename AS first_menu_filename, i3.rotation as first_menu_rotation');
		$query->join('LEFT', '`#__igallery_img` AS i3 ON (i3.gallery_id = c.id AND i3.published = 1 AND i3.moderate = 1 AND i3.ordering = 1)');

		$groups	= implode(',', $user->getAuthorisedViewLevels() );
		$query->where('p.menu_access IN ('.$groups.')');
		
		$nullDate = $db->Quote($db->getNullDate());
		$nowDate = $db->Quote(JFactory::getDate()->toSql());
		$query->where('(c.publish_up = ' . $nullDate . ' OR c.publish_up <= ' . $nowDate . ')');
		$query->where('(c.publish_down = ' . $nullDate . ' OR c.publish_down >= ' . $nowDate . ')');
		
		$query->group('c.id');

        if($profile->menu_pagination == 1 && $source == 'component')
		{
			$categoryChildren = $this->_getList($query, JRequest::getInt('limitstart', 0), $profile->menu_pagination_amount );
		}
		else if( $limit > 0)
		{
            $categoryChildren = $this->_getList($query, 0 , $limit);
        }
        else
        {
            $categoryChildren = $this->_getList($query);
		}
		
		$this->menuTotal = $this->_getListCount($query);
		
		$categoryChildren = array_values($categoryChildren);

		for($i=0; $i<count($categoryChildren); $i++ )
		{
            if( $source != 'component' && (JRequest::getInt('igpid', 0) > 0) )
            {
                $profileId = JRequest::getInt('igpid', 0);
            }
			else if( empty($categoryChildren[$i]->parent) )
			{
				$profileId = $categoryChildren[$i]->profile;
			}
			else
			{
				$parentCat = $this->getCategory($categoryChildren[$i]->parent);
				$profileId = $parentCat->profile;
			}
			
			$profile = $this->getProfile($profileId);
			
			$categoryChildren[$i]->menu_max_width = $profile->menu_max_width;
			$categoryChildren[$i]->menu_max_height = $profile->menu_max_height;
			
			if( strlen($categoryChildren[$i]->menu_image_filename) > 1)
			{
				$menuPhoto = new stdClass();
				$menuPhoto->filename = $categoryChildren[$i]->menu_image_filename;
				$menuPhoto->rotation = 0;
			}
			elseif( strlen($categoryChildren[$i]->selected_menu_filename) > 1)
			{
				$menuPhoto = new stdClass();
				$menuPhoto->filename = $categoryChildren[$i]->selected_menu_filename;
				$menuPhoto->rotation = $categoryChildren[$i]->selected_menu_rotation;
			}
			elseif(strlen($categoryChildren[$i]->first_menu_filename) > 1)
			{
				$menuPhoto = new stdClass();
				$menuPhoto->filename = $categoryChildren[$i]->first_menu_filename;
				$menuPhoto->rotation = $categoryChildren[$i]->first_menu_rotation;
			}
				
			if( !empty($menuPhoto->filename) )
			{
				$categoryChildren[$i]->fileArray = igFileHelper::originalToResized($menuPhoto->filename,
	            $profile->menu_max_width, $profile->menu_max_height, $profile->img_quality, $profile->crop_menu,
	            $menuPhoto->rotation, $profile->round_menu, $profile->round_fill);
	        }
			
        }
		
		return $categoryChildren;
	}
	
	function addCategoryHit($catid)
	{
		$this->addTablePath(IG_ADMINISTRATOR_COMPONENT.'/tables');
		$row = $this->getTable('igallery');
		$row->load( (int)$catid );
		$row->hit();
	}
	
	function getImagesList($select, $profile, $catid, $tags, $where, $order, $child, $limit, $rated=false)
	{
        $db	= $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('i.*');
		$query->from('#__igallery_img AS i');
		
		$query->select('c.name');
		$query->join('INNER', '`#__igallery` AS c ON c.id = i.gallery_id');
		
		$query->select('p.thumb_pagination_amount, p.thumb_pagination');
		$query->join('INNER', '`#__igallery_profiles` AS p ON p.id = c.profile');
		
		$query->select('u.name AS displayname, u.username');
		$query->join('LEFT', '`#__users` AS u ON i.user = u.id');
		
		if($profile->allow_rating == 2 || $profile->lbox_allow_rating == 2)
		{
			$join = $rated == true ? 'INNER' : 'LEFT';
			$query->select('ROUND( SUM(r.rating)/COUNT(r.rating), 1) AS rating_average, COUNT(r.rating) as rating_count');
			$query->join($join, '`#__igallery_ratings` AS r ON i.id = r.image_id AND r.published = 1');
			$query->group('i.id');
		}
		
		if(!empty($where))
		{
			$query->where($where);
		}

		if($child && JRequest::getInt('searchAll', 0) == 1)
		{
			$children = $this->getAllIds();
			$query->where('FIND_IN_SET(i.gallery_id,"'.implode(',',$children).'")');
		}
		else if($child)
		{
			$children = $this->getChildIds($catid);
			$children[] = (int)$catid;
			$query->where('FIND_IN_SET(i.gallery_id,"'.implode(',',$children).'")');
		}
		else
		{
			$query->where('i.gallery_id = '.(int)$catid);
		}
		
		if(!empty($tags))
		{
			$tagsArray = explode(',', $tags);
			$tagsLikeSql = array();
			
			foreach($tagsArray as $key => $value)
			{
			   $tagsLikeSql[] = 'i.tags LIKE '.$db->Quote( '%'.$db->escape( trim($value), true ).'%', false );
			}
			$tagClauses = implode( ' OR ', $tagsLikeSql );
			$query->where($tagClauses);
		}
		
		$query->where('i.published = 1');
		$query->where('i.moderate = 1');
		
		$nullDate = $db->Quote($db->getNullDate());
		$nowDate = $db->Quote(JFactory::getDate()->toSql());
		$query->where('(i.publish_up = ' . $nullDate . ' OR i.publish_up <= ' . $nowDate . ')');
		$query->where('(i.publish_down = ' . $nullDate . ' OR i.publish_down >= ' . $nowDate . ')');
		
		$user	= JFactory::getUser();
		$groups	= implode(',', $user->getAuthorisedViewLevels() );
		$query->where('i.access IN ('.$groups.')');
		
		$query->order($order);
		
		if($profile->thumb_pagination == 1)
		{
			$photoList = $this->_getList($query, JRequest::getInt('limitstart', 0), (int)$profile->thumb_pagination_amount);
		}
		else
		{
			if(!empty($limit))
			{
				$photoList = $this->_getList($query, 0 , $limit);
			}
			else
			{
				$photoList = $this->_getList($query);
			}
		}
		
		$this->thumbTotal = $this->_getListCount($query);

		return $photoList;
	}

	function getCategoryImagesList($profile, $catid, $tags, $child, $limit)
	{
		$this->addCategoryHit($catid);
		
		$select = 'i.*';
		$where = '';
		if(empty($tags))
		{
			$where = 'i.gallery_id = '.(int)$catid;
		}

        switch ($profile->image_ordering)
        {
            case 'new_first':
                $order = 'i.date DESC';
                break;
            case 'new_last':
                $order = 'i.date ASC';
                break;
            default:
                $order = 'i.ordering';
        }

		$photoList = $this->getImagesList($select, $profile, $catid, $tags, $where, $order, $child, $limit);
		
		return $photoList;
	}

	function getRandomList($profile, $catid, $tags, $child, $limit)
	{
		$select = 'DISTINCT i.*';
		$where = null;
		$order = 'RAND()';
		$photoList = $this->getImagesList($select, $profile, $catid, $tags, $where, $order, $child, $limit);
		
		return $photoList;
	}

	function getLatestList($profile, $catid, $tags, $child, $limit)
	{
		$select = 'i.*';
		$where = null;
		$order = 'date DESC';
		$photoList = $this->getImagesList($select, $profile, $catid, $tags, $where, $order, $child, $limit);
		
		return $photoList;
	}
	
	function getHitsList($profile, $catid, $tags, $child, $limit)
	{
		$select = 'i.*';
		$where = null;
		$order = 'hits DESC';
		$photoList = $this->getImagesList($select, $profile, $catid, $tags, $where, $order, $child, $limit);
		
		return $photoList;
	}
	
	function getRatedList($profile, $catid, $tags, $child, $limit)
	{
		$select = 'i.*';
		$where = null;
		$order = 'rating_average DESC, rating_count DESC';
		$photoList = $this->getImagesList($select, $profile, $catid, $tags, $where, $order, $child, $limit, true);
		
		return $photoList;
	}
	
	function getChildIds($parentId)
	{
		$categories = igStaticHelper::getCategories();
        $childIds = igTreeHelper::getChildIds($categories, $parentId);

        return $childIds;
    }

    function getAllIds()
	{
		$ids = array();

		$db	= JFactory::getDBO();
		$query = 'SELECT id FROM #__igallery WHERE published = 1';
		$db->setQuery($query);
		$categories = $db->loadObjectList();

		foreach($categories as $category)
		{
			$ids[] = $category->id;
		}

        return $ids;
    }
    
	public function getTable($type = 'igallery', $prefix = 'Table', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

}

class igModelcategory extends igalleryModelcategory{};