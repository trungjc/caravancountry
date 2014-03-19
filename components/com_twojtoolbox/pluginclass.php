<?php 
/**
* @package     	2JToolBox
* @author       2JoomlaNet http://www.2joomla.net
* @�opyright   	Copyright (c) 2008-2012 2Joomla.net All rights reserved
* @license      released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version      $Revision: 1.0.2 $
**/
include_once( JPATH_ADMINISTRATOR.'/components/com_twojtoolbox/twojclass.php' );
JLoader::register('TwojToolboxHelper', JPATH_ADMINISTRATOR.'/components/com_twojtoolbox/helpers/twojtoolbox.php');

defined('_JEXEC') or die;
class TwoJToolBoxPlugin extends JObject{

	protected $params;
	protected $globalparams;
	protected $id;
	protected $item;
	protected $type;
	protected $plugin_path;
	protected $plugin_url;
	protected $version_plugin;
	protected $js_list;
	protected $css_list;
	protected $gen_option;
	protected $render_content;
	protected $def_params;
	protected $delete_color_char = 0;
	
	// add 20.12.2011
	protected $content_plugin = 0;
	protected $multitag = 0;
	
	// add 19.02.2012
	protected static $modules = array();
	protected static $mods = array();
	
	// add 22.05.2012
	public  	$javascript_code = '';
	
	public $page_array=array();
	public $parent_article_id = 0;
	public $error_text;
	
	public function __construct( $plugin_info ){
		$this->error_text = '';
		$this->gen_option = array();
		$this->item = new JObject();
		$this->item->id = $plugin_info->item_id;
		$this->item->title = $plugin_info->item_title;
		$this->item->state = $plugin_info->state;
		$this->id = $this->item->id;
		$this->type = $plugin_info->type;
		
		if( $this->content_plugin ) $this->includeContentLib();
		
		$params = new JRegistry;
		$params->loadString($plugin_info->params);
		$this->params = $params;
		$this->version_plugin = $plugin_info->v_active;
		$this->globalparams = JComponentHelper::getParams('com_twojtoolbox');
		$this->plugin_path =  JPATH_SITE.'/components/com_twojtoolbox/plugins/'.$this->type.'/'.$this->version_plugin.'/';
		$this->plugin_url = JURI::root().'components/com_twojtoolbox/plugins/'.$this->type.'/'.$this->version_plugin.'/';
		$this->includeLib();
		
		$app = JFactory::getApplication();
		
		$this->def_params = $app->getUserState('com_twojtoolbox.plugin.workdata.'.$this->type.'.def_params', '');
		if( $this->def_params=='' ){
			$this->def_params = new JRegistry;
			$xml_option = $this->plugin_path.'item_options.xml';
			if( JFile::exists( $xml_option ) ){
				$xml =JFactory::getXML($xml_option);
				if(isset($xml->fields) && isset($xml->fields->fieldset) && count($xml->fields->fieldset))
						foreach ($xml->fields->fieldset as $fieldset)
							if( count($xml->fields->fieldset) )
							foreach ($fieldset as $field) $this->def_params->def( (string) $field['name'], (string) $field['default'] );
			} 
			$app->setUserState('com_twojtoolbox.plugin.workdata.'.$this->type.'.def_params', $this->def_params);
		}
		$document = JFactory::getDocument();
		$format =  $document->getType('raw');
		$tmpl =JRequest::getCmd('tmpl', '');
		$print =JRequest::getCmd('print', 0);
		$this->render_content = $app->isAdmin() || $print || $tmpl=='component' || $format!='html' ;
		// || JDEBUG
	}
	
	
	
	public function addGenOption($str){
		$this->gen_option[] = $str;
	}
	
