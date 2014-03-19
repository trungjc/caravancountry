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
class MijosefViewIlinks extends MijosefView {
	
	// Edit
	function edit($tpl = null) {
		$row = $this->getModel()->getEditData('MijosefIlinks');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_ILINKS').': '.$row->word, 'mijosef');
        JToolBarHelper::save('editSave');
        JToolBarHelper::apply('editApply');
        JToolBarHelper::cancel('editCancel');
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/internal-links?tmpl=component', 650, 500);
		
		// Published list
		$select_published = array();
		$select_published[] = JHTML::_('select.option', $this->MijosefConfig->ilinks_published, JTEXT::_('Use Global'));
		$select_published[] = JHTML::_('select.option', '1', JTEXT::_('Yes'));
		$select_published[] = JHTML::_('select.option', '0', JTEXT::_('No'));
   	   	$lists['published'] = JHTML::_('select.genericlist', $select_published, 'published', 'class="inputbox" size="1" style="width: 100px;"','value', 'text', $row->published);
		
		// Nofollow list
		$select_nofollow = array();
		$select_nofollow[] = JHTML::_('select.option', $this->MijosefConfig->ilinks_nofollow, JTEXT::_('Use Global'));
		$select_nofollow[] = JHTML::_('select.option', '0', JTEXT::_('No'));
		$select_nofollow[] = JHTML::_('select.option', '1', JTEXT::_('Yes'));
   	   	$lists['nofollow'] = JHTML::_('select.genericlist', $select_nofollow, 'nofollow', 'class="inputbox" size="1" style="width: 100px;"','value', 'text', $row->nofollow);
		
		// Target_blank list
		$select_blank = array();
		$select_blank[] = JHTML::_('select.option', $this->MijosefConfig->ilinks_blank, JTEXT::_('Use Global'));
		$select_blank[] = JHTML::_('select.option', '0', JTEXT::_('No'));
		$select_blank[] = JHTML::_('select.option', '1', JTEXT::_('Yes'));
   	   	$lists['blank'] = JHTML::_('select.genericlist', $select_blank, 'iblank', 'class="inputbox" size="1" style="width: 100px;"','value', 'text', $row->iblank);
		
		if ($row->ilimit == "") {
			$row->ilimit = $this->MijosefConfig->ilinks_limit;
		}
		
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