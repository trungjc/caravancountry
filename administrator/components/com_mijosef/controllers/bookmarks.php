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
class MijosefControllerBookmarks extends MijosefController {
	
	// Main constructer
	function __construct() 	{
        if (!JFactory::getUser()->authorise('bookmarks', 'com_mijosef')) {
            return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
        }

		parent::__construct('bookmarks');
	}
	
	// Save changes
	function editSave() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Get post
		$post = JRequest::get('post');
		if (isset($post['placeholder'])) {
			$post['placeholder'] = '{mijosef '.$post['placeholder'].'}';
		}
		$post['html'] = JRequest::getVar('html', '', 'post', 'string', JREQUEST_ALLOWRAW);
		
		// Save record
		$table = 'Mijosef' . ucfirst($this->_context);
		if (!MijosefController::saveRecord($post, $table, $post['id'])) {
			return JError::raiseWarning(500, JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED_NOT'));
		} else {
			if ($post['modal'] == '1') {
				// Display message
				JFactory::getApplication()->enqueueMessage(JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED'));
			} else {
				// Return
				parent::route(JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED'));
			}
		}
	}
	
	// Apply changes
	function editApply() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Get post
		$post = JRequest::get('post');
		if (isset($post['placeholder'])) {
			$post['placeholder'] = '{mijosef '.$post['placeholder'].'}';
		}
		$post['html'] = JRequest::getVar('html', '', 'post', 'string', JREQUEST_ALLOWRAW);
		
		// Save record
		$table = 'Mijosef' . ucfirst($this->_context);
		if (!MijosefController::saveRecord($post, $table, $post['id'])) {
			return JError::raiseWarning(500, JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED_NOT'));
		} else {
			if ($post['modal']== '1') {
				// Return
				$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=edit&cid[]='.$post['id'].'&tmpl=component', JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED'));
			} else {
				// Return
				$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=edit&cid[]='.$post['id'], JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED'));
			}
		}
	}
}
?>