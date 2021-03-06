<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Model Class
class MijosefModelSitemap extends MijosefModel {
	
	// Main constructer
	function __construct()	{
		parent::__construct('sitemap');
		
		$this->_getUserStates();
		self::_buildViewQuery();
	}
	
	// Apply changes
	function apply() {
		$sef_id 	= JRequest::getVar('ids');
		$sparent	= JRequest::getVar('sparent');
		$sorder		= JRequest::getVar('sorder');
		JArrayHelper::toInteger($sef_id);
		JArrayHelper::toInteger($sparent);
		JArrayHelper::toInteger($sorder);
		
		$sdate		= JRequest::getVar('sdate');
		$frequency 	= JRequest::getVar('frequency');
		$priority	= JRequest::getVar('priority');
		
		// Save
		foreach ($sef_id as $id => $val) {
			if (!isset($sorder[$id])) {
				$sorder[$id] = "1000";
			}
			MijoDatabase::query("UPDATE #__mijosef_sitemap SET sdate = '{$sdate[$id]}', frequency = '{$frequency[$id]}', priority = '{$priority[$id]}', sparent = '{$sparent[$id]}', sorder = '{$sorder[$id]}' WHERE id = {$id}");
		}
	}
	
	function generateItems() {
		$where = " WHERE params LIKE '%\"published\":1%' AND params LIKE '%\"trashed\":0%' AND params LIKE '%\"notfound\":0%'";
		$rows = MijoDatabase::loadObjectList("SELECT url_sef, url_real FROM #__mijosef_urls {$where}");
		
		if (!is_array($rows) || empty($rows)) {
			return false;
		}
		
		foreach ($rows as $row) {
			$url_real = str_replace('&amp;', '&', $row->url_real);
			$url_real = str_replace('index.php?', '', $url_real);		
			parse_str($url_real, $vars);
			
			$component = $vars['option'];
			
			$ext_params = Mijosef::get('cache')->getExtensionParams($component);
			if (!$ext_params) {
				$ext_params = new JRegistry('');
			}
			
			// Category status
			if (file_exists(JPATH_MIJOSEF_ADMIN.'/extensions/'.$component.'.php')) {
				$mijosef_ext = Mijosef::getExtension($component);
				$mijosef_ext->catParam($vars, $row->url_real);
			}
			
			Mijosef::get('sitemap')->autoSitemap($component, $ext_params, $row->url_sef, $row->url_real);
		}
		
    	return true;
	}
	
