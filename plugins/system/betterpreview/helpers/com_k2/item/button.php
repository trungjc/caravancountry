<?php
/**
 * Button Helper class: com_k2.item
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

class helperBetterPreviewButtonK2item extends helperBetterPreviewButton
{
	function getExtraJavaScript($text)
	{
		return '
				isjform = 0;
				text = text.split(\'<hr id="system-readmore" />\');
				introtext = text[0];
				fulltext =  text[1] == undefined ? "" : text[1];
				text = (introtext + " " + fulltext).trim();
				overrides = {
						text: text,
						introtext: introtext,
						fulltext: fulltext,
					};
			';
	}

	function getURL()
	{
		if (!JFactory::getApplication()->input->get('cid'))
		{
			return;
		}

		return 'index.php?option=com_k2&view=item&layout=item&id=' . JFactory::getApplication()->input->get('cid');
	}
}
