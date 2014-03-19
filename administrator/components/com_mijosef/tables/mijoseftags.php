<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('JPATH_BASE') or die('Restricted Access');

class TableMijosefTags extends JTable {

    public $id 	 		    = null;
    public $title 			= null;
    public $alias 			= null;
    public $description	    = null;
    public $published		= null;
    public $ordering		= null;
    public $hits			= null;

	public function __construct(&$db) {
		parent::__construct('#__mijosef_tags', 'id', $db);
	}

    public function check() {
		if (empty($this->alias)) {
			$this->alias = JFilterOutput::stringURLSafe($this->title);
		}
		
		return true;
	}

    public function loadByTitle($title) {
		$k = $this->_tbl_key;

		if ($title !== null) {
			$this->$k = $title;
		}

		$title = $this->$k;

		if ($title === null) {
			return false;
		}

		$this->reset();

		$this->_db->setQuery('SELECT * FROM '.$this->_tbl.' WHERE title = '.$this->_db->Quote($title));

		if ($result = $this->_db->loadAssoc()) {
			return $this->bind($result);
		}
		else {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
	}
}