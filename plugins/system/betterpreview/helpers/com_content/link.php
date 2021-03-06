<?php
/**
 * Link Helper class: com_content
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

class helperBetterPreviewLinkContent extends helperBetterPreviewLink
{
	function getLinks()
	{
		// don't show any extra links by default
		return array();
	}
}
