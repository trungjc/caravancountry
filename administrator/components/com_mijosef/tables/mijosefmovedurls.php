<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('JPATH_BASE') or die('Restricted Access');

class TableMijosefMovedUrls extends JTable {

    public $id 	 	    = null;
    public $url_new 	= null;
    public $url_old 	= null;
    public $published	= null;
    public $hits		= null;
    public $last_hit	= null;

    public function __construct(&$db) {
		parent::__construct('#__mijosef_urls_moved', 'id', $db);
	}
}