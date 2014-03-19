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
class MijosefViewSitemap extends MijosefView {

	// View URLs
	function view($tpl = null) {
		$toolbar = $this->get('ToolbarSelections');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_SITEMAP' ), 'mijosef');
		$this->toolbar->appendButton('Popup', 'new1', JText::_('New'), 'index.php?option=com_mijosef&controller=sitemap&task=add&tmpl=component', 650, 400);
        JToolBarHelper::editList();
		JToolBarHelper::divider();
        JToolBarHelper::apply();
		JToolBarHelper::custom('generateItems', 'checkbox-partial', 'checkbox-partial', JText::_('COM_MIJOSEF_TOOLBAR_GENERATE_SITEMAP'), false);
		JToolBarHelper::custom('generateXML', 'checkbox', 'checkbox', JText::_('COM_MIJOSEF_TOOLBAR_GENERATE') . ' ' . JText::_('XML'), false);
		JToolBarHelper::divider();
		JToolBarHelper::spacer();
		$this->toolbar->appendButton('Custom', $toolbar->action);
		$this->toolbar->appendButton('Custom', $toolbar->newparent . $toolbar->newdate . $toolbar->newpriority . $toolbar->newfrequency);
		$this->toolbar->appendButton('Custom', $toolbar->selection);
		$this->toolbar->appendButton('Custom', $toolbar->button);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'cache', JText::_('COM_MIJOSEF_CACHE_CLEAN'), 'index.php?option=com_mijosef&amp;controller=purgeupdate&amp;task=cache&amp;tmpl=component', 300, 320);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/sitemap?tmpl=component', 650, 500);
		
		// Get behaviors
		JHTML::_('behavior.modal', 'a.modal', array('onClose'=>'\function(){location.reload(true);}'));
		
		$items = $this->get('Items');
		
		// Footer colspan
		$colspan = 3;
		if ($this->MijosefConfig->ui_sitemap_title == 1) {
			$colspan = $colspan + 1;
			$this->assignRef('titles', $this->get('Titles'));
		}
		if ($this->MijosefConfig->ui_sitemap_published == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_sitemap_id == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_sitemap_parent == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_sitemap_order == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_sitemap_date == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_sitemap_frequency == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_sitemap_priority == 1) {
			$colspan = $colspan + 1;
		}
		if ($this->MijosefConfig->ui_sitemap_cached == 1) {
			$colspan = $colspan + 1;
			$this->assignRef('cache', $this->get('Cache'));
		}
		
		// Get data from the model
        $this->lists        = $this->get('Lists');
        $this->cache        = $this->get('Cache');
        $this->items        = $this->get('Items');
        $this->pagination   = $this->get('Pagination');
        $this->colspan      = $colspan;

		parent::display($tpl);
	}
}
?>