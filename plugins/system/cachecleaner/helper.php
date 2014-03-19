<?php
/**
 * Plugin Helper File
 *
 * @package         Cache Cleaner
 * @version         3.3.2
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
class plgSystemCacheCleanerHelper
{
	function __construct(&$params, $type = 'clean', $show_msg = 1, $show_size = 0)
	{
		// Load language for messaging
		JFactory::getLanguage()->load('mod_cachecleaner', JPATH_ADMINISTRATOR);

		list($final_state, $msg, $error) = $this->cleanCache($params, $type, $show_size);

		if (JFactory::getApplication()->input->getInt('break')) {
			echo ($final_state ? '+' : '') . $msg;
			die;
		} else if ($show_msg) {
			JFactory::getApplication()->enqueueMessage($msg, ($error ? 'error' : 'message'));
		}
	}

	function cleanCache(&$params, $type = 'clean', $show_size = 0)
	{
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');

		$ignore_folders = array();
		if (!empty($params->ignore_folders)) {
			$ignore_folders = explode("\n", str_replace('\n', "\n", $params->ignore_folders));
			foreach ($ignore_folders as $i => $folder) {
				if (trim($folder)) {
					$folder = str_replace('\\', '/', trim($folder));
					$folder = str_replace('//', '/', JPATH_SITE . '/' . $folder);
					$ignore_folders[$i] = $folder;
				}
			}
		}
		$final_state = 1;

		$size = 0;

		// remove all folders and files in cache folder
		$paths = array(JPATH_SITE, JPATH_ADMINISTRATOR);
		foreach ($paths as $path) {
			$path .= '/cache';
			list($final_state, $s) = $this->emptyFolder($path, $show_size, $ignore_folders);
			if ($show_size) {
				$size += $s;
			}
		}


		// Folders
		if ($type == 'clean'
			|| ($type == 'save' && $params->auto_save_folders)
		) {
			// Empty tmp folder
			if ($params->clean_tmp) {
				$path = JPATH_SITE . '/tmp';
				list($final_state, $s) = $this->emptyFolder($path, $show_size, $ignore_folders);
				if ($show_size) {
					$size += $s;
				}
			}
		}


		if ($params->purge) {
			$this->purgeCache($params);
		}
		if ($params->purge_updates) {
			$this->purgeUpdateCache();
		}

		$error = 0;
		if (!$final_state) {
			$msg = JText::_('CC_NOT_ALL_CACHE_COULD_BE_REMOVED');
			$error = 1;
		} else {
			$msg = JText::_('CC_CACHE_CLEANED');
		}

		if ($show_size && $size) {
			if ($size >= 1048576) {
				$size = (round($size / 1048576 * 100) / 100) . 'MB';
			} else {
				$size = (round($size / 1024 * 100) / 100) . 'KB';
			}
			$msg .= ' (' . $size . ')';
		}

		return array($final_state, $msg, $error);
	}

	function purgeCache(&$params)
	{
		$cache = JFactory::getCache();
		$cache->gc();
	}


	function emptyFolder($path, $show_size = 0, $ignore_folders = array())
	{
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');

		$success = 1;
		$size = 0;

		if (JFolder::exists($path)) {
			if ($show_size) {
				$size = $this->getFolderSize($path);
			}
			// remove folders
			$folders = JFolder::folders($path);
			foreach ($folders as $folder) {
				if (!in_array($path . '/' . $folder, $ignore_folders) && @opendir($path . '/' . $folder)) {
					$success = JFolder::delete($path . '/' . $folder);
					if ($success && $folder == 'com_zoo') {
						JFolder::create($path . '/' . $folder);
					}
				}
			}
			// remove files
			$files = JFolder::files($path);
			foreach ($files as $file) {
				if ($file != 'index.html' && !in_array($path . '/' . $file, $ignore_folders)) {
					$success = JFile::delete($path . '/' . $file);
				}
			}
			if ($show_size) {
				$size -= $this->getFolderSize($path);
			}
		}

		return array($success, $size);
	}

	function getFolderSize($path)
	{
		jimport('joomla.filesystem.file');

		if (JFile::exists($path)) {
			return @filesize($path);
		}

		jimport('joomla.filesystem.folder');
		if (!JFolder::exists($path) || !(@opendir($path))) {
			return 0;
		}

		$size = 0;
		foreach (JFolder::files($path) as $file) {
			$size += @filesize($path . '/' . $file);
		}
		foreach (JFolder::folders($path) as $folder) {
			if (@opendir($path . '/' . $folder)) {
				$size += $this->getFolderSize($path . '/' . $folder);
			}
		}

		return $size;
	}

	function purgeUpdateCache()
	{
		$db = JFactory::getDBO();
		$db->setQuery('TRUNCATE TABLE #__updates');
		if ($db->execute()) {
			// Reset the last update check timestamp
			$query = $db->getQuery(true)
				->update('#__update_sites')
				->set('last_check_timestamp = ' . $db->quote(0));
			$db->setQuery($query);
			$db->execute();
		}
	}
}
