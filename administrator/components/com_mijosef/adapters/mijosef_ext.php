<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @subpackage	MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU GPL, http://mijosoft.com/company/license
*/

// No permission
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.html.parameter');

// MijoSEF extension installation adapater
class JInstallerMijosef_Ext extends JObject {

	function __construct(&$parent) {
		$this->parent =& $parent;
	}

	function install() {		
		// Get the extension manifest object
		$this->manifest = $this->parent->getManifest();
		
		// Set the extension's name
		$name = (string)$this->manifest->name;
		$this->parent->set('name', $name);
		
		// Set the extension's description
        $description = (string)$this->manifest->description;
        $this->parent->set('message', $description);

		// Set the installation path
		$this->parent->setPath('extension_root', JPATH_ADMINISTRATOR.'/components/com_mijosef/extensions');
		
		/**
		* ---------------------------------------------------------------------------------------------
		* Filesystem Processing Section
		* ---------------------------------------------------------------------------------------------
		*/
		
		// If the extension directory does not exist, lets create it
        $created = false;
        if (!file_exists($this->parent->getPath('extension_root'))) {
            if (!$created = JFolder::create($this->parent->getPath('extension_root'))) {
                $this->parent->abort(JText::_('MijoSEF Extension').' '.JText::_('Install').': '.JText::_('Failed to create directory').': "'.$this->parent->getPath('extension_root').'"');
                return false;
            }
        }

        if ($created) {
            $this->parent->pushStep(array ('type' => 'folder', 'path' => $this->parent->getPath('extension_root')));
        }
		
		// Copy all necessary files
		$element = $this->manifest->files;
		if ($this->parent->parseFiles($element, -1) === false) {
            // Install failed, roll back changes
            $this->parent->abort();
            return false;
        }
		
		// If there is an install file, lets copy it.
        $installScriptElement = (string)$this->manifest->installfile;
        if ($installScriptElement) {
            // Make sure it hasn't already been copied (this would be an error in the xml install file)
            if (!file_exists($this->parent->getPath('extension_root').DS.$installScriptElement))
            {
                $path['src']	= $this->parent->getPath('source').DS.$installScriptElement;
                $path['dest']	= $this->parent->getPath('extension_root').DS.$installScriptElement;
                if (!$this->parent->copyFiles(array ($path))) {
                    // Install failed, rollback changes
                    $this->parent->abort(JText::_('MijoSEF Extension').' '.JText::_('Install').': '.JText::_('Could not copy PHP install file.'));
                    return false;
                }
            }
            $this->set('install.script', $installScriptElement);
        }

        // If there is an uninstall file, lets copy it.
        $uninstallScriptElement = (string)$this->manifest->uninstallfile;
        if ($uninstallScriptElement) {
            // Make sure it hasn't already been copied (this would be an error in the xml install file)
            if (!file_exists($this->parent->getPath('extension_root').DS.$uninstallScriptElement))
            {
                $path['src']	= $this->parent->getPath('source').DS.$uninstallScriptElement;
                $path['dest']	= $this->parent->getPath('extension_root').DS.$uninstallScriptElement;
                if (!$this->parent->copyFiles(array ($path))) {
                    // Install failed, rollback changes
                    $this->parent->abort(JText::_('MijoSEF Extension').' '.JText::_('Install').': '.JText::_('Could not copy PHP uninstall file.'));
                    return false;
                }
            }
        }
		
		/**
		* ---------------------------------------------------------------------------------------------
		* Database Processing Section
		* ---------------------------------------------------------------------------------------------
		*/
		$db = JFactory::getDBO();
		
		/*
        * Let's run the install queries for the component
        *	If backward compatibility is required - run queries in xml file
        *	If Joomla 1.5 compatible, with discreet sql files - execute appropriate
        *	file for utf-8 support or non-utf-8 support
        */
        if ($this->manifest->install) {
			$result = $this->parent->parseQueries($this->manifest->install->queries);
			if ($result === false) {
				// Install failed, rollback changes
				$this->parent->abort(JText::_('MijoSEF Extension').' '.JText::_('Install').': '.JText::_('SQL Error')." ".$db->stderr(true));
				return false;
			} elseif ($result === 0) {
				// no backward compatibility queries found - try for Joomla 1.5 type queries
				// second argument is the utf compatible version attribute
				$utfresult = $this->parent->parseSQLFiles($this->manifest->install->sql);
				if ($utfresult === false) {
					// Install failed, rollback changes
					$this->parent->abort(JText::_('MijoSEF Extension').' '.JText::_('Install').': '.JText::_('SQLERRORORFILE')." ".$db->stderr(true));
					return false;
				}
			}
		}
		
		// Get extension
		$extension = preg_replace('/.xml$/', '', basename($this->parent->getPath('manifest')));
		
		// Check if extension exists and upgrade is performed
		$db->setQuery("SELECT name, params FROM #__mijosef_extensions WHERE extension = '{$extension}'");
		$existing = $db->loadObject();
		
		$installation = false;
		
		// Existing Install
		if (!is_null($existing)) {
			if ($existing->name == "") {
                Mijosef::get('utility')->import('library.parameter');

				$old_p = new JRegistry($existing->params);
				$new_p = new JRegistry(self::_getDefaultParams());
				$new_p->set('prefix', $old_p->get('prefix', ''));
				$new_p->set('skip_menu', $old_p->get('skip_menu', '0'));
				$params = $new_p->toString();
				
				$db->setQuery("UPDATE #__mijosef_extensions SET name = '{$name}', params = '{$params}' WHERE extension = '{$extension}'");
				$db->query();
				
				$installation = true;
			}
		}
		// New Install
		else {
			JTable::addIncludePath(JPATH_ADMINISTRATOR.'/components/com_mijosef/tables');
			$row = JTable::getInstance('MijosefExtensions', 'Table');
			$row->name 			= $name;
			$row->extension 	= $extension;
			$row->params 		= self::_getDefaultParams();
			$row->store();
			
			$installation = true;
		}
		
		// Remove already created URLs for this extension
		require_once(JPATH_ADMINISTRATOR.'/components/com_mijosef/library/mijosef.php');
		$MijosefConfig =& Mijosef::getConfig();
		if ($installation && $MijosefConfig->purge_ext_urls == 1) {
			$db->setQuery("DELETE FROM #__mijosef_urls WHERE (url_real LIKE '%option={$extension}&%' OR url_real LIKE '%option={$extension}') AND params LIKE '%locked=0\nb%'");
			$db->query();
		}
		
		/**
		* ---------------------------------------------------------------------------------------------
		* Custom Installation Script Section
		* ---------------------------------------------------------------------------------------------
		*/

		/*
		* If we have an install script, lets include it, execute the custom
		* install method, and append the return value from the custom install
		* method to the installation message.
		*/
		if ($this->get('install.script')) {
			if (is_file($this->parent->getPath('extension_root').DS.$this->get('install.script'))) {
				ob_start();
				ob_implicit_flush(false);
				require_once ($this->parent->getPath('extension_root').DS.$this->get('install.script'));
				if (function_exists('com_install')) {
					if (com_install() === false) {
						$this->parent->abort(JText::_('MijoSEF Extension').' '.JText::_('Install').': '.JText::_('Custom install routine failure'));
						return false;
					}
				}
				$msg = ob_get_contents();
				ob_end_clean();
				if ($msg != '') {
					$this->parent->set('extension.message', $msg);
				}
			}
		}
		
		/**
		* ---------------------------------------------------------------------------------------------
		* Finalization and Cleanup Section
		* ---------------------------------------------------------------------------------------------
		*/
		
		// Lastly, we will copy the manifest file to its appropriate place.
		if (!$this->parent->copyManifest(-1)) {
			// Install failed, rollback changes
			$this->parent->abort(JText::_('Could not copy setup file'));
			return false;
		}

		return true;
		
	}
    
	// Get default params
    function _getDefaultParams() {
        $element = $this->manifest->install->defaultParams;
        
		$prms = array();
        $prms['router'] = 3;
        $prms['prefix'] = '';
        $prms['skip_menu'] = 0;
		
		if ($element and count($element->children())) {
			$defaultParams = $element->children();
			if (count($defaultParams) != 0) {
				foreach ($defaultParams as $param) {
					$name = (string)$param->attributes()->name;
					$value = (string)$param->attributes()->value;

                    $prms[$name] = $value;
				}
			}
		}
		
		$reg = new JRegistry($prms);
		$params = $reg->toString();
		
		return $params;
    }
}
?>