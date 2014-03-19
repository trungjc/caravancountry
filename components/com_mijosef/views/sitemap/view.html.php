<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @subpackage	MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

//No Permision
defined('_JEXEC') or die('Restricted access');

// Imports
jimport('joomla.application.component.view');

if (!class_exists('MijosoftView')) {
	if (interface_exists('JView')) {
		abstract class MijosoftView extends JViewLegacy {}
	}
	else {
		class MijosoftView extends JView {}
	}
}

class MijosefViewSitemap extends MijosoftView {

	function display($tpl = null) {
		$mainframe = JFactory::getApplication();
		$document = JFactory::getDocument();
		$params = $mainframe->getParams();
		
		// Add page number to title
		$limit = $mainframe->getUserStateFromRequest('limit', 'limit', $params->get('display_num', $mainframe->getCfg('list_limit')), 'int');
		$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		if (!empty($limit) && !empty($limitstart)) {			
			$number = $limitstart / $limit; 
			$number++;

			$document->setTitle($params->get('page_title', '') . ' - ' . JText::_('PAGE') . ' ' . $number);
		}
		
		$this->params 			= $params;
		$this->items			= $this->get('Items');
		$this->pagination 		= $this->get('Pagination');
		
		parent::display($tpl);
	}
}