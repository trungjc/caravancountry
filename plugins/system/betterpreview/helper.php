<?php
/**
 * Plugin Helper File
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

/**
 * Plugin that cleans cache
 */
class plgSystemBetterPreviewHelper
{
	function __construct(&$params)
	{
		$this->params = $params;
	}

	function getItemId($url)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select($db->quoteName('id'))
			->from('#__menu')
			->where($db->quoteName('link') . ' = ' . $db->quote($url));
		$db->setQuery($query);
		return $db->loadResult();
	}
}
