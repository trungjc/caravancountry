<?php
/**
* @version		1.0.0
* @package		MijoSEF Library
* @subpackage	Ilinks
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Internal Links class
class MijosefIlinks {
	
	function __construct() {
		// Get config object
		$this->MijosefConfig = Mijosef::getConfig();
	}
	
	function plugin(&$text, $ext_params, $area, $component) {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		$mainframe = JFactory::getApplication();
		$real_url = MijoSef::get('utility')->get('mijosef.url.real');
		$sef_url = MijoSef::get('utility')->get('mijosef.url.sef');
		$params = MijoSef::get('utility')->get('mijosef.url.params');
		
		// Apply check-up
		if (!Mijosef::get('utility')->_multilayeredCheckup("ilinks", $text, $ext_params, $area, $params, $component, $real_url)) {
			return;
		}
		
		
		$ilinks = Mijosef::get('cache')->getInternalLinks();
		if (is_array($ilinks) && !empty($ilinks)) {
			// Get SEF URL
			$mainframe = JFactory::getApplication();
			$sef_url = MijoSef::get('utility')->get('mijosef.url.sef');

			$url_db = Mijosef::get('cache')->checkURL($sef_url, true);
			if (is_object($url_db) && (Mijosef::get('utility')->getParam($url_db->params, 'ilinks') == 1)) {
				foreach ($ilinks as $i => $object) {
					if (empty($object->ilimit)) {
						$object->ilimit = $this->MijosefConfig->ilinks_limit;
					}
					self::_convertToLink($text, $object->word, $object->link, $object->nofollow, $object->iblank, $object->ilimit);
				}
			}
		}
    }
	
	// Convert text to links
	function _convertToLink(&$text, $word, $link, $nofollow, $blank, $limit) {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		if ($nofollow == 0) {
			$nofollow = '';
		} else {
			$nofollow = ' rel="nofollow"';
		}
		
		if ($blank == 0) {
			$target = '';
		} else {
			$target = ' target="_blank"';
		}
		
		$domain = Mijosef::get('uri')->getDomain();
		
		if (strpos($link, 'http') !== 0) {
			$ext_img = "";
			$link = $domain.$link;
		} else {
			$ext_img = '&nbsp;<img src="'.$domain.'/administrator/components/com_mijosef/assets/images/icon-10-external.png"/>';
		}
		
		$replace = '<a href="'.$link.'"'.$target.' title="'.$word.'"'.$nofollow.'>'.$word.$ext_img.'</a>';

		if ($this->MijosefConfig->ilinks_case == '1') {
			$regEx = '\'(?!((<.*?)|(<a.*?)))(\b'.$word.'\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'s';
		} else {
			$regEx = '\'(?!((<.*?)|(<a.*?)))(\b'.$word.'\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'si';
		}
		
		$text = preg_replace($regEx, $replace, $text, $limit);
	}
}