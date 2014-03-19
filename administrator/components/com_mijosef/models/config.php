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

Mijosef::get('utility')->import('library.sitemap');

// Model Class
class MijosefModelConfig extends MijosefModel {

	// Main constructer
	function __construct() {
        parent::__construct('config');
    }
    
	// Save configuration
	function save() {
		$config = new stdClass();
		
		// Main
		$config->mode							= JRequest::getVar('mode', 							1, 			'post', 'int');
		$config->generate_sef					= JRequest::getVar('generate_sef', 					1, 			'post', 'int');
		$config->version_checker				= JRequest::getVar('version_checker', 				1, 			'post', 'int');
		$config->pid					        = JRequest::getVar('pid', 					        '', 		'post',	'string');
		$config->cache_instant					= JRequest::getVar('cache_instant', 				1, 			'post', 'int');
		$config->cache_versions					= JRequest::getVar('cache_versions', 				1, 			'post', 'int');
		$config->cache_extensions				= JRequest::getVar('cache_extensions', 				1, 			'post', 'int');
		$config->cache_urls						= JRequest::getVar('cache_urls', 					1, 			'post', 'int');
		$config->cache_urls_size				= JRequest::getVar('cache_urls_size', 				'10000', 	'post',	'string');
		$config->cache_metadata					= JRequest::getVar('cache_metadata', 				1, 			'post', 'int');
		$config->cache_sitemap					= JRequest::getVar('cache_sitemap', 				1, 			'post', 'int');
		$config->cache_urls_moved				= JRequest::getVar('cache_urls_moved', 				1, 			'post', 'int');
		$config->cache_tags						= JRequest::getVar('cache_tags', 					1, 			'post', 'int');
		$config->cache_ilinks					= JRequest::getVar('cache_ilinks', 					1, 			'post', 'int');
		$config->seo_nofollow					= JRequest::getVar('seo_nofollow', 					0, 			'post', 'int');
		$config->page404						= JRequest::getVar('page404', 						'custom', 	'post', 'string');
		
		// URL
		$config->url_lowercase					= JRequest::getVar('url_lowercase', 				0, 			'post', 'int');
		$config->global_smart_itemid			= JRequest::getVar('global_smart_itemid', 			1, 			'post', 'int');
		$config->ignore_multi_itemid			= JRequest::getVar('ignore_multi_itemid', 			0, 			'post', 'int');
		$config->numeral_duplicated				= JRequest::getVar('numeral_duplicated', 			0, 			'post', 'int');
		$config->record_duplicated				= JRequest::getVar('record_duplicated', 			1, 			'post', 'int');
		$config->url_suffix						= JRequest::getVar('url_suffix', 					'', 		'post', 'string');
		$config->replacement_character			= JRequest::getVar('replacement_character',			'', 		'post', 'string');
		$config->parent_menus					= JRequest::getVar('parent_menus', 					0, 			'post', 'int');
		$config->menu_url_part					= JRequest::getVar('menu_url_part',					'title', 	'post', 'string');
		$config->title_alias					= JRequest::getVar('title_alias', 					'title', 	'post', 'string');
		$config->append_itemid					= JRequest::getVar('append_itemid', 				0, 			'post', 'int');
		$config->remove_trailing_slash			= JRequest::getVar('remove_trailing_slash', 		1, 			'post', 'int');
		$config->tolerant_to_trailing_slash		= JRequest::getVar('tolerant_to_trailing_slash', 	1, 			'post', 'int');
		$config->url_strip_chars				= JRequest::getVar('url_strip_chars',				'', 		'post', 'string');
		$config->source_tracker					= JRequest::getVar('source_tracker', 				0, 			'post', 'int');
		$config->insert_active_itemid			= JRequest::getVar('insert_active_itemid', 			0, 			'post', 'int');
		$config->remove_sid						= JRequest::getVar('remove_sid', 					1, 			'post', 'int');
		$config->set_query_string				= JRequest::getVar('set_query_string', 				0, 			'post', 'int');
		$config->base_href						= JRequest::getVar('base_href', 					3, 			'post', 'int');
		$config->append_non_sef					= JRequest::getVar('append_non_sef', 				1, 			'post', 'int');
		$config->prevent_dup_error				= JRequest::getVar('prevent_dup_error', 			1, 			'post', 'int');
		$config->show_db_errors					= JRequest::getVar('show_db_errors', 				0, 			'post', 'int');
		$config->check_url_by_id				= JRequest::getVar('check_url_by_id', 				1, 			'post', 'int');
		$config->non_sef_vars					= JRequest::getVar('non_sef_vars', 					'', 		'post', 'string');
		$config->disable_sef_vars				= JRequest::getVar('disable_sef_vars', 				'', 		'post', 'string');
		$config->skip_menu_vars					= JRequest::getVar('skip_menu_vars', 				'', 		'post', 'string');
		$config->db_404_errors					= JRequest::getVar('db_404_errors', 				1, 			'post', 'int');
		$config->log_404_errors					= JRequest::getVar('log_404_errors', 				0, 			'post', 'int');
		$config->sent_headers_error				= JRequest::getVar('sent_headers_error', 			0, 			'post', 'int');
		$config->multilang				        = JRequest::getVar('multilang', 			'0', 		'post', 'string');
		$config->joomfish_main_lang				= JRequest::getVar('joomfish_main_lang', 			'0', 		'post', 'string');
		$config->joomfish_lang_code				= JRequest::getVar('joomfish_lang_code', 			1, 			'post', 'int');
		$config->multilang_home_code			= JRequest::getVar('multilang_home_code', 			1, 			'post', 'int');
		$config->joomfish_trans_url				= JRequest::getVar('joomfish_trans_url', 			1, 			'post', 'int');
		$config->joomfish_cookie				= JRequest::getVar('joomfish_cookie', 				1, 			'post', 'int');
		$config->joomfish_browser				= JRequest::getVar('joomfish_browser', 				1, 			'post', 'int');
		$config->utf8_url						= JRequest::getVar('utf8_url', 						0, 			'post', 'int');
		$config->char_replacements				= JRequest::getVar('char_replacements',				'', 		'post', 'string');
		$config->redirect_to_www				= JRequest::getVar('redirect_to_www', 				0, 			'post', 'int');
		$config->redirect_to_sef				= JRequest::getVar('redirect_to_sef', 				1, 			'post', 'int');
		$config->redirect_to_sef_gen			= JRequest::getVar('redirect_to_sef_gen', 			0, 			'post', 'int');
		$config->jsef_to_mijosef			    = JRequest::getVar('jsef_to_mijosef', 				1, 			'post', 'int');
		$config->force_ssl						= JRequest::getVar('force_ssl', 					array(), 	'post', 'array');
		$config->url_append_limit				= JRequest::getVar('url_append_limit', 				0, 			'post', 'int');
		$config->purge_ext_urls					= JRequest::getVar('purge_ext_urls', 				1, 			'post', 'int');
		$config->delete_other_sef				= JRequest::getVar('delete_other_sef', 				1, 			'post', 'int');
		
		// Meta Tags
		$config->meta_core						= JRequest::getVar('meta_core', 					1, 			'post', 'int');
		$config->meta_title						= JRequest::getVar('meta_title', 					1, 			'post', 'int');
		$config->meta_title_tag					= JRequest::getVar('meta_title_tag', 				1, 			'post', 'int');
		$config->meta_desc						= JRequest::getVar('meta_desc', 					1, 			'post', 'int');
		$config->meta_key						= JRequest::getVar('meta_key', 						1, 			'post', 'int');
		$config->meta_generator					= JRequest::getVar('meta_generator', 				'', 		'post', 'string');
		$config->meta_generator_rem				= JRequest::getVar('meta_generator_rem', 			0, 			'post', 'int');
		$config->meta_abstract					= JRequest::getVar('meta_abstract', 				'', 		'post', 'string');
		$config->meta_revisit					= JRequest::getVar('meta_revisit', 					'', 		'post', 'string');
		$config->meta_direction					= JRequest::getVar('meta_direction', 				'', 		'post', 'string');
		$config->meta_googlekey					= JRequest::getVar('meta_googlekey', 				'', 		'post', 'string');
		$config->meta_livekey					= JRequest::getVar('meta_livekey', 					'', 		'post', 'string');
		$config->meta_yahookey					= JRequest::getVar('meta_yahookey', 				'', 		'post', 'string');
		$config->meta_alexa						= JRequest::getVar('meta_alexa', 					'', 		'post', 'string');
		$config->meta_name_1					= JRequest::getVar('meta_name_1', 					'', 		'post', 'string');
		$config->meta_name_2					= JRequest::getVar('meta_name_2', 					'', 		'post', 'string');
		$config->meta_name_3					= JRequest::getVar('meta_name_3', 					'', 		'post', 'string');
		$config->meta_con_1						= JRequest::getVar('meta_con_1', 					'', 		'post', 'string');
		$config->meta_con_2						= JRequest::getVar('meta_con_2', 					'', 		'post', 'string');
		$config->meta_con_3						= JRequest::getVar('meta_con_3', 					'', 		'post', 'string');
		$config->meta_t_seperator				= JRequest::getVar('meta_t_seperator', 				'-', 		'post', 'string');
		$config->meta_t_sitename					= JRequest::getVar('meta_t_sitename', 			'', 		'post', 'string');
		$config->meta_t_usesitename				= JRequest::getVar('meta_t_usesitename', 			2, 			'post', 'int');
		$config->meta_t_prefix					= JRequest::getVar('meta_t_prefix', 				'', 		'post', 'string');
		$config->meta_t_suffix					= JRequest::getVar('meta_t_suffix', 				'', 		'post', 'string');
		$config->meta_key_blacklist				= JRequest::getVar('meta_key_blacklist', 			'', 		'post', 'string');
		$config->meta_key_whitelist				= JRequest::getVar('meta_key_whitelist', 			'', 		'post', 'string');
		
		// Sitemap
		$config->sm_file						= JRequest::getVar('sm_file', 						'sitemap', 	'post', 'string');
		$config->sm_xml_date					= JRequest::getVar('sm_xml_date', 					1, 			'post', 'int');
		$config->sm_xml_freq					= JRequest::getVar('sm_xml_freq', 					1, 			'post', 'int');
		$config->sm_xml_prior					= JRequest::getVar('sm_xml_prior', 					1, 			'post', 'int');
		$config->sm_dot_tree					= JRequest::getVar('sm_dot_tree', 					0, 			'post', 'int');
		$config->sm_ping_type					= JRequest::getVar('sm_ping_type', 					'link', 	'post', 'string');
		$config->sm_ping						= JRequest::getVar('sm_ping', 						1, 			'post', 'int');
		$config->sm_yahoo_appid					= JRequest::getVar('sm_yahoo_appid', 				'', 		'post', 'string');
		$config->sm_ping_services				= JRequest::getVar('sm_ping_services', 				'', 		'post', 'string');
		$config->sm_freq						= JRequest::getVar('sm_freq', 						'weekly', 	'post', 'string');
		$config->sm_priority					= JRequest::getVar('sm_priority', 					'0.5', 		'post', 'string');
		$config->sm_auto_mode					= JRequest::getVar('sm_auto_mode', 					1, 			'post', 'int');
		$config->sm_auto_components				= JRequest::getVar('sm_auto_components',			array(), 	'post', 'array');
		$config->sm_auto_enable_cats			= JRequest::getVar('sm_auto_enable_cats', 			0, 			'post', 'int');
		$config->sm_auto_filter_s				= JRequest::getVar('sm_auto_filter_s', 				'', 		'post', 'string');
		$config->sm_auto_filter_r				= JRequest::getVar('sm_auto_filter_r', 				'', 		'post', 'string');
		$config->sm_auto_cron_mode				= JRequest::getVar('sm_auto_cron_mode', 			0, 			'post', 'int');
		$config->sm_auto_cron_freq				= JRequest::getVar('sm_auto_cron_freq', 			'24', 		'post', 'int');
		$config->sm_auto_cron_last				= JRequest::getVar('sm_auto_cron_last', 			'', 		'post', 'string');
		$config->sm_auto_xml					= JRequest::getVar('sm_auto_xml', 					1, 			'post', 'int');
		$config->sm_auto_ping_c					= JRequest::getVar('sm_auto_ping_c', 				0, 			'post', 'int');
		$config->sm_auto_ping_s					= JRequest::getVar('sm_auto_ping_s', 				0, 			'post', 'int');
		
		// Tags
		$config->tags_mode						= JRequest::getVar('tags_mode', 					1, 			'post', 'int');
		$config->tags_area						= JRequest::getVar('tags_area', 					1, 			'post', 'int');
		$config->tags_components				= JRequest::getVar('tags_components',				array(), 	'post', 'array');
		$config->tags_enable_cats				= JRequest::getVar('tags_enable_cats', 				0, 			'post', 'int');
		$config->tags_in_cats					= JRequest::getVar('tags_in_cats', 					0, 			'post', 'int');
		$config->tags_in_page					= JRequest::getVar('tags_in_page', 					15, 		'post', 'int');
		$config->tags_order						= JRequest::getVar('tags_order', 					'ordering', 'post', 'string');
		$config->tags_position					= JRequest::getVar('tags_position', 				2, 			'post', 'int');
		$config->tags_limit						= JRequest::getVar('tags_limit', 					20, 		'post', 'int');
		$config->tags_show_tag_desc				= JRequest::getVar('tags_show_tag_desc', 			0, 			'post', 'int');
		$config->tags_show_prefix				= JRequest::getVar('tags_show_prefix', 				1, 			'post', 'int');
		$config->tags_show_item_desc			= JRequest::getVar('tags_show_item_desc', 			1, 			'post', 'int');
		$config->tags_exp_item_desc				= JRequest::getVar('tags_exp_item_desc', 			0, 			'post', 'int');
		$config->tags_published					= JRequest::getVar('tags_published', 				1, 			'post', 'int');
		$config->tags_auto_mode					= JRequest::getVar('tags_auto_mode', 				0, 			'post', 'int');
		$config->tags_auto_components			= JRequest::getVar('tags_auto_components',			array(), 	'post', 'array');
		$config->tags_auto_length				= JRequest::getVar('tags_auto_length', 				4, 			'post', 'int');
		$config->tags_auto_filter_s				= JRequest::getVar('tags_auto_filter_s', 			'', 		'post', 'string');
		$config->tags_auto_filter_r				= JRequest::getVar('tags_auto_filter_r', 			'', 		'post', 'string');
		$config->tags_auto_blacklist			= JRequest::getVar('tags_auto_blacklist', 			'', 		'post', 'string');
		
		// Internal Links
		$config->ilinks_mode					= JRequest::getVar('ilinks_mode', 					0, 			'post', 'int');
		$config->ilinks_area					= JRequest::getVar('ilinks_area', 					1, 			'post', 'int');
		$config->ilinks_components				= JRequest::getVar('ilinks_components',				array(), 	'post', 'array');
		$config->ilinks_enable_cats				= JRequest::getVar('ilinks_enable_cats', 			1, 			'post', 'int');
		$config->ilinks_in_cats					= JRequest::getVar('ilinks_in_cats', 				0, 			'post', 'int');
		$config->ilinks_case					= JRequest::getVar('ilinks_case', 					1, 			'post', 'int');
		$config->ilinks_published				= JRequest::getVar('ilinks_published', 				1, 			'post', 'int');
		$config->ilinks_nofollow				= JRequest::getVar('ilinks_nofollow', 				0, 			'post', 'int');
		$config->ilinks_blank					= JRequest::getVar('ilinks_blank', 					0, 			'post', 'int');
		$config->ilinks_limit					= JRequest::getVar('ilinks_limit', 					10, 		'post', 'int');
		
		// Social Bookmarks
		$config->bookmarks_mode					= JRequest::getVar('bookmarks_mode', 				0, 			'post', 'int');
		$config->bookmarks_area					= JRequest::getVar('bookmarks_area', 				1, 			'post', 'int');
		$config->bookmarks_components			= JRequest::getVar('bookmarks_components',			array(), 	'post', 'array');
		$config->bookmarks_enable_cats			= JRequest::getVar('bookmarks_enable_cats', 		1, 			'post', 'int');
		$config->bookmarks_in_cats				= JRequest::getVar('bookmarks_in_cats', 			0, 			'post', 'int');
		$config->bookmarks_twitter				= JRequest::getVar('bookmarks_twitter', 			'', 		'post', 'string');
		$config->bookmarks_addthis				= JRequest::getVar('bookmarks_addthis', 			'', 		'post', 'string');
		$config->bookmarks_taf					= JRequest::getVar('bookmarks_taf', 				'', 		'post', 'string');
		$config->bookmarks_icons_pos			= JRequest::getVar('bookmarks_icons_pos', 			2, 			'post', 'int');
		$config->bookmarks_icons_txt			= JRequest::getVar('bookmarks_icons_txt', 			'', 		'post', 'string');
		$config->bookmarks_icons_line			= JRequest::getVar('bookmarks_icons_line', 			35, 		'post', 'int');
		$config->bookmarks_published			= JRequest::getVar('bookmarks_published', 			1, 			'post', 'int');
		$config->bookmarks_type					= JRequest::getVar('bookmarks_type', 				'icon', 	'post', 'string');
		
		// User Interface
		$config->ui_cpanel						= JRequest::getVar('ui_cpanel', 					2, 			'post', 'int');
		$config->ui_sef_language				= JRequest::getVar('ui_sef_language', 				0, 			'post', 'int');
		$config->ui_sef_published				= JRequest::getVar('ui_sef_published', 				1, 			'post', 'int');
		$config->ui_sef_used					= JRequest::getVar('ui_sef_used', 					1, 			'post', 'int');
		$config->ui_sef_locked					= JRequest::getVar('ui_sef_locked', 				1, 			'post', 'int');
		$config->ui_sef_blocked					= JRequest::getVar('ui_sef_blocked', 				0, 			'post', 'int');
		$config->ui_sef_cached					= JRequest::getVar('ui_sef_cached', 				1, 			'post', 'int');
		$config->ui_sef_date					= JRequest::getVar('ui_sef_date', 					0, 			'post', 'int');
		$config->ui_sef_hits					= JRequest::getVar('ui_sef_hits', 					1, 			'post', 'int');
		$config->ui_sef_id						= JRequest::getVar('ui_sef_id', 					0, 			'post', 'int');
		$config->ui_moved_published				= JRequest::getVar('ui_moved_published', 			1, 			'post', 'int');
		$config->ui_moved_hits					= JRequest::getVar('ui_moved_hits', 				1, 			'post', 'int');
		$config->ui_moved_clicked				= JRequest::getVar('ui_moved_clicked', 				1, 			'post', 'int');
		$config->ui_moved_cached				= JRequest::getVar('ui_moved_cached', 				1, 			'post', 'int');
		$config->ui_moved_id					= JRequest::getVar('ui_moved_id', 					1, 			'post', 'int');
		$config->ui_metadata_keys				= JRequest::getVar('ui_metadata_keys', 				1, 			'post', 'int');
		$config->ui_metadata_published			= JRequest::getVar('ui_metadata_published', 		1, 			'post', 'int');
		$config->ui_metadata_cached				= JRequest::getVar('ui_metadata_cached', 			1, 			'post', 'int');
		$config->ui_metadata_id					= JRequest::getVar('ui_metadata_id', 				0, 			'post', 'int');
		$config->ui_sitemap_title				= JRequest::getVar('ui_sitemap_title', 				1, 			'post', 'int');
		$config->ui_sitemap_published			= JRequest::getVar('ui_sitemap_published', 			1, 			'post', 'int');
		$config->ui_sitemap_id					= JRequest::getVar('ui_sitemap_id', 				1, 			'post', 'int');
		$config->ui_sitemap_parent				= JRequest::getVar('ui_sitemap_parent', 			1, 			'post', 'int');
		$config->ui_sitemap_order				= JRequest::getVar('ui_sitemap_order', 				1, 			'post', 'int');
		$config->ui_sitemap_date				= JRequest::getVar('ui_sitemap_date', 				1, 			'post', 'int');
		$config->ui_sitemap_frequency			= JRequest::getVar('ui_sitemap_frequency', 			1, 			'post', 'int');
		$config->ui_sitemap_priority			= JRequest::getVar('ui_sitemap_priority', 			1, 			'post', 'int');
		$config->ui_sitemap_cached				= JRequest::getVar('ui_sitemap_cached', 			1, 			'post', 'int');
		$config->ui_tags_published				= JRequest::getVar('ui_tags_published', 			1, 			'post', 'int');
		$config->ui_tags_ordering				= JRequest::getVar('ui_tags_ordering', 				1, 			'post', 'int');
		$config->ui_tags_cached					= JRequest::getVar('ui_tags_cached', 				1, 			'post', 'int');
		$config->ui_tags_hits					= JRequest::getVar('ui_tags_hits', 					1, 			'post', 'int');
		$config->ui_tags_id						= JRequest::getVar('ui_tags_id', 					0, 			'post', 'int');
		$config->ui_ilinks_published			= JRequest::getVar('ui_ilinks_published', 			1, 			'post', 'int');
		$config->ui_ilinks_nofollow				= JRequest::getVar('ui_ilinks_nofollow', 			1, 			'post', 'int');
		$config->ui_ilinks_blank				= JRequest::getVar('ui_ilinks_blank', 				1, 			'post', 'int');
		$config->ui_ilinks_limit				= JRequest::getVar('ui_ilinks_limit', 				1, 			'post', 'int');
		$config->ui_ilinks_cached				= JRequest::getVar('ui_ilinks_cached', 				1, 			'post', 'int');
		$config->ui_ilinks_id					= JRequest::getVar('ui_ilinks_id', 					1, 			'post', 'int');
		$config->ui_bookmarks_published			= JRequest::getVar('ui_bookmarks_published', 		1, 			'post', 'int');
		$config->ui_bookmarks_id				= JRequest::getVar('ui_bookmarks_id', 				1, 			'post', 'int');
		
		// Save 404 Page
        $introtext = (get_magic_quotes_gpc() ? $_POST['introtext'] : addslashes($_POST['introtext']));
        if ($id = MijoDatabase::loadResult('SELECT id FROM #__content WHERE `title` = "404"')){
            $sql = 'UPDATE #__content SET introtext="'.$introtext.'", modified ="'.date("Y-m-d H:i:s").'" WHERE `id` = "'.$id.'";';
        }
		else {
			$attribs = '{\"show_title\":\"0\",\"link_titles\":\"0\",\"show_intro\":\"\",\"show_category\":\"0\",\"link_category\":\"\",\"show_parent_category\":\"0\",\"link_parent_category\":\"\",\"show_author\":\"0\",\"link_author\":\"\",\"show_create_date\":\"0\",\"show_modify_date\":\"0\",\"show_publish_date\":\"0\",\"show_item_navigation\":\"\",\"show_icons\":\"0\",\"show_print_icon\":\"0\",\"show_email_icon\":\"0\",\"show_vote\":\"0\",\"show_hits\":\"0\",\"show_noauth\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\"}';
            $sql = 'INSERT INTO #__content (title, alias, introtext, `fulltext`, state, catid, created, created_by, created_by_alias, modified, modified_by, checked_out, checked_out_time, publish_up, publish_down, images, urls, attribs, version, ordering, metakey, metadesc, access, hits, language) '.
			'VALUES("404", "404", "'.$introtext.'", "", "0", "9", "2011-06-11 12:44:38", "42", "", "'.date("Y-m-d H:i:s").'", "42", "0", "2011-06-11 12:45:09", "2011-05-17 00:00:00", "0000-00-00 00:00:00", "", "", "'.$attribs.'", "1", "0", "", "", "1", "0", "*");';
        }
		MijoDatabase::query($sql);
		
		Mijosef::get('utility')->storeConfig($config);

        $rules = JRequest::getVar('rules', array(), 'post', 'array');
		if (!empty($rules)) {
			$rules	= new JAccessRules($rules);
			$asset	= JTable::getInstance('asset');

            if (!$asset->loadByName('com_mijosef')) {
                $root = JTable::getInstance('asset');
                $root->loadByName('root.1');

                $asset->name = 'com_mijosef';
                $asset->title = 'com_mijosef';
                $asset->setLocation($root->id, 'last-child');
            }
			$asset->rules = (string) $rules;

			if (!$asset->check() or !$asset->store()) {
				$this->setError($asset->getError());
				return false;
			}
		}
	}

