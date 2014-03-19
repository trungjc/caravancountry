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
class MijosefViewTags extends MijosefView {
	
	// Edit
	function edit($tpl = null) {
		$row = $this->getModel()->getEditData('MijosefTags');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_TAGS').': '.$row->title, 'mijosef');
        JToolBarHelper::save('editSave');
        JToolBarHelper::apply('editApply');
        JToolBarHelper::cancel('editCancel');
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/tags?tmpl=component', 650, 500);
		
		// Published list
		$select_published = array();
		$select_published[] = JHTML::_('select.option', $this->MijosefConfig->tags_published, JTEXT::_('Use Global'));
		$select_published[] = JHTML::_('select.option', '1', JTEXT::_('Yes'));
		$select_published[] = JHTML::_('select.option', '0', JTEXT::_('No'));
   	   	$lists['published'] = JHTML::_('select.genericlist', $select_published, 'published', 'class="inputbox" size="1" style="width: 100px;"','value', 'text', $row->published);
		
		// Get jQuery
		//if ($this->MijosefConfig->jquery_mode == 1) {
			//$this->document->addScript('components/com_mijosef/assets/js/jquery-1.4.2.min.js');
			$this->document->addScript('components/com_mijosef/assets/js/jquery.bgiframe.min.js');
			$this->document->addScript('components/com_mijosef/assets/js/jquery.autocomplete.js');
		//}
		
		// Assign values
        $this->row = $row;
        $this->lists = $lists;

		parent::display($tpl);
	}
}
?>