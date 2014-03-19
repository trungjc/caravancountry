<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @subpackage	MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// View Class
class MijosefViewSefUrls extends MijosefView {

	// Edit URL
	function edit($tpl = null) {
		$row = $this->getModel()->getEditData('MijosefSefUrls');
		
		// Toolbar
		JToolBarHelper::title(JText::_('COM_MIJOSEF_URL_EDIT_TITLE').' '.$row->url_sef, 'mijosef');
        JToolBarHelper::save('editSave');
        JToolBarHelper::apply('editApply');
        JToolBarHelper::cancel('editCancel');
		JToolBarHelper::divider();
        JToolBarHelper::save2copy('editSaveMoved', JTEXT::_('COM_MIJOSEF_TOOLBAR_SEF_SAVEMOVED'));
		JToolBarHelper::divider();
		$this->toolbar->appendButton('Popup', 'help1', JText::_('Help'), 'http://mijosoft.com/support/docs/mijosef/user-manual/urls?tmpl=component', 650, 500);
		
		//
		// Params
		//
		$params = new JRegistry($row->params);
   	   	$url['custom'] = $params->get('custom', '0');
   	   	$url['published'] = $params->get('published', '0');
   	   	$url['locked'] = $params->get('locked', '0');
   	   	$url['blocked'] = $params->get('blocked', '0');
   	   	$url['trashed'] = $params->get('trashed', '0');
   	   	$url['notfound'] = $params->get('notfound', '0');
   	   	$url['tags'] = $params->get('tags', '0');
   	   	$url['ilinks'] = $params->get('ilinks', '0');
   	   	$url['bookmarks'] = $params->get('bookmarks', '0');
		$url['notes'] = $params->get('notes', '');
		
		$cache = $this->get('Cache');
		$url['cached'] = '0';
		if (isset($cache[$row->url_real])) {
			$url['cached'] = '1';
		}
		
		// Get alias
		$url['alias'] = self::getAliases($row->url_sef);
		
		// Assign values
		$this->row          = $row;
		$this->url          = $url;
		$this->metadata     = self::getMetadata($row->url_sef);
		$this->sitemap      = self::getSitemap($row->url_sef);
		
		parent::display($tpl);
	}
	
	function getAliases($url) {
		$aliases = "";
		$urls = MijoDatabase::loadObjectList("SELECT url_old FROM #__mijosef_urls_moved WHERE url_new = '{$url}' ORDER BY url_old");
		
		if (!is_null($urls)) {
			foreach ($urls as $u) {
				$aliases .= $u->url_old."\n";
			}
		}
		
		return $aliases;
	}
	
	function getMetadata($url) {
		$empty = new stdClass();
		$empty->id = "";
		$empty->published = 0;
		$empty->title = "";
		$empty->description = "";
		$empty->keywords = "";
		$empty->lang = "";
		$empty->robots = "";
		$empty->googlebot = "";
		$empty->canonical = "";
		
		$task = JRequest::getWord('task');
		if ($task == 'add') {
			return $empty;
		}
		
		$metadata = MijoDatabase::loadObject("SELECT * FROM #__mijosef_metadata WHERE url_sef = '{$url}'");
		if (!is_object($metadata)) {
			return $empty;
		}
		
		return $metadata;
	}
	
	function getSitemap($url) {
		$empty = new stdClass();
		$empty->id = "";
		$empty->published = "0";
		$empty->sdate = date('Y-m-d');
		$empty->frequency = $this->MijosefConfig->sm_freq;
		$empty->priority = $this->MijosefConfig->sm_priority;
		$empty->sparent = "";
		$empty->sorder = "";
		
		$task = JRequest::getWord('task');
		if ($task == 'add') {
			return $empty;
		}
		
		$sitemap = MijoDatabase::loadObject("SELECT * FROM #__mijosef_sitemap WHERE url_sef = '{$url}'");
		if (!is_object($sitemap)) {
			return $empty;
		}
		
		return $sitemap;
	}
}
?>