<?php
/**
 * @package         Advanced Module Manager
 * @version         4.8.3
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2013 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

/**
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * View class for a list of modules.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_advancedmodules
 * @since       1.6
 */
class AdvancedModulesViewModules extends JViewLegacy
{
	protected $items;

	protected $pagination;

	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->items = $this->get('Items');
		foreach ($this->items as $i => $item)
		{
			$registry = new JRegistry;
			$registry->loadString($item->advancedparams);
			$this->items[$i]->params = $registry->toObject();
		}
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');
		$this->getConfig();

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// Check if there are no matching items
		if (!count($this->items))
		{
			JFactory::getApplication()->enqueueMessage(
				JText::_('COM_MODULES_MSG_MANAGE_NO_MODULES'),
				'warning'
			);
		}

		$this->addToolbar();
		// Include the component HTML helpers.
		JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
		parent::display($tpl);
	}

	/**
	 * Function that gets the config settings
	 *
	 * @return    Object
	 */
	protected function getConfig()
	{
		if (!isset($this->config))
		{
			require_once JPATH_PLUGINS . '/system/nnframework/helpers/parameters.php';
			$parameters = NNParameters::getInstance();
			$this->config = $parameters->getComponentParams('advancedmodules');
		}
		return $this->config;
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since    1.6
	 */
	protected function addToolbar()
	{
		$state = $this->get('State');
		$canDo = ModulesHelper::getActions();

		// Get the toolbar object instance
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_(($this->config->list_title ? 'COM_MODULES_MANAGER_MODULES' : 'AMM_ADVANCED_MODULES_MANAGER')), 'advancedmodulemanager icon-nonumber');

		if ($canDo->get('core.create'))
		{
			$title = JText::_('JTOOLBAR_NEW');
			$dhtml = "<button onClick=\"location.href='index.php?option=com_advancedmodules&amp;view=select'\" class=\"btn btn-small btn-success\">
						<span class=\"icon-plus icon-white\" title=\"$title\"></span>
						$title</button>";
			$bar->appendButton('Custom', $dhtml, 'new');
		}

		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('module.edit');
		}

		if ($canDo->get('core.create'))
		{
			JToolbarHelper::custom('modules.duplicate', 'copy', 'copy_f2', 'JTOOLBAR_DUPLICATE', true);
		}

		if ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::publish('modules.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('modules.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::checkin('modules.checkin');
		}

		if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			JToolbarHelper::deleteList('', 'modules.delete', 'JTOOLBAR_EMPTY_TRASH');
		}
		elseif ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::trash('modules.trash');
		}

		// Add a batch button
		if ($canDo->get('core.edit'))
		{
			JHtml::_('bootstrap.modal', 'collapseModal');
			$title = JText::_('JTOOLBAR_BATCH');
			$dhtml = "<button data-toggle=\"modal\" data-target=\"#collapseModal\" class=\"btn btn-small\">
						<span class=\"icon-checkbox-partial\" title=\"$title\"></span>
						$title</button>";
			$bar->appendButton('Custom', $dhtml, 'batch');
		}

		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_advancedmodules', 600, 900);
		}
		JToolbarHelper::help('JHELP_EXTENSIONS_MODULE_MANAGER');

		JHtmlSidebar::addEntry(
			JText::_('JSITE'),
			'index.php?option=com_advancedmodules&filter_client_id=0',
			$this->state->get('filter.client_id') == 0
		);

		JHtmlSidebar::addEntry(
			JText::_('JADMINISTRATOR'),
			'index.php?option=com_advancedmodules&filter_client_id=1',
			$this->state->get('filter.client_id') == 1
		);

		JHtmlSidebar::setAction('index.php?option=com_modules');

		JHtmlSidebar::addFilter(
		// @todo we need a label for this
			'',
			'filter_client_id',
			JHtml::_('select.options', ModulesHelper::getClientOptions(), 'value', 'text', $this->state->get('filter.client_id')),
			false
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_PUBLISHED'),
			'filter_state',
			JHtml::_('select.options', ModulesHelper::getStateOptions(), 'value', 'text', $this->state->get('filter.state'))
		);

		JHtmlSidebar::addFilter(
			JText::_('COM_MODULES_OPTION_SELECT_POSITION'),
			'filter_position',
			JHtml::_('select.options', ModulesHelper::getPositions($this->state->get('filter.client_id')), 'value', 'text', $this->state->get('filter.position'))
		);

		JHtmlSidebar::addFilter(
			JText::_('COM_MODULES_OPTION_SELECT_MODULE'),
			'filter_module',
			JHtml::_('select.options', ModulesHelper::getModules($this->state->get('filter.client_id')), 'value', 'text', $this->state->get('filter.module'))
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_ACCESS'),
			'filter_access',
			JHtml::_('select.options', JHtml::_('access.assetgroups'), 'value', 'text', $this->state->get('filter.access'))
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_LANGUAGE'),
			'filter_language',
			JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text', $this->state->get('filter.language'))
		);

		$this->sidebar = JHtmlSidebar::render();
	}

	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   3.0
	 */
	protected function getSortFields()
	{
		return array(
			'ordering' => JText::_('JGRID_HEADING_ORDERING'),
			'a.published' => JText::_('JSTATUS'),
			'a.title' => JText::_('JGLOBAL_TITLE'),
			'position' => JText::_('COM_MODULES_HEADING_POSITION'),
			'name' => JText::_('COM_MODULES_HEADING_MODULE'),
			'pages' => JText::_('COM_MODULES_HEADING_PAGES'),
			'a.access' => JText::_('JGRID_HEADING_ACCESS'),
			'language_title' => JText::_('JGRID_HEADING_LANGUAGE'),
			'a.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}
