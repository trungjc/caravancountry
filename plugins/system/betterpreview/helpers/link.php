<?php
/**
 * Plugin Link Helper File
 *
 * @package         Better Preview
 * @version         3.2.1
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2014 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

require_once JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php';
require_once JPATH_ADMINISTRATOR . '/components/com_menus/models/menutypes.php';

/**
 * Plugin that cleans cache
 */
class helperBetterPreviewLink extends plgSystemBetterPreviewHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
		$this->db = JFactory::getDBO();
		$this->q = $this->db->getQuery(true);

		$model = new MenusModelMenutypes;
		$model->getTypeOptions();
		$this->types = $model->getReverseLookup();
	}

	function convertLinks()
	{
		$links = $this->getLinks();

		$html = JResponse::getBody();

		if ($html == '')
		{
			return;
		}

		$hashome = 0;

		if (!empty($links))
		{
			foreach ($links as $link)
			{
				$urls[$link->url] = $link->url;
				if ($link->published && $link->url == '')
				{
					$hashome = 1;
				}
			}

			$urls = $this->getUrlsFromCache($urls);
			$roots = array(JURI::root(), JURI::root(0), JURI::root(0) . '/', '/');

			foreach ($links as $i => $link)
			{
				$links[$i]->nonsef = $this->createURL($link->url);
				$url = isset($urls[$link->url]) ? $urls[$link->url] : $link->url;
				$links[$i]->url = $this->createURL($url);
				if ($link->published && in_array($url, $roots))
				{
					$hashome = 1;
					$links[$i]->name = '<span class="icon-home"></span> ' . $link->name;
				}
			}
		}

		if (!$hashome)
		{
			$links[] = (object) array(
				'url' => JURI::root(),
				'type' => '',
				'name' => 'Home',
				'published' => 1
			);
		}

		if (version_compare(JVERSION, '3.2', 'l'))
		{
			$title_class = 'betterpreview-dropdown';
		}
		else
		{
			$title_class = 'betterpreview-dropdown pull-right visible-desktop visible-tablet';
		}

		if (count($links) < 2)
		{
			if ($this->params->display_title_link)
			{
				$title_link = '<div class="' . $title_class . '">'
					. '<a class="brand" href="' . JURI::root() . '" target="_blank">'
					. '\2'
					. '</a>'
					. '</div>';
			}

			if ($this->params->display_status_link)
			{
				$status_link = '<div class="betterpreview-dropdown">'
					. '<a href="' . JURI::root() . '" target="_blank">'
					. '\2'
					. '</a>'
					. '</div>';
			}
		}
		else
		{
			$mainurl = 0;
			$main = 0;
			$list_title = array();
			$list_status = array();

			foreach ($links as $link)
			{
				if ($link->published)
				{
					if (!$mainurl)
					{
						$mainurl = $link->url;
						$main = 1;
					}
					else
					{
						$main = 0;
					}
				}

				$item = array();

				$item[] = '<li>';

				if ($link->published)
				{
					$item[] = '<a href="' . $link->url . '" target="_blank" class="list-item"><span class="wrapper">';
				}
				else if (isset($link->error))
				{
					$item[] = '<span class="disabled list-item hasTooltip" data-placement="right" title="' . str_replace('"', '&quot;', $link->error) . '">';
				}
				else
				{
					$item[] = '<span class="disabled list-item">';
				}

				$item[] = '<table><tr>';

				$item[] = '<td>';
				if (!$link->published)
				{
					$item[] = '<span class="icon-not-ok"></span> ';
				}
				else if ($link->type)
				{
					$item[] = '<span class="icon-url"></span> ';
				}
				else
				{
					$item[] = '<span class="icon-home"></span> ';
				}

				$item[] = '<span class="nn_status_item_text">' . $link->name . '</span>';
				$item[] = '</td>';


				$item[] = '</tr></table>';

				if ($link->published)
				{
					$item[] = '</span></a>';
				}
				else
				{
					$item[] = '</span>';
				}

				$item[] = '</li>';

				$list_title[] = implode('', $item);
				$list_status[] = implode('', $item);
			}

			if (!$mainurl)
			{
				// should really never happen
				$mainurl = JURI::root();
			}

			if ($this->params->display_title_link)
			{
				$title_link = '<div class="' . $title_class . '">'
					. '<a class="dropdown-toggle \1" href="' . $mainurl . '" target="_blank">'
					. '\2'
					. '<span class="icon-arrow-down-3"></span>'
					. '</a>'
					. '<ul class="dropdown-menu">'
					. implode('<li class="divider"></li>', $list_title)
					. '</ul>'
					. '</div>';
			}

			if ($this->params->display_status_link)
			{
				if ($this->params->reverse_status_link)
				{
					$list_status = array_reverse($list_status);
				}

				$status_link = '<div class="betterpreview-dropdown">'
					. '<a class="dropdown-toggle" href="' . $mainurl . '" target="_blank">'
					. '\2'
					. '<span class="icon-arrow-up-3"></span>'
					. '</a>'
					. '<ul class="dropdown-menu dropup-menu">'
					. implode('<li class="divider"></li>', $list_status)
					. '</ul>'
					. '</div>';
			}
		}

		if ($this->params->display_title_link)
		{
			if (version_compare(JVERSION, '3.2', 'l'))
			{
				$regex = '<a class="(brand)" [^>]*>(.*?)</a>';
			}
			else
			{
				$regex = '<a class="(brand visible-desktop visible-tablet)" [^>]*>(.*?)</a>';
			}
			$html = preg_replace(
				'#' . $regex . '#s',
				$title_link,
				$html
			);
		}

		if ($this->params->display_status_link)
		{
			if (version_compare(JVERSION, '3.2', 'l'))
			{
				$regex = '(<div class="btn-group viewsite">\s*)<a\s[^>]*>(.*?)</a>(.*?</div>)';
			}
			else
			{
				$regex = '(<div class="btn-group">)<a [^>]*>(<i class="icon-share-alt"></i>.*?)</a>(</div>)';
			}

			$html = preg_replace(
				'#' . $regex . '#s',
				'\1' . $status_link . '\3',
				$html
			);
		}

		JResponse::setBody($html);
	}

	/**
	 * Default method for getting the links for a component view
	 * Based on searching for matching menu item links
	 *
	 * @return array
	 */
	function getLinks()
	{
		$links = array();

		$uri = JURI::getInstance();
		$url = $uri->toString(array('query'));

		// find menu item based on current admin url
		if ($url)
		{
			$url = 'index.php' . $url;
			$com_url = preg_replace('#&.*#', '', $url);

			// get all urls matching
			$this->q->clear()
				->select('a.id as id')
				->select('a.link as url')
				->from('#__menu as a')
				->where(
					'('
					. 'a.link = ' . $this->db->quote($com_url)
					. ' OR a.link LIKE ' . $this->db->quote($com_url . '&%')
					. ')'
				)
				->where('a.client_id = 0')
				->where('a.published = 1');
			if (JFactory::getApplication()->input->get('id'))
			{
				$this->q->where(
					'('
					. 'a.link LIKE ' . $this->db->quote('%&id=' . JFactory::getApplication()->input->get('id'))
					. ' OR a.link NOT LIKE ' . $this->db->quote('%&id=%')
					. ')'
				);
			}
			$this->db->setQuery($this->q);
			$items = $this->db->loadAssocList('id', 'url');

			if (empty($items))
			{
				return $items;
			}

			// search for exact url match
			$id = array_search($url, $items);

			// search for url match without layout edit/form
			if (!$id && ((!strpos($url, '&layout=edit') === false) || (!strpos($url, '&layout=form') === false)))
			{
				$url = preg_replace('#&layout=(?:edit|form)(&|$)#', '\1', $url);
				$id = array_search($url, $items);
			}

			// search for url match drilling down to first url parameter
			while (!$id)
			{
				$url = preg_replace('#^(.*)&.*$#', '\1', $url);

				// search for exact url match with last url parameter stripped off
				$id = array_search($url, $items);

				// search for url starting with url with last url parameter stripped off
				// (disregarding urls with specific ids)
				foreach ($items as $itemid => $itemurl)
				{
					if (strpos($itemurl, $url) === 0 && strpos($itemurl, '&id=') === false)
					{
						$id = $itemid;
						break;
					}
				}
				if (strpos($url, '&') === false)
				{
					break;
				}
			}

			if ($id)
			{
				$this->q->clear()
					->select('a.id')
					->select('a.title as name')
					->select('a.link as url')
					->select('a.published as published')
					->select('a.language as language')
					->select('a.parent_id as parent')
					->from('#__menu as a')
					->where('a.id = ' . $id);
				$this->db->setQuery($this->q);
				$item = $this->db->loadObject();
				$item->type = '';

				$parents = $this->getParents(
					$item,
					'menu',
					array('name' => 'title', 'parent' => 'parent_id', 'url' => 'link'),
					array(),
					1
				);

				$links = array_merge(array($item), $parents);

				foreach ($links as $i => $link)
				{
					if ($link->language)
					{
						if (strpos($link->url, '&lang=') == false && strpos($link->url, '?lang=') == false)
						{
							$links[$i]->url .= '&lang=' . $link->language;
						}
					}
					if ($link->published)
					{
						if (strpos($link->url, '&Itemid=') == false && strpos($link->url, '?Itemid=') == false)
						{
							$links[$i]->url .= '&Itemid=' . $link->id;
						}
					}
					if (preg_match('#option=([a-z0-9_]+)#', $link->url, $type))
					{
						$links[$i]->type = JText::_($type['1']);
					}
				}
			}
		}

		return $links;
	}

	function getItem($id = 0, $table, $selects = array(), $texts = array())
	{
		list($selects, $names) = $this->getSelects($selects);
		$texts = $this->getTexts($texts, $names);

		$this->q->clear()
			->from('#__' . $table . ' as a')
			->where('a.' . $names['id'] . ' = ' . (int) $id);
		foreach ($selects as $select)
		{
			$this->q->select($select);
		}
		$this->db->setQuery($this->q);
		$item = $this->db->loadObject();
		$itemfound = 1;

		if (!$item)
		{
			$itemfound = 0;
			$item = new stdClass;
			foreach ($selects as $k => $v)
			{
				$item->{$k} = '';
			}
		}

		foreach ($texts as $k => $v)
		{
			$item->{$k} = JText::_($v);
		}

		if ($itemfound && !$item->published)
		{
			$item->error = JText::_('BP_MESSAGE_ITEM_UNPUBLISHED');
		}

		return $item;
	}

	function getParents(&$item, $table, $selects = array(), $texts = array(), $root = 0)
	{
		if (!isset($item->parent))
		{
			return array();
		}

		list($selects, $names) = $this->getSelects($selects);
		$texts = $this->getTexts($texts, $names);

		$id = $item->parent;
		$parents = array();
		while ($id > $root)
		{
			$this->q->clear()
				->from('#__' . $table . ' as a')
				->where('a.' . $names['id'] . ' = ' . (int) $id);
			foreach ($selects as $select)
			{
				$this->q->select($select);
			}

			$this->db->setQuery($this->q);
			$parent = $this->db->loadObject();
			if ($parent)
			{
				$parents[] = $parent;
				$id = $parent->parent;
			}
			else
			{
				break;
			}
		}

		$parents = array_reverse($parents);
		$unpublished = 0;
		foreach ($parents as &$parent)
		{
			foreach ($texts as $k => $v)
			{
				$parent->{$k} = JText::_($v);
			}
			if (!$parent->published)
			{
				$unpublished = 1;
				$parent->error = JText::_('BP_MESSAGE_ITEM_UNPUBLISHED');
			}
			else if ($unpublished)
			{
				$parent->published = 0;
				$parent->error = JText::_('BP_MESSAGE_PARENT_UNPUBLISHED');
			}
		}
		$parents = array_reverse($parents);

		if ($unpublished)
		{
			$item->published = 0;
			$item->error = JText::_('BP_MESSAGE_PARENT_UNPUBLISHED');
		}

		return $parents;
	}

	function getSelects($selects)
	{
		$names = array_merge(
			array(
				'id' => 'id',
				'name' => 'name',
				'published' => 'published',
				'parent' => 'parent',
			), $selects
		);
		$selects = array();
		foreach ($names as $k => $v)
		{
			$selects[$k] = 'a.' . $v . ' as ' . $k;
		}

		return array($selects, $names);
	}

	function getType($item)
	{
		$key = MenusHelper::getLinkKey($item->url);
		if (isset($this->types[$key]))
		{
			$item->type = JText::_($this->types[$key]);
		}

		return $item->type;
	}

	function getTexts($texts, $names)
	{
		$text_defaults = array(
			'url' => '',
			'type' => ''
		);
		foreach ($text_defaults as $k => $v)
		{
			if (isset($names[$k]))
			{
				unset($text_defaults[$k]);
			}
		}

		return array_merge($text_defaults, $texts);
	}

	function getItemId($url)
	{
		$this->q->clear()
			->select('a.id')
			->from('#__menu as a')
			->where('a.link = ' . $this->db->quote($url))
			->where('a.client_id = 0')
			->where('a.published = 1');
		$this->db->setQuery($this->q);

		return $this->db->loadResult();
	}

	function getMenuUrlById($id)
	{
		$this->q->clear()
			->select('a.link')
			->from('#__menu as a')
			->where('a.id = ' . (int) $id);
		$this->db->setQuery($this->q);

		return $this->db->loadResult();
	}

	function getUrlsFromCache($nonsefs)
	{
		if (empty($nonsefs))
		{
			return array();
		}

		$urls = $nonsefs;

		$sefs = $this->getUrlsFromDB($urls);

		// merge sef urls into url list
		$urls = array_merge($urls, $sefs);

		// remaining not-found urls
		$nonsefs = array_diff($urls, $sefs);

		if (empty($nonsefs))
		{
			return $urls;
		}

		$this->saveUrlsToDB($nonsefs);
		$sefs = $this->getUrlsFromDB($nonsefs);

		// merge sef urls into url list
		$urls = array_merge($urls, $sefs);

		return $urls;
	}

	function getUrlsFromDB($urls)
	{
		$date = JFactory::getDate('now - ' . $this->params->index_timeout . ' hours');
		$this->q->clear()
			->select('a.url')
			->select('a.sef')
			->from('#__betterpreview_sefs as a')
			->where('a.url IN (\'' . implode('\',\'', $urls) . '\')')
			->where('a.created > ' . $this->db->quote($date->toSql()));
		$this->db->setQuery($this->q);
		$sef = $this->db->loadAssocList('url', 'sef');

		return $sef ? $sef : array();
	}

	function saveUrlsToDB($urls)
	{
		// remove any records of these urls
		$this->q->clear()
			->delete('#__betterpreview_sefs')
			->where($this->db->quoteName('url') . ' IN (\'' . implode('\',\'', $urls) . '\')');
		$this->db->setQuery($this->q);
		$this->db->execute();

		// add empty url records that will be picked up in the generatesefs page
		$this->q->clear()
			->insert('#__betterpreview_sefs')
			->columns($this->db->quoteName('url'));
		foreach ($urls as $url)
		{
			$this->q->values($this->db->quote($url));
		}

		$this->db->setQuery($this->q);
		$this->db->execute();

		// get session id
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select($db->quoteName('session_id'))
			->from($db->quoteName('#__session'))
			->where($db->quoteName('userid') . ' = ' . $db->quote(JFactory::getUser()->id))
			->where($db->quoteName('client_id') . ' = 1')
			->order($db->quoteName('time') . ' DESC');
		$db->setQuery($query);
		$session = (string) $db->loadResult();

		// update db
		require_once JPATH_PLUGINS . '/system/nnframework/helpers/functions.php';
		$func = new NNFrameworkFunctions;
		$ret = $func->getContents(JRoute::_(JURI::root() . 'index.php?tmpl=component&bp_generatesefs=1&session=' . $session), 1);
	}

	function createURL($url)
	{
		$root = JURI::root(0);
		if (substr($url, 0, strlen($root)) == $root)
		{
			$url = substr($url, strlen($root));
		}
		if (substr($url, 0, 1) == '/')
		{
			$url = substr($url, 1);
		}
		return JURI::root() . $url;
	}
}
