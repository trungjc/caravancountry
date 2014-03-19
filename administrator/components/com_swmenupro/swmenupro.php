<?php

/**
 * swmenupro v6.0
 * http://swmenupro.com
 * Copyright 2006 Sean White
 * */
// ensure this file is being included by a parent file
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//error_reporting(E_ERROR );
// no direct access
defined('_JEXEC') or die('Restricted access');

if (!JFactory::getUser()->authorise('core.manage', 'com_swmenupro')) {
    return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}


jimport('joomla.application.component.controller');
$absolute_path = JPATH_ROOT;
$task = JRequest::getVar('task');
if (file_exists($absolute_path . '/administrator/components/com_swmenupro/language/default.ini')) {
    if ($task == 'changelanguage') {
        $lang = JRequest::getVar('language', "english.php");
        include($absolute_path . '/administrator/components/com_swmenupro/language/' . $lang);
    } else {
        $filename = $absolute_path . '/administrator/components/com_swmenupro/language/default.ini';
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        include($absolute_path . '/administrator/components/com_swmenupro/language/' . $contents);
    }
}

require_once( JPATH_COMPONENT . '/admin.swmenupro.html.php' );
switch (JRequest::getVar('task')) {

    case 'preview':
      
        preview();
        break;
    
     case 'style_export':
      
        style_export();
        break;

    case "saveedit":
        saveconfig();
        break;

    case 'uploadfile':
        uploadPackage();
        break;

    case 'upload_ttf':
        upload_ttf();
        break;

    case 'upload_ttf_file':
        upload_ttf_file();
        break;
    
    case 'importstyles':
        import_styles();
        break;

    case 'get_cufon':
        HTML_swmenupro::uploadCufon();
        break;

    case 'uploadlanguage':
        uploadPackage();
        break;

    case 'changelanguage':
        changeLanguage();
        break;

    case 'import_swMenuFree':
        import_swmenufree();
        break;

    case "upgrade":
        JToolbarHelper::title(JText::_('swMenuPro: Upgrade Manager'));
        upgrade();
        break;

    case "exportMenu":
         $id = ( JRequest::getVar('id', 0));
        $msg = exportMenu($id);
        echo "<div id=\"successful\"><div id=\"sw_dialog\" >
		$msg</div></div>\n";
         JToolbarHelper::title(JText::_('swMenuPro: Menu Module Manager'));
        showModules();
        break;

    case "manualsave":
        //  JToolbarHelper::title(JText::_('swMenuPro: Menu Module Manager'));
        saveCSS();
        break;

    case "editDhtmlMenu":
        JToolbarHelper::title(JText::_('swMenuPro: Menu Module Editor'));
        editDhtmlMenu();
        break;

    case "editCSS":
        JToolbarHelper::title(JText::_('swMenuPro: Manual CSS Editor'));
        editCSS();
        break;

    case "remove": 
           
                removeMyMenu();
           
         break;

    default:
        JToolbarHelper::title(JText::_('swMenuPro:'._SW_MENU_MODULE_MANAGER));
        showModules();
        break;
}

function showModules() {

    $limit = intval(JRequest::getVar('limit', 30));
    $limit = $limit ? $limit : 200;
    $limitstart = intval(JRequest::getVar('limitstart', 0));
    $database = &JFactory::getDBO();

    $database->setQuery("SELECT count(*) FROM #__modules WHERE (module='mod_swmenupro') AND published >-2");
    $total = $database->loadResult();

    $database->setQuery("SELECT count(*) FROM #__swmenupro_styles WHERE (moduleid >= 1)");
    $mod_total = $database->loadResult();

    if ($total != $mod_total) {
       // echo $total . " something is wrong " . $mod_total;
        $database->setQuery("DELETE FROM #__modules WHERE #__modules.module='mod_swmenupro' AND NOT EXISTS (SELECT * FROM #__swmenupro_styles WHERE #__modules.id=#__swmenupro_styles.moduleid)");
        $database->query();
    }


    echo $database->getErrorMsg();
    jimport('joomla.html.pagination');
    $pageNav = new JPagination($total, $limitstart, $limit);




    $database->setQuery("SELECT m.*,  g.title AS groupname"
            . "\nFROM #__modules AS m"
            //. "\nLEFT JOIN #__users AS u ON u.id = m.checked_out"
            . "\nLEFT JOIN #__viewlevels AS g ON g.id = m.access"
            . "\nWHERE (module='mod_swmenupro') "
            . "\nAND (m.published>-2) "
            . "\nORDER BY position, ordering"
            . "\nLIMIT $limitstart,$limit"
    );
    $rows = $database->loadObjectList();
    if ($database->getErrorNum()) {
        //echo $database->stderr();
        //return false;
    }
    $lists = array();

    for ($i = 0; $i < count($rows); $i++) {
        $rows[$i]->position2 = $rows[$i]->position;
        $sql = "SELECT * FROM #__swmenupro_styles where moduleid=" . $rows[$i]->id;
        $database->setQuery($sql);
        $swmenupro = $database->loadObject();
        if (count($swmenupro)) {
            $params = sw_stringToObject($swmenupro->params);
            while (list ($key, $val) = each($params)) {
                $rows[$i]->$key = $val;
            }
            //$row2->id=0;
        }
    }

    //JHTML::_('select.option',  '0', '- '. JText::_( 'Select Position' ) .' -' );
    $str = "";
    $str.="<select id='menustyle' name='menustyle' style='width:180px;'>\n";
   // $str.="<option value='-999'>" . _SW_SELECT_MENU . "</option>\n";
    $str.="<optgroup label='Pop-Out/Drop Down Menus'>\n";
    $str.="<option value='gosumenu'>" . _SW_MYGOSU_MENU . "</option>\n";
    $str.="<option value='transmenu'>" . _SW_TRANS_MENU . "</option>\n";
    $str.="<option value='superfishmenu'>" . _SW_SUPERFISH_MENU . "</option>\n";
    $str.="</optgroup>\n";

    $str.="<optgroup label='Vertical Menus'>\n";
    $str.="<option value='accordian'>" . _SW_ACCORDIAN_MENU . "</option>\n";
    $str.="<option value='accordtransmenu'>Accordion - Trans Menu</option>\n";
    $str.="</optgroup>\n";

    $str.="<optgroup label='Tree Menus'>\n";
    $str.="<option value='treemenu'>Dtree Menu</option>\n";
    $str.="<option value='treeview'>Treeview Menu</option>\n";
    $str.="</optgroup>\n";

    $str.="<optgroup label='Special Menus'>\n";
    $str.="<option value='multitabmenu'>Mega Tab Menu</option>\n";
    $str.="<option value='columnmenu'>Multi Column Menu</option>\n";
    $str.="</optgroup>\n";

    $menus[] = JHTML::_('select.option', '-999', _SW_SELECT_MENU);
    //$menus[]= JHTML::_('select.option', 'standard','Mambo Standard' );
    $menus[] = JHTML::_('select.option', 'superfishmenu', 'Superfish Menu');
    //$menus[]= JHTML::_('select.option', 'popoutmenu',_SW_TIGRA_MENU );
    //$menus[]= JHTML::_('select.option', 'clicktransmenu',_SW_CLICK_TRANS_MENU );
    $menus[] = JHTML::_('select.option', 'accordtransmenu', 'Accordion-Transmenu');
    $menus[] = JHTML::_('select.option', 'multitabmenu', 'Mega Tab Menu');
    $menus[] = JHTML::_('select.option', 'gosumenu', _SW_MYGOSU_MENU);
    //$menus[]= JHTML::_('select.option', 'clickmenu',_SW_CLICK_MENU );
    $menus[] = JHTML::_('select.option', 'treeview', "Tree Menu(HTML)");
    //$menus[]= JHTML::_('select.option', 'treemenu',_SW_TREE_MENU );
    $menus[] = JHTML::_('select.option', 'transmenu', _SW_TRANS_MENU);
    //$menus[]= JHTML::_('select.option', 'tabmenu',_SW_TAB_MENU );
    //$menus[]= JHTML::_('select.option', 'dynamictabmenu',_SW_DYN_TAB_MENU );
    $menus[] = JHTML::_('select.option', 'accordian', _SW_ACCORDIAN_MENU);
    $menus[] = JHTML::_('select.option', 'columnmenu', 'MyGosu Multi Column Menu');
    //print_r ($menus);
    //$lists['menutype']= JHTML::_('select.genericlist', $menus, 'menustyle','id="menustyle" class="inputbox" style="width:180px" ','value', 'text' );
    $lists['menutype'] = $str;

    $query = 'SELECT DISTINCT #__modules.title AS value, #__modules.id AS id FROM #__modules WHERE module="mod_swmenupro" ';
    $database->setQuery($query);
    $menus = $database->loadObjectList();
   // $menutypes3[] = JHTML::_('select.option', '-999', _SW_SELECT_STYLE);
$menutypes3=array();
    foreach ($menus as $menutypes2) {
        $menutypes3[] = JHTML::_('select.option', addslashes($menutypes2->id), addslashes($menutypes2->value));
    }
    $lists['menustyle'] = JHTML::_('select.genericlist', $menutypes3, 'menu_id', 'id="menu_id" class="inputbox" size="1" style="width:180px" ', 'value', 'text');
     $lists['ex_list'] = JHTML::_('select.genericlist', $menutypes3, 'ex_list', 'id="ex_list" class="inputbox" size="1" style="width:180px" ', 'value', 'text');

    HTML_swmenupro::showModules($rows, $pageNav, $lists);
    HTML_swmenupro::footer();
}

function upload_ttf() {

    $absolute_path = JPATH_ROOT;
    //echo $absolute_path;
    $userfile = JRequest::getVar('cufonfile', null, 'files', 'array');
    $success = 0;
    if (!$userfile) {

        exit();
    }

    $userfile_name = $userfile['name'];
//echo $userfile_name;

    if (is_writable($absolute_path . '/modules/mod_swmenupro/fonts')) {
        if (substr($userfile_name, (strlen($userfile_name) - 2)) == "js") {
            move_uploaded_file($userfile['tmp_name'], $absolute_path . '/modules/mod_swmenupro/fonts/' . $userfile['name']);
            $filename = file_get_contents('' . $absolute_path . '/modules/mod_swmenupro/fonts/' . $userfile['name'] . '');
            if (stripos($filename, 'Cufon.registerFont') === false) {
                $message = "File is not a cufon font file";
                unlink($absolute_path . '/modules/mod_swmenupro/fonts/' . $userfile['name']);
            } else {


                $pos_start = strpos($filename, "font-family") + 14;
                $pos_end = strpos($filename, "\"", $pos_start) - $pos_start;
                $fontname = substr($filename, $pos_start, $pos_end);
                $message = "Sucessfully Installed the " . $fontname . " font file.";
                $success = 1;
            }
        } else {

            $message = "File is not a cufon javascript file";
        }
    } else {
        $message = '/modules/mod_swmenupro/fonts folder can not be written to.';
    }

    echo "<dl id=\"system-message\"><dt class=\"message\">Message</dt>
		<dd class=\"message message fade\"><ul><li>" . $message . "</li>
	   </ul></dd></dl>\n";
    if (!$success) {
        HTML_swmenupro::uploadCufon();
    } else {
        echo "<script language=\"javascript\" type=\"text/javascript\">\n";
        echo "window.parent.jInsertCufon('" . $userfile['name'] . "', '" . $fontname . "');\n";
        //  echo "alert(filename);\n";
        echo "</script>";
        echo "You may now choose the " . $fontname . " font from the True Type Font select boxes";
        echo "<br><input type='button' class='sw_get' onclick='window.parent.SqueezeBox.close();' value='close' />";
    }
    //echo $row->id;
    //editCSS($id, $option);
//upgrade($option='com_swmenupro', $installdir='');
    // $mainframe->redirect("index.php?&option=com_swmenupro&task=upgrade", $message);
}

function preview() {
    $absolute_path = JPATH_ROOT;
    include($absolute_path . '/administrator/components/com_swmenupro/preview.php');
}

function style_export() {
    $absolute_path = JPATH_ROOT;
    include($absolute_path . '/administrator/components/com_swmenupro/export.php');
}

function removeMyMenu() {
    $database = &JFactory::getDBO();
    $absolute_path = JPATH_ROOT;
    $cid = JRequest::getVar('id', 0);
    //$database->setQuery( "SELECT * FROM #__modules WHERE id = '$cid'" );
    //$database->query();
    //$database->loadObject($row);

    $database->setQuery("DELETE FROM #__modules WHERE id = '$cid'");
    $database->query();
    $database->setQuery("DELETE FROM #__modules_menu WHERE moduleid = '$cid'");
    $database->query();

    $database->setQuery("DELETE FROM #__swmenupro_styles WHERE moduleid = '$cid'");
    $database->query();
    $database->setQuery("DELETE FROM #__swmenu_extended WHERE moduleID = '$cid'");
    $database->query();

    $file = $absolute_path . "/modules/mod_swmenupro/styles/menu" . $cid . ".css";
    if (file_exists($file)) {
        unlink($file);
    }
   
    $msg = _SW_DELETE_MODULE_MESSAGE;
    $limit = intval(JRequest::getVar('limit', 10));
    $limitstart = intval(JRequest::getVar('limitstart', 0));
    //$mainframe->redirect( "index2.php?task=showmodules&option=$option&limit=$limit&limitstart=$limitstart",$msg );
  echo "<div id=\"successful\"><div id=\"sw_dialog\" >
		$msg</div></div>\n";
    JToolbarHelper::title(JText::_('swMenuPro: Menu Module Manager'));
        showModules();
 
}

