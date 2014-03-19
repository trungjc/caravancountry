<?php
/**
 * Generate SEF URLs page
 * Converts URLs to frontend SEF
 *
 * @package         Better Preview
 * @version         3.2.1
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2014 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

if (JFactory::getApplication()->isAdmin())
{
	die;
}

// need to set the user agent, to prevent breaking when debugging is switched on
$_SERVER['HTTP_USER_AGENT'] = '';

$db = JFactory::getDBO();

// log into frontend
if (!JFactory::getUser()->id)
{
	$app = JFactory::getApplication();

	$query = $db->getQuery(true)
		->select('userid')
		->from('#__session')
		->where('session_id = ' . $db->quote($app->input->get('session')))
		->where('client_id = 1')
		->where('guest = 0');
	$db->setQuery($query);
	$userid = $db->loadResult();
	$user = JFactory::getUser($userid);

	if (!($user instanceof Exception))
	{
		$session = JFactory::getSession();
		$session->set('user', $user);
		$app->checkSession();
	}
}

// get all outdated urls
$date = JFactory::getDate('now - 1 day');
$query = $db->getQuery(true)
	->select('a.url')
	->from('#__betterpreview_sefs as a')
	->where('a.created < ' . $db->quote($date->toSql()));
$db->setQuery($query);
$urls = $db->loadColumn();
if (!$urls)
{
	$urls = array();
}

if (count($urls) < 50)
{
	// while we're loading this page anyway, lets update some more
	$date = JFactory::getDate('now - 1 hour');
	$query = $db->getQuery(true)
		->select('a.url')
		->from('#__betterpreview_sefs as a')
		->where('a.created < ' . $db->quote($date->toSql()))
		->order('a.created ASC');
	$db->setQuery($query, 0, 50);
	$urls = $db->loadColumn();
	if (!$urls)
	{
		$urls = array();
	}
}

if (count($urls) < 50)
{
	// still not much to do? lets also add/update some random menu urls
	$date = JFactory::getDate('now - 1 hour');
	$query = $db->getQuery(true)
		->select('CONCAT(a.link, \'&Itemid=\', a.id)')
		->from('#__menu as a')
		->where('a.client_id = 0')
		->where('a.type != ' . $db->quote('alias'))
		->where('a.type != ' . $db->quote('url'))
		->where('a.link != ' . $db->quote(''))
		->order('RAND()');
	$db->setQuery($query, 0, 50);
	$menuitems = $db->loadColumn();
	if (!$menuitems)
	{
		$menuitems = array();
	}

	$query = $db->getQuery(true)
		->select('a.url')
		->from('#__betterpreview_sefs as a')
		->where('a.url IN (\'' . implode('\',\'', $menuitems) . '\')');
	$db->setQuery($query);
	$sefs = $db->loadColumn();
	if (!$sefs)
	{
		$sefs = array();
	}
	$menuitems = array_diff($menuitems, $sefs);

	$urls = array_merge($urls, $menuitems);
}

if (empty($urls))
{
	die('no sefs to update');
}

$query->clear()
	->delete('#__betterpreview_sefs')
	->where($db->quoteName('url') . ' IN (\'' . implode('\',\'', $urls) . '\')');
$db->setQuery($query);
$db->execute();

$date = JFactory::getDate();
$query->clear()
	->insert('#__betterpreview_sefs')
	->columns(array($db->quoteName('url'), $db->quoteName('sef'), $db->quoteName('created')));
foreach ($urls as $url)
{
	if (!$url || substr($url, 0, 4) != 'http')
	{
		$sef = JRoute::_($url);
		if ($sef && ($sef == $url || $sef == '/' . $url))
		{
			continue;
		}
	}
	else
	{
		$sef = $url;
	}
	$query->values($db->quote($url) . ',' . $db->quote($sef) . ',' . $db->quote($date->toSql()));
}
$db->setQuery($query);
$db->execute();

die('sefs updated');
