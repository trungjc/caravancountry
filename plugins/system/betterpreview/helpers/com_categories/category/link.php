<?php
/**
 * Link Helper class: com_categories.category
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

include_once JPATH_SITE . '/components/com_content/helpers/route.php';

class helperBetterPreviewLinkCategoriesCategory extends helperBetterPreviewLink
{
	function getLinks()
	{
		if (JFactory::getApplication()->input->get('extension', 'com_content') != 'com_content'
			|| !JFactory::getApplication()->input->get('id')
		)
		{
			return array();
		}

		$item = $this->getItem(
			JFactory::getApplication()->input->get('id'),
			'categories',
			array('name' => 'title', 'parent' => 'parent_id', 'language' => 'language'),
			array('type' => 'JCATEGORY'),
			1
		);

		$parents = $this->getParents(
			$item,
			'categories',
			array('name' => 'title', 'parent' => 'parent_id', 'language' => 'language'),
			array('type' => 'JCATEGORY'),
			1
		);

		$item->url = ContentHelperRoute::getCategoryRoute($item->id, $item->language);

		foreach ($parents as &$parent)
		{
			$parent->url = ContentHelperRoute::getCategoryRoute($parent->id, $parent->language);
		}

		return array_merge(array($item), $parents);
	}
}
