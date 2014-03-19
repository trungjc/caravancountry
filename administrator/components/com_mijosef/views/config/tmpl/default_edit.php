<?php
/**
* @package		MijoSEF
* @copyright	Copyright (C) 2009-2013 mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted access');
?>

<script language="Javascript">
    function submitbutton(pressbutton) {
    <?php echo $this->editor->save('introtext'); ?>
        submitform(pressbutton);
    }
</script>

<form action="index.php" method="post" name="adminForm" id="adminForm">
    <fieldset class="panelform">
        <?php echo JHtml::_('tabs.start', 'mijosef-config'); ?>

        <?php echo JHtml::_('tabs.panel', JText::_('COM_MIJOSEF_COMMON_MAIN'), 'maintab'); ?>
        <table class="noshow">
            <tr>
                <td width="50%">
                    <fieldset class="panelform form-horizontal">
                        <legend><?php echo JText::_('MijoSEF'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_ENABLE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['mode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_VERSION_CHECKER'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_VERSION_CHECKER_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_VERSION_CHECKER'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['version_checker']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_UPGRADE'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_UPGRADE_ID'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_UPGRADE_ID_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_UPGRADE_ID'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="password" name="pid" id="pid" class="inputbox" size="60" value="<?php echo $this->MijosefConfig->pid; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_CACHE_INSTANT'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_INSTANT'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_INSTANT_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_INSTANT'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_instant']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset><fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_CACHE_PERMANENT'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_VERSION'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_VERSION_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_VERSION'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_versions']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_PARAMS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_PARAMS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_PARAMS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_extensions']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_COMMON_URLS_SEF'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_SEF_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_COMMON_URLS_SEF'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_urls']; ?>
                                        &nbsp;&nbsp;
                                        ===> &nbsp;
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_SEF_SIZE'); ?>:
                                        &nbsp;
                                        <input type="text" name="cache_urls_size" id="cache_urls_size" class="inputbox" size="10" style="width: 50px;" value="<?php echo $this->MijosefConfig->cache_urls_size; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_COMMON_URLS_MOVED'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_MOVED_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_COMMON_URLS_MOVED'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_urls_moved']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_COMMON_METADATA'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_METADATA_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_COMMON_METADATA'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_metadata']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_COMMON_SITEMAP'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_SITEMAP_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_COMMON_SITEMAP'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_sitemap']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_COMMON_TAGS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_TAGS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_COMMON_TAGS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_tags']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_COMMON_ILINKS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_CACHE_ILINKS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_COMMON_ILINKS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['cache_ilinks']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
                <td width="%50">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_SEO'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_NOFOLLOW'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_NOFOLLOW_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_NOFOLLOW'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['seo_nofollow']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_404'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_404'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_404'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_404'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['page404']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td style="min-width: 0px !important;">
                                        <?php echo $this->editor->display('introtext', $this->lists['custom404'], '500', '320', '50', '11'); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.panel', JText::_('COM_MIJOSEF_COMMON_URLS'), 'urlstab'); ?>
        <table class="noshow">
            <tr>
                <td width="50%">
                    <fieldset class="panelform form-horizontal">
                    <legend><?php echo JText::_('COM_MIJOSEF_COMMON_MAIN'); ?></legend>
                    <table class="admintable">
                        <tbody>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_GENERATE_SEF'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_GENERATE_SEF_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_GENERATE_SEF'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $this->lists['generate_sef']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_LOWERCASE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_LOWERCASE_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_LOWERCASE'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $this->lists['url_lowercase']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SMART_ITEMID'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SMART_ITEMID_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SMART_ITEMID'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $this->lists['global_smart_itemid']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_IGNORE_MULTI_ITEMID'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_IGNORE_MULTI_ITEMID_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_IGNORE_MULTI_ITEMID'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $this->lists['ignore_multi_itemid']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DUPLICATE_URL'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DUPLICATE_URL_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DUPLICATE_URL'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $this->lists['numeral_duplicated']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_RECORD_DUPLICATED'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_RECORD_DUPLICATED_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_RECORD_DUPLICATED'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $this->lists['record_duplicated']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SUFFIX'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SUFFIX_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SUFFIX'); ?>
                                    </span>
                                </td>
                                <td class="value2">
                                    <input type="text" name="url_suffix" id="url_suffix" class="inputbox" size="10" style="width: 50px;" value="<?php echo $this->MijosefConfig->url_suffix; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_REPLACEMENT_CHAR'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_REPLACEMENT_CHAR_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_REPLACEMENT_CHAR'); ?>
                                    </span>
                                </td>
                                <td class="value2">
                                    <input type="text" name="replacement_character" id="replacement_character" class="inputbox" size="10" style="width: 50px;" value="<?php echo $this->MijosefConfig->replacement_character; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_PARENT_MENUS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_PARENT_MENUS_HELP'); ?>">
                                        <?php echo JText::_( 'COM_MIJOSEF_CONFIG_URL_PARENT_MENUS' ); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $this->lists['parent_menus']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_PART_MENU'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_PART_MENU_HELP'); ?>">
                                        <?php echo JText::_( 'COM_MIJOSEF_CONFIG_URL_PART_MENU' ); ?>
                                    </span>
                                </td>
                                <td class="value2">
                                    <?php echo $this->lists['menu_url_part']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="key2">
                                    <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TITLE_ALIAS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TITLE_ALIAS_HELP'); ?>">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TITLE_ALIAS'); ?>
                                    </span>
                                </td>
                                <td class="value2">
                                    <?php echo $this->lists['title_alias']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_301_REDIRECTIONS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_WWW'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_WWW_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_WWW'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['redirect_to_www']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_REDIRECT'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_REDIRECT_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_REDIRECT'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['redirect_to_sef']; ?>
                                        &nbsp;&nbsp;
                                        ===> &nbsp;
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_REDIRECT_GEN'); ?>:
                                        <?php echo $this->lists['redirect_to_sef_gen']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JSEF_TO_MIJOSEF'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JSEF_TO_COM_MIJOSEF_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JSEF_TO_MIJOSEF'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['jsef_to_mijosef']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_ADVANCED'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_APPEND_ITEMID'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_APPEND_ITEMID_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_APPEND_ITEMID'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['append_itemid']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_APPEND_LIMIT'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_APPEND_LIMIT_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_APPEND_LIMIT'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['url_append_limit']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TRAILING_SLASH'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TRAILING_SLASH_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TRAILING_SLASH'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['remove_trailing_slash']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TOLERANT_WITH_ENDLASH'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TOLERANT_WITH_ENDLASH_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_TOLERANT_WITH_ENDLASH'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tolerant_to_trailing_slash']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_STRIP_CHARS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_STRIP_CHARS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_STRIP_CHARS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="url_strip_chars" id="url_strip_chars" class="inputbox" size="40" value="<?php echo $this->MijosefConfig->url_strip_chars; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SOURCE_TRACKER'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SOURCE_TRACKER_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SOURCE_TRACKER'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['source_tracker']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_ACTIVE_ITEMID'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_ACTIVE_ITEMID_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_ACTIVE_ITEMID'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['insert_active_itemid']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_REMOVE_SID'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_REMOVE_SID_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_REMOVE_SID'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['remove_sid']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_QUERY_STRING'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_QUERY_STRING_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_QUERY_STRING'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['set_query_string']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_BASEHREF'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_BASEHREF_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_BASEHREF'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['base_href']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_APPEND'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_APPEND_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_APPEND'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['append_non_sef']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_PREVENT_DUP_ERROR'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_PREVENT_DUP_ERROR_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_PREVENT_DUP_ERROR'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['prevent_dup_error']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SHOW_DB_ERRORS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SHOW_DB_ERRORS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SHOW_DB_ERRORS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['show_db_errors']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_CHECK_URL_ID'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_CHECK_URL_ID_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_CHECK_URL_ID'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['check_url_by_id']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_404_DB'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_404_DB_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_404_DB'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['db_404_errors']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_404_LOG'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_404_LOG_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_404_LOG'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['log_404_errors']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_HEADERS_ERROR'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_HEADERS_ERROR_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_HEADERS_ERROR'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sent_headers_error']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
                <td width="%50">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_LANGUAGE_J17'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_MULTILANGUAGE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_MULTILANGUAGE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_MULTILANGUAGE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['multilang']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_MAINLANG'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_MAINLANG_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_MAINLANG'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['joomfish_main_lang']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_CODE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_CODE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_CODE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['joomfish_lang_code']; ?>
                                    </td>
                                </tr>
                            <tr>
                                <td class="key2">
									<span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_MULTILANG_HOME_CODE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_MULTILANG_HOME_CODE_HELP'); ?>">
										<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_MULTILANG_HOME_CODE'); ?>
									</span>
                                </td>
                                <td>
                                    <?php echo $this->lists['multilang_home_code']; ?>
                                </td>
                            </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_TRANSLATE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_TRANSLATE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_TRANSLATE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['joomfish_trans_url']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_DETERMINE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_DETERMINE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_DETERMINE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['joomfish_browser']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_COOKIE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_COOKIE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_JF_COOKIE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['joomfish_cookie']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_LANGUAGE'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_UTF8_URL'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_UTF8_URL_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_UTF8_URL'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['utf8_url']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_CHAR_REPLACE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_CHAR_REPLACE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_CHAR_REPLACE'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="char_replacements" cols="40" rows="8" style="width: 90%;"><?php echo $this->MijosefConfig->char_replacements; ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_GLOBAL_VARS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_VARS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_VARS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_NONSEF_VARS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="non_sef_vars" id="non_sef_vars" cols="40" rows="3" style="width: 90%;"><?php echo $this->MijosefConfig->non_sef_vars; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DISABLESEF_VARS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DISABLESEF_VARS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DISABLESEF_VARS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="disable_sef_vars" id="disable_sef_vars" cols="40" rows="3" style="width: 90%;"><?php echo $this->MijosefConfig->disable_sef_vars; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SKIPMENU_VARS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SKIPMENU_VARS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_SKIPMENU_VARS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="skip_menu_vars" id="skip_menu_vars" cols="40" rows="3" style="width: 90%;"><?php echo $this->MijosefConfig->skip_menu_vars; ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_URL_FORCE_SSL'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_FORCE_SSL'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_FORCE_SSL_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_FORCE_SSL'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['force_ssl']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_URL_MANAGEMENT'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_PURGE_EXT_URLS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_PURGE_EXT_URLS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_MAIN_PURGE_EXT_URLS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['purge_ext_urls']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DELETE_OTHER_SEF'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DELETE_OTHER_SEF_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_URL_DELETE_OTHER_SEF'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['delete_other_sef']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.panel', JText::_('COM_MIJOSEF_COMMON_METADATA'), 'metadatatab'); ?>
        <table class="noshow">
            <tr>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_MAIN'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_CORE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_CORE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_CORE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['meta_core']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_TITLE_TAG'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_TITLE_TAG_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_TITLE_TAG'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['meta_title_tag']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_META_EXTRA'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_GENERATOR'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_GENERATOR_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_GENERATOR'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_generator" id="meta_generator" class="inputbox" size="40" value="<?php echo $this->MijosefConfig->meta_generator; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_GENERATOR_REM'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_GENERATOR_REM_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_GENERATOR_REM'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['meta_generator_rem']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_ABSTRACT'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_ABSTRACT_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_ABSTRACT'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_abstract" id="meta_abstract" class="inputbox" size="40" value="<?php echo $this->MijosefConfig->meta_abstract; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_REVISIT'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_REVISIT_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_REVISIT'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_revisit" id="meta_revisit" class="inputbox" size="40" value="<?php echo $this->MijosefConfig->meta_revisit; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_DIRECTION'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_DIRECTION_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_DIRECTION'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_direction" id="meta_direction" class="inputbox" size="40" value="<?php echo $this->MijosefConfig->meta_direction; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_GOOGLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_GOOGLE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_GOOGLE'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_googlekey" id="meta_googlekey" class="inputbox" size="65" value="<?php echo $this->MijosefConfig->meta_googlekey; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_LIVE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_LIVE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_LIVE'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_livekey" id="meta_livekey" class="inputbox" size="65" value="<?php echo $this->MijosefConfig->meta_livekey; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_YAHOO'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_YAHOO_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_V_YAHOO'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_yahookey" id="meta_yahookey" class="inputbox" size="65" value="<?php echo $this->MijosefConfig->meta_yahookey; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_ALEXA'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_ALEXA_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_ALEXA'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_alexa" id="meta_alexa" class="inputbox" size="65" value="<?php echo $this->MijosefConfig->meta_alexa; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_1'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_1'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_1'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME'); ?>
                                        &nbsp;
                                        <input type="text" name="meta_name_1" id="meta_name_1" class="inputbox" size="18" style="width: 70px;" value="<?php echo $this->MijosefConfig->meta_name_1; ?>">
                                        &nbsp;&nbsp;&nbsp;
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_META_CONTENT'); ?>
                                        &nbsp;
                                        <input type="text" name="meta_con_1" id="meta_con_1" class="inputbox" size="18" style="width: 70px;" value="<?php echo $this->MijosefConfig->meta_con_1; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_2'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_2'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_2'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME'); ?>
                                        &nbsp;
                                        <input type="text" name="meta_name_2" id="meta_name_2" class="inputbox" size="18" style="width: 70px;" value="<?php echo $this->MijosefConfig->meta_name_2; ?>">
                                        &nbsp;&nbsp;&nbsp;
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_META_CONTENT'); ?>
                                        &nbsp;
                                        <input type="text" name="meta_con_2" id="meta_con_2" class="inputbox" size="18" style="width: 70px;" value="<?php echo $this->MijosefConfig->meta_con_2; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_3'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_3'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME_3'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_META_NAME'); ?>
                                        &nbsp;
                                        <input type="text" name="meta_name_3" id="meta_name_3" class="inputbox" size="18" style="width: 70px;" value="<?php echo $this->MijosefConfig->meta_name_3; ?>">
                                        &nbsp;&nbsp;&nbsp;
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_META_CONTENT'); ?>
                                        &nbsp;
                                        <input type="text" name="meta_con_3" id="meta_con_3" class="inputbox" size="18" style="width: 70px;" value="<?php echo $this->MijosefConfig->meta_con_3; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_META_AUTO') . ': ' . JText::_('COM_MIJOSEF_CONFIG_LEGEND_OPTIONS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTOTITLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTOTITLE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTOTITLE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['meta_title']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTODESC'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTODESC_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTODESC'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['meta_desc']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTOKEY'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTOKEY_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_AUTOKEY'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['meta_key']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_META_AUTO') . ': ' . JText::_('COM_MIJOSEF_CONFIG_LEGEND_META_TITLE'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SEPERATOR'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SEPERATOR_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SEPERATOR'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_t_seperator" id="meta_t_seperator" class="inputbox" size="5" style="width: 30px;" value="<?php echo $this->MijosefConfig->meta_t_seperator; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SITENAME'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SITENAME_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SITENAME'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_t_sitename" id="meta_t_sitename" class="inputbox" size="20" value="<?php echo $this->MijosefConfig->meta_t_sitename; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_USE_SITENAME'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_USE_SITENAME_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_USE_SITENAME'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['meta_t_usesitename']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_PREFIX'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_PREFIX_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_PREFIX'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_t_prefix" id="meta_t_prefix" class="inputbox" size="20" value="<?php echo $this->MijosefConfig->meta_t_prefix; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SUFFIX'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SUFFIX_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_T_SUFFIX'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="meta_t_suffix" id="meta_t_suffix" class="inputbox" size="20" value="<?php echo $this->MijosefConfig->meta_t_suffix; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_META_AUTO') . ': ' . JText::_('COM_MIJOSEF_CONFIG_LEGEND_META_KEYWORDS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_BLACKLIST'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_BLACKLIST_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_BLACKLIST'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="meta_key_blacklist" cols="40" rows="6" style="width: 90%;"><?php echo $this->MijosefConfig->meta_key_blacklist; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_META_WHITELIST'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_META_WHITELIST_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_META_WHITELIST'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="meta_key_whitelist" cols="40" rows="4" style="width: 90%;"><?php echo $this->MijosefConfig->meta_key_whitelist; ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.panel', JText::_('COM_MIJOSEF_COMMON_SITEMAP'), 'sitemaptab'); ?>
        <table class="noshow">
            <tr>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('XML'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_URL'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_URL_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_URL'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php $link = 'index.php?option=com_mijosef&view=sitemap&format=xml'; ?>
                                        <a href="../<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_FILE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_FILE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_FILE'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="sm_file" id="sm_file" class="inputbox" size="30" style="width: 100px;" value="<?php echo $this->MijosefConfig->sm_file; ?>" /> .xml
                                        <?php
                                            if(file_exists(JPATH_SITE.'/'.$this->MijosefConfig->sm_file.'.xml')){
                                                echo '&nbsp;&nbsp;&nbsp;&nbsp;<b><font color="green">'.JText::_('COM_MIJOSEF_SITEMAP_FILE_EXIST').'</font></b>';
                                            } else {
                                                echo '&nbsp;&nbsp;&nbsp;<b><font color="red">'.JText::_('COM_MIJOSEF_SITEMAP_FILE_EXIST_NO').'</font></b>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_DATE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_DATE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_DATE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_xml_date']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_FREQ'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_FREQ_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_FREQ'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_xml_freq']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_PRIOR'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_PRIOR_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_XML_PRIOR'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_xml_prior']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('HTML'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_USE_DOT_TREE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_USE_DOT_TREE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_USE_DOT_TREE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_dot_tree']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_SITEMAP_PING'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_PING_TYPE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_PING_TYPE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_PING_TYPE'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['sm_ping_type']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_PING'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_PING_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_PING'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_ping']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_YAHOO_APPID'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_YAHOO_APPID_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_YAHOO_APPID'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="sm_yahoo_appid" id="sm_yahoo_appid" class="inputbox" size="50" value="<?php echo $this->MijosefConfig->sm_yahoo_appid; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_SERVICES'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_SERVICES_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_SERVICES'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="sm_ping_services" cols="40" rows="5" style="width: 90%;"><?php echo $this->MijosefConfig->sm_ping_services; ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_DEFAULT'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_DEFAULT_FREQUENCY'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_DEFAULT_FREQUENCY_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_DEFAULT_FREQUENCY'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['sm_freq']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_DEFAULT_PRIORITY'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_DEFAULT_PRIORITY_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_DEFAULT_PRIORITY'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['sm_priority']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_SITEMAP_AUTO') . ': ' . JText::_('COM_MIJOSEF_CONFIG_LEGEND_OPTIONS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_ENABLE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_auto_mode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['sm_auto_components']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_auto_enable_cats']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_FILTER_SEF'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_FILTER_SEF_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_FILTER_SEF'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="sm_auto_filter_s" cols="40" rows="3" style="width: 90%;"><?php echo $this->MijosefConfig->sm_auto_filter_s; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_FILTER_REAL'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_FILTER_REAL_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_FILTER_REAL'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="sm_auto_filter_r" cols="40" rows="3" style="width: 90%;"><?php echo $this->MijosefConfig->sm_auto_filter_r; ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_SITEMAP_AUTO') . ': ' . JText::_('COM_MIJOSEF_CONFIG_LEGEND_SITEMAP_AUTO_CRON'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_SITEMAP_AUTO_CRON'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_auto_cron_mode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRON_FREQ'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['sm_auto_cron_freq']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_XML'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_XML_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_XML'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_auto_xml']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRAWLERS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRAWLERS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_CRAWLERS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_auto_ping_c']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_SERVICES'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_SERVICES_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SITEMAP_AUTO_SERVICES'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['sm_auto_ping_s']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.panel', JText::_('COM_MIJOSEF_COMMON_TAGS'), 'tagstab'); ?>
        <table class="noshow">
            <tr>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_MAIN'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_ENABLE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_mode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_AREA'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_AREA_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_AREA'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['tags_area']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['tags_components']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_enable_cats']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_in_cats']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_IN_PAGE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_IN_PAGE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_IN_PAGE'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="tags_in_page" id="tags_in_page" class="inputbox" size="20" style="width: 50px;" value="<?php echo $this->MijosefConfig->tags_in_page; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_ORDER'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['tags_order']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_POSITION'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_POSITION_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_POSITION'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['tags_position']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_TAGS_ITEMS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_LIMIT'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_LIMIT_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_LIMIT'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="tags_limit" id="tags_limit" class="inputbox" size="20" style="width: 50px;" value="<?php echo $this->MijosefConfig->tags_limit; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_TAG_DESC'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_TAG_DESC_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_TAG_DESC'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_show_tag_desc']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_PREFIX'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_PREFIX_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_PREFIX'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_show_prefix']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_ITEM_DESC'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_ITEM_DESC_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_SHOW_ITEM_DESC'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_show_item_desc']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_EXPAND_ITEM_DESC'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_EXPAND_ITEM_DESC_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_EXPAND_ITEM_DESC'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_exp_item_desc']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_DEFAULT'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_PUBLISHED'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_PUBLISHED_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_PUBLISHED'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_published']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_TAGS_AUTO'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_ENABLE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['tags_auto_mode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['tags_auto_components']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_LENGTH'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_LENGTH_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_LENGTH'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="tags_auto_length" id="tags_auto_length" class="inputbox" size="5" style="width: 50px;" value="<?php echo $this->MijosefConfig->tags_auto_length; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_FILTER_SEF'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_FILTER_SEF_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_FILTER_SEF'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="tags_auto_filter_s" cols="40" rows="3" style="width: 90%;"><?php echo $this->MijosefConfig->tags_auto_filter_s; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_FILTER_REAL'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_FILTER_REAL_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_FILTER_REAL'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="tags_auto_filter_r" cols="40" rows="3" style="width: 90%;"><?php echo $this->MijosefConfig->tags_auto_filter_r; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_BLACKLIST'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_BLACKLIST_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_TAGS_AUTO_BLACKLIST'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <textarea name="tags_auto_blacklist" cols="40" rows="5" style="width: 90%;"><?php echo $this->MijosefConfig->tags_auto_blacklist; ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.panel', JText::_('COM_MIJOSEF_COMMON_ILINKS'), 'ilinkstab'); ?>
        <table class="noshow">
            <tr>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_MAIN'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_ENABLE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ilinks_mode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_AREA'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_AREA_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_AREA'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['ilinks_area']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['ilinks_components']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ilinks_enable_cats']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ilinks_in_cats']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_CASE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_CASE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_CASE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ilinks_case']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_DEFAULT'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_PUBLISHED'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_PUBLISHED_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_PUBLISHED'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ilinks_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_NOFOLLOW'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_NOFOLLOW_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_NOFOLLOW'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ilinks_nofollow']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_TARGET'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_TARGET_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_TARGET'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ilinks_blank']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_LIMIT'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_LIMIT_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ILINKS_LIMIT'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="ilinks_limit" id="ilinks_limit" class="inputbox" size="3" style="width: 50px;" value="<?php echo $this->MijosefConfig->ilinks_limit; ?>" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.panel', JText::_('COM_MIJOSEF_COMMON_BOOKMARKS'), 'bookmarkstab'); ?>
        <table class="noshow">
            <tr>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_MAIN'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ENABLE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['bookmarks_mode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_AREA'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_AREA_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_AREA'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['bookmarks_area']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_COMPONENTS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['bookmarks_components']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_ENABLE_CATS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['bookmarks_enable_cats']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_SHOW_IN_CATS'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['bookmarks_in_cats']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_DEFAULT'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_PUBLISHED'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_PUBLISHED_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_PUBLISHED'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['bookmarks_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TYPE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TYPE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TYPE'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['bookmarks_type']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_BOOKMARKS_BADGES'); ?></legend>
                        <table class="admintable">
                            <tbody>

                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TWITTER'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TWITTER_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TWITTER'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="bookmarks_twitter" id="bookmarks_twitter" class="inputbox" size="20" value="<?php echo $this->MijosefConfig->bookmarks_twitter; ?>" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_BOOKMARKS_ICONSETS'); ?></legend>
                        <table class="admintable">
                            <tbody>

                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ADDTHIS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ADDTHIS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ADDTHIS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="bookmarks_addthis" id="bookmarks_addthis" class="inputbox" size="20" value="<?php echo $this->MijosefConfig->bookmarks_addthis; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TAF'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TAF_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_TAF'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="bookmarks_taf" id="bookmarks_taf" class="inputbox" size="20" value="<?php echo $this->MijosefConfig->bookmarks_taf; ?>" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_CONFIG_LEGEND_BOOKMARKS_ICONS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_POS'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_POS_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_POS'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['bookmarks_icons_pos']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_TXT'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_TXT_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_TXT'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="bookmarks_icons_txt" id="bookmarks_icons_txt" class="inputbox" size="20" value="<?php echo $this->MijosefConfig->bookmarks_icons_txt; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_LINE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_LINE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_BOOKMARKS_ICONS_LINE'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <input type="text" name="bookmarks_icons_line" id="bookmarks_icons_line" class="inputbox" size="3" style="width: 50px;" value="<?php echo $this->MijosefConfig->bookmarks_icons_line; ?>" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.panel', JText::_('COM_MIJOSEF_CONFIG_INTERFACE'), 'interfacetab'); ?>
        <table class="noshow">
            <tr>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_MAIN'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_UI_CP'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_UI_CP_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_UI_CP'); ?>
                                        </span>
                                    </td>
                                    <td class="value2">
                                        <?php echo $this->lists['ui_cpanel']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_SEF'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_CONFIG_UI_SEF_LANGUAGE'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_language']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Published') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_URL_SEF_COMMON_USED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_used']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_URL_SEF_COMMON_LOCKED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_locked']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_URL_SEF_COMMON_BLOCKED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_blocked']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_COMMON_CACHED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_cached']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <span class="hasTip" title="<?php echo JText::_('COM_MIJOSEF_CONFIG_UI_SEF_DATE'); ?>::<?php echo JText::_('COM_MIJOSEF_CONFIG_UI_SEF_DATE_HELP'); ?>">
                                            <?php echo JText::_('COM_MIJOSEF_CONFIG_UI_SEF_DATE'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_date']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Hits') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_hits']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('ID') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sef_id']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_MOVED'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Published') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_moved_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Hits') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_moved_hits']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_URL_MOVED_LAST_HIT') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_moved_clicked']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_COMMON_CACHED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_moved_cached']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('ID') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_moved_id']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_METADATA'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_COMMON_KEYWORDS') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_metadata_keys']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Published') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_metadata_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_COMMON_CACHED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_metadata_cached']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('ID') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_metadata_id']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
                <td width="50%">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_SITEMAP'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_COMMON_TITLE') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_title']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Published') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('ID') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_id']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_SITEMAP_PARENT') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_parent']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Order') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_order']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_SITEMAP_DATE') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_date']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_SITEMAP_FREQUENCY') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_frequency']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_SITEMAP_PRIORITY') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_priority']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_COMMON_CACHED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_sitemap_cached']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_TAGS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Published') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_tags_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Order') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_tags_ordering']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_COMMON_CACHED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_tags_cached']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Hits') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_tags_hits']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('ID') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_tags_id']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_ILINKS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Published') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_ilinks_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_ILINKS_NOFOLLOW') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_ilinks_nofollow']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_ILINKS_BLANK') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_ilinks_blank']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_ILINKS_LIMIT') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_ilinks_limit']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('COM_MIJOSEF_COMMON_CACHED') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_ilinks_cached']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('ID') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_ilinks_id']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_MIJOSEF_COMMON_BOOKMARKS'); ?></legend>
                        <table class="admintable">
                            <tbody>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('Published') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_bookmarks_published']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="key2">
                                        <?php echo JText::_('ID') . ' ' . JText::_('COM_MIJOSEF_COMMON_COLUMN'); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->lists['ui_bookmarks_id']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.panel', JText::_('JCONFIG_PERMISSIONS_LABEL'), 'permissionstab'); ?>
        <table class="noshow">
            <tr>
                <td>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('JCONFIG_PERMISSIONS_LABEL'); ?></legend>
                        <ul class="adminformlist">
                            <?php foreach($this->permissions->getFieldset('permissions') as $field) { ?>
                                <li><?php echo $field->label; echo $field->input;?></li>
                            <?php } ?>
                        </ul>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php echo JHtml::_('tabs.end'); ?>
    </fieldset>

	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="config" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="sm_auto_cron_last" value="<?php echo $this->MijosefConfig->sm_auto_cron_last; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>