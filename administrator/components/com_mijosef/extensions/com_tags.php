<?php
/*
* @package		MijoSEF
* @subpackage	Tags
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die ('Restricted access');

class MijoSEF_com_tags extends MijosefExtension {
	
	function beforeBuild(&$uri) {
		
		if (is_null($uri->getVar('parent_id')) || $uri->getVar('parent_id') == '') {
            $uri->delVar('parent_id');
        }
		
		if (is_null($uri->getVar('tag_list_language_filter')) || $uri->getVar('tag_list_language_filter') == '') {
            $uri->delVar('tag_list_language_filter');
        }
    }
	
	function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
        extract($vars);
		
		if (!empty($parent_id)) {
            $segments = array_merge($segments, self::_getTag(intval($parent_id)));
			unset($vars['parent_id']);
		}
		
		if (!empty($id)) {
			if (!empty($id[0])) {
				$segments = array_merge($segments, self::_getTag(intval($id[0])));
			}
			if (!empty($id[1])) {
				$segments = array_merge($segments, self::_getTag(intval($id[1])));
			}
			if (!empty($id[2])) {
				$segments = array_merge($segments, self::_getTag(intval($id[2])));
			}
			if (!empty($id[3])) {
				$segments = array_merge($segments, self::_getTag(intval($id[3])));
			}
			if (!empty($id[4])) {
				$segments = array_merge($segments, self::_getTag(intval($id[4])));
			}
			if (!empty($id[5])) {
				$segments = array_merge($segments, self::_getTag(intval($id[5])));
			}
			if (!empty($id[6])) {
				$segments = array_merge($segments, self::_getTag(intval($id[6])));
			}
			unset($vars['id']);
		}
	
		if (isset($view)) {
            switch($view) {
				case 'tag':
					break;
				case 'tags':
					$segments[] = JText::_('Tags');
                    break;
				default:
					$segments[] = $view;
					break;
            }
			unset($vars['view']);
        }
	
		if (isset($layout)) {
            switch($layout) {
                case 'list':
					$segments[] = JText::_('List');
                    break;
				default:
					$segments[] = $layout;
					break;
            }
			unset($vars['layout']);
        }
		
		$metadata = parent::getMetaData($vars, $item_limitstart);
		
		unset($vars['limit']);
		unset($vars['limitstart']);
	}

	function _getTag($id) {
		$cats = $this->params->get('tag_inc', '3');
		
        if ($cats == '1') {
            return array();
        }
		
		static $cache = array();
		
		if (!isset($cache[$id])) {
			$joomfish = $this->MijosefConfig->joomfish_trans_url ? ', id' : '';
			$categories = array();
			$cat_title = array();
			$cat_desc = array();

			while ($id > 1) {
				$row = MijoDatabase::loadObject("SELECT title, alias, parent_id, description{$joomfish} FROM #__tags WHERE id = '{$id}'");
				
				if (!is_object($row)) {
					break;
				}
				
				$name = (($this->params->get('tagid_inc', '1') != '1') ? $id.' ' : '');
				if (parent::urlPart($this->params->get('tag_part', 'global')) == 'title'){
					$name .= $row->title;
				} else {
					$name .= $row->alias;
				}
				
				array_unshift($categories, $name);
				$cat_title[] = $row->title;
				$cat_desc[] = $row->description;
				
				$id = $row->parent_id;
				if ($cats == '2'){
					break; //  Only last cat
				}
			}
			
			$cache[$id]['name'] = $categories;
			$cache[$id]['meta_title'] = $cat_title;
			$cache[$id]['meta_desc'] = $cat_desc;
		}
		
		$this->meta_title = $cache[$id]['meta_title'];
		if (!empty($cache[$id]['meta_desc'])) {
			$this->meta_desc = $cache[$id]['meta_desc'][0];
		}
		
		return $cache[$id]['name'];
    }
}