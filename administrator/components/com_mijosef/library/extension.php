<?php
/**
* @version		1.0.0
* @package		MijoSEF Library
* @subpackage	Extension
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.filesystem.file');
require_once(JPATH_MIJOSEF_ADMIN.'/tables/mijosefextensions.php');

// Extension class
class MijosefExtension {
	
	protected $params = null;
	protected $meta_title = array();
	protected $meta_desc = null;
	
    public function __construct($params = null) {
		// Get config object
		$this->MijosefConfig = Mijosef::getConfig();
		
		// Meta
		$this->meta_title = array();
		$this->meta_desc = null;
		
		$this->params = $params;
		
		// Skip menu
		self::skipMenu(false);
	}

    public function is16() {
        return Mijosef::get('utility')->is16();
	}

    public function is30() {
		return Mijosef::get('utility')->is30();
	}
	
    public function resetMetadata() {
		$this->meta_title = array();
		$this->meta_desc = null;
	}
	
    public function skipMenu($status, $get = false) {
		static $skip_menu = false;
		
		if ($get) {
			return $skip_menu;
		}
		
		$skip_menu = $status;
    }
	
    public function beforeBuild(&$uri) {
    }
	
    public function catParam($vars) {
    }
	
    public function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
    }
	
    public function afterBuild(&$uri) {
    }
	
	// Define title or alias
    public function urlPart($param) {
        if (($param == 'title') || ($param == 'global' && $this->MijosefConfig->title_alias == 'title')) {
            return 'title';
        }
        return 'alias';
    }
	
    public function categoryParam($area, $action = 2, $id = 0, $is_cat = 0, $real_url = "") {
		self::categoryParams($id, $is_cat, $real_url);
	}
	
    public function categoryParams($id = 0, $is_cat = 0, $real_url = "") {
		$vars = array();
		$areas = array('sm_auto_cats', 'tags_cats', 'ilinks_cats', 'bookmarks_cats');
		
		foreach ($areas as $a) {
			if (!isset($vars[$a.'_status'])) {
				$vars[$a.'_status'] = 0;
			}
			if (!isset($vars[$a.'_flag'])) {
				$vars['_flag'] = 0;
			}
			if (!isset($vars['_is_cat'])) {
				$vars['_is_cat'] = $is_cat;
			}
			if (!isset($vars['_real_url'])) {
				$vars['_real_url'] = $real_url;
			}
		}
		
		foreach ($areas as $a) {
			$categories = $this->params->get($a, '-11');
			if ($categories == 'all') {
				$vars[$a.'_status'] = 1;
			}
			elseif (is_array($categories) && in_array($id, $categories)) {
				$vars[$a.'_status'] = 1;
			}
			elseif ($categories == $id) {
				$vars[$a.'_status'] = 1;
			}
		}
		$vars['_flag'] = 1;
		
		Mijosef::get('utility')->set('category.param', $vars);
	}
	
    public function getMetaData($vars, $item_limitstart = false) {
		$auto_title			= self::_autoTitle($this->params->get('meta_title', 'global'));
		$auto_desc			= self::_autoDesc($this->params->get('meta_desc', 'global'));
		$auto_key			= self::_autoKey($this->params->get('meta_key', 'global'));
		$separator			= $this->params->get('separator', '-');
		$sitename			= JFactory::getConfig()->get('sitename');
		$custom_sitename	= $this->params->get('custom_sitename', '');
		$use_sitename		= $this->params->get('use_sitename', '2');
		$title_prefix		= $this->params->get('title_prefix', '');
		$title_suffix		= $this->params->get('title_suffix', '');
		
		$mijosef_title = $mijosef_desc = $mijosef_key = "";
		$title = $desc = $key = "";
		
		// Prepare meta title
		if (!empty($this->meta_title)) {
			$mijosef_title = Mijosef::get('utility')->cleanText(implode(" ".$separator." ", $this->meta_title));
		}
		
		$b_title = $mijosef_title;
		
		$page_number = "";
		if ($this->params->get('page_number', '2') == '2' && !empty($vars) && !empty($vars['limitstart'])) {
			$number	= Mijosef::get('uri')->getPageNumber($vars, $this->params, $item_limitstart);
			$page_number = JText::_('PAGE').' '.$number;
		}
		
		if (!empty($mijosef_title)) {
			if (!empty($page_number)) {
				$mijosef_title = $mijosef_title." ".$separator." ".$page_number;
			}
			
			if (!empty($custom_sitename)) {
				$sitename = $custom_sitename;
			}
			
			if ($use_sitename == 1) {
				$mijosef_title = $sitename." ".$separator." ".$mijosef_title;
			} elseif ($use_sitename == 2) {
				$mijosef_title = $mijosef_title." ".$separator." ".$sitename;
			}
			
			if (!empty($title_prefix)) {
				$mijosef_title = $title_prefix." ".$separator." ".$mijosef_title;
			}
			
			if (!empty($title_suffix)) {
				$mijosef_title = $mijosef_title." ".$separator." ".$title_suffix;
			}
		}
		
		if ($this->params->get('desc_inc_title', '2') == '2' && !empty($b_title)) {
			$this->meta_desc = $b_title.' '.$this->meta_desc;
		}
		
        $clean_desc = Mijosef::get('utility')->cleanText($this->meta_desc);
		
		$mijosef_title	= Mijosef::get('utility')->cleanText($mijosef_title);
		$mijosef_desc	= self::_clipDesc($clean_desc);
		$mijosef_key		= self::_generateKeywords($clean_desc);
		
		// Set extension metadata
		$mainframe = JFactory::getApplication();
		MijoSef::get('utility')->set('mijosef.meta.autodesc', $mijosef_desc);
		MijoSef::get('utility')->set('mijosef.meta.autokey', $mijosef_key);
		
		// Meta title
		if ($auto_title) {
			$title = $mijosef_title;
		}
		
		// Meta description
		if ($auto_desc) {
			$desc = $mijosef_desc;
		}
		
		// Meta keywords
		if ($auto_key) {
			$key = $mijosef_key;
		}
		
		// Set metadata
		$meta = array();
		$meta['title']			= $title;
		$meta['description']	= $desc;
		$meta['keywords']		= $key;
		
		return $meta;
	}
	
	// Define meta title generation
    public function _autoTitle($param) {
        if (($param == 'no') || ($param == 'global' && $this->MijosefConfig->meta_title == '0')) {
            return false;
        }
        return true;
    }
	
	// Define meta desc generation
    public function _autoDesc($param) {
        if (($param == 'no') || ($param == 'global' && ($this->MijosefConfig->meta_desc == '2' || $this->MijosefConfig->meta_desc == '3'))) {
            return false;
        }
        return true;
    }
	
	// Define meta title generation
    public function _autoKey($param) {
        if (($param == 'no') || ($param == 'global' && ($this->MijosefConfig->meta_key == '2' || $this->MijosefConfig->meta_key == '3'))) {
            return false;
        }
        return true;
    }
	
	// Clip text to use as meta description
    public function _clipDesc($text) {
		// Get params
		$desc_clip		= $this->params->get('desc_clip', '1');
		$desc_clip_s	= $this->params->get('desc_clip_s', '2');
		$desc_clip_w	= $this->params->get('desc_clip_w', '20');
		$desc_clip_c	= $this->params->get('desc_clip_c', '250');
		$description	= "";
		
		// Sentence clip
		if ($desc_clip == '1') {
			$description = "";
			$pattern = '/\b(.+?[\.|\!|\?])/u';
			
			for ($i=0; $i < $desc_clip_s; $i++) {
				$offset = "";
				if (preg_match($pattern, $text, $matches)) {
					$match = $matches[1];
				} else {
					break;
				}
				
				$description .= " ".$match;
				
				$offset = strpos($text, $match);
				$offset += strlen($match);
				$text = substr($text, $offset);
			}
		} 
		
		// Word clip
		if ($desc_clip == '2') {
			$explode = explode(' ',trim($text));
	    	$string = '';
	    
	    	for ($i=0; $i < $desc_clip_w; $i++) {
	        	if (isset($explode[$i])) {
		        	$string .= $explode[$i]." ";
	    		} else {
	    			break;
	    		}
	    	} 
	        $description = trim($string);
		}
		
		// Char clip
		if ($description == '' || $desc_clip == '3') {
            $text = substr($text, 0, $desc_clip_c);
            $pos = strrpos($text, ' ');
            if ($pos !== false) {
                $text = substr($text, 0, $pos - 1);
            }
            $description = trim($text);
        }
		
		return $description;
	}
	
	// Generate keywords
    public function _generateKeywords($text) {
		$keywords_word	= $this->params->get('keywords_word', '3');
		$keywords_count	= $this->params->get('keywords_count', '15');
		$blacklist		= self::_getKeywordsList($this->params->get('keywords_backlist', 'global'), 'blacklist');
		$whitelist		= self::_getKeywordsList($this->params->get('keywords_whitelist', 'global'), 'whitelist');
		
		// Firstly, cleanup text
		$text = Mijosef::get('utility')->cleanText($text);
		
		// Remove any email addresses
		$regex = '/(([_A-Za-z0-9-]+)(\\.[_A-Za-z0-9-]+)*@([A-Za-z0-9-]+)(\\.[A-Za-z0-9-]+)*)/iex';
		$text = preg_replace($regex, '', $text);
		
		// Some unwanted replaces
		$text = str_replace(array('?', '!'), '', $text);
		
		// Lowercase the strings		
		$text = JString::strtolower($text);
        
		// Sort words from up to down
		$keys_array = explode(" ", $text);
		$keys_array = array_count_values($keys_array);
		
		$new_keys_array = array();
		
		if (!empty($whitelist)) {
			$white_array = explode(",", $whitelist);
			foreach ($white_array as $white_word) {
				$white_word = JString::strtolower($white_word);;
				if (isset($keys_array[trim($white_word)])) {
					$new_keys_array[] = trim($white_word);
					unset($keys_array[trim($white_word)]);
				}
			}
		}
		
		if (!empty($blacklist)) {
			$black_array = explode(",", $blacklist);
			foreach ($black_array as $black_word) {
				if (isset($keys_array[trim($black_word)])) {
					unset($keys_array[trim($black_word)]);
				}
			}
		}
		
		arsort($keys_array);
		foreach ($keys_array as $word => $instances) {
			$new_keys_array[] = trim($word);
		}
		
		$i = 1;
		$keywords = "";
		foreach ($new_keys_array as $index => $word) {
			if ($i > $keywords_count) {
				break;
			}
			if (strlen(trim($word)) >= $keywords_word) {
				$keywords .= $word.", ";
				$i++;
			}
		}
		
		$keywords = rtrim($keywords, ", ");
		$keywords = trim($keywords, ".");
		$keywords = str_replace(',,', ',', $keywords);
		$keywords = str_replace('.,', ',', $keywords);
		
		return $keywords;
    }
	
	// Define blacklist
    public function _getKeywordsList($param, $list) {
		$ext_list = $this->params->get($list, '');
		$config = 'meta_key_'.$list;
		$glb_list = $this->MijosefConfig->$config;
		
        if ($param == 'combine') {
			$combined = "";
			if (!empty($glb_list)) {
				$global = explode(',', trim($glb_list));
			} else {
				return $ext_list;
			}
			
			if (!empty($ext_blacklist)) {
				$extension = explode(',', trim($ext_list));
			} else {
				return $glb_list;
			}
			
			$combined = array_unique(array_merge($global, $extension));
			$combined = implode(', ', $combined);
			return $combined;
		}
		elseif ($param == 'following') {
			return $ext_list;
		}
		else {
			return $glb_list;
		}
    }
	
    public function getMenuParams($id) {
		static $params = array();
		
		if (!isset($params[$id])) {
			$params[$id] = Mijosef::get('utility')->getMenu()->getParams($id);
		}
		
		return $params[$id];
	}
	
    public function fixVar($var) {
        if (!is_null($var)) {
            $pos = strpos($var, ':');
            if ($pos !== false) {
                $var = substr($var, 0, $pos);
			}
        }
		return $var;
    }
}
?>