	public function loadDemo(){
		$obj_array = array();

		$obj_temp = new JObject;
		$obj_temp->id = 1;
		$obj_temp->title = 'Image 1';
		$obj_temp->catid = 1;
		$obj_temp->img = 'components/com_twojtoolbox/demo_content/image1.jpg';
		$obj_temp->desc = 'Desc demo text';
		$obj_temp->language = '*';
		$obj_temp->ordering = 1;
		$obj_temp->state = 1;
		$obj_temp->link = '';
		$obj_temp->link_blank = 0;
		$obj_array[] = clone  $obj_temp;
		$obj_temp->img = 'components/com_twojtoolbox/demo_content/image2.jpg';
		$obj_temp->title = 'Image 2';
		$obj_array[] = clone  $obj_temp;
		$obj_temp->img = 'components/com_twojtoolbox/demo_content/image3.jpg';
		$obj_temp->title = 'Image 3';
		$obj_array[] = clone  $obj_temp;
		
		return $obj_array;
	}
	
	
	public function getMultiElement(){
		//$return_html = '';
		if( is_array($this->page_array) && count($this->page_array) ){
			$this->multitag = 1;
			//for($i=0;$i<count($this->page_array);$i++){
			//	$page = $this->page_array[$i];
			//	$return_html .= 'Title('.$i.'):['.$page->title.'] <br />'."\n";
			//	$return_html .= '======page_content_'.$i.'_start========<br />'."\n".$page->conten.'<br />'."\n".'======page_content_'.$i.'_end========<br />'."\n";
			//}
			//return 	$return_html;
			return 	$this->getElement();
		}	
		return JText::_('COM_TWOJTOOLBOX_ERROR_PARSINGTAG');
	}
	
	public function getuniqueid(){
		//$app = JFactory::getApplication();
		$uniqueid  = JRequest::getInt('com_twojtoolbox.plugin.workdata.'.$this->type.'.unique_id', 0 );
		$uniqueid = ++ $uniqueid;
		JRequest::setVar('com_twojtoolbox.plugin.workdata.'.$this->type.'.unique_id', $uniqueid);
		return $uniqueid;
	}
	
	
	public function includeLib(){
		$app = JFactory::getApplication();
		
		if( is_array($this->js_list)){
			$all_files = JRequest::getVar('com_twojtoolbox_filelist_js', array(), '', 'array');
			for($i=0;$i<count($this->js_list);++$i){
				$all_files[] = $this->type.'*'.$this->version_plugin.'*js*2j.'.$this->js_list[$i];
			}
			JRequest::setVar('com_twojtoolbox_filelist_js', $all_files);
		}
		if( is_array($this->js_list)){
			$all_files = JRequest::getVar('com_twojtoolbox_filelist_css', array(), '', 'array');
			for($i=0;$i<count($this->css_list);++$i){
				$all_files[] = $this->type.'*'.$this->version_plugin.'*css*2j.'.$this->css_list[$i];
			}
			JRequest::setVar('com_twojtoolbox_filelist_css', $all_files);
		}
	}
	
	public function includeContentLib(){
		jimport('joomla.application.component.model');
		require_once JPATH_SITE.'/components/com_content/router.php';
		require_once JPATH_SITE.'/components/com_content/helpers/route.php';

		if(TJTB_JVERSION==3){
			JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_content/models', 'ContentModel');
			JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_twojtoolbox/models', 'TwojToolBoxModel');
		} else {
			JModel::addIncludePath(JPATH_SITE.'/components/com_content/models', 'ContentModel');
			JModel::addIncludePath(JPATH_SITE.'/components/com_twojtoolbox/models', 'TwojToolBoxModel');
		}
		
		$lang = JFactory::getLanguage();
		$extension = 'com_content';
		$base_dir = JPATH_SITE;
		$lang->load($extension, $base_dir, null, true);
	}
	
