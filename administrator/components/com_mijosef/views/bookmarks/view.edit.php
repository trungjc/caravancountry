<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @subpackage	MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// View Class
class MijosefViewBookmarks extends MijosefView {
	
	// Edit
	function edit($tpl = null) {
		$row = $this->getModel()->getEditData('MijosefBookmarks');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_BOOKMARKS').': '.$row->name, 'mijosef');
        JToolBarHelper::save('editSave');
        JToolBarHelper::apply('editApply');
        JToolBarHelper::cancel('editCancel');
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/social-bookmarks?tmpl=component', 650, 500);
		
		// Published list
		$select_published = array();
		$select_published[] = JHTML::_('select.option', $this->MijosefConfig->ilinks_published, JTEXT::_('Use Global'));
		$select_published[] = JHTML::_('select.option', '1', JTEXT::_('Yes'));
		$select_published[] = JHTML::_('select.option', '0', JTEXT::_('No'));
   	   	$lists['published'] = JHTML::_('select.genericlist', $select_published, 'published', 'class="inputbox" size="1" style="width: 80px;"','value', 'text', $row->published);
		
		// Type list
		$select_type = array();
		$select_type[] = JHTML::_('select.option', $this->MijosefConfig->bookmarks_type, JTEXT::_('Use Global'));
		$select_type[] = JHTML::_('select.option', 'icon', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_1'));
		$select_type[] = JHTML::_('select.option', 'iconset', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_2'));
		$select_type[] = JHTML::_('select.option', 'badge', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_3'));
   	   	$lists['type'] = JHTML::_('select.genericlist', $select_type, 'btype', 'class="inputbox" size="1" style="width: 100px;"','value', 'text', $row->btype);
		
		// Modify placeholder
		$row->placeholder = str_replace('{mijosef ', '', $row->placeholder);
		$row->placeholder = str_replace('}', '', $row->placeholder);
		
		// Assign values
		$this->row      = $row;
		$this->lists    = $lists;

		parent::display($tpl);
	}
}
?>