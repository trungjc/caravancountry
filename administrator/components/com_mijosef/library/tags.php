<?php
/**
* @version		1.0.0
* @package		MijoSEF Library
* @subpackage	Tags
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Tags class
class MijosefTags {
	
	function __construct() {
		// Get config object
		$this->MijosefConfig = Mijosef::getConfig();
	}
	
	function autoTags($keywords, $component, $ext_params, $sef_url, $real_url) {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		$in_filter = Mijosef::get('utility')->_urlFilter('tags', $sef_url, $real_url, $ext_params);
		if (!in_array($component, $this->MijosefConfig->tags_auto_components) && $in_filter) {
			return;
		}
		
		$words = array();
		$_words = explode(',', $keywords);
		foreach ($_words as $word) {
			$word = trim($word);
			if (strlen($word) >= $this->MijosefConfig->tags_auto_length) {
				$words[$word] = $word;
			}
		}
		
		if (!empty($this->MijosefConfig->tags_auto_blacklist)) {
			$black_words = explode(',', $this->MijosefConfig->tags_auto_blacklist);
			foreach ($black_words as $i => $black_word) {
				if (isset($words[trim($black_word)])) {
					unset($words[trim($black_word)]);
				}
			}
		}
		
		static $checked = array();
		
		foreach ($words as $word) {
			$word = Mijosef::get('utility')->cleanText($word);
			
			if (empty($word)) {
				continue;
			}
			
			if (!isset($checked[$word])) {
				$m = Mijosef::get('cache')->checkTags($word);
				$checked[$word] = "checked";
			}
			
			if ($checked[$word] != "saved" && isset($m) && !is_object($m)) {
				$alias = JFilterOutput::stringURLSafe($word);
				MijoDatabase::query("INSERT IGNORE INTO #__mijosef_tags (title, alias) VALUES ('{$word}', '{$alias}')");
				
				$checked[$word] = "saved";
			}
		}
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
		if (!Mijosef::get('utility')->_multilayeredCheckup("tags", $text, $ext_params, $area, $params, $component, $real_url)) {
			return;
		}
		
		$tags = Mijosef::get('cache')->checkTags('', true);
		if (!is_array($tags) || empty($tags)) {
			return;	
		}
		
		$meta_key = Mijosef::get('utility')->replaceSpecialChars(MijoSef::get('utility')->get('mijosef.meta.key'), true);
		$keywordss = explode(',', $meta_key);
		
		if (!is_array($keywordss) || empty($keywordss)) {
			return;
		}
		
		$tags_map = Mijosef::get('cache')->getTagsMap($sef_url);
		
		foreach ($keywordss as $key) {
			$key = trim($key);
			if (!empty($tags_map) && is_array($tags_map) && isset($tags_map[$key])) {
				continue;
			}
			$keywords[] = $key;
		}
		
		$i = 0;
		$t_array = array();
		foreach ($tags as $index => $object) {
			$tag = trim($object->title);
			if (in_array($tag, $keywords) && ($i < $this->MijosefConfig->tags_in_page)) {
				$t_array[] = $tag;
				$i++;
			}
		}
		
		if (empty($t_array)) {
			return;
		}
		
		$Itemid = self::_getItemid();
		
		$tags_list = "";
		foreach($t_array as $tag) {
			$tags_list .= '<a href="'.JRoute::_("index.php?option=com_mijosef&view=tags&tag={$tag}{$Itemid}").'" title="'.$tag.'" >'.$tag.'</a>, ';
		}
		$tags_list = rtrim($tags_list, ', ');
		
		$lang_file =& JFactory::getLanguage();
		$lang_file->load('com_mijosef');
		
		$tags_html = JText::_('COM_MIJOSEF_TAGS_TITLE') . $tags_list;
		
		$position = self::_getTagsPosition($ext_params->get('tags_position', 'global'));
		if ($position == 1) {
			$text = $tags_html.'<br />'.$text;
		} elseif ($position == 2) {
			$text = $text.$tags_html.'<br />';
		}
    }
	
	function _getItemid() {
		static $Itemid;
		
		if (!isset($Itemid)) {
			$id = MijoDatabase::loadResult("SELECT id FROM #__menu WHERE link LIKE '%option=com_mijosef&view=tags%' AND type = 'component' AND published = 1");
			
			$Itemid = "";
			if (is_numeric($id)) {
				$Itemid = "&Itemid={$id}";
			}
		}
		
		return $Itemid;
    }
	
	function _getTagsPosition($param) {
        if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		if ($param == 'global') {
            return $this->MijosefConfig->tags_position;
        } else {
            return $param;
        }
    }
}