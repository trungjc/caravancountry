<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('JPATH_BASE') or die('Restricted Access');

class TableMijosefIlinks extends JTable {

    public $id 	 	    = null;
    public $word 		= null;
    public $link 		= null;
    public $published	= null;
    public $nofollow	= null;
    public $iblank		= null;
    public $ilimit		= null;

    public function __construct(&$db) {
		parent::__construct('#__mijosef_ilinks', 'id', $db);
	}
}