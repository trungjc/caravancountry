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
class MijosefViewMovedUrls extends MijosefView {

	// Edit URL
	function edit($tpl = null) {
		$row = $this->getModel()->getEditData('MijosefMovedUrls');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_URLS_MOVED').': '.$row->url_old, 'mijosef');
        JToolBarHelper::save('editSave');
        JToolBarHelper::apply('editApply');
        JToolBarHelper::cancel('editCancel');
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/urls?tmpl=component', 650, 500);
		
		// Options array
		$select = array();
		$select[] = JHTML::_('select.option', '1', JTEXT::_('Yes'));
		$select[] = JHTML::_('select.option', '0', JTEXT::_('No'));
		
		// Published list
   	   	$lists['published'] = JHTML::_('select.genericlist', $select, 'published', 'class="inputbox" size="1" style="width: 80px;"','value', 'text', $row->published);
		
		// Get behaviors
		JHTML::_('behavior.modal', 'a.modal', array('onClose'=>'\function(){location.reload(true);}'));
		
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
	
	function getSefURL($id) {
		$url = "";
		
		if (is_numeric($id)) {
			$url = MijoDatabase::loadResult("SELECT url_sef FROM #__mijosef_urls WHERE id = {$id}");
		}
		
		return $url;
	}
}
?>