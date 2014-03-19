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
class MijosefViewSitemap extends MijosefView {

	// Edit URL
	function edit($tpl = null) {
		$row = $this->getModel()->getEditData('MijosefSitemap');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_SITEMAP').': '.$row->url_sef, 'mijosef');
        JToolBarHelper::save('editSave');
        JToolBarHelper::apply('editApply');
        JToolBarHelper::cancel('editCancel');
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/sitemap?tmpl=component', 650, 500);
		
		// Date
		if($row->sdate == '0000-00-00' || $row->sdate == ''){
			$row->sdate = date('Y-m-d');
		}
		
		// Frequency
		if($row->frequency == ''){
			$row->frequency = $this->MijosefConfig->sm_freq;
		}
		
		// Priority
		if($row->priority == ''){
			$row->priority = $this->MijosefConfig->sm_priority;
		}
		
		// Priority
		if($row->sparent == ''){
			$row->sparent = '0';
		}
		
		// Get jQuery
		//if ($this->MijosefConfig->jquery_mode == 1) {
			//$this->document->addScript('components/com_mijosef/assets/js/jquery-1.4.2.min.js');
			$this->document->addScript('components/com_mijosef/assets/js/jquery.bgiframe.min.js');
			$this->document->addScript('components/com_mijosef/assets/js/jquery.autocomplete.js');
		//}
		
		// Assign values
        $this->row = $row;
		
		parent::display($tpl);
	}
}