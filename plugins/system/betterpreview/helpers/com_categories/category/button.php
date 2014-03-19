<?php
/**
 * Button Helper class: com_categories.category
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

class helperBetterPreviewButtonCategoriesCategory extends helperBetterPreviewButton
{
	function getURL()
	{
		if (JFactory::getApplication()->input->get('extension', 'com_content') != 'com_content')
		{
			return '';
		}

		return 'index.php?option=com_content&view=category&layout=' . $this->params->list_layout . '&id=' . JFactory::getApplication()->input->get('id');
	}
}
