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
class MijosefViewExtensions extends MijosefView {

	// Display extensions
	function view($tpl = null) {
		$toolbar = $this->get('ToolbarSelections');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_COMMON_EXTENSIONS'), 'mijosef');
		$this->toolbar->appendButton('Confirm', JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_BTN_REMOVE_WARN'), 'remove', JText::_('Uninstall'), 'uninstall', true, false);
		JToolBarHelper::apply('save');
		$this->toolbar->appendButton('Custom', $toolbar->action);
		$this->toolbar->appendButton('Custom', $toolbar->selection);
		$this->toolbar->appendButton('Custom', $toolbar->button);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'cache', JText::_('COM_MIJOSEF_CACHE_CLEAN'), 'index.php?option=com_mijosef&amp;controller=purgeupdate&amp;task=cache&amp;tmpl=component', 300, 380);
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/extensions?tmpl=component', 650, 500);
		
		// Get behaviors
		JHTML::_('behavior.tooltip');
		JHTML::_('behavior.modal', 'a.modal', array('onClose'=>'\function(){location.reload(true);}'));
		
		// Get data from the model
		$this->lists        = $this->get('Lists');
		$this->info         = $this->get('Info');
		$this->params       = $this->get('Params');
		$this->items        = $this->get('Items');
		$this->pagination   = $this->get('Pagination');

		parent::display($tpl);
	}
}
?>