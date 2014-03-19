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

// Import View Class
class MijosefViewRestoreMigrate extends MijosefView {

	// View
	function view($tpl = null) {		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_RESTOREMIGRATE'), 'mijosef');
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/restore-migrate?tmpl=component', 650, 500);
		
		parent::display($tpl);
	}
}