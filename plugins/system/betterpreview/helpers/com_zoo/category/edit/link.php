<?php
/**
 * Link Helper class: com_zoo.category.edit
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

class helperBetterPreviewLinkZooCategoryEdit extends helperBetterPreviewLink
{
	function getLinks()
	{
		require_once(JPATH_ADMINISTRATOR . '/components/com_zoo/config.php');

		$zoo = App::getInstance('zoo');

		$id = JFactory::getApplication()->input->get('cid', array(0), 'array');
		$id = (int) $id[0];

		$cat = $zoo->table->category->get($id);
		while ($cat)
		{
			$items[] = (object) array(
				'id' => $cat->id,
				'name' => $cat->name,
				'published' => $cat->published,
				'url' => $zoo->route->category($cat, 0),
				'type' => JText::_('CATEGORY')
			);
			$cat = $cat->parent ? $zoo->table->category->get($cat->parent) : 0;
		}

		return $items;
	}
}
