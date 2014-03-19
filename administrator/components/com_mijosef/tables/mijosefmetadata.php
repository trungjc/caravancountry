<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('JPATH_BASE') or die('Restricted Access');

class TableMijosefMetadata extends JTable {

    public $id 	 		    = null;
    public $url_sef 		= null;
    public $published		= null;
    public $title 			= null;
    public $description	    = null;
    public $keywords		= null;
    public $lang			= null;
    public $robots			= null;
    public $googlebot		= null;
    public $canonical		= null;

    public function __construct(&$db) {
		parent::__construct('#__mijosef_metadata', 'id', $db);
	}
}