	public function getUrlResize( $pref = '', $parArray = array() ){
		
		$width = 			$this->params->get( $pref.'width' , 			$this->def_params->get($pref.'width', 220) );
		$height = 			$this->params->get( $pref.'height' , 			$this->def_params->get($pref.'height', 170) );
		$type_resizing =	$this->params->get( $pref.'type_resizing' , 	$this->def_params->get($pref.'type_resizing', 0) );
		$resize_position = 	$this->params->get( $pref.'resize_position' , 	$this->def_params->get($pref.'resize_position', 0));
		$color = 			$this->params->get( $pref.'color' , 			$this->def_params->get($pref.'color', 'transparent') );
		$color = str_replace('#', '', $color);
		
		$typeimg = $this->params->get('typeimg', 0);
		if(!$typeimg) $typeimg = $this->globalparams->get('typeimg', 'png');
		
		$twojcache = $this->params->get('twojcache', 2);
		if($twojcache==2) $twojcache = $this->globalparams->get('twojcache', '1');
		
		return 	JURI::root().
			'index.php?option=com_twojtoolbox&task=ajax.twojtoolbox_image_resize&format=raw'.
			'&ems_cache='.$twojcache.
			'&ems_type_img='.$typeimg.
			'&ems_bg='.$color.
			'&ems_max_width='.$width.
			'&ems_max_height='.$height.
			'&ems_type_res='.$type_resizing.
			'&ems_position='.$resize_position;
	}
	
	
	//=======================================================================
	public function getSize( $name_params, $def_v=null, $enable_proc  =1 ){
		return $this->getVal( $name_params, $def_v, 'size',  0, $enable_proc);
	}
	public function insertSize( $name_params, $def_v=null, $enable_proc  =1 ){
		return $this->getVal( $name_params, $def_v, 'size',  1, $enable_proc);
	}
	//=======================================================================
	public function getColor( $name_params, $def_v=null, $del_resh = -1 ){
	if( $del_resh == -1 ) $del_resh = $this->delete_color_char;
		return $this->getVal( $name_params, $def_v, 'color',  0, $del_resh);
	}
	public function insertColor( $name_params, $def_v=null, $del_resh = -1 ){
	if( $del_resh == -1 ) $del_resh = $this->delresh;
		return $this->getVal( $name_params, $def_v, 'color',  1, $del_resh);
	}
	//=======================================================================
	public function getUrl( $name_params, $def_v=null ){
		return $this->getVal( $name_params, $def_v, 'selfurl',  0);
	}
	public function insertUrl( $name_params, $def_v=null ){
		return $this->getVal( $name_params, $def_v, 'selfurl',  1);
	}
	//=======================================================================
	public function getInt( $name_params, $def_v=null, $option=0 ){
		return $this->getVal( $name_params, $def_v, 'int',  0, $option);
	}
	public function insertInt( $name_params, $def_v=null, $option=0 ){
		return $this->getVal( $name_params, $def_v, 'int',  1, $option);
	}
	//=======================================================================
	public function getString( $name_params, $def_v=null ){
		return $this->getVal( $name_params, $def_v, 'string',  0);
	}
	public function insertString( $name_params, $def_v=null ){
		return $this->getVal( $name_params, $def_v, 'string',  1);
	}
	//=======================================================================
	public function getVal( $name_params, $def_v=null, $type = 'string',  $typeout = 0, $option = 0){
		$cur_val = $this->params->get( $name_params, ( $def_v===null ? $this->def_params->get($name_params) : $def_v )); //$def_v
		switch($type){
			case 'color':{
				$cur_val = trim($cur_val);
				if($option) $cur_val = str_replace('#', '', $cur_val);
				if($typeout) $cur_val = "'".$cur_val."'";
				break;
			}
			case 'size':{
				$cur_val = trim($cur_val);
				if( !preg_match('/^[\-|]{0,1}[0-9]{1,6}('.( $option ? '%|' : '').'px){1}$/i', $cur_val) ) $cur_val = (int)$cur_val.'px';
				if($typeout) $cur_val = "'".$cur_val."'";

				break;
			}
			case 'selfurl':{
				$cur_val = trim($cur_val);
				$cur_val  = JText::_( ( strpos($cur_val, '/')!==0 ? $this->plugin_url : JURI::root()) . $cur_val, $typeout  );
				
				break;
			}
			case 'int':{
				if($option==2 && $cur_val=='' ) $cur_val = 'null';
					else $cur_val = (int) $cur_val; break;
				if($typeout && $cur_val == 'null' ) $cur_val = "'".$cur_val."'";
			}
			case 'string':
			default:{
				$cur_val = JText::_( $cur_val, $typeout ); 
				if($typeout) $cur_val = "'".$cur_val."'";
			}
		}
		if($typeout) $this->gen_option[] = $name_params.': '.$cur_val;
			else return $cur_val ;
	}
	
	
	//++++++++++++++++++++++++++++++++++++
	
