<?php
/**
 * Main Plugin File
 * Does all the magic!
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
 * Button Plugin that places Editor Buttons
 */
class plgButtonBetterPreview extends JPlugin
{
	/**
	 * Display the button
	 *
	 * @return array A two element array of ( imageName, textToInsert )
	 */
	function onDisplay($name)
	{
		if (!$class = $this->getButtonHelper())
		{
			return;
		}

		jimport('joomla.filesystem.file');

		// return if system plugin is not installed
		if (!JFile::exists(JPATH_PLUGINS . '/system/' . $this->_name . '/' . $this->_name . '.php'))
		{
			return;
		}

		// return if NoNumber Framework plugin is not installed
		if (!JFile::exists(JPATH_PLUGINS . '/system/nnframework/nnframework.php'))
		{
			return;
		}

		// load the admin language file
		JFactory::getLanguage()->load('plg_' . $this->_type . '_' . $this->_name, JPATH_ADMINISTRATOR);

		// Load plugin parameters
		require_once JPATH_PLUGINS . '/system/nnframework/helpers/parameters.php';
		$parameters = NNParameters::getInstance();
		$params = $parameters->getPluginParams($this->_name);
		$params->class = $class;

		// Include the Helper
		require_once JPATH_PLUGINS . '/' . $this->_type . '/' . $this->_name . '/helper.php';
		$class = get_class($this) . 'Helper';
		$helper = new $class($params);

		return $helper->render($name, $this->_subject->getContent($name));
	}

	function getButtonHelper()
	{
		jimport('joomla.filesystem.file');

		$option = JFactory::getApplication()->input->get('option');
		$view = JFactory::getApplication()->input->get('view', JFactory::getApplication()->input->get('controller'));
		$task = JFactory::getApplication()->input->get('task');

		$file = '';
		if ($task)
		{
			$file = JPATH_PLUGINS . '/system/betterpreview/helpers/' . $option . '/' . $view . '/' . $task . '/button.php';
		}
		if (!$file || !JFile::exists($file))
		{
			$task = '';
			$file = JPATH_PLUGINS . '/system/betterpreview/helpers/' . $option . '/' . $view . '/button.php';
			if (!JFile::exists($file))
			{
				$view = '';
				$file = JPATH_PLUGINS . '/system/betterpreview/helpers/' . $option . '/button.php';
				if (!JFile::exists($file))
				{
					return false;
				}
			}
		}

		require_once JPATH_PLUGINS . '/system/betterpreview/helpers/button.php';
		require_once $file;
		return 'helperBetterPreviewButton' . ucfirst(substr($option, 4)) . ucfirst($view) . ucfirst($task);
	}
}
