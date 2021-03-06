<?php
/**
* @version		1.0.0
* @package		MijoSEF Library
* @subpackage	Main router
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// IIS Patch
if (isset($_SERVER['HTTP_X_REWRITE_URL'])) {
    $_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_REWRITE_URL'];
}

jimport('joomla.application.router');

define('JROUTER_MODE_DONT_PARSE', 2);

class ExtUri extends JUri {

	public static function getUri($uri) {
	    return $uri->uri;
	}

    public static function clearUri($uri) {
        $uri->setScheme(null);
        $uri->setUser(null);
        $uri->setPass(null);
        $uri->setHost(null);
        $uri->setPort(null);
        $uri->setPath(null);
        $uri->setFragment(null);
        $uri->setQuery(array());
    }

    public static function copyUri($from, $to) {
        $to->uri = $from->uri;

        $to->setScheme($from->getScheme());
        $to->setUser($from->getUser());
        $to->setPass($from->getPass());
        $to->setHost($from->getHost());
        $to->setPort($from->getPort());
        $to->setPath($from->getPath());
        $to->setFragment($from->getFragment());
        $to->setQuery($from->getQuery(true));
    }

    public static function updateUri(&$uri, $url) {
        self::clearUri($uri);
        $uri->parse($url);
    }
}

// Main router class
class JRouterMijosef extends JRouter {

	protected $parsing = false;

	public function __construct($options = array()) {
		//parent:: __construct($options);
		
		// Get config object
		$this->MijosefConfig = Mijosef::getConfig();

        $this->JoomlaRouter = JFactory::getApplication()->getRouter();
	}

	// The parse function handles the incomming URL
    public function parse(&$siteRouter, &$uri) {
        if ($this->parsing) {
            return array();
        }
        
        $this->parsing = true;

        $uri->setPath(JUri::base(true) . '/' . $uri->getPath());

        $mainframe = JFactory::getApplication();

        $jrouter = $mainframe->getRouter();
        $jrouter->setMode(JROUTER_MODE_DONT_PARSE);
		
		// Fix the missing question mark
        if (count($_POST) == 0) {
            $url = $uri->toString();
            $new_url = preg_replace('/^([^?&]*)&([^?]+=[^?]*)$/', '$1?$2', $url);
            // Redirect if question mark fixed
            if ($new_url != $url) {
                $mainframe->redirect($new_url, '', 'message', true);
            }
        }

		// Check if URI is string
		if (is_string($uri)) {
			$uri = JUri::getInstance($uri);
		}

		// Backlink plugin compatibility
        if (JPluginHelper::isEnabled('system', 'backlink') ) {
            $joomla_request = $_SERVER['REQUEST_URI'];
            $real_request = $uri->toString(array('path', 'query'));

            if ($real_request != $joomla_request) {
                $uri = new JUri($joomla_request);
            }
        }

		// We'll use it for Joomla! SEF to MijoSEF redirection
		$old_uri = clone($uri);

        // get path
        $path = $uri->getPath();

        // remove basepath
        $path = substr_replace($path, '', 0, strlen(JUri::base(true)));

        // remove slashes
        $path = ltrim($path, '/');

        $path = preg_replace('#^index\\.php\\/#i', '', $path);
		
		if ((Mijosef::getConfig()->multilang == 1) and (Mijosef::getConfig()->multilang_home_code == 1)) {
            $query = $uri->getQuery(true);

            if ((str_replace($uri->base(true), "", $uri->getPath()) == '/') and empty($query) and empty($_POST)) {
                $lang_var = MijoSEF::get('language')->getLangVar();
                $default_items = MijoSEF::get('uri')->getDefaultMenuItem(true);

                $langs = JLanguageHelper::getLanguages('sef');
                $lang = $langs[$lang_var]->lang_code;
                $use_falang = JPluginHelper::isEnabled('system', 'falangdriver');

                foreach($default_items as $item) {
                    if ($use_falang) {
                        if ($item->language == '*') {
                            $Itemid = $item->id;
                            $link = $item->link;
                            break;
                        }
                    }
                    else {
                        if (($item->language == $lang) or (($langs[$lang_var]->sef == $this->MijosefConfig->joomfish_main_lang) and ($item->language == '*'))) {
                            $Itemid = $item->id;
                            $link = $item->link;
                        }
                    }
                }

                if (!empty($link)) {
                    $link .= (strpos($link, '?') === false ? '?' : '&') . 'Itemid=' . $Itemid;

                    JFactory::getApplication()->redirect(JRoute::_($link));

                    JFactory::getApplication()->close();
                }
            }
        }
		
		// Check if the URL starts with index2.php
		if (substr($path, 0, 10) == 'index2.php') {
            return $uri->getQuery(true);
        }

        // remove prefix (both index.php and index2.php)
        $path = preg_replace('/^index2?.php/i', '', $path);

        // remove slashes again to be sure there aren't any left
        $path = ltrim($path, '/');

        // replace spaces with our replacement character
        $path = str_replace(' ', $this->MijosefConfig->replacement_character, $path);

        // set the route
        $uri->setPath($path);

		$vars = Mijosef::get('uri')->parseURI($uri, $old_uri);

        // Parsing done
        $this->parsing = false;

        // Fix the start variable
        if ($start = $uri->getVar('start')) {
            $uri->delVar('start');
            $vars['limitstart'] = $start;
        }

        $menu = Mijosef::get('utility')->getMenu();

        // Handle an empty URL (special case)
        if (empty($vars['Itemid']) && empty($vars['option'])) {
            $item = Mijosef::get('uri')->getDefaultMenuItem();

            if (!is_object($item)) {
				return $vars;
			}

            // set the information in the request
        	$vars = $item->query;

            // get the itemid
            $vars['Itemid'] = $item->id;

            // set the active menu item
            $menu->setActive($vars['Itemid']);

            // set vars
            $this->setRequestVars($vars);

            return $vars;
        }

        // Get the item id, if it hasn't been set force it to null
        if (empty($vars['Itemid'])) {
            $vars['Itemid'] = JRequest::getInt('Itemid', null);
        }

        // Get the variables from the uri
        $this->setVars($vars);
        $siteRouter->setVars($vars);

        $siteRouter->setMode(JROUTER_MODE_DONT_PARSE);

        // No option? Get the full information from the itemid
        if (empty($vars['option'])) {
            $item = $menu->getItem($this->getVar('Itemid'));
            if (!is_object($item)) return $vars; // No default item set

            $vars = $vars + $item->query;
        }

        // Set the active menu item
        $menu->setActive($this->getVar('Itemid'));

        Mijosef::get('language')->parseLang($vars);

        // Set vars
        $this->setRequestVars($vars);

        return $vars;
    }

	// Build the SEF URL
    public function build(&$siteRouter, &$uri) {
		$sef_url = "";

        /*$uri->setPath('xyz');
        $uri->setQuery(array());
        return $uri;*/

        $orig_path = $uri->getPath();
		$url = ExtUri::getUri($uri);

        $real_url = str_replace(array('?amp;', '&amp;'), array('?', '&'), $url);

		// Security - only allow colon in protocol part
		if (strpos($real_url, ':') !== false) {
            $offset = 0;
            if (substr($real_url, 0, 5) == 'http:') {
                $offset = 5;
            } elseif (substr($real_url, 0, 6) == 'https:') {
                $offset = 6;
            }

            $real_url = substr($real_url, 0, $offset) . str_replace(':', '%3A', substr($real_url, $offset));
        }

        // Update URI object
        ExtUri::updateUri($uri, $this->_createUri($real_url));

        $route = $uri->getPath();
        if (substr($route, 0, 10) == 'index.php/') {
            $route = substr($route, 10);
            $uri->setPath($route);
            return $uri;
        }

        if (substr($real_url, 0, 10) != 'index.php?') {
            return $uri;
        }

		// Create URI object
		$org_uri = clone($uri); // For disable router option and dosef_false

		$menu = Mijosef::get('utility')->getMenu();

		// Make some fixes on URI
		if ($real_url != 'index.php') {
            // Get the itemid from the URI
            $Itemid = $uri->getVar('Itemid');

            if (is_null($Itemid)) {
                if (($option = $uri->getVar('option'))) {
                    $item = $menu->getItem(intval($this->getVar('Itemid')));
                    if (isset($item) && $item->component == $option) {
                        $uri->setVar('Itemid', $item->id);
                    }
                }
                else {
                    if (($Itemid = intval($this->getVar('Itemid')))) {
                        $uri->setVar('Itemid', $Itemid);
                    }
                }
            }

            // If there is no option specified, try to get the query from menu item
            if (is_null($uri->getVar('option'))) {
            	if (count($vars = $uri->getQuery(true)) == 2 && isset($vars['Itemid']) && isset($vars['limitstart'])) {
            		foreach ($this->getVars() as $name => $value) {
            			if ($name != 'limitstart' && $name != 'start') {
            				$uri->setVar($name, $value);
                        }
                    }

            		if ($uri->getVar('limitstart') == 0) {
            			$uri->delVar('limitstart');
                    }
            	}
                elseif (!is_null($uri->getVar('Itemid'))) {
                    $item = $menu->getItem($uri->getVar('Itemid'));

                    if (is_object($item)) {
                        foreach($item->query as $k => $v) {
                            $uri->setVar($k, $v);
                        }
                    }
                }
                else {
                    // There is no option or Itemid specified, assume frontpage
                    $item = Mijosef::get('uri')->getDefaultMenuItem();

                    if (is_object($item)) {
                        foreach($item->query as $k => $v) {
                            $uri->setVar($k, $v);
                        }
                        
                        // Set Itemid
                        $uri->setVar('Itemid', $item->id);
                    }
                }
            }
        }

        $mainframe = JFactory::getApplication();
        $router = $mainframe->getRouter();
        $router->setMode(JROUTER_MODE_SEF);

		$prev_lang = '';
		$vars = $uri->getQuery(true);

		// If site is root, do not do anything else
        if (empty($vars) && ((!Mijosef::get('utility')->JoomfishInstalled() && !Mijosef::get('utility')->FalangInstalled()) || $this->MijosefConfig->joomfish_lang_code == '0')) {
            $uri = new JUri(JUri::root());
            return $uri;
        }
		
		$lang = Mijosef::get('language')->getLang($uri);

		// Add JoomFish/FaLang lang code
		if (Mijosef::get('utility')->JoomfishInstalled() || Mijosef::get('utility')->FalangInstalled()) {
            // If lang not set
            if (empty($lang)) {
				$uri->setVar('lang', Mijosef::get('uri')->getLangCode());
			}

            // Get the URL's language and set it as global language (for correct translation)
            $lang = $uri->getVar('lang');
            $code = '';
            if (!empty($lang)) {
                $code = Mijosef::get('uri')->getLangLongCode($lang);

                if (!is_null($code)) {
                    if ($code != Mijosef::get('uri')->getLangLongCode()) {
                        $language = JFactory::getLanguage();
                        $prev_lang = $language->setLanguage($code);
                        $language->load();
                    }
                }
            }
        }

		// Set active ItemID if set to
		$Itemid = intval($uri->getVar('Itemid'));
		if (empty($Itemid) && $this->MijosefConfig->insert_active_itemid == 1) {
			$active = $menu->getActive();
			if (is_object($active) && isset($active->id)) {
				$uri->setVar('Itemid', $active->id);
			}
		}

        $vars = $uri->getQuery(true);

		// if there are no variables and only single language is used
        if (empty($vars) && !isset($lang)) {
            $org_uri = Mijosef::get('uri')->createUri($org_uri);
			Mijosef::get('uri')->restoreLang($prev_lang);
            $router->setMode(JROUTER_MODE_RAW);

			return $org_uri;
        }

		// Check if we should prepend the lang code to SEF URL
		$lang_code 		= "";
		$lang 			= $uri->getVar('lang');
		$add_code		= $this->MijosefConfig->joomfish_lang_code;
		$main_lang		= $this->MijosefConfig->joomfish_main_lang;
		//if (Mijosef::get('utility')->JoomFishInstalled() && !empty($lang)) {
		if (!empty($lang)) {
			// Add lang code if set to
			if ($add_code != '0' && ($main_lang == '0' || $lang != $main_lang) && !strpos($sef_url, $lang)) {
				$lang_code = $lang;
			}
		}
		
		// Get option
		$component = $uri->getVar('option');
		
		// Set attributes
		Mijosef::get('uri')->attributes->meta = null;
		Mijosef::get('uri')->attributes->params = new JRegistry("");
		Mijosef::get('uri')->attributes->non_sef_part = "";
		Mijosef::get('uri')->attributes->item_limitstart = false;

		// Home Page ?
        if (Mijosef::get('uri')->_isHomePage($uri)) {
        	// Check if URL exists
			if (Mijosef::get('uri')->_checkDB($uri, $prev_lang)) {
				return $uri;
			}
			
			// Check if we should create new SEF URLs
			if ($this->MijosefConfig->generate_sef == 0) {
				return $uri;
			}
			
			$real_url = Mijosef::get('uri')->sortURItoString($uri);
			
			$sef_url = Mijosef::get('uri')->_finalizeSEF($uri, $sef_url, $real_url, $component, $lang_code);
			
			$uri = Mijosef::get('uri')->_finalizeURI($uri, $sef_url);
			
            Mijosef::get('uri')->restoreLang($prev_lang);
            
            return $uri;
        } else {
			$default = $menu->getDefault();
			$checkup = (is_object($default) && !is_null(intval($uri->getVar('Itemid'))));
			if ($checkup && is_null($uri->getVar('limitstart')) && $uri->getVar('Itemid') == $default->id && $this->MijosefConfig->insert_active_itemid != 1) {
				$uri->delVar('Itemid');
			}
        }

		// Lets do this job, start routing
		$routed	= false;

		if (!is_null($component)) {
			// Get params
			$ext_params = Mijosef::get('cache')->getExtensionParams($component);

			// Component not installed
			if (!$ext_params) {
				$org_uri = Mijosef::get('uri')->createUri($org_uri);
				Mijosef::get('uri')->restoreLang($prev_lang);
                $router->setMode(JROUTER_MODE_RAW);

				return $org_uri;
			}
			
			// Get params
			Mijosef::get('uri')->attributes->params = $ext_params;
			
			// Get router type
			$routing = Mijosef::get('uri')->attributes->params->get('router', '0');

			//
			// Start routing...
			//

			// Routing disabled
			if ($routing == 0) {
				$org_uri = Mijosef::get('uri')->createUri($org_uri);
                Mijosef::get('uri')->restoreLang($prev_lang);
                $router->setMode(JROUTER_MODE_RAW);
                
                return $org_uri;
			} else {
				// Check if we should return the URI directly
				$dosef = Mijosef::get('uri')->disableSefVars($uri);
				if ($dosef == false) {
					$org_uri = Mijosef::get('uri')->createUri($org_uri);
					Mijosef::get('uri')->restoreLang($prev_lang);
                    $router->setMode(JROUTER_MODE_RAW);

					return $org_uri;
				}

				// Reorder URI (ksort)
                ExtUri::updateUri($uri, Mijosef::get('uri')->sortURItoString($uri, true));

				// non-SEF Vars
				Mijosef::get('uri')->attributes->non_sef_part = Mijosef::get('uri')->nonSefVars($uri);

				// Backup variables to use later
				$backup_vars = $uri->getQuery(true);

				// Remove session IDs, if set to
                if ($this->MijosefConfig->remove_sid == 1 && !is_null($uri->getVar('sid'))) {
                    $uri->delVar('sid');
				}

				// Ensure that the mosmsg are removed
				if (!empty($mosmsg)) {
					$uri->delVar('mosmsg');
				}

				// Delete limistart var if empty
				$_lmtstrt = $uri->getVar('limitstart');
				if (empty($_lmtstrt) && ($component != 'com_virtuemart')) {
					$uri->delVar('limitstart');
				}
				else {
					//Mijosef::get('uri')->fixPaginationURI($uri);
				}
				
				// Smart Itemid
				$skipped_components = array('com_wrapper');
				if (!in_array($component, $skipped_components) && Mijosef::get('utility')->getConfigState(Mijosef::get('uri')->attributes->params, 'global_smart_itemid')) {
					$s_vars = $uri->getQuery(true);
					unset($s_vars['Itemid']);
					unset($s_vars['lang']);
					unset($s_vars['limit']);
					unset($s_vars['limitstart']);
					
					$menu_item = Mijosef::get('uri')->findItemid($s_vars);
					if (is_object($menu_item)) {
						$uri->setVar('Itemid', $menu_item->id);
					}
				}

                $lang = JFactory::getLanguage();
                $lang->load('com_mijosef', JPATH_SITE, 'en-GB', true);
                $lang->load('com_mijosef', JPATH_SITE, $lang->getDefault(), true);
                $lang->load('com_mijosef', JPATH_SITE, null, true);

				// MijoSEF extension
				$extension = JPATH_ADMINISTRATOR.'/components/com_mijosef/extensions/'.$component.'.php';
				if (!$routed && file_exists($extension) && $routing == 3) {
					$mijosef_ext = Mijosef::getExtension($component);

					// Fix : for ids
					Mijosef::get('uri')->fixUriVariables($uri);

					// Override menu item id if set to
					if (Mijosef::get('uri')->attributes->params->get('override', '1') != '1' && Mijosef::get('uri')->attributes->params->get('override_id', '') != '') {
						$uri->setVar('Itemid', Mijosef::get('uri')->attributes->params->get('override_id'));
					}

					// Make changes on URI before building route
					$mijosef_ext->beforeBuild($uri);
					
					// Category status
					$real_url = Mijosef::get('uri')->sortURItoString($uri);
					$mijosef_ext->catParam($uri->getQuery(true), $real_url);
					
					// Check if URL exists
					if (Mijosef::get('uri')->_checkDB($uri, $prev_lang)) {
						return $uri;
					}
					
					// Load language file
					$lang_file = JFactory::getLanguage();
					$lang_file->load($component, JPATH_SITE);
					
					// Prepare vars
					$vars = $uri->getQuery(true);
					$segments = array();
					$do_sef = true;
					Mijosef::get('uri')->attributes->meta = null;
					Mijosef::get('uri')->attributes->item_limitstart = false;
					
					// Build
					$mijosef_ext->build($vars, $segments, $do_sef, Mijosef::get('uri')->attributes->meta, Mijosef::get('uri')->attributes->item_limitstart);

					// Check if do_sef is false
					if ($do_sef == false) {
						$org_uri = Mijosef::get('uri')->createUri($org_uri);
						Mijosef::get('uri')->restoreLang($prev_lang);
                        $router->setMode(JROUTER_MODE_RAW);

						return $org_uri; // To obtain original URI, not sorted
					}
					
					// Append as non-SEF all non-proccessed vars
					if ($this->MijosefConfig->append_non_sef == 1) {
						Mijosef::get('uri')->attributes->non_sef_part = Mijosef::get('uri')->nonSefVars($uri, $vars, Mijosef::get('uri')->attributes->non_sef_part);
					}
					
					if (!empty($segments) && in_array('mijosef_url', $segments)){
						$url_found = Mijosef::get('cache')->checkURL($uri->getVar('id'), false, true);
						if (is_object($url_found)) {
							// Check if it is blocked
							if (Mijosef::get('utility')->getParam($url_found->params, 'blocked') == '1') {
								$route = $url_found->url_real;
							} else {
								$route = $url_found->url_sef;
							}
							
							$uri = Mijosef::get('uri')->_finalizeURI($uri, $route);
							
							Mijosef::get('uri')->restoreLang($prev_lang);
							
							return $uri;
						} else {
							$segments = array();
						}
					}
					
					// Check if URL exists
					unset($vars['option']);
					unset($vars['Itemid']);
					unset($vars['lang']);
					if (!empty($vars) && $this->MijosefConfig->prevent_dup_error == 1 && Mijosef::get('uri')->_checkDB($uri, $prev_lang)) {
						return $uri;
					}

					// Load segments as string
					if (!empty($segments)) {
						$sef_url = implode('/', $segments);
					}

					$routed = true;
				}

				// router.php
				$router_file = JPATH_BASE.'/components/'.$component.'/router.php';
				if (!$routed && file_exists($router_file) && $routing == 2) {					
					// Check if URL exists
					if (Mijosef::get('uri')->_checkDB($uri, $prev_lang)) {
						return $uri;
					}
					
					// Prepare routing
					require_once($router_file);
					$function = substr($component, 4).'buildRoute';

					// Get vars array
					$vars = $uri->getQuery(true);

					// Run BuildRoute function
					$segments = $function($vars);

					// Append as non-SEF the non-proccessed vars
					if ($this->MijosefConfig->append_non_sef == 1) {
						Mijosef::get('uri')->attributes->non_sef_part = Mijosef::get('uri')->nonSefVars($uri, $vars, Mijosef::get('uri')->attributes->non_sef_part);
					}
					
					// Check if URL exists
					unset($vars['option']);
					unset($vars['Itemid']);
					unset($vars['lang']);
					if (!empty($vars) && $this->MijosefConfig->prevent_dup_error == 1 && Mijosef::get('uri')->_checkDB($uri, $prev_lang)) {
						return $uri;
					}

					// Prevent metadata of the previous component
					Mijosef::get('uri')->attributes->meta = null;

					// Replace : with -
					$segments = $this->_encodeSegments($segments);

					// Load segments as string
					if (!empty($segments)) {
						if (substr($sef_url, -1) != '/') {
							$sef_url .= '/';
						}
						$sef_url .= implode('/', $segments);
					}

					$routed = true;
				}

				// Basic routing
				if (!$routed && $routing == 1) {
					// Check if URL exists
					if (Mijosef::get('uri')->_checkDB($uri, $prev_lang)) {
						return $uri;
					}
					
					// Prevent metadata of the previous component
					Mijosef::get('uri')->attributes->meta = null;

					// Get vars array
					$vars = $uri->getQuery(true);

					// Add all values to new url
					$filter = array('option', 'Itemid', 'lang', 'limitstart');
					foreach ($vars as $name => $value) {
						if (in_array($name, $filter)) {
							continue;
						}
						
						if (substr($sef_url, -1) != '/') {
							$sef_url .= '/';
						}
						
						$sef_url .= $value;
					}

					// Replace : with -
					if (!empty($sef_url)) {
						$url_array = explode('/', $sef_url);
						$url_array = $this->_encodeSegments($url_array);
						$sef_url = implode('/', $url_array);
					}

					$routed = true;
				}
			}
		
			// Reconnect Session ID to real url
			if (!empty($backup_vars['sid']) && $this->MijosefConfig->remove_sid == 1) {
				$uri->setVar('sid', $backup_vars['sid']);
			}

			// Reconnect mosmsg to real url
			if (!empty($backup_vars['mosmsg'])) {
				$uri->setVar('mosmsg', $backup_vars['mosmsg']);
			}
		}

		// Prevent recording the edit url of 404 page
		if ($sef_url == '404/edit' || $sef_url == '404/edit'.$this->MijosefConfig->url_suffix) {
			$routed = false;
		}

		// Finalize this job
		if ($routed) {
			// Check if we should create new SEF URLs
			if ($this->MijosefConfig->generate_sef == 0) {
				return $uri;
			}
			
			$real_url = Mijosef::get('uri')->sortURItoString($uri);
			
			$sef_url = Mijosef::get('uri')->_finalizeSEF($uri, $sef_url, $real_url, $component, $lang_code);
			
			$uri = Mijosef::get('uri')->_finalizeURI($uri, $sef_url);
		}

		Mijosef::get('uri')->restoreLang($prev_lang);
        
		return $uri;
	}

    public function getMode() {
        return JROUTER_MODE_SEF;
    }

    public function _createUri($url) {
        if (substr($url, 0, 1) == '&') {
            $vars = array();

			if (strpos($url, '&amp;') !== false) {
			   $url = str_replace('&amp;', '&',$url);
			}

            parse_str($url, $vars);
            $vars = array_merge($this->JoomlaRouter->getVars(), $vars);

            foreach ($vars as $key => $var) {
                if ($var == "") {
					unset($vars[$key]);
				}
            }

            $url = 'index.php?'.JUri::buildQuery($vars);
        }

        // Security - only allow one question mark in URL
        $pos = strpos($url, '?');
        if ( $pos !== false ) {
            $url = substr($url, 0, $pos+1) . str_replace('?', '%3F', substr($url, $pos+1));
        }

        return $url;
    }

	// Set request vars
    public function setRequestVars(&$vars) {
		if (is_array($vars) && count($vars)) {
			foreach ($vars as $name => $value) {
				// Clean the var
				$GLOBALS['_JREQUEST'][$name] = array();

				// Set the GET array
				$_GET[$name] = $value;
				$GLOBALS['_JREQUEST'][$name]['SET.GET'] = true;

				// Set the REQUEST array if request method is GET
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
					$_REQUEST[$name] = $value;
					$GLOBALS['_JREQUEST'][$name]['SET.REQUEST'] = true;
				}
			}
		}
    }
}
?>