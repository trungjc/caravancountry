<?php
/**
* @version		1.6.0
* @package		MijoSEF Library
* @subpackage	Error
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Imports
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

// Error class
class MijosefError {
	
	function __construct() {
		// Get config object
		$this->MijosefConfig = Mijosef::getConfig();
	}
	
	function logNotFoundURL($url) {
		$file = JPATH_SITE . '/logs/mijosef_404.log';
		
		if (!empty($this->MijosefConfig->log_404_path) && ($this->MijosefConfig->log_404_path != '/home/accountname/public_html/logs/mijosef_404.log')) {
			$file = $this->MijosefConfig->log_404_path;
		}
		
		$empty_file = '';
		if (!JFile::exists($file)) {
			JFile::write($file, $empty_file);
		}
		
		if (!JFile::exists($file)) {
			return;
		}
		
		$tab = "\t";
		$log_string  = date('Y-m-d H:i:s').$tab;
		$log_string .= 'URL: '.$url.$tab;
		$log_string .= getHostByAddr($_SERVER['REMOTE_ADDR']).$tab;
		$log_string .= $_SERVER['HTTP_USER_AGENT'];
		$log_string .= (empty($_SERVER['HTTP_REFERER']) ? "" : $tab.'Referrer: '.$_SERVER['HTTP_REFERER']);
		
		$content = JFile::read($file);
		$content = $content . "\n" . $log_string;
		
		JFile::write($file, $content);
	}
}