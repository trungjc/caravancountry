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
class MijosefControllerIlinks extends MijosefController {
	
	// Main constructer
	function __construct() 	{
        if (!JFactory::getUser()->authorise('ilinks', 'com_mijosef')) {
            return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
        }

		parent::__construct('ilinks');
	}
	
	// Nofollow
	function nofollow() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		parent::updateField($this->_context, 'nofollow', 1, $this->_model);
		
		// Return
		parent::route();
		//echo '<img src="components/com_mijosef/assets/images/icon-16-nofollow-on.png" border="0" />';
	}
	
	// Unnofollow
	function unnofollow() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		parent::updateField($this->_context, 'nofollow', 0, $this->_model);
		
		// Return
		parent::route();
	}
	
	// Blank
	function blank() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		parent::updateField($this->_context, 'iblank ', 1, $this->_model);
		
		// Return
		parent::route();
	}
	
	// Unblank
	function unblank() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Action
		parent::updateField($this->_context, 'iblank ', 0, $this->_model);
		
		// Return
		parent::route();
	}
	
	function cache() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'word', '*', 1, $this->_model);
		
		// Return
		parent::route();
	}
	
	function uncache() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'word', '*', 0, $this->_model);
		
		// Return
		parent::route();
	}
}
?>