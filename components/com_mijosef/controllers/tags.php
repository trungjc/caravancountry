<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

//No Permision
defined( '_JEXEC' ) or die( 'Restricted access' );

// Imports
jimport('joomla.application.component.controller');

if (!class_exists('MijosoftController')) {
	if (interface_exists('JController')) {
		abstract class MijosoftController extends JControllerLegacy {}
	}
	else {
		class MijosoftController extends JController {}
	}
}

class MijosefControllerTags extends MijosoftController {

	function display() {
		$model = $this->getModel('Tags');
		
		$view = $this->getView('Tags', 'html');	
		$view->setModel($model, true);	
		$view->display();		
	}
}