	function getToolbarSelections() {
		$toolbar = new stdClass();
		
        // Actions
        $act[] = JHTML::_('select.option', 'delete', JText::_('Delete'));
		$act[] = JHTML::_('select.option', 'sep', '---');
		
		if ($this->MijosefConfig->ui_sitemap_published == 1) {
	        $act[] = JHTML::_('select.option', 'publish', JText::_('Publish'));
	        $act[] = JHTML::_('select.option', 'unpublish', JText::_('COM_MIJOSEF_TOOLBAR_PUBLISH_UN'));
			$act[] = JHTML::_('select.option', 'sep', '---');
		}
		
		if ($this->MijosefConfig->ui_sitemap_parent == 1) {
        	$act[] = JHTML::_('select.option', 'setparent', JText::_('Set Parent'));
		}
		
		if ($this->MijosefConfig->ui_sitemap_date == 1) {
        	$act[] = JHTML::_('select.option', 'setdate', JText::_('Set Date'));
		}
		
		if ($this->MijosefConfig->ui_sitemap_frequency == 1) {
        	$act[] = JHTML::_('select.option', 'setfrequency', JText::_('Set Frequency'));
		}
		
		if ($this->MijosefConfig->ui_sitemap_priority == 1) {
        	$act[] = JHTML::_('select.option', 'setpriority', JText::_('Set Priority'));
		}
		
		$act[] = JHTML::_('select.option', 'sep', '---');
        $act[] = JHTML::_('select.option', 'pinggoogle', JText::_('COM_MIJOSEF_TOOLBAR_PING') .' '. JText::_('Google'));
        $act[] = JHTML::_('select.option', 'pingyahoo', JText::_('COM_MIJOSEF_TOOLBAR_PING') .' '. JText::_('Yahoo'));
        $act[] = JHTML::_('select.option', 'pingbing', JText::_('COM_MIJOSEF_TOOLBAR_PING') .' '. JText::_('Bing'));
        $act[] = JHTML::_('select.option', 'pingservices', JText::_('COM_MIJOSEF_TOOLBAR_PING') .' '. JText::_('COM_MIJOSEF_TOOLBAR_PING_SERVICES'));
		$act[] = JHTML::_('select.option', 'sep', '---');
		if ($this->MijosefConfig->ui_sitemap_cached == 1) {
	        $act[] = JHTML::_('select.option', 'cache', JText::_('COM_MIJOSEF_TOOLBAR_CACHE'));
	        $act[] = JHTML::_('select.option', 'uncache', JText::_('COM_MIJOSEF_TOOLBAR_CACHE_UN'));
			$act[] = JHTML::_('select.option', 'sep', '---');
		}
        $act[] = JHTML::_('select.option', 'backup', JText::_('COM_MIJOSEF_TOOLBAR_BACKUP'));
        $toolbar->action = JHTML::_('select.genericlist', $act, 'sitemap_action', 'class="inputbox" style="width: 130px;" size="1" onchange="showInput();"');
		
		// Sets
		$toolbar->newparent = '<div id="divparent" style="display: none"><input type="text" id="tb_newparent" name="tb_newparent" size="5" value="" style="width: 50px; text-align: center;" /></div>';
		$toolbar->newdate = '<div id="divdate" style="display: none">'.JHTML::calendar(date('Y-m-d'), 'tb_newdate', 'tb_newdate', '%Y-%m-%d', 'style="margin-top: 17px; width: 70px;"').'</div>';
        $toolbar->newpriority = '<div id="divpriority" style="display: none">'.JHTML::_('select.genericlist', Mijosef::get('sitemap')->getPriorityList(), 'tb_newpriority', 'class="inputbox" style="width: 120px;" size="1"', 'value', 'text', $this->MijosefConfig->sm_priority).'</div>';
        $toolbar->newfrequency = '<div id="divfrequency" style="display: none">'.JHTML::_('select.genericlist', Mijosef::get('sitemap')->getFrequencyList(), 'tb_newfrequency', 'class="inputbox" style="width: 120px;" size="1"', 'value', 'text', $this->MijosefConfig->sm_freq).'</div>';
		
		// Selections
        $sel[] = JHTML::_('select.option', 'selected', JText::_('COM_MIJOSEF_TOOLBAR_SELECTED'));
        $sel[] = JHTML::_('select.option', 'filtered', JText::_('COM_MIJOSEF_TOOLBAR_FILTERED'));
        $toolbar->selection = JHTML::_('select.genericlist', $sel, 'sitemap_selection', 'class="inputbox" style="width: 120px;" size="1"');
		
		// Button
        $toolbar->button = '<input type="button" class="btn btn-primary" value="'.JText::_('Apply').'" onclick="apply();" />';
		
		return $toolbar;
	}
	
	// Save parent field
	function saveParent() {
		$sef_id  = JRequest::getVar('ids');
		$sparent = JRequest::getVar('sparent');
		JArrayHelper::toInteger($sef_id);
		JArrayHelper::toInteger($sparent);
		
		// Save
		foreach ($sef_id as $id => $val) {
			MijoDatabase::query("UPDATE #__mijosef_sitemap SET sparent = '{$sparent[$id]}' WHERE id = {$id}");
		}
	}
        
	// Save order field
	function saveOrder() {
		$sef_id = JRequest::getVar('ids');
		$sorder = JRequest::getVar('sorder');
		JArrayHelper::toInteger($sef_id);
		JArrayHelper::toInteger($sorder);
		
		// Save
		foreach ($sef_id as $id => $val) {
			if (!isset($sorder[$id])) {
				$sorder[$id] = "1000";
			}
			MijoDatabase::query("UPDATE #__mijosef_sitemap SET sorder = '{$sorder[$id]}' WHERE id = {$id}");
		}
	}
	
