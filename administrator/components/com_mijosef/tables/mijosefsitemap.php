<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('JPATH_BASE') or die('Restricted Access');

class TableMijosefSitemap extends JTable {

    public $id 	 		    = null;
    public $url_sef 		= null;
    public $title 			= null;
    public $published		= null;
    public $sdate 			= null;
    public $frequency		= null;
    public $priority		= null;
    public $sparent		    = null;
    public $sorder			= null;

    public function __construct(&$db) {
		parent::__construct('#__mijosef_sitemap', 'id', $db);
	}
}