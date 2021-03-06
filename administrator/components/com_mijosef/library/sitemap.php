<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Imports
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

// Sitemap class
class MijosefSitemap {
	
	function __construct() {
		// Get config object
		$this->MijosefConfig = Mijosef::getConfig();
	}
	
	function autoSitemap($component, $ext_params, $sef_url, $real_url) {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}

		// Sitemap filter
		$in_filter = Mijosef::get('utility')->_urlFilter('sm', $sef_url, $real_url, $ext_params);
		
		$enable_cats = Mijosef::get('utility')->getConfigState($ext_params, 'sm_auto_enable_cats');
		
		$cat = Mijosef::get('utility')->get('category.param');
		$category = ((($cat['sm_auto_cats_status'] == 1) || ($cat['sm_auto_cats_status'] = 0 && $cat['_flag'] = 0)) || !$enable_cats);
		
		if (in_array($component, $this->MijosefConfig->sm_auto_components) && !$in_filter && $category) {
			static $checked = array();
			
			if (!isset($checked[$sef_url])) {
				$m = Mijosef::get('cache')->checkSitemap($sef_url);
				$checked[$sef_url] = "checked";
			}
			
			if ($checked[$sef_url] != "saved" && isset($m) && !is_object($m)) {
				date_default_timezone_set('UTC');
				$values = "(".MijoDatabase::quote($sef_url).", '".date('Y-m-d')."', '".$this->MijosefConfig->sm_freq."', '".$this->MijosefConfig->sm_priority."')";
				MijoDatabase::query("INSERT IGNORE INTO #__mijosef_sitemap (url_sef, sdate, frequency, priority) VALUES {$values}");
				
				if (MIJOSEF_PACK == 'pro' && $this->MijosefConfig->sm_auto_cron_freq == 1) {
					self::cron($ext_params);
				}
			
				$checked[$sef_url] = "saved";
			}
		}
	}
    
    function cron($ext_params) {
    	if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		// Generate XML
		if (Mijosef::get('utility')->getConfigState($ext_params, 'sm_auto_xml')) {
			// Modify config object 
			$old_sm_ping = $this->MijosefConfig->sm_ping;
			$this->MijosefConfig->sm_ping = 0;
			
			// Generate
			self::generateXML();
			
			// Restore config object
			$this->MijosefConfig->sm_ping = $old_sm_ping;
		}
		
		// Ping search engines
		if (Mijosef::get('utility')->getConfigState($ext_params, 'sm_auto_ping_c')) {
			self::pingGoogle();
			self::pingYahoo();
			self::pingBing();
		}
		
		// Ping services
		if (Mijosef::get('utility')->getConfigState($ext_params, 'sm_auto_ping_s')) {
			$services = explode(', ', $this->MijosefConfig->sm_ping_services);
			foreach ($services as $service) {
				self::pingServices($service);
			}
		}
    }
	
	// Generate the XML file
	function generateXML() {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		$msg = "empty";
		$file = JPATH_SITE.'/'.$this->MijosefConfig->sm_file.'.xml';
		
		// Get domain
		$domain = Mijosef::get('uri')->getDomain();
		
		// Put header
		$text =
        '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';
		
		// Get URLs
		$rows = MijoDatabase::loadObjectList("SELECT url_sef, sdate, frequency, priority FROM #__mijosef_sitemap WHERE published = '1' ORDER BY url_sef");
		
		if(!is_null($rows)){
			foreach($rows as $row){
				$sm_date = $row->sdate;
				$sm_freq = $row->frequency;
				$sm_priority = $row->priority;
				
				if($sm_date == '0000-00-00' || $sm_date == ''){
					$sm_date = date('Y-m-d');
				}
				if($sm_freq == ''){
					$sm_freq = $this->MijosefConfig->sm_freq;
				}
				if($sm_priority == ''){
					$sm_priority = $this->MijosefConfig->sm_priority;
				}
				
				$date = $freq = $prior = '';
				
				if ($this->MijosefConfig->sm_xml_date == 1){
					$date = '
		<lastmod>'.$sm_date.'</lastmod>';
				}
				
				if ($this->MijosefConfig->sm_xml_freq == 1){
					$freq = '
		<changefreq>'.$sm_freq.'</changefreq>';
				}
				
				if ($this->MijosefConfig->sm_xml_prior == 1){
					$prior = '
		<priority>'.$sm_priority.'</priority>';
				}
				
				$row->url_sef = str_replace('&', '&amp;', $row->url_sef);
				
			$text .=
                '	<url>
		<loc>' . $domain . $row->url_sef . '</loc>' . $date . $freq . $prior .'
	</url>
';
		}
		$text .= '</urlset>';
			
			// Write the file
			if(JFile::exists($file)){
				if(is_writable($file)) {
					if(!JFile::write($file, $text)) {
						$msg = JText::_('COM_MIJOSEF_SITEMAP_GENERATED_NOT_WRITE')." ".$file;
					} else {
						$msg = "";
						// Ping sitemap
						if($this->MijosefConfig->sm_ping == 1){
							self::pingGoogle();
							self::pingYahoo();
							self::pingBing();
						}
					}
				} else {
					$msg = JText::_('COM_MIJOSEF_SITEMAP_GENERATED_NOT_WRITABLE')." ".$file;
				}
			} else {
				$msg = JText::_('COM_MIJOSEF_SITEMAP_GENERATED_NOT_NOFILE')." ".$file;
			}
		}
		return $msg;
	}
	
	// Ping Google
	function pingGoogle() {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		// Get domain
		$domain = Mijosef::get('uri')->getDomain();
		
		if ($this->MijosefConfig->sm_ping_type == 'file') {
			$sitemap = $domain . $this->MijosefConfig->sm_file.".xml";
		} else {
			$sitemap = $domain . "index.php?option=com_mijosef&view=sitemap&format=xml";
		}
		
		$link = "http://www.google.com/webmasters/sitemaps/ping?sitemap=".urlencode($sitemap);
		
		$msg = Mijosef::get('utility')->getRemoteData($link);
		
		return $msg;
	}
	
	// Ping Yahoo
	function pingYahoo() {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		// Get domain
		$domain = Mijosef::get('uri')->getDomain();
		
		if ($this->MijosefConfig->sm_ping_type == 'file') {
			$sitemap = $domain . $this->MijosefConfig->sm_file.".xml";
		} else {
			$sitemap = $domain . "index.php?option=com_mijosef&view=sitemap&format=xml";
		}
		
		$link = "http://search.yahooapis.com/SiteExplorerService/V1/updateNotification?appid=".$this->MijosefConfig->sm_yahoo_appid."&url=".urlencode($sitemap);
		
		$msg = Mijosef::get('utility')->getRemoteData($link);
		
		return $msg;
	}
	
	// Ping Bing
	function pingBing() {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		// Get domain
		$domain = Mijosef::get('uri')->getDomain();
		
		if ($this->MijosefConfig->sm_ping_type == 'file') {
			$sitemap = $domain . $this->MijosefConfig->sm_file.".xml";
		} else {
			$sitemap = $domain . "index.php?option=com_mijosef&view=sitemap&format=xml";
		}
		
		$link1 = "http://webmaster.live.com/webmaster/ping.aspx?siteMap=".urlencode($sitemap);
		$link2 = "http://www.bing.com/webmaster/ping.aspx?siteMap=".urlencode($sitemap);
		
		Mijosef::get('utility')->getRemoteData($link1);
		$msg = Mijosef::get('utility')->getRemoteData($link2);
		
		return $msg;
	}
	
	// Ping services, thanks to Mario Medina
	function pingServices($service) {
		if (empty($this->MijosefConfig->pid)) {
			return;
		}
		
		// Get domain
		$domain = Mijosef::get('uri')->getDomain();
		
		// Sitemap file
		$sitemap = $domain.$this->MijosefConfig->sm_file.".xml";
		
		// Site name
		$config = JFactory::getConfig();
		$sitename = $config->get("sitename");
		
		$parse = parse_url($service);
		if(!isset($parse['host'])){
			return false;
		}
		$host = $parse['host'];
		$port = isset($parse['port'])?$parse['port']:80;
		$uri  = isset($parse['path'])?$parse['path']:'/';

		$fp = fsockopen($host, $port, $errno, $errstr);
		if(!$fp) { 
			return array(-1, "Cannot open connection: $errstr ($errno)<br />\n");
		}

		$data = "<?xml version=\"1.0\"?>\r\n".
				"  <methodCall>\r\n".
				"    <methodName>weblogUpdates.ping</methodName>\r\n".
				"    <params>\r\n".
				"      <param>\r\n".
				"        <value>$sitename</value>\r\n".
				"      </param>\r\n".
				"      <param>\r\n".
				"        <value>$sitemap</value>\r\n".
				"      </param>\r\n".
				"    </params>\r\n".
				"  </methodCall>";

		$len  = strlen($data);
		$out  = "POST $uri HTTP/1.0\r\n";
		$out .= "User-Agent: Joomla! Ping/1.0\r\n";
		$out .= "Host: $host\r\n";
		$out .= "Content-Type: text/xml\r\n";
		$out .= "Content-length: $len\r\n\r\n";
		$out .= $data;

		fwrite($fp, $out);
		$response = '';
		while(!feof($fp)){
			$response .= fgets($fp, 128);
		}
		fclose($fp);

		$lines = explode("\r\n", $response);
		$firstline = $lines[0];
		if(!ereg("HTTP/1.[01] 200 OK", $firstline)){
			return array(-1, $firstline);
		}

		while($lines[0] != ''){
			array_shift($lines);
		}
		array_shift($lines);
		$lines = strip_tags(implode(' ', $lines));

		$n = preg_match('|<member>\s*<name>flerror</name>\s*<value>\s*<boolean>([^<]*)</boolean>\s*</value>\s*</member>|i', $response, $matches);
		if(0 == $n){
			return array(-1, $lines);
		}
		$flerror = $matches[1];

		$n = preg_match('|<member>\s*<name>message</name>\s*<value>\s*<string>([^<]*)</string>\s*</value>\s*</member>|i', $response, $matches);
		if(0 == $n){
			return array(-1, $lines);
		}
		$message = $matches[1];

		return array($flerror, $message);
	}
	
	function getPriorityList() {		
		static $list;
		
		if(!isset($list)) {
			$list[] = JHTML::_('select.option', '0.0', '0.0');
			$list[] = JHTML::_('select.option', '0.1', '0.1');
			$list[] = JHTML::_('select.option', '0.2', '0.2');
			$list[] = JHTML::_('select.option', '0.3', '0.3');
			$list[] = JHTML::_('select.option', '0.4', '0.4');
			$list[] = JHTML::_('select.option', '0.5', '0.5');
			$list[] = JHTML::_('select.option', '0.6', '0.6');
			$list[] = JHTML::_('select.option', '0.7', '0.7');
			$list[] = JHTML::_('select.option', '0.8', '0.8');
			$list[] = JHTML::_('select.option', '0.9', '0.9');
			$list[] = JHTML::_('select.option', '1.0', '1.0');
		}
		
		return $list;
	}
	
	function getFrequencyList() {		
		static $list;
		
		if(!isset($list)) {
			$list[] = JHTML::_('select.option', 'always', JText::_('COM_MIJOSEF_SITEMAP_SELECT_ALWAYS'));
			$list[] = JHTML::_('select.option', 'hourly', JText::_('COM_MIJOSEF_SITEMAP_SELECT_HOURLY'));
			$list[] = JHTML::_('select.option', 'daily', JText::_('COM_MIJOSEF_SITEMAP_SELECT_DAILY'));
			$list[] = JHTML::_('select.option', 'weekly', JText::_('COM_MIJOSEF_SITEMAP_SELECT_WEEKLY'));
			$list[] = JHTML::_('select.option', 'monthly', JText::_('COM_MIJOSEF_SITEMAP_SELECT_MONTHLY'));
			$list[] = JHTML::_('select.option', 'yearly', JText::_('COM_MIJOSEF_SITEMAP_SELECT_YEARLY'));
			$list[] = JHTML::_('select.option', 'never', JText::_('COM_MIJOSEF_SITEMAP_SELECT_NEVER'));
		}
		
		return $list;
	}
}