	// Order item
	function orderItem($direction) {
		// Get cid
		$cid = JRequest::getVar('cid', array(), 'post', 'array');
		JArrayHelper::toInteger($cid);
		
		// Save
		MijoDatabase::query("UPDATE #__mijosef_sitemap SET sorder = (sorder{$direction}) WHERE id = {$cid[0]}");
	}
	
	function _getUserStates() {
		$this->filter_order		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order',		'filter_order',		'url_sef');
		$this->filter_order_Dir	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order_Dir',	'filter_order_Dir',	'ASC');
        $this->search_sef		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_sef', 		'search_sef', 		'');
        $this->filter_component	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_component', 'filter_component', '-1');
		$this->search_id		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_id', 		'search_id', 		'');
		$this->search_parent	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_parent',	'search_parent',	'');
		$this->search_order		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_order',		'search_order',		'');
		$this->filter_date	 	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_date', 		'filter_date', 		'');
		$this->filter_frequency	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_frequency',	'filter_frequency',	'-1');
		$this->filter_priority	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_priority', 	'filter_priority',	'-1');
        $this->filter_published	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_published',	'filter_published',	'-1');
		$this->search_sef		= JString::strtolower($this->search_sef);
		$this->search_id		= JString::strtolower($this->search_id);
		$this->search_parent	= JString::strtolower($this->search_parent);
		$this->search_order		= JString::strtolower($this->search_order);
	}
	
