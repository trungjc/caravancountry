<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No permission
defined('_JEXEC') or die('Restricted Access');

// Controller Class
class MijosefControllerTagsMap extends MijosefController {
	
	// Main constructer
	function __construct() {
        if (!JFactory::getUser()->authorise('tags', 'com_mijosef')) {
            return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
        }

		parent::__construct('tagsmap', 'tags_map');
	}
	
	// Publish
	function publish() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		$urls = self::_getURLs();
		if (is_array($urls) && !empty($urls)) {
			foreach($urls as $url) {
				$this->_model->publish($url);
			}
		}
		
		// Return
		$tag = trim(JRequest::getString('tag'));
		$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=view&tag='.$tag.'&tmpl=component');
	}
	
	// Unpublish
	function unpublish() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		$urls = self::_getURLs();
		if (is_array($urls) && !empty($urls)) {
			foreach($urls as $url) {
				$this->_model->unpublish($url);
			}
		}
		
		// Return
		$tag = trim(JRequest::getString('tag'));
		$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=view&tag='.$tag.'&tmpl=component');
	}
	
	function _getURLs() {
		$where = parent::_getWhere($this->_model, 'u.');
		if (!$urls = MijoDatabase::loadResultArray("SELECT u.url_sef FROM #__mijosef_urls AS u, #__mijosef_metadata AS m {$where}")) {
			return false;
		}
		
		return $urls;
	}
}
?>