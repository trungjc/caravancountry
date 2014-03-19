<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('JPATH_BASE') or die('Restricted Access');

class TableMijosefSefUrls extends JTable {

    public $id 	 	    = null;
    public $url_sef 	= null;
    public $url_real 	= null;
    public $cdate		= null;
    public $mdate		= null;
    public $used		= null;
    public $hits		= null;
    public $source		= null;
    public $params		= null;

    public function __construct(&$db) {
		parent::__construct('#__mijosef_urls', 'id', $db);
	}

    public function loadBySEF($url_sef) {
		$k = $this->_tbl_key;

		if ($url_sef !== null) {
			$this->$k = $url_sef;
		}

		$url_sef = $this->$k;

		if ($url_sef === null) {
			return false;
		}

		$this->reset();

		$this->_db->setQuery('SELECT * FROM '.$this->_tbl.' WHERE url_real != "" AND url_sef = '.$this->_db->Quote($url_sef));

		if ($result = $this->_db->loadAssoc()) {
			return $this->bind($result);
		}
		else {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
	}

    public function loadByID($id) {
		$k = $this->_tbl_key;

		if ($id !== null) {
			$this->$k = $id;
		}

		$id = $this->$k;

		if ($id === null) {
			return false;
		}

		$this->reset();

		$this->_db->setQuery('SELECT * FROM '.$this->_tbl.' WHERE url_real != "" AND id = '.$this->_db->Quote($id));

		if ($result = $this->_db->loadAssoc()) {
			return $this->bind($result);
		}
		else {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
	}
}