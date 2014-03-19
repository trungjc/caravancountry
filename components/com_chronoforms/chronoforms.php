<?php
/**
* CHRONOFORMS version 4.0
* Copyright (c) 2006 - 2011 Chrono_Man, ChronoEngine.com. All rights reserved.
* Author: Chrono_Man (ChronoEngine.com)
* @license		GNU/GPL
* Visit http://www.ChronoEngine.com for regular updates and information.
**/
/* ensure that this file is called by another file */
defined('_JEXEC') or die('Restricted access');
define('DS', DIRECTORY_SEPARATOR);

if(!class_exists('JParameter')){
	class JParameter{
		var $params = null;
		
		function __construct($string = ''){
			if(is_array($string)){
				$this->params = $string;
			}else{
				$this->setParams($string);
			}
		}
		
		function get($k, $v = null){
			if(array_key_exists($k, $this->params)){
				return $this->params[$k];
			}else{
				return $v;
			}
		}
		
		function set($k, $v){
			$this->params[$k] = $v;
		}
		
		function setParams($string = ''){
			if(strlen(trim(($string))) > 0){
				$data = json_decode($string, true);
				$this->params = $data;
			}else{
				$this->params = array();
			}
		}
		
		function toString(){
			return json_encode($this->params);
		}
		
		function toArray(){
			return $this->params;
		}
		
		function toObject(){
			return json_decode(json_encode($this->params));
		}
	}
}
/**
 * Load the HTML class
 */
//require_once(JApplicationHelper::getPath('front_html'));
require_once(JPATH_SITE.DS.'components'.DS.'com_chronoforms'.DS.'chronoforms.html.php');
//require_once(JApplicationHelper::getPath('class'));

require_once(JPATH_BASE.DS.'includes'.DS.'defines.php');
require_once(JPATH_BASE.DS.'includes'.DS.'framework.php');
$mainframe = JFactory::getApplication('site');
//$mainframe->initialise();
//load chronoforms classes
require_once(JPATH_BASE.DS.'components'.DS.'com_chronoforms'.DS.'libraries'.DS.'chronoform.php');
jimport('joomla.application.component.controller');
jimport('joomla.application.component.helper');
jimport('joomla.html.parameter');

$mainframe = JFactory::getApplication();
$formname = JRequest::getVar('chronoform');
$event = JRequest::getVar('event');

if(empty($formname)){
	$params = $mainframe->getPageParameters('com_chronoforms');
	$formname = $params->get('formname');
	if(empty($event)){
		$event = $params->get('event');
	}
}
$MyForm = CFChronoForm::getInstance($formname);
if(empty($MyForm->form_name)){
	echo "There is no form with this name or may be the form is unpublished, Please check the form and the url and the form management.";
	return;
}

//Main switch statement
if(empty($event)){
	$event = 'load';
}
process($MyForm, $event);
/*switch($task){
	case 'submit':
		process($MyForm, 'submit');
		break;
	default:
		process($MyForm, $task);
		break;
}*/

function process($form, $event = ''){
	$form->process($event);
	HTML_ChronoForms::processView($form);
}
?>