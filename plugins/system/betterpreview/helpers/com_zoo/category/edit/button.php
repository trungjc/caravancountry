<?php
/**
 * Button Helper class: com_zoo.category
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

class helperBetterPreviewButtonZooCategoryEdit extends helperBetterPreviewButton
{
	function getURL()
	{
		$id = JFactory::getApplication()->input->get('cid', array(0), 'array');
		$id = (int) $id[0];

		return 'index.php?option=com_zoo&view=itemlist&layout=category&task=category&category_id=' . $id;
	}
}
