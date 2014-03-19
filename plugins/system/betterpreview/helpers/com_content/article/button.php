<?php
/**
 * Button Helper class: com_content.article
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

class helperBetterPreviewButtonContentArticle extends helperBetterPreviewButton
{
	function getExtraJavaScript($text)
	{
		return '
				text = text.split(\'<hr id="system-readmore" />\');
				introtext = text[0];
				fulltext =  text[1] == undefined ? "" : text[1];
				text = (introtext + " " + fulltext).trim();
				cat = document.getElementById("jform_catid");
				category_title = cat == undefined ? "" : cat.options[cat.selectedIndex].text.replace(/^(\s*-\s+)*/, "").trim();
				overrides = {
						text: text,
						introtext: introtext,
						fulltext: fulltext,
						category_title: category_title,
					};
			';
	}

	function getURL()
	{
		if (!JFactory::getApplication()->input->get('id'))
		{
			return;
		}

		return 'index.php?option=com_content&view=article&id=' . JFactory::getApplication()->input->get('id');
	}
}
