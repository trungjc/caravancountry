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
class MijosefViewTagsMap extends MijosefView {

	// View URLs
	function view($tpl = null) {
        $this->lists        = $this->get('Lists');
        $this->items        = $this->get('Items');
        $this->pagination   = $this->get('Pagination');
        $this->toolbar      = $this->get('ToolbarSelections');

		parent::display($tpl);
	}
}
?>