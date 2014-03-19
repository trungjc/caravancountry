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
class MijosefModelBookmarks extends MijosefModel {
	
	// Main constructer
	function __construct() {
		parent::__construct('bookmarks');
		
		$this->_getUserStates();
		$this->_buildViewQuery();
	}
	
	function _getUserStates() {
		$this->filter_order		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order',		'filter_order',		'name');
		$this->filter_order_Dir	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_order_Dir',	'filter_order_Dir',	'ASC');
        $this->search_name		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_name', 		'search_name', 		'');
		$this->filter_type		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_type', 		'filter_type', 		'-1');
		$this->search_ph		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_ph', 		'search_ph', 		'');
		$this->filter_published	= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.filter_published',	'filter_published',	'-1');
		$this->search_id		= parent::_getSecureUserState($this->_option . '.' . $this->_context . '.search_id', 		'search_id', 		'');
		$this->search_name		= JString::strtolower($this->search_name);
		$this->search_ph		= JString::strtolower($this->search_ph);
		$this->search_id		= JString::strtolower($this->search_id);
	}
	
	function getToolbarSelections() {
		$toolbar = new stdClass();
		
        // Actions
        $act[] = JHTML::_('select.option', 'delete', JText::_('Delete'));
		$act[] = JHTML::_('select.option', 'sep', '---');
		if ($this->MijosefConfig->ui_bookmarks_published == 1) {
	        $act[] = JHTML::_('select.option', 'publish', JText::_('Publish'));
	        $act[] = JHTML::_('select.option', 'unpublish', JText::_('COM_MIJOSEF_TOOLBAR_PUBLISH_UN'));
			$act[] = JHTML::_('select.option', 'sep', '---');
		}
        $act[] = JHTML::_('select.option', 'backup', JText::_('COM_MIJOSEF_TOOLBAR_BACKUP'));
        $toolbar->action = JHTML::_('select.genericlist', $act, 'bookmarks_action', 'class="inputbox" style="width: 120px;" size="1"');
		
		// Selections
        $sel[] = JHTML::_('select.option', 'selected', JText::_('COM_MIJOSEF_TOOLBAR_SELECTED'));
        $sel[] = JHTML::_('select.option', 'filtered', JText::_('COM_MIJOSEF_TOOLBAR_FILTERED'));
        $toolbar->selection = JHTML::_('select.genericlist', $sel, 'bookmarks_selection', 'class="inputbox" style="width: 120px;" size="1"');
		
		// Button
        $toolbar->button = '<input type="button" class="btn btn-primary" value="'.JText::_('Apply').'" onclick="apply();" />';
		
		return $toolbar;
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
		
		// Search name
        $lists['search_name'] = "<input type=\"text\" name=\"search_name\" value=\"{$this->search_name}\" size=\"40\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";
		
		// Type Filter
		$type_list[] = JHTML::_('select.option', '-1', JText::_('COM_MIJOSEF_COMMON_SELECT'));
		$type_list[] = JHTML::_('select.option', 'icon', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_1'));
		$type_list[] = JHTML::_('select.option', 'iconset', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_2'));
		$type_list[] = JHTML::_('select.option', 'badge', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_3'));
   	   	$lists['type_list'] = JHTML::_('select.genericlist', $type_list, 'filter_type', 'class="inputbox" size="1" style="width: 80px;"'.$javascript, 'value', 'text', $this->filter_type);
		
		// Search placeholder
        $lists['search_ph'] = "<input type=\"text\" name=\"search_ph\" value=\"{$this->search_ph}\" size=\"30\" style=\"width: 150px;\" maxlength=\"255\" onchange=\"document.adminForm.submit();\" />";

		// Published Filter
        if ($this->MijosefConfig->ui_bookmarks_published == 1) {
			$published_list[] = JHTML::_('select.option', '-1', JText::_('COM_MIJOSEF_COMMON_SELECT'));
			$published_list[] = JHTML::_('select.option', '1', JText::_('Yes'));
			$published_list[] = JHTML::_('select.option', '0', JText::_('No'));
	   	   	$lists['published_list'] = JHTML::_('select.genericlist', $published_list, 'filter_published', 'class="inputbox" size="1" style="width: 80px;"'.$javascript, 'value', 'text', $this->filter_published);
        }
        
		// Search ID
        if ($this->MijosefConfig->ui_bookmarks_id == 1) {
        	$lists['search_id'] = "<input type=\"text\" name=\"search_id\" value=\"{$this->search_id}\" size=\"3\" maxlength=\"10\" style=\"width: 30px;\" onchange=\"document.adminForm.submit();\" style=\"text-align: center\" />";
        }
        
		return $lists;
	}

	// Query filters
	function _buildViewWhere() {
		$where = array();
		
		// Search name
		if ($this->search_name != '') {
			$src = parent::secureQuery($this->search_name, true);
			$where[] = "LOWER(name) LIKE {$src}";
		}
		
		// Type Filter
		if ($this->filter_type != -1) {
			$filter_type = $this->_db->escape($this->filter_type);
			$where[] = "btype = '".$filter_type."'";
		}
		
		// Search placeholder
		if ($this->search_ph != '') {
			$src = parent::secureQuery($this->search_ph, true);
			$where[] = "LOWER(placeholder) LIKE {$src}";
		}
		
		// Published Filter
		if ($this->filter_published != -1) {
			$src = parent::secureQuery($this->filter_published);
			$where[] = "published = {$src}";
		}
		
		// Search ID
		if ($this->search_id != '') {
			$src = parent::secureQuery($this->search_id);
			$where[]= "id = {$src}";
		}
		
		// Execute
		$where = (count($where) ? ' WHERE '. implode(' AND ', $where) : '');
		
		return $where;
	}
}
?>