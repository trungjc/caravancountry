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

// Upgrade View Class
class MijoSEFViewUpgrade extends MijosefView {
	
	// View
	function view($tpl = null) {		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_UPGRADE'), 'mijosef');
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/installation-upgrading/upgrade?tmpl=component', 650, 500);
		
		$versions = array(2);
		$version_info = Mijosef::get('utility')->getRemoteInfo();
		$versions['latest'] = $version_info['mijosef'];
		$versions['installed'] = Mijosef::get('utility')->getXmlText(JPATH_MIJOSEF_ADMIN.'/a_mijosef.xml', 'version');
		
		$this->versions = $versions;
		
		parent::display($tpl);
	}
}
