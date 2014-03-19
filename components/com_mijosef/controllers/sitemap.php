<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @subpackage	MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

//No Permision
defined('_JEXEC') or die('Restricted access');

// Imports
jimport('joomla.application.component.controller');

if (!class_exists('MijosoftController')) {
	if (interface_exists('JController')) {
		abstract class MijosoftController extends JControllerLegacy {}
	}
	else {
		class MijosoftController extends JController {}
	}
}

class MijosefControllerSitemap extends MijosoftController {

	function display() {
		$this->MijosefConfig = Mijosef::getConfig();
		
		$format = JRequest::getWord('format');
		
		if ($format != 'xml') {
			$model = $this->getModel('Sitemap');
			$view = $this->getView('Sitemap', 'html');
			
			$view->setModel($model, true);	
			$view->display();	
		}
		else {
			$root = JRequest::getString('root');
			
			if (!empty($root)) {
				self::_getIndexXML($root);
			}
			else {
				self::_getSitemapXML();
			}
		}
	}
	
	function _getIndexXML($root) {
		require_once(JPATH_ADMINISTRATOR.'/components/com_mijosef/library/database.php');
		require_once(JPATH_ADMINISTRATOR.'/components/com_mijosef/library/mijosef.php');
		require_once(JPATH_ADMINISTRATOR.'/components/com_mijosef/library/uri.php');
		
		$doc =& JFactory::getDocument();
		$doc->setMimeEncoding('text/xml');
		
		// Get domain
		$domain = Mijosef::get('uri')->getDomain();
		
		$query = "SELECT url_sef FROM #__mijosef_sitemap WHERE published = '1' AND url_sef REGEXP '^{$root}[^/]*/[^/]*$' ORDER BY url_sef";
		
		$rows = MijoDatabase::loadObjectList($query);
		
		// Put header
		$text =
        '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';

		if (!empty($rows) && is_array($rows)) {
			foreach($rows as $row) {
				$url_sef = str_replace('&', '&amp;', $row->url_sef);
				
			$text .=
                '	<sitemap>
		<loc>' . $domain . 'index.php?option=com_mijosef&amp;view=sitemap&amp;format=xml&amp;s1=' . $row->url_sef . '</loc>
	</sitemap>
';
		}
		}

		$text .= '</sitemapindex>';
		
		echo $text;
	}
	
	function _getSitemapXML() {
		$com = JRequest::getCmd('com');
		$doc =& JFactory::getDocument();
		$domain = Mijosef::get('uri')->getDomain();
		
		require_once(JPATH_ADMINISTRATOR.'/components/com_mijosef/library/database.php');
		require_once(JPATH_ADMINISTRATOR.'/components/com_mijosef/library/mijosef.php');
		require_once(JPATH_ADMINISTRATOR.'/components/com_mijosef/library/uri.php');
		
		$doc->setMimeEncoding('text/xml');
		
		$where = $url = '';
		
		for ($i = 1; $i <= 7; $i++) {
			$url = JRequest::getString('s'.$i);
			
			if (!empty($url)) {
				if (!empty($com)) {
					$where .= "(s.url_sef = '{$url}' OR s.url_sef LIKE '{$url}/%') OR";
				}
				else {
					$where .= "(url_sef = '{$url}' OR url_sef LIKE '{$url}/%') OR";
				}
			}
		}
		
		$where = rtrim($where, ' OR');
		
		if (!empty($com)) {
			if (!empty($where)) {
				$where = "AND ({$where}) AND (LOWER(u.url_real) LIKE '%option={$com}&%')";
			}
			else {
				$where = "AND LOWER(u.url_real) LIKE '%option={$com}&%'";
			}
			
			$query = "SELECT s.url_sef, s.sdate, s.frequency, s.priority FROM #__mijosef_sitemap AS s, #__mijosef_urls AS u WHERE s.url_sef = u.url_sef AND published = '1' {$where} GROUP BY s.url_sef ORDER BY s.url_sef";
		}
		else {
			if (!empty($where)) {
				$where = "AND ({$where})";
			}
			
			$query = "SELECT url_sef, sdate, frequency, priority FROM #__mijosef_sitemap WHERE published = '1' {$where} ORDER BY url_sef";
		}
		
		$start = JRequest::getInt('start', 0);
		$limit = JRequest::getInt('limit', 0);
		if ($start && $start != 0) {
			$start = $start - 1;
		}
		
		$rows = MijoDatabase::loadObjectList($query, $start, $limit);
		
		// Put header
		$text =
        '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';

		if (!empty($rows) && is_array($rows)) {
			foreach($rows as $row) {
				$sm_date = $row->sdate;
				$sm_freq = $row->frequency;
				$sm_priority = $row->priority;
				
				if ($sm_date == '0000-00-00' || $sm_date == ''){
					$sm_date = date('Y-m-d');
				}
				
				if ($sm_freq == ''){
					$sm_freq = $this->MijosefConfig->sm_freq;
				}
				
				if ($sm_priority == ''){
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
		}
		$text .= '</urlset>';
		
		echo $text;
	}
}