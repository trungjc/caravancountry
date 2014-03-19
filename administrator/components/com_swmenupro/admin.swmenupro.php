<?php
/**
 * swmenupro v6.0
 * http://swmenupro.com
 * Copyright 2006 Sean White
 * */
// ensure this file is being included by a parent file
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ERROR );
// no direct access
defined('_JEXEC') or die('Restricted access');

if (!JFactory::getUser()->authorise('core.manage', 'com_swmenupro')) {
    return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}
include_once( JPATH_COMPONENT . '/swmenupro.php' );
?>