    public function getPermissions() {
        return MijoDatabase::loadResult('SELECT rules FROM #__assets WHERE name = "com_mijosef" AND title = "com_mijosef"');
    }
	
	function getLists() {
        $utility = Mijosef::get('utility');

		$lists = array();
		
		// Affected Area
		$areas = array();
  		$areas[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_CONFIG_AREA_1'));
		$areas[] = JHTML::_('select.option', '2', JText::_('COM_MIJOSEF_CONFIG_AREA_2'));
		$areas[] = JHTML::_('select.option', '3', JText::_('COM_MIJOSEF_CONFIG_AREA_3'));
		
		/*
		//
		// Main
		//
		*/
		
		$lists['mode'] 				= $utility->getRadioList('mode', $this->MijosefConfig->mode);
		$lists['generate_sef'] 		= $utility->getRadioList('generate_sef', $this->MijosefConfig->generate_sef);
		$lists['version_checker'] 	= $utility->getRadioList('version_checker', $this->MijosefConfig->version_checker);
		$lists['seo_nofollow'] 		= $utility->getRadioList('seo_nofollow', $this->MijosefConfig->seo_nofollow);
		$lists['cache_instant'] 	= $utility->getRadioList('cache_instant', $this->MijosefConfig->cache_instant);
		$lists['cache_versions'] 	= $utility->getRadioList('cache_versions', $this->MijosefConfig->cache_versions);
		$lists['cache_extensions'] 	= $utility->getRadioList('cache_extensions', $this->MijosefConfig->cache_extensions);
		$lists['cache_urls'] 		= $utility->getRadioList('cache_urls', $this->MijosefConfig->cache_urls);
		$lists['cache_urls_moved'] 	= $utility->getRadioList('cache_urls_moved', $this->MijosefConfig->cache_urls_moved);
		$lists['cache_metadata'] 	= $utility->getRadioList('cache_metadata', $this->MijosefConfig->cache_metadata);
		$lists['cache_sitemap'] 	= $utility->getRadioList('cache_sitemap', $this->MijosefConfig->cache_sitemap);
		$lists['cache_tags'] 		= $utility->getRadioList('cache_tags', $this->MijosefConfig->cache_tags);
		$lists['cache_ilinks'] 		= $utility->getRadioList('cache_ilinks', $this->MijosefConfig->cache_ilinks);
		
		// 404 Page
		$page404 = array();
  		$page404[] = JHTML::_('select.option', 'home', JText::_('COM_MIJOSEF_CONFIG_MAIN_404_HOME'));
		$page404[] = JHTML::_('select.option', 'custom', JText::_('COM_MIJOSEF_CONFIG_MAIN_404_CUSTOM'));
		$page404[] = JHTML::_('select.option', 'joomla', JText::_('COM_MIJOSEF_CONFIG_MAIN_404_JOOMLA'));
		$lists['page404'] = JHTML::_('select.genericlist', $page404, 'page404', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->page404);
		
		// Custom 404 Page
        $row = MijoDatabase::loadObject("SELECT `id`, `introtext` FROM `#__content` WHERE `title` = '404'");
		$lists['custom404'] = isset($row->introtext) ? $row->introtext : JText::_('<h1>404: Not Found</h1><h4>Sorry, but the content you requested could not be found</h4>');

		/*
		//
		// URL
		//
		*/
		$lists['url_lowercase'] 			= $utility->getRadioList('url_lowercase', $this->MijosefConfig->url_lowercase);
		$lists['global_smart_itemid'] 		= $utility->getRadioList('global_smart_itemid', $this->MijosefConfig->global_smart_itemid);
		$lists['ignore_multi_itemid'] 		= $utility->getRadioList('ignore_multi_itemid', $this->MijosefConfig->ignore_multi_itemid);
		$lists['numeral_duplicated'] 		= $utility->getRadioList('numeral_duplicated', $this->MijosefConfig->numeral_duplicated);
		$lists['record_duplicated'] 		= $utility->getRadioList('record_duplicated', $this->MijosefConfig->record_duplicated);
		$lists['parent_menus'] 				= $utility->getRadioList('parent_menus', $this->MijosefConfig->parent_menus);
		$lists['append_itemid'] 			= $utility->getRadioList('append_itemid', $this->MijosefConfig->append_itemid);
		$lists['remove_trailing_slash'] 	= $utility->getRadioList('remove_trailing_slash', $this->MijosefConfig->remove_trailing_slash);
		$lists['tolerant_to_trailing_slash']= $utility->getRadioList('tolerant_to_trailing_slash', $this->MijosefConfig->tolerant_to_trailing_slash);
		$lists['source_tracker'] 			= $utility->getRadioList('source_tracker', $this->MijosefConfig->source_tracker);
		$lists['insert_active_itemid'] 		= $utility->getRadioList('insert_active_itemid', $this->MijosefConfig->insert_active_itemid);
		$lists['remove_sid'] 				= $utility->getRadioList('remove_sid', $this->MijosefConfig->remove_sid);
		$lists['set_query_string'] 			= $utility->getRadioList('set_query_string', $this->MijosefConfig->set_query_string);
		$lists['append_non_sef'] 			= $utility->getRadioList('append_non_sef', $this->MijosefConfig->append_non_sef);
		$lists['prevent_dup_error'] 		= $utility->getRadioList('prevent_dup_error', $this->MijosefConfig->prevent_dup_error);
		$lists['show_db_errors'] 			= $utility->getRadioList('show_db_errors', $this->MijosefConfig->show_db_errors);
		$lists['check_url_by_id'] 			= $utility->getRadioList('check_url_by_id', $this->MijosefConfig->check_url_by_id);
		$lists['db_404_errors'] 			= $utility->getRadioList('db_404_errors', $this->MijosefConfig->db_404_errors);
		$lists['log_404_errors'] 			= $utility->getRadioList('log_404_errors', $this->MijosefConfig->log_404_errors);
		$lists['sent_headers_error'] 		= $utility->getRadioList('sent_headers_error', $this->MijosefConfig->sent_headers_error);
		$lists['utf8_url'] 					= $utility->getRadioList('utf8_url', $this->MijosefConfig->utf8_url);
		$lists['redirect_to_sef'] 			= $utility->getRadioList('redirect_to_sef', $this->MijosefConfig->redirect_to_sef);
		$lists['redirect_to_sef_gen'] 		= $utility->getRadioList('redirect_to_sef_gen', $this->MijosefConfig->redirect_to_sef_gen);
		$lists['jsef_to_mijosef'] 			= $utility->getRadioList('jsef_to_mijosef', $this->MijosefConfig->jsef_to_mijosef);
		$lists['force_ssl'] 				= $utility->getRadioList('force_ssl', $this->MijosefConfig->force_ssl);
		$lists['url_append_limit'] 			= $utility->getRadioList('url_append_limit', $this->MijosefConfig->url_append_limit);
		$lists['purge_ext_urls'] 			= $utility->getRadioList('purge_ext_urls', $this->MijosefConfig->purge_ext_urls);
		$lists['delete_other_sef'] 			= $utility->getRadioList('delete_other_sef', $this->MijosefConfig->delete_other_sef);
		
		// Title-Alias
		$url_part = array();
		$url_part[] = JHTML::_('select.option', 'title', JText::_('COM_MIJOSEF_COMMON_TITLE_FIELD'));
  		$url_part[] = JHTML::_('select.option', 'alias', JText::_('COM_MIJOSEF_COMMON_ALIAS_FIELD'));
		
		// Extensions' title-alias field
		$lists['title_alias'] = JHTML::_('select.genericlist', $url_part, 'title_alias', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->title_alias);
		
		// Menu URL part
		$lists['menu_url_part'] = JHTML::_('select.genericlist', $url_part, 'menu_url_part', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->menu_url_part);
		
		// Base href value
		$base_href = array();
  		$base_href[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_CONFIG_URL_BASEHREF_ORG'));
		$base_href[] = JHTML::_('select.option', '2', JText::_('COM_MIJOSEF_CONFIG_URL_BASEHREF_URL'));
		$base_href[] = JHTML::_('select.option', '3', JText::_('COM_MIJOSEF_CONFIG_URL_BASEHREF_HOME'));
		$base_href[] = JHTML::_('select.option', '4', JText::_('COM_MIJOSEF_CONFIG_URL_BASEHREF_DISABLE'));
		$lists['base_href'] = JHTML::_('select.genericlist', $base_href, 'base_href', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->base_href);
		
		// JoomFish
		$lists['multilang'] 	            = $utility->getRadioList('multilang', $this->MijosefConfig->multilang);
		$lists['joomfish_lang_code'] 		= $utility->getRadioList('joomfish_lang_code', $this->MijosefConfig->joomfish_lang_code);
		$lists['multilang_home_code'] 		= $utility->getRadioList('multilang_home_code', $this->MijosefConfig->multilang_home_code);
		$lists['joomfish_trans_url'] 		= $utility->getRadioList('joomfish_trans_url', $this->MijosefConfig->joomfish_trans_url);
		$lists['joomfish_cookie'] 			= $utility->getRadioList('joomfish_cookie', $this->MijosefConfig->joomfish_cookie);
		$lists['joomfish_browser'] 			= $utility->getRadioList('joomfish_browser', $this->MijosefConfig->joomfish_browser);

		$lang_list = array();
		$lang_list[] = JHTML::_('select.option', '0', JText::_('COM_MIJOSEF_CONFIG_URL_JF_MAINLANG_NONE'));
		$lang_list = array_merge($lang_list, Mijosef::get('utility')->getLanguages());
		$lists['joomfish_main_lang'] = JHTML::_('select.genericlist', $lang_list, 'joomfish_main_lang', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->joomfish_main_lang);
		
		// www redirect
		$www = array();
  		$www[] = JHTML::_('select.option', '0', JText::_('COM_MIJOSEF_CONFIG_URL_WWW_NOACTION'));
		$www[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_CONFIG_URL_WWW_WITH'));
		$www[] = JHTML::_('select.option', '2', JText::_('COM_MIJOSEF_CONFIG_URL_WWW_WHITHOUT'));
		$lists['redirect_to_www'] = JHTML::_('select.genericlist', $www, 'redirect_to_www', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->redirect_to_www);
		
		// Force SSL
		$force_ssl	= $this->linkoptions();
		$lists['force_ssl'] = JHTML::_('select.genericlist', $force_ssl, 'force_ssl[]', 'class="inputbox" size="10" multiple="multiple"', 'value', 'text', $this->MijosefConfig->force_ssl);
		
		
		/*
		//
		// Meta Tags
		//
		*/
		$lists['meta_core'] 			= $utility->getRadioList('meta_core', $this->MijosefConfig->meta_core);
		$lists['meta_title'] 			= $utility->getRadioList('meta_title', $this->MijosefConfig->meta_title);
		$lists['meta_title_tag'] 		= $utility->getRadioList('meta_title_tag', $this->MijosefConfig->meta_title_tag);
		$lists['meta_generator_rem'] 	= $utility->getRadioList('meta_generator_rem', $this->MijosefConfig->meta_generator_rem);
		
		// Meta Tags list
		$meta = array();
  		$meta[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_CONFIG_META_TDK_ALWAYS'));
		$meta[] = JHTML::_('select.option', '2', JText::_('COM_MIJOSEF_CONFIG_META_TDK_NEVER'));
		$meta[] = JHTML::_('select.option', '3', JText::_('COM_MIJOSEF_CONFIG_META_TDK_EMPTY'));
		
		// Meta Description
		$lists['meta_desc'] = JHTML::_('select.genericlist', $meta, 'meta_desc', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->meta_desc);
		
		// Meta Keywords
		$lists['meta_key'] = JHTML::_('select.genericlist', $meta, 'meta_key', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->meta_key);
		
		// Use sitename
		$sitename = array();
  		$sitename[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_CONFIG_META_T_USE_SITENAME_1'));
		$sitename[] = JHTML::_('select.option', '2', JText::_('COM_MIJOSEF_CONFIG_META_T_USE_SITENAME_2'));
		$sitename[] = JHTML::_('select.option', '3', JText::_('COM_MIJOSEF_CONFIG_META_T_USE_SITENAME_3'));
		$lists['meta_t_usesitename'] = JHTML::_('select.genericlist', $sitename, 'meta_t_usesitename', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->meta_t_usesitename);
		
		
		/*
		//
		// Sitemap
		//
		*/
		$lists['sm_ping'] 				= $utility->getRadioList('sm_ping', $this->MijosefConfig->sm_ping);
		$lists['sm_xml_date'] 			= $utility->getRadioList('sm_xml_date', $this->MijosefConfig->sm_xml_date);
		$lists['sm_xml_freq'] 			= $utility->getRadioList('sm_xml_freq', $this->MijosefConfig->sm_xml_freq);
		$lists['sm_xml_prior'] 			= $utility->getRadioList('sm_xml_prior', $this->MijosefConfig->sm_xml_prior);
		$lists['sm_dot_tree'] 			= $utility->getRadioList('sm_dot_tree', $this->MijosefConfig->sm_dot_tree);
		$lists['sm_freq'] 				= JHTML::_('select.genericlist', Mijosef::get('sitemap')->getFrequencyList(), 'sm_freq', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->sm_freq);
		$lists['sm_priority'] 			= JHTML::_('select.genericlist', Mijosef::get('sitemap')->getPriorityList(), 'sm_priority', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->sm_priority);
		$lists['sm_auto_mode'] 			= $utility->getRadioList('sm_auto_mode', $this->MijosefConfig->sm_auto_mode);
        $lists['sm_auto_components']	= JHTML::_('select.genericlist', Mijosef::get('utility')->getComponents(), 'sm_auto_components[]', 'class="inputbox" size="10" multiple="multiple"', 'value', 'text', $this->MijosefConfig->sm_auto_components);
		$lists['sm_auto_enable_cats'] 	= $utility->getRadioList('sm_auto_enable_cats', $this->MijosefConfig->sm_auto_enable_cats);
		$lists['sm_auto_cron_mode'] 	= $utility->getRadioList('sm_auto_cron_mode', $this->MijosefConfig->sm_auto_cron_mode);
		$lists['sm_auto_xml'] 			= $utility->getRadioList('sm_auto_xml', $this->MijosefConfig->sm_auto_xml);
		$lists['sm_auto_ping_c'] 		= $utility->getRadioList('sm_auto_ping_c', $this->MijosefConfig->sm_auto_ping_c);
		$lists['sm_auto_ping_s'] 		= $utility->getRadioList('sm_auto_ping_s', $this->MijosefConfig->sm_auto_ping_s);
		
		// Ping Type
		$ping_type = array();
  		$ping_type[] = JHTML::_('select.option', 'link', JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_URL'));
  		$ping_type[] = JHTML::_('select.option', 'file', JText::_('COM_MIJOSEF_CONFIG_SITEMAP_FILE'));
		$lists['sm_ping_type'] = JHTML::_('select.genericlist', $ping_type, 'sm_ping_type', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->sm_ping_type);
		
		// Cron Frequency
		$cron_freq = array();
  		$cron_freq[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_COMMON_SEF') .' '. JText::_('COM_MIJOSEF_COMMON_URL'));
		$cron_freq[] = JHTML::_('select.option', '4', '4 ' . JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ_HOURS'));
		$cron_freq[] = JHTML::_('select.option', '8', '8 ' . JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ_HOURS'));
		$cron_freq[] = JHTML::_('select.option', '12', '12 ' . JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ_HOURS'));
		$cron_freq[] = JHTML::_('select.option', '24', '1 ' . JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ_DAYS'));
		$cron_freq[] = JHTML::_('select.option', '48', '2 ' . JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ_DAYS'));
		$cron_freq[] = JHTML::_('select.option', '168', '1 ' . JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ_WEEKS'));
		$cron_freq[] = JHTML::_('select.option', '720', '1 ' . JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ_MONTHS'));
		$lists['sm_auto_cron_freq'] = JHTML::_('select.genericlist', $cron_freq, 'sm_auto_cron_freq', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->sm_auto_cron_freq);
		
		
		/*
		//
		// Tags
		//
		*/
		$lists['tags_mode'] 			= $utility->getRadioList('tags_mode', $this->MijosefConfig->tags_mode);
		$lists['tags_area'] 			= JHTML::_('select.genericlist', $areas, 'tags_area', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->tags_area);
		$lists['tags_components']		= JHTML::_('select.genericlist', Mijosef::get('utility')->getComponents(), 'tags_components[]', 'class="inputbox" size="10" multiple="multiple"', 'value', 'text', $this->MijosefConfig->tags_components);
		$lists['tags_enable_cats'] 		= $utility->getRadioList('tags_enable_cats', $this->MijosefConfig->tags_enable_cats);
		$lists['tags_in_cats'] 			= $utility->getRadioList('tags_in_cats', $this->MijosefConfig->tags_in_cats);
		$lists['tags_show_tag_desc'] 	= $utility->getRadioList('tags_show_tag_desc', $this->MijosefConfig->tags_show_tag_desc);
		$lists['tags_show_prefix'] 		= $utility->getRadioList('tags_show_prefix', $this->MijosefConfig->tags_show_prefix);
		$lists['tags_show_item_desc'] 	= $utility->getRadioList('tags_show_item_desc', $this->MijosefConfig->tags_show_item_desc);
		$lists['tags_exp_item_desc'] 	= $utility->getRadioList('tags_exp_item_desc', $this->MijosefConfig->tags_exp_item_desc);
		$lists['tags_published'] 		= $utility->getRadioList('tags_published', $this->MijosefConfig->tags_published);
		$lists['tags_auto_mode'] 		= $utility->getRadioList('tags_auto_mode', $this->MijosefConfig->tags_auto_mode);
        $lists['tags_auto_components']	= JHTML::_('select.genericlist', Mijosef::get('utility')->getComponents(), 'tags_auto_components[]', 'class="inputbox" size="10" multiple="multiple"', 'value', 'text', $this->MijosefConfig->tags_auto_components);
		
		// Order
		$order = array();
  		$order[] = JHTML::_('select.option', 'ordering', JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER_1'));
  		$order[] = JHTML::_('select.option', 'ordering DESC', JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER_2'));
  		$order[] = JHTML::_('select.option', 'title', JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER_3'));
  		$order[] = JHTML::_('select.option', 'title DESC', JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER_4'));
  		$order[] = JHTML::_('select.option', 'hits', JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER_5'));
  		$order[] = JHTML::_('select.option', 'hits DESC', JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER_6'));
		$lists['tags_order'] = JHTML::_('select.genericlist', $order, 'tags_order', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->tags_order);
		
		// Position
		$pos = array();
  		$pos[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_CONFIG_POSITION_1'));
		$pos[] = JHTML::_('select.option', '2', JText::_('COM_MIJOSEF_CONFIG_POSITION_2'));
		$lists['tags_position'] = JHTML::_('select.genericlist', $pos, 'tags_position', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->tags_position);
		
		/*
		//
		// Internal Links
		//
		*/
		$lists['ilinks_mode'] 			= $utility->getRadioList('ilinks_mode', $this->MijosefConfig->ilinks_mode);
        $lists['ilinks_area'] 			= JHTML::_('select.genericlist', $areas, 'ilinks_area', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->ilinks_area);
		$lists['ilinks_components'] 	= JHTML::_('select.genericlist', Mijosef::get('utility')->getComponents(), 'ilinks_components[]', 'class="inputbox" size="10" multiple="multiple"', 'value', 'text', $this->MijosefConfig->ilinks_components);
		$lists['ilinks_enable_cats'] 	= $utility->getRadioList('ilinks_enable_cats', $this->MijosefConfig->ilinks_enable_cats);
		$lists['ilinks_in_cats'] 		= $utility->getRadioList('ilinks_in_cats', $this->MijosefConfig->ilinks_in_cats);
		$lists['ilinks_case'] 			= $utility->getRadioList('ilinks_case', $this->MijosefConfig->ilinks_case);
		$lists['ilinks_published'] 		= $utility->getRadioList('ilinks_published', $this->MijosefConfig->ilinks_published);
		$lists['ilinks_nofollow'] 		= $utility->getRadioList('ilinks_nofollow', $this->MijosefConfig->ilinks_nofollow);
		$lists['ilinks_blank'] 			= $utility->getRadioList('ilinks_blank', $this->MijosefConfig->ilinks_blank);

		
		/*
		//
		// Social Bookmarks
		//
		*/
		$lists['bookmarks_mode'] 		= $utility->getRadioList('bookmarks_mode', $this->MijosefConfig->bookmarks_mode);
       	$lists['bookmarks_area'] 		= JHTML::_('select.genericlist', $areas, 'bookmarks_area', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->bookmarks_area);
		 $lists['bookmarks_components'] = JHTML::_('select.genericlist', Mijosef::get('utility')->getComponents(), 'bookmarks_components[]', 'class="inputbox" size="10" multiple="multiple"', 'value', 'text', $this->MijosefConfig->bookmarks_components);
		$lists['bookmarks_enable_cats'] = $utility->getRadioList('bookmarks_enable_cats', $this->MijosefConfig->bookmarks_enable_cats);
		$lists['bookmarks_in_cats'] 	= $utility->getRadioList('bookmarks_in_cats', $this->MijosefConfig->bookmarks_in_cats);
		$lists['bookmarks_published'] 	= $utility->getRadioList('bookmarks_published', $this->MijosefConfig->bookmarks_published);
		
		// Icons
		$icons = array();
  		$icons[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_CONFIG_POSITION_1'));
		$icons[] = JHTML::_('select.option', '2', JText::_('COM_MIJOSEF_CONFIG_POSITION_2'));
		$icons[] = JHTML::_('select.option', '3', JText::_('COM_MIJOSEF_CONFIG_POSITION_3'));
		$lists['bookmarks_icons_pos'] = JHTML::_('select.genericlist', $icons, 'bookmarks_icons_pos', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->bookmarks_icons_pos);
		
		// Type Filter
		$type_list[] = JHTML::_('select.option', 'icon', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_1'));
		$type_list[] = JHTML::_('select.option', 'iconset', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_2'));
		$type_list[] = JHTML::_('select.option', 'badge', JText::_('COM_MIJOSEF_BOOKMARKS_TYPE_3'));
		$lists['bookmarks_type'] = JHTML::_('select.genericlist', $type_list, 'bookmarks_type', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->bookmarks_type);
		
		
		/*
		//
		// User Interface
		//
		*/
		$lists['ui_sef_language'] 		= $utility->getRadioList('ui_sef_language', $this->MijosefConfig->ui_sef_language);
		$lists['ui_sef_published'] 		= $utility->getRadioList('ui_sef_published', $this->MijosefConfig->ui_sef_published);
		$lists['ui_sef_used'] 			= $utility->getRadioList('ui_sef_used', $this->MijosefConfig->ui_sef_used);
		$lists['ui_sef_locked'] 		= $utility->getRadioList('ui_sef_locked', $this->MijosefConfig->ui_sef_locked);
		$lists['ui_sef_blocked'] 		= $utility->getRadioList('ui_sef_blocked', $this->MijosefConfig->ui_sef_blocked);
		$lists['ui_sef_cached'] 		= $utility->getRadioList('ui_sef_cached', $this->MijosefConfig->ui_sef_cached);
		$lists['ui_sef_date'] 			= $utility->getRadioList('ui_sef_date', $this->MijosefConfig->ui_sef_date);
		$lists['ui_sef_hits'] 			= $utility->getRadioList('ui_sef_hits', $this->MijosefConfig->ui_sef_hits);
		$lists['ui_sef_id'] 			= $utility->getRadioList('ui_sef_id', $this->MijosefConfig->ui_sef_id);
		$lists['ui_moved_published'] 	= $utility->getRadioList('ui_moved_published', $this->MijosefConfig->ui_moved_published);
		$lists['ui_moved_hits'] 		= $utility->getRadioList('ui_moved_hits', $this->MijosefConfig->ui_moved_hits);
		$lists['ui_moved_clicked'] 		= $utility->getRadioList('ui_moved_clicked', $this->MijosefConfig->ui_moved_clicked);
		$lists['ui_moved_cached'] 		= $utility->getRadioList('ui_moved_cached', $this->MijosefConfig->ui_moved_cached);
		$lists['ui_moved_id'] 			= $utility->getRadioList('ui_moved_id', $this->MijosefConfig->ui_moved_id);
		$lists['ui_metadata_keys'] 		= $utility->getRadioList('ui_metadata_keys', $this->MijosefConfig->ui_metadata_keys);
		$lists['ui_metadata_published'] = $utility->getRadioList('ui_metadata_published', $this->MijosefConfig->ui_metadata_published);
		$lists['ui_metadata_cached'] 	= $utility->getRadioList('ui_metadata_cached', $this->MijosefConfig->ui_metadata_cached);
		$lists['ui_metadata_id'] 		= $utility->getRadioList('ui_metadata_id', $this->MijosefConfig->ui_metadata_id);
		$lists['ui_sitemap_title'] 		= $utility->getRadioList('ui_sitemap_title', $this->MijosefConfig->ui_sitemap_title);
		$lists['ui_sitemap_published'] 	= $utility->getRadioList('ui_sitemap_published', $this->MijosefConfig->ui_sitemap_published);
		$lists['ui_sitemap_id'] 		= $utility->getRadioList('ui_sitemap_id', $this->MijosefConfig->ui_sitemap_id);
		$lists['ui_sitemap_parent'] 	= $utility->getRadioList('ui_sitemap_parent', $this->MijosefConfig->ui_sitemap_parent);
		$lists['ui_sitemap_order'] 		= $utility->getRadioList('ui_sitemap_order', $this->MijosefConfig->ui_sitemap_order);
		$lists['ui_sitemap_date'] 		= $utility->getRadioList('ui_sitemap_date', $this->MijosefConfig->ui_sitemap_date);
		$lists['ui_sitemap_frequency'] 	= $utility->getRadioList('ui_sitemap_frequency', $this->MijosefConfig->ui_sitemap_frequency);
		$lists['ui_sitemap_priority'] 	= $utility->getRadioList('ui_sitemap_priority', $this->MijosefConfig->ui_sitemap_priority);
		$lists['ui_sitemap_cached'] 	= $utility->getRadioList('ui_sitemap_cached', $this->MijosefConfig->ui_sitemap_cached);
		$lists['ui_tags_published'] 	= $utility->getRadioList('ui_tags_published', $this->MijosefConfig->ui_tags_published);
		$lists['ui_tags_ordering'] 		= $utility->getRadioList('ui_tags_ordering', $this->MijosefConfig->ui_tags_ordering);
		$lists['ui_tags_cached'] 		= $utility->getRadioList('ui_tags_cached', $this->MijosefConfig->ui_tags_cached);
		$lists['ui_tags_hits'] 			= $utility->getRadioList('ui_tags_hits', $this->MijosefConfig->ui_tags_hits);
		$lists['ui_tags_id'] 			= $utility->getRadioList('ui_tags_id', $this->MijosefConfig->ui_tags_id);
		$lists['ui_ilinks_published'] 	= $utility->getRadioList('ui_ilinks_published', $this->MijosefConfig->ui_ilinks_published);
		$lists['ui_ilinks_nofollow'] 	= $utility->getRadioList('ui_ilinks_nofollow', $this->MijosefConfig->ui_ilinks_nofollow);
		$lists['ui_ilinks_blank'] 		= $utility->getRadioList('ui_ilinks_blank', $this->MijosefConfig->ui_ilinks_blank);
		$lists['ui_ilinks_limit'] 		= $utility->getRadioList('ui_ilinks_limit', $this->MijosefConfig->ui_ilinks_limit);
		$lists['ui_ilinks_cached'] 		= $utility->getRadioList('ui_ilinks_cached', $this->MijosefConfig->ui_ilinks_cached);
		$lists['ui_ilinks_id'] 			= $utility->getRadioList('ui_ilinks_id', $this->MijosefConfig->ui_ilinks_id);
		$lists['ui_bookmarks_published'] = $utility->getRadioList('ui_bookmarks_published', $this->MijosefConfig->ui_bookmarks_published);
		$lists['ui_bookmarks_id'] 		= $utility->getRadioList('ui_bookmarks_id', $this->MijosefConfig->ui_bookmarks_id);
		
		// Control Panel Layout
		$ui_cpanel = array();
  		$ui_cpanel[] = JHTML::_('select.option', '1', JText::_('COM_MIJOSEF_CONFIG_UI_CP_1'));
		$ui_cpanel[] = JHTML::_('select.option', '2', JText::_('COM_MIJOSEF_CONFIG_UI_CP_2'));
		$lists['ui_cpanel'] = JHTML::_('select.genericlist', $ui_cpanel, 'ui_cpanel', 'class="inputbox" size="1"' ,'value', 'text', $this->MijosefConfig->ui_cpanel);
		
		return $lists;
	}

    /**
     * Fixed version of JHtmlMenu::linkoptions() for Joomla 3.0
     * until the bug with missing m.ordering column is fixed
     */
    protected function linkoptions($all = false, $unassigned = false)
    {
        if (!class_exists('JHtmlMenu')) {
            require_once(JPATH_LIBRARIES.'/joomla/html/html/menu.php');
        }

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        // Get a list of the menu items
        $query->select('m.id, m.parent_id, m.title, m.menutype');
        $query->from($db->quoteName('#__menu') . ' AS m');
        $query->where($db->quoteName('m.published') . ' = 1');
        $query->order('m.menutype, m.parent_id, m.lft');
        $db->setQuery($query);

        $mitems = $db->loadObjectList();

        if (!$mitems)
        {
            $mitems = array();
        }

        // Establish the hierarchy of the menu
        $children = array();

        // First pass - collect children
        foreach ($mitems as $v)
        {
            $pt = $v->parent_id;
            $list = @$children[$pt] ? $children[$pt] : array();
            array_push($list, $v);
            $children[$pt] = $list;
        }
        // Second pass - get an indent list of the items
        $list = JHtmlMenu::TreeRecurse((int) $mitems[0]->parent_id, '', array(), $children, 9999, 0, 0);

        // Code that adds menu name to Display of Page(s)

        $mitems = array();
        if ($all | $unassigned)
        {
            $mitems[] = JHtml::_('select.option', '<OPTGROUP>', JText::_('JOPTION_MENUS'));

            if ($all)
            {
                $mitems[] = JHtml::_('select.option', 0, JText::_('JALL'));
            }
            if ($unassigned)
            {
                $mitems[] = JHtml::_('select.option', -1, JText::_('JOPTION_UNASSIGNED'));
            }

            $mitems[] = JHtml::_('select.option', '</OPTGROUP>');
        }

        $lastMenuType = null;
        $tmpMenuType = null;
        foreach ($list as $list_a)
        {
            if ($list_a->menutype != $lastMenuType)
            {
                if ($tmpMenuType)
                {
                    $mitems[] = JHtml::_('select.option', '</OPTGROUP>');
                }
                $mitems[] = JHtml::_('select.option', '<OPTGROUP>', $list_a->menutype);
                $lastMenuType = $list_a->menutype;
                $tmpMenuType = $list_a->menutype;
            }

            $mitems[] = JHtml::_('select.option', $list_a->id, $list_a->title);
        }
        if ($lastMenuType !== null)
        {
            $mitems[] = JHtml::_('select.option', '</OPTGROUP>');
        }

        return $mitems;
    }
}
?>