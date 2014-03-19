<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @subpackage	MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

//No Permision
defined('_JEXEC') or die('Restricted access');

// Imports
jimport('joomla.application.component.model');

if (!class_exists('MijosoftModel')) {
	if (interface_exists('JModel')) {
		abstract class MijosoftModel extends JModelLegacy {}
	}
	else {
		class MijosoftModel extends JModel {}
	}
}

class MijosefModelTags extends MijosoftModel {
	
	protected $_total = null;
	protected $_query = null;
 	protected $_pagination = null;
	
	function __construct(){
        parent::__construct();
		
		$this->_buildViewQuery();
		
		$MijosefConfig = Mijosef::getConfig();
        $mainframe = JFactory::getApplication();
 
        // Get pagination request variables
        $limit = $mainframe->getUserStateFromRequest('limit', 'limit', $MijosefConfig->tags_limit, 'int');
        $limitstart = JRequest::getVar('limitstart', 0, '', 'int');
 
        // Limit has been changed, adjust it
		$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
 
        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
	}
	
	function getData() {
		$tag = Mijosef::get('utility')->cleanText(trim(JRequest::getString('tag', null)));

		$data = MijoDatabase::loadObject("SELECT description FROM #__mijosef_tags WHERE published = 1 AND title = '{$tag}'");
		
		return $data;
	}
	
	function getItems() {
		if (empty($this->_data)) {
            $this->_data = $this->_getList($this->_query, $this->getState('limitstart'), $this->getState('limit')); 
		}
		
        return $this->_data;
	}
	
	function _getTagsMap() {
		$map = MijoDatabase::loadObjectList("SELECT tag, url_sef FROM #__mijosef_tags_map", "tag");
		
		return $map;
	}
	
	function getTotal() {
		if (empty($this->_total)) {
			$this->_total = MijoDatabase::loadResult("SELECT COUNT(u.id) FROM #__mijosef_metadata AS m, #__mijosef_urls AS u".$this->_buildViewWhere());	
		}
		return $this->_total;
	}
	
	function getPagination(){
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit'));
        
			$this->_pagination->setAdditionalUrlParam('option', 'com_mijosef');
			$this->_pagination->setAdditionalUrlParam('view', 'tags');
		}
		
        return $this->_pagination;
	}
	
	function _buildViewQuery() {
		$where = $this->_buildViewWhere();
		
		$this->_query = "SELECT m.id, m.url_sef, m.title, m.description, m.keywords, u.url_real FROM #__mijosef_metadata AS m, #__mijosef_urls AS u {$where} ORDER BY m.title";
	}
	
	function _buildViewWhere() {
		$uri = JFactory::getURI();
		$where = array();
		
		$where[] = "m.url_sef = u.url_sef";
		$where[] = "m.published = 1";
		$where[] = "m.title != ''";
		$where[] = "m.keywords != ''";
		$where[] = "u.params LIKE '%\"published\":1%'";
		$where[] = "u.params LIKE '%\"tags\":1%'";
		$where[] = "u.params LIKE '%\"trashed\":0%'";
		$where[] = "u.params LIKE '%\"notfound\":0%'";
		
		$tag = trim(JRequest::getString('tag', null));
		
		if ($tag != '' && $tag != '0') {
			$tag = Mijosef::get('utility')->cleanText($tag);
			
			if (is_null($uri->getVar('limitstart'))) {
				self::updateHits($tag);
			}
			
			$components = Mijosef::getConfig()->tags_components;
			if (is_array($components) && !empty($components)) {
				$com = "(";
				foreach ($components as $component) {
					$com .= "u.url_real LIKE '%option={$component}%' OR ";
				}
				$com = rtrim($com, ' OR ');
				$com .= ")";
				$where[] = $com;
			}
			
			$tag1 = $this->_db->Quote($this->_db->getEscaped($tag, true).",%", false);
			$tag2 = $this->_db->Quote("%, ".$this->_db->getEscaped($tag, true).",%", false);
			$tag3 = $this->_db->Quote("%, ".$this->_db->getEscaped($tag, true), false);
			$where[] = "(m.keywords LIKE {$tag1} OR m.keywords LIKE {$tag2} OR m.keywords LIKE {$tag3})";
			
			$ids = MijoDatabase::loadResultArray("SELECT u.id FROM #__mijosef_urls AS u, #__mijosef_tags_map AS tm WHERE u.url_sef = tm.url_sef AND tm.tag = '{$tag}'");
			if (count($ids) > 0) {
				$where[] = "u.id NOT IN (" . implode(", ", $ids) . ")";
			}
		}
		
		// Execute
		$where = " WHERE " . implode(" AND ", $where);
		
		return $where;
	}
	
	function updateHits($tag) {
		MijoDatabase::query("UPDATE #__mijosef_tags SET hits = (hits+1) WHERE title = '{$tag}'");
	}
}