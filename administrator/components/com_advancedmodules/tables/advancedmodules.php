<?php
/**
 * Table class: advancedmodules
 *
 * @package         Advanced Module Manager
 * @version         4.8.3
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2013 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

class AdvancedModulesTable extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__advancedmodules', 'moduleid', $db);
	}

	protected function _getAssetName()
	{
		$k = $this->_tbl_key;
		return 'com_advancedmodules.module.' . (int) $this->$k;
	}

	protected function _getAssetTitle()
	{
		if (isset($this->_title))
		{
			return $this->_title;
		}

		return $this->_getAssetName();
	}

	/**
	 * Method to get the parent asset id for the record
	 *
	 * @param   JTable   $table  A JTable object for the asset parent
	 * @param   integer  $id
	 *
	 * @return  integer
	 *
	 * @since   11.1
	 */
	protected function getAssetParentId(JTable $table = null, $id = null)
	{
		// Initialise variables.
		$assetId = null;
		$db = $this->getDbo();

		$query = $db->getQuery(true)
			->select('id')
			->from('#__assets')
			->where('name = ' . $db->quote('com_advancedmodules'));

		// Get the asset id from the database.
		$db->setQuery($query);
		if ($result = $db->loadResult())
		{
			$assetId = (int) $result;
		}

		// Return the asset id.
		if ($assetId)
		{
			return $assetId;
		}
		else
		{
			return parent::_getAssetParentId($table, $id);
		}
	}
}

/* Fix for difference in JTable::_getAssetParentId method declaration between Joomla 3.1 and 3.2
 * This can be removed after support for Joomla 3.1 is ended
 */
if (version_compare(JVERSION, '3.2', 'lt'))
{
	class AdvancedModulesTableAdvancedModules extends AdvancedModulesTable
	{
		protected function _getAssetParentId($table = null, $id = null)
		{
			return parent::getAssetParentId($table, $id);
		}
	}
}
else
{
	class AdvancedModulesTableAdvancedModules extends AdvancedModulesTable
	{
		protected function _getAssetParentId(JTable $table = null, $id = null)
		{
			return parent::getAssetParentId($table, $id);
		}
	}
}
