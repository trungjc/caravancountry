<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('JPATH_BASE') or die('Restricted Access');

class TableMijosefBookmarks extends JTable {

    public $id 	 		    = null;
    public $name 			= null;
    public $html 			= null;
    public $btype			= null;
    public $placeholder	    = null;
    public $published		= null;

    public function __construct(&$db) {
		parent::__construct('#__mijosef_bookmarks', 'id', $db);
	}
}