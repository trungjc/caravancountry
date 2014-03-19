<?php
/*
* @package		MijoSEF
* @subpackage	Wrapper
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted access');

class MijoSEF_com_wrapper extends MijosefExtension {
	
	function beforeBuild(&$uri) {
        if (is_null($uri->getVar('view'))) {
            $uri->setVar('view', 'wrapper');
		}
    }

	function build(&$vars, &$segments, &$do_sef, &$metadata, &$item_limitstart) {
		// Extract variables
        extract($vars);
		
		unset($vars['view']);
		
		$metadata = parent::getMetaData($vars, $item_limitstart);
		
		unset($vars['limit']);
		unset($vars['limitstart']);
	}
}
?>