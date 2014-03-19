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
class MijosefControllerSitemap extends MijosefController {

	// Main constructer
	function __construct() 	{
        if (!JFactory::getUser()->authorise('sitemap', 'com_mijosef')) {
            return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
        }

		parent::__construct('sitemap');
	}
	
	// Apply changes
	function apply() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->apply();
		
		// Return
		parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_SAVED'));
	}
	
	function generateItems() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		if ($this->_model->generateItems()) {
			$msg = JText::_('COM_MIJOSEF_SITEMAP_ITEMS_GENERATED_OK');
		} else {
			$msg = JText::_('COM_MIJOSEF_SITEMAP_ITEMS_GENERATED_NO');
		}
		
		// Return
		parent::route($msg);
	}
	
	// Generate XML
	function generateXML() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$msg = Mijosef::get('sitemap')->generateXML();
		
		// Return
		if($msg == ""){
			parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_GENERATED_OK'));
		} elseif($msg == "empty"){
			parent::route();
			JError::raiseWarning('100', JText::sprintf('COM_MIJOSEF_SITEMAP_GENERATED_EMPTY'));
		} else {
			parent::route();
			JError::raiseWarning('100', JText::sprintf($msg));
		}
	}
	
	function cache() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'url_sef', '*', 1, $this->_model);
		
		// Return
		parent::route();
	}
	
	function uncache() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
	
		// Action
		parent::updateCache($this->_context, 'url_sef', '*', 0, $this->_model);
		
		// Return
		parent::route();
	}
	
	function setParent() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$parent = JRequest::getCmd('newparent', null, 'post');
		
		// Action
		parent::updateField($this->_context, 'sparent', $parent, $this->_model);
		
		// Return
		parent::route();
    }
	
	function setDate() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$date = JRequest::getCmd('newdate', null, 'post');
		
		// Action
		parent::updateField($this->_context, 'sdate', $date, $this->_model);
		
		// Return
		parent::route();
    }
	
	function setFrequency() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$frequency = JRequest::getCmd('newfrequency', null, 'post');
		
		// Action
		parent::updateField($this->_context, 'frequency', $frequency, $this->_model);
		
		// Return
		parent::route();
    }
	
	function setPriority() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$priority = JRequest::getCmd('newpriority', null, 'post');
		
		// Action
		parent::updateField($this->_context, 'priority', $priority, $this->_model);
		
		// Return
		parent::route();
    }
	
	// Ping Google
	function pingGoogle() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$msg = Mijosef::get('sitemap')->pingGoogle();
		if($msg == ""){
			parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_PINGED_OK'));
		} else {
			parent::route();
			JError::raiseWarning('100', JText::sprintf('COM_MIJOSEF_SITEMAP_PINGED_NO'." ".$msg));
		}
	}
	
	// Ping Yahoo
	function pingYahoo() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$msg = Mijosef::get('sitemap')->pingYahoo();
		if($msg == ""){
			parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_PINGED_OK'));
		} else {
			parent::route();
			JError::raiseWarning('100', JText::sprintf('COM_MIJOSEF_SITEMAP_PINGED_NO'." ".$msg));
		}
	}
	
	// Ping Bing
	function pingBing() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$msg = Mijosef::get('sitemap')->pingBing();
		if($msg == ""){
			parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_PINGED_OK'));
		} else {
			parent::route();
			JError::raiseWarning('100', JText::sprintf('COM_MIJOSEF_SITEMAP_PINGED_NO'." ".$msg));
		}
	}
	
	// Ping Services
	function pingServices() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		$services = explode(', ', $this->MijosefConfig->sm_ping_services);
		foreach ($services as $service) {
			$msg = implode(" | ", Mijosef::get('sitemap')->pingServices($service));
			JError::raiseNotice('100', $msg);
		}
		// Return
		parent::route();
	}
	
	// Save parent field
	function saveParent() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->saveParent();
		
		// Return
		parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_PARENT_SAVED'));
	}
        
	// Save order field
	function saveOrder() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->saveOrder();
		
		// Return
		parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_ORDER_SAVED'));
	}
	
	// Order up
	function orderUp() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->orderItem('-1');
		
		// Return
		parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_ORDER_SAVED'));
	}
	
	// Order down
	function orderDown() {
		if(empty($this->MijosefConfig->pid)){
			JError::raiseWarning(500, "Invalid Personal ID, please enter your Personal ID in Configuration section.");
			return;
		}
		
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Save
		$this->_model->orderItem('+1');
		
		// Return
		parent::route(JTEXT::_('COM_MIJOSEF_SITEMAP_ORDER_SAVED'));
	}
	
	// Save changes
	function editSave() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Get post
		$post = JRequest::get('post');
		
		// Save record
		$table = 'Mijosef' . ucfirst($this->_context);
		if (!self::saveRecord($post, $table, $post['id'])) {
			return JError::raiseWarning(500, JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED_NOT'));
		} else {
			if (!empty($post['meta_title'])) {
				$this->_model->_saveMetaTitle($post['url_sef'], $post['meta_title']);
			}
			
			if ($post['modal'] == '1') {
				// Display message
				JFactory::getApplication()->enqueueMessage(JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED'));
			} else {
				// Return
				self::route(JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED'));
			}
		}
	}
	
	// Apply changes
	function editApply() {
		// Check token
		JRequest::checkToken() or jexit('Invalid Token');
		
		// Get post
		$post = JRequest::get('post');
		
		// Save record
		$table = 'Mijosef' . ucfirst($this->_context);
		if (!self::saveRecord($post, $table, $post['id'])) {
			return JError::raiseWarning(500, JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED_NOT'));
		} else {
			if (!empty($post['meta_title'])) {
				$this->_model->_saveMetaTitle($post['url_sef'], $post['meta_title']);
			}
			
			if ($post['modal'] == '1') {
				// Return
				$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=edit&cid[]='.$post['id'].'&tmpl=component', JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED'));
			} else {
				// Return
				$this->setRedirect('index.php?option='.$this->_option.'&controller='.$this->_context.'&task=edit&cid[]='.$post['id'], JText::_('COM_MIJOSEF_COMMON_RECORD_SAVED'));
			}
		}
	}
}