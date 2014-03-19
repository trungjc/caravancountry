<?php
/**
* @package     2JToolBox
* @author      2JoomlaNet http://www.2joomla.net
* @ñopyright   Copyright (c) 2008-2012 2Joomla.net All rights reserved
* @license     released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version     $Revision: 1.0.2 $
**/


defined('_JEXEC') or die;
jimport('joomla.plugin.plugin');

class plgSystemTwojToolbox extends JPlugin{

	var $_twojtoolbox = null;
	protected $regex = '/\{2jtoolbox_content\s+([a-z0-9]*)\s+id:([0-9]*)\s+begin(\s+title:([^}]*)){0,1}\}.*\{2jtoolbox_content\s+\\1\s+id:\\2\s+end\}/isU';
	protected $regex_easy = '/\{2jtoolbox_content\s+([a-z0-9]*)\s+id:([0-9]*)\s+begin(\s+title:([^}]*)){0,1}\}.*\{2jtoolbox_content\s+\\1\s+id:\\2\s+end\}/is';
	
	protected $regex_single = '/{2jtoolbox\s+([a-z0-9]*)\s+id:([0-9]*)}/i';
	
	function __construct(& $subject, $config){
		parent::__construct($subject, $config);
	}

	public function onContentPrepare($context, &$article, &$params, $page = 0){

		if (strpos($article->text, '{2jtoolbox') === false) return true;
		JLoader::register('TwojToolBoxSiteHelper', JPATH_SITE.'/components/com_twojtoolbox/helpers/twojtoolboxsite.php');
		if( !class_exists('TwojToolBoxSiteHelper') ) return '';
		if( ($new_article_text = preg_replace_callback( ( strlen($article->text)<100000 ? $this->regex : $this->regex_easy ) , 'TwojToolBoxSiteHelper::parseMultiTagCalback', $article->text) )!==NULL ){
			$article->text = $new_article_text;
		}
		$matches	= array();
		preg_match_all($this->regex_single, $article->text, $matches, PREG_SET_ORDER);
		if( count($matches) ){
			foreach ($matches as $match) {
				if(count($match)==3 && (int)$match[2] ){
					$parent_acticle_id = '';
					if(isset($article->id) && $article->id > 0 ){
						$parent_acticle_id = $article->id;
					}

					if( JRequest::getVar('com_twojtoolbox_item_'.(int)$match[2], 0, '', 'int') > 3  ){
						$output  = 'cicle';
					}  else $output  = TwojToolBoxSiteHelper::getPluginContent((int)$match[2], $parent_acticle_id);
					$article->text = preg_replace("|$match[0]|", $output, $article->text, 1);
				}
			}
		}
	}
	
	function onAfterRoute(){
		$app = JFactory::getApplication();
		$document = JFactory::getDocument();
		$format =  $document->getType('raw');
		$tmpl =JRequest::getCmd('tmpl', '');
		$print =JRequest::getCmd('print', 0);
		if ($app->isAdmin()  || $print || $tmpl=='component' || $format!='html' ){
			return;
		}
		$menu = $app->getMenu()->getActive();
		if( !isset($menu->id)  ) return;
		$itemid = $menu->id;
		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->where('itemid = '. (int) $itemid, 'OR' );
		$query->where('itemid = -1', 'OR');
		$query->from('#__twojtoolbox_menu');
		$db->setQuery($query);
		//echo (string) $query;
		if( $plugins_for_page = $db->loadColumn() ){
			for($i=0;$i<count($plugins_for_page);$i++){
				$query->clear();
				$query->select('plu.*, ite.id AS item_id, ite.title AS item_title, ite.params, ite.state');
				$query->where('ite.`id` = '. (int) $plugins_for_page[$i]);
				$query->where('plu.`type` = ite.`type`');
				$query->where('plu.`daemon` = 1 ');
				$query->where('ite.`state` = 1');
				$query->from('#__twojtoolbox AS ite, #__twojtoolbox_plugins AS plu');
				$db->setQuery($query);
				if( $plugin_info = $db->loadObject() ){
					require_once (JPATH_SITE.'/components/com_twojtoolbox/pluginclass.php');
					jimport('joomla.filesystem.file');
					$plugin_classfile = JPATH_SITE.'/'.
									'components/'.
									'com_twojtoolbox/'.
									'plugins/'.
									$plugin_info->type.'/'.
									$plugin_info->v_active.'/'.
									'twoj_'.$plugin_info->type.'_plugin.php';
					if( !JFile::exists($plugin_classfile) ) return JText::_('COM_TWOJTOOLBOX_ERROR_FILE_ERROR');
					require_once ($plugin_classfile);
					$class = 'TwoJToolBox'.ucfirst($plugin_info->type);
					if (class_exists($class)) $instance = new $class($plugin_info);
						else return JText::sprintf('JLIB_APPLICATION_ERROR_INVALID_CONTROLLER_CLASS', $class);
					if( $instance->error_text  ) return  $instance->error_text;
					$instance->getDaemon(); 
				}
			}
		}
	}
	