	protected function loadModulePosition($position, $style = ''){
		require_once JPATH_SITE.'/components/com_twojtoolbox/helpers/twojtoolboxmodule.php';
		if (!isset(self::$modules[$position])) {
			self::$modules[$position] = '';
			$document	= JFactory::getDocument();
			$renderer	= $document->loadRenderer('module');
			$modules	= TwojToolBoxModuleHelper::getModules($position);
			$params		= array('style' => $style);
			ob_start();
			foreach ($modules as $module) {
				echo $renderer->render($module, $params);
			}
			self::$modules[$position] = ob_get_clean();
		}
		return self::$modules[$position];
	}
	
	protected function loadModuleId($module, $style = '', $title=''){
		require_once JPATH_SITE.'/components/com_twojtoolbox/helpers/twojtoolboxmodule.php';
		if (!isset(self::$mods[$module])) {
			self::$mods[$module] = '';
			$document	= JFactory::getDocument();
			$renderer	= $document->loadRenderer('module');
			$mod		= TwojToolBoxModuleHelper::getModuleId($module, $title);
			$params = array('style' => $style);
			ob_start();
			echo $renderer->render($mod, $params);
			self::$mods[$module] = ob_get_clean();
		}
		return self::$mods[$module];
	}
	
	//++++++++++++++++++++++++++++++++++++
	
