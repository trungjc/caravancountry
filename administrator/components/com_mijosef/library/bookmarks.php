<?php
/**
* @version		1.0.0
* @package		MijoSEF Library
* @subpackage	Bookmarks
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Social Bookmarks class
class MijosefBookmarks {
	
	function __construct() {
		// Get config object
		$this->MijosefConfig = Mijosef::getConfig();
	}
	
	function plugin(&$text, $ext_params, $area, $component) {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}

		$real_url = MijoSef::get('utility')->get('mijosef.url.real');
		$sef_url = MijoSef::get('utility')->get('mijosef.url.sef');
		$params = MijoSef::get('utility')->get('mijosef.url.params');
		
		// Apply check-up
		if (!Mijosef::get('utility')->_multiLayeredCheckup("bookmarks", $text, $ext_params, $area, $params, $component, $real_url)) {
			return;
		}
		
		// Get bookmarks
		$bookmarks = Mijosef::get('cache')->getBookmarks();
		if (is_array($bookmarks) && !empty($bookmarks)) {
			// Get domain
			$domain = Mijosef::get('uri')->getDomain();
			
			$url = $domain.$sef_url;
			
			$uri = JFactory::getURI();
			$query = $uri->getQuery();
			if (!empty($query)) {
				$url = $url.'?'.$query;
			}
			
			$metadata = Mijosef::get('cache')->checkMetadata($sef_url);
			if (!is_object($metadata)) {
				return;
			}
			
			$metatitle = $metadata->title;
			$metadesc = $metadata->description;
			
			// Build html
			$icon = '';
			$line = 1;
			foreach ($bookmarks as $i => $bookmark) {
				if (!empty($bookmark->html)) {
					if ($bookmark->btype == 'badge' || $bookmark->btype == 'iconset')	{
						if ($bookmark->btype == 'badge') {
							$replace = self::_replaceBookmarksParams($bookmark->html, $url, $metatitle, $metadesc, true);
						} else {
							$replace = self::_replaceBookmarksParams($bookmark->html, $url, $metatitle, $metadesc);
						}
						$text = str_replace($bookmark->placeholder, $replace, $text);
					}
					elseif ($bookmark->btype == 'icon') {
						$icon .= $bookmark->html;
						if ($line == $this->MijosefConfig->bookmarks_icons_line) {
							$icon .= '<br />';
							$line = 0;
						}
						$line++;
					}
				}
			}
			
			if ($icon) {
				$replace = self::_replaceBookmarksParams($icon, $url, $metatitle, $metadesc);
				$replace = $this->MijosefConfig->bookmarks_icons_txt . $replace;
				$position = self::_iconsPosition($ext_params->get('bookmarks_icons_pos', 'global'));
				if ($position == 1) {
					$text = $replace.'<br />'.$text;
				} elseif ($position == 2) {
					$text = $text.'<br />'.$replace.'<br /><br />';
				} elseif ($position == 3) {
					$text = str_replace('{mijosef icon}', $replace, $text);
				}
			}
		}
	}
	
	// Replace
	function _replaceBookmarksParams($text, $url, $title, $desc, $badge = false) {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		if ($badge) {
			$text = str_replace('*mijosef*url_encoded*', str_replace("'", "", self::_encodeText($url)), $text);
			$text = str_replace('*mijosef*title_encoded*', str_replace("'", "", self::_encodeText($title)), $text);
			$text = str_replace('*mijosef*description_encoded*', str_replace("'", "", self::_encodeText($desc)), $text);
		} else {
			$text = str_replace('*mijosef*url_encoded*', "' + encodeURIComponent('". str_replace("'", "", $url) ."') + '", $text);
			$text = str_replace('*mijosef*title_encoded*', "' + encodeURIComponent('". str_replace("'", "", $title) ."') + '", $text);
			$text = str_replace('*mijosef*description_encoded*', "' + encodeURIComponent('". str_replace("'", "", $desc) ."') + '", $text);
		}
	
		$text = str_replace('*mijosef*url*', str_replace("'", "", $url), $text);
		$text = str_replace('*mijosef*title*', str_replace("'", "", $title), $text);
		$text = str_replace('*mijosef*description*', str_replace("'", "", $desc), $text);
		$text = str_replace('*mijosef*imageDirectory*', JURI::base().'components/com_mijosef/assets/images/bookmarks', $text);
		$text = str_replace('*mijosef*bgcolor*', '#ffffff', $text);
		$text = str_replace('*mijosef*addThisPubId*', $this->MijosefConfig->bookmarks_addthis, $text);
		$text = str_replace('*mijosef*TellAFriendId*', $this->MijosefConfig->bookmarks_taf, $text);
		$text = str_replace('*mijosef*twitterAccount*', $this->MijosefConfig->bookmarks_twitter, $text);
		$text = str_replace('*mijosef*sitename*', htmlspecialchars(JFactory::getConfig()->get('sitename')), $text);
		$text = str_replace('*mijosef*domain*', htmlspecialchars(JURI::root()), $text);
		
		return $text;
	}
	
	function _iconsPosition($param) {
		if ($param == 'global') {
            return $this->MijosefConfig->bookmarks_icons_pos;
        } else {
            return $param;
        }
    }
	
	function _encodeText(&$text) {
		$text = urlencode(htmlentities($text));
	}
}