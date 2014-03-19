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

// View Class
class MijosefViewSupport extends MijosefView {

	function display($tpl = null) {
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_SUPPORT'), 'mijosef');		
		JToolBarHelper::back(JText::_('Back'), 'index.php?option=com_mijosef');
		
		if (JRequest::getCmd('task', '') == 'translators') {
			$this->document->setCharset('iso-8859-9');
		}
		
		parent::display($tpl);
	}
}