	public  function getList(){

		if(TJTB_JVERSION==3){
			$articles = TwojJModel::getInstance('ArticlesListV3', 'TwojToolBoxModel', array('ignore_request' => true));
		} else {
			$articles = TwojJModel::getInstance('ArticlesList', 'TwojToolboxModel', array('ignore_request' => true));
		}
		
		$app = JFactory::getApplication();
		
		if($app->isAdmin()) $appParams = &JComponentHelper::getParams('com_content');
			else $appParams = $app->getParams();
		
		$articles->setState('params', $appParams);

		$articles->setState('list.start', 0);
		$articles->setState('list.limit', (int) $this->params->get('count', 0));
		$articles->setState('filter.published', 1);
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$articles->setState('filter.access', $access);
		$catids = $this->params->get('catid');
		$articles->setState('filter.category_id.include', (bool) $this->params->get('category_filtering_type', 1));
		// Category filter
		if ($catids) {
			if ($this->params->get('show_child_category_articles', 0) && (int) $this->params->get('levels', 0) > 0) {
				// Get an instance of the generic categories model
				$categories = TwojJModel::getInstance('Categories', 'ContentModel', array('ignore_request' => true));
				$categories->setState('params', $appParams);
				$levels = $this->params->get('levels', 1) ? $this->params->get('levels', 1) : 9999;
				$categories->setState('filter.get_children', $levels);
				$categories->setState('filter.published', 1);
				$categories->setState('filter.access', $access);
				$additional_catids = array();

				foreach($catids as $catid){
					$categories->setState('filter.parentId', $catid);
					$recursive = true;
					$items = $categories->getItems($recursive);
					if ($items){
						foreach($items as $category){
							$condition = (($category->level - $categories->getParent()->level) <= $levels);
							if ($condition) $additional_catids[] = $category->id;
						}
					}
				}

				$catids = array_unique(array_merge($catids, $additional_catids));
			}
			$articles->setState('filter.category_id', $catids);
		}

		// Ordering
		$articles->setState('list.ordering', $this->params->get('article_ordering', 'a.ordering'));
		$articles->setState('list.direction', $this->params->get('article_ordering_direction', 'ASC'));

		// New Parameters
		$articles->setState('filter.featured', $this->params->get('show_front', 'show'));
		$articles->setState('filter.author_id', $this->params->get('created_by', ""));
		$articles->setState('filter.author_id.include', $this->params->get('author_filtering_type', 1));
		$articles->setState('filter.author_alias', $this->params->get('created_by_alias', ""));
		$articles->setState('filter.author_alias.include', $this->params->get('author_alias_filtering_type', 1));
		
		// Article Filter ID
		$excluded_articles = $this->params->get('excluded_articles', '');
		$id_alias_filtering_type = $this->params->get('id_alias_filtering_type', 0);
		
		if ($excluded_articles){
			$excluded_articles = explode("\r\n", $excluded_articles);
			$articles->setState('filter.article_id', $excluded_articles);
			$articles->setState('filter.article_id.include', $id_alias_filtering_type); // Exclude
		}
		
		// Date Filter ID
		$date_filtering = $this->params->get('date_filtering', 'off');
		if ($date_filtering !== 'off'){
			$articles->setState('filter.date_filtering', $date_filtering);
			$articles->setState('filter.date_field', $this->params->get('date_field', 'a.created'));
			$articles->setState('filter.start_date_range', $this->params->get('start_date_range', '1000-01-01 00:00:00'));
			$articles->setState('filter.end_date_range', $this->params->get('end_date_range', '9999-12-31 23:59:59'));
			$articles->setState('filter.relative_date', $this->params->get('relative_date', 30));
		}

		// Filter by language
		if(!$app->isAdmin())  $articles->setState('filter.language',$app->getLanguageFilter());

		$items = $articles->getItems();

		if($this->parent_article_id){
			for($i=0;$i<count($items);$i++){
				if( $items[$i]->id == $this->parent_article_id ) unset($items[$i]);
			}
		}

		foreach ($items as &$item){
			
			$item->slug			= $item->alias ? ($item->id.':'.$item->alias) : $item->id;
			$item->catslug		= $item->category_alias ? ($item->catid.':'.$item->category_alias) : $item->catid;
			
			if ($access || in_array($item->access, $authorised)) {
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
			} else {
				$app	= JFactory::getApplication();
				$menu	= $app->getMenu();
				$menuitems	= $menu->getItems('link', 'index.php?option=com_users&view=login');
				if(isset($menuitems[0])){
					$Itemid = $menuitems[0]->id;
				} else if (JRequest::getInt('Itemid') > 0) { 
					$Itemid = JRequest::getInt('Itemid');
				}
				$item->link = JRoute::_('index.php?option=com_users&view=login&Itemid='.$Itemid);
			}

			
			
			$show_introtext 	= $this->getInt('show_introtext', 0);
			$text_limit 	= $this->getInt('text_limit', 0);
			
			
			
			if ($show_introtext > 0) {
				$twojtoolbox_item = JRequest::getVar('com_twojtoolbox_item_'.$this->id, 0, '', 'int');
				JRequest::setVar('com_twojtoolbox_item_'.$this->id, ++$twojtoolbox_item);
				
				if ($show_introtext=='1' && isset($item->fulltext)) {
					 $item->text = $item->introtext.' '.$item->fulltext;
				}else if ($show_introtext=='2' && isset($item->introtext) ) {
					$item->text = $item->introtext;
				} else $item->text = '';
				
				
				//$item->text = str_replace( '<hr class="system-pagebreak" />', '', $item->text );
				//$item->text = str_replace( '<hr class="system-pagebreak"', '', $item->text );
				//$regex = '#<hr(.*)class="system-pagebreak"(.*)\/>#iU';
				//$item->text = preg_replace($regex, '<br />', $item->text);
				//$item->text = preg_replace($regex, '', $item->text);
				//$item->toc = '';
				
				//echo '<textarea col="10" rows="50">'.$item->text.'</textarea>';
				$item->text = JHtml::_('content.prepare', $item->text, $item->params);
				
				
				//$item->introtext = TwojToolBoxSiteHelper::content_cleanIntrotext($item->introtext);
				
				if($text_limit) $item->displayIntrotext = TwojToolBoxSiteHelper::content_truncate($item->text, $text_limit);
				else $item->displayIntrotext = $item->text;
			} else {
				$item->displayIntrotext = '';
			}
			

			$item->displayReadmore = $item->alternative_readmore;
			
		}
		
		
		return $items;
	}

}