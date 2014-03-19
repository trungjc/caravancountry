<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// View Class
class MijosefViewTags extends MijosefView {

	// View URLs
	function view($tpl = null) {
		$toolbar = $this->get('ToolbarSelections');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_TAGS' ), 'mijosef');
		$this->toolbar->appendButton('Popup', 'new1', JText::_('New'), 'index.php?option=com_mijosef&controller=tags&task=add&tmpl=component', 600, 350);
        JToolBarHelper::editList();
		JToolBarHelper::divider();
		JToolBarHelper::custom('generateTags', 'checkbox-partial', 'checkbox-partial', JText::_('COM_MIJOSEF_TOOLBAR_GENERATE_TAGS'), false);
		JToolBarHelper::divider();
		JToolBarHelper::spacer();
		$this->toolbar->appendButton('Custom', $toolbar->action);
		$this->toolbar->appendButton('Custom', $toolbar->selection);
		$this->toolbar->appendButton('Custom', $toolbar->button);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'cache', JText::_('COM_MIJOSEF_CACHE_CLEAN'), 'index.php?option=com_mijosef&amp;controller=purgeupdate&amp;task=cache&amp;tmpl=component', 300, 320);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/tags?tmpl=component', 650, 500);
		
		// Get behaviors
		JHTML::_('behavior.modal', 'a.modal', array('onClose'=>'\function(){location.reload(true);}'));
		
		// Footer colspan
		$colspan = 5;
		if ($this->MijosefConfig->ui_tags_published == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_tags_ordering == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_tags_cached == 1) {
			$colspan = $colspan + 1;
			$this->assignRef('cache', $this->get('Cache'));
		}
		if ($this->MijosefConfig->ui_tags_hits == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_tags_id == 1) {
			$colspan = $colspan + 1;
		}
		
		$lists = $this->get('Lists');
		$ordering = ($lists['order'] == 'ordering');
		
		$items = $this->get('Items');
		
		// Get data from the model

        $this->lists        = $this->get('Lists');
        $this->items        = $this->get('Items');
        $this->pagination   = $this->get('Pagination');
        $this->colspan      = $colspan;
        $this->ordering     = $ordering;
        $this->counts       = self::getCounts($items);

		parent::display($tpl);
	}
	
	function getCounts($tags) {
		$counts = array();
		
		if (!empty($tags)) {
			foreach ($tags as $tag) {
				if ($tag->title != '') {
					$counts[$tag->id] = self::_getURLs($tag->title);
				}
			}
		}
		
		return $counts;
	}
	
	function _getURLs($tag) {
		$where = self::_getWhere($tag);
    	$rows = MijoDatabase::loadResult("SELECT COUNT(u.id) FROM #__mijosef_urls AS u, #__mijosef_metadata AS m {$where}");
		
    	return $rows;
	}
	
	function _getWhere($tag) {
		$db = JFactory::getDBO();
		
		$where = array();
		$where[] = "m.url_sef = u.url_sef";
		$where[] = "m.published = 1";
		$where[] = "m.title != ''";
		$where[] = "m.keywords != ''";
		$where[] = "u.params LIKE '%\"tags\":1%'";
		$where[] = "u.params LIKE '%\"published\":1%'";
		$where[] = "u.params LIKE '%\"trashed\":0%'";
		
		$components = Mijosef::getConfig()->tags_components;
		if (is_array($components) && !empty($components)) {
			$com = "(";
			foreach ($components as $component) {
				$com .= "u.url_real LIKE '%option={$component}%' OR ";
			}
			$com = rtrim($com, ' OR ');
			$com .= ")";
			$where[] = $com;
		}
		
		$tag1 = $db->Quote($db->escape($tag, true).",%", false);
		$tag2 = $db->Quote("%, ".$db->escape($tag, true).",%", false);
		$tag3 = $db->Quote("%, ".$db->escape($tag, true), false);
		$where[] = "(m.keywords LIKE {$tag1} OR m.keywords LIKE {$tag2} OR m.keywords LIKE {$tag3})";
		
		$where = " WHERE " . implode(" AND ", $where);
		
		return $where;
	}
}
?>