	function onAfterInitialise(){
		$app = JFactory::getApplication();
		$user	= JFactory::getUser();
		$document = JFactory::getDocument();
		$format =  $document->getType('raw');
		$tmpl =JRequest::getCmd('tmpl', '');
		$print =JRequest::getCmd('print', 0);
		if ($app->isAdmin()  || $print || $tmpl=='component' || $format!='html' ) {
			return;
		}
		JRequest::setVar('com_twojtoolbox_filelist_css', array());
		JRequest::setVar('com_twojtoolbox_filelist_js', array());
	}

	function onBeforeCompileHead(){
		$app = JFactory::getApplication();
		$document = JFactory::getDocument();
		$format =  $document->getType('raw');
		$tmpl =JRequest::getCmd('tmpl', '');
		$print =JRequest::getCmd('print', 0);
		if ($app->isAdmin() || $print || $tmpl=='component' || $format!='html' ) { 
			return;
		}
		JLoader::register('TwojToolBoxSiteHelper', JPATH_SITE.'/components/com_twojtoolbox/helpers/twojtoolboxsite.php');
		$cache = JFactory::getCache('twojtoolboxplugin', 'output');
		$cache_enable = $cache->getCaching();
		if($cache_enable) $get_id = JCache::makeId();
		
		$twojtoolbox_cache_enable = JComponentHelper::getParams('com_twojtoolbox')->get('twojcache', 1);
		
		if ($cache_enable && $jslist_cache = $cache->get($get_id.'js')) {
			$document->addScript($jslist_cache);
		} else {
			$js_list = JRequest::getVar('com_twojtoolbox_filelist_js', array(), '', 'array');
			if( count($js_list) ){
				$in_js = array('init');
				for($i=0;$i<count($js_list);++$i){
					if( !in_array($js_list[$i], $in_js) ) $in_js[] = $js_list[$i]; 
				}
				$url_js = TwojToolBoxSiteHelper::scriptCompile( implode( '2jbrs2', $in_js), 'js' );
				if(!$url_js || !$twojtoolbox_cache_enable ) $url_js = JURI::root(true)."/index.php?option=com_twojtoolbox&amp;format=raw&amp;task=ajax.getjs&amp;need=".implode( '2jbrs2', $in_js)."&amp;name=2jscript.js";
				$document->addScript($url_js);
				if($cache_enable) $cache->store( $url_js, $get_id.'js');
			}
		}
		
		
		if ($cache_enable && $csslist_cache = $cache->get($get_id.'css')) {
			$document->addStyleSheet($csslist_cache);
		} else {
			$css_list = JRequest::getVar('com_twojtoolbox_filelist_css', array(), '', 'array');
			if( count($css_list) ){
				$in_css = array();
				for($i=0;$i<count($css_list);++$i){
					if( !in_array($css_list[$i], $in_css) ) $in_css[] = $css_list[$i]; 
				}
				$url_css = TwojToolBoxSiteHelper::scriptCompile( implode( '2jbrs2', $in_css), 'css' );
				if(!$url_css || !$twojtoolbox_cache_enable ) $url_css = JURI::root(true) . "/index.php?option=com_twojtoolbox&amp;format=raw&amp;task=ajax.getcss&amp;need=".implode( '2jbrs2', $in_css)."&amp;name=2j.style.css";
				$document->addStyleSheet($url_css);
				if($cache_enable) $cache->store( $url_css, $get_id.'css');
			}
		}
	}
}