function editDhtmlMenu() {


    
   // echo $limitstart;
    $absolute_path = JPATH_ROOT;
    $config = & JFactory::getConfig();
    $dbprefix = $config->get('dbprefix');
    $database = &JFactory::getDBO();
    $new = ( JRequest::getVar('newmenu', 0));
    $cid = ( JRequest::getVar('cid', 0));
    $id = ( JRequest::getVar('id', $cid[0]));
   // echo $new;
    if ($new) {
        $row = & JTable::getInstance('module');
        $row->title = ( JRequest::getVar('new_title', 'swMenuPro'));
        $row->module = "mod_swmenupro";
        if (!$row->store()) {
            echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
            exit();
        }
        $row->checkin();
        //echo $row->id;


            $menustyle = JRequest::getVar('menustyle', 'gosumenu');
            switch ($menustyle) {
              case "gosumenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=1";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }
               break;
               case "transmenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=2";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }
                break;
                case "superfishmenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=3";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }
                break;
                case "accordian":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=4";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }

                    break;

                case "treemenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=5";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }

                    break;
                    
                  
                case "treeview":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=6";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }

                    break;


                case "columnmenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=7";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }

                    break;

              
                case "accordtransmenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=8";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }

                    break;
                case "multitabmenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=9";
                    $database->setQuery($sql);
                    $swmenupro = $database->loadObject();
                    if (count($swmenupro)) {
                        $params = sw_stringToObject($swmenupro->params);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                        }
                    }

                    break;
            }
            $row2->menustyle = $menustyle;
         $action = JRequest::getVar('action2', 'new');
        if ($action == 'index') {
            $copyid = intval(JRequest::getVar('menu_id', 0));
            if ($copyid) {
                $sql = "SELECT * FROM #__swmenupro_styles where moduleid=" . $copyid;
                $database->setQuery($sql);
                $swmenupro = $database->loadObject();
                if (count($swmenupro)) {
                    $params = sw_stringToObject($swmenupro->params);
                    while (list ($key, $val) = each($params)) {
                        $row2->$key = $val;
                    }
                    $row2->id = 0;
                    $menustyle = JRequest::getVar('menustyle', 'gosumenu');
                    $row2->menustyle = $menustyle;
                }
            }
        } 
    } else {
        // echo $id;
        $row = & JTable::getInstance('module');
        $row->load($id);
        $sql = "SELECT * FROM #__swmenupro_styles WHERE moduleid='" . $id . "'";
        $database->setQuery($sql);
        $swmenupro = $database->loadObject();
        if (count($swmenupro)) {
            $params = sw_stringToObject($swmenupro->params);
            while (list ($key, $val) = each($params)) {
                $row2->$key = $val;
                // echo $val;
            }
            $menustyle = $row2->menustyle;
        }
    }

    //  echo $menustyle;
    $swmenupro_array = array();



    if ($row2->menutype == "virtuemart2" || $row2->menutype == "virtueprod2") {

        //  echo "hello";
    } else {

        if ($row2->parentid == 0) {
            $row2->parentid = 1;
        }
    }

    $swmenupro_array = swGetMenuLinks2($row2->menutype, $row->id, $row2->hybrid, 1);

    if (count($swmenupro_array)) {
        // echo $parent_id;
        // $parent_id=10001;
        // print_r($swmenupro_array);
        $ordered = chain2('ID', 'PARENT', 'ORDER', $swmenupro_array, $row2->parentid, $row2->levels);
        $i = 0;
        foreach ($ordered as $row3) {
            if ($menustyle == "clickmenu" || $menustyle == "tabmenu" || $menustyle == "dynamictabmenu" || $menustyle == "accordian") {
                if ((@$ordered[($i)]['indent'] > 1)) {
                    $ordered[$i]['indent'] = 1;
                }
                if ((@$ordered[($i + 1)]['PARENT'] == $row3['ID'])) {
                    $ordered[$i]['TYPE'] = "folder";
                } else {
                    $ordered[$i]['TYPE'] = "doc";
                }
                if ((@$ordered[($i)]['indent'] == 1)) {
                    $ordered[$i]['TYPE'] = "doc";
                }
            } else {
                if ((@$ordered[($i + 1)]['PARENT'] == $row3['ID'])) {
                    $ordered[$i]['TYPE'] = "folder";
                } else {
                    $ordered[$i]['TYPE'] = "doc";
                }
            }
            $i++;
        }
    } else {
        $ordered = array();
        $menudisplay = 0;
    }



    $cssload[] = JHTML::_('select.option', '0', _SW_CSS_DYNAMIC_SELECT);
    $cssload[] = JHTML::_('select.option', '1', _SW_CSS_LINK_SELECT);
    //$cssload[]= JHTML::_('select.option', '2', _SW_CSS_IMPORT_SELECT );
    $cssload[] = JHTML::_('select.option', '3', _SW_CSS_NONE_SELECT);
    $lists['cssload'] = JHTML::_('select.genericlist', $cssload, 'cssload', 'id="cssload" class="inputbox" size="1" style="width:220px" ', 'value', 'text', $row2->cssload ? $row2->cssload : '0' );


    $tables[] = JHTML::_('select.option', '0', _SW_SHOW_TABLES_SELECT);
    $tables[] = JHTML::_('select.option', '1', _SW_SHOW_BLOGS_SELECT);
    $lists['tables'] = JHTML::_('select.genericlist', $tables, 'tables', 'id="tables" class="inputbox" size="1" style="width:160px" ', 'value', 'text', $row2->tables ? $row2->tables : '0' );


    if ($menustyle == "superfishmenu") {
        $extra2[] = JHTML::_('select.option', '0', _SW_SPECIAL_EFFECTS_NONE);
        $extra2[] = JHTML::_('select.option', '1', 'fade in');
        $extra2[] = JHTML::_('select.option', '2', 'slide down');
        $extra2[] = JHTML::_('select.option', '3', 'slide right');
        $extra2[] = JHTML::_('select.option', '4', 'fade in - slide down');
        $extra2[] = JHTML::_('select.option', '5', 'fade in - slide right');
        //$extra2[]= JHTML::_('select.option', '6', 'slide down' );
        $lists['extra'] = JHTML::_('select.genericlist', $extra2, 'extra', 'id="extra" class="inputbox" size="1" style="width:170px" ', 'value', 'text', $row2->extra ? $row2->extra : 'none' );
    } else if ($menustyle == "transmenu") {
        $extra2[] = JHTML::_('select.option', '0', _SW_SPECIAL_EFFECTS_NONE);
        $extra2[] = JHTML::_('select.option', '1', 'Submenu Shadow');

        //$extra2[]= JHTML::_('select.option', '6', 'slide down' );
        $lists['extra'] = JHTML::_('select.genericlist', $extra2, 'extra', 'id="extra" class="inputbox" size="1" style="width:170px" ', 'value', 'text', $row2->extra ? $row2->extra : 'none' );
    } else if ($menustyle == "gosumenu" || $menustyle == "clickmenu" || $menustyle == "clicktransmenu" || $menustyle == "columnmenu" || $menustyle == "accordtransmenu" || $menustyle == "multitabmenu") {
        $extra2[] = JHTML::_('select.option', 'none', _SW_SPECIAL_EFFECTS_NONE);
        $extra2[] = JHTML::_('select.option', 'slide', _SW_SPECIAL_EFFECTS_SLIDE);
        $extra2[] = JHTML::_('select.option', 'fade', _SW_SPECIAL_EFFECTS_FADE);
        // $extra2[]= JHTML::_('select.option', 'slide/fade', "Slide and Fade" );
        $lists['extra'] = JHTML::_('select.genericlist', $extra2, 'extra', 'id="extra" class="inputbox" size="1" style="width:170px" ', 'value', 'text', $row2->extra ? $row2->extra : 'none' );
    } else if ($menustyle == "accordian") {
        $lists['extra'] = "slide";
    } else {

        $lists['extra'] = "none";
    }

    $lists['parent_level'] = JHTML::_('select.integerlist', 0, 10, 1, 'parent_level', 'id="parent_level" size="1" style="width:60px;" class="inputbox"', @$row2->parent_level);
    $lists['levels'] = JHTML::_('select.integerlist', 0, 10, 1, 'levels', 'id="levels" size="1" style="width:60px;" class="inputbox"', @$row2->levels);
    $lists['hybrid'] = JHTML::_('select.booleanlist', 'hybrid', 'class="inputbox"', @$row2->hybrid);
    $lists['active_menu'] = JHTML::_('select.booleanlist', 'active_menu', 'class="inputbox"', @$row2->active_menu);

    $lists['onload_hack'] = JHTML::_('select.booleanlist', 'onload_hack', 'class="inputbox"', @$row2->onload_hack);
    $lists['editor_hack'] = JHTML::_('select.booleanlist', 'editor_hack', 'class="inputbox"', @$row2->editor_hack);
    $lists['padding_hack'] = JHTML::_('select.booleanlist', 'padding_hack', 'class="inputbox"', @$row2->padding_hack);
    $lists['auto_position'] = JHTML::_('select.booleanlist', 'auto_position', 'class="inputbox"', @$row2->auto_position);
    $lists['overlay_hack'] = JHTML::_('select.booleanlist', 'overlay_hack', 'class="inputbox"', @$row2->overlay_hack);

    $lists['level1_open'] = JHTML::_('select.booleanlist', 'level1_open', 'class="inputbox"', @$row2->level1_open);
    $lists['level1_fillempty'] = JHTML::_('select.booleanlist', 'level1_fillempty', 'class="inputbox"', @$row2->level1_fillempty);
    $lists['revert2default'] = JHTML::_('select.booleanlist', 'revert2default', 'class="inputbox"', @$row2->revert2default);

    //$lists['showname'] = JHTML::_('select.booleanlist', 'tree-image_showname', 'class="inputbox" id="tree-image_showname" onchange="treeInfoUpdate();"', 1 );


    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'none', 'none');
    $cssload[] = JHTML::_('select.option', 'curvycorner', 'curvyCorners');
    $cssload[] = JHTML::_('select.option', 'round', 'Round');
    $cssload[] = JHTML::_('select.option', 'bevel', 'Bevel');
    $cssload[] = JHTML::_('select.option', 'notch', 'Notch');
    $cssload[] = JHTML::_('select.option', 'bite', 'Bite');
    $cssload[] = JHTML::_('select.option', 'cool', 'Cool');
    $cssload[] = JHTML::_('select.option', 'sharp', 'Sharp');
    $cssload[] = JHTML::_('select.option', 'slide', 'Slide');
    $cssload[] = JHTML::_('select.option', 'jut', 'Jut');
    $cssload[] = JHTML::_('select.option', 'curl', 'Curl');
    $cssload[] = JHTML::_('select.option', 'tear', 'Tear');
    $cssload[] = JHTML::_('select.option', 'fray', 'Fray');
    $cssload[] = JHTML::_('select.option', 'wicked', 'Wicked');
    $cssload[] = JHTML::_('select.option', 'sculpt', 'Sculpt');
    $cssload[] = JHTML::_('select.option', 'long', 'Long');
    $cssload[] = JHTML::_('select.option', 'dog', 'Dog Ear 1');
    $cssload[] = JHTML::_('select.option', 'dog2', 'Dog Ear 2');
    $cssload[] = JHTML::_('select.option', 'dog3', 'Dog Ear 3');

    $lists['c_corner_style'] = JHTML::_('select.genericlist', $cssload, 'c_corner_style', 'id="c_corner_style" onchange="do_complete_corner();" class="inputbox"  size="1" style="width:160px"', 'value', 'text', @$row2->c_corner_style);
    //$lists['c_corner_size'] = JHTML::_('select.integerlist',0,100,1, 'c_corner_size', 'onchange="do_complete_corner();" id="c_corner_size" class="inputbox"', $c_corner_size );

    $lists['c_corner_size'] = "<input type='text' name='c_corner_size' onchange='do_complete_corner();' id='c_corner_size' class='inputbox' size='3' value='" . @$row2->c_corner_size . "' >";


    $lists['t_corner_style'] = JHTML::_('select.genericlist', $cssload, 't_corner_style', 'id="t_corner_style" onchange="do_top_corner();" class="inputbox"  size="1" style="width:160px"', 'value', 'text', @$row2->t_corner_style);
    //$lists['t_corner_size'] = JHTML::_('select.integerlist',0,100,1, 't_corner_size', 'class="inputbox"', $t_corner_size );
    $lists['t_corner_size'] = "<input type='text' name='t_corner_size' onchange='do_top_corner();' id='t_corner_size' class='inputbox' size='3' value='" . @$row2->t_corner_size . "' >";


    $lists['s_corner_style'] = JHTML::_('select.genericlist', $cssload, 's_corner_style', 'id="s_corner_style"  onchange="do_sub_corner();" class="inputbox"  size="1" style="width:160px"', 'value', 'text', @$row2->s_corner_style);
    $lists['s_corner_size'] = "<input type='text' name='s_corner_size' onchange='do_sub_corner();' id='s_corner_size' class='inputbox' size='3' value='" . @$row2->s_corner_size . "' >";
    $lists['si_corner_style'] = JHTML::_('select.genericlist', $cssload, 'si_corner_style', 'id="si_corner_style"  onchange="do_sub_inside_corner();" class="inputbox"  size="1" style="width:160px"', 'value', 'text', @$row2->si_corner_style);
    $lists['si_corner_size'] = "<input type='text' name='si_corner_size' onchange='do_sub_inside_corner();' id='si_corner_size' class='inputbox' size='3' value='" . @$row2->si_corner_size . "' >";


    $lists['xi_corner_style'] = JHTML::_('select.genericlist', $cssload, 'xi_corner_style', 'id="xi_corner_style"  onchange="do_levelx_inside_corner();" class="inputbox"  size="1" style="width:160px"', 'value', 'text', @$row2->xi_corner_style);
    $lists['xi_corner_size'] = "<input type='text' name='xi_corner_size' onchange='do_levelx_inside_corner();' id='xi_corner_size' class='inputbox' size='3' value='" . @$row2->xi_corner_size . "' >";

    $lists['x_corner_style'] = JHTML::_('select.genericlist', $cssload, 'x_corner_style', 'id="x_corner_style"  onchange="do_levelx_corner();" class="inputbox"  size="1" style="width:160px"', 'value', 'text', @$row2->x_corner_style);
    $lists['x_corner_size'] = "<input type='text' name='x_corner_size' onchange='do_levelx_corner();' id='x_corner_size' class='inputbox' size='3' value='" . @$row2->x_corner_size . "' >";

    if (@$row2->ctl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['ctl_corner'] = "<input type='checkbox' onchange='do_complete_corner();' id='ctl_corner' name='ctl_corner' value='1' " . $tex . " />";
    if (@$row2->ctr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['ctr_corner'] = "<input type='checkbox' onchange='do_complete_corner()' id='ctr_corner' name='ctr_corner' value='1' " . $tex . " />";
    if (@$row2->cbl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['cbl_corner'] = "<input type='checkbox' onchange='do_complete_corner()' id='cbl_corner' name='cbl_corner' value='1' " . $tex . " />";
    if (@$row2->cbr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['cbr_corner'] = "<input type='checkbox' onchange='do_complete_corner()' id='cbr_corner' name='cbr_corner' value='1' " . $tex . " />";

    if (@$row2->ttl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['ttl_corner'] = "<input type='checkbox' onchange='do_top_corner();' id='ttl_corner' name='ttl_corner' value='1' " . $tex . " />";
    if (@$row2->ttr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['ttr_corner'] = "<input type='checkbox' onchange='do_top_corner();' id='ttr_corner' name='ttr_corner' value='1' " . $tex . " />";
    if (@$row2->tbl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tbl_corner'] = "<input type='checkbox' onchange='do_top_corner();' id='tbl_corner' name='tbl_corner' value='1' " . $tex . " />";
    if (@$row2->tbr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tbr_corner'] = "<input type='checkbox' onchange='do_top_corner();' id='tbr_corner' name='tbr_corner' value='1' " . $tex . " />";

    if (@$row2->stl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['stl_corner'] = "<input type='checkbox' onchange='do_sub_corner();' id='stl_corner' name='stl_corner' value='1' " . $tex . " />";
    if (@$row2->str_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['str_corner'] = "<input type='checkbox' onchange='do_sub_corner();' id='str_corner' name='str_corner' value='1' " . $tex . " />";
    if (@$row2->sbl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sbl_corner'] = "<input type='checkbox' onchange='do_sub_corner();' id='sbl_corner' name='sbl_corner' value='1' " . $tex . " />";
    if (@$row2->sbr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sbr_corner'] = "<input type='checkbox' onchange='do_sub_corner();' id='sbr_corner' name='sbr_corner' value='1' " . $tex . " />";
    if (@$row2->sitl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sitl_corner'] = "<input type='checkbox' onchange='do_sub_inside_corner();' id='sitl_corner' name='sitl_corner' value='1' " . $tex . " />";
    if (@$row2->sitr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sitr_corner'] = "<input type='checkbox' onchange='do_sub_inside_corner();' id='sitr_corner' name='sitr_corner' value='1' " . $tex . " />";
    if (@$row2->sibl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sibl_corner'] = "<input type='checkbox' onchange='do_sub_inside_corner();' id='sibl_corner' name='sibl_corner' value='1' " . $tex . " />";
    if (@$row2->sibr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sibr_corner'] = "<input type='checkbox' onchange='do_sub_inside_corner();' id='sibr_corner' name='sibr_corner' value='1' " . $tex . " />";

    if (@$row2->xtl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xtl_corner'] = "<input type='checkbox' onchange='do_levelx_corner();' id='xtl_corner' name='xtl_corner' value='1' " . $tex . " />";
    if (@$row2->xtr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xtr_corner'] = "<input type='checkbox' onchange='do_levelx_corner();' id='xtr_corner' name='xtr_corner' value='1' " . $tex . " />";
    if (@$row2->xbl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xbl_corner'] = "<input type='checkbox' onchange='do_levelx_corner();' id='xbl_corner' name='xbl_corner' value='1' " . $tex . " />";
    if (@$row2->xbr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xbr_corner'] = "<input type='checkbox' onchange='do_levelx_corner();' id='xbr_corner' name='xbr_corner' value='1' " . $tex . " />";

    if (@$row2->xitl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xitl_corner'] = "<input type='checkbox' onchange='do_levelx_inside_corner();' id='xitl_corner' name='xitl_corner' value='1' " . $tex . " />";
    if (@$row2->xitr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xitr_corner'] = "<input type='checkbox' onchange='do_levelx_inside_corner();' id='xitr_corner' name='xitr_corner' value='1' " . $tex . " />";
    if (@$row2->xibl_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xibl_corner'] = "<input type='checkbox' onchange='do_levelx_inside_corner();' id='xibl_corner' name='xibl_corner' value='1' " . $tex . " />";
    if (@$row2->xibr_corner == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xibr_corner'] = "<input type='checkbox' onchange='do_levelx_inside_corner();' id='xibr_corner' name='xibr_corner' value='1' " . $tex . " />";





    if (@$row2->tot_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tot_border'] = "<input type='checkbox' onchange='doMainBorder();' id='tot_border' name='tot_border' value='1' " . $tex . " />";
    if (@$row2->tor_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tor_border'] = "<input type='checkbox' onchange='doMainBorder();' id='tor_border' name='tor_border' value='1' " . $tex . " />";
    if (@$row2->tob_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tob_border'] = "<input type='checkbox' onchange='doMainBorder();' id='tob_border' name='tob_border' value='1' " . $tex . " />";
    if (@$row2->tol_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tol_border'] = "<input type='checkbox' onchange='doMainBorder();' id='tol_border' name='tol_border' value='1' " . $tex . " />";

    if (@$row2->tit_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tit_border'] = "<input type='checkbox' onchange='doMainBorder();' id='tit_border' name='tit_border' value='1' " . $tex . " />";
    if (@$row2->tir_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tir_border'] = "<input type='checkbox' onchange='doMainBorder();' id='tir_border' name='tir_border' value='1' " . $tex . " />";
    if (@$row2->tib_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['tib_border'] = "<input type='checkbox' onchange='doMainBorder();' id='tib_border' name='tib_border' value='1' " . $tex . " />";
    if (@$row2->til_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['til_border'] = "<input type='checkbox' onchange='doMainBorder();' id='til_border' name='til_border' value='1' " . $tex . " />";


    if (@$row2->sot_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sot_border'] = "<input type='checkbox' onchange='doSubBorder();' id='sot_border' name='sot_border' value='1' " . $tex . " />";
    if (@$row2->sor_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sor_border'] = "<input type='checkbox' onchange='doSubBorder();' id='sor_border' name='sor_border' value='1' " . $tex . " />";
    if (@$row2->sob_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sob_border'] = "<input type='checkbox' onchange='doSubBorder();' id='sob_border' name='sob_border' value='1' " . $tex . " />";
    if (@$row2->sol_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sol_border'] = "<input type='checkbox' onchange='doSubBorder();' id='sol_border' name='sol_border' value='1' " . $tex . " />";

    if (@$row2->sit_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sit_border'] = "<input type='checkbox' onchange='doSubBorder();' id='sit_border' name='sit_border' value='1' " . $tex . " />";
    if (@$row2->sir_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sir_border'] = "<input type='checkbox' onchange='doSubBorder();' id='sir_border' name='sir_border' value='1' " . $tex . " />";
    if (@$row2->sib_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sib_border'] = "<input type='checkbox' onchange='doSubBorder();' id='sib_border' name='sib_border' value='1' " . $tex . " />";
    if (@$row2->sil_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['sil_border'] = "<input type='checkbox' onchange='doSubBorder();' id='sil_border' name='sil_border' value='1' " . $tex . " />";



    if (@$row2->xot_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xot_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='xot_border' name='xot_border' value='1' " . $tex . " />";
    if (@$row2->xor_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xor_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='xor_border' name='xor_border' value='1' " . $tex . " />";
    if (@$row2->xob_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xob_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='xob_border' name='xob_border' value='1' " . $tex . " />";
    if (@$row2->xol_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xol_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='xol_border' name='xol_border' value='1' " . $tex . " />";

    if (@$row2->xit_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xit_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='xit_border' name='xit_border' value='1' " . $tex . " />";
    if (@$row2->xir_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xir_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='xir_border' name='xir_border' value='1' " . $tex . " />";
    if (@$row2->xib_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xib_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='xib_border' name='xib_border' value='1' " . $tex . " />";
    if (@$row2->xil_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['xil_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='xil_border' name='xil_border' value='1' " . $tex . " />";

    if (@$row2->x_auto_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['x_auto_border'] = "<input type='checkbox' onchange='doLevelxBorder();' id='x_auto_border' name='x_auto_border' value='1' " . $tex . " />";

    if (@$row2->t_auto_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['t_auto_border'] = "<input type='checkbox' onchange='doMainBorder();' id='t_auto_border' name='t_auto_border' value='1' " . $tex . " />";

    if (@$row2->s_auto_border == 1) {
        $tex = "checked='checked'";
    } else {
        $tex = "";
    }
    $lists['s_auto_border'] = "<input type='checkbox' onchange='doSubBorder();' id='s_auto_border' name='s_auto_border' value='1' " . $tex . " />";





    $lists['top_sub_indicator'] = "<img id='top_sub' src='../" . (@$row2->top_sub_indicator ? $row2->top_sub_indicator : 'modules/mod_swmenupro/images/empty.gif') . "'  align='middle' /><input type='hidden' id='top_sub_indicator' name='top_sub_indicator' value='" . @$row2->top_sub_indicator . "' />";
    $lists['sub_sub_indicator'] = "<img id='sub_sub' src='../" . (@$row2->sub_sub_indicator ? $row2->sub_sub_indicator : 'modules/mod_swmenupro/images/empty.gif') . "'  align='middle' /><input type='hidden' id='sub_sub_indicator' name='sub_sub_indicator' value='" . @$row2->sub_sub_indicator . "' />";
    $lists['levelx_sub_indicator'] = "<img id='levelx_sub' src='../" . (@$row2->levelx_sub_indicator ? $row2->levelx_sub_indicator : 'modules/mod_swmenupro/images/empty.gif') . "'  align='middle' /><input type='hidden' id='levelx_sub_indicator' name='levelx_sub_indicator' value='" . @$row2->levelx_sub_indicator . "' />";


    $lists['top_sub_indicator_top'] = "<input type=\"text\" size=\"4\" id=\"top_sub_indicator_top\" name=\"top_sub_indicator_top\" value=\"" . @$row2->top_sub_indicator_top . "\" />";
    $lists['top_sub_indicator_left'] = "<input type=\"text\" size=\"4\" id=\"top_sub_indicator_left\" name=\"top_sub_indicator_left\" value=\"" . @$row2->top_sub_indicator_left . "\" />";

    $lists['sub_sub_indicator_top'] = "<input type=\"text\" size=\"4\" id=\"sub_sub_indicator_top\" name=\"sub_sub_indicator_top\" value=\"" . @$row2->sub_sub_indicator_top . "\" />";
    $lists['sub_sub_indicator_left'] = "<input type=\"text\" size=\"4\" id=\"sub_sub_indicator_left\" name=\"sub_sub_indicator_left\" value=\"" . @$row2->sub_sub_indicator_left . "\" />";

    $lists['levelx_sub_indicator_top'] = "<input type=\"text\" size=\"4\" id=\"levelx_sub_indicator_top\" name=\"levelx_sub_indicator_top\" value=\"" . @$row2->levelx_sub_indicator_top . "\" />";
    $lists['levelx_sub_indicator_left'] = "<input type=\"text\" size=\"4\" id=\"levelx_sub_indicator_left\" name=\"levelx_sub_indicator_left\" value=\"" . @$row2->levelx_sub_indicator_left . "\" />";


    $lists['tablet_hack'] = JHTML::_('select.booleanlist', 'tablet_hack', 'class="inputbox"', @$row2->tablet_hack);
    $lists['selectbox_hack'] = JHTML::_('select.booleanlist', 'selectbox_hack', 'class="inputbox"', @$row2->selectbox_hack);
    $lists['disable_jquery'] = JHTML::_('select.booleanlist', 'disable_jquery', 'class="inputbox"', @$row2->disable_jquery);
    $lists['flash_hack'] = JHTML::_('select.booleanlist', 'flash_hack', 'class="inputbox"', @$row2->flash_hack);
    $lists['use_cookie'] = JHTML::_('select.booleanlist', 'use_cookie', 'class="inputbox"', @$row2->use_cookie);

    $lists['expand_all'] = JHTML::_('select.booleanlist', 'expand_all', 'class="inputbox"', @$row2->expand_all);
    $lists['autoclose'] = JHTML::_('select.booleanlist', 'autoclose', 'class="inputbox"', @$row2->autoclose);
    $lists['revealtype'] = JHTML::_('select.booleanlist', 'revealtype', 'class="inputbox"', @$row2->revealtype);
    $lists['disable_parent'] = JHTML::_('select.booleanlist', 'disable_parent', 'class="inputbox"', @$row2->disable_parent);


 $query = 'SELECT DISTINCT #__menu.menutype AS value FROM #__menu';
    $database->setQuery($query);
    $menutypes = $database->loadObjectList();
    //$menutypes3[]= JHTML::_('select.option', '-999', 'Select Source Menu' );
    //$menutypes3[]= JHTML::_('select.option', '-999', '-----------------' );
    $menutypes3[] = JHTML::_('select.option', 'swcontentmenu', _SW_SOURCE_CONTENT_SELECT);
    $menutypes3[] = JHTML::_('select.option', '-999', '-----------------');
    if (TableExists($dbprefix . "virtuemart_configs")) {
        $menutypes3[] = JHTML::_('select.option', 'virtuemart2', 'Virtuemart2 Categories');
        $menutypes3[] = JHTML::_('select.option', 'virtueprod2', 'Virtuemart2 Products');
        $menutypes3[] = JHTML::_('select.option', '-999', '-----------------');
    }else if (TableExists($dbprefix . "vm_category")) {
        $menutypes3[] = JHTML::_('select.option', 'virtuemart', 'Virtuemart Categories');
        $menutypes3[] = JHTML::_('select.option', 'virtueprod', 'Virtuemart Products');
        $menutypes3[] = JHTML::_('select.option', '-999', '-----------------');
    }
    if (file_exists($absolute_path . "/components/com_mtree/mtree.php")) {
        $menutypes3[] = JHTML::_('select.option', 'mosetstree', 'Mosets Tree component');
        //$menutypes3[]= JHTML::_('select.option', 'virtueprod', 'Virtuemart Products' );
        $menutypes3[] = JHTML::_('select.option', '-999', '-----------------');
    }
    $menutypes3[] = JHTML::_('select.option', '-999', _SW_SOURCE_EXISTING_SELECT);
    $menutypes3[] = JHTML::_('select.option', '-999', '-----------------');



    foreach($menutypes as $menutypes2){
		$menutypes3[]= JHTML::_('select.option', addslashes($menutypes2->value), addslashes($menutypes2->value) );
	}
	$lists['menutype']= JHTML::_('select.genericlist', $menutypes3, 'menutype',' id="menutype" class="inputbox" size="1" style="width:220px" onchange="changeDynaList(\'parentid\',orders2,document.getElementById(\'menutype\').options[document.getElementById(\'menutype\').selectedIndex].value, originalPos2, originalOrder2);"','value', 'text', $row2->menutype ? $row2->menutype : 'mainmenu' );
	$categories3[]= JHTML::_('select.option', 0, 'TOP' );

	$sql =  "SELECT DISTINCT #__categories.id AS value, #__categories.title AS text, #__categories.extension, #__categories.level AS level
                FROM #__categories                                  
                INNER JOIN #__content ON #__content.catid = #__categories.id
                WHERE #__categories.published = 1
                AND #__categories.extension='com_content'
                ORDER BY #__categories.lft
                
                ";
	$database->setQuery( $sql );
	$categories = $database->loadObjectList();

	foreach($categories as $categories2){
		$categories3[]= JHTML::_('select.option', ($categories2->value), (str_repeat("- ",$categories2->level).$categories2->text) );
	}

	foreach($categories3 as $category){
		$menuitems['swcontentmenu'][] = JHTML::_('select.option', $category->value, addslashes($category->text) );

	}
    if (file_exists($absolute_path . "/components/com_virtuemart/virtuemart.php")) {
        $categories4[] = JHTML::_('select.option', 0, 'All Categories (top)');

 
   if (TableExists($dbprefix . "virtuemart_configs")) {
        $sql = "SELECT  #__virtuemart_configs.config
                FROM #__virtuemart_configs
                WHERE #__virtuemart_configs.virtuemart_config_id=1";
         $database->setQuery($sql);
         $result=$database->loadResult();
       
       $config = explode('|', $result);
			foreach($config as $item){
				$item = explode('=',$item);
				if(!empty($item[1])){
					// if($item[0]!=='offline_message' && $item[0]!=='dateformat' ){
					if($item[0]!=='offline_message' ){
						$pair[$item[0]] = unserialize($item[1] );
					} else {
						$pair[$item[0]] = unserialize(base64_decode($item[1]) );
					}

				} else {
					$pair[$item[0]] ='';
				}

			}
$vmlang= $pair['vmlang'];
//echo $vmlang;
        
        $sql = "SELECT DISTINCT #__virtuemart_categories_".$vmlang.".virtuemart_category_id AS value, #__virtuemart_categories_".$vmlang.".category_name AS text
                FROM #__virtuemart_categories_".$vmlang;
    }else{
        $sql = "SELECT DISTINCT #__vm_category.category_id AS value, #__vm_category.category_name AS text
                FROM #__vm_category ";
        
    }
        $database->setQuery($sql);
        $sections = $database->loadObjectList();
        $categories4[] = JHTML::_('select.option', -999, '--------');
        $categories4[] = JHTML::_('select.option', -999, 'Categories');
        $categories4[] = JHTML::_('select.option', -999, '--------');
        foreach ($sections as $sections2) {
            $categories4[] = JHTML::_('select.option', ($sections2->value+10000), $sections2->text);
        }

        foreach ($categories4 as $category) {
            $menuitems['virtuemart'][] = JHTML::_('select.option', $category->value, addslashes($category->text));
            $menuitems['virtueprod'][] = JHTML::_('select.option', $category->value, addslashes($category->text));
            $menuitems['virtuemart2'][] = JHTML::_('select.option', $category->value, addslashes($category->text));
            $menuitems['virtueprod2'][] = JHTML::_('select.option', $category->value, addslashes($category->text));
        }
    }
    $menuitems2=array();
	$database->setQuery( "SELECT m.*"
	. "\n FROM #__menu m"
	//. "\n WHERE type != 'url'"
	//. "\n WHERE type != 'separator'"
	. "\n WHERE published = '1'"
	. "\n AND parent_id!='0'"
	. "\n ORDER BY menutype, parent_id"
	);
	$mitems = $database->loadObjectList();
	$mitems_temp = $mitems;

	// establish the hierarchy of the menu
	$children = array();
	// first pass - collect children
	foreach ( $mitems as $v ) {
		$id = $v->id;
		$pt = $v->parent_id;
		$list = @$children[$pt] ? $children[$pt] : array();
		array_push( $list, $v );
		$children[$pt] = $list;
	}
	// second pass - get an indent list of the items
	$list = swmenuTreeRecurse( intval( $mitems[0]->parent_id ), '', array(), $children );

	// Code that adds menu name to Display of Page(s)
	$text_count = "0";
	$mitems_spacer = "";
	foreach ($list as $list_a) {
		foreach ($mitems_temp as $mitems_a) {
			if ($mitems_a->id == $list_a->id) {
				// Code that inserts the blank line that seperates different menus
				if ($mitems_a->menutype <> $mitems_spacer) {
					//$list_temp[] = JHTML::_('select.option', -99, "----------" );
					$list_temp[] = JHTML::_('select.option', -99, "--------------" );
					$list_temp[] = JHTML::_('select.option', -99, $mitems_a->menutype );
					$list_temp[] = JHTML::_('select.option', -99, "--------------" );
					$menuitems[$mitems_a->menutype][] = JHTML::_('select.option', 0, "TOP" );
					$mitems_spacer = $mitems_a->menutype;
				}
				$text = addslashes("- ".$list_a->treename);
				$text2 = addslashes($list_a->treename);
				$list_temp[] = JHTML::_('select.option', $list_a->id, $text );
				$menuitems[$mitems_a->menutype][] = JHTML::_('select.option', $list_a->id, $text2 );
				if ( strlen($text) > $text_count) {
					$text_count = strlen($text);
				}
			}
		}
	}
	$list = $list_temp;


    $align[] = JHTML::_('select.option', 'left', 'left');
    $align[] = JHTML::_('select.option', 'right', 'right');
    $align[] = JHTML::_('select.option', 'texttop', 'texttop');
    $align[] = JHTML::_('select.option', 'absmiddle', 'absmiddle');
    $align[] = JHTML::_('select.option', 'baseline', 'baseline');
    $align[] = JHTML::_('select.option', 'absbottom', 'absbottom');
    $align[] = JHTML::_('select.option', 'bottom', 'bottom');
    $align[] = JHTML::_('select.option', 'middle', 'middle');
    $align[] = JHTML::_('select.option', 'top', 'top');
    $lists['align'] = JHTML::_('select.genericlist', $align, 'tree-image_align', 'id="tree-image_align" class="inputbox" onchange="treeInfoUpdate();"', 'value', 'text', '');
    //$lists['sub_indicator_align']= JHTML::_('select.genericlist', $align, 'sub_indicator_align','id="sub_indicator_align" class="inputbox" "','value', 'text', $sub_indicator_align );

    $align = array();
    $align[] = JHTML::_('select.option', 'left', 'left');
    $align[] = JHTML::_('select.option', 'right', 'right');
    $lists['top_sub_indicator_align'] = JHTML::_('select.genericlist', $align, 'top_sub_indicator_align', 'id="top_sub_indicator_align" size="1" class="inputbox" style="width:100px"', 'value', 'text', @$row2->top_sub_indicator_align);
    $lists['sub_sub_indicator_align'] = JHTML::_('select.genericlist', $align, 'sub_sub_indicator_align', 'id="sub_sub_indicator_align" size="1" class="inputbox" style="width:100px"', 'value', 'text', @$row2->sub_sub_indicator_align);
    $lists['levelx_sub_indicator_align'] = JHTML::_('select.genericlist', $align, 'levelx_sub_indicator_align', 'id="levelx_sub_indicator_align" size="1" class="inputbox" style="width:100px"', 'value', 'text', @$row2->levelx_sub_indicator_align);

    $align = array();
    $align[] = JHTML::_('select.option', '', 'none');
    $align[] = JHTML::_('select.option', 'italic', 'italic');
    $align[] = JHTML::_('select.option', 'oblique', 'oblique');
    $align[] = JHTML::_('select.option', 'underline', 'underline');
    $align[] = JHTML::_('select.option', 'line-through', 'line-through');
    $align[] = JHTML::_('select.option', 'overline', 'overline');
    $align[] = JHTML::_('select.option', 'uppercase', 'uppercase');
    $align[] = JHTML::_('select.option', 'lowercase', 'lowercase');
    $align[] = JHTML::_('select.option', 'capitalize', 'capitalize');
    $lists['top_font_extra'] = JHTML::_('select.genericlist', $align, 'top_font_extra', 'id="top_font_extra" size="1" onchange="do_top_font_extra();" class="inputbox"', 'value', 'text', @$row2->top_font_extra);
    $lists['sub_font_extra'] = JHTML::_('select.genericlist', $align, 'sub_font_extra', 'id="sub_font_extra" size="1" onchange="do_sub_font_extra();" class="inputbox"', 'value', 'text', @$row2->sub_font_extra);
    $lists['levelx_sub_font_extra'] = JHTML::_('select.genericlist', $align, 'levelx_sub_font_extra', 'id="levelx_sub_font_extra" size="1" onchange="do_sub_font_extra();" class="inputbox"', 'value', 'text', @$row2->levelx_sub_font_extra);

    $yesno = array();
    $yesno[] = JHTML::_('select.option', '1', _SW_YES);
    $yesno[] = JHTML::_('select.option', '0', _SW_NO);
    $lists['showname'] = JHTML::_('select.genericlist', $yesno, 'tree-image_showname', 'class="inputbox" id="tree-image_showname" onchange="treeInfoUpdate();"', 'value', 'text', 1);
    $lists['target'] = JHTML::_('select.genericlist', $yesno, 'tree-image_target', 'class="inputbox" id="tree-image_target" onchange="treeInfoUpdate();"', 'value', 'text', 1);
    $lists['showitem'] = JHTML::_('select.genericlist', $yesno, 'tree-image_showitem', 'class="inputbox" id="tree-image_showitem" onchange="treeInfoUpdate();"', 'value', 'text', 1);


    $yesno = array();
    $yesno[] = JHTML::_('select.option', 'normal', "Wrap text");
    $yesno[] = JHTML::_('select.option', 'nowrap', "No text Wrapping");
    $lists['top_wrap'] = JHTML::_('select.genericlist', $yesno, 'top_wrap', 'class="inputbox" id="top_wrap" size="1" onchange="jQuery(\'.top_preview\').css(\'white-space\',this.value);" ', 'value', 'text', @$row2->top_wrap);
    $lists['sub_wrap'] = JHTML::_('select.genericlist', $yesno, 'sub_wrap', 'class="inputbox" id="sub_wrap" size="1" onchange="doCompletePreview();"', 'value', 'text', @$row2->sub_wrap);
    $lists['levelx_sub_font_wrap'] = JHTML::_('select.genericlist', $yesno, 'levelx_sub_font_wrap', 'class="inputbox" size="1" id="levelx_sub_font_wrap" onchange="doCompletePreview();"', 'value', 'text', @$row2->levelx_sub_font_wrap);
    $lists['tree_top_wrap'] = JHTML::_('select.genericlist', $yesno, 'top_wrap', 'class="inputbox" id="top_wrap" size="1" onchange="jQuery(\'#menu0 span.folder a\').css(\'white-space\',this.value);" ', 'value', 'text', @$row2->top_wrap);
    $lists['tree_sub_wrap'] = JHTML::_('select.genericlist', $yesno, 'sub_wrap', 'class="inputbox" id="sub_wrap" size="1" onchange="jQuery(\'#menu0 span.file a\').css(\'white-space\',this.value);"', 'value', 'text', @$row2->sub_wrap);

    $cssload = array();
    $cssload[] = JHTML::_('select.option', '0', _SW_CSS_SELECT);
    $cssload[] = JHTML::_('select.option', 'border:', _SW_COMPLETE_BORDER_SELECT);
    $cssload[] = JHTML::_('select.option', 'border-top:', _SW_BORDER_TOP_SELECT);
    $cssload[] = JHTML::_('select.option', 'border-right:', _SW_BORDER_RIGHT_SELECT);
    $cssload[] = JHTML::_('select.option', 'border-bottom:', _SW_BORDER_BOTTOM_SELECT);
    $cssload[] = JHTML::_('select.option', 'border-left:', _SW_BORDER_LEFT_SELECT);
    $cssload[] = JHTML::_('select.option', 'padding:', _SW_PADDING_SELECT);
    $cssload[] = JHTML::_('select.option', 'margin:', _SW_MARGIN_SELECT);
    $cssload[] = JHTML::_('select.option', 'background:', _SW_BACKGROUND_SELECT);
    $cssload[] = JHTML::_('select.option', 'text', _SW_TEXT_SELECT);
    $cssload[] = JHTML::_('select.option', 'font:', _SW_FONT_SELECT);
    $cssload[] = JHTML::_('select.option', 'offsets', _SW_OFFSET_SELECT);
    $cssload[] = JHTML::_('select.option', 'dimensions', _SW_DIMENSION_SELECT);
    $cssload[] = JHTML::_('select.option', 'effects', _SW_EFFECT_SELECT);
    $lists['ncsstype'] = JHTML::_('select.genericlist', $cssload, 'ncsstype', 'id="ncsstype" class="inputbox" size="1" style="width:200px" onchange="showCSS(\'ncsstype\');"', 'value', 'text', @$css_load ? $css_load : '0' );
    $lists['ocsstype'] = JHTML::_('select.genericlist', $cssload, 'ocsstype', 'id="ocsstype" class="inputbox" size="1" style="width:200px" onchange="showCSS(\'ocsstype\');"', 'value', 'text', @$css_load ? $css_load : '0' );

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'none', 'none');
    $cssload[] = JHTML::_('select.option', 'solid', 'solid');
    $cssload[] = JHTML::_('select.option', 'dashed', 'dashed');
    $cssload[] = JHTML::_('select.option', 'inset', 'inset');
    $cssload[] = JHTML::_('select.option', 'outset', 'outset');
    $cssload[] = JHTML::_('select.option', 'groove', 'groove');
    $cssload[] = JHTML::_('select.option', 'double', 'double');
    $lists['ncsstype-border-style'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-border-style', 'id="ncsstype-border-style" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );
    $lists['ocsstype-border-style'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-border-style', 'id="ocsstype-border-style" class="inputbox" size="1" style="width:100px" ', 'value', 'text', @$css_load ? $css_load : '0' );
    $lists['main_border_style'] = JHTML::_('select.genericlist', $cssload, 'main_border_style', 'id="main_border_style" class="inputbox" onchange="doMainBorder();" size="1" style="width:80px"', 'value', 'text', @$row2->main_border_style);
    $lists['sub_border_style'] = JHTML::_('select.genericlist', $cssload, 'sub_border_style', 'id="sub_border_style" class="inputbox" onchange="doSubBorder();" size="1" style="width:80px"', 'value', 'text', @$row2->sub_border_style);
    $lists['main_border_over_style'] = JHTML::_('select.genericlist', $cssload, 'main_border_over_style', 'id="main_border_over_style" class="inputbox" onchange="doMainBorder();" size="1" style="width:80px"', 'value', 'text', @$row2->main_border_over_style);
    $lists['sub_border_over_style'] = JHTML::_('select.genericlist', $cssload, 'sub_border_over_style', 'id="sub_border_over_style" class="inputbox" onchange="doSubBorder();" size="1" style="width:80px"', 'value', 'text', @$row2->sub_border_over_style);
    $lists['levelx_outside_border_style'] = JHTML::_('select.genericlist', $cssload, 'levelx_outside_border_style', 'id="levelx_outside_border_style" class="inputbox" onchange="doLevelxBorder();" size="1" style="width:80px"', 'value', 'text', @$row2->levelx_outside_border_style);
    $lists['levelx_inside_border_style'] = JHTML::_('select.genericlist', $cssload, 'levelx_inside_border_style', 'id="levelx_inside_border_style" class="inputbox" onchange="doLevelxBorder();" size="1" style="width:80px"', 'value', 'text', @$row2->levelx_inside_border_style);

    $lists['ncsstype-border-width'] = JHTML::_('select.integerlist', 0, 10, 1, 'ncsstype-border-width', 'id="ncsstype-border-width" class="inputbox"', 0);
    $lists['ocsstype-border-width'] = JHTML::_('select.integerlist', 0, 10, 1, 'ocsstype-border-width', 'id="ocsstype-border-width" class="inputbox"', 0);


    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'repeat', 'repeat');
    $cssload[] = JHTML::_('select.option', 'repeat-x', 'repeat-x');
    $cssload[] = JHTML::_('select.option', 'repeat-y', 'repeat-y');
    $cssload[] = JHTML::_('select.option', 'no-repeat', 'no-repeat');
    $lists['ncsstype-background-repeat'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-background-repeat', 'id="ncsstype-background-repeat" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );
    $lists['ocsstype-background-repeat'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-background-repeat', 'id="ocsstype-background-repeat" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );

    $cssload = array();
    $fonts=array();
   //  $fonts[] = 'Arial, Helvetica, sans-serif';
     $fonts[] =  @$row2->font_family;
    $fonts[] =  @$row2->sub_font_family;
    //  $cssload[]= JHTML::_('select.option', @$row2->font_family, @$row2->font_family );
    $fonts[] = 'Arial, Helvetica, sans-serif';
    $fonts[] = 'Times New Roman, Times, serif';
    $fonts[] = 'Georgia, Times New Roman, Times, serif';
    $fonts[] = 'Verdana, Arial, Helvetica, sans-serif';
    $fonts[] = 'Geneva, Arial, Helvetica, sans-serif';
    $fonts[] = 'Tahoma, Arial, sans-serif';
    $fonts=  array_keys(array_flip($fonts));
  //  print_r($fonts);
   // $cssload[] = JHTML::_('select.option', 0, "--Add Your Own Font Here--");
    for($i=0;$i<count($fonts);$i++){
        if($fonts[$i]){$cssload[] = JHTML::_('select.option', @$fonts[$i], @$fonts[$i]);}  
        
    }
 
    $lists['ncsstype-font-family'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-font-family', 'id="ncsstype-font-family" class="inputbox" size="1" style="width:200px"', 'value', 'text', '0');
    $lists['ocsstype-font-family'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-font-family', 'id="ocsstype-font-family" class="inputbox" size="1" style="width:200px"', 'value', 'text', '0');
    $lists['font_family'] = JHTML::_('select.genericlist', $cssload, 'font_family', 'id="font_family" onchange="jQuery(\'.top_preview\').css(\'font-family\',this.value);" class="inputbox" size="1" style="width:230px"', 'value', 'text', @$row2->font_family);
    $lists['sub_font_family'] = JHTML::_('select.genericlist', $cssload, 'sub_font_family', 'id="sub_font_family" onchange="doCompletePreview();" class="inputbox" size="1" style="width:230px"', 'value', 'text', @$row2->sub_font_family);
    $lists['tree_font_family'] = JHTML::_('select.genericlist', $cssload, 'font_family', 'id="font_family" onchange="jQuery(\'#menu0 span.folder a\').css(\'font-family\',this.value);" class="inputbox" size="1" style="width:230px"', 'value', 'text', @$row2->font_family);
    $lists['tree_sub_font_family'] = JHTML::_('select.genericlist', $cssload, 'sub_font_family', 'id="sub_font_family" onchange="jQuery(\'#menu0 span.file a\').css(\'font-family\',this.value);" class="inputbox" size="1" style="width:230px"', 'value', 'text', @$row2->sub_font_family);

    $lists['levelx_sub_font_family'] = JHTML::_('select.genericlist', $cssload, 'levelx_sub_font_family', 'id="levelx_sub_font_family" onchange="doCompletePreview();" class="inputbox" size="1" style="width:230px"', 'value', 'text', @$row2->levelx_sub_font_family);

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'normal', 'normal');
    $cssload[] = JHTML::_('select.option', 'italic', 'italic');
    $cssload[] = JHTML::_('select.option', 'oblique', 'oblique');
    $lists['ncsstype-font-style'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-font-style', 'id="ncsstype-font-style" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );
    $lists['ocsstype-font-style'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-font-style', 'id="ocsstype-font-style" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'normal', 'normal');
    $cssload[] = JHTML::_('select.option', 'bold', 'bold');
    $cssload[] = JHTML::_('select.option', 'bolder', 'bolder');
    $cssload[] = JHTML::_('select.option', 'lighter', 'lighter');
    $lists['ncsstype-font-weight'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-font-weight', 'id="ncsstype-font-weight" class="inputbox" size="1" style="width:100px"', 'value', 'text', 'normal');
    $lists['ocsstype-font-weight'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-font-weight', 'id="ocsstype-font-weight" class="inputbox" size="1" style="width:100px"', 'value', 'text', 'normal');
    $lists['font_weight'] = JHTML::_('select.genericlist', $cssload, 'font_weight', 'id="font_weight" onchange="jQuery(\'.top_preview\').css(\'font-weight\',this.value);" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->font_weight);
    $lists['font_weight_over'] = JHTML::_('select.genericlist', $cssload, 'font_weight_over', 'id="font_weight_over" onchange="doCompletePreview();" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->font_weight_over);
    $lists['tree_font_weight'] = JHTML::_('select.genericlist', $cssload, 'font_weight', 'id="font_weight" onchange="jQuery(\'#menu0 span.folder a\').css(\'font-weight\',this.value);" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->font_weight);
    $lists['tree_font_weight_over'] = JHTML::_('select.genericlist', $cssload, 'font_weight_over', 'id="font_weight_over" onchange="jQuery(\'#menu0 span.file a\').css(\'font-weight\',this.value);" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->font_weight_over);

    $lists['levelx_sub_font_weight'] = JHTML::_('select.genericlist', $cssload, 'levelx_sub_font_weight', 'id="levelx_sub_font_weight" onchange="doCompletePreview();" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->levelx_sub_font_weight);

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'none', 'none');
    $cssload[] = JHTML::_('select.option', 'underline', 'underline');
    $cssload[] = JHTML::_('select.option', 'overline', 'overline');
    $cssload[] = JHTML::_('select.option', 'line-through', 'line-through');
    $cssload[] = JHTML::_('select.option', 'blink', 'blink');
    $lists['ncsstype-text-decoration'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-text-decoration', 'id="ncsstype-text-decoration" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );
    $lists['ocsstype-text-decoration'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-text-decoration', 'id="ocsstype-text-decoration" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'left', 'left');
    $cssload[] = JHTML::_('select.option', 'right', 'right');
    $cssload[] = JHTML::_('select.option', 'center', 'center');
    $cssload[] = JHTML::_('select.option', 'justify', 'justify');
    $lists['ncsstype-text-align'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-text-align', 'id="ncsstype-text-align" class="inputbox" size="1" style="width:100px"', 'value', 'text', 'left');
    $lists['ocsstype-text-align'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-text-align', 'id="ocsstype-text-align" class="inputbox" size="1" style="width:100px"', 'value', 'text', 'left');
    $lists['main_align'] = JHTML::_('select.genericlist', $cssload, 'main_align', 'id="main_align" onchange="jQuery(\'.top_preview\').css(\'text-align\',this.value);" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->main_align);
    $lists['sub_align'] = JHTML::_('select.genericlist', $cssload, 'sub_align', 'id="sub_align" onchange="doCompletePreview();" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->sub_align);
    $lists['levelx_sub_font_align'] = JHTML::_('select.genericlist', $cssload, 'levelx_sub_font_align', 'id="levelx_sub_font_align" onchange="doCompletePreview();" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->levelx_sub_font_align);
    $lists['tree_main_align'] = JHTML::_('select.genericlist', $cssload, 'main_align', 'id="main_align" onchange="jQuery(\'#menu0 span.folder a\').css(\'text-align\',this.value);" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->main_align);
    $lists['tree_sub_align'] = JHTML::_('select.genericlist', $cssload, 'sub_align', 'id="sub_align" onchange="jQuery(\'#menu0 span.file a\').css(\'text-align\',this.value);" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$row2->sub_align);

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'none', 'none');
    $cssload[] = JHTML::_('select.option', 'capitalize', 'capitalize');
    $cssload[] = JHTML::_('select.option', 'uppercase', 'uppercase');
    $cssload[] = JHTML::_('select.option', 'lowercase', 'lowercase');
    $lists['ncsstype-text-transform'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-text-transform', 'id="ncsstype-text-transform" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );
    $lists['ocsstype-text-transform'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-text-transform', 'id="ocsstype-text-transform" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'normal', 'normal');
    $cssload[] = JHTML::_('select.option', 'pre', 'pre');
    $cssload[] = JHTML::_('select.option', 'nowrap', 'nowrap');
    $lists['ncsstype-white-space'] = JHTML::_('select.genericlist', $cssload, 'ncsstype-white-space', 'id="ncsstype-white-space" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );
    $lists['ocsstype-white-space'] = JHTML::_('select.genericlist', $cssload, 'ocsstype-white-space', 'id="ocsstype-white-space" class="inputbox" size="1" style="width:100px"', 'value', 'text', @$css_load ? $css_load : '0' );

    $cssload = array();
    if ($menustyle == "popoutmenu") {
        $cssload[] = JHTML::_('select.option', 'relative', 'relative');
        $cssload[] = JHTML::_('select.option', 'absolute', 'absolute');
    } else {
        $cssload[] = JHTML::_('select.option', 'left', 'left');
        $cssload[] = JHTML::_('select.option', 'right', 'right');
        $cssload[] = JHTML::_('select.option', 'center', 'center');
    }
    $lists['position'] = JHTML::_('select.genericlist', $cssload, 'position', 'id="position" class="inputbox" size="1" style="width:120px"', 'value', 'text', @$row2->position ? $row2->position : '0' );
    $lists['tree_align'] = JHTML::_('select.genericlist', $cssload, 'position', 'id="position" onchange="doTreeAlign(this);" class="inputbox" size="1" style="width:120px"', 'value', 'text', @$row2->position ? $row2->position : '0' );

    $cssload = array();
    //$cssload[]= JHTML::_('select.option', '', 'Select Menu Item Group' );
    $cssload[] = JHTML::_('select.option', 'active', _SW_AUTO_SELECT);
    $cssload[] = JHTML::_('select.option', 'all', _SW_AUTO_ALL_SELECT);
    $cssload[] = JHTML::_('select.option', 'top', _SW_AUTO_TOP_SELECT);
    $cssload[] = JHTML::_('select.option', 'sub', _SW_AUTO_SUB_SELECT);
    $cssload[] = JHTML::_('select.option', 'parent', _SW_AUTO_FOLDER_SELECT);
    $cssload[] = JHTML::_('select.option', 'child', _SW_AUTO_DOCUMENT_SELECT);
    $lists['autoassign'] = JHTML::_('select.genericlist', $cssload, 'autoassign', 'id="autoassign" class="inputbox" onchange="doSelectChange();" size="1" style="width:200px"', 'value', 'text');

    $cssload = array();
    $cssload[] = JHTML::_('select.option', '', _SW_ATTRIBUTE_SELECT);
    $cssload[] = JHTML::_('select.option', 'image1', _SW_ATTRIBUTE_IMAGE_SELECT);
    $cssload[] = JHTML::_('select.option', 'image2', _SW_ATTRIBUTE_OVER_IMAGE_SELECT);
    $cssload[] = JHTML::_('select.option', 'showname', _SW_ATTRIBUTE_SHOW_NAME_SELECT);
    $cssload[] = JHTML::_('select.option', 'dontshowname', _SW_ATTRIBUTE_DONT_SHOW_NAME_SELECT);
    $cssload[] = JHTML::_('select.option', 'imageleft', _SW_ATTRIBUTE_IMAGE_LEFT_SELECT);
    $cssload[] = JHTML::_('select.option', 'imageright', _SW_ATTRIBUTE_IMAGE_RIGHT_SELECT);
    $cssload[] = JHTML::_('select.option', 'islink', _SW_ATTRIBUTE_IS_LINK_SELECT);
    $cssload[] = JHTML::_('select.option', 'isnotlink', _SW_ATTRIBUTE_IS_NOT_LINK_SELECT);
    $cssload[] = JHTML::_('select.option', 'showitem', _SW_ATTRIBUTE_SHOW_ITEM_SELECT);
    $cssload[] = JHTML::_('select.option', 'dontshowitem', _SW_ATTRIBUTE_DONT_SHOW_ITEM_SELECT);
    $cssload[] = JHTML::_('select.option', 'normalcss', _SW_ATTRIBUTE_CSS_SELECT);
    $cssload[] = JHTML::_('select.option', 'overcss', _SW_ATTRIBUTE_OVER_CSS_SELECT);
    $lists['autoattrib'] = JHTML::_('select.genericlist', $cssload, 'autoattrib', 'id="autoattrib" class="inputbox" onchange="doImageChange();" size="1" style="width:200px"', 'value', 'text');

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'after', _SW_AFTER);
    $cssload[] = JHTML::_('select.option', 'before', _SW_BEFORE);
    $cssload[] = JHTML::_('select.option', 'tooltip', _SW_TOOLTIP);
    $lists['html_position'] = JHTML::_('select.genericlist', $cssload, 'tree-html_position', 'id="tree-html_position" onchange="treeInfoUpdate();" class="inputbox" size="1" style="width:130px"', 'value', 'text', '');



    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'left', 'left');
    $cssload[] = JHTML::_('select.option', 'right', 'right');
    if($row2->menustyle=="accordtransmenu"){
        $lists['levelx_align'] = JHTML::_('select.genericlist', $cssload, 'levelx_align', 'id="levelx_align" class="inputbox" size="1" style="width:120px"', 'value', 'text', @$row2->levelx_align);
}
    
    
    
    $cssload[] = JHTML::_('select.option', 'center', 'center');
    $cssload[] = JHTML::_('select.option', 'auto', 'auto');
    $cssload[] = JHTML::_('select.option', 'inline', 'inline');
    $lists['level1_align'] = JHTML::_('select.genericlist', $cssload, 'level1_align', 'id="level1_align" class="inputbox" size="1" style="width:120px"', 'value', 'text', @$row2->level1_align);

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'complete', 'complete menu');
    $cssload[] = JHTML::_('select.option', 'top', 'top Menu');
    $cssload[] = JHTML::_('select.option', 'variable', 'variable');
    //$cssload[]= JHTML::_('select.option', 'auto', 'Auto' );
    // $cssload[]= JHTML::_('select.option', 'inline', 'Inline' );
    $lists['level1_width'] = JHTML::_('select.genericlist', $cssload, 'level1_width', 'id="level1_width" class="inputbox" size="1" style="width:120px"', 'value', 'text', @$row2->level1_width);


    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'left top', 'left top');
    $cssload[] = JHTML::_('select.option', 'left center', 'left center');
    $cssload[] = JHTML::_('select.option', 'left bottom', 'left bottom');
    $cssload[] = JHTML::_('select.option', 'right top', 'right top');
    $cssload[] = JHTML::_('select.option', 'right center', 'right center');
    $cssload[] = JHTML::_('select.option', 'right bottom', 'right bottom');
    $cssload[] = JHTML::_('select.option', 'center top', 'center top');
    $cssload[] = JHTML::_('select.option', 'center center', 'center center');
    $cssload[] = JHTML::_('select.option', 'center bottom', 'center bottom');
     if($menustyle=="treemenu" || $menustyle=="treeview"){
    $lists['complete_background_position'] = JHTML::_('select.genericlist', $cssload, 'complete_background_position', 'id="complete_background_position" class="inputbox" size="1" onchange="jQuery(\'#menu0\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->complete_background_position ? $row2->complete_background_position : 'left top' );
    $lists['active_background_position'] = JHTML::_('select.genericlist', $cssload, 'active_background_position', 'id="active_background_position" class="inputbox" size="1" onchange="jQuery(\'#top_preview_active\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->active_background_position ? $row2->active_background_position : 'left top' );
    $lists['top_background_position'] = JHTML::_('select.genericlist', $cssload, 'top_background_position', 'id="top_background_position" class="inputbox" size="1" onchange="jQuery(\'.folder\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->top_background_position ? $row2->top_background_position : 'left top' );
    $lists['top_hover_background_position'] = JHTML::_('select.genericlist', $cssload, 'top_hover_background_position', 'id="top_hover_background_position" class="inputbox" size="1" onchange="jQuery(\'#top_preview_hover\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->top_hover_background_position ? $row2->top_hover_background_position : 'left top' );
    $lists['sub_background_position'] = JHTML::_('select.genericlist', $cssload, 'sub_background_position', 'id="sub_background_position" class="inputbox" size="1" onchange="jQuery(\'.file\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->sub_background_position ? $row2->sub_background_position : 'left top' );
    $lists['sub_hover_background_position'] = JHTML::_('select.genericlist', $cssload, 'sub_hover_background_position', 'id="sub_hover_background_position" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.level1.hover\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->sub_hover_background_position ? $row2->sub_hover_background_position : 'left top' );
   
         
         }else{
    $lists['complete_background_position'] = JHTML::_('select.genericlist', $cssload, 'complete_background_position', 'id="complete_background_position" class="inputbox" size="1" onchange="jQuery(\'#top_preview_outer\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->complete_background_position ? $row2->complete_background_position : 'left top' );
    $lists['active_background_position'] = JHTML::_('select.genericlist', $cssload, 'active_background_position', 'id="active_background_position" class="inputbox" size="1" onchange="jQuery(\'#top_preview_active\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->active_background_position ? $row2->active_background_position : 'left top' );
    $lists['top_background_position'] = JHTML::_('select.genericlist', $cssload, 'top_background_position', 'id="top_background_position" class="inputbox" size="1" onchange="jQuery(\'.top_preview.normal\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->top_background_position ? $row2->top_background_position : 'left top' );
    $lists['top_hover_background_position'] = JHTML::_('select.genericlist', $cssload, 'top_hover_background_position', 'id="top_hover_background_position" class="inputbox" size="1" onchange="jQuery(\'#top_preview_hover\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->top_hover_background_position ? $row2->top_hover_background_position : 'left top' );
    $lists['sub_background_position'] = JHTML::_('select.genericlist', $cssload, 'sub_background_position', 'id="sub_background_position" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.level1.normal\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->sub_background_position ? $row2->sub_background_position : 'left top' );
    $lists['sub_hover_background_position'] = JHTML::_('select.genericlist', $cssload, 'sub_hover_background_position', 'id="sub_hover_background_position" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.level1.hover\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->sub_hover_background_position ? $row2->sub_hover_background_position : 'left top' );
    $lists['levelx_sub_background_position'] = JHTML::_('select.genericlist', $cssload, 'levelx_sub_background_position', 'id="levelx_sub_background_position" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.levelx.normal\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->levelx_sub_background_position ? $row2->levelx_sub_background_position : 'left top' );
    $lists['levelx_sub_hover_background_position'] = JHTML::_('select.genericlist', $cssload, 'levelx_sub_hover_background_position', 'id="levelx_sub_hover_background_position" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.levelx.hover\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->levelx_sub_hover_background_position ? $row2->levelx_sub_hover_background_position : 'left top' );
    $lists['sub_active_background_position'] = JHTML::_('select.genericlist', $cssload, 'sub_active_background_position', 'id="sub_active_background_position" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.level1.active\').css(\'background-position\',this.value);" style="width:120px"', 'value', 'text', @$row2->sub_active_background_position ? $row2->sub_active_background_position : 'left top' );
}

    $cssload = array();
    $cssload[] = JHTML::_('select.option', 'repeat', 'repeat');
    $cssload[] = JHTML::_('select.option', 'repeat-x', 'repeat-x');
    $cssload[] = JHTML::_('select.option', 'repeat-y', 'repeat-y');
    $cssload[] = JHTML::_('select.option', 'no-repeat', 'no-repeat');
    if($menustyle=="treemenu" || $menustyle=="treeview"){
    $lists['complete_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'complete_background_repeat', 'id="complete_background_repeat" class="inputbox" size="1" onchange="jQuery(\'#menu0\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->complete_background_repeat ? $row2->complete_background_repeat : 'repeat' );
    $lists['active_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'active_background_repeat', 'id="active_background_repeat" class="inputbox" size="1" onchange="jQuery(\'#top_preview_active\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->active_background_repeat ? $row2->active_background_repeat : 'repeat' );
    $lists['top_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'top_background_repeat', 'id="top_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.folder\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->top_background_repeat ? $row2->top_background_repeat : 'repeat' );
    $lists['top_hover_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'top_hover_background_repeat', 'id="top_hover_background_repeat" class="inputbox" size="1" onchange="jQuery(\'#top_preview_hover\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->top_hover_background_repeat ? $row2->top_hover_background_repeat : 'repeat' );
    $lists['sub_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'sub_background_repeat', 'id="sub_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.file\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->sub_background_repeat ? $row2->sub_background_repeat : 'repeat' );
    $lists['sub_hover_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'sub_hover_background_repeat', 'id="sub_hover_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.level1.hover\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->sub_hover_background_repeat ? $row2->sub_hover_background_repeat : 'repeat' );
   
        
        }else{
    $lists['complete_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'complete_background_repeat', 'id="complete_background_repeat" class="inputbox" size="1" onchange="jQuery(\'#top_preview_outer\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->complete_background_repeat ? $row2->complete_background_repeat : 'repeat' );
    $lists['active_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'active_background_repeat', 'id="active_background_repeat" class="inputbox" size="1" onchange="jQuery(\'#top_preview_active\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->active_background_repeat ? $row2->active_background_repeat : 'repeat' );
    $lists['top_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'top_background_repeat', 'id="top_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.top_preview.normal\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->top_background_repeat ? $row2->top_background_repeat : 'repeat' );
    $lists['top_hover_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'top_hover_background_repeat', 'id="top_hover_background_repeat" class="inputbox" size="1" onchange="jQuery(\'#top_preview_hover\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->top_hover_background_repeat ? $row2->top_hover_background_repeat : 'repeat' );
    $lists['sub_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'sub_background_repeat', 'id="sub_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.level1.normal\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->sub_background_repeat ? $row2->sub_background_repeat : 'repeat' );
    $lists['sub_hover_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'sub_hover_background_repeat', 'id="sub_hover_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.level1.hover\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->sub_hover_background_repeat ? $row2->sub_hover_background_repeat : 'repeat' );
    $lists['levelx_sub_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'levelx_sub_background_repeat', 'id="levelx_sub_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.levelx.normal\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->levelx_sub_background_repeat ? $row2->levelx_sub_background_repeat : 'repeat' );
    $lists['levelx_sub_hover_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'levelx_sub_hover_background_repeat', 'id="levelx_sub_hover_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.levelx.hover\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->levelx_sub_hover_background_repeat ? $row2->levelx_sub_hover_background_repeat : 'repeat' );
    $lists['sub_active_background_repeat'] = JHTML::_('select.genericlist', $cssload, 'sub_active_background_repeat', 'id="sub_active_background_repeat" class="inputbox" size="1" onchange="jQuery(\'.sub_preview.level1.active\').css(\'background-repeat\',this.value);" style="width:100px"', 'value', 'text', @$row2->sub_active_background_repeat ? $row2->sub_active_background_repeat : 'repeat' );
}
    $cssload = array();

    if ($menustyle == "transmenu" || $menustyle == "gosumenu" || $menustyle == "columnmenu") {
        $cssload[] = JHTML::_('select.option', 'horizontal/down', 'horizontal/down/right');
        $cssload[] = JHTML::_('select.option', 'vertical/right', 'vertical/right');
        $cssload[] = JHTML::_('select.option', 'horizontal/up', 'horizontal/up');
        $cssload[] = JHTML::_('select.option', 'vertical/left', 'vertical/left');
        $cssload[] = JHTML::_('select.option', 'horizontal/left', 'horizontal/down/left');
    } else if (($menustyle == "slideclick") || $menustyle == "accordian") {
        //$cssload[]= mosHTML::makeOption( 'horizontal/', 'horizontal/down' );
        $cssload[] = JHTML::_('select.option', 'vertical', 'vertical');
        //$cssload[]= JHTML::_('select.option', 'horizontal/h', 'horizontal/horizontal' );
        //$cssload[]= JHTML::_('select.option', 'horizontal/d', 'horizontal/down' );
    } else if ($menustyle == "clicktransmenu") {
        //$cssload[]= mosHTML::makeOption( 'horizontal/down', 'horizontal/down' );
        $cssload[] = JHTML::_('select.option', 'vertical/right', 'vertical/right');
        //$cssload[]= mosHTML::makeOption( 'horizontal/up', 'horizontal/up' );
        $cssload[] = JHTML::_('select.option', 'vertical/left', 'vertical/left');
    } elseif ($menustyle == "multitabmenu") {
        //$cssload[]= mosHTML::makeOption( 'horizontal/down', 'horizontal/down' );
        $cssload[] = JHTML::_('select.option', 'horizontal/right', 'right');
        //$cssload[]= mosHTML::makeOption( 'horizontal/up', 'horizontal/up' );
        $cssload[] = JHTML::_('select.option', 'horizontal/left', 'left');
    } else {
        $cssload[] = JHTML::_('select.option', 'horizontal', 'horizontal');
        $cssload[] = JHTML::_('select.option', 'vertical', 'vertical');
    }


    $lists['orientation'] = JHTML::_('select.genericlist', $cssload, 'orientation', 'id="orientation" onchange="change_orientation();" class="inputbox" size="1" style="width:120px"', 'value', 'text', @$row2->orientation ? $row2->orientation : '0' );

    $basedir = $absolute_path . "/modules/mod_swmenupro/fonts/";
    $handle = opendir($basedir);
    $font = array();
    $font[] = JHTML::_('select.option', "", "None");
    while ($file = readdir($handle)) {
        if ($file == "." || $file == ".." || $file == "default.ini") {
            
        } else {
            $filename = file_get_contents('' . $absolute_path . '/modules/mod_swmenupro/fonts/' . $file . '');
            $pos_start = strpos($filename, "font-family") + 14;
            $pos_end = strpos($filename, "\"", $pos_start) - $pos_start;
            $fontname = substr($filename, $pos_start, $pos_end);
            $font[] = JHTML::_('select.option', $file, $fontname);
        }
    }
    $lists['topTTF'] = JHTML::_('select.genericlist', $font, 'top_ttf', 'id="top_ttf" onchange="do_top_ttf();" class="inputbox" size="1" style="width:200px"', 'value', 'text', @$row2->top_ttf);
    $lists['subTTF'] = JHTML::_('select.genericlist', $font, 'sub_ttf', 'id="sub_ttf" onchange="do_sub_ttf();" class="inputbox" size="1" style="width:200px"', 'value', 'text', @$row2->sub_ttf);
    $lists['levelx_subTTF'] = JHTML::_('select.genericlist', $font, 'levelx_sub_ttf', 'id="levelx_sub_ttf" onchange="do_sub_ttf2();" class="inputbox" size="1" style="width:200px"', 'value', 'text', @$row2->levelx_sub_ttf);

    closedir($handle);
//echo $menustyle;
    
    $row2->limit = intval(JRequest::getVar('limit', 30));
$row2->limitstart = intval(JRequest::getVar('limitstart', 0));

    switch ($menustyle) {

        case "clickmenu":
        case "accordian":
        case "popoutmenu":
        case "superfishmenu":
        case "transmenu":
        case "gosumenu":
            require_once( JPATH_COMPONENT . "/admin.popouts.html.php");
            popoutMenuConfig($row2, $row, $ordered, $lists, $menuitems);
            HTML_swmenupro::footer();
            break;

        case "treemenu":
        case "treeview":
            require_once( JPATH_COMPONENT . "/admin.tree.html.php");
            treeMenuConfig($row2, $row, $ordered, $lists, $menuitems);
            HTML_swmenupro::footer();
            break;

        case "multitabmenu":
        case "clicktransmenu":
        case "accordtransmenu":
        case "columnmenu":
            require_once( JPATH_COMPONENT . "/admin.multi.html.php");
            multiMenuConfig($row2, $row, $ordered, $lists, $menuitems);
            HTML_swmenupro::footer();
            break;
    }
}

function saveconfig() {

    $database = &JFactory::getDBO();
    $id = JRequest::getVar('id', 0);
    $returntask = JRequest::getVar('returntask', 'save');
    $msg = _SW_SAVE_MENU_MESSAGE;
    $menutype=JRequest::getVar('menutype', 'mainmenu');

     $row = & JTable::getInstance('module');
        $row->load($id);
        $row->checkin();
    $style = "";

    reset($_POST);
    while (list ($key, $val) = each($_POST)) {

        if (substr($key, 0, 8) != ("ocsstype") && substr($key, 0, 8) != ("ncsstype") && substr($key, 0, 11) != ("globalimage") && substr($key, 0, 5) != ("tree-") && $key != "php_out") {
            if ($key == "preview") {
                $val = 0;
            }
             if ($key == "menuname") {
                $val = $menutype;
            }
            $style.= $key . "=" . $val . "\n";
        }
    }

    $database->setQuery("SELECT COUNT(*) FROM #__swmenupro_styles WHERE moduleid=" . $id);
    $database->query();
    $count = $database->loadResult();

    if (($count)) {
        $database->setQuery("UPDATE #__swmenupro_styles SET params='" . $style . "' WHERE moduleid = " . $id);
        $database->query();
    } else {

        $database->setQuery("INSERT INTO #__swmenupro_styles VALUES ('','" . $id . "','" . $style . "')");

        $database->query();
    }





    $data2 = strval(JRequest::getVar('php_out', ""));
    $data3 = explode("}}", $data2);

    for ($i = 0; $i < (count($data3) - 1); $i++) {
        $data4 = explode("~~", $data3[$i]);
        $item = $data4[23];
        $normal_css = $data4[20];
        $custom_html = urldecode($data4[24]);
        $html_position = $data4[25];
        //echo $normal_css;
        $over_css = $data4[21];
        $showitem = $data4[22];
        $targetlevel = $data4[6];
       // echo $data4[6] . "<br>" . $item;
        //$image= ( mosGetParam( $_REQUEST, trim($data4[0]."-image"), "" ) );
        if ($data4[8]) {
            $image = substr($data4[8], 3) . "," . $data4[10] . "," . $data4[11] . "," . $data4[13] . "," . $data4[12];
        } else {

            $image = "";
        }
        $showname = $data4[18];
        $imagealign = $data4[19];
        if ($data4[9]) {
            $imageover = substr($data4[9], 3) . "," . $data4[14] . "," . $data4[15] . "," . $data4[17] . "," . $data4[16];
        } else {
            $imageover = "";
        }

        //$targetlevel=1;

        $database->setQuery("SELECT COUNT(*) FROM #__swmenu_extended WHERE menu_id='" . $item . "' AND moduleID='" . $id . "'");
        $database->query();
        $exists = $database->loadResult();
        if ($exists && $item) {

            $database->setQuery("UPDATE #__swmenu_extended SET image ='" . $image . "', image_over='" . $imageover . "', show_name='" . $showname . "', image_align='" . $imagealign . "', target_level='" . $targetlevel . "', normal_css='" . $normal_css . "', over_css='" . $over_css . "', show_item='" . $showitem . "', custom_html='" . $custom_html . "', html_position='" . $html_position . "' WHERE menu_id='" . $item . "' AND moduleID='" . $id . "'");
            $database->query();
        } elseif ($item) {

            $database->setQuery("INSERT INTO #__swmenu_extended VALUES ('','" . $item . "','" . $image . "','" . $imageover . "','" . $id . "','" . $showname . "','" . $imagealign . "','" . $targetlevel . "','" . $normal_css . "','" . $over_css . "','" . $showitem . "','','" . $custom_html . "','" . $html_position . "')");
            $database->query();
        }
    }








    if ($returntask == 'export') {
        $msg = exportMenu($id);
    }

    sleep(3);
    
 
    echo "<div id=\"successful\"><div id=\"sw_dialog\" >
		$msg</div></div>\n";
    if ($returntask == 'save') {
        JToolbarHelper::title(JText::_('swMenuPro: Menu Module Manager'));
        showModules();
    } else {
        //echo "hello";
        JToolbarHelper::title(JText::_('swMenuPro: Menu Module Editor'));
        editDhtmlMenu();
    }
}

function exportMenu($id) {

    $absolute_path = JPATH_ROOT;
    $database = &JFactory::getDBO();
    include_once( $absolute_path . "/modules/mod_swmenupro/styles.php");
    $css = "";
    $swmenupro = array();
    $sql = "SELECT * FROM #__swmenupro_styles where moduleid=$id";
    $database->setQuery($sql);
    $swmenupro_obj = $database->loadObject();
    if ($swmenupro_obj) {
        $temp_array = sw_stringToObject($swmenupro_obj->params);
        while (list ($key, $val) = each($temp_array)) {
            $swmenupro[$key] = $val;
        }
    }

    $swmenupro_array = array();

    $swmenupro_array = swGetMenuLinks2($swmenupro['menuname'], $id, $swmenupro['hybrid'], $swmenupro['tables']);

    if (count($swmenupro_array)) {

        $ordered = chain2('ID', 'PARENT', 'ORDER', $swmenupro_array, ($swmenupro['parentid'] ? $swmenupro['parentid'] : 1), 25);
    }

    switch ($swmenupro['menustyle']) {

        case "treemenu":
            $css = TreeMenuStyle($swmenupro, $ordered);
            break;
        case "treeview":
            $css = mygosuTreeMenuStyle($swmenupro, $ordered);
            break;
        case "gosumenu":
            $css = gosuMenuStyle($swmenupro, $ordered);
            break;
        case "transmenu":
            $css = transMenuStyle($swmenupro, $ordered);
            break;

        case "multitabmenu":
            $css = multitabmenuStyle($swmenupro, $ordered);
            break;
        case "accordtransmenu":
            $css = AccordTransMenuStyle($swmenupro, $ordered);
            break;
        case "columnmenu":
            $css = columnMenuStyle($swmenupro, $ordered);
            break;
        case "slideclick":
            $css = SlideClickStyle($swmenupro, $ordered);
            break;
        case "superfishmenu":
            $css = superfishMenuStyle($swmenupro, $ordered);
            break;
        case "accordian":
            $css = AccordianStyle($swmenupro, $ordered);
            break;

        case "dynamictabmenu":
            $css = dynamicTabMenuStyle($swmenupro, $ordered);
            break;
    }


    $file = $absolute_path . "/modules/mod_swmenupro/styles/menu" . $id . ".css";
    if (!file_exists($file)) {
        touch($file);
        $handle = fopen($file, 'w'); // Let's open for read and write
    } else {
        $handle = fopen($file, 'w'); // Let's open for read and write
    }
    rewind($handle); // Go back to the beginning

    if (fwrite($handle, $css)) {
        $msg = _SW_SAVE_MENU_CSS_MESSAGE;
    } else {
        $msg = _SW_NO_SAVE_MENU_CSS_MESSAGE;
    } // Don't forget to increment the counter

    fclose($handle); // Done


    return $msg;
}

function saveCSS() {


    $absolute_path = JPATH_ROOT;
    $returntask = JRequest::getVar('returntask', "showmodules");
    $css = JRequest::getVar('filecontent', "");
    $id = JRequest::getVar('mid', 0);

    $css = str_replace('\\', '', $css);
    $file = $absolute_path . "/modules/mod_swmenupro/styles/menu" . $id . ".css";
    if (!file_exists($file)) {
        touch($file);
        $handle = fopen($file, 'w'); // Let's open for read and write
    } else {
        $handle = fopen($file, 'w'); // Let's open for read and write
    }
    rewind($handle); // Go back to the beginning

    fwrite($handle, $css); // Don't forget to increment the counter
    fclose($handle); // Done
    //echo $css;
    $limit = intval(JRequest::getVar('limit', 10));
    $limitstart = intval(JRequest::getVar('limitstart', 0));
    $msg = _SW_SAVE_CSS_MESSAGE;



    echo "<div id=\"successful\"><div id=\"sw_dialog\" >
		$msg</div></div>\n";
    //echo $row->id;
    //editCSS($id, $option);
//editDhtmlMenu($moduleID, $option);
    if ($returntask == "editCSS") {
        sleep(3);
         JToolbarHelper::title(JText::_('swMenuPro: Manual CSS Editor'));
        editCSS();
        //$mainframe->redirect( "index.php?task=$returntask&option=$option&limit=$limit&limitstart=$limitstart&id=$id",$msg );
    } else {
        JToolbarHelper::title(JText::_('swMenuPro: Menu Module Manager'));
        showModules();
    }
}

function editCSS() {

    $absolute_path = JPATH_ROOT;
    $database = &JFactory::getDBO();
    $id = JRequest::getVar('id', 0);


    $swmenupro = array();
    $sql = "SELECT * FROM #__swmenupro_styles where moduleid=$id";
    $database->setQuery($sql);
    $swmenupro_obj = $database->loadObject();
    if ($swmenupro_obj) {
        $temp_array = sw_stringToObject($swmenupro_obj->params);
        while (list ($key, $val) = each($temp_array)) {
            $swmenupro[$key] = $val;
        }
    }

    $file = $absolute_path . '/modules/mod_swmenupro/styles/menu' . $id . '.css';


    if ($fp = fopen($file, 'r')) {
        $content = fread($fp, filesize($file));
        //$content = htmlspecialchars( $content );
        $limit = intval(JRequest::getVar('limit', 10));
        $limitstart = intval(JRequest::getVar('limitstart', 0));

        HTML_swmenupro::editCSS($id, $content, $limit, $limitstart, $swmenupro);
        HTML_swmenupro::footer();
    } else {
        header('location:index.php?option=' . $option . '&client=' . $client, 'Operation Failed: Could not open' . $file);
    }
}

function chain2($primary_field, $parent_field, $sort_field, $rows, $root_id = 0, $maxlevel = 25) {
    $c = new chain2($primary_field, $parent_field, $sort_field, $rows, $root_id, $maxlevel);
    return $c->chain2menu_table;
}

class chain2 {

    var $table;
    var $rows;
    var $chain2menu_table;
    var $primary_field;
    var $parent_field;
    var $sort_field;

    function chain2($primary_field, $parent_field, $sort_field, $rows, $root_id, $maxlevel) {
        $this->rows = $rows;
        $this->primary_field = $primary_field;
        $this->parent_field = $parent_field;
        $this->sort_field = $sort_field;
        $this->buildchain2($root_id, $maxlevel);
    }

    function buildchain2($rootcatid, $maxlevel) {
        $row_array = array_values($this->rows);
        $row_array_size = sizeOf($row_array);
        for ($i = 0; $i < $row_array_size; $i++) {
            $row = $row_array[$i];
            $this->table[$row[$this->parent_field]][$row[$this->primary_field]] = $row;
        }
        $this->makeBranch($rootcatid, 0, $maxlevel);
    }

    function makeBranch($parent_id, $level, $maxlevel) {
        $rows = $this->table[$parent_id];
        $key_array1 = array_keys($rows);
        $key_array_size1 = sizeOf($key_array1);
        for ($j = 0; $j < $key_array_size1; $j++) {
        //  foreach($rows as $key=>$value)
            $key = $key_array1[$j];
            $rows[$key]['key'] = $this->sort_field;
        }

        usort($rows, 'chain2menuCMP');
        $row_array = array_values($rows);
        $row_array_size = sizeOf($row_array);
        for ($i = 0; $i < $row_array_size; $i++) {
        // foreach($rows as $item)
            $item = $row_array[$i];
            $item['ORDER'] = ($i + 1);
            $item['indent'] = $level;
            $this->chain2menu_table[] = $item;
            if ((isset($this->table[$item[$this->primary_field]])) && (($maxlevel > $level + 1) || ($maxlevel == 0))) {
                $this->makeBranch($item[$this->primary_field], $level + 1, $maxlevel);
            }
        }
    }

}

function chain2menuCMP($a, $b) {
    if ($a[$a['key']] == $b[$b['key']]) {
        return 0;
    }
    return($a[$a['key']] < $b[$b['key']]) ? -1 : 1;
}

function swmenuTreeRecurse($id, $indent, $list, &$children, $maxlevel = 9999, $level = 0) {
    if (@$children[$id] && $level <= $maxlevel) {
        foreach ($children[$id] as $v) {
            $id = $v->id;
            $txt = $v->title;
            $pt = $v->parent_id;
            $list[$id] = $v;
            $list[$id]->treename = "$indent$txt";
            $list[$id]->children = count(@$children[$id]);
            $list = swmenuTreeRecurse($id, str_repeat("- ", $level + 1), $list, $children, $maxlevel, $level + 1);
        }
    }
    return $list;
}

function swGetMenuLinks2($menu, $id, $hybrid, $use_tables) {
    global $lang, $mbf_content, $my, $absolute_path, $offset, $Itemid;
    $now = date("Y-m-d H:i:s", time() + $offset * 60 * 60);
    $swmenupro_array = array();
    $database = & JFactory::getDBO();
    if ($menu == "swcontentmenu") {

        /*
          $sql =  "SELECT #__sections.* , #__swmenu_extended.*
          FROM #__sections LEFT JOIN #__swmenu_extended ON #__sections.id = #__swmenu_extended.menu_id
          AND (#__swmenu_extended.moduleID = '".$id."' OR #__swmenu_extended.moduleID IS NULL)
          INNER JOIN #__content ON #__content.sectionid = #__sections.id
          AND #__sections.published = 1
          AND ( publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now'  )
          AND ( publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now' )
          ORDER BY #__content.ordering
          ";
          $database->setQuery( $sql   );
          $result = $database->loadObjectList();

          for($i=0;$i<count($result);$i++) {
          $result2=$result[$i];

          if($use_tables){
          $url="index.php?option=com_content&task=section&id=" . $result2->id ;
          }else{
          $url="index.php?option=com_content&task=blogsection&id=" . $result2->id ;
          }

          $swmenupro_array[] =array("TITLE" => $result2->title, "URL" =>  $url , "ID" => $result2->id  , "PARENT" => 0 ,  "ORDER" => $result2->ordering, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0,"ACCESS" => $result2->access,"NCSS" => $result2->normal_css,"OCSS" => $result2->over_css,"SHOWITEM" => $result2->show_item );
          }

         */
        $sql = "SELECT #__categories.* , #__swmenu_extended.* 
                FROM #__categories LEFT JOIN #__swmenu_extended ON (#__categories.id) = #__swmenu_extended.menu_id
                WHERE (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)    
                AND #__categories.published = 1
                AND #__categories.extension='com_content'                
                ORDER BY lft
                ";

        $database->setQuery($sql);
        $result = $database->loadObjectList();

        for ($i = 0; $i < count($result); $i++) {
            $result2 = $result[$i];


            if ($use_tables) {
                $url = "index.php?option=com_content&task=category&id=" . $result2->id;
            } else {
                $url = "index.php?option=com_content&task=blogcategory&id=" . $result2->id;
            }

            $swmenupro_array[] = array("TITLE" => $result2->title, "URL" => $url, "ID" => $result2->id, "PARENT" => $result2->parent_id, "ORDER" => $result2->lft, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => $result2->access, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item);
        }

        $sql = "SELECT #__content.* , #__swmenu_extended.*
                FROM #__content LEFT JOIN #__swmenu_extended ON (#__content.id) = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                INNER JOIN #__categories ON #__content.catid = #__categories.id
                AND #__content.state = 1
                AND ( publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now'  )
                AND ( publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now' )
               ORDER BY #__content.ordering
               ";
        $database->setQuery($sql);
        $result = $database->loadObjectList();

        for ($i = 0; $i < count($result); $i++) {
            $result2 = $result[$i];


            $url = "index.php?option=com_content&task=view&id=" . $result2->id;
            $swmenupro_array[] = array("TITLE" => $result2->title, "URL" => $url, "ID" => $result2->id + 10000, "PARENT" => $result2->catid, "ORDER" => $result2->ordering, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => $result2->access, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item);
        }
    } else if ($menu == "virtuemart" || $menu == "virtueprod") {
        $sql = "SELECT #__vm_category.* , #__swmenu_extended.*,#__vm_category_xref.*
                FROM #__vm_category LEFT JOIN #__swmenu_extended ON #__vm_category.category_id = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                INNER JOIN #__vm_category_xref ON #__vm_category_xref.category_child_id= #__vm_category.category_id
                AND #__vm_category.category_publish = 'Y'
                ORDER BY #__vm_category.list_order
                ";
        $database->setQuery($sql);
        $result = $database->loadObjectList();
        // echo "hello".count($result);
        for ($i = 0; $i < count($result); $i++) {
            $result2 = $result[$i];
            $url = "index.php?option=com_virtuemart&page=shop.browse&category_id=" . $result2->category_id . "&Itemid=" . ($Itemid) . "&swid=" . ($result2->category_id + 10000);
            $swmenupro_array[] = array("TITLE" => $result2->category_name, "URL" => $url, "ID" => ($result2->category_id), "SECURE" => 0, "PARENT" => ($result2->category_parent_id ? (($result2->category_parent_id)) : 0), "ORDER" => $result2->list_order, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => 0, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item);

            if ($menu == "virtueprod") {
                $sql = "SELECT #__vm_product.* , #__swmenu_extended.*,#__vm_product_category_xref.*
                FROM #__vm_product LEFT JOIN #__swmenu_extended ON (#__vm_product.product_id+1000) = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                INNER JOIN #__vm_product_category_xref ON #__vm_product_category_xref.product_id= #__vm_product.product_id
                AND #__vm_product.product_publish = 'Y'
                AND #__vm_product_category_xref.category_id = $result2->category_id
          
                ";
                $database->setQuery($sql);
                $result3 = $database->loadObjectList();
                for ($j = 0; $j < count($result3); $j++) {
                    $result4 = $result3[$j];
                    $url = "index.php?option=com_virtuemart&page=shop.product_details&flypage=shop.flypage&product_id=" . $result4->product_id . "&category_id=" . $result4->category_id . "&manufacturer_id=" . $result4->vendor_id . "&Itemid=" . ($Itemid) . "&swid=" . ($result4->product_id + 100000);
                    $swmenupro_array[] = array("TITLE" => $result4->product_name, "URL" => $url, "ID" => ($result4->product_id + 1000), "SECURE" => 0, "PARENT" => ($result2->category_id ? (($result2->category_id + 1000)) : 0), "ORDER" => $result2->list_order, "IMAGE" => $result4->image, "IMAGEOVER" => $result4->image_over, "SHOWNAME" => $result4->show_name, "IMAGEALIGN" => $result4->image_align, "TARGETLEVEL" => $result4->target_level, "TARGET" => 0, "ACCESS" => 0, "NCSS" => $result4->normal_css, "OCSS" => $result4->over_css, "SHOWITEM" => $result4->show_item);
                }
            }
        }
    } else if ($menu == "virtuemart2" || $menu == "virtueprod2") {
        $sql = "SELECT #__virtuemart_categories_en_gb.* ,#__swmenu_extended.*,#__virtuemart_category_categories.*,#__virtuemart_categories.*
 FROM #__virtuemart_categories,#__virtuemart_categories_en_gb LEFT JOIN #__swmenu_extended ON #__virtuemart_categories_en_gb.virtuemart_category_id+10000 = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                INNER JOIN #__virtuemart_category_categories ON #__virtuemart_category_categories.category_child_id= #__virtuemart_categories_en_gb.virtuemart_category_id
                WHERE #__virtuemart_categories.virtuemart_category_id=#__virtuemart_categories_en_gb.virtuemart_category_id
                AND #__virtuemart_categories.published='1'
                ORDER BY #__virtuemart_categories.ordering
                ";
        $database->setQuery($sql);
        $result = $database->loadObjectList();
        // echo "helo".count($result);
        for ($i = 0; $i < count($result); $i++) {
            $result2 = $result[$i];
            $url = "index.php?option=com_virtuemart&view=category&virtuemart_category_id=" . $result2->virtuemart_category_id;
            $swmenupro_array[] = array("TITLE" => $result2->category_name, "URL" => $url, "ID" => ($result2->virtuemart_category_id + 10000), "SECURE" => 0, "PARENT" => ($result2->category_parent_id ? (($result2->category_parent_id + 10000)) : 0), "ORDER" => $result2->ordering, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => 0, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item);

            if ($menu == "virtueprod2") {
                $sql = "SELECT #__virtuemart_products_en_gb.*,#__swmenu_extended.* ,#__virtuemart_product_categories.*,#__virtuemart_products.*
                FROM #__virtuemart_products,#__virtuemart_products_en_gb LEFT JOIN #__swmenu_extended ON #__virtuemart_products_en_gb.virtuemart_product_id+100000 = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                INNER JOIN #__virtuemart_product_categories ON #__virtuemart_product_categories.virtuemart_product_id= #__virtuemart_products_en_gb.virtuemart_product_id
                WHERE #__virtuemart_products.virtuemart_product_id=#__virtuemart_products_en_gb.virtuemart_product_id
                AND #__virtuemart_product_categories.virtuemart_category_id = $result2->virtuemart_category_id
                AND #__virtuemart_products.published='1'
                
          
                ";
                $database->setQuery($sql);
                $result3 = $database->loadObjectList();
                // echo count($result3);
                for ($j = 0; $j < count($result3); $j++) {
                    $result4 = $result3[$j];
                    $url = "index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=" . $result4->virtuemart_product_id . "&virtuemart_category_id=" . $result4->virtuemart_category_id;
                    $swmenupro_array[] = array("TITLE" => $result4->product_name, "URL" => $url, "ID" => ($result4->virtuemart_product_id + 100000), "SECURE" => 0, "PARENT" => ($result2->virtuemart_category_id ? (($result2->virtuemart_category_id + 10000)) : 0), "ORDER" => $result2->ordering, "IMAGE" => $result4->image, "IMAGEOVER" => $result4->image_over, "SHOWNAME" => $result4->show_name, "IMAGEALIGN" => $result4->image_align, "TARGETLEVEL" => $result4->target_level, "TARGET" => 0, "ACCESS" => 0, "NCSS" => $result4->normal_css, "OCSS" => $result4->over_css, "SHOWITEM" => $result4->show_item);
                }
            }
        }
    } else if ($menu == "mosetstree") {
        $sql = "SELECT #__mt_cats.* , #__swmenu_extended.*
                FROM #__mt_cats LEFT JOIN #__swmenu_extended ON #__mt_cats.cat_id = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                AND #__mt_cats.cat_approved = '1'
                AND #__mt_cats.cat_published = '1'
                AND #__mt_cats.cat_links > 0
                ORDER BY #__mt_cats.ordering
                ";
        $database->setQuery($sql);
        $result = $database->loadObjectList();

        for ($i = 0; $i < count($result); $i++) {
            $result2 = $result[$i];
            $url = "index.php?option=com_mtree&task=listcats&cat_id=" . $result2->cat_id . "&Itemid=" . ($Itemid);
            $swmenupro_array[] = array("TITLE" => $result2->cat_name, "URL" => $url, "ID" => $result2->cat_id, "PARENT" => $result2->cat_parent, "ORDER" => $result2->ordering, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => 0, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item);
        }
    } else {
        if ($hybrid) {
            $sql = "SELECT #__content.*,#__swmenu_extended.* 
                FROM #__content LEFT JOIN #__swmenu_extended ON (#__content.id+100000) = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                INNER JOIN #__categories ON #__content.catid = #__categories.id
                AND #__content.state = 1
                AND ( publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now'  )
                AND ( publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now' )
              
                ORDER BY #__content.catid,#__content.ordering
                ";
            $database->setQuery($sql);
            $hybrid_content = $database->loadObjectList();
            //print_r($hybrid_content);


            $sql = "SELECT #__categories.id,#__categories.title,#__categories.parent_id,#__categories.lft,#__categories.published,#__categories.access,#__swmenu_extended.* 
                FROM #__categories LEFT JOIN #__swmenu_extended ON (#__categories.id+10000) = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "'OR #__swmenu_extended.moduleID IS NULL)
                WHERE #__categories.published =1
                AND #__categories.extension='com_content'
               
                ORDER BY #__categories.lft
                ";
            $database->setQuery($sql);
            $hybrid_cat = $database->loadObjectList();
            //print_r($hybrid_cat);
            //print_r($hybrid_cat);
            //echo $hybrid_cat[1]->published;	
        }

        $sql = "SELECT #__menu.* , #__swmenu_extended.*
                FROM #__menu LEFT JOIN #__swmenu_extended ON #__menu.id = #__swmenu_extended.menu_id
                AND (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                WHERE #__menu.menutype = '" . $menu . "' AND published = '1'
                ORDER BY parent_id
            ";

        $database->setQuery($sql);
        $result = $database->loadObjectList();

        $swmenupro_array = array();

        for ($i = 0; $i < count($result); $i++) {
            $result2 = $result[$i];


            switch ($result2->type) {


                case 'url':
                    if (preg_match("/index.php\?/i", $result2->link)) {
                        if (!preg_match("/Itemid=/i", $result2->link)) {
                            $result2->link .= "&Itemid=$result2->id";
                        }
                    }
                    break;

                default:
                    $result2->link .= "&Itemid=$result2->id";
                    break;
            }
            $swmenupro_array[] = array("TITLE" => $result2->title, "URL" => $result2->link, "ID" => $result2->id, "PARENT" => $result2->parent_id, "ORDER" => $result2->lft, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => $result2->browserNav, "ACCESS" => $result2->access, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item, "HTML" => $result2->custom_html, "HTML_POSITION" => $result2->html_position);

            if ($hybrid) {
                $opt = array();
                parse_str($result2->link, $opt);
                $opt['view'] = @$opt['view'] ? $opt['view'] : 0;
                $opt['id'] = @$opt['id'] ? $opt['id'] : 0;

                //echo $opt['id'];

                if ($opt['view'] == "category" || $opt['view'] == "categories") {
                    //echo "hello";

                    for ($j = 0; $j < count($hybrid_content); $j++) {
                        $row = $hybrid_content[$j];
                        //echo $row->catid;
                        if ($row->catid == $opt['id']) {
                            //echo "hello";
                            $url = "index.php?option=com_content&view=article&catid=" . $row->catid . "&id=" . $row->id . "&Itemid=" . $result2->id;
                            $swmenupro_array[] = array("TITLE" => $row->title, "URL" => $url, "ID" => $row->id + 100000, "PARENT" => $result2->id, "ORDER" => $row->ordering, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0, "ACCESS" => $row->access, "NCSS" => $row->normal_css, "OCSS" => $row->over_css, "SHOWITEM" => $row->show_item);
                        }
                    }

                    for ($j = 0; $j < count($hybrid_cat); $j++) {
                        $row = $hybrid_cat[$j];
                        if ($row->parent_id == $opt['id'] && $opt['id']) {
                            //$j=count($hybrid_cat);

                            if (!$use_tables) {
                                $url = "index.php?option=com_content&view=category&id=" . $row->id . "&Itemid=" . $result2->id;
                            } else {
                                $url = "index.php?option=com_content&view=category&layout=blog&id=" . $row->id . "&Itemid=" . $result2->id;
                            }
                            $swmenupro_array[] = array("TITLE" => $row->title, "URL" => $url, "ID" => $row->id + 10000, "PARENT" => $result2->id, "ORDER" => $row->lft, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0, "ACCESS" => $row->access, "NCSS" => $row->normal_css, "OCSS" => $row->over_css, "SHOWITEM" => $row->show_item);

                            for ($n = 0; $n < count($hybrid_cat); $n++) {
                                $row3 = $hybrid_cat[$n];
                                if ($row3->parent_id == $row->id) {
                                    //echo "hello";	
                                    if (!$use_tables) {
                                        $url = "index.php?option=com_content&view=category&id=" . $row3->id . "&Itemid=" . $result2->id;
                                    } else {
                                        $url = "index.php?option=com_content&view=category&layout=blog&id=" . $row3->id . "&Itemid=" . $result2->id;
                                    }
                                    $swmenupro_array[] = array("TITLE" => $row3->title, "URL" => $url, "ID" => $row3->id + 10000, "PARENT" => $row->id + 10000, "ORDER" => $row->lft, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0, "ACCESS" => $row->access, "NCSS" => $row->normal_css, "OCSS" => $row->over_css, "SHOWITEM" => $row->show_item);
                                    for ($k = 0; $k < count($hybrid_content); $k++) {
                                        $row2 = $hybrid_content[$k];
                                        if ($row2->catid == $row3->id) {

                                            $url = "index.php?option=com_content&view=article&catid=" . $row->id . "&id=" . $row2->id . "&Itemid=" . $result2->id;
                                            $swmenupro_array[] = array("TITLE" => $row2->title, "URL" => $url, "ID" => $row2->id + 100000, "PARENT" => $row3->id + 10000, "ORDER" => $row2->ordering, "IMAGE" => $row2->image, "IMAGEOVER" => $row2->image_over, "SHOWNAME" => $row2->show_name, "IMAGEALIGN" => $row2->image_align, "TARGETLEVEL" => $row2->target_level, "TARGET" => 0, "ACCESS" => $row2->access, "NCSS" => $row2->normal_css, "OCSS" => $row2->over_css, "SHOWITEM" => $row2->show_item);
                                        }
                                    }
                                    for ($m = 0; $m < count($hybrid_cat); $m++) {
                                        $row4 = $hybrid_cat[$m];
                                        if ($row4->parent_id == $row3->id) {
                                            //echo "hello";	
                                            if (!$use_tables) {
                                                $url = "index.php?option=com_content&view=category&id=" . $row4->id . "&Itemid=" . $result2->id;
                                            } else {
                                                $url = "index.php?option=com_content&view=category&layout=blog&id=" . $row4->id . "&Itemid=" . $result2->id;
                                            }
                                            $swmenupro_array[] = array("TITLE" => $row4->title, "URL" => $url, "ID" => $row4->id + 10000, "PARENT" => $row3->id + 10000, "ORDER" => $row->lft, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0, "ACCESS" => $row->access, "NCSS" => $row->normal_css, "OCSS" => $row->over_css, "SHOWITEM" => $row->show_item);

                                            for ($k = 0; $k < count($hybrid_content); $k++) {
                                                $row2 = $hybrid_content[$k];
                                                if ($row2->catid == $row4->id) {

                                                    $url = "index.php?option=com_content&view=article&catid=" . $row->id . "&id=" . $row2->id . "&Itemid=" . $result2->id;
                                                    $swmenupro_array[] = array("TITLE" => $row2->title, "URL" => $url, "ID" => $row2->id + 100000, "PARENT" => $row4->id + 10000, "ORDER" => $row2->ordering, "IMAGE" => $row2->image, "IMAGEOVER" => $row2->image_over, "SHOWNAME" => $row2->show_name, "IMAGEALIGN" => $row2->image_align, "TARGETLEVEL" => $row2->target_level, "TARGET" => 0, "ACCESS" => $row2->access, "NCSS" => $row2->normal_css, "OCSS" => $row2->over_css, "SHOWITEM" => $row2->show_item);
                                                }
                                            }
                                        }
                                    }
                                }
                            }




                            for ($k = 0; $k < count($hybrid_content); $k++) {
                                $row2 = $hybrid_content[$k];
                                if ($row2->catid == $row->id) {

                                    $url = "index.php?option=com_content&view=article&catid=" . $row->id . "&id=" . $row2->id . "&Itemid=" . $result2->id;
                                    $swmenupro_array[] = array("TITLE" => $row2->title, "URL" => $url, "ID" => $row2->id + 100000, "PARENT" => $row->id + 10000, "ORDER" => $row2->ordering, "IMAGE" => $row2->image, "IMAGEOVER" => $row2->image_over, "SHOWNAME" => $row2->show_name, "IMAGEALIGN" => $row2->image_align, "TARGETLEVEL" => $row2->target_level, "TARGET" => 0, "ACCESS" => $row2->access, "NCSS" => $row2->normal_css, "OCSS" => $row2->over_css, "SHOWITEM" => $row2->show_item);
                                }
                            }
                        }
                    }

                    /*

                      for($j=0;$j<count($hybrid_content);$j++){
                      $row=$hybrid_content[$j];
                      //echo $row->catid;
                      if($row->catid==$opt['id']){
                      //echo "hello";
                      $url="index.php?option=com_content&view=article&catid=".$row->catid."&id=" . $row->id ."&Itemid=".$result2->id;
                      $swmenupro_array[] =array("TITLE" => $row->title, "URL" =>  $url , "ID" => $row->id+100000  ,"SECURE" => $iSecure, "PARENT" => $result2->id ,  "ORDER" => $row->ordering, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0,"ACCESS" => $row->access,"NCSS" => $row->normal_css,"OCSS" => $row->over_css,"SHOWITEM" => $row->show_item  );
                      }
                      }
                     */
                } else if ($opt['view'] == "blogsection" || $opt['view'] == "section") {
                    //echo "hello";
                }
            }
        }
    }

    return $swmenupro_array;
}

function get_Version($directory) {

    $xml = simplexml_load_file($directory);

    $version = @$xml->version[0];

    return floatval($version);
}

function changeLanguage() {

    global $mainframe;
    $absolute_path = JPATH_ROOT;

    $lang = JRequest::getVar('language', "english.php");


    $file = $absolute_path . "/administrator/components/com_swmenupro/language/default.ini";
    if (!file_exists($file)) {
        touch($file);
        $handle = fopen($file, 'w'); // Let's open for read and write
    } else {
        $handle = fopen($file, 'w'); // Let's open for read and write
    }
    rewind($handle); // Go back to the beginning

    if (fwrite($handle, $lang)) {
        //	$msg=_SW_SAVE_MENU_CSS_MESSAGE;
    } else {
        //	$msg=_SW_NO_SAVE_MENU_CSS_MESSAGE;
    } // Don't forget to increment the counter

    fclose($handle); // Done


    header("location:index.php?&option=com_swmenupro&task=upgrade");
//upgrade($option='com_swmenupro', $installdir='');
}

function upgrade() {

    $database = & JFactory::getDBO();
    $absolute_path = JPATH_ROOT;
    $config = & JFactory::getConfig();
    $dbprefix = $config->get('dbprefix');
    //echo $db;
    $row->message = "";
    $row->database_version = 1;
    $columncount = 0;
    
     if (TableExists($dbprefix . "swmenupro_styles")) {
                
               
             }else{
              
              $database->setQuery("CREATE TABLE `#__swmenupro_styles` (
  			  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moduleid` int(11) NOT NULL,
  `params` text,
  PRIMARY KEY (`id`)
                     ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                    ");
               $row->message.="Creating swmenupro_styles table <br />";
                 $database->query();
                 
                  $database->setQuery("INSERT INTO `#__swmenupro_styles` (`id`, `moduleid` , `params`) VALUES
(2, 0, 'position=left\r\norientation=vertical/right\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevel2_sub_top=0\r\nlevel2_sub_left=0\r\ncomplete_margin_top=6\r\ncomplete_margin_right=16\r\ncomplete_margin_bottom=16\r\ncomplete_margin_left=16\r\ntop_margin_top=10\r\ntop_margin_right=0\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#3F6AA1\r\nactive_background=#942E8D\r\nmain_back=#225480\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#E3E7ED\r\nmain_font_color_over=#FFE70F\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nc_corner_style=none\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=none\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsbr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\noverlay_hack=0\r\npadding_hack=0\r\nauto_position=1\r\nflash_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=0\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=trans2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=transmenu\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro\r\n'),
(5, 0, 'main_width=187\r\nposition=center\r\ntree_lines=black\r\ntree_top_icon=images/swmenupro/tree_icons/base.gif\r\ntree_folder_icon=images/swmenupro/tree_icons/folder.gif\r\ntree_folder_open_icon=images/swmenupro/tree_icons/folder-open.gif\r\ntree_file_icon=images/swmenupro/tree_icons/doc.gif\r\nc_corner_style=curvycorner\r\nc_corner_size=15\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\ntop_margin_top=2\r\ntop_margin_right=0\r\ntop_margin_bottom=2\r\ntop_margin_left=16\r\ncomplete_margin_top=14\r\ncomplete_margin_right=0\r\ncomplete_margin_bottom=12\r\ncomplete_margin_left=15\r\nmain_pad_top=0\r\nmain_pad_right=0\r\nmain_pad_bottom=2\r\nmain_pad_left=16\r\nsub_pad_top=0\r\nsub_pad_right=0\r\nsub_pad_bottom=2\r\nsub_pad_left=16\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#1A7ABA\r\nactive_background=\r\nmain_back=\r\nmain_over=\r\nsub_back=\r\nsub_over=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#F5F5F5\r\nmain_font_color_over=#E8EBBA\r\nsub_font_color=#E6E5E3\r\nsub_font_color_over=#EEF283\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=bold\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmenutype=mainmenu\r\nparentid=0\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nactive_menu=1\r\nuse_cookie=0\r\ndisable_parent=1\r\nexpand_all=0\r\nhybrid=0\r\ntables=0\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=dtree\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=treemenu\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro/tree_icons\r\n'),
(6, 0, 'main_width=187\r\nposition=center\r\ntree_lines=red\r\ntree_top_icon=images/swmenupro/tree_icons/base.gif\r\ntree_folder_icon=images/swmenupro/tree_icons/folder.gif\r\ntree_folder_open_icon=images/swmenupro/tree_icons/folder-open.gif\r\ntree_file_icon=images/swmenupro/tree_icons/doc.gif\r\nc_corner_style=curvycorner\r\nc_corner_size=15\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\ntop_margin_top=2\r\ntop_margin_right=0\r\ntop_margin_bottom=2\r\ntop_margin_left=16\r\ncomplete_margin_top=14\r\ncomplete_margin_right=0\r\ncomplete_margin_bottom=12\r\ncomplete_margin_left=15\r\nmain_pad_top=0\r\nmain_pad_right=0\r\nmain_pad_bottom=2\r\nmain_pad_left=16\r\nsub_pad_top=0\r\nsub_pad_right=0\r\nsub_pad_bottom=2\r\nsub_pad_left=16\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#F5EBB8\r\nactive_background=\r\nmain_back=\r\nmain_over=\r\nsub_back=\r\nsub_over=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#0A0A0A\r\nmain_font_color_over=#7A7A7A\r\nsub_font_color=#212120\r\nsub_font_color_over=#5C7FF2\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=bold\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmenutype=mainmenu\r\nparentid=0\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nactive_menu=1\r\nuse_cookie=0\r\ndisable_parent=1\r\nexpand_all=0\r\nhybrid=0\r\ntables=0\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=treeview2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=treeview\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro/tree_icons\r\n'),
(8, 0, 'position=center\r\nlevelx_align=right\r\norientation=vertical\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nlevelx_sub_width=0\r\nlevelx_sub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=2\r\nlevel1_sub_left=0\r\nlevelx_sub_top=0\r\nlevelx_sub_left=0\r\ncomplete_margin_top=11\r\ncomplete_margin_right=14\r\ncomplete_margin_bottom=17\r\ncomplete_margin_left=14\r\ntop_margin_top=6\r\ntop_margin_right=0\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=48\r\nmain_pad_bottom=11\r\nmain_pad_left=30\r\nsub_pad_top=9\r\nsub_pad_right=5\r\nsub_pad_bottom=10\r\nsub_pad_left=13\r\nlevelx_sub_pad_top=10\r\nlevelx_sub_pad_right=15\r\nlevelx_sub_pad_bottom=7\r\nlevelx_sub_pad_left=24\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nsub_active_background_image=\r\nsub_active_background_repeat=repeat\r\nsub_active_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\nlevelx_sub_back_image=\r\nlevelx_sub_background_repeat=repeat\r\nlevelx_sub_background_position=left top\r\nlevelx_sub_back_image_over=<br />\r\nlevelx_sub_hover_background_repeat=repeat\r\nlevelx_sub_hover_background_position=left top\r\ncomplete_background=#C9C9C9\r\nactive_background=#C75228\r\nsub_active_background=#081C1B\r\nmain_back=#2E51A3\r\nmain_over=#2D611A\r\nsub_back=#3F8296\r\nsub_over=#334787\r\nlevelx_sub_back=#3299AD\r\nlevelx_sub_over=#3F37AD\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=10\r\ntop_sub_indicator_left=-5\r\nsub_sub_indicator=images/swmenupro/arrows/white-down.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=10\r\nsub_sub_indicator_left=-5\r\nlevelx_sub_indicator=images/swmenupro/arrows/blackleft-off.gif\r\nlevelx_sub_indicator_align=right\r\nlevelx_sub_indicator_top=0\r\nlevelx_sub_indicator_left=0\r\nfont_family=Arial, Helvetica, sans-serif\r\nsub_font_family=Arial, Helvetica, sans-serif\r\nlevelx_sub_font_family=Arial, Helvetica, sans-serif\r\ntop_ttf=\r\nsub_ttf=\r\nlevelx_sub_ttf=\r\nactive_font=#F0F09E\r\nsub_active_font=#FF8138\r\nmain_font_color=#EBEFF5\r\nmain_font_color_over=#E1EBE4\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nlevelx_sub_font_color=#F2F2F2\r\nlevelx_sub_font_color_over=#D8E65C\r\nmain_font_size=15\r\nsub_font_size=15\r\nlevelx_sub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nlevelx_sub_font_weight=normal\r\nmain_align=left\r\nsub_align=left\r\nlevelx_sub_font_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\nlevelx_sub_font_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nlevelx_sub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=1\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nmain_border_over_style=none\r\nmain_border_color_over=#020103\r\nmain_border_over_width=2\r\ntit_border=1\r\ntir_border=1\r\ntib_border=1\r\ntil_border=1\r\nt_auto_border=1\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nlevelx_outside_border_style=none\r\nlevelx_outside_border_color=#4DCFFF\r\nlevelx_outside_border_width=0\r\nlevelx_inside_border_style=none\r\nlevelx_inside_border_color=#121212\r\nlevelx_inside_border_width=0\r\nxit_border=1\r\nxir_border=1\r\nxib_border=1\r\nxil_border=1\r\nc_corner_style=round\r\nc_corner_size=21\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=none\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ns_corner_style=none\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=7\r\nx_corner_style=none\r\nx_corner_size=7\r\nxi_corner_style=none\r\nxi_corner_size=\r\nmenutype=aboutjoomla\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=1\r\ntables=0\r\nexpand_all=0\r\nautoclose=1\r\nrevealtype=0\r\ndisable_parent=0\r\noverlay_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=none\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=aboutjoomla\r\nimages_preview=1\r\ntitle=at2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=accordtransmenu\r\ntask=saveedit\r\nreturntask=save\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nexport2=\r\ndefaultfolder=swmenupro/arrows\r\n'),
(1, 0, 'position=left\r\norientation=vertical/right\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevel2_sub_top=0\r\nlevel2_sub_left=0\r\ncomplete_margin_top=6\r\ncomplete_margin_right=16\r\ncomplete_margin_bottom=16\r\ncomplete_margin_left=16\r\ntop_margin_top=10\r\ntop_margin_right=0\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#3F6AA1\r\nactive_background=#942E8D\r\nmain_back=#225480\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#E3E7ED\r\nmain_font_color_over=#FFE70F\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=curvycorner\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsbr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\noverlay_hack=0\r\npadding_hack=0\r\nauto_position=1\r\nflash_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=fade\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=myGosu\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=gosumenu\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro\r\n'),
(7, 0, 'position=center\r\norientation=horizontal/down\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nlevelx_sub_width=0\r\nlevelx_sub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevelx_sub_top=0\r\nlevelx_sub_left=0\r\ncomplete_margin_top=5\r\ncomplete_margin_right=7\r\ncomplete_margin_bottom=14\r\ncomplete_margin_left=16\r\ntop_margin_top=10\r\ntop_margin_right=19\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\nlevelx_sub_pad_top=3\r\nlevelx_sub_pad_right=5\r\nlevelx_sub_pad_bottom=3\r\nlevelx_sub_pad_left=10\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nsub_active_background_image=\r\nsub_active_background_repeat=repeat\r\nsub_active_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\nlevelx_sub_back_image=\r\nlevelx_sub_background_repeat=repeat\r\nlevelx_sub_background_position=left top\r\nlevelx_sub_back_image_over=\r\nlevelx_sub_hover_background_repeat=repeat\r\nlevelx_sub_hover_background_position=left top\r\ncomplete_background=#4E84CC\r\nactive_background=#942E8D\r\nsub_active_background=#3B3B3B\r\nmain_back=#346CA3\r\nmain_over=#999997\r\nsub_back=#3F8296\r\nsub_over=#334787\r\nlevelx_sub_back=#7AFFFB\r\nlevelx_sub_over=#C2C6FF\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nlevelx_sub_indicator=\r\nlevelx_sub_indicator_align=left\r\nlevelx_sub_indicator_top=\r\nlevelx_sub_indicator_left=\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\nlevelx_sub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nlevelx_sub_ttf=\r\nactive_font=#F0F09E\r\nsub_active_font=#FF195E\r\nmain_font_color=#EBEFF5\r\nmain_font_color_over=#111211\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nlevelx_sub_font_color=#242424\r\nlevelx_sub_font_color_over=#6B6B6B\r\nmain_font_size=15\r\nsub_font_size=15\r\nlevelx_sub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nlevelx_sub_font_weight=normal\r\nmain_align=left\r\nsub_align=left\r\nlevelx_sub_font_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\nlevelx_sub_font_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nlevelx_sub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nlevelx_outside_border_style=none\r\nlevelx_outside_border_color=#8D85FF\r\nlevelx_outside_border_width=0\r\nlevelx_inside_border_style=none\r\nlevelx_inside_border_color=#FFCF4D\r\nlevelx_inside_border_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=curvycorner\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nx_corner_style=none\r\nx_corner_size=0\r\nxi_corner_style=none\r\nxi_corner_size=13\r\nxitl_corner=1\r\nxitr_corner=1\r\nxibl_corner=1\r\nxibr_corner=1\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\nrevealtype=0\r\ndisable_parent=0\r\noverlay_hack=0\r\nauto_position=1\r\nflash_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=none\r\nspecialB=321\r\nspecialA=100\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=aboutjoomla\r\nimages_preview=1\r\ntitle=mc2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=columnmenu\r\ntask=saveedit\r\nreturntask=save\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nexport2=\r\ndefaultfolder=swmenupro\r\n'),
(4, 0, 'position=left\r\norientation=vertical\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevel2_sub_top=0\r\nlevel2_sub_left=0\r\ncomplete_margin_top=6\r\ncomplete_margin_right=16\r\ncomplete_margin_bottom=16\r\ncomplete_margin_left=16\r\ntop_margin_top=10\r\ntop_margin_right=0\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#3F6AA1\r\nactive_background=#942E8D\r\nmain_back=#225480\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=13\r\ntop_sub_indicator_left=-8\r\nsub_sub_indicator=images/swmenupro/arrows/white-down.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=13\r\nsub_sub_indicator_left=-8\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#E3E7ED\r\nmain_font_color_over=#FFE70F\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\ntit_border=1\r\ntir_border=1\r\ntib_border=1\r\ntil_border=1\r\nt_auto_border=1\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=curvycorner\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsbr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\nexpand_all=0\r\nautoclose=1\r\nrevealtype=1\r\ndisable_parent=1\r\ndisable_jquery=0\r\ntablet_hack=1\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=accordion2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=accordian\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro/arrows\r\n'),
(9, 0, 'position=center\r\norientation=horizontal/right\r\nlevel1_align=auto\r\nlevel1_width=complete\r\ncomplete_width=96\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nlevelx_sub_width=0\r\nlevelx_sub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevelx_sub_top=0\r\nlevelx_sub_left=0\r\ncomplete_margin_top=15\r\ncomplete_margin_right=0\r\ncomplete_margin_bottom=0\r\ncomplete_margin_left=0\r\ntop_margin_top=0\r\ntop_margin_right=17\r\ntop_margin_bottom=0\r\ntop_margin_left=0\r\nmain_pad_top=10\r\nmain_pad_right=17\r\nmain_pad_bottom=15\r\nmain_pad_left=20\r\nsub_pad_top=10\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\nlevelx_sub_pad_top=9\r\nlevelx_sub_pad_right=10\r\nlevelx_sub_pad_bottom=9\r\nlevelx_sub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nsub_active_background_image=\r\nsub_active_background_repeat=repeat\r\nsub_active_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\nlevelx_sub_back_image=\r\nlevelx_sub_background_repeat=repeat\r\nlevelx_sub_background_position=left top\r\nlevelx_sub_back_image_over=\r\nlevelx_sub_hover_background_repeat=repeat\r\nlevelx_sub_hover_background_position=left top\r\ncomplete_background=#4E84CC\r\nactive_background=#942E8D\r\nsub_active_background=#2B2B2B\r\nmain_back=#346CA3\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\nlevelx_sub_back=#4BFF45\r\nlevelx_sub_over=#73FFB4\r\ntop_sub_indicator=images/swmenupro/arrows/white-down.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nlevelx_sub_indicator=\r\nlevelx_sub_indicator_align=left\r\nlevelx_sub_indicator_top=\r\nlevelx_sub_indicator_left=\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\nlevelx_sub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nlevelx_sub_ttf=\r\nactive_font=#F0F09E\r\nsub_active_font=#EDEDED\r\nmain_font_color=#EBEFF5\r\nmain_font_color_over=#E1EBE4\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nlevelx_sub_font_color=#2B2B2B\r\nlevelx_sub_font_color_over=#808080\r\nmain_font_size=15\r\nsub_font_size=15\r\nlevelx_sub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nlevelx_sub_font_weight=normal\r\nmain_align=left\r\nsub_align=left\r\nlevelx_sub_font_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\nlevelx_sub_font_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nlevelx_sub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\ntot_border=1\r\ntor_border=1\r\ntob_border=1\r\ntol_border=1\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nlevelx_outside_border_style=none\r\nlevelx_outside_border_color=#D6E1FF\r\nlevelx_outside_border_width=0\r\nlevelx_inside_border_style=none\r\nlevelx_inside_border_color=#30A5FF\r\nlevelx_inside_border_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ns_corner_style=none\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nx_corner_style=none\r\nx_corner_size=0\r\nxi_corner_style=none\r\nxi_corner_size=0\r\nmenutype=aboutjoomla\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\nrevealtype=1\r\ndisable_parent=1\r\nlevel1_open=1\r\nrevert2default=1\r\nlevel1_fillempty=0\r\nflash_hack=0\r\noverlay_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=none\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=aboutjoomla\r\nimages_preview=1\r\ntitle=megatab2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=multitabmenu\r\ntask=saveedit\r\nreturntask=save\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nexport2=\r\ndefaultfolder=swmenupro/arrows\r\n'),
(3, 0, 'position=left\r\norientation=vertical\r\nmain_width=0\r\nmain_height=0\r\nsub_width=0\r\nsub_height=0\r\nmain_top=0\r\nmain_left=0\r\nlevel1_sub_top=0\r\nlevel1_sub_left=0\r\nlevel2_sub_top=0\r\nlevel2_sub_left=0\r\ncomplete_margin_top=16\r\ncomplete_margin_right=16\r\ncomplete_margin_bottom=6\r\ncomplete_margin_left=16\r\ntop_margin_top=0\r\ntop_margin_right=0\r\ntop_margin_bottom=10\r\ntop_margin_left=0\r\nmain_pad_top=11\r\nmain_pad_right=28\r\nmain_pad_bottom=11\r\nmain_pad_left=20\r\nsub_pad_top=9\r\nsub_pad_right=28\r\nsub_pad_bottom=10\r\nsub_pad_left=15\r\ncomplete_background_image=\r\ncomplete_background_repeat=repeat\r\ncomplete_background_position=left top\r\nactive_background_image=\r\nactive_background_repeat=repeat\r\nactive_background_position=left top\r\nmain_back_image=\r\ntop_background_repeat=repeat\r\ntop_background_position=left top\r\nmain_back_image_over=\r\ntop_hover_background_repeat=repeat\r\ntop_hover_background_position=left top\r\nsub_back_image=\r\nsub_background_repeat=repeat\r\nsub_background_position=left top\r\nsub_back_image_over=\r\nsub_hover_background_repeat=repeat\r\nsub_hover_background_position=left top\r\ncomplete_background=#3F6AA1\r\nactive_background=#942E8D\r\nmain_back=#225480\r\nmain_over=#163961\r\nsub_back=#3F8296\r\nsub_over=#334787\r\ntop_sub_indicator=images/swmenupro/arrows/whiteleft-on.gif\r\ntop_sub_indicator_align=right\r\ntop_sub_indicator_top=0\r\ntop_sub_indicator_left=0\r\nsub_sub_indicator=images/swmenupro/arrows/blackleft-on.gif\r\nsub_sub_indicator_align=right\r\nsub_sub_indicator_top=0\r\nsub_sub_indicator_left=0\r\nfont_family=Times New Roman, Times, serif\r\nsub_font_family=Times New Roman, Times, serif\r\ntop_ttf=\r\nsub_ttf=\r\nmain_font_color=#E3E7ED\r\nmain_font_color_over=#FFE70F\r\nsub_font_color=#FEFFF5\r\nsub_font_color_over=#F0E807\r\nactive_font=#F0F09E\r\nmain_font_size=15\r\nsub_font_size=15\r\nfont_weight=normal\r\nfont_weight_over=normal\r\nmain_align=left\r\nsub_align=left\r\ntop_wrap=nowrap\r\nsub_wrap=nowrap\r\ntop_font_extra=\r\nsub_font_extra=\r\nmain_border_style=none\r\nmain_border_color=#17050E\r\nmain_border_width=0\r\nmain_border_over_style=none\r\nmain_border_color_over=#F34AFF\r\nmain_border_over_width=0\r\nsub_border_style=none\r\nsub_border_color=#061C1B\r\nsub_border_width=0\r\nsub_border_over_style=none\r\nsub_border_color_over=#94FFB4\r\nsub_border_over_width=0\r\nc_corner_style=curvycorner\r\nc_corner_size=23\r\nctl_corner=1\r\nctr_corner=1\r\ncbl_corner=1\r\ncbr_corner=1\r\nt_corner_style=curvycorner\r\nt_corner_size=10\r\nttl_corner=1\r\nttr_corner=1\r\ntbl_corner=1\r\ntbr_corner=1\r\ns_corner_style=curvycorner\r\ns_corner_size=10\r\nstl_corner=1\r\nstr_corner=1\r\nsbl_corner=1\r\nsbr_corner=1\r\nsi_corner_style=none\r\nsi_corner_size=\r\nmenutype=mainmenu\r\nparentid=0\r\nactive_menu=1\r\nlevels=0\r\nparent_level=0\r\ncssload=0\r\nhybrid=0\r\ntables=0\r\noverlay_hack=0\r\npadding_hack=0\r\nauto_position=1\r\nflash_hack=0\r\ndisable_jquery=0\r\ntablet_hack=1\r\nextra=1\r\nspecialB=321\r\nspecialA=80\r\nautoassign=active\r\nautoattrib=\r\nauto_css=\r\nno_html=0\r\nmanual=0\r\nrel_path=\r\nmodule=1\r\nmenuname=mainmenu\r\nimages_preview=1\r\ntitle=superfish2\r\nborder_hack=0\r\noption=com_swmenupro\r\ntmpl=index\r\nmenustyle=superfishmenu\r\ntask=saveedit\r\nid=\r\ntop_font_face=\r\nsub_font_face=\r\npreview=0\r\nreturntask=save\r\ndefaultfolder=swmenupro\r\n');
                        


");
        $database->query();
                 
            }
    
    
    
        if (TableExists($dbprefix . "swmenu_config")) {
         
        $query = "SELECT * FROM #__swmenu_config";
        $database->setQuery($query);
        $result = $database->loadObjectList();
       
   //     echo count($result);
     //   print_r($result);
        
        
        foreach($result as $swconfig){
           // echo $swconfig->id;
            $swmenupro=array();
        
       
	$row 	=& JTable::getInstance('module');
	// load the row from the db table
	$row->load( $swconfig->id );
       // $row->message="";
         
        if ($row->id) {
            $style=$row->params;
              $params = sw_stringToObject($row->params);
                        while (list ($key, $val) = each($params)) {
                          if($key=='menutype'){
                $style.= "menuname=".$val."\n";   
               }
               if($key=='menustyle'){
                $menustyle= $val;   
               }
                        }
           
            while (list ($key, $val) = each($swconfig)) {
               $swmenupro[$key] = $val;
              if($key=='id'){
               $val=$row->id;
                $style.= $key ."=".$val."\n";
               }else if($key=='corners'){
                $style.= $val."\n";   
               }else if($key=='sub_indicator'){
                $style.= $val."\n";   
               }else if($key=='sub_padding'){
                $padding = explode("px", $val);
                $style.= "sub_pad_top=".$padding[0]."\n";  
                $style.= "sub_pad_right=".$padding[1]."\n";  
                $style.= "sub_pad_bottom=".$padding[2]."\n";  
                $style.= "sub_pad_left=".$padding[3]."\n";  
               }else if($key=='main_padding'){
                $padding = explode("px", $val);
                $style.= "main_pad_top=".$padding[0]."\n";  
                $style.= "main_pad_right=".$padding[1]."\n";  
                $style.= "main_pad_bottom=".$padding[2]."\n";  
                $style.= "main_pad_left=".$padding[3]."\n";  
               }else if($key=='complete_padding'){
                $padding = explode("px", $val);
                $style.= "complete_margin_top=".$padding[0]."\n";  
                $style.= "complete_margin_right=".$padding[1]."\n";  
                $style.= "complete_margin_bottom=".$padding[2]."\n";  
                $style.= "complete_margin_left=".$padding[3]."\n";  
               }else if($key=='top_margin'){
                $padding = explode("px", $val);
                $style.= "top_margin_top=".$padding[0]."\n";  
                $style.= "top_margin_right=".$padding[1]."\n";  
                $style.= "top_margin_bottom=".$padding[2]."\n";  
                $style.= "top_margin_left=".$padding[3]."\n";  
               }else if($key=='main_border'){
                $border = explode(" ", $val);
                $style.= "main_border_width=".(rtrim(trim($border[0]), 'px'))."\n";  
                $style.= "main_border_style=".$border[1]."\n";  
                $style.= "main_border_color=".$border[2]."\n";  
               }else if($key=='main_border_over'){
                $border = explode(" ", $val);
                $style.= "main_border_over_width=".(rtrim(trim($border[0]), 'px'))."\n";  
                $style.= "main_border_over_style=".$border[1]."\n";  
                $style.= "main_border_color_over=".$border[2]."\n";  
               }else if($key=='sub_border'){
                $border = explode(" ", $val);
                $style.= "sub_border_width=".(rtrim(trim($border[0]), 'px'))."\n";  
                $style.= "sub_border_style=".$border[1]."\n";  
                $style.= "sub_border_color=".$border[2]."\n";  
               }else if($key=='sub_border_over'){
                $border = explode(" ", $val);
                $style.= "sub_border_over_width=".(rtrim(trim($border[0]), 'px'))."\n";  
                $style.= "sub_border_over_style=".$border[1]."\n";  
                $style.= "sub_border_color_over=".$border[2]."\n";  
               }else{
                $style.= $key ."=".$val."\n";   
               }
               
               
              
            }
           
            
            $res="";
            $sw=array();
            
             switch ($menustyle) {
              case "gosumenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=1";
                    $database->setQuery($sql);
                    $swmenupro2 = $database->loadObject();
                    if (count($swmenupro2)) {
                        $params = sw_stringToObject($swmenupro2->params);
                        while (list ($key, $val) = each($params)) {
                            $sw[$key] = $val;
                        }
                    }
               break;
               case "transmenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=2";
                    $database->setQuery($sql);
                    $swmenupro2 = $database->loadObject();
                    if (count($swmenupro2)) {
                        $params = sw_stringToObject($swmenupro2->params);
                        while (list ($key, $val) = each($params)) {
                            $sw[$key] = $val;
                        }
                    }
                break;
                case "superfishmenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=3";
                    $database->setQuery($sql);
                    $swmenupro2 = $database->loadObject();
                    if (count($swmenupro2)) {
                        $params = sw_stringToObject($swmenupro2->params);
                        while (list ($key, $val) = each($params)) {
                            $sw[$key] = $val;
                        }
                    }
                break;
                case "accordian":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=4";
                    $database->setQuery($sql);
                    $swmenupro2 = $database->loadObject();
                    if (count($swmenupro2)) {
                        $params = sw_stringToObject($swmenupro2->params);
                        while (list ($key, $val) = each($params)) {
                            $sw[$key] = $val;
                        }
                    }

                    break;

                case "treemenu":
                    $sql = "SELECT * FROM #__swmenupro_styles where id=5";
                    $database->setQuery($sql);
                    $swmenupro2 = $database->loadObject();
                    if (count($swmenupro2)) {
                        $params = sw_stringToObject($swmenupro2->params);
                        while (list ($key, $val) = each($params)) {
                            $sw[$key] = $val;
                        }
                    }

                    break;
                    
                  
                default:
                    $sql = "SELECT * FROM #__swmenupro_styles where id=1";
                    $database->setQuery($sql);
                    $swmenupro2 = $database->loadObject();
                    if (count($swmenupro2)) {
                        $params = sw_stringToObject($swmenupro2->params);
                        while (list ($key, $val) = each($params)) {
                            $sw[$key] = $val;
                        }
                    }

                    break;
}

               
              
             $params = sw_stringToObject($style);
                        while (list ($key, $val) = each($params)) {
                            $sw[$key] = $val;
                        }
             
                        
                         while (list ($key, $val) = each($sw)) {
                              if($key=='id'){
              
                $res.= $key ."=".$row->id."\n";
               }else if($key=='title'){
              
                $res.= $key ."=".$row->title."\n";
               }else if($key=='menustyle' && $val=="clickmenu"){
              
                $res.= $key ."=accordian\n";
               }else if($key=='menustyle' && $val=="clicktransmenu"){
              
                $res.= $key ."=accordtransmenu\n";
               }else {
                            $res.= $key."=".$val."\n";
                        }
                    
            }
            
              
                $query = "SELECT * FROM #__swmenupro_styles WHERE moduleid = ".$row->id;
                $database->setQuery($query);
                $styles = $database->loadObjectList();
                if (!count($styles)){
                    $row->message.="Copying swmenupro_config table to swmenupro_styles<br />";
                    $database->setQuery("INSERT INTO #__swmenupro_styles SET moduleid='$row->id', params='$res'");
                    $database->query(); 
                }
            
            //echo $style;
        }
       
//echo count($swmenufree);
       }
    } 

    
    

    if (TableExists($dbprefix . "swmenu_extended")) {
        $database->setQuery("SELECT * FROM #__swmenu_extended");
		$result = $database->loadObjectList();
       if ($result){
       while (list ($key, $val) = each ($result[0]))
       {
	   // echo "1";
	    $columncount++;
        //$swmenufree[$key]=$val;
       }
		
       }
	  if($columncount<14){
	  	$row->message.=sprintf(_SW_TABLE_UPGRADE,'#__swmenu_extended')."<br />";
	  	$database->setQuery("ALTER TABLE `#__swmenu_extended` 
  			ADD `custom_html` text,
  			ADD `html_position` varchar(30) DEFAULT NULL  			
 			 ");
		$database->query();
	  	$row->database_version=0;
	  }
        
    } else {
        $row->message.=sprintf(_SW_TABLE_CREATE, '#__swmenu_extended') . "<br />";
        $database->setQuery("CREATE TABLE `#__swmenu_extended` (
  			 `ext_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `image_over` varchar(100) DEFAULT NULL,
  `moduleID` int(11) NOT NULL DEFAULT '0',
  `show_name` int(2) NOT NULL DEFAULT '1',
  `image_align` varchar(20) NOT NULL DEFAULT 'left',
  `target_level` int(11) NOT NULL DEFAULT '1',
  `normal_css` mediumtext,
  `over_css` mediumtext,
  `show_item` int(11) NOT NULL DEFAULT '1',
  `extra` mediumtext,
  `custom_html` text,
  `html_position` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ext_id`)
			) ");
        $database->query();
    }
    $columncount = 0;
   


    $database->setQuery("SELECT COUNT(*) FROM `#__extensions` WHERE element LIKE '%com_swmenupro%'");
    $com_entries = $database->loadResult();

    if ($com_entries != 1) {
        $row->message.=_SW_UPDATE_LINKS . "<br />";
        //$database->setQuery("DELETE FROM `#__components` WHERE admin_menu_link like '%com_swmenupro%'");
        //$database->query();

        $database->setQuery("INSERT INTO `#__extensions` VALUES('', 'swMenuPro', 'component', 'com_swmenupro', '', 0, 1, 0, 0, '{\"legacy\":false,\"name\":\"swMenuPro\",\"type\":\"component\",\"creationDate\":\"26\\/01\\/2012\",\"author\":\"Sean White\",\"copyright\":\"This component is copyright www.swmenupro.com\",\"authorEmail\":\"sean@swmenupro.com\",\"authorUrl\":\"http:\\/\\/www.swmenupro.com\",\"version\":\"7.7\",\"description\":\"Joomla\\/Mambo DHTML Menu Component\",\"group\":\"\"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);");
        $database->query();
    }

    $database->setQuery("SELECT COUNT(*) FROM `#__extensions` WHERE element LIKE '%mod_swmenupro%'");
    $com_entries = $database->loadResult();

    if ($com_entries != 1) {
        $row->message.=_SW_UPDATE_LINKS . "<br />";
        //$database->setQuery("DELETE FROM `#__components` WHERE admin_menu_link like '%com_swmenupro%'");
        //$database->query();

        $database->setQuery("INSERT INTO `#__extensions` VALUES('', 'swMenuPro', 'module', 'mod_swmenupro', '', 0, 1, 0, 0, '{\"legacy\":false,\"name\":\"swMenuPro\",\"type\":\"module\",\"creationDate\":\"26\\/01\\/2012\",\"author\":\"Sean White\",\"copyright\":\"This component is copyright www.swmenupro.com\",\"authorEmail\":\"sean@swmenupro.com\",\"authorUrl\":\"http:\\/\\/www.swmenupro.com\",\"version\":\"7.7\",\"description\":\"Joomla\\/Mambo DHTML Menu Component\",\"group\":\"\"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);");
        $database->query();
    }




    $database->setQuery("SELECT COUNT(*) FROM `#__menu` WHERE title LIKE '%swmenupro%' AND client_id='1'");
    $com_entries = $database->loadResult();

    if ($com_entries != 1) {
        $row->message.=_SW_UPDATE_LINKS . "<br />";
        //$database->setQuery("DELETE FROM `#__components` WHERE admin_menu_link like '%com_swmenupro%'");
        //$database->query();

        $database->setQuery("SELECT extension_id FROM `#__extensions` WHERE element LIKE '%com_swmenupro%'");
        $com_id = $database->loadResult();



        $database->setQuery("INSERT INTO `#__menu` VALUES ( '', 'main', 'swmenupro', 'swmenupro', '', 'swmenupro', 'index.php?option=com_swmenupro', 'component', 0, 1, 1, " . $com_id . ", 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 277, 278, 0, '', 1)");
        $database->query();
    }



    if (file_exists($absolute_path . '/modules/mod_swmenupro/mod_swmenupro.xml')) {
        $row->module_version = get_Version($absolute_path . '/modules/mod_swmenupro/mod_swmenupro.xml');
        $row->new_module_version = get_Version($absolute_path . '/administrator/components/com_swmenupro/module/mod_swmenupro.xml');
        if ($row->module_version < $row->new_module_version) {
            if (copydirr($absolute_path . "/administrator/components/com_swmenupro/module", $absolute_path . "/modules/mod_swmenupro", 0757, false)) {

                $row->message.=_SW_MODULE_SUCCESS . "<br />";
            } else {
                $row->message.=_SW_MODULE_FAIL . "<br />";
            }
        }
    } else {
        mkdir($absolute_path . "/modules/mod_swmenupro");
        if (copydirr($absolute_path . "/administrator/components/com_swmenupro/module", $absolute_path . "/modules/mod_swmenupro", 0757, false)) {
            //rename($absolute_path . "/modules/mod_swmenufree/mod_swmenufree.sw", $absolute_path . "/modules/mod_swmenufree/mod_swmenufree.xml");
            $row->message.=_SW_MODULE_SUCCESS . "<br />";
        } else {
            $row->message.=_SW_MODULE_FAIL . "<br />";
        }
    }


    if(!is_dir(JPATH_ROOT  .'/images/swmenupro')){
	if (@mkdir(JPATH_ROOT . '/images/swmenupro')){
				chmod(JPATH_ROOT . '/images/swmenupro',0757);
				//echo 'Directory created: '.JPATH_ROOT .DS. 'images'.DS.'swmenufree';
			}else{
			$row->message.= '<b>ERROR:</b>cannot create directory '.JPATH_ROOT .'/images/swmenupro<br />';
                        }
                        if(copydirr(JPATH_ROOT. '/modules/mod_swmenupro/images',JPATH_ROOT . '/images/swmenupro',0757,false)){
	//rename($absolute_path."/modules/mod_swmenufree/mod_swmenufree.sw",$absolute_path."/modules/mod_swmenufree/mod_swmenufree.xml");
	$row->message.="Successfully Installed swmenupro images<br />";
	}else{
	$row->message.="Could Not Install swMenuPro Images.<br />\n";
	}
        }

    $row->component_version = get_Version($absolute_path . '/administrator/components/com_swmenupro/swmenupro.xml');
    $row->module_version = get_Version($absolute_path . '/modules/mod_swmenupro/mod_swmenupro.xml');


    $langfile = "english.php";
    if (file_exists($absolute_path . '/administrator/components/com_swmenupro/language/default.ini')) {
        $filename = $absolute_path . '/administrator/components/com_swmenupro/language/default.ini';
        $handle = fopen($filename, "r");
        $langfile = fread($handle, filesize($filename));
        fclose($handle);
    }

    $basedir = $absolute_path . "/administrator/components/com_swmenupro/language/";
    $handle = opendir($basedir);
    $lang = array();
    $lists = array();
    while ($file = readdir($handle)) {
        if ($file == "." || $file == ".." || $file == "default.ini") {
            
        } else {
            $lang[] = JHTML::_('select.option', $file, $file);
        }
        $lists['langfiles'] = JHTML::_('select.genericlist', $lang, 'language', 'id="language" class="inputbox" size="1" style="width:200px"', 'value', 'text', $langfile);
    }
    closedir($handle);


    HTML_swmenupro::upgradeForm($row, $lists);
    HTML_swmenupro::footer();
}

function copydirr($fromDir, $toDir, $chmod = 0757, $verbose = false)
/*
  copies everything from directory $fromDir to directory $toDir
  and sets up files mode $chmod
 */ {
    //* Check for some errors
    $errors = array();
    $messages = array();
    if (!is_writable($toDir))
        $errors[] = 'target ' . $toDir . ' is not writable';
    if (!is_dir($toDir))
        $errors[] = 'target ' . $toDir . ' is not a directory';
    if (!is_dir($fromDir))
        $errors[] = 'source ' . $fromDir . ' is not a directory';
    if (!empty($errors)) {
        if ($verbose)
            foreach ($errors as $err)
                echo '<strong>Error</strong>: ' . $err . '<br />';
        return false;
    }
    //*/
    $exceptions = array('.', '..');
    //* Processing
    $handle = opendir($fromDir);
    while (false !== ($item = readdir($handle)))
        if (!in_array($item, $exceptions)) {
            //* cleanup for trailing slashes in directories destinations
            $from = str_replace('//', '/', $fromDir . '/' . $item);
            $to = str_replace('//', '/', $toDir . '/' . $item);
            //*/
            if (is_file($from)) {
                if (@copy($from, $to)) {
                    chmod($to, $chmod);
                    touch($to, filemtime($from)); // to track last modified time
                    $messages[] = 'File copied from ' . $from . ' to ' . $to;
                }
                else
                    $errors[] = 'cannot copy file from ' . $from . ' to ' . $to;
            }
            if (is_dir($from)) {
                if (@mkdir($to)) {
                    chmod($to, $chmod);
                    $messages[] = 'Directory created: ' . $to;
                }
                else
                    $errors[] = 'cannot create directory ' . $to;
                copydirr($from, $to, $chmod, $verbose);
            }
        }
    closedir($handle);
    //*/
    //* Output
    if ($verbose) {
        foreach ($errors as $err)
            echo '<strong>Error</strong>: ' . $err . '<br />';
        foreach ($messages as $msg)
            echo $msg . '<br />';
    }
    //*/
    return true;
}

function uploadPackage() {
    global $mainframe;
    $absolute_path = JPATH_ROOT;
    //echo $absolute_path;
    $userfile = JRequest::getVar('userfile', null, 'files', 'array');

    if (!$userfile) {

        exit();
    }

    $userfile_name = $userfile['name'];
//echo $userfile_name;
    $msg = '';

    move_uploaded_file($userfile['tmp_name'], $absolute_path . '/tmp/' . $userfile['name']);
    //$resultdir = uploadFile( $userfile['tmp_name'], $userfile['name'], $msg );
    $msg = extractArchive($userfile['name']);

    if (file_exists($msg . "/swmenupro.xml")) {
        $upload_version = get_Version($msg . "/swmenupro.xml");
    } else {
        $upload_version = 0;
    }
    //echo $upload_version;
    //echo $msg."/swmenupro.xml";
    $current_version = get_Version($absolute_path . '/administrator/components/com_swmenupro/swmenupro.xml');
//echo $current_version;

    if ($current_version < $upload_version) {
        if (copydirr($msg . "/admin/", $absolute_path . '/administrator/components/com_swmenupro', 0757, false)) {
            unlink($absolute_path . '/administrator/components/com_swmenupro/swmenupro.xml');
            copy($msg . "/swmenupro.xml", $absolute_path . '/administrator/components/com_swmenupro/swmenupro.xml');
            $message = _SW_COMPONENT_SUCCESS;
        } else {
            $message = _SW_COMPONENT_FAIL;
        }
    } else {

        $message = _SW_INVALID_FILE;
    }

    sw_deldir($msg);
    unlink($absolute_path . "/tmp/" . $userfile['name']);

    header("location:index.php?&option=com_swmenupro&task=upgrade");
}

/**
 * @param string The name of the php (temporary) uploaded file
 * @param string The name of the file to put in the temp directory
 * @param string The message to return
 */
function uploadFile($filename, $userfile_name, &$msg) {
    global $mainframe;
    $absolute_path = JPATH_ROOT;
    $baseDir = $absolute_path . '/tmp';

    if (file_exists($baseDir)) {
        if (is_writable($baseDir)) {
            if (move_uploaded_file($filename, $baseDir . $userfile_name)) {
                if (Chmod($baseDir . $userfile_name, 0757)) {
                    return true;
                } else {
                    $msg = 'Failed to change the permissions of the uploaded file.';
                }
            } else {
                $msg = 'Failed to move uploaded file to <code>/tmp</code> directory.';
            }
        } else {
            $msg = 'Upload failed as <code>/tmp</code> directory is not writable.';
        }
    } else {
        $msg = 'Upload failed as <code>/tmp</code> directory does not exist.';
    }
    return false;
}




function import_styles() {
   $database = &JFactory::getDBO();
    $absolute_path = JPATH_ROOT;
    //echo $absolute_path;
    $userfile = JRequest::getVar('userfile', null, 'files', 'array');
$counter=0;
    if (!$userfile) {

        exit();
    }

    $msg = '';

    move_uploaded_file($userfile['tmp_name'], $absolute_path . '/tmp/' . $userfile['name']);
    $msg = extractArchive($userfile['name']);

    
    $handle = opendir($msg);
   
    while ($file = readdir($handle)) {
      //  echo $file."<br />";
        if ($file == "." || $file == ".." ) {
            
        } else if (substr($file,strlen($file)-3) == "swm" ){
            $row2=new stdClass();
            $counter++;
             $str=file_get_contents($msg."/".$file);
             $params = sw_stringToObject($str);
                        while (list ($key, $val) = each($params)) {
                            $row2->$key = $val;
                         }
            
            
           $row = & JTable::getInstance('module');
           $row->title = $row2->title;
           $row->module = "mod_swmenupro";
           if (!$row->store()) {
            echo "<script> alert('" . $row->getError() . "'); window.history.go(-1); </script>\n";
            exit();
        }
        $row->checkin();
        $old_id=$row2->id;
        $row2->id=$row->id;
      ///  echo $row->id;
        $temp="";
           while (list ($key, $val) = each($row2)) {
                         $temp.=$key."=".$val."\n";  
                         
            }
                   
        $database->setQuery("INSERT INTO #__swmenupro_styles VALUES ('','" . $row->id . "','" . $temp . "')");
        $database->query();
        
        
         if(file_exists($msg."/css/".$row2->title.".css")){
             $str=file_get_contents($msg."/css/".$row2->title.".css");  
             $tempstr=str_replace($old_id,$row->id,$str);
             file_put_contents($absolute_path . '/modules/mod_swmenupro/styles/menu'.$row->id.'.css',$tempstr);
                
                }
        
        
        
          // echo $str."<br />";
        }else if ($file == "fonts" ){
           copydirr($msg . "/fonts/", $absolute_path . '/modules/mod_swmenupro/fonts', 0757, false); 
        }else if ($file == "images" ){
           copydirr($msg . "/images/", $absolute_path ."/images", 0757, false); 
        }
       
          // copydirr($msg . "/images/", $absolute_path ."/images", 0757, false); 
        
     }
    closedir($handle);
    
    
    if($counter){
   $message ="Imported ".$counter." new menu modules.";
   }else{
       $message="File did not contain any exported styles";
       }
   

    sw_deldir($msg);
    unlink($absolute_path . "/tmp/" . $userfile['name']);
 echo "<div id=\"successful\"><div id=\"sw_dialog\" >
		$message</div></div>\n";
    
        JToolbarHelper::title(JText::_('swMenuPro: Menu Module Manager'));
        showModules();
    
}



function extractArchive($filename) {
    global $mainframe;
    $absolute_path = JPATH_ROOT;

    $base_Dir = $absolute_path . '/tmp/';

    $archivename = $base_Dir . $filename;
    $tmpdir = uniqid('install_');

    $extractdir = $base_Dir . $tmpdir;
    //$archivename 	= mosPathName( $archivename;
//echo $archivename;
    //$this->unpackDir( $extractdir );

    if (preg_match('/.zip$/', $archivename)) {
        // Extract functions
        require_once( $absolute_path . '/administrator/components/com_swmenupro/pcl/pclzip.lib.php' );
        require_once( $absolute_path . '/administrator/components/com_swmenupro/pcl/pclerror.lib.php' );
        require_once( $absolute_path . '/administrator/components/com_swmenupro/pcl/pcltrace.lib.php' );
        //require_once( $absolute_path . '/administrator/includes/pcl/pcltar.lib.php' );
        $zipfile = new PclZip($archivename);
        //if($this->isWindows()) {
        //		define('OS_WINDOWS',1);
        //	} else {
        //		define('OS_WINDOWS',0);
        //	}

        $ret = $zipfile->extract(PCLZIP_OPT_PATH, $extractdir);
        if ($ret == 0) {
            //$this->setError( 1, 'Unrecoverable error "'.$zipfile->errorName(true).'"' );
            return false;
        }
    } else {
        require_once( $absolute_path . '/administrator/components/com_swmenupro/pcl/Tar.php' );
        $archive = new Archive_Tar($archivename);
        $archive->setErrorHandling(PEAR_ERROR_PRINT);

        if (!$archive->extractModify($extractdir, '')) {
            $this->setError(1, 'Extract Error');
            return false;
        }
    }


    return $extractdir;
}

function sw_deldir($dir) {
    $current_dir = opendir($dir);
    $old_umask = umask(0);
    while ($entryname = readdir($current_dir)) {
        if ($entryname != '.' and $entryname != '..') {
            if (is_dir($dir . "/" . $entryname)) {
                sw_deldir($dir . "/" . $entryname);
            } else {
                @chmod($dir . "/" . $entryname, 0777);
                unlink($dir . "/" . $entryname);
            }
        }
    }
    umask($old_umask);
    closedir($current_dir);
    return rmdir($dir);
}

function TableExists($tablename) {
    $exists=FALSE;
    $database = &JFactory::getDBO();
    $test=$database->getTableList();
    while (list ($key, $val) = each($test)) {
        if($val==$tablename){
            $exists=TRUE;
        }
  }
   return $exists;
}

function sw_stringToObject($data) {
    $lines = explode("\n", $data);
$obj= new stdClass();
    // Process the lines.
    foreach ($lines as $line) {
        // Trim any unnecessary whitespace.
        $line = trim($line);

        // Ignore empty lines and comments.
        if (empty($line) || ($line{0} == ';')) {
            continue;
        }

        // Check that an equal sign exists and is not the first character of the line.
        if (!strpos($line, '=')) {
            // Maybe throw exception?
            continue;
        }

        // Get the key and value for the line.
        list ($key, $value) = explode('=', $line, 2);

        // Validate the key.
        if (preg_match('/[^A-Z0-9_]/i', $key)) {
            // Maybe throw exception?
            continue;
        }

        // If the value is quoted then we assume it is a string.
        $length = strlen($value);
        if ($length && ($value[0] == '"') && ($value[$length - 1] == '"')) {
            // Strip the quotes and Convert the new line characters.
            $value = stripcslashes(substr($value, 1, ($length - 2)));
            $value = str_replace('\n', "\n", $value);
        } else {
            // If the value is not quoted, we assume it is not a string.
            // If the value is 'false' assume boolean false.
            if ($value == 'false') {
                $value = false;
            }
            // If the value is 'true' assume boolean true.
            elseif ($value == 'true') {
                $value = true;
            }
            // If the value is numeric than it is either a float or int.
            elseif (is_numeric($value)) {
                // If there is a period then we assume a float.
                if (strpos($value, '.') !== false) {
                    $value = (float) $value;
                } else {
                    $value = (int) $value;
                }
            }
        }


        $obj->$key = $value;
    }

    // Cache the string to save cpu cycles -- thus the world :)


    return $obj;
}

function getPositions() {
    //	jimport('joomla.filesystem.folder');
    //Get the database object
    $db = & JFactory::getDBO();

    // template assignment filter
    $query = 'SELECT DISTINCT(template) AS text, template AS value' .
            ' FROM #__templates_menu';
    $db->setQuery($query);
    $templates = $db->loadObjectList();

    // Get a list of all module positions as set in the database
    $query = 'SELECT DISTINCT (position) ' .
            ' FROM #__modules';
    ' WHERE client_id="0"';
    $db->setQuery($query);
    $positions = $db->loadObjectList();
    $positions = (is_array($positions)) ? $positions : array();

    // Get a list of all template xml files for a given application

    for ($i = 0, $n = count($templates); $i < $n; $i++) {
        $path = JPATH_ROOT . DS . 'templates' . DS . $templates[$i]->value;
        //echo $path;

        $xml = & JFactory::getXMLParser('Simple');
        if ($xml->loadFile($path . DS . 'templateDetails.xml')) {
            $p = & $xml->document->getElementByPath('positions');
            if (is_a($p, 'JSimpleXMLElement') && count($p->children())) {
                foreach ($p->children() as $child) {
                    if (!in_array($child->data(), $positions)) {
                        //	$positions[] = $child->data();
                        $positions[$child->data()] = array();
                        //	echo $child->data();
                    }
                }
            }
        }
    }


    if (defined('_JLEGACY') && _JLEGACY == '1.0') {
        $positions[] = 'left';
        $positions[] = 'right';
        $positions[] = 'top';
        $positions[] = 'bottom';
        $positions[] = 'inset';
        $positions[] = 'banner';
        $positions[] = 'header';
        $positions[] = 'footer';
        $positions[] = 'newsflash';
        $positions[] = 'legals';
        $positions[] = 'pathway';
        $positions[] = 'breadcrumb';
        $positions[] = 'user1';
        $positions[] = 'user2';
        $positions[] = 'user3';
        $positions[] = 'user4';
        $positions[] = 'user5';
        $positions[] = 'user6';
        $positions[] = 'user7';
        $positions[] = 'user8';
        $positions[] = 'user9';
        $positions[] = 'advert1';
        $positions[] = 'advert2';
        $positions[] = 'advert3';
        $positions[] = 'debug';
        $positions[] = 'syndicate';
    }

    //$positions = array_unique($positions);
    //sort($positions);
    //array_flip($positions);
//echo count($positions);
    return $positions;
}

?>
