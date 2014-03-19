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
 * Plugin that cleans cache
 */
class plgSystemBetterPreview extends JPlugin
{
	function __construct(&$subject, $config)
	{
		$this->isadmin = JFactory::getApplication()->isAdmin();
		$this->ispreview = JFactory::getApplication()->input->get('bp_preview');

		parent::__construct($subject, $config);
	}

	function onAfterRoute()
	{

		// only in html
		if (JFactory::getDocument()->getType() != 'html')
		{
			return;
		}

		if (!$this->isadmin && JFactory::getApplication()->input->get('bp_generatesefs'))
		{
			include __DIR__ . '/helpers/generatesefs.php';
			return;
		}

		// only in admin or frontend preview pages
		if (!($this->isadmin || $this->ispreview))
		{
			return;
		}

		jimport('joomla.filesystem.file');
		if (JFile::exists(JPATH_PLUGINS . '/system/nnframework/helpers/protect.php'))
		{
			require_once JPATH_PLUGINS . '/system/nnframework/helpers/protect.php';
			// return if page should be protected
			if (NNProtect::isProtectedPage('betterpreview'))
			{
				return;
			}
		}

		// load the admin language file
		JFactory::getLanguage()->load('plg_' . $this->_type . '_' . $this->_name, JPATH_ADMINISTRATOR);

		if (JFactory::getApplication()->input->get('bp_purgesefs'))
		{
			include __DIR__ . '/helpers/purgesefs.php';
			return;
		}

		if (JFactory::getApplication()->input->get('bp_preloader'))
		{
			include __DIR__ . '/helpers/preloader.php';
			return;
		}

		// return if NoNumber Framework plugin is not installed
		if (!JFile::exists(JPATH_PLUGINS . '/system/nnframework/nnframework.php'))
		{
			if ($this->isadmin && JFactory::getApplication()->input->get('option') != 'com_login')
			{
				$msg = JText::_('BP_NONUMBER_FRAMEWORK_NOT_INSTALLED')
					. ' ' . JText::sprintf('BP_EXTENSION_CAN_NOT_FUNCTION', JText::_('BETTER_PREVIEW'));
				$mq = JFactory::getApplication()->getMessageQueue();
				foreach ($mq as $m)
				{
					if ($m['message'] == $msg)
					{
						$msg = '';
						break;
					}
				}
				if ($msg)
				{
					JFactory::getApplication()->enqueueMessage($msg, 'error');
				}
			}
			return;
		}

		// return if NoNumber Framework plugin is not enabled
		$nnep = JPluginHelper::getPlugin('system', 'nnframework');
		if (!isset($nnep->name))
		{
			if ($this->isadmin && JFactory::getApplication()->input->get('option') != 'com_login')
			{
				$msg = JText::_('BP_NONUMBER_FRAMEWORK_NOT_ENABLED');
				$msg .= ' ' . JText::sprintf('BP_EXTENSION_MAY_NOT_FUNCTION', JText::_('BETTER_PREVIEW'));
				$mq = JFactory::getApplication()->getMessageQueue();
				foreach ($mq as $m)
				{
					if ($m['message'] == $msg)
					{
						$msg = '';
						break;
					}
				}
				if ($msg)
				{
					JFactory::getApplication()->enqueueMessage($msg, 'notice');
				}
			}
			return;
		}

		// Load plugin parameters
		require_once JPATH_PLUGINS . '/system/nnframework/helpers/parameters.php';
		$parameters = NNParameters::getInstance();
		$params = $parameters->getPluginParams($this->_name);

		if ($this->isadmin && !$params->display_title_link && !$params->display_status_link)
		{
			return;
		}

		if ($this->ispreview)
		{
			$type = 'preview';
		}
		else
		{
			$type = 'link';
		}

		// Include the Helpers
		require_once JPATH_PLUGINS . '/system/betterpreview/helper.php';
		require_once JPATH_PLUGINS . '/system/betterpreview/helpers/' . $type . '.php';

		$option = JFactory::getApplication()->input->get('option');
		$view = JFactory::getApplication()->input->get('view', JFactory::getApplication()->input->get('controller'));
		$task = JFactory::getApplication()->input->get('task');

		$file = '';
		if ($task)
		{
			$file = JPATH_PLUGINS . '/system/betterpreview/helpers/' . $option . '/' . $view . '/' . $task . '/' . $type . '.php';
		}
		if (!$file || !JFile::exists($file))
		{
			$task = '';
			$file = JPATH_PLUGINS . '/system/betterpreview/helpers/' . $option . '/' . $view . '/' . $type . '.php';
			if (!JFile::exists($file))
			{
				$view = '';
				$file = JPATH_PLUGINS . '/system/betterpreview/helpers/' . $option . '/' . $type . '.php';
			}
		}
		$class = 'helperBetterPreview' . ucfirst($type);

		if (JFile::exists($file))
		{
			$class .= ucfirst(substr($option, 4)) . ucfirst($view) . ucfirst($task);
			require_once $file;
		}
		$this->helper = new $class($params);

		if ($this->ispreview)
		{
			// Check for request forgeries.
			$this->helper->checkSession() or jexit(JText::_('JINVALID_TOKEN'));
			$this->helper->states();
		}
		else if ($this->isadmin)
		{
			JHtml::_('jquery.framework');
			JHtml::_('bootstrap.tooltip');
			JHtml::stylesheet('nnframework/style.min.css', false, true);
			JHtml::stylesheet('betterpreview/style.min.css', false, true);
			JHtml::script('betterpreview/script.min.js', false, true);
		}
	}

	function onContentPrepare($context, &$article)
	{
		if (isset($this->helper) && $this->ispreview)
		{
			$this->helper->restoreStates();
			$this->helper->renderPreview($article, $context);
		}
	}

	function onAfterRender()
	{
		if (isset($this->helper))
		{
			if ($this->ispreview)
			{
				$this->helper->addMessages();
			}
			else if ($this->isadmin)
			{
				$this->helper->convertLinks();
			}
		}
	}
}
