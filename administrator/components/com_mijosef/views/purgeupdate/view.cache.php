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
class MijosefViewPurgeUpdate extends MijosefView {

	// Display purge
	function display($tpl = null) {
		// Get data from the model
		$this->count = $this->get('CountCache');
		
		parent::display($tpl);
	}
}
