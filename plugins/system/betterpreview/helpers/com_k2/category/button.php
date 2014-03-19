<?php
/**
 * Button Helper class: com_k2.category
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

class helperBetterPreviewButtonK2Category extends helperBetterPreviewButton
{
	function getURL()
	{
		return 'index.php?option=com_k2&view=itemlist&layout=category&task=category&id=' . JFactory::getApplication()->input->get('cid');
	}
}