	function getLists() {
		$lists = array();

		// Table ordering
		$lists['order_dir'] = $this->filter_order_Dir;
		$lists['order'] 	= $this->filter_order;
		
		// Reset filters
        $lists['reset_filters'] = '<input type="submit" class="btn btn-primary" style="margin-bottom: 16px !important;" onClick="resetFilters();" value="'. JText::_('Reset') .'" />';
		
		// Filter's action
		$javascript = 'onchange="document.adminForm.submit();"';
		
		// Make the input box for SEF URL search
        $lists['search_sef'] = "<input type=\"text\" name=\"search_sef\" value=\"{$this->search_sef}\" size=\"30\" style=\"width: 80px;\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";

		// Components List
		$com_list = array();
		$com_list[] = JHTML::_('select.option', '-1', JText::_('COM_MIJOSEF_COMMON_COM_FILTER'));
		$com_list = array_merge($com_list, Mijosef::get('utility')->getComponents());
        $lists['component_list'] = JHTML::_('select.genericlist', $com_list, 'filter_component', 'class="inputbox" size="1" style="width: 155px;"'.$javascript, 'value', 'text', $this->filter_component);
		
		// Published Filter
        if ($this->MijosefConfig->ui_sitemap_published == 1) {
			$published_list[] = JHTML::_('select.option', '-1', JText::_('COM_MIJOSEF_COMMON_SELECT'));
			$published_list[] = JHTML::_('select.option', '1', JText::_('Yes'));
			$published_list[] = JHTML::_('select.option', '0', JText::_('No'));
	   	   	$lists['published_list'] = JHTML::_('select.genericlist', $published_list, 'filter_published', 'class="inputbox" size="1" style="width: 80px;"'.$javascript,'value', 'text', $this->filter_published);
        }
        
		// Search ID
        if ($this->MijosefConfig->ui_sitemap_id == 1) {
        	$lists['search_id'] = "<input type=\"text\" name=\"search_id\" value=\"{$this->search_id}\" size=\"5\" style=\"width: 30px;\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
        // Search Parent
        if ($this->MijosefConfig->ui_sitemap_parent == 1) {
        	$lists['search_parent'] = "<input type=\"text\" name=\"search_parent\" value=\"{$this->search_parent}\" style=\"width: 30px;\" size=\"5\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
        // Search Order
        if ($this->MijosefConfig->ui_sitemap_order == 1) {
        	$lists['search_order'] = "<input type=\"text\" name=\"search_order\" value=\"{$this->search_order}\" style=\"width: 30px;\" size=\"6\" maxlength=\"10\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
		// Date
        if ($this->MijosefConfig->ui_sitemap_date == 1) {
			$lists['filter_date'] = JHTML::_('calendar', $this->filter_date, 'filter_date', 'filter_date', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'13', 'style'=>'width: 80px;', 'onchange'=>'document.adminForm.submit();', 'maxlength'=>'20'));
        }
        
		// Frequency Filter
        if ($this->MijosefConfig->ui_sitemap_frequency == 1) {
			$frequency_list[] = JHTML::_('select.option', '-1', JText::_('COM_MIJOSEF_COMMON_SELECT'));
			$frequency_list = array_merge($frequency_list, Mijosef::get('sitemap')->getFrequencyList());
	   	   	$lists['frequency_list'] = JHTML::_('select.genericlist', $frequency_list, 'filter_frequency', 'class="inputbox" size="1" style="width: 80px;"'.$javascript,'value', 'text', $this->filter_frequency);
        }
        
		// Priority Filter
        if ($this->MijosefConfig->ui_sitemap_priority == 1) {
			$priority_list[] = JHTML::_('select.option', '-1', JText::_('COM_MIJOSEF_COMMON_SELECT'));
			$priority_list = array_merge($priority_list, Mijosef::get('sitemap')->getPriorityList());
	   	   	$lists['priority_list'] = JHTML::_('select.genericlist', $priority_list, 'filter_priority', 'class="inputbox" size="1" style="width: 80px;"'.$javascript,'value', 'text', $this->filter_priority);
        }
        
		return $lists;
	}
	
	function getCache() {
		$sitemap = array();
		
		$cache = Mijosef::getCache();
		$sitemap = $cache->load('sitemap');
		
		return $sitemap;
	}
	
	function getTitles() {
		static $titles;
		
		if (!isset($titles) && !empty($this->_data)) {			
			$items = '';
			foreach ($this->_data as $row) {
				$items .= $row->id.', ';
			}
			$items = rtrim($items, ', ');
			
			$select = 's.title, s.url_sef, m.title AS meta_title';
			$tables = '#__mijosef_sitemap AS s LEFT JOIN #__mijosef_metadata AS m ON s.url_sef = m.url_sef';
			
    		$titles = MijoDatabase::loadObjectList("SELECT {$select} FROM {$tables} WHERE s.id IN ({$items})", 'url_sef');
		}
		
    	return $titles;
	}
	
	function getItems() {
		if (empty($this->_data)) {
			$items = array();
			$rows = $this->_getList($this->_query, $this->getState($this->_option.'.' . $this->_context . '.limitstart'), $this->getState($this->_option.'.' . $this->_context . '.limit'));
			
			if (!empty($rows)) {
				$children = array();
				foreach ($rows as $v) {
					$pt = $v->sparent;
					$list = @$children[$pt] ? $children[$pt] : array();
					array_push($list, $v);
					$children[$pt] = $list;
				}
				
				$list = self::_buildTree(intval($rows[0]->sparent), '', array(), $children);
				
				foreach ($list as $id => $item) {
					$items[] = $item;
				}
			}
			
			$this->_data = $items;
		}
		
		return $this->_data;
	}

	function _buildTree($id, $indent, $list, &$children) {
		if (@$children[$id]) {
			foreach ($children[$id] as $ch) {
				$id = $ch->id;

				$pre 	= '<sup>|_</sup>&nbsp;';
				$spacer = '.&nbsp;&nbsp;&nbsp;';

				if ($ch->sparent == 0) {
					$txt = $ch->url_sef;
				} else {
					$txt = $pre . $ch->url_sef;
				}
				
				$list[$id] = $ch;
				$list[$id]->id = $id;
				$list[$id]->treename = "$indent$txt";
				$list[$id]->url_sef = $ch->url_sef;
				$list[$id]->published = $ch->published;
				$list[$id]->sdate = $ch->sdate;
				$list[$id]->frequency = $ch->frequency;
				$list[$id]->priority = $ch->priority;
				$list[$id]->frequency = $ch->frequency;
				$list[$id]->sparent = $ch->sparent;
				$list[$id]->children = count(@$children[$id]);
				$list = self::_buildTree($id, $indent . $spacer, $list, $children);
			}
		}
		return $list;
	}
	
	function _buildViewQuery() {
		$where = $this->_buildViewWhere();
		
		$this->_query = "SELECT * FROM #__mijosef_sitemap {$where} ORDER BY sorder, {$this->filter_order} {$this->filter_order_Dir}, sparent";
	}

	// Query fileters
	function _buildViewWhere() {
		$where = array();
		
		$prefix = "";
		if ($this->filter_component != '-1') {
			$prefix = "s.";
		}
		
		// Search SEF URL
		if ($this->search_sef != '') {
			$src = parent::secureQuery($this->search_sef, true);
			$where[] = "LOWER({$prefix}url_sef) LIKE {$src}";
		}
		
		// Date Filter
		if ($this->filter_date != '') {
			$src = parent::secureQuery($this->filter_date);
			$where[] = "{$prefix}sdate = {$src}";
		}
		
		// Frequency Filter
		if ($this->filter_frequency != '-1') {
			$src = parent::secureQuery($this->filter_frequency);
			$where[] = "{$prefix}frequency = {$src}";
		}
	
		// Priority Filter
		if ($this->filter_priority != '-1') {
			$src = parent::secureQuery($this->filter_priority);
			$where[] = "{$prefix}priority = {$src}";
		}
		
		// Published Filter
		if ($this->filter_published != '-1') {
			$src = parent::secureQuery($this->filter_published);
			$where[] = "{$prefix}published = {$src}";
		}
		
		// Search ID
		if ($this->search_id != '') {
			$src = parent::secureQuery($this->search_id);
			$where[]= "{$prefix}id = {$src}";
		}
		
		// Search Parent
		if ($this->search_parent != '') {
			$src = parent::secureQuery($this->search_parent);
			$where[]= "{$prefix}sparent = {$src}";
		}
		
		// Search Order
		if ($this->search_order != '') {
			$src = parent::secureQuery($this->search_order);
			$where[]= "{$prefix}sorder = {$src}";
		}
		
		// Implode where
		$where = (count($where) ? ' WHERE '. implode(' AND ', $where) : '');
		
		// Component Filter
		if ($this->filter_component != '-1') {
			$src = $this->_db->escape($this->filter_component, true);
			
			// Get ids
			$where = str_replace(' WHERE ', ' AND ', $where);
			$ids = MijoDatabase::loadResultArray("SELECT s.id FROM #__mijosef_sitemap AS s, #__mijosef_urls AS u WHERE s.url_sef = u.url_sef AND u.url_real LIKE '%option={$src}%' {$where}");
			
			$where = '';
			if (count($ids) > 0) {
				$where = ' WHERE id IN (' . implode(', ', $ids) . ')';
			}
		}
		
		return $where;
	}
	
	function getEditData($table) {
		// Get vars
		$cid = JRequest::getVar('cid', array(0), 'method', 'array');
		$id = $cid[0];
		
		$row = null;
		
		// Load the record
		if (is_numeric($id)) {
			$row = Mijosef::getTable($table); 
			$row->load($id);
			
			$metadata = MijoDatabase::loadObject("SELECT * FROM #__mijosef_metadata WHERE url_sef = '{$row->url_sef}'");
			
			$row->meta_title = null;
			if (!empty($metadata)) {
				$row->meta_title = $metadata->title;
			}
		}
	
		return $row;
	}
	
	function _saveMetaTitle($url_sef, $title) {
		MijoDatabase::query("INSERT IGNORE INTO #__mijosef_metadata (url_sef, title) VALUES ('{$url_sef}', '{$title}')");
		MijoDatabase::query("UPDATE #__mijosef_metadata SET title = '{$title}' WHERE url_sef = '{$url_sef}'");
	}
}