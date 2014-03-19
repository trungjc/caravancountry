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

class MijosefViewTags extends MijosoftView {

	function display($tpl = null) {
		$MijosefConfig	= Mijosef::getConfig();
		$mainframe 		= JFactory::getApplication();
		$document		= JFactory::getDocument();
		$jconfig		= JFactory::getConfig();
		$params 		= $mainframe->getParams();
		$pathway 		= $mainframe->getPathway();
		$menu			= $mainframe->getMenu()->getActive();
		
		$this->data = false;
		
		$this->tag = trim(JRequest::getString('tag', null));
		
		if ($this->tag == '0') {
			$params->set('page_title', JText::_('All Tags'));
		} 
		elseif ($this->tag != '') {
			$params->set('page_title', $this->tag);
			$pathway->addItem($this->escape($this->tag));
			
			$this->data = $this->get('Data');
		}
		
		$title = $params->get('page_title', '');
		if (!empty($title)) {
			$document->setTitle($title);

			if ($jconfig->getValue('MetaTitle')) {
				$document->setMetadata('title', $title);
			}
		}

		$this->MijosefConfig 	= $MijosefConfig;
		$this->params 			= $params;
		$this->items			= $this->get('Items');
		$this->pagination 		= $this->get('Pagination');
		
		parent::display($tpl);
	}
}