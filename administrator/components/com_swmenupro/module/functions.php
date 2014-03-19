<?php

defined('_JEXEC') or die('Restricted access');

function swGetMenu($menu, $id, $hybrid, $use_table, $parent_id, $levels) {
   $swmenupro_array=swGetMenuLinks($menu,$id,$hybrid,$use_table);
                        //echo $menu.$id.count($swmenupro_array);
			$final_menu=get_Final_Menu($swmenupro_array, $parent_id, $levels);
	  
       // echo count($final_menu);
        return $final_menu;
}

function get_Final_Menu($swmenupro_array, $parent_id, $levels) {
   
    $valid = 1;
    $my = JFactory::getUser();
    //$param= & JForm::bind();
    $final_menu = array();
    $group = ($my->getAuthorisedGroups());
    //print_r ($group);
    if (count($group) < 2) {
        $group[0] = 1;
        $group[1] = 1;
    }

    $access = $my->getAuthorisedViewLevels();

    for ($i = 0; $i < count($swmenupro_array); $i++) {
        $swmenu = $swmenupro_array[$i];
        if ($swmenu['SHOWITEM'] == null || $swmenu['SHOWITEM'] == 1) {
            $swmenu['SHOWITEM'] = 1;
        } else {
            $swmenu['SHOWITEM'] = 0;
        }

        //if(($swmenu['ACCESS']<=($group[1]) && $swmenu['SHOWITEM'] ) ){
        if (in_array((int) $swmenu['ACCESS'], $access) && $swmenu['SHOWITEM']) {
            if ($swmenu['PARENT'] == $parent_id) {
                $valid++;
            }


            if (strcasecmp(substr($swmenu['URL'], 0, 4), "http")) {
                $swmenu['URL'] = JRoute::_($swmenu['URL'], 1, $swmenu['SECURE']);
            }
            //echo $swmenu['URL'];
            $swmenu['URL'] = str_replace('&amp;', '&', $swmenu['URL']);
            $final_menu[] = array("TITLE" => $swmenu['TITLE'], "URL" => $swmenu['URL'], "ID" => $swmenu['ID'], "PARENT" => $swmenu['PARENT'], "ORDER" => $swmenu['ORDER'], "IMAGE" => $swmenu['IMAGE'], "IMAGEOVER" => $swmenu['IMAGEOVER'], "SHOWNAME" => $swmenu['SHOWNAME'], "IMAGEALIGN" => $swmenu['IMAGEALIGN'], "TARGETLEVEL" => $swmenu['TARGETLEVEL'], "TARGET" => $swmenu['TARGET'], "ACCESS" => $swmenu['ACCESS'], "NCSS" => $swmenu['NCSS'], "OCSS" => $swmenu['OCSS'], "SHOWITEM" => $swmenu['SHOWITEM'], "HTML" => $swmenu['HTML'],"HTML_POSITION" =>$swmenu['HTML_POSITION']);
        }
    }
    //  echo count($final_menu)."ff";
    if (count($final_menu) && $valid) {
        $final_menu = chain('ID', 'PARENT', 'ORDER', $final_menu, $parent_id, 25);
    } else {
        $final_menu = array();
    }
    //echo count($final_menu);
    return $final_menu;
}

function swGetMenuLinks($menu, $id, $hybrid, $use_tables) {
   $database = JFactory::getDBO();
	$config=JFactory::getConfig();
	$time_offset=0;
	$now = date( "Y-m-d H:i:s", time()+$time_offset*60*60 );
    $swmenupro_array = array();
    //echo $use_tables;
    if ($menu == "swcontentmenu") {


        $sql = "SELECT #__categories.* , #__swmenu_extended.* 
                FROM #__categories LEFT JOIN #__swmenu_extended ON (#__categories.id) = #__swmenu_extended.menu_id
                WHERE (#__swmenu_extended.moduleID = '" . $id . "' OR #__swmenu_extended.moduleID IS NULL)
                AND #__categories.extension='com_content'
                AND #__categories.published = 1
                
                ORDER BY lft
                ";

        $database->setQuery($sql);
        $result = $database->loadObjectList();

        for ($i = 0; $i < count($result); $i++) {
            $result2 = $result[$i];


            if (!$use_tables) {
                $url = "index.php?option=com_content&view=category&id=" . $result2->id;
            } else {
                $url = "index.php?option=com_content&view=category&layout=blog&id=" . $result2->id;
            }

            $swmenupro_array[] = array("TITLE" => $result2->title, "URL" => $url, "ID" => $result2->id, "SECURE" => 0, "PARENT" => $result2->parent_id, "ORDER" => $result2->lft, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => $result2->access, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item, "HTML" => $result2->custom_html,"HTML_POSITION" =>$result2->html_position);
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


            $url = "index.php?option=com_content&view=article&id=" . $result2->id;
            $swmenupro_array[] = array("TITLE" => $result2->title, "URL" => $url, "ID" => $result2->id + 10000, "SECURE" => 0, "PARENT" => $result2->catid, "ORDER" => $result2->ordering, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => $result2->access, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item, "HTML" => $result2->custom_html,"HTML_POSITION" =>$result2->html_position);
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
            $swmenupro_array[] = array("TITLE" => $result2->category_name, "URL" => $url, "ID" => ($result2->virtuemart_category_id + 10000), "SECURE" => 0, "PARENT" => ($result2->category_parent_id ? (($result2->category_parent_id + 10000)) : 0), "ORDER" => $result2->ordering, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => 1, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item, "HTML" => $result2->custom_html,"HTML_POSITION" =>$result2->html_position);

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
                    $swmenupro_array[] = array("TITLE" => $result4->product_name, "URL" => $url, "ID" => ($result4->virtuemart_product_id + 100000), "SECURE" => 0, "PARENT" => ($result2->virtuemart_category_id ? (($result2->virtuemart_category_id + 10000)) : 0), "ORDER" => $result2->ordering, "IMAGE" => $result4->image, "IMAGEOVER" => $result4->image_over, "SHOWNAME" => $result4->show_name, "IMAGEALIGN" => $result4->image_align, "TARGETLEVEL" => $result4->target_level, "TARGET" => 0, "ACCESS" => 1, "NCSS" => $result4->normal_css, "OCSS" => $result4->over_css, "SHOWITEM" => $result4->show_item, "HTML" => $result4->custom_html,"HTML_POSITION" =>$result4->html_position);
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
            $url = "index.php?option=com_mtree&task=listcats&cat_id=" . $result2->cat_id . "&Itemid=" . ($result2->cat_id);
            $swmenupro_array[] = array("TITLE" => $result2->cat_name, "URL" => $url, "ID" => $result2->cat_id, "PARENT" => $result2->cat_parent, "SECURE" => 0, "ORDER" => $result2->ordering, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => 0, "ACCESS" => 0, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item, "HTML" => $result2->custom_html,"HTML_POSITION" =>$result2->html_position);
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
//jimport( 'joomla.html.application' );
        $swmenupro_array = array();
        //echo $preview;
        $preview = JRequest::getVar('preview', 0);
        //echo $preview;
        if (!$preview) {
            $menu_items = @ JSite::getMenu();
        }
//print_r ($menu_items);
          $language=$config->get('language');
        for ($i = 0; $i < count($result); $i++) {
            $result2 = $result[$i];


//$item       =  $menu_items->getActive();
            if (!$preview) {
                $params =  $menu_items->getParams($result2->id);
                $iSecure = $params->get('secure', 0);
            } else {
                $iSecure = 0;
            }


            switch ($result2->type) {
                case 'separator';
                    $mylink = "javascript:void(0);";
                    break;

                case 'url':
                    $mylink = $result2->link;
                    if (preg_match("/index.php\?/i", $result2->link)) {
                        if (!preg_match("/Itemid=/i", $result2->link)) {
                            $mylink .= "&Itemid=$result2->id";
                        }
                    }
                    break;

                case 'menulink';
                    $mylink = $result2->link;
                    break;

                case 'alias';
                    if (!$preview) {
                        $alias = $params->get('aliasoptions', $result2->id);
                    } else {
                        $alias = "";
                    }
                    //$mylink = $result2->link;
                    //echo $test;
                    $mylink = "index.php?Itemid=" . $alias;
                    break;

                default:
                    $mylink = "index.php?Itemid=" . $result2->id;
                    break;
            }
             if($result2->language==$language || $result2->language=="*"){
            //echo "parent ".$result2->parent_id." order ".$result2->lft;
            $swmenupro_array[] = array("TITLE" => $result2->title, "URL" => $mylink, "ID" => $result2->id, "SECURE" => $iSecure, "PARENT" => $result2->parent_id, "ORDER" => $result2->lft, "IMAGE" => $result2->image, "IMAGEOVER" => $result2->image_over, "SHOWNAME" => $result2->show_name, "IMAGEALIGN" => $result2->image_align, "TARGETLEVEL" => $result2->target_level, "TARGET" => $result2->browserNav, "ACCESS" => $result2->access, "NCSS" => $result2->normal_css, "OCSS" => $result2->over_css, "SHOWITEM" => $result2->show_item, "HTML" => $result2->custom_html,"HTML_POSITION" =>$result2->html_position);
}
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
                            $swmenupro_array[] = array("TITLE" => $row->title, "URL" => $url, "ID" => $row->id + 100000, "SECURE" => $iSecure, "PARENT" => $result2->id, "ORDER" => $row->ordering, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0, "ACCESS" => $row->access, "NCSS" => $row->normal_css, "OCSS" => $row->over_css, "SHOWITEM" => $row->show_item, "HTML" => $row->custom_html,"HTML_POSITION" =>$row->html_position);
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
                            $swmenupro_array[] = array("TITLE" => $row->title, "URL" => $url, "ID" => $row->id + 10000, "SECURE" => $iSecure, "PARENT" => $result2->id, "ORDER" => $row->lft, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0, "ACCESS" => $row->access, "NCSS" => $row->normal_css, "OCSS" => $row->over_css, "SHOWITEM" => $row->show_item, "HTML" => $row->custom_html,"HTML_POSITION" =>$row->html_position);

                            for ($n = 0; $n < count($hybrid_cat); $n++) {
                                $row3 = $hybrid_cat[$n];
                                if ($row3->parent_id == $row->id) {
                                    //echo "hello";	
                                    if (!$use_tables) {
                                        $url = "index.php?option=com_content&view=category&id=" . $row3->id . "&Itemid=" . $result2->id;
                                    } else {
                                        $url = "index.php?option=com_content&view=category&layout=blog&id=" . $row3->id . "&Itemid=" . $result2->id;
                                    }
                                    $swmenupro_array[] = array("TITLE" => $row3->title, "URL" => $url, "ID" => $row3->id + 10000, "SECURE" => $iSecure, "PARENT" => $row->id + 10000, "ORDER" => $row->lft, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0, "ACCESS" => $row->access, "NCSS" => $row->normal_css, "OCSS" => $row->over_css, "SHOWITEM" => $row->show_item, "HTML" => $row->custom_html,"HTML_POSITION" =>$row->html_position);
                                    for ($k = 0; $k < count($hybrid_content); $k++) {
                                        $row2 = $hybrid_content[$k];
                                        if ($row2->catid == $row3->id) {

                                            $url = "index.php?option=com_content&view=article&catid=" . $row->id . "&id=" . $row2->id . "&Itemid=" . $result2->id;
                                            $swmenupro_array[] = array("TITLE" => $row2->title, "URL" => $url, "ID" => $row2->id + 100000, "SECURE" => $iSecure, "PARENT" => $row3->id + 10000, "ORDER" => $row2->ordering, "IMAGE" => $row2->image, "IMAGEOVER" => $row2->image_over, "SHOWNAME" => $row2->show_name, "IMAGEALIGN" => $row2->image_align, "TARGETLEVEL" => $row2->target_level, "TARGET" => 0, "ACCESS" => $row2->access, "NCSS" => $row2->normal_css, "OCSS" => $row2->over_css, "SHOWITEM" => $row2->show_item, "HTML" => $row2->custom_html,"HTML_POSITION" =>$row2->html_position);
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
                                            $swmenupro_array[] = array("TITLE" => $row4->title, "URL" => $url, "ID" => $row4->id + 10000, "SECURE" => $iSecure, "PARENT" => $row3->id + 10000, "ORDER" => $row->lft, "IMAGE" => $row->image, "IMAGEOVER" => $row->image_over, "SHOWNAME" => $row->show_name, "IMAGEALIGN" => $row->image_align, "TARGETLEVEL" => $row->target_level, "TARGET" => 0, "ACCESS" => $row->access, "NCSS" => $row->normal_css, "OCSS" => $row->over_css, "SHOWITEM" => $row->show_item, "HTML" => $row->custom_html,"HTML_POSITION" =>$row->html_position);

                                            for ($k = 0; $k < count($hybrid_content); $k++) {
                                                $row2 = $hybrid_content[$k];
                                                if ($row2->catid == $row4->id) {

                                                    $url = "index.php?option=com_content&view=article&catid=" . $row->id . "&id=" . $row2->id . "&Itemid=" . $result2->id;
                                                    $swmenupro_array[] = array("TITLE" => $row2->title, "URL" => $url, "ID" => $row2->id + 100000, "SECURE" => $iSecure, "PARENT" => $row4->id + 10000, "ORDER" => $row2->ordering, "IMAGE" => $row2->image, "IMAGEOVER" => $row2->image_over, "SHOWNAME" => $row2->show_name, "IMAGEALIGN" => $row2->image_align, "TARGETLEVEL" => $row2->target_level, "TARGET" => 0, "ACCESS" => $row2->access, "NCSS" => $row2->normal_css, "OCSS" => $row2->over_css, "SHOWITEM" => $row2->show_item, "HTML" => $row2->custom_html,"HTML_POSITION" =>$row2->html_position);
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
                                    $swmenupro_array[] = array("TITLE" => $row2->title, "URL" => $url, "ID" => $row2->id + 100000, "SECURE" => $iSecure, "PARENT" => $row->id + 10000, "ORDER" => $row2->ordering, "IMAGE" => $row2->image, "IMAGEOVER" => $row2->image_over, "SHOWNAME" => $row2->show_name, "IMAGEALIGN" => $row2->image_align, "TARGETLEVEL" => $row2->target_level, "TARGET" => 0, "ACCESS" => $row2->access, "NCSS" => $row2->normal_css, "OCSS" => $row2->over_css, "SHOWITEM" => $row2->show_item, "HTML" => $row2->custom_html,"HTML_POSITION" =>$row2->html_position);
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



function AccordTransMenu($ordered, $swmenupro) {
   
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
    // echo $expand;
    $topcounter = 0;
    $counter = 0;
    $subcount = -1;
    $doMenu = 1;
    $act = 0;
    $sub_str="";
    $sub_menu="";
    $uniqueID = $swmenupro['id'];
    $number = count($ordered);
    $topmenu = chain('ID', 'PARENT', 'ORDER', $ordered, $swmenupro['parentid'], 1);
    $topcount = count($topmenu);
    
    $indicator_image1="";
    $indicator_image2="";
    
   if ($swmenupro['top_sub_indicator']) {
        // echo $top_sub_indicator;
        $indicator_image1 = "<img src='" . $live_site . $swmenupro['top_sub_indicator'] . "' align='" . $swmenupro['top_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['top_sub_indicator_left'] . "px;top:" . $swmenupro['top_sub_indicator_top'] . "px;' alt=''  border='0' />";
    }
    if ($swmenupro['sub_sub_indicator']) {
        $indicator_image2 = "<img src='" . $live_site . $swmenupro['sub_sub_indicator'] . "' align='" . $swmenupro['sub_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['sub_sub_indicator_left'] . "px;top:" . $swmenupro['sub_sub_indicator_top'] . "px;' alt=''  border='0' />";
    }
    
        $str = "\n<table cellpadding='0' cellspacing='0' border='0' id=\"accord-menu" . $uniqueID . "\"><tr><td>\n<div id=\"click-menu" . $uniqueID . "\" class=\"click-menu" . $uniqueID . "\" ><table cellpadding='0' cellspacing='0' border='0'><tr> \n";
       $str.=$swmenupro['orientation']=='vertical'?"<td>":""   ;
        $act = "";
        while ($doMenu) {
            if ($ordered[$counter]['indent'] == 0) {
                $topcounter++;
                $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
                $hasSub = 0;
                $name = swmenu_getname($ordered[$counter]);
                if ($counter + 1 == $number) {
                    $doSubMenu = 0;
                    $topmenu[$topcounter]['hassub'] = 0;
                    $doMenu = 0;
                    $classname = "nonbox" . $uniqueID;
                } elseif ($ordered[$counter + 1]['indent'] == 0) {
                    $doSubMenu = 0;
                    $topmenu[$topcounter]['hassub'] = 0;
                    $classname = "nonbox" . $uniqueID;
                } else {
                    $doSubMenu = 1;
                    $act == $topcounter ? $topmenu[($topcounter)]['hassub'] = 1 : $topmenu[($topcounter)]['hassub'] = 0;
                    $classname = "box" . $uniqueID;
                    $subcount++;
                    if ($swmenupro['disable_parent']) {
                        $ordered[$counter]['URL'] = "javascript:void(0);";
                    }
                }
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu']) && $doSubMenu) {
                    $act = $subcount;
                } elseif (($ordered[$counter]['ID'] == $swmenupro['active_menu']) && !$doSubMenu) {
                    $act = "";
                }
                 $str.=$swmenupro['orientation']=='horizontal'?"<td>":""   ;
                $linktext = "id=\"slideclick" . $uniqueID . $topcounter . "\" class=\"" . (($ordered[$counter]['ID'] == $swmenupro['active_menu']) ? "inbox1 act" : "inbox1") . "" . ($topcounter == $topcount ? " last" : "" ) . "\"";
                if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                    $str .= '<div class="' . $classname . '" id="topclick' . $uniqueID . ($counter + 1) . '"><a  ' . $linktext . ' href="javascript:void(0);" >' . $name . '</a></div>' . "\n";
                } else {
                    switch ($ordered[$counter]['TARGET']) {
                        case 1:
                            $str .= '<div class="' . $classname . '" id="topclick' . $uniqueID . ($counter + 1) . '"><a  ' . $linktext . ' href="' . $ordered[$counter]['URL'] . '" target="_blank" >' . $name . '</a></div>' . "\n";
                            break;
                        case 2:
                            $str .= "<div class='" . $classname . "' id='topclick" . $uniqueID . ($counter + 1) . "'><a ' . $linktext . ' href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" >" . $name . "</a></div>\n";
                            break;
                        case 3:
                            $str .= "<div class='" . $classname . "' id='topclick" . $uniqueID . ($counter + 1) . "'>" . $name . "\n";
                            break;
                        default:
                            $str .= '<div class="' . $classname . '" id="topclick' . $uniqueID . ($counter + 1) . '"><a ' . $linktext . ' href="' . $ordered[$counter]['URL'] . '" >' . $name . '</a></div>' . "\n";
                            break;
                    }
                }
                $counter++;
                if (!$doSubMenu) {
                   // $str.= '<div style="position:absolute;top:-3000px;left:-3000px;" class="section' . $uniqueID . '"></div>' . "\n";
                }
                 $str.=$swmenupro['orientation']=='horizontal'?"</td>":""   ;
                while ($doSubMenu) {
                    if ($ordered[$counter]['indent'] != 0) {
                        if (($ordered[$counter]['indent'] == 1) && ($ordered[$counter - 1]['indent'] == 0)) {
                            $sub_str = '<div id="subsection' . $uniqueID . $topcounter . '" class="section' . $uniqueID . '">' . "\n";
                           $sub_str.=$swmenupro['orientation']=='horizontal'?"<table cellpadding='0' cellspacing='0'><tr>":""   ;
                        }
                        $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
                        $name = swmenu_getname($ordered[$counter]);
                        if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] == 0)) {
                            $doSubMenu = 0;
                        }
                        if ($ordered[$counter]['indent'] == 1) {
                           // $ordered[$counter]['indent'] = 1;
                        
                     
                        $classname = "inbox2";
                        if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']) {
                            $classname .= " first";
                        }
                        if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] == 0)) {
                            $classname .= " last";
                        }

                         if (!$swmenupro['preview']){
                           $sub_itemid=sw_getsubactive($ordered);
                       }else{
                           $sub_itemid=0;
                       }

                        if ($sub_itemid == $ordered[$counter]['ID']) {
                            $classname .= ' sub-active';
                        }
                         if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['levelx_sub_indicator']) {

                         $name = "<img src='" . $live_site . $swmenupro['levelx_sub_indicator'] . "' align='" . $swmenupro['levelx_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['levelx_sub_indicator_left'] . "px;top:" . $swmenupro['levelx_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name;
                       }
                         $sub_str.=$swmenupro['orientation']=='horizontal'?"<td>":""   ;
                        if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                            $sub_str .= "<a id=\"menu" . $uniqueID . $ordered[$counter]['ID'] . "\" class=\"" . $classname . "\" href=\"javascript:void(0);\" >" . $name . "</a>\n";
                        } else {
                            switch ($ordered[$counter]['TARGET']) {
                                case 1:
                                    $sub_str .= '<a  id="menu' . $uniqueID . $ordered[$counter]['ID'] . '" class="' . $classname . '" href="' . $ordered[$counter]['URL'] . '" target="_blank" >' . $name . '</a>' . "\n";
                                    break;
                                case 2:
                                    $sub_str .= "<a  id=\"menu" . $uniqueID . $ordered[$counter]['ID'] . "\" class=\"" . $classname . "\" href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" >" . $name . "</a>\n";
                                    break;
                                case 3:
                                    $sub_str .= '' . $name . '' . "\n";
                                    break;
                                default:
                                    $sub_str .= '<a  id="menu' . $uniqueID . $ordered[$counter]['ID'] . '" class="' . $classname . '" href="' . $ordered[$counter]['URL'] . '" >' . $name . '</a>' . "\n";
                                    break;
                            }
                        }
                        
                         $sub_str.=$swmenupro['orientation']=='horizontal'?"</td>":""   ;
                        
                        }
                        $counter++;
                        $hasSub = 1;
                    }
                }
            }
            if ($hasSub == 1) {
                $sub_str.=$swmenupro['orientation']=='horizontal'?"</tr></table>":""   ;
                $sub_str .= "</div> \n";
                
                if($swmenupro['orientation']=='vertical'){
                $str.=$sub_str;
                }else{
                 $sub_menu.=$sub_str;   
                }
            } else {
                $str .= " \n";
            }
            if ($counter == ($number)) {
                $doMenu = 0;
            }
        }
        $str.=$swmenupro['orientation']=='vertical'?"</td>":""   ;
        $str .= "</tr></table></div></td></tr></table>\n";
       // echo $swmenupro['orientation'];
     if($swmenupro['orientation']=='horizontal'){
                $str.="<div class='click-menu".$swmenupro['id']."' >".$sub_menu."</div>\n";
                }
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
    $str .= "/***********************************************\n";
    $str .= "* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)\n";
    $str .= "* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts\n";
    $str .= "* This notice must stay intact for legal use\n";
    $str .= "***********************************************/\n\n";
    $str .= "ddaccordion.init({\n";
    $str .= "headerclass: 'box" . $uniqueID . "',\n";
    $str .= "contentclass: 'section" . $uniqueID . "',\n";
    $str .= "revealtype:'" . ($swmenupro['revealtype'] ? 'click' : 'mouseover') . "',\n";
    $str .= "mouseoverdelay: " . $swmenupro['specialB'] . ",\n";
    $str .= "collapseprev: " . ($swmenupro['autoclose'] ? 'true' : 'false') . ", \n";
    $str .= "defaultexpanded: [" . $act . "],\n";
    $str .= "onemustopen: false,\n";
    $str .= "animatedefault: false,\n";
    $str .= "persiststate: false,\n";
    $str .= "toggleclass: ['','active'],\n";
    $str .= "togglehtml: [\"prefix\", \"" . $indicator_image1 . "\", \"" . $indicator_image2 . "\"],\n";
    $str .= "animatespeed:'normal',\n";
   
    $str .= "oninit:function(headers, expandedindices){ },\n";
    $str .= "onopenclose:function(header, index, state, isuseractivated){ }\n";
    $str .= "})\n";
   // $str .= "jQuery.noConflict();\n";
   
 if (($swmenupro['c_corner_style'] != 'none') && ($swmenupro['c_corner_style'])&& ($swmenupro['c_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_width'] > 0) && ($swmenupro['main_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9 ) {\n";
               // $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').css('z-index','-1');\n";
                 $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').css('border','0');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').wrap('<div></div>');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').parent().css('padding', '" . $swmenupro['main_border_width'] . "px');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').parent().css('background-color', '" . $swmenupro['main_border_color'] . "');\n";
               // $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').parent().corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size'] + $swmenupro['main_border_width']) . "px');\n";
                 $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";              
// $str .= "jQuery('#outerwrap').css('z-index','1');\n";
//                 $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').parent().css('z-index','-1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
            }
        }
    if (($swmenupro['t_corner_style'] != 'none') && ($swmenupro['t_corner_style'])&& ($swmenupro['t_corner_style'] != 'curvycorner')){
        if (($swmenupro['main_border_over_width'] > 0) && ($swmenupro['main_border_over_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').css('z-index','-1');\n";
               // $str .= "jQuery('#swmenu .item1').wrap('<span></span>');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').parent().css('padding', '" . $swmenupro['main_border_over_width'] . "px');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').parent().css('background-color', '" . $swmenupro['main_border_color_over'] . "');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').parent().corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size'] + $swmenupro['main_border_over_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').corner('keep " . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
            }
         }
    if (($swmenupro['s_corner_style'] != 'none') && ($swmenupro['s_corner_style'])&& ($swmenupro['s_corner_style'] != 'curvycorner')){
       
         if (($swmenupro['sub_border_width'] > 0) && ($swmenupro['sub_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
               // $str .= "jQuery('.section').css('z-index','-1');\n";
             //   $str .= "jQuery('.section').wrap('<span></span>');\n";
             //   $str .= "jQuery('.section').parent().css('padding', '" . $swmenupro['sub_border_width'] . "px');\n";
             //   $str .= "jQuery('.section').parent().css('background-color', '" . $swmenupro['sub_border_color'] . "');\n";
                $str .= "jQuery('.section" . $swmenupro['id'] . " .inbox2').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
            //    $str .= "jQuery('.section').parent().corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size'] + $swmenupro['sub_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('.section" . $swmenupro['id'] . " .inbox2').corner('keep " . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               if (@$swmenupro['stl_corner'] + @$swmenupro['str_corner'] != 0) {
                    $str .= "jQuery('.section" . $swmenupro['id'] . " .inbox2.first').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
               if (@$swmenupro['sbl_corner'] + @$swmenupro['sbr_corner'] != 0) {
                    $str .= "jQuery('.section" . $swmenupro['id'] . " .inbox2.last').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
       }
        
        
        
    }
   
    if ($swmenupro['expand_all']) {
       
        $str .= "jQuery(document).ready(function($){\n";
        $str .= "ddaccordion.expandall('box" . $uniqueID . "');\n";
        $str .= "})\n";
       
    }
    
    
     if ($swmenupro['top_ttf']) {
       $str .= "Cufon.replace('.click-menu" . $swmenupro['id'] . " .inbox1',{hover: true, fontFamily: '" . $swmenupro['top_font_face'] . "' });\n";
        $str .= "Cufon.replace('.click-menu" . $swmenupro['id'] . " .inbox1-active',{hover: true, fontFamily: '" . $swmenupro['top_font_face'] . "' });\n";
    }
    if ($swmenupro['sub_ttf']) {
        $str .= "Cufon.replace('.click-menu" . $swmenupro['id'] . " .inbox2',{hover: true, fontFamily: '" . $swmenupro['sub_font_face'] . "' });\n";
        $str .= "Cufon.replace('.click-menu" . $swmenupro['id'] . " .inbox2-active',{hover: true, fontFamily: '" . $swmenupro['sub_font_face'] . "' });\n";
    }
     $str .= "//--> \n";
        $str .= "</script>  \n";
        
        
   // $ordered = $menu;
    $str .= "<div id=\"subwrap" . $swmenupro['id'] . "\"> \n";
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
    $str .= "if (TransMenu.isSupported()) {\n";
    if ($swmenupro['levelx_align'] == "right") {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.right, " . $swmenupro['level1_sub_left'] . ", " . $swmenupro['level1_sub_top'] . ", TransMenu.reference.topRight);\n";
    } else {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.left, " . $swmenupro['level1_sub_left'] . ", " . $swmenupro['level1_sub_top'] . ", TransMenu.reference.topLeft);\n";
    } 
    $par = $ordered[0];
    for ($i = 0; $i < count($ordered); $i++) {
        $sub=$ordered[$i];
        $name = swmenu_getname($sub);
        $sub2 = next($ordered);
        if ($sub['TARGETLEVEL'] == "0" || $sub['TARGET'] == "3") {
            $sub['TARGET'] = 0;
            $sub['URL'] = "javascript:void(0);";
        }
        if (($sub['indent'] == 1) && (($sub2['indent']) > 1)) {
            $str .= "var menu" . $swmenupro['id'] . $sub['ID'] . " = ms.addMenu(document.getElementById(\"menu" . $swmenupro['id'] . $sub['ID'] . "\"));\n ";
        } else if (($sub['ORDER'] == 1) && ($sub['indent'] > 2)) {
            $str .= "var menu" . $swmenupro['id'] . ($sub['ID']) . " = menu" . $swmenupro['id'] . findPar2($ordered, $par) . ".addMenu(menu" . $swmenupro['id'] . findPar2($ordered, $par) . ".items[" . ($par['ORDER'] - 1) . "]," . $swmenupro['levelx_sub_left'] . "," . $swmenupro['levelx_sub_top'] . ");\n";
        }
        if ($sub['indent'] > 1) {
            $str .= "menu" . $swmenupro['id'] . findPar2($ordered, $sub) . ".addItem(\"" . addslashes($name) . "\", \"" . addslashes($sub['URL']) . "\", \"" . $sub['TARGET'] . "\");\n";
        }
        $par = $sub;
    }
    $str .= "function init" . $swmenupro['id'] . "() {\n";
    $str .= "if (TransMenu.isSupported()) {\n";
    $str .= "TransMenu.initialize();\n";
    $counter = 0;
    for ($i = 0; $i < count($ordered); $i++) {
        if ($ordered[$i]['indent'] == 1) {
            $counter++;
            if (@$ordered[$i + 1]['indent'] == 2) {
               
                //$str.="alert(temp_class);";
                $str .= "menu" . $swmenupro['id'] . ($ordered[$i]['ID']) . ".onactivate = function() {\n";
                $str.="temp_class=document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").className;\n";
		$str.="document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").className = temp_class+\" active\";\n";
		$str.="};\n ";
                if ($ordered[$i]['ID'] == $sub_itemid) {
                    $str .= "menu" . $swmenupro['id'] . ($ordered[$i]['ID']) . ".ondeactivate = function() {\n";
				 $str.="temp_class=document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").className;\n";
		$str.="document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").className = temp_class+\" active\";\n";
                $str.="};\n ";
                } else {
                    $str .= "menu" . $swmenupro['id'] . ($ordered[$i]['ID']) . ".ondeactivate = function() {\n";
				// $str.="temp_class=document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").className;\n";
		$str.="document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").className = temp_class;\n";
                $str.="};\n ";
                }
            } else {
                
            }
        }
    }
    $str .= "}}\n";
   if ($swmenupro['levelx_sub_indicator']) {
        $str.="TransMenu.spacerGif = \"" . $live_site . "/modules/mod_swmenupro/images/transmenu/x.gif\";\n";

        $str.="TransMenu.dingbatOn = \"" . $live_site . $swmenupro['levelx_sub_indicator'] . "\";\n";
        $str.="TransMenu.dingbatOff = \"" . $live_site . $swmenupro['levelx_sub_indicator'] . "\"; \n";

        $str.="TransMenu.sub_indicator = true; \n";
    } else {
        $str.="TransMenu.dingbatSize = 0;\n";
        $str.="TransMenu.spacerGif = \"\";\n";
        $str.="TransMenu.dingbatOn = \"\";\n";
        $str.="TransMenu.dingbatOff = \"\"; \n";
        $str.="TransMenu.sub_indicator = false;\n";
    }
    $str .= "TransMenu.menuPadding = 0;\n";
    $str .= "TransMenu.itemPadding = 0;\n";
    $str .= "TransMenu.shadowSize = 2;\n";
    $str .= "TransMenu.shadowOffset = 3;\n";
    $str .= "TransMenu.shadowColor = \"#888\";\n";
    $str .= "TransMenu.shadowPng = \"" . $live_site . "/modules/mod_swmenupro/images/transmenu/grey-40.png\";\n";
    $str .= "TransMenu.backgroundColor = \"" . ($swmenupro['sub_back'] ? $swmenupro['sub_back'] : '#fff') . "\";\n";
    $str .= "TransMenu.backgroundPng = \"" . $live_site . "/modules/mod_swmenupro/images/transmenu/white-90.png\";\n";
    $str .= "TransMenu.hideDelay = " . ($swmenupro['specialB'] * 2) . ";\n";
    $str .= "TransMenu.slideTime = " . $swmenupro['specialB'] . ";\n";
    $str .= "TransMenu.modid = " . $swmenupro['id'] . ";\n";
    $str .= "TransMenu.selecthack = false;\n";
    $str .= "TransMenu.autoposition = true;\n";
    $str .= "TransMenu.fontFace = \"" . (@$fontface ? $fontface : '') . "\";\n";
    $str .= "TransMenu.fontColor = \"" . $swmenupro['main_font_color'] . "\";\n";
    $str .= "TransMenu.activeId = \"" . @$active_id . "\";\n";
    //$str .= "TransMenu.preview = \"" . $preview . "\";\n";
    $str .= "TransMenu.renderAll();\n";
    $str .= "if ( typeof window.addEventListener != \"undefined\" )\n";
    $str .= "window.addEventListener( \"load\", init" . $swmenupro['id'] . ", false );\n";
    $str .= "else if ( typeof window.attachEvent != \"undefined\" ) {\n";
    $str .= "window.attachEvent( \"onload\", init" . $swmenupro['id'] . " );\n";
    $str .= "}else{\n";
    $str .= "if ( window.onload != null ) {\n";
    $str .= "var oldOnload = window.onload;\n";
    $str .= "window.onload = function ( e ) {\n";
    $str .= "oldOnload( e );\n";
    $str .= "init" . $swmenupro['id'] . "();\n";
    $str .= "}\n}else\n";
    $str .= "window.onload = init" . $swmenupro['id'] . "();\n";
    $str .= "}\n}\n-->\n</script>\n</div>\n";
    if ($swmenupro['overlay_hack']) {
        $str .= "<script type=\"text/javascript\">\n";
        $str .= "<!--\n";
        $str .= "jQuery(document).ready(function($){\n";
        $str .= "jQuery('#click-menu" . $uniqueID . "').parents().css('position','static');\n";
        $str .= "jQuery('#click-menu" . $uniqueID . "').parents().css('z-index','100');\n";
        $str .= "jQuery('#click-menu" . $uniqueID . "').css('z-index','101');\n";
        $str .= "});\n";
        $str .= "//--> \n";
        $str .= "</script>  \n";
    }
    return $str;
}




function MultiTabMenu($ordered, $swmenupro) {
   
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
    
       
    $sub_active = 0;
    $name = "";
    $counter = 0;
    $doMenu = 1;
    $uniqueID = $swmenupro['id'];
    $number = count($ordered);
    $activesub = -1;
    $activesub2 = -1;
    $topcount = 0;
    $subcounter = 0;
    $str="";
    

    if(!$swmenupro['complete_width']){
    $str.="<table  id=\"outertable" . $uniqueID . "\" align=\"" . $swmenupro['position'] . "\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td>\n";
    }
    
    $str .= "<div id=\"outerwrap" . $uniqueID . "\" align=\"left\">\n";
    $str .= "<table cellspacing=\"0\" align=\"" . $swmenupro['position'] . "\" border=\"0\" cellpadding=\"0\" id=\"menu" . $uniqueID . "\" class=\"ddmx" . $uniqueID . "\"  > \n";
  
        $str .= "<tr> \n";
  
    while ($doMenu) {
        if ($ordered[$counter]['indent'] == 0) {
            $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
            $name = swmenu_getname($ordered[$counter]);
            if ($swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical/left") {
                $str .= "<tr> \n";
            }
            $act = 0;
            if (islast($ordered, $counter)) {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<td class='item11 acton last'> \n";
                    $act = 1;
                    $activesub = $topcount;
                } else {
                    $str .= "<td class='item11 last'> \n";
                }
            } else {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<td class='item11 acton'> \n";
                    $act = 1;
                    $activesub = $topcount;
                } else {
                    $str .= "<td class='item11'> \n";
                }
            }
            $topcount++;

            if (($counter + 1 != $number) && (@$ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && @$swmenupro['disable_parent']) {

                $ordered[$counter]['URL'] ="javascript:void(0);";
                }

            $classname = "item1";
            if ($ordered[$counter]['indent'] > @$ordered[$counter - 1]['indent']) {
                $classname .= " first";
            }
            if (($counter + 1 == $number) || islast($ordered, $counter)) {
                $classname .= " last";
            }
            if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['top_sub_indicator']) {
             $name = "<div><img src='" . $live_site . $swmenupro['top_sub_indicator'] . "' align='" . $swmenupro['top_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['top_sub_indicator_left'] . "px;top:" . $swmenupro['top_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name."</div>\n";
             }
            if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                $str .= "<a class='" . $classname . "' href=\"javascript:void(0);\" >" . $name . "</a> \n";
            } else {
                switch ($ordered[$counter]['TARGET']) {
                    case 1:
                        $str .= '<a href="' . $ordered[$counter]['URL'] . '" target="_blank" class="' . $classname . '" >' . $name . '</a>';
                        break;
                    case 2:
                        $str .= "<a href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class='" . $classname . "'>" . $name . "</a>\n";
                        break;
                    case 3:
                        $str .= '<a class="' . $classname . '" >' . $name . '</a>';
                        break;
                    default:
                        $str .= '<a href="' . $ordered[$counter]['URL'] . '" class="' . $classname . '">' . $name . '</a>';
                        break;
                }
            }
            if ($counter + 1 == $number) {
                $doSubMenu = 0;
                $doMenu = 0;
                if($swmenupro['level1_fillempty']){
                $str .= "<div class=\"section level1\" ><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td><span class=\"item2 level1\" >&nbsp;</span></td></tr></table></div> \n";
                }else{
                 $str .= "<div class=\"section\" style=\"border:0 !important;display:none;\"></div> \n";   
                }
            } elseif ($ordered[$counter + 1]['indent'] == 0) {
                $doSubMenu = 0;
                if($swmenupro['level1_fillempty']){
                $str .= "<div class=\"section level1\" ><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td><span class=\"item2 level1\" >&nbsp;</span></td></tr></table></div> \n";
                }else{
                 $str .= "<div class=\"section\" style=\"border:0 !important;display:none;\"></div> \n";   
                }
            } else {
                $doSubMenu = 1;
            }
            $counter++;
            if ($activesub2 == -1) {
                $subcounter = 0;
            }
            while ($doSubMenu) {
                if ($ordered[$counter]['indent'] != 0) {
                    if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']&&$ordered[$counter]['indent']==1) {
                        
                            $str .= '<div class="section level1" align=\"left\"><table cellpadding="0" align=\"left\" cellspacing="0" border="0"><tr>';
                        
                    }
                    $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
                    $name = swmenu_getname($ordered[$counter]);
                    if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] == 0)) {
                        $doSubMenu = 0;
                    }
                    $classname="";
                //    if ($ordered[$counter]['indent']==1){
                    $style = " style=\"";
                   
                        $classname .= "item2";
                    
                    if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']) {
                        $classname .= " first";
                    }
                    if (($counter + 1 == $number) || islast($ordered, $counter)) {
                        $classname .= " last";
                    }
                  //  echo $swmenupro['sub_active_menu']."hello";
                    if (($ordered[$counter]['ID']==@$swmenupro['sub_active_menu']) && ($swmenupro['active_menu'])) {
                        $classname .= " subactive";
                    }
                    
                    if ($ordered[$counter]['indent'] ==1) {
                        $classname .= " level1";
                    }else{
                       $classname .= " levelX"; 
                    }
                   if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['sub_sub_indicator']) {

                         $name = "<img src='" . $live_site . $swmenupro['sub_sub_indicator'] . "' align='" . $swmenupro['sub_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['sub_sub_indicator_left'] . "px;top:" . $swmenupro['sub_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name;
                       }
                    $style .= "\" ";
                    
                    if ($ordered[$counter]['indent']==1){
                    $str.="<td>\n";
                    }else if ($ordered[$counter]['indent']>1 && ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent'])){
                    $str.="<div class=\"section\" >\n";
                    }
                    if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                        $str .= "<a class=\"" . $classname . "\"" . $style . " href=\"javascript:void(0);\" >" . $name . "</a> \n";
                    } else {
                        switch ($ordered[$counter]['TARGET']) {
                            case 1:
                                $str .= '<a href="' . $ordered[$counter]['URL'] . '" ' . $style . ' target="_blank" class="' . $classname . '" >' . $name . '</a>';
                                break;
                            case 2:
                                $str .= "<a href=\"#\" " . $style . " onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"" . $classname . "\">" . $name . "</a>\n";
                                break;
                            case 3:
                                $str .= '<a class="' . $classname . '" ' . $style . ' >' . $name . '</a>';
                                break;
                            default:
                                $str .= "<a href=\"" . $ordered[$counter]['URL'] . "\" class=\"" . $classname . "\" " . $style . ">" . $name . "</a>\n";
                                break;
                        }
                    }
                    
                    if ($ordered[$counter]['indent']==1 && @$ordered[$counter + 1]['indent']<=1){
                    $str.="</td>\n";
                    }else if (($counter + 1 == $number) || (@$ordered[$counter + 1]['indent'] < $ordered[$counter]['indent'])) {
                          if (@$ordered[$counter + 1]['indent']!=0){
                        $str .= str_repeat("</div>\n", (($ordered[$counter]['indent']) - (@$ordered[$counter + 1]['indent'])));
                          }else{
                              $str.="</div>\n";
                          }
                        if (@$ordered[$counter + 1]['indent']<=1){
                    $str.="</td>\n";
                    }
                    }
                 //   }
                    if (($counter + 1 == $number) || (@$ordered[$counter + 1]['indent'] ==0)) {
                        $str .= '</tr></table></div>';
                    }
                    $counter++;
                }
            }
        }
        $str .= "</td> \n";
        
          //  $str .= "</tr><tr> \n";
        
        if ($counter == ($number)) {
            $doMenu = 0;
             $str .= "</tr> \n";
        }else{
           //  $str .= "</tr><tr> \n";
        }
    }
    //if ($swmenupro['orientation'] == "horizontal/down" || $swmenupro['orientation'] == "horizontal/left" || $swmenupro['orientation'] == "horizontal/up") {
       // $str .= "</tr> \n";
   // }
    $str .= "</table></div> \n";
     if(!$swmenupro['complete_width']){
    $str.="</td></tr></table>\n";
     }
     
     
    
   
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
    $str .= "function makemenu" . $uniqueID . "(){\n";
    $str .= "var ddmx" . $uniqueID . " = new DropDownMenuX('menu" . $uniqueID . "');\n";
    $str .= "ddmx" . $uniqueID . ".type = 'dyntab'; \n";
    $str .= "ddmx" . $uniqueID . ".orientation = '".$swmenupro['orientation']."'; \n";
     $str .= "ddmx" . $uniqueID . ".level1_width = '" . ($swmenupro['level1_width']?$swmenupro['level1_width']:'complete') . "' ;\n";
    $str .= "ddmx" . $uniqueID . ".delay.show = 0;\n";
    $str .= "ddmx" . $uniqueID . ".iframename = 'ddmx" . $uniqueID . "';\n";
    $str .= "ddmx" . $uniqueID . ".delay.hide = " . $swmenupro['specialB'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".effect = '" . ($swmenupro['extra'] ? $swmenupro['extra'] : 'none') . "';\n";
    $str .= "ddmx" . $uniqueID . ".top_align = '" . ($swmenupro['position'] ? $swmenupro['position'] : 'left') . "';\n";
    $str .= "ddmx" . $uniqueID . ".position.levelX.left = " . $swmenupro['levelx_sub_left'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.levelX.top = " . $swmenupro['levelx_sub_top'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.level1.left = " . $swmenupro['level1_sub_left'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.level1.top = " . $swmenupro['level1_sub_top'] . "; \n";
    $str .= "ddmx" . $uniqueID . ".submarginleft = " . (@$swmenupro['top_margin_left']?$swmenupro['top_margin_left']:0) . ";\n";
    $str .= "ddmx" . $uniqueID . ".submarginright = " . (@$swmenupro['top_margin_right']?$swmenupro['top_margin_right']:0) . "; \n";
     $str .= "ddmx" . $uniqueID . ".topmarginleft = " . (@$swmenupro['complete_margin_left']?$swmenupro['complete_margin_left']:0) . "; \n";
      $str .= "ddmx" . $uniqueID . ".topmarginright = " . (@$swmenupro['complete_margin_right']?$swmenupro['complete_margin_right']:0) . "; \n";
      $str .= "ddmx" . $uniqueID . ".complete_width = " . (@$swmenupro['complete_width']?$swmenupro['complete_width']:0) . ";\n";
    $str .= "ddmx" . $uniqueID . ".fixIeSelectBoxBug = false ;\n";
    $str .= "ddmx" . $uniqueID . ".autoposition = false ;\n";
    $str .= "ddmx" . $uniqueID . ".subalign = '" . ($swmenupro['level1_align']?$swmenupro['level1_align']:'auto') . "' ;\n";
     $str .= "ddmx" . $uniqueID . ".revealtype = '" . ($swmenupro['revealtype']?'click':'hover') . "' ;\n";
     $str .= "ddmx" . $uniqueID . ".stickysubmenu = " . ($swmenupro['level1_open']?'1':'0') . " ;\n";
      $str .= "ddmx" . $uniqueID . ".revert2default = " . ($swmenupro['revert2default']?'1':'0') . " ;\n";
    if ($activesub>-1 ) {
        $str .= "ddmx" . $uniqueID . ".activesub='menu" . $uniqueID . "-" . $activesub . "-section' ;\n";
    } else {
        $str .= "ddmx" . $uniqueID . ".activesub='' ;\n";
    }
    $str .= "ddmx" . $uniqueID . ".init(); \n";
    $str .= "}\n";
    $str .= "if ( typeof window.addEventListener != \"undefined\" )\n";
    $str .= "window.addEventListener( \"load\", makemenu" . $uniqueID . ", false );\n";
  //  $str.= "document.getElementById('menu136-3-section').style.visibility = 'visible';\n";
   // $str.="if (document.all) { document.getElementById('menu136-3-section').style.display = 'block'}\n";
    $str .= "else if ( typeof window.attachEvent != \"undefined\" ) { \n";
   $str .= "window.attachEvent( \"onload\", makemenu" . $uniqueID . " );\n";
 //  $str.= "document.getElementById('menu136-3-section').style.visibility = 'visible';\n";
 //   $str.="if (document.all) { document.getElementById('menu136-3-section').style.display = 'block'}\n";
    $str .= "}\n";
    $str .= "else {\n";
    $str .= "if ( window.onload != null ) {\n";
    $str .= "var oldOnload = window.onload;\n";
    $str .= "window.onload = function ( e ) { \n";
    $str .= "oldOnload( e ); \n";
    $str .= "makemenu" . $uniqueID . "() \n";
    
    
  //  id="menu136-3-section"
    $str .= "} \n";
    $str .= "}  \n";
    $str .= "else  { \n";
    $str .= "window.onload = makemenu" . $uniqueID . "();\n";
    $str .= "} }\n";
    
    $str .= "//--> \n";
    $str .= "</script>  \n";
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
   if (($swmenupro['c_corner_style'] != 'none') && ($swmenupro['c_corner_style'])&& ($swmenupro['c_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_width'] > 0) && ($swmenupro['main_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9 ) {\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').css('z-index','-1');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').wrap('<div></div>');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().css('padding', '" . $swmenupro['main_border_width'] . "px');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().css('background-color', '" . $swmenupro['main_border_color'] . "');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size'] + $swmenupro['main_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
            }
        }
    if (($swmenupro['t_corner_style'] != 'none') && ($swmenupro['t_corner_style'])&& ($swmenupro['t_corner_style'] != 'curvycorner')){
        if (($swmenupro['main_border_over_width'] > 0) && ($swmenupro['main_border_over_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').css('z-index','-1');\n";
               // $str .= "jQuery('#swmenu .item1').wrap('<span></span>');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().css('padding', '" . $swmenupro['main_border_over_width'] . "px');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().css('background-color', '" . $swmenupro['main_border_color_over'] . "');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size'] + $swmenupro['main_border_over_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('keep " . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
            }
         }
    if (($swmenupro['s_corner_style'] != 'none') && ($swmenupro['s_corner_style'])&& ($swmenupro['s_corner_style'] != 'curvycorner')){
       
         if (($swmenupro['sub_border_width'] > 0) && ($swmenupro['sub_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
               // $str .= "jQuery('.section').css('z-index','-1');\n";
             //   $str .= "jQuery('.section').wrap('<span></span>');\n";
             //   $str .= "jQuery('.section').parent().css('padding', '" . $swmenupro['sub_border_width'] . "px');\n";
             //   $str .= "jQuery('.section').parent().css('background-color', '" . $swmenupro['sub_border_color'] . "');\n";
                $str .= "jQuery('.section').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
            //    $str .= "jQuery('.section').parent().corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size'] + $swmenupro['sub_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('.section').corner('keep " . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               if (@$swmenupro['stl_corner'] + @$swmenupro['str_corner'] != 0) {
                    $str .= "jQuery('#menu" . $uniqueID . " .section .item2.first').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
               if (@$swmenupro['sbl_corner'] + @$swmenupro['sbr_corner'] != 0) {
                    $str .= "jQuery('#menu" . $uniqueID . " .section .item2.last').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
       }
        
        
        
    }
    if ($swmenupro['overlay_hack']) {
        $str .= "jQuery('#menu" . $uniqueID . "').parents().css('overflow','visible');\n";
        $str .= "jQuery('html').css('overflow','auto');\n";
        $str .= "jQuery('#menu" . $uniqueID . "').parents().css('z-index','100');\n";
        $str .= "jQuery('#menu" . $uniqueID . "').css('z-index','101');\n";
    }
   if ($swmenupro['top_ttf']) {
       $str .= "Cufon.replace('.ddmx" . $uniqueID . " .item1',{hover: true, fontFamily: '" . $swmenupro['top_font_face']. "' });\n";
    }
    if ($swmenupro['sub_ttf']) {
       
        $str .= "Cufon.replace('.ddmx" . $uniqueID . " .item2',{hover: true, fontFamily: '" . $swmenupro['sub_font_face']. "' });\n";
    }
    $str .= "//-->\n";
    $str .= "</script>\n";
      
    return $str;
}



function Accordian($ordered, $swmenupro) {
   
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
    // echo $expand;
    $topcounter = 0;
    $counter = 0;
    $subcount = -1;
    $doMenu = 1;
    $act = 0;
    $uniqueID = $swmenupro['id'];
    $number = count($ordered);
    $topmenu = chain('ID', 'PARENT', 'ORDER', $ordered, $swmenupro['parentid'], 1);
    $topcount = count($topmenu);
  

    if ($swmenupro['top_sub_indicator']) {
        // echo $top_sub_indicator;
        $indicator_image1 = "<img src='" . $live_site . $swmenupro['top_sub_indicator'] . "' align='" . $swmenupro['top_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['top_sub_indicator_left'] . "px;top:" . $swmenupro['top_sub_indicator_top'] . "px;' alt=''  border='0' />";
    }
    if ($swmenupro['sub_sub_indicator']) {
        $indicator_image2 = "<img src='" . $live_site . $swmenupro['sub_sub_indicator'] . "' align='" . $swmenupro['sub_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['sub_sub_indicator_left'] . "px;top:" . $swmenupro['sub_sub_indicator_top'] . "px;' alt=''  border='0' />";
    }


        $str = "\n<table id=\"menu" . $uniqueID . "\" align=\"" . $swmenupro['position'] . "\" ><tr><td><div id=\"click-menu" . $uniqueID . "\" class=\"click-menu" . $uniqueID . "\" > \n";
        $act = "";
        while ($doMenu) {
            if ($ordered[$counter]['indent'] == 0) {
                $topcounter++;
                $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
                $hasSub = 0;
                $name = swmenu_getname($ordered[$counter]);
                if ($counter + 1 == $number) {
                    $doSubMenu = 0;
                    $topmenu[$topcounter]['hassub'] = 0;
                    $doMenu = 0;
                    $classname = "nonbox" . $uniqueID;
                } elseif ($ordered[$counter + 1]['indent'] == 0) {
                    $doSubMenu = 0;
                    $topmenu[$topcounter]['hassub'] = 0;
                    $classname = "nonbox" . $uniqueID;
                } else {
                    $doSubMenu = 1;
                    $act == $topcounter ? $topmenu[($topcounter)]['hassub'] = 1 : $topmenu[($topcounter)]['hassub'] = 0;
                    $classname = "box" . $uniqueID;
                    $subcount++;
                    if ($swmenupro['disable_parent']) {
                        $ordered[$counter]['URL'] = "javascript:void(0);";
                    }
                }
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu']) && $doSubMenu) {
                    $act = $subcount;
                } elseif (($ordered[$counter]['ID'] == $swmenupro['active_menu']) && !$doSubMenu) {
                    $act = "";
                }
                $linktext = "id=\"slideclick" . $uniqueID . $topcounter . "\" class=\"" . (($ordered[$counter]['ID'] == $swmenupro['active_menu']) ? "inbox1 act" : "inbox1") . "" . ($topcounter == $topcount ? " last" : "" ) . "\"";
                if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                    $str .= '<div class="' . $classname . '" id="topclick' . $uniqueID . ($counter + 1) . '"><a  ' . $linktext . ' href="javascript:void(0);" >' . $name . '</a></div>' . "\n";
                } else {
                    switch ($ordered[$counter]['TARGET']) {
                        case 1:
                            $str .= '<div class="' . $classname . '" id="topclick' . $uniqueID . ($counter + 1) . '"><a  ' . $linktext . ' href="' . $ordered[$counter]['URL'] . '" target="_blank" >' . $name . '</a></div>' . "\n";
                            break;
                        case 2:
                            $str .= "<div class='" . $classname . "' id='topclick" . $uniqueID . ($counter + 1) . "'><a ' . $linktext . ' href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" >" . $name . "</a></div>\n";
                            break;
                        case 3:
                            $str .= "<div class='" . $classname . "' id='topclick" . $uniqueID . ($counter + 1) . "'>" . $name . "\n";
                            break;
                        default:
                            $str .= '<div class="' . $classname . '" id="topclick' . $uniqueID . ($counter + 1) . '"><a ' . $linktext . ' href="' . $ordered[$counter]['URL'] . '" >' . $name . '</a></div>' . "\n";
                            break;
                    }
                }
                $counter++;
                if (!$doSubMenu) {
                    
                }
                while ($doSubMenu) {
                    if ($ordered[$counter]['indent'] != 0) {
                        if (($ordered[$counter]['indent'] == 1) && ($ordered[$counter - 1]['indent'] == 0)) {
                            $str .= '<div id="subsection' . $uniqueID . $topcounter . '" class="section' . $uniqueID . '">' . "\n";
                        }
                        $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
                        $name = swmenu_getname($ordered[$counter]);
                        if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] == 0)) {
                            $doSubMenu = 0;
                        }
                        if ($ordered[$counter]['indent'] > 1) {
                            $ordered[$counter]['indent'] = 1;
                        }
                       
                     
                       if (!$swmenupro['preview']){
                           $sub_itemid=sw_getsubactive($ordered);
                       }else{
                           $sub_itemid=0;
                       }
                       

                        $classname = "inbox2";
                        if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']) {
                            $classname .= " first";
                        }
                        if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] == 0)) {
                            $classname .= " last";
                        }


                        if ($sub_itemid == $ordered[$counter]['ID']) {
                            $classname .= ' active';
                        }
                        if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                            $str .= "<a id=\"subclick" . $uniqueID . $ordered[$counter]['ID'] . "\" class=\"" . $classname . "\" href=\"javascript:void(0);\" >" . $name . "</a>\n";
                        } else {
                            switch ($ordered[$counter]['TARGET']) {
                                case 1:
                                    $str .= '<a  id="subclick' . $uniqueID . $ordered[$counter]['ID'] . '" class="' . $classname . '" href="' . $ordered[$counter]['URL'] . '" target="_blank" >' . $name . '</a>' . "\n";
                                    break;
                                case 2:
                                    $str .= "<a  id=\"subclick" . $uniqueID . $ordered[$counter]['ID'] . "\" class=\"" . $classname . "\" href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" >" . $name . "</a>\n";
                                    break;
                                case 3:
                                    $str .= '' . $name . '' . "\n";
                                    break;
                                default:
                                    $str .= '<a  id="subclick' . $uniqueID . $ordered[$counter]['ID'] . '" class="' . $classname . '" href="' . $ordered[$counter]['URL'] . '" >' . $name . '</a>' . "\n";
                                    break;
                            }
                        }
                        $counter++;
                        $hasSub = 1;
                    }
                }
            }
            if ($hasSub == 1) {
                $str .= "</div> \n";
            } else {
                $str .= " \n";
            }
            if ($counter == ($number)) {
                $doMenu = 0;
            }
        }
        $str .= "</div> </td></tr></table> <hr style=\"display:block;clear:left;margin:-0.66em 0;visibility:hidden;\" />\n";
    
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
    $str .= "/***********************************************\n";
    $str .= "* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)\n";
    $str .= "* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts\n";
    $str .= "* This notice must stay intact for legal use\n";
    $str .= "***********************************************/\n\n";
    $str .= "ddaccordion.init({\n";
    $str .= "headerclass: 'box" . $uniqueID . "',\n";
    $str .= "contentclass: 'section" . $uniqueID . "',\n";
    $str .= "revealtype:'" . ($swmenupro['revealtype'] ? 'click' : 'mouseover') . "',\n";
    $str .= "mouseoverdelay: " . $swmenupro['specialB'] . ",\n";
    $str .= "collapseprev: " . ($swmenupro['autoclose'] ? 'true' : 'false') . ", \n";
    $str .= "defaultexpanded: [" . $act . "],\n";
    $str .= "onemustopen: false,\n";
    $str .= "animatedefault: false,\n";
    $str .= "persiststate: false,\n";
    $str .= "toggleclass: ['','active'],\n";
    $str .= "togglehtml: [\"prefix\", \"" . $indicator_image1 . "\", \"" . $indicator_image2 . "\"],\n";
    $str .= "animatespeed:'normal',\n";
   // if ($overlay_hack) {
        //$str .= "ddaccordion.expandall('box". $uniqueID . "'),\n";
   // }
    $str .= "oninit:function(headers, expandedindices){ },\n";
    $str .= "onopenclose:function(header, index, state, isuseractivated){ }\n";
    $str .= "})\n";
    //$str .= "jQuery.noConflict();\n";
   
     if (($swmenupro['c_corner_style'] != 'none') && ($swmenupro['c_corner_style'])&& ($swmenupro['c_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_width'] > 0) && ($swmenupro['main_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9 ) {\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').css('z-index','-1');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').wrap('<div></div>');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').parent().css('padding', '" . $swmenupro['main_border_width'] . "px');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').parent().css('background-color', '" . $swmenupro['main_border_color'] . "');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').parent().corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size'] + $swmenupro['main_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#click-menu" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
            }
        }
    if (($swmenupro['t_corner_style'] != 'none') && ($swmenupro['t_corner_style'])&& ($swmenupro['t_corner_style'] != 'curvycorner')){
        if (($swmenupro['main_border_over_width'] > 0) && ($swmenupro['main_border_over_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').css('z-index','-1');\n";
               // $str .= "jQuery('#swmenu .item1').wrap('<span></span>');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').parent().css('padding', '" . $swmenupro['main_border_over_width'] . "px');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').parent().css('background-color', '" . $swmenupro['main_border_color_over'] . "');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').parent().corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size'] + $swmenupro['main_border_over_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').corner('keep " . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#click-menu" . $swmenupro['id'] . " .inbox1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
            }
         }
    if (($swmenupro['s_corner_style'] != 'none') && ($swmenupro['s_corner_style'])&& ($swmenupro['s_corner_style'] != 'curvycorner')){
       
         if (($swmenupro['sub_border_width'] > 0) && ($swmenupro['sub_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
               // $str .= "jQuery('.section').css('z-index','-1');\n";
             //   $str .= "jQuery('.section').wrap('<span></span>');\n";
             //   $str .= "jQuery('.section').parent().css('padding', '" . $swmenupro['sub_border_width'] . "px');\n";
             //   $str .= "jQuery('.section').parent().css('background-color', '" . $swmenupro['sub_border_color'] . "');\n";
                $str .= "jQuery('.section" . $swmenupro['id'] . " .inbox2').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
            //    $str .= "jQuery('.section').parent().corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size'] + $swmenupro['sub_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('.section" . $swmenupro['id'] . " .inbox2').corner('keep " . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               if (@$swmenupro['stl_corner'] + @$swmenupro['str_corner'] != 0) {
                    $str .= "jQuery('.section" . $swmenupro['id'] . " .inbox2.first').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
               if (@$swmenupro['sbl_corner'] + @$swmenupro['sbr_corner'] != 0) {
                    $str .= "jQuery('.section" . $swmenupro['id'] . " .inbox2.last').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
       }
        
        
        
    }
   
    if ($swmenupro['expand_all']) {
       
        $str .= "jQuery(document).ready(function($){\n";
        $str .= "ddaccordion.expandall('box" . $uniqueID . "');\n";
        $str .= "})\n";
       
    }
    
    
     if ($swmenupro['top_ttf']) {
       $str .= "Cufon.replace('.click-menu" . $swmenupro['id'] . " .inbox1',{hover: true, fontFamily: '" . $swmenupro['top_font_face'] . "' });\n";
        $str .= "Cufon.replace('.click-menu" . $swmenupro['id'] . " .inbox1-active',{hover: true, fontFamily: '" . $swmenupro['top_font_face'] . "' });\n";
    }
    if ($swmenupro['sub_ttf']) {
        $str .= "Cufon.replace('.click-menu" . $swmenupro['id'] . " .inbox2',{hover: true, fontFamily: '" . $swmenupro['sub_font_face'] . "' });\n";
        $str .= "Cufon.replace('.click-menu" . $swmenupro['id'] . " .inbox2-active',{hover: true, fontFamily: '" . $swmenupro['sub_font_face'] . "' });\n";
    }
     $str .= "//-->\n";
    $str .= "</script>\n";

    return $str;
}

function mygosuTreeMenu($ordered, $swmenupro) {


    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
    $name = "";
    $counter = 0;
    $doMenu = 1;
    $uniqueID = $swmenupro['id'];
    $number = count($ordered);
    $activesub = -1;
    $activesub2 = -1;
    $topcount = 0;
    $subcounter = 0;

    
$str="<div  id=\"tree-outer" . $uniqueID . "\" align=\"".$swmenupro['position']."\">\n";

    $str .= "<ul  id=\"menu" . $uniqueID . "\" class=\"tree-menu" . $uniqueID . "\" >\n";
    if($swmenupro['tree_top_icon']){
        $str.="<li class='tree-top" . $uniqueID . "'>&nbsp;</li> \n";
    }
    while ($doMenu) {
        if ($ordered[$counter]['indent'] == 0) {
            $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
            $name = swmenu_getname($ordered[$counter]);
            $act = 0;
            if ($counter + 1 == $number) {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class='selected '><span class='file'> \n";
                } else {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class=''><span class='file'> \n";
                }
            } elseif ($ordered[$counter + 1]['indent'] == 0) {

                if (($ordered[$counter + 1]['indent'] < $ordered[$counter]['indent'])) {
                   if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class='selected '><span class='file'> \n";
                } else {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class=''><span class='file'> \n";
                }
                } else {
                   if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class='selected '><span class='file'> \n";
                } else {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class=''><span class='file'> \n";
                }
                }
            } else {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class='selected '><span class='folder'> \n";
                } else {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class=''><span class='folder'> \n";
                }
                if($swmenupro['disable_parent']){
                             $ordered[$counter]['URL']="javascript:void(0);";
                         }
            }
            $topcount++;
            if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                
                    $str .= "<a href=\"javascript:void(0);\" >" . $name . "</a></span> \n";
                
            } else {
                switch ($ordered[$counter]['TARGET']) {
                    case 1:
                        
                            $str .= '<a href="' . $ordered[$counter]['URL'] . '" target="_blank" >' . $name . '</a></span>';
                        
                        break;
                    case 2:
                        
                            $str .= "<a href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" >" . $name . "</a></span>\n";
                        
                        break;
                    case 3:
                        
                            $str .= '<a>' . $name . '</a></span>';
                        
                        break;
                    default:
                        
                            $str .= "<a href='" . $ordered[$counter]['URL'] . "' >" . $name . "</a></span>\n";
                        
                        break;
                }
            }
            if ($counter + 1 == $number) {
                $doSubMenu = 0;
                $doMenu = 0;
            } elseif ($ordered[$counter + 1]['indent'] == 0) {
                $doSubMenu = 0;
            } else {
                $doSubMenu = 1;
            }
            $counter++;
            if ($activesub2 == -1) {
                $subcounter = 0;
            }
            while ($doSubMenu) {
                if ($ordered[$counter]['indent'] != 0) {
                    if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']) {
                        $str .= "<ul>\n";
                    }
                    $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
                    $name = swmenu_getname($ordered[$counter]);
                    if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] == 0)) {
                        $doSubMenu = 0;
                    }

                    if ($counter + 1 == $number) {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class='selected '><span class='file'> \n";
                } else {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class=''><span class='file'> \n";
                }
            } elseif (($ordered[$counter + 1]['indent'] == 0)||($ordered[$counter + 1]['indent'] <= $ordered[$counter]['indent'])) {

                if (($ordered[$counter + 1]['indent'] < $ordered[$counter]['indent'])) {
                   if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class='selected '><span class='file'> \n";
                } else {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class=''><span class='file'> \n";
                }
                } else {
                   if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class='selected '><span class='file'> \n";
                } else {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class=''><span class='file'> \n";
                }
                }
            } else {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class='selected '><span class='folder'> \n";
                } else {
                    $str .= "<li id='tree".$uniqueID.$ordered[$counter]['ID']."' class=''><span class='folder'> \n";
                }
                if($swmenupro['disable_parent']){
                             $ordered[$counter]['URL']="javascript:void(0);";
                         }
            }
                    if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                        $str .= "<a href=\"javascript:void(0);\" >" . $name . "</a></span> ";
                    } else {
                        switch ($ordered[$counter]['TARGET']) {
                            case 1:
                                $str .= '<a href="' . $ordered[$counter]['URL'] . '" target="_blank"  >' . $name . '</a></span>';
                                break;
                            case 2:
                                $str .= "<a href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" >" . $name . "</a></span>\n";
                                break;
                            case 3:
                                $str .= '<a>' . $name . '</a>';
                                break;
                            default:
                                $str .= "<a href=\"" . $ordered[$counter]['URL'] . "\"  >" . $name . "</a></span>\n";
                                break;
                        }
                    }
                    if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] < $ordered[$counter]['indent'])) {
                        $str .= str_repeat("</li></ul>\n", (($ordered[$counter]['indent']) - (@$ordered[$counter + 1]['indent'])));
                        if ((@$ordered[$counter + 1]['indent'] > 0)) {
                            $str .= "</li> \n";
                        }
                    } else if (($ordered[$counter + 1]['indent'] <= $ordered[$counter]['indent'])) {
                        $str .= "</li> \n";
                    }
                    $counter++;
                }
            }
            $str .= "</li> \n";
        }

        if ($counter == ($number)) {
            $doMenu = 0;
        }
    }
    
    $str.="</ul>\n";
    $str.="</div>\n";
    $str.="<script type=\"text/javascript\">\n<!--\n";
    $str.="jQuery(function() {\n";
    $str.="jQuery('#menu" . $swmenupro['id'] . "').treeview({\n";

//echo $active_menu;
 if (!$swmenupro['expand_all']) {
$str.="collapsed: true,\n";
}
    if ($swmenupro['use_cookie']) {
        $str.= "persist: 'cookie',\n";
     //   $str.= "cookieId: 'swtree',\n";
    } else if ($swmenupro['active_menu']) {
        $str.= "persist: 'location',\n";
    }
    //$str.="collapsed: true\n";
    $str.="	});\n})\n";

// $str.="new TreeMenu(\"menu". $uniqueID."\");\n";
  
    
    
    
    
    
   if (($swmenupro['c_corner_style'] != 'none') && ($swmenupro['c_corner_style'])&& ($swmenupro['c_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_width'] > 0) && ($swmenupro['main_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9 ) {\n";
                $str .= "jQuery('#menu" . $swmenupro['id'] . "').css('z-index','-1');\n";
                $str .= "jQuery('#menu" . $swmenupro['id'] . "').wrap('<div></div>');\n";
                $str .= "jQuery('#menu" . $swmenupro['id'] . "').parent().css('padding', '" . $swmenupro['main_border_width'] . "px');\n";
                $str .= "jQuery('#menu" . $swmenupro['id'] . "').parent().css('background-color', '" . $swmenupro['main_border_color'] . "');\n";
                $str .= "jQuery('#menu" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "jQuery('#menu" . $swmenupro['id'] . "').parent().corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size'] + $swmenupro['main_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#menu" . $swmenupro['id'] . "').corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#menu" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
            }
        }
        if ($swmenupro['top_ttf']) {
       $str .= "Cufon.replace('#menu" . $swmenupro['id'] . " span.folder a',{hover: true, fontFamily: '" . $swmenupro['top_font_face'] . "' });\n";
    }
    if ($swmenupro['sub_ttf']) {
        $str .= "Cufon.replace('#menu" . $swmenupro['id'] . " span.file a',{hover: true, fontFamily: '" . $swmenupro['sub_font_face'] . "' });\n";
    }
          $str.="-->\n</script>\n";
    return $str;
}

function TreeMenu($ordered, $swmenupro) {
   
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
    $str = "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
    $str .= "d" . $swmenupro['id'] . "= new dTree('d" . $swmenupro['id'] . "');\n";
    $str .= "d" . $swmenupro['id'] . ".add(0,-1,'');\n";
    for ($i = 0; $i < count($ordered); $i++) {
        $menu = $ordered[$i];
        if (($menu['TARGET'] == 1) || ($menu['TARGET'] == 2)) {
            $menu['TARGET'] = "_blank";
        } else {
            $menu['TARGET'] = "_self";
        }
        if ($menu["SHOWNAME"] == 0 && $menu["SHOWNAME"] != null) {
            $menu["TITLE"] = "";
        }
        if ($menu["TARGETLEVEL"] == 0 && $menu["TARGETLEVEL"] != null) {
            $menu["URL"] = "javascript:void(0);";
        }
        $image1 = explode(",", $menu['IMAGE']);
        $image2 = explode(",", $menu['IMAGEOVER']);
        $image1 = @$image1[0] ? $live_site . "/" . $image1[0] : "";
        $image2 = @$image2[0] ? $live_site . "/" . $image2[0] : "";
        if ($menu['indent'] == 0) {
            $menu['PARENT'] = 0;
        }
        $str .= "d" . $swmenupro['id'] . ".add(" . $menu['ID'] . "," . $menu['PARENT'] . ",'" . addslashes($menu['TITLE']) . "','" . $menu['URL'] . "','" . addslashes($menu['TITLE']) . "','" . $menu['TARGET'] . "','" . $image1 . "','" . $image2 . "');\n";
    }
    $str .= "d" . $swmenupro['id'] . ".menuid=" . $swmenupro['id'] . ";\n";
    $str .= "d" . $swmenupro['id'] . ".config.target=null;\n";
    $str .= "d" . $swmenupro['id'] . ".config.folderLinks=" . ($swmenupro['disable_parent'] ? "false" : "true") . ";\n";
    $str .= "d" . $swmenupro['id'] . ".config.useSelection=" . ($swmenupro['active_menu'] ? "true" : "false") . ";\n";
    $str .= "d" . $swmenupro['id'] . ".config.useCookies=" . ($swmenupro['use_cookie'] ? "true" : "false") . ";\n";
    $str .= "d" . $swmenupro['id'] . ".config.useLines=" . ($swmenupro['tree_lines'] ? "true" : "false") . ";\n";
    //$str .= "d" . $swmenupro['id'] . ".config.useIcons=" . ($swmenupro['level1_sub_top'] ? "true" : "false") . ";\n";
    $str .= "d" . $swmenupro['id'] . ".config.useStatusText=false;\n";
    $str .= "d" . $swmenupro['id'] . ".config.closeSameLevel=false;\n";
    $str .= "d" . $swmenupro['id'] . ".config.inOrder=true;\n";
    $str .= "d" . $swmenupro['id'] . ".icon.root='" . $live_site . "/" . $swmenupro['tree_top_icon'] . "';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.folder='" . $live_site . "/" . $swmenupro['tree_folder_icon'] . "';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.folderOpen='" . $live_site . "/" . $swmenupro['tree_folder_open_icon'] . "';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.node='" . $live_site . "/" . $swmenupro['tree_file_icon'] . "';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.empty='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/empty.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.line='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/line.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.join='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/join.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.joinBottom='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/joinbottom.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.plus='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/plus.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.plusBottom='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/plusbottom.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.minus='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/minus.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.minusBottom='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/minusbottom.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.nlPlus='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/nolines_plus.gif';\n";
    $str .= "d" . $swmenupro['id'] . ".icon.nlMinus='" . $live_site . "/modules/mod_swmenupro/images/tree_icons/nolines_minus.gif';\n";
    $str .= "document.write(d" . $swmenupro['id'] . ");\n";
   
  
    if ($swmenupro['active_menu'] && !$swmenupro['use_cookie'] ) {
        $str .= "d" . $swmenupro['id'] . ".openTo(" . ($swmenupro['active_menu'] ? $swmenupro['active_menu'] : 0) . " , true);\n";
    }
    
    if ($swmenupro['expand_all']) {
        $str .= "d" . $swmenupro['id'] . ".openAll('true');\n";
        }
    $str .= "//-->\n";
    $str .= "</script>\n";
    return $str;
}

function chain($primary_field, $parent_field, $sort_field, $rows, $root_id = 0, $maxlevel = 25) {
    $c = new chain($primary_field, $parent_field, $sort_field, $rows, $root_id, $maxlevel);
    return $c->chainmenu_table;
}

class chain {

    var $table;
    var $rows;
    var $chainmenu_table;
    var $primary_field;
    var $parent_field;
    var $sort_field;

    function chain($primary_field, $parent_field, $sort_field, $rows, $root_id, $maxlevel) {
        $this->rows = $rows;
        $this->primary_field = $primary_field;
        $this->parent_field = $parent_field;
        $this->sort_field = $sort_field;
        $this->buildchain($root_id, $maxlevel);
    }

    function buildChain($rootcatid, $maxlevel) {
        foreach ($this->rows as $row) {
            $this->table[$row[$this->parent_field]][$row[$this->primary_field]] = $row;
        }
        $this->makeBranch($rootcatid, 0, $maxlevel);
    }

    function makeBranch($parent_id, $level, $maxlevel) {
        @$rows = $this->table[$parent_id];
        if(count($rows)){
        $key_array1 = array_keys($rows);
        $key_array_size1 = sizeOf($key_array1);
        foreach ($rows as $key => $value) {
            $rows[$key]['key'] = $this->sort_field;
        }
        usort($rows, 'chainmenuCMP');
        $row_array = array_values($rows);
        $row_array_size = sizeOf($row_array);
        $i = 0;
        foreach ($rows as $item) {
            $item['ORDER'] = ($i + 1);
            $item['indent'] = $level;
            $i++;
            $this->chainmenu_table[] = $item;
            if ((isset($this->table[$item[$this->primary_field]])) && (($maxlevel > $level + 1) || ($maxlevel == 0))) {
                $this->makeBranch($item[$this->primary_field], $level + 1, $maxlevel);
            }
        }
    }
}
}

function chainmenuCMP($a, $b) {
    if ($a[$a['key']] == $b[$b['key']]) {
        return 0;
    }
    return ($a[$a['key']] < $b[$b['key']]) ? -1 : 1;
}

function transMenu($ordered, $swmenupro) {
  
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
    $str = "";
    $name = "";
    $active_id = 'none';
    $topcounter = 0;
    $counter = 0;
    $count = 0;
    $number = count(chain('ID', 'PARENT', 'ORDER', $ordered, $swmenupro['parentid'], 1));
    $total = count(chain('ID', 'PARENT', 'ORDER', $ordered, $swmenupro['parentid'], 25));

   

    $str .= "<table id=\"menu_wrap" . $swmenupro['id'] . "\" class=\"swmenu" . $swmenupro['id'] . "\" align=\"" . $swmenupro['position'] . "\"><tr><td><div id=\"td_menu_wrap" . $swmenupro['id'] . "\" >\n";
    $str .= "<table cellspacing=\"0\" cellpadding=\"0\" id=\"menu" . $swmenupro['id'] . "\" class=\"menu" . $swmenupro['id'] . "\" > \n";
    if (substr($swmenupro['orientation'], 0, 10) == "horizontal") {
        $str .= "<tr> \n";
    }
    foreach ($ordered as $top) {
        if ($top['indent'] == 0) {
            $top['URL'] = str_replace('&', '&amp;', $top['URL']);
            $topcounter++;
            $class = "";
            $name = swmenu_getname($top);
            if (substr($swmenupro['orientation'], 0, 8) == "vertical") {
                $str .= "<tr> \n";
            }

            if ($topcounter == $number) {
                $class .= " last" . $swmenupro['id'];
            }

            if (($topcounter == $number) && ($top["ID"] == $swmenupro['active_menu'])) {
                $str .= "<td id=\"trans-active" . $swmenupro['id'] . "\" class=\"" . $class . "\"> \n";
                $active_id = "menu" . $swmenupro['id'] . $top['ID'];
            } else if ($top["ID"] == $swmenupro['active_menu']) {
                $str .= "<td id='trans-active" . $swmenupro['id'] . "' class=\"" . $class . "\"> \n";
                $active_id = "menu" . $swmenupro['id'] . $top['ID'];
            } else if ($topcounter == $number) {
                $str .= "<td class=\"" . $class . "\"> \n";
            } else {
                $str .= "<td class=\"" . $class . "\"> \n";
            }
            
           if (($counter + 1 != $total)&&(@$ordered[$count + 1]['indent'] > $top['indent']) && $swmenupro['top_sub_indicator']) {
          
             $name = "<div><img src='" . $live_site . $swmenupro['top_sub_indicator'] . "' align='" . $swmenupro['top_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['top_sub_indicator_left'] . "px;top:" . $swmenupro['top_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name."</div>\n";
             }
            if ($top['TARGETLEVEL'] == "0") {
                $str .= "<a  id=\"menu" . $swmenupro['id'] . $top['ID'] . "\" href=\"javascript:void(0);\" >" . $name . "</a> \n";
            } else {
                switch ($top['TARGET']) {
                    case 1:
                        $str .= '<a  id="menu' . $swmenupro['id'] . $top['ID'] . '" href="' . $top['URL'] . '" target="_blank"  >' . $name . '</a>' . "\n";
                        break;
                    case 2:
                        $str .= "<a  href=\"#\" id=\"menu" . $swmenupro['id'] . $top['ID'] . "\" onclick=\"javascript: window.open('" . $top['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" >" . $name . "</a>\n";
                        break;
                    case 3:
                        $str .= '<a  id="menu' . $swmenupro['id'] . $top['ID'] . '" >' . $name . '</a>' . "\n";
                        break;
                    default:
                        $str .= '<a  class="item1" id="menu' . $swmenupro['id'] . $top['ID'] . '" href="' . $top['URL'] . '"  >';
                        $str .= $name . '</a>' . "\n";
                        break;
                }
            }
            $counter++;
            $str .= "</td> \n";
            if (substr($swmenupro['orientation'], 0, 8) == "vertical") {
                $str .= "</tr> \n";
            }
        }
        $count++;
    }
    if (substr($swmenupro['orientation'], 0, 10) == "horizontal") {
        $str .= "</tr> \n";
    }
    $str .= "</table></div></td></tr></table><hr style=\"display:block;clear:left;margin:-0.66em 0;visibility:hidden;\" />  \n";
    $str .= "<div id=\"subwrap" . $swmenupro['id'] . "\"> \n";
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
    $str .= "if (TransMenu.isSupported()) {\n";
    if ($swmenupro['orientation'] == "horizontal/down") {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.down, " . $swmenupro['level1_sub_left'] . "," . $swmenupro['level1_sub_top'] . ", TransMenu.reference.bottomLeft);\n";
    } elseif ($swmenupro['orientation'] == "horizontal/left") {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.dleft, " . $swmenupro['level1_sub_left'] . "," . $swmenupro['level1_sub_top'] . ", TransMenu.reference.bottomRight);\n";
    } elseif ($swmenupro['orientation'] == "horizontal/up") {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.up, " . $swmenupro['level1_sub_left'] . ", " . $swmenupro['level1_sub_top'] . ", TransMenu.reference.topLeft);\n";
    } elseif ($swmenupro['orientation'] == "vertical/right") {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.right, " . $swmenupro['level1_sub_left'] . ", " . $swmenupro['level1_sub_top'] . ", TransMenu.reference.topRight);\n";
    } elseif ($swmenupro['orientation'] == "vertical/left") {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.left, " . $swmenupro['level1_sub_left'] . ", " . $swmenupro['level1_sub_top'] . ", TransMenu.reference.topLeft);\n";
    } elseif ($swmenupro['orientation'] == "vertical") {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.right, " . $swmenupro['level1_sub_left'] . ", " . $swmenupro['level1_sub_top'] . ", TransMenu.reference.topRight);\n";
    } elseif ($swmenupro['orientation'] == "horizontal") {
        $str .= "var ms = new TransMenuSet(TransMenu.direction.down, " . $swmenupro['level1_sub_left'] . ", " . $swmenupro['level1_sub_top'] . ", TransMenu.reference.bottomLeft);\n";
    }
    $par = $ordered[0];
    foreach ($ordered as $sub) {
        $name = swmenu_getname($sub);
        $sub2 = next($ordered);
        if ($sub['TARGETLEVEL'] == "0" || $sub['TARGET'] == "3") {
            $sub['TARGET'] = 0;
            $sub['URL'] = "javascript:void(0);";
        }
        if (($sub['indent'] == 0) && (($sub2['indent']) == 1)) {
            $str .= "var menu" . $swmenupro['id'] . $sub['ID'] . " = ms.addMenu(document.getElementById(\"menu" . $swmenupro['id'] . $sub['ID'] . "\"));\n ";
        } else if (($sub['ORDER'] == 1) && ($sub['indent'] > 1)) {
            $str .= "var menu" . $swmenupro['id'] . ($sub['ID']) . " = menu" . $swmenupro['id'] . findPar($ordered, $par) . ".addMenu(menu" . $swmenupro['id'] . findPar($ordered, $par) . ".items[" . ($par['ORDER'] - 1) . "]," . $swmenupro['level2_sub_left'] . "," . $swmenupro['level2_sub_top'] . ");\n";
        }
        if ($sub['indent'] > 0) {
            $str .= "menu" . $swmenupro['id'] . findPar($ordered, $sub) . ".addItem(\"" . addslashes($name) . "\", \"" . addslashes($sub['URL']) . "\", \"" . $sub['TARGET'] . "\");\n";
        }
        $par = $sub;
    }
    /*
    if ($swmenupro['top_ttf']) {
        $registry = new JRegistry();
        $registry->loadINI($swmenupro['top_ttf']);
        $params = $registry->toObject();
        $topfontface = @$params->fontFace ? $params->fontFace : 'none';
    } else {
        $topfontface = "";
    }
    
     */
    $str .= "function init" . $swmenupro['id'] . "() {\n";
    $str .= "if (TransMenu.isSupported()) {\n";
    $str .= "TransMenu.initialize();\n";
    $counter = 0;
    for ($i = 0; $i < count($ordered); $i++) {
        if ($ordered[$i]['indent'] == 0) {
            $counter++;
            if (@$ordered[$i + 1]['indent'] == 1) {
                $str .= "menu" . $swmenupro['id'] . ($ordered[$i]['ID']) . ".onactivate = function() {document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").className = \"hover\"; };\n ";
                $str .= "menu" . $swmenupro['id'] . ($ordered[$i]['ID']) . ".ondeactivate = function() {document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").className = \"\"; };\n ";
            } else {
                $str .= "document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").onmouseover = function() {\n";
                $str .= "ms.hideCurrent();\n";
                $str .= "this.className = \"hover\";\n";
                $str .= "};\n";
                $str .= "document.getElementById(\"menu" . $swmenupro['id'] . $ordered[$i]['ID'] . "\").onmouseout = function() { this.className = \"\"; };\n";
            }
        }
    }
    $str .= "}}\n";
    if ($swmenupro['sub_sub_indicator']) {
        $str.="TransMenu.spacerGif = \"" . $live_site . "/modules/mod_swmenupro/images/transmenu/x.gif\";\n";

        $str.="TransMenu.dingbatOn = \"" . $live_site . $swmenupro['sub_sub_indicator'] . "\";\n";
        $str.="TransMenu.dingbatOff = \"" . $live_site . $swmenupro['sub_sub_indicator'] . "\"; \n";

        $str.="TransMenu.sub_indicator = true; \n";
    } else {
        $str.="TransMenu.dingbatSize = 0;\n";
        $str.="TransMenu.spacerGif = \"\";\n";
        $str.="TransMenu.dingbatOn = \"\";\n";
        $str.="TransMenu.dingbatOff = \"\"; \n";
        $str.="TransMenu.sub_indicator = false;\n";
    }
    $str .= "TransMenu.menuPadding = 0;\n";
    $str .= "TransMenu.itemPadding = 0;\n";
    $str .= "TransMenu.shadowSize = 2;\n";
    $str .= "TransMenu.shadowOffset = 3;\n";
    $str .= "TransMenu.shadowColor = \"#888\";\n";
    $str .= "TransMenu.shadowPng = \"" . $live_site . "/modules/mod_swmenupro/images/transmenu/grey-40.png\";\n";
    $str .= "TransMenu.backgroundColor = \"" . ($swmenupro['sub_back'] ? $swmenupro['sub_back'] : '#fff') . "\";\n";
    $str .= "TransMenu.backgroundPng = \"" . $live_site . "/modules/mod_swmenupro/images/transmenu/white-90.png\";\n";
    $str .= "TransMenu.hideDelay = " . ($swmenupro['specialB'] * 2) . ";\n";
    $str .= "TransMenu.slideTime = " . $swmenupro['specialB'] . ";\n";
    $str .= "TransMenu.modid = " . $swmenupro['id'] . ";\n";
    $str .= "TransMenu.selecthack = false;\n";
    $str .= "TransMenu.autoposition = " . $swmenupro['auto_position'] . ";\n";
    $str .= "TransMenu.fontFace = \"" . $swmenupro['top_font_face'] . "\";\n";
    $str .= "TransMenu.fontColor = \"" . $swmenupro['main_font_color'] . "\";\n";
    $str .= "TransMenu.activeId = \"" . $active_id . "\";\n";
    $str .= "TransMenu.preview = \"" . $swmenupro['preview'] . "\";\n";
    $str .= "TransMenu.renderAll();\n";
    $str .= "if ( typeof window.addEventListener != \"undefined\" )\n";
    $str .= "window.addEventListener( \"load\", init" . $swmenupro['id'] . ", false );\n";
    $str .= "else if ( typeof window.attachEvent != \"undefined\" ) {\n";
    $str .= "window.attachEvent( \"onload\", init" . $swmenupro['id'] . " );\n";
    $str .= "}else{\n";
    $str .= "if ( window.onload != null ) {\n";
    $str .= "var oldOnload = window.onload;\n";
    $str .= "window.onload = function ( e ) {\n";
    $str .= "oldOnload( e );\n";
    $str .= "init" . $swmenupro['id'] . "();\n";
    $str .= "}\n}else\n";
    $str .= "window.onload = init" . $swmenupro['id'] . "();\n";
    $str .= "}\n}\n\n";


   if (($swmenupro['c_corner_style'] != 'none') && ($swmenupro['c_corner_style'])&& ($swmenupro['c_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_width'] > 0) && ($swmenupro['main_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . "').css('z-index','-1');\n";
               // $str .= "jQuery('#td_menu_wrap').wrap('<div></div>');\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . "').parent().css('padding', '" . $swmenupro['main_border_width'] . "px');\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . "').parent().css('background-color', '" . $swmenupro['main_border_color'] . "');\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . "').parent().corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size'] + $swmenupro['main_border_width']) . "px');\n";
                //$str .= "jQuery('#td_menu_wrap').parent().css('display','block');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
            }
        }
        
        if (($swmenupro['t_corner_style'] != 'none') && ($swmenupro['t_corner_style'])&& ($swmenupro['t_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_over_width'] > 0) && ($swmenupro['main_border_over_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                //$str .= "jQuery('#td_menu_wrap a').css('z-index','-1');\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . " a').wrap('<div></div>');\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . " a').parent().css('padding', '" . $swmenupro['main_border_over_width'] . "px');\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . " a').parent().css('background-color', '" . $swmenupro['main_border_color_over'] . "');\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . " a').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
               // $str .= "jQuery('#td_menu_wrap a').parent().corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size'] + $swmenupro['main_border_over_width']) . "px');\n";
                //$str .= "jQuery('#td_menu_wrap').parent().css('display','block');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . " a').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#td_menu_wrap" . $swmenupro['id'] . " a').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
            }
        }
       
       if (($swmenupro['s_corner_style'] != 'none') && ($swmenupro['s_corner_style'])&& ($swmenupro['s_corner_style'] != 'curvycorner')){
           
            $str .= "jQuery('#subwrap" . $swmenupro['id'] . " .background').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
            $str .= "jQuery('#subwrap" . $swmenupro['id'] . "  .item.hover td ').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
        }
    





    if ($swmenupro['top_ttf']) {
       $str .= "Cufon.replace('table.menu" . $swmenupro['id'] . " a',{hover: true, fontFamily: '" . $swmenupro['top_font_face'] . "' });\n";
    }
    if ($swmenupro['sub_ttf']) {
        $str .= "Cufon.replace('#subwrap" . $swmenupro['id'] . " .item ',{hover: true, fontFamily: '" . $swmenupro['sub_font_face'] . "' });\n";
    }
    if ($swmenupro['overlay_hack']) {
        $str .= "jQuery(document).ready(function($){\n";
       // $str .= "jQuery('#menu_wrap').parents().css('overflow','visible');\n";
       // $str .= "jQuery('html').css('overflow','auto');\n";
        $str .= "jQuery('#menu_wrap" . $swmenupro['id'] . "').parents().css('z-index','1');\n";
        $str .= "jQuery('#menu_wrap" . $swmenupro['id'] . "').css('z-index','101');\n";
        $str .= "});\n";
    }
    $str .= "//--> \n";
    $str .= "</script></div>  \n";
    return $str;
}

function findPar($ordered, $sub) {
    $submenu = chain('ID', 'PARENT', 'ORDER', $ordered, $sub['PARENT'], 1);
    if ($sub['indent'] == 1) {
        return $submenu[0]['PARENT'];
    } else {
        return $submenu[0]['ID'];
    }
}

function findParOrder($ordered, $sub) {
    $submenu = chain('ID', 'PARENT', 'ORDER', $ordered, $sub['PARENT'], 1);
    if ($sub['indent'] == 1) {
        return $submenu[0]['ORDER'];
    } else {
        return $submenu[0]['ORDER'];
    }
}

function findPar2($ordered, $sub) {
    $submenu = chain('ID', 'PARENT', 'ORDER', $ordered, $sub['PARENT'], 1);
    if ($sub['indent'] == 2) {
        return $submenu[0]['PARENT'];
    } else {
        return $submenu[0]['ID'];
    }
}

function swHassub($ordered, $top) {
    @$submenu = chain('ID', 'PARENT', 'ORDER', $ordered, $top['ID'], 1);
    if (count($submenu) > 0) {
        return true;
    } else {
        return false;
    }
}




function columnMenu($ordered, $swmenupro)
{
  
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
  $activesub = 0;
    $name          = "";
    $uniqueID      = $swmenupro['id'];
    $number        = count($ordered);
  $topcount=0;
  
     $str = "<table  id=\"outertable" . $uniqueID . "\" align=\"" . $swmenupro['position'] . "\" class=\"outer\"><tr><td><div id=\"outerwrap" . $uniqueID . "\">\n";
    $str .= "<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" id=\"menu" . $uniqueID . "\" class=\"ddmx" . $uniqueID . "\"  > \n";
    if ($swmenupro['orientation'] == "horizontal/down" || $swmenupro['orientation'] == "horizontal/left" || $swmenupro['orientation'] == "horizontal/up") {
        $str .= "<tr> \n";
    }
    for($counter=0;$counter<count($ordered);$counter++){
        if ($ordered[$counter]['indent'] == 0) {
            $topcount++;
            $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
            $name = swmenu_getname($ordered[$counter]);
            if ($swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical/left") {
                $str .= "<tr> \n";
            }
           
            if (islast($ordered, $counter)) {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<td class='item11 acton last'> \n";
                  
                   
                } else {
                    $str .= "<td class='item11 last'> \n";
                }
            } else {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<td class='item11 acton'> \n";
                    $activesub = $topcount-1;
                   
                  
                } else {
                    $str .= "<td class='item11'> \n";
                }
            }
           


            $classname = "item1";
            if ($ordered[$counter]['indent'] > @$ordered[$counter - 1]['indent']) {
                $classname .= " first";
            }
            if (($counter + 1 == $number) || islast($ordered, $counter)) {
                $classname .= " last";
            }
            if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['top_sub_indicator']) {
             $name = "<div><img src='" . $live_site . $swmenupro['top_sub_indicator'] . "' align='" . $swmenupro['top_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['top_sub_indicator_left'] . "px;top:" . $swmenupro['top_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name."</div>\n";
             }
             if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['disable_parent']) {
             $ordered[$counter]['URL'] = "javascript:void(0);";
             }
             
            
            if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                $str .= "<a class='" . $classname . "' href=\"javascript:void(0);\" >" . $name . "</a> \n";
            } else {
                switch ($ordered[$counter]['TARGET']) {
                    case 1:
                        $str .= '<a href="' . $ordered[$counter]['URL'] . '" target="_blank" class="' . $classname . '" >' . $name . '</a>';
                        break;
                    case 2:
                        $str .= "<a href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class='" . $classname . "'>" . $name . "</a>\n";
                        break;
                    case 3:
                        $str .= '<a class="' . $classname . '" >' . $name . '</a>';
                        break;
                    default:
                        $str .= '<a href="' . $ordered[$counter]['URL'] . '" class="' . $classname . '">' . $name . '</a>';
                        break;
                }
            }
            if ($counter + 1 == $number) {
               
                $str .= "<table class=\"section\" style=\"border:0 !important;display:none;\"><tr><td></td> \n";
            } elseif ($ordered[$counter + 1]['indent'] == 0) {
              
                $str .= "<table class=\"section\" style=\"border:0 !important;display:none;\"><tr><td></td> \n";
            } else {
                $str .= "<table class='section' cellspacing=\"0\" border=\"0\" cellpadding=\"0\" ><tr>\n";
                $level1=chain('ID', 'PARENT', 'ORDER', $ordered, $ordered[$counter]['ID'], 1);
                for($i=0;$i<count($level1);$i++){
                  $level1_classname="";
                  if($i==0){
                      $level1_classname.=" first";
                  }  
                  if($i==(count($level1)-1)){
                      $level1_classname.=" last";
                  }
                   $str.= "<td valign='top' class='level1_outer".$level1_classname."'>\n";
                   $level1_classname="item2 level1".$level1_classname;
                   $level1[$i]['URL'] = str_replace('&', '&amp;', $level1[$i]['URL']);
                   $name                     = swmenu_getname($level1[$i]); 
                    if ($level1[$i]['TARGETLEVEL'] == "0") {
                       $str .= "<a class=\"" . $level1_classname . "\" href=\"javascript:void(0);\" >" . $name . "</a> \n";  
                        
                    } else {
                        switch ($ordered[$counter]['TARGET']) {
                            case 1:
                                 $str .= '<a href="' . $level1[$i]['URL'] . '" ' . $style . ' target="_blank" class="' . $level1_classname . '" >' . $name . '</a>';  
                            break;
                            case 2:
                                 $str .= "<a href=\"#\"  onclick=\"javascript: window.open('" . $level1[$i]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"" . $level1_classname . "\">" . $name . "</a>\n";   
                                break;
                            case 3:
                                 $str .= '<a class="' . $level1_classname . '"  >' . $name . '</a>';    
                                 break;
                            default:
                                 $str .= "<a href=\"" . $level1[$i]['URL'] . "\" class=\"" . $level1_classname . "\" >" . $name . "</a>\n";   
                                 break;
                        }
                    }
                   $str.="</td>\n";
                    
                    }
                    $str.="</tr><tr>\n";
                    
                     for($i=0;$i<count($level1);$i++){
                      $levelx=chain('ID', 'PARENT', 'ORDER', $ordered, $level1[$i]['ID'], 20);   
                      if($i==0){
                      
                      $str.= "<td valign='top' class='levelx_outer first'>\n";
                  }else if($i==(count($level1)-1)){
                     
                      $str.= "<td valign='top' class='levelx_outer last'>\n";
                  }else{
                      $str.= "<td valign='top' class='levelx_outer'>\n";
                  }    
                  
                   for($j=0;$j<count($levelx);$j++){
                      $levelx_classname="item2 levelx";
                      if($j==0){
                      $levelx_classname.=" first";
                    
                  }
                  if($j==(count($levelx)-1)){
                      $levelx_classname.=" last";
                    }
                
                  $levelx[$j]['URL'] = str_replace('&', '&amp;', $levelx[$j]['URL']);
                   $name                     = swmenu_getname($levelx[$j]); 
                    if ($levelx[$j]['TARGETLEVEL'] == "0") {
                       $str .= "<a class=\"" . $levelx_classname . "\" href=\"javascript:void(0);\" >" . $name . "</a> \n";  
                        
                    } else {
                        switch ($ordered[$counter]['TARGET']) {
                            case 1:
                                 $str .= '<a href="' . $levelx[$j]['URL'] . '" ' . $style . ' target="_blank" class="' . $levelx_classname . '" >' . $name . '</a>';  
                            break;
                            case 2:
                                 $str .= "<a href=\"#\"  onclick=\"javascript: window.open('" . $levelx[$j]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"" . $levelx_classname . "\">" . $name . "</a>\n";   
                                break;
                            case 3:
                                 $str .= '<a class="' . $levelx_classname . '"  >' . $name . '</a>';    
                                 break;
                            default:
                                 $str .= "<a href=\"" . $levelx[$j]['URL'] . "\" class=\"" . $levelx_classname . "\" >" . $name . "</a>\n";   
                                 break;
                        }
                    }
                         }
                         $str.="</td>\n";
                   
                }
               
            }
            //$counter++;
            
         if ($swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical/left") {
            $str .= "</tr> \n";
        }
            $str .= "</table> \n";
        }
       // $str .= "</td> \n";
       
        
    }
    if ($swmenupro['orientation'] == "horizontal/down" || $swmenupro['orientation'] == "horizontal/left" || $swmenupro['orientation'] == "horizontal/up") {
        $str .= "</tr> \n";
    }
  //  $swmenupro['reveal_type']='hover';
    $str .= "</table></div></td></tr></table><hr style=\"display:block;clear:left;margin:-0.66em 0;visibility:hidden;\" /> \n";
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
    $str .= "function makemenu" . $uniqueID . "(){\n";
    $str .= "var ddmx" . $uniqueID . " = new DropDownMenuX('menu" . $uniqueID . "');\n";
    $str .= "ddmx" . $uniqueID . ".type = '" . $swmenupro['orientation'] . "'; \n";
    $str .= "ddmx" . $uniqueID . ".delay.show = 0;\n";
    $str .= "ddmx" . $uniqueID . ".iframename = 'ddmx" . $uniqueID . "';\n";
    $str .= "ddmx" . $uniqueID . ".delay.hide = " . $swmenupro['specialB'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".effect = '" . ($swmenupro['extra'] ? $swmenupro['extra'] : 'none') . "';\n";
    $str .= "ddmx" . $uniqueID . ".position.levelX.left = " . $swmenupro['levelx_sub_left'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.levelX.top = " . $swmenupro['levelx_sub_top'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.level1.left = " . $swmenupro['level1_sub_left'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.level1.top = " . $swmenupro['level1_sub_top'] . "; \n";
    $str .= "ddmx" . $uniqueID . ".fixIeSelectBoxBug =  'true' ;\n";
    $str .= "ddmx" . $uniqueID . ".autoposition = " . ($swmenupro['auto_position'] ? 'true' : 'false') . ";\n";
    $str .= "ddmx" . $uniqueID . ".revealtype = '" . ($swmenupro['revealtype'] ? 'click' : 'hover') . "';\n";
   
    $str .= "ddmx" . $uniqueID . ".init(); \n";
    $str .= "}\n";
    $str .= "if ( typeof window.addEventListener != \"undefined\" )\n";
    $str .= "window.addEventListener( \"load\", makemenu" . $uniqueID . ", false );\n";
    $str .= "else if ( typeof window.attachEvent != \"undefined\" ) { \n";
    $str .= "window.attachEvent( \"onload\", makemenu" . $uniqueID . " );\n";
    $str .= "}\n";
    $str .= "else {\n";
    $str .= "if ( window.onload != null ) {\n";
    $str .= "var oldOnload = window.onload;\n";
    $str .= "window.onload = function ( e ) { \n";
    $str .= "oldOnload( e ); \n";
    $str .= "makemenu" . $uniqueID . "() \n";
    $str .= "} \n";
    $str .= "}  \n";
    $str .= "else  { \n";
    $str .= "window.onload = makemenu" . $uniqueID . "();\n";
    $str .= "} }\n";
    if (($swmenupro['c_corner_style'] != 'none') && ($swmenupro['c_corner_style'])&& ($swmenupro['c_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_width'] > 0) && ($swmenupro['main_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9 ) {\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').css('z-index','-1');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').wrap('<div></div>');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().css('padding', '" . $swmenupro['main_border_width'] . "px');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().css('background-color', '" . $swmenupro['main_border_color'] . "');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size'] + $swmenupro['main_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
            }
        }
    if (($swmenupro['t_corner_style'] != 'none') && ($swmenupro['t_corner_style'])&& ($swmenupro['t_corner_style'] != 'curvycorner')){
        if (($swmenupro['main_border_over_width'] > 0) && ($swmenupro['main_border_over_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').css('z-index','-1');\n";
               // $str .= "jQuery('#swmenu .item1').wrap('<span></span>');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().css('padding', '" . $swmenupro['main_border_over_width'] . "px');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().css('background-color', '" . $swmenupro['main_border_color_over'] . "');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size'] + $swmenupro['main_border_over_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('keep " . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
            }
         }
    if (($swmenupro['s_corner_style'] != 'none') && ($swmenupro['s_corner_style'])&& ($swmenupro['s_corner_style'] != 'curvycorner')){
       
         if (($swmenupro['sub_border_width'] > 0) && ($swmenupro['sub_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
               // $str .= "jQuery('.section').css('z-index','-1');\n";
             //   $str .= "jQuery('.section').wrap('<span></span>');\n";
             //   $str .= "jQuery('.section').parent().css('padding', '" . $swmenupro['sub_border_width'] . "px');\n";
             //   $str .= "jQuery('.section').parent().css('background-color', '" . $swmenupro['sub_border_color'] . "');\n";
                $str .= "jQuery('.section').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
            //    $str .= "jQuery('.section').parent().corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size'] + $swmenupro['sub_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('.section').corner('keep " . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               if (@$swmenupro['stl_corner'] + @$swmenupro['str_corner'] != 0) {
                    $str .= "jQuery('#menu" . $uniqueID . " .section .item2.first').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
               if (@$swmenupro['sbl_corner'] + @$swmenupro['sbr_corner'] != 0) {
                    $str .= "jQuery('#menu" . $uniqueID . " .section .item2.last').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
       }
        
        
        
    }
    if ($swmenupro['overlay_hack']) {
        $str .= "jQuery('#menu" . $uniqueID . "').parents().css('overflow','visible');\n";
        $str .= "jQuery('html').css('overflow','auto');\n";
        $str .= "jQuery('#menu" . $uniqueID . "').parents().css('z-index','100');\n";
        $str .= "jQuery('#menu" . $uniqueID . "').css('z-index','101');\n";
    }
   if ($swmenupro['top_ttf']) {
       $str .= "Cufon.replace('.ddmx" . $uniqueID . " .item1',{hover: true, fontFamily: '" . $swmenupro['top_font_face']. "' });\n";
    }
    if ($swmenupro['sub_ttf']) {
       
        $str .= "Cufon.replace('.ddmx" . $uniqueID . " .item2',{hover: true, fontFamily: '" . $swmenupro['sub_font_face']. "' });\n";
    }
    $str .= "//-->\n";
    $str .= "</script>\n";
    return $str;

}

function GosuMenu($ordered, $swmenupro) {
    
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
    $sub_active = 0;
    $name = "";
    $counter = 0;
    $doMenu = 1;
    $uniqueID = $swmenupro['id'];
    $number = count($ordered);
    $activesub = -1;
    $activesub2 = -1;
    $topcount = 0;
    $subcounter = 0;
   
    $str = "<table  id=\"outertable" . $uniqueID . "\" align=\"" . $swmenupro['position'] . "\" class=\"outer\"><tr><td><div id=\"outerwrap" . $uniqueID . "\">\n";
    $str .= "<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" id=\"menu" . $uniqueID . "\" class=\"ddmx" . $uniqueID . "\"  > \n";
    if ($swmenupro['orientation'] == "horizontal/down" || $swmenupro['orientation'] == "horizontal/left" || $swmenupro['orientation'] == "horizontal/up") {
        $str .= "<tr> \n";
    }
    while ($doMenu) {
        if ($ordered[$counter]['indent'] == 0) {
            $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
            $name = swmenu_getname($ordered[$counter]);
            if ($swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical/left") {
                $str .= "<tr> \n";
            }
            $act = 0;
            if (islast($ordered, $counter)) {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<td class='item11 acton last'> \n";
                    $act = 1;
                    $activesub = $topcount;
                } else {
                    $str .= "<td class='item11 last'> \n";
                }
            } else {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<td class='item11 acton'> \n";
                    $act = 1;
                    $activesub = $topcount;
                } else {
                    $str .= "<td class='item11'> \n";
                }
            }
            $topcount++;


            $classname = "item1";
            if ($ordered[$counter]['indent'] > @$ordered[$counter - 1]['indent']) {
                $classname .= " first";
            }
            if (($counter + 1 == $number) || islast($ordered, $counter)) {
                $classname .= " last";
            }
            if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['top_sub_indicator']) {
             $name = "<div><img src='" . $live_site . $swmenupro['top_sub_indicator'] . "' align='" . $swmenupro['top_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['top_sub_indicator_left'] . "px;top:" . $swmenupro['top_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name."</div>\n";
             }
            if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                $str .= "<a class='" . $classname . "' href=\"javascript:void(0);\" >" . $name . "</a> \n";
            } else {
                switch ($ordered[$counter]['TARGET']) {
                    case 1:
                        $str .= '<a href="' . $ordered[$counter]['URL'] . '" target="_blank" class="' . $classname . '" >' . $name . '</a>';
                        break;
                    case 2:
                        $str .= "<a href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class='" . $classname . "'>" . $name . "</a>\n";
                        break;
                    case 3:
                        $str .= '<a class="' . $classname . '" >' . $name . '</a>';
                        break;
                    default:
                        $str .= '<a href="' . $ordered[$counter]['URL'] . '" class="' . $classname . '">' . $name . '</a>';
                        break;
                }
            }
            if ($counter + 1 == $number) {
                $doSubMenu = 0;
                $doMenu = 0;
             //   $str .= "<div class=\"section\" style=\"border:0 !important;display:none;\"></div> \n";
            } elseif ($ordered[$counter + 1]['indent'] == 0) {
                $doSubMenu = 0;
           //     $str .= "<div class=\"section\" style=\"border:0 !important;display:none;\"></div> \n";
            } else {
                $doSubMenu = 1;
            }
            $counter++;
            if ($activesub2 == -1) {
                $subcounter = 0;
            }
            while ($doSubMenu) {
                if ($ordered[$counter]['indent'] != 0) {
                    if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']) {
                        if ($act && $sub_active && ($swmenupro['orientation'] == "vertical/right")) {
                            $str .= '<div class="subsection"  >';
                        } else {
                            $str .= '<div class="section"  >';
                        }
                    }
                    $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
                    $name = swmenu_getname($ordered[$counter]);
                    if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] == 0)) {
                        $doSubMenu = 0;
                    }
                    $style = " style=\"";
                    $classname = "item2";
                    if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']) {
                        $classname .= " first";
                    }
                    if (($counter + 1 == $number) || islast($ordered, $counter)) {
                        $classname .= " last";
                    }
                    if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['sub_sub_indicator']) {

                         $name = "<img src='" . $live_site . $swmenupro['sub_sub_indicator'] . "' align='" . $swmenupro['sub_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['sub_sub_indicator_left'] . "px;top:" . $swmenupro['sub_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name;
                       }
                    $style .= "\" ";
                    if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                        $str .= "<a class=\"" . $classname . "\"" . $style . " href=\"javascript:void(0);\" >" . $name . "</a> \n";
                    } else {
                        switch ($ordered[$counter]['TARGET']) {
                            case 1:
                                $str .= '<a href="' . $ordered[$counter]['URL'] . '" ' . $style . ' target="_blank" class="' . $classname . '" >' . $name . '</a>';
                                break;
                            case 2:
                                $str .= "<a href=\"#\" " . $style . " onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"" . $classname . "\">" . $name . "</a>\n";
                                break;
                            case 3:
                                $str .= '<a class="' . $classname . '" ' . $style . ' >' . $name . '</a>';
                                break;
                            default:
                                $str .= "<a href=\"" . $ordered[$counter]['URL'] . "\" class=\"" . $classname . "\" " . $style . ">" . $name . "</a>\n";
                                break;
                        }
                    }
                    if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] < $ordered[$counter]['indent'])) {
                        $str .= str_repeat('</div>', (($ordered[$counter]['indent']) - (@$ordered[$counter + 1]['indent'])));
                    }
                    $counter++;
                }
            }
        }
        $str .= "</td> \n";
        if ($swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical/left") {
            $str .= "</tr> \n";
        }
        if ($counter == ($number)) {
            $doMenu = 0;
        }
    }
    if ($swmenupro['orientation'] == "horizontal/down" || $swmenupro['orientation'] == "horizontal/left" || $swmenupro['orientation'] == "horizontal/up") {
        $str .= "</tr> \n";
    }
    $str .= "</table></div></td></tr></table><hr style=\"display:block;clear:left;margin:-0.66em 0;visibility:hidden;\" /> \n";
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
    $str .= "function makemenu" . $uniqueID . "(){\n";
    $str .= "var ddmx" . $uniqueID . " = new DropDownMenuX('menu" . $uniqueID . "');\n";
    $str .= "ddmx" . $uniqueID . ".type = '" . $swmenupro['orientation'] . "'; \n";
    $str .= "ddmx" . $uniqueID . ".delay.show = 0;\n";
    $str .= "ddmx" . $uniqueID . ".iframename = 'ddmx" . $uniqueID . "';\n";
    $str .= "ddmx" . $uniqueID . ".delay.hide = " . $swmenupro['specialB'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".effect = '" . ($swmenupro['extra'] ? $swmenupro['extra'] : 'none') . "';\n";
    $str .= "ddmx" . $uniqueID . ".position.levelX.left = " . $swmenupro['level2_sub_left'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.levelX.top = " . $swmenupro['level2_sub_top'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.level1.left = " . $swmenupro['level1_sub_left'] . ";\n";
    $str .= "ddmx" . $uniqueID . ".position.level1.top = " . $swmenupro['level1_sub_top'] . "; \n";
    $str .= "ddmx" . $uniqueID . ".fixIeSelectBoxBug = " . (@$swmenupro['selectbox_hack'] ? 'true' : 'false') . ";\n";
    $str .= "ddmx" . $uniqueID . ".autoposition = " . ($swmenupro['auto_position'] ? 'true' : 'false') . ";\n";
    $str .= "ddmx" . $uniqueID . ".revealtype = 'hover';\n";
    
    $str .= "ddmx" . $uniqueID . ".init(); \n";
    $str .= "}\n";
    $str .= "if ( typeof window.addEventListener != \"undefined\" )\n";
    $str .= "window.addEventListener( \"load\", makemenu" . $uniqueID . ", false );\n";
    $str .= "else if ( typeof window.attachEvent != \"undefined\" ) { \n";
    $str .= "window.attachEvent( \"onload\", makemenu" . $uniqueID . " );\n";
    $str .= "}\n";
    $str .= "else {\n";
    $str .= "if ( window.onload != null ) {\n";
    $str .= "var oldOnload = window.onload;\n";
    $str .= "window.onload = function ( e ) { \n";
    $str .= "oldOnload( e ); \n";
    $str .= "makemenu" . $uniqueID . "() \n";
    $str .= "} \n";
    $str .= "}  \n";
    $str .= "else  { \n";
    $str .= "window.onload = makemenu" . $uniqueID . "();\n";
    $str .= "} }\n";
    $str .= "//--> \n";
    $str .= "</script>  \n";
    $str .= "<script type=\"text/javascript\">\n";
    $str .= "<!--\n";
   if (($swmenupro['c_corner_style'] != 'none') && ($swmenupro['c_corner_style'])&& ($swmenupro['c_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_width'] > 0) && ($swmenupro['main_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9 ) {\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').css('z-index','-1');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').wrap('<div></div>');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().css('padding', '" . $swmenupro['main_border_width'] . "px');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().css('background-color', '" . $swmenupro['main_border_color'] . "');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').parent().corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size'] + $swmenupro['main_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#outerwrap" . $uniqueID . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
            }
        }
    if (($swmenupro['t_corner_style'] != 'none') && ($swmenupro['t_corner_style'])&& ($swmenupro['t_corner_style'] != 'curvycorner')){
        if (($swmenupro['main_border_over_width'] > 0) && ($swmenupro['main_border_over_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').css('z-index','-1');\n";
               // $str .= "jQuery('#swmenu .item1').wrap('<span></span>');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().css('padding', '" . $swmenupro['main_border_over_width'] . "px');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().css('background-color', '" . $swmenupro['main_border_color_over'] . "');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').parent().corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size'] + $swmenupro['main_border_over_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('keep " . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#menu" . $uniqueID . " .item1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
            }
         }
    if (($swmenupro['s_corner_style'] != 'none') && ($swmenupro['s_corner_style'])&& ($swmenupro['s_corner_style'] != 'curvycorner')){
       
         if (($swmenupro['sub_border_width'] > 0) && ($swmenupro['sub_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
               // $str .= "jQuery('.section').css('z-index','-1');\n";
             //   $str .= "jQuery('.section').wrap('<span></span>');\n";
             //   $str .= "jQuery('.section').parent().css('padding', '" . $swmenupro['sub_border_width'] . "px');\n";
             //   $str .= "jQuery('.section').parent().css('background-color', '" . $swmenupro['sub_border_color'] . "');\n";
                $str .= "jQuery('.section').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
            //    $str .= "jQuery('.section').parent().corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size'] + $swmenupro['sub_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('.section').corner('keep " . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               if (@$swmenupro['stl_corner'] + @$swmenupro['str_corner'] != 0) {
                    $str .= "jQuery('#menu" . $uniqueID . " .section .item2.first').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
               if (@$swmenupro['sbl_corner'] + @$swmenupro['sbr_corner'] != 0) {
                    $str .= "jQuery('#menu" . $uniqueID . " .section .item2.last').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
               }
       }
        
        
        
    }
    
    if (($swmenupro['si_corner_style'] != 'none') && ($swmenupro['si_corner_style'])&& ($swmenupro['si_corner_style'] != 'curvycorner')){
       
         if (($swmenupro['sub_border_width'] > 0) && ($swmenupro['sub_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
               // $str .= "jQuery('.section').css('z-index','-1');\n";
             //   $str .= "jQuery('.section').wrap('<span></span>');\n";
             //   $str .= "jQuery('.section').parent().css('padding', '" . $swmenupro['sub_border_width'] . "px');\n";
             //   $str .= "jQuery('.section').parent().css('background-color', '" . $swmenupro['sub_border_color'] . "');\n";
                $str .= "jQuery('.section').corner('" . $swmenupro['si_corner_style'] . " " . (@$swmenupro['sitl_corner'] ? 'tl' : '') . " " . (@$swmenupro['sitr_corner'] ? 'tr' : '') . " " . (@$swmenupro['sibl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sibr_corner'] ? 'br' : '') . " " . ($swmenupro['si_corner_size']) . "px');\n";
            //    $str .= "jQuery('.section').parent().corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size'] + $swmenupro['sub_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('.section').corner('" . $swmenupro['si_corner_style'] . " " . (@$swmenupro['sitl_corner'] ? 'tl' : '') . " " . (@$swmenupro['sitr_corner'] ? 'tr' : '') . " " . (@$swmenupro['sibl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sibr_corner'] ? 'br' : '') . " " . ($swmenupro['si_corner_size']) . "px');\n";$str .= "}\n";
            }else{ 
               if (@$swmenupro['sitl_corner'] + @$swmenupro['sitr_corner'] +@$swmenupro['sibl_corner'] + @$swmenupro['sibr_corner'] != 0) {
                    $str .= "jQuery('#menu" . $uniqueID . " .item2').corner('" . $swmenupro['si_corner_style'] . " " . (@$swmenupro['sitl_corner'] ? 'tl' : '') . " " . (@$swmenupro['sitr_corner'] ? 'tr' : '') . " " . (@$swmenupro['sibl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sibr_corner'] ? 'br' : '') . " " . ($swmenupro['si_corner_size']) . "px');\n";
             }
              
       }
        
        
        
    }
    
    
    if ($swmenupro['overlay_hack']) {
        $str .= "jQuery('#menu" . $uniqueID . "').parents().css('overflow','visible');\n";
        $str .= "jQuery('html').css('overflow','auto');\n";
        $str .= "jQuery('#menu" . $uniqueID . "').parents().css('z-index','100');\n";
        $str .= "jQuery('#menu" . $uniqueID . "').css('z-index','101');\n";
    }
   if ($swmenupro['top_ttf']) {
       $str .= "Cufon.replace('.ddmx" . $uniqueID . " .item1',{hover: true, fontFamily: '" . $swmenupro['top_font_face']. "' });\n";
    }
    if ($swmenupro['sub_ttf']) {
       
        $str .= "Cufon.replace('.ddmx" . $uniqueID . " .item2',{hover: true, fontFamily: '" . $swmenupro['sub_font_face']. "' });\n";
    }
    $str .= "//-->\n";
    $str .= "</script>\n";
   //  $str .= swmenu_gettooltip($ordered);
    return $str;
}

function SuperfishMenu($ordered, $swmenupro) {
   
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($live_site, (strlen($live_site) - 1), 1) != "/") {
        $live_site =$live_site."/" ;
    }
    $name = "";
    $counter = 0;
    $doMenu = 1;
    $uniqueID = $swmenupro['id'];
    $number = count($ordered);
    $activesub = -1;
    $activesub2 = -1;
    $topcount = 0;
    $subcounter = 0;

   
    $str = "<div id=\"sfmenu" . $uniqueID . "\" align=\"" . $swmenupro['position'] . "\" >\n";
    if ($swmenupro['orientation'] == "horizontal") {
        $str .= "<ul  id=\"menu" . $uniqueID . "\" class=\"sw-sf" . $uniqueID . "\"  > \n";
    } else {
        $str .= "<ul  id=\"menu" . $uniqueID . "\" class=\"sw-sf" . $uniqueID . " sf-vertical\"  > \n";
    }
    while ($doMenu) {
        if ($ordered[$counter]['indent'] == 0) {
            $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
            $name = swmenu_getname($ordered[$counter]);
           if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['top_sub_indicator']) {
                $name = "<img src='" . $live_site . $swmenupro['top_sub_indicator'] . "' align='" . $swmenupro['top_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['top_sub_indicator_left'] . "px;top:" . $swmenupro['top_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name;
              }

            if ($swmenupro['orientation'] == "vertical") {
                
            }
            $act = 0;
            if (islast($ordered, $counter)) {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='sf-" . $uniqueID . $ordered[$counter]['ID'] . "' class='current'> \n";
                    $act = 1;
                    $activesub = $topcount;
                } else {
                    $str .= "<li id='sf-" . $uniqueID . $ordered[$counter]['ID'] . "' > \n";
                }
            } else {
                if (($ordered[$counter]['ID'] == $swmenupro['active_menu'])) {
                    $str .= "<li id='sf-" . $uniqueID . $ordered[$counter]['ID'] . "' class='current'> \n";
                    $act = 1;
                    $activesub = $topcount;
                } else {
                    $str .= "<li id='sf-" . $uniqueID . $ordered[$counter]['ID'] . "' > \n";
                }
            }
            $topcount++;
            if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                if (islast($ordered, $counter)) {
                    $str .= "<a class='item1 last' href=\"javascript:void(0);\" >" . $name . "</a> \n";
                } else {
                    $str .= "<a class='item1' href=\"javascript:void(0);\" >" . $name . "</a> \n";
                }
            } else {
                switch ($ordered[$counter]['TARGET']) {
                    case 1:
                        if (islast($ordered, $counter)) {
                            $str .= '<a href="' . $ordered[$counter]['URL'] . '" target="_blank" class="item1 last" >' . $name . '</a>';
                        } else {
                            $str .= '<a href="' . $ordered[$counter]['URL'] . '" target="_blank" class="item1" >' . $name . '</a>';
                        }
                        break;
                    case 2:
                        if (islast($ordered, $counter)) {
                            $str .= "<a href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"item1 last\">" . $name . "</a>\n";
                        } else {
                            $str .= "<a href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"item1\">" . $name . "</a>\n";
                        }
                        break;
                    case 3:
                        if (islast($ordered, $counter)) {
                            $str .= '<a class="item1 last" >' . $name . '</a>';
                        } else {
                            $str .= '<a class="item1" >' . $name . '</a>';
                        }
                        break;
                    default:
                        if (islast($ordered, $counter)) {
                            $str .= "<a href='" . $ordered[$counter]['URL'] . "' class='item1 last'>" . $name . "</a>\n";
                        } else {
                            $str .= "<a href='" . $ordered[$counter]['URL'] . "' class='item1'>" . $name . "</a>\n";
                        }
                        break;
                }
            }
            if ($counter + 1 == $number) {
                $doSubMenu = 0;
                $doMenu = 0;
            } elseif ($ordered[$counter + 1]['indent'] == 0) {
                $doSubMenu = 0;
            } else {
                $doSubMenu = 1;
            }
            $counter++;
            if ($activesub2 == -1) {
                $subcounter = 0;
            }
            while ($doSubMenu) {
                if ($ordered[$counter]['indent'] != 0) {
                    if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']) {
                        $str .= "<ul class='sf-section" . $uniqueID . "' >\n";
                    }
                    $ordered[$counter]['URL'] = str_replace('&', '&amp;', $ordered[$counter]['URL']);
                    $name = swmenu_getname($ordered[$counter]);
                    if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] == 0)) {
                        $doSubMenu = 0;
                    }
                    $li_class = "";
                    $classname = "item2";
                    if ($ordered[$counter]['indent'] > $ordered[$counter - 1]['indent']) {
                        $classname .= " first";
                    }
                    if (($counter + 1 == $number) || islast($ordered, $counter)) {
                        $classname .= " last";
                    }
                     if (($counter + 1 != $number) && ($ordered[$counter + 1]['indent'] > $ordered[$counter]['indent']) && $swmenupro['sub_sub_indicator']) {
                        $name = "<img src='" . $live_site . $swmenupro['sub_sub_indicator'] . "' align='" . $swmenupro['sub_sub_indicator_align'] . "' style='position:relative;left:" . $swmenupro['sub_sub_indicator_left'] . "px;top:" . $swmenupro['sub_sub_indicator_top'] . "px;' alt=''  border='0' />" . $name;
                     }
                    //if (($ordered[$counter]['ID'] == $Itemid)) {
                        $li_class = "sf-" . $uniqueID . $ordered[$counter]['ID'] . "";
                    //} else {
                    //    $li_class = "sf-" . $uniqueID . $ordered[$counter]['ID'] . "";
                   // }
                    $str .= "<li id=\"" . $li_class . "\">";
                    if ($ordered[$counter]['TARGETLEVEL'] == "0") {
                        $str .= "<a class=\"" . $classname . "\" href=\"javascript:void(0);\" >" . $name . "</a> ";
                    } else {
                        switch ($ordered[$counter]['TARGET']) {
                            case 1:
                                $str .= '<a href="' . $ordered[$counter]['URL'] . '" target="_blank" class="' . $classname . '" >' . $name . '</a>';
                                break;
                            case 2:
                                $str .= "<a href=\"#\" onclick=\"javascript: window.open('" . $ordered[$counter]['URL'] . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"" . $classname . "\">" . $name . "</a>\n";
                                break;
                            case 3:
                                $str .= '<a class="' . $classname . '" >' . $name . '</a>';
                                break;
                            default:
                                $str .= "<a href=\"" . $ordered[$counter]['URL'] . "\" class=\"" . $classname . "\" >" . $name . "</a>\n";
                                break;
                        }
                    }
                    if (($counter + 1 == $number) || ($ordered[$counter + 1]['indent'] < $ordered[$counter]['indent'])) {
                        $str .= str_repeat("</li></ul>\n", (($ordered[$counter]['indent']) - (@$ordered[$counter + 1]['indent'])));
                        if ((@$ordered[$counter + 1]['indent'] > 0)) {
                            $str .= "</li> \n";
                        }
                    } else if (($ordered[$counter + 1]['indent'] <= $ordered[$counter]['indent'])) {
                        $str .= "</li> \n";
                    }
                    $counter++;
                }
            }
            $str .= "</li> \n";
        }
        if ($swmenupro['orientation'] == "vertical") {
            
        }
        if ($counter == ($number)) {
            $doMenu = 0;
        }
    }
    $str .= "</ul><hr style=\"display:block;clear:left;margin:-0.66em 0;visibility:hidden;\" /></div> \n";

  

    if ($swmenupro['sub_width'] > 0) {
        $str .= "<script type=\"text/javascript\">\n";
        $str .= "<!--\n";
        $str .= "jQuery(document).ready(function($){\n";
        $str .= "jQuery('.sw-sf" . $uniqueID . "').superfish({\n";
        switch ($swmenupro['extra']) {
            case 1:
                $str .= "animation:   {opacity:'show'},";
                break;
            case 2:
                $str .= "animation:   {height:'show'},";
                break;
            case 3:
                $str .= "animation:   {width:'show'},";
                break;
            case 4:
                $str .= "animation:   {opacity:'show',height:'show'},";
                break;
            case 5:
                $str .= "animation:   {opacity:'show',width:'show'},";
                break;
            default:
                $str .= "speed:   0,";
                break;
        }

        $str .= "autoArrows:  false\n";

        // $str .= "});\n";
        $str .= "});});\n";
        if ($swmenupro['overlay_hack']) {
            $str .= "jQuery('.sw-sf" . $uniqueID . "').parents().css('overflow','visible');\n";
            $str .= "jQuery('html').css('overflow','auto');\n";
            $str .= "jQuery('.sw-sf" . $uniqueID . "').parents().css('z-index','100');\n";
            $str .= "jQuery('.sw-sf" . $uniqueID . "').css('z-index','101');\n";
        }
       
       

      //  $str .= "//--> \n";
      //  $str .= "</script>  \n";
    } else {
        $str .= "<script type=\"text/javascript\">\n";
        $str .= "<!--\n";
        $str .= "jQuery(document).ready(function($){\n";
        $str .= "jQuery('.sw-sf" . $uniqueID . "').supersubs({ \n";
        $str .= "minWidth:8,\n";
        $str .= "maxWidth:80,\n";
        $str .= "extraWidth:2\n";
        $str .= "}).superfish({\n";
        switch ($swmenupro['extra']) {
            case 1:
                $str .= "animation:   {opacity:'show'},";
                break;
            case 2:
                $str .= "animation:   {height:'show'},";
                break;
            case 3:
                $str .= "animation:   {width:'show'},";
                break;
            case 4:
                $str .= "animation:   {opacity:'show',height:'show'},";
                break;
            case 5:
                $str .= "animation:   {opacity:'show',width:'show'},";
                break;
            default:
                $str .= "speed:   0,";
                break;
        }

        $str .= "autoArrows:  false\n";

        $str .= "});});\n";
        if ($swmenupro['overlay_hack']) {
            $str .= "jQuery('.sw-sf" . $uniqueID . "').parents().css('overflow','visible');\n";
            $str .= "jQuery('html').css('overflow','auto');\n";
            $str .= "jQuery('.sw-sf" . $uniqueID . "').parents().css('z-index','100');\n";
            $str .= "jQuery('.sw-sf" . $uniqueID . "').css('z-index','101');\n";
        }


       // $str .= "\n//--> \n";
     //   $str .= "</script>  \n";
    }
    
     if (($swmenupro['c_corner_style'] != 'none') && ($swmenupro['c_corner_style'])&& ($swmenupro['c_corner_style'] != 'curvycorner')){
        
        if (($swmenupro['main_border_width'] > 0) && ($swmenupro['main_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                $str .= "jQuery('#sfmenu" . $uniqueID . "').css('z-index','-1');\n";
                $str .= "jQuery('#sfmenu" . $uniqueID . "').wrap('<div></div>');\n";
                $str .= "jQuery('#sfmenu" . $uniqueID . "').parent().css('padding', '" . $swmenupro['main_border_width'] . "px');\n";
                $str .= "jQuery('#sfmenu" . $uniqueID . "').parent().css('background-color', '" . $swmenupro['main_border_color'] . "');\n";
                $str .= "jQuery('#sfmenu" . $uniqueID . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "jQuery('#sfmenu" . $uniqueID . "').parent().corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size'] + $swmenupro['main_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('#sfmenu" . $uniqueID . "').corner('keep " . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('#sfmenu" . $uniqueID . "').corner('" . $swmenupro['c_corner_style'] . " " . (@$swmenupro['ctl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ctr_corner'] ? 'tr' : '') . " " . (@$swmenupro['cbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['cbr_corner'] ? 'br' : '') . " " . ($swmenupro['c_corner_size']) . "px');\n";
            }
        }
    if (($swmenupro['t_corner_style'] != 'none') && ($swmenupro['t_corner_style'])&& ($swmenupro['t_corner_style'] != 'curvycorner')){
        if (($swmenupro['main_border_over_width'] > 0) && ($swmenupro['main_border_over_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
                $str .= "jQuery('.sw-sf" . $uniqueID . " a.item1').css('z-index','-1');\n";
               // $str .= "jQuery('.sw-sf a.item1').wrap('<span></span>');\n";
                $str .= "jQuery('.sw-sf" . $uniqueID . " a.item1').parent().css('padding', '" . $swmenupro['main_border_over_width'] . "px');\n";
                $str .= "jQuery('.sw-sf" . $uniqueID . " a.item1').parent().css('background-color', '" . $swmenupro['main_border_color_over'] . "');\n";
                $str .= "jQuery('.sw-sf" . $uniqueID . " a.item1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "jQuery('.sw-sf" . $uniqueID . " a.item1').parent().corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size'] + $swmenupro['main_border_over_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('.sw-sf" . $uniqueID . " a.item1').corner('keep " . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               $str .= "jQuery('.sw-sf" . $uniqueID . " a.item1').corner('" . $swmenupro['t_corner_style'] . " " . (@$swmenupro['ttl_corner'] ? 'tl' : '') . " " . (@$swmenupro['ttr_corner'] ? 'tr' : '') . " " . (@$swmenupro['tbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['tbr_corner'] ? 'br' : '') . " " . ($swmenupro['t_corner_size']) . "px');\n";
            }
         }
    if (($swmenupro['s_corner_style'] != 'none') && ($swmenupro['s_corner_style'])&& ($swmenupro['s_corner_style'] != 'curvycorner')){
       
         if (($swmenupro['sub_border_width'] > 0) && ($swmenupro['sub_border_style'] != 'none')) {
                $str .= "if (jQuery.browser.msie && jQuery.browser.version < 9) {\n";
               // $str .= "jQuery('.section').css('z-index','-1');\n";
             //   $str .= "jQuery('.section').wrap('<span></span>');\n";
             //   $str .= "jQuery('.section').parent().css('padding', '" . $swmenupro['sub_border_width'] . "px');\n";
             //   $str .= "jQuery('.section').parent().css('background-color', '" . $swmenupro['sub_border_color'] . "');\n";
                $str .= "jQuery('.sf-section" . $uniqueID . " .item2').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
            //    $str .= "jQuery('.section').parent().corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size'] + $swmenupro['sub_border_width']) . "px');\n";
               // $str .= "jQuery('#outerwrap').css('z-index','1');\n";
                $str .= "}else{\n";
                $str .= "jQuery('.sf-section" . $uniqueID . " .item2').corner('keep " . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . ($swmenupro['s_corner_size']) . "px');\n";
                $str .= "}\n";
            }else{ 
               if (@$swmenupro['stl_corner'] + @$swmenupro['str_corner'] != 0) {
                   $str .= "jQuery('.sf-section" . $uniqueID . " .item2.first').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['stl_corner'] ? 'tl' : '') . " " . (@$swmenupro['str_corner'] ? 'tr' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
           
                    }
                if (@$swmenupro['sbl_corner'] + @$swmenupro['sbr_corner'] != 0) {
                    $str .= "jQuery('.sf-section" . $uniqueID . " .item2.last').corner('" . $swmenupro['s_corner_style'] . " " . (@$swmenupro['sbl_corner'] ? 'bl' : '') . " " . (@$swmenupro['sbr_corner'] ? 'br' : '') . " " . @$swmenupro['s_corner_size'] . "px');\n";
                }
       }
        
        
        
    }
       
   if ($swmenupro['top_ttf']) {
       $str .= "Cufon.replace('.sw-sf" . $uniqueID . " .item1',{hover: true, fontFamily: '" . $swmenupro['top_font_face'] . "' });\n";
    }
    if ($swmenupro['sub_ttf']) {
        $str .= "Cufon.replace('.sw-sf" . $uniqueID . " .item2',{hover: true, fontFamily: '" . $swmenupro['sub_font_face'] . "' });\n";
    }
    $str .= "//-->\n";
    $str .= "</script>\n";

   
    return $str;
}

function islast($array, $id) {
    $this_level = $array[$id]['indent'];
    $last = 0;
    $i = $id + 1;
    $do = 1;
    while ($do) {
        if (@$array[$i]['indent'] < $this_level || $i == count($array)) {
            $last = 1;
        }
        if (@$array[$i]['indent'] <= $this_level) {
            $do = 0;
        }
        $i++;
    }
    return $last;
}

function swmenuGetBrowser() {
    $br = new swBrowser;
    return ($br->Name . $br->Version);
}

function inAgent($agent) {
    global $HTTP_USER_AGENT;
    $notAgent = strpos($HTTP_USER_AGENT, $agent) === false;
    return !$notAgent;
}

function fixPadding(&$swmenupro) {
   
    if ($swmenupro['main_width'] != 0) {
        $swmenupro['main_width'] = ($swmenupro['main_width'] - ($swmenupro['main_pad_right'] + $swmenupro['main_pad_left']));
    }
    if ($swmenupro['main_height'] != 0) {
        $swmenupro['main_height'] = ($swmenupro['main_height'] - ($swmenupro['main_pad_top'] + $swmenupro['main_pad_bottom']));
    }
    if ($swmenupro['sub_width'] != 0) {
        $swmenupro['sub_width'] = ($swmenupro['sub_width'] - ($swmenupro['sub_pad_right'] + $swmenupro['sub_pad_left']));
    }
    if (@$swmenupro['sub_width'] != 0) {
        $swmenupro['sub_height'] = ($swmenupro['sub_height'] - ($swmenupro['sub_pad_top'] + $swmenupro['sub_pad_bottom']));
    }
    return ($swmenupro);
}

function swmenu_getname($ordered) {
    global $mainframe, $Itemid;
    $admin=0;
     $database = JFactory::getDBO();
    $absolute_path = JPATH_ROOT;
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
       
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
         $admin=1;
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    $image_url = "";
    $name = "";
    $image1 = explode(",", $ordered['IMAGE']);
    $image2 = explode(",", $ordered['IMAGEOVER']);

    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    //if(substr($live_site,(strlen($live_site)-13),13)=="administrator"){$live_site=substr($live_site,0,(strlen($live_site)-14));}
    if (substr($image1[0], 0, 1) == "/") {
        $image1[0] = substr($image1[0], 1, (strlen($image1[0]) - 1));
    }
    if (substr($image2[0], 0, 1) == "/") {
        $image2[0] = substr($image2[0], 1, (strlen($image2[0]) - 1));
    }

    $image1params = @$image1[0] ? " src=\"" . $live_site . "/" . $image1[0] . "\"" : "";
    $image1params .= @$image1[3] ? " vspace=\"" . $image1[3] . "\"" : " vspace=\"0\"";
    $image1params .= @$image1[4] ? " hspace=\"" . $image1[4] . "\"" : " hspace=\"0\"";
    $image2params = @$image2[0] ? " src=\"" . $live_site . "/" . $image2[0] . "\"" : "";
    $image2params .= @$image2[3] ? " vspace=\"" . $image2[3] . "\"" : " vspace=\"0\"";
    $image2params .= @$image2[4] ? " hspace=\"" . $image2[4] . "\"" : " hspace=\"0\"";
    $image1params .= @$image1[1] ? " width=\"" . $image1[1] . "\"" : "";
    $image1params .= @$image1[2] ? " height=\"" . $image1[2] . "\"" : "";
    $image2params .= @$image2[1] ? " width=\"" . $image2[1] . "\"" : "";
    $image2params .= @$image2[2] ? " height=\"" . $image2[2] . "\"" : "";
    $image1params .= $ordered['IMAGEALIGN'] ? " align=\"" . $ordered['IMAGEALIGN'] . "\"" : "";
    $image2params .= $ordered['IMAGEALIGN'] ? " align=\"" . $ordered['IMAGEALIGN'] . "\"" : "";
    if (($ordered['IMAGE'] != "") && (file_exists($absolute_path . "/" . $image1[0]))) {
        $image_url = "<img class=\"seq1\" border=\"0\" " . $image1params . " alt=\"" . $ordered['TITLE'] . "\" />";
    }
    if (($ordered['IMAGEOVER'] != "") && (file_exists($absolute_path . "/" . $image2[0]))) {
        $image_url .= "<img class=\"seq2\" border=\"0\" " . $image2params . " alt=\"" . $ordered['TITLE'] . "\" />";
    }
    if ($ordered['SHOWNAME'] || $ordered['SHOWNAME'] == null) {
        $name = $image_url . $ordered['TITLE'];
    } else {
        $name = $image_url;
    }
    
  //  jimport( 'joomla.application.module.helper' );
     if($ordered["HTML"]){
     //  $name.="hello";
       if ($admin==0){  
        $document	= JFactory::getDocument();
	              
               $style="xhtml";
		$renderer	= $document->loadRenderer('module');
	    $params		= array('style'=>$style);

	$contents = '';
	//$position='right';
	$regex = '/{swmenuload\s*.*?}/i';

 	$contents = $ordered['HTML'];
 	//echo $contents;	
        
 	preg_match_all( $regex, $contents, $matches );

	// Number of plugins
 	$count = count( $matches[0] );
//echo $count;
       
 	for ( $i=0; $i < $count; $i++ )
	{
 		$load = str_replace( 'swmenuload', '', $matches[0][$i] );
 		$load = str_replace( '{', '', $load );
 		$load = str_replace( '}', '', $load );
 		$load = trim( $load );
 	$database->setQuery( "SELECT id"
	. "\nFROM #__modules"
	//. "\nLEFT JOIN #__users AS u ON u.id = m.checked_out"
	. "\nWHERE (title='$load') "
	);
		
	$id = $database->loadResult();

	$module 	= JTable::getInstance('module' );
	    // load the row from the db table
	    $module->load( $id );

		$content = JModuleHelper::renderModule($module, $params);
		$contents 	= str_replace($matches[0][$i], $content, $contents );
               
        }
        
        }else{
          $contents = $ordered['HTML'];  
        //  echo $contents;
        }
       
       if($ordered['HTML_POSITION']=='after'){
           //  print_r($module);
            $name.=$contents;  
    //  $name.=$ordered['HTML'];     
       }else if($ordered['HTML_POSITION']=='before'){
    $name=$contents.$name;
   }else if($ordered['HTML_POSITION']=='tooltip'){
    $name="<span id='tooltipspan-".$ordered['ID']."' style='display:block;' >".$name."</span>";
   }else{
        $name.=$contents;
   }
   }
    return $name;
}



function swmenu_gettooltip($ordered)
{
  
  
    $admin=0;
     $database = JFactory::getDBO();
  
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
       
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
         $admin=1;
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
       $divs="";
       $scripts="";
       if (!defined( '_swtooltip_defined')){
           
       }
      // $contents = $ordered[$j]['HTML'];
   //  if ($admin==0){ 
  
   $counter = count( $ordered );
//echo $count;
 	for ( $j=0; $j < $counter; $j++ )  {   

	$contents = '';
	//$position='right';
	

 	$contents = $ordered[$j]['HTML'];
 	//echo $contents;	
        if($admin==0){
          $document	= JFactory::getDocument();
	   $style="xhtml";
		$renderer	= $document->loadRenderer('module');
	    $params		= array('style'=>$style);
            $regex = '/{swmenuload\s*.*?}/i';
 	preg_match_all( $regex, $contents, $matches );

	// Number of plugins
 	$count = count( $matches[0] );
//echo $count;
 	for ( $i=0; $i < $count; $i++ )
	{
 		$load = str_replace( 'swmenuload', '', $matches[0][$i] );
 		$load = str_replace( '{', '', $load );
 		$load = str_replace( '}', '', $load );
 		$load = trim( $load );
 	$database->setQuery( "SELECT id"
	. "\nFROM #__modules"
	//. "\nLEFT JOIN #__users AS u ON u.id = m.checked_out"
	. "\nWHERE (title='$load') "
	);
		
	$id = $database->loadResult();

	$module 	= JTable::getInstance('module' );
	    // load the row from the db table
	    $module->load( $id );

		$content = JModuleHelper::renderModule($module, $params);
		$contents 	= str_replace($matches[0][$i], $content, $contents );
               
        }}  
        
   if($ordered[$j]['HTML_POSITION']=='tooltip'){
       $headtag="";
        if (!defined( '_swtooltip_defined')){
                 define( '_swtooltip_defined', 1 );
              
        }
    $divs.="<div id='tooltip-".$ordered[$j]['ID']."' style='display:none;'>".$contents."</div>";
    $scripts.=" jQuery(document).ready(function(){\n";
    $scripts.="jQuery(\"#tooltipspan-".$ordered[$j]['ID']."\").tooltip({\n";
     $scripts.="bodyHandler: function() {\n";
      $scripts.="return jQuery(\"#tooltip-".$ordered[$j]['ID']."\").html();";
     //$scripts.="return 'test';";
     $scripts.="},\nshowURL:false,\n";
      $scripts.="fade:100,\n";
      $scripts.="track:true,\n";
       $scripts.="opacity:1\n});\n";
       $scripts.="});\n";
   
    
   }
        }
  // }
    
   $name=$divs."\n<script type='text/javascript' >\n".$scripts."\n</script>\n";
    
    return $name;
}

function sw_getactive($ordered,$menustyle) {
    $menu_items = @ JSite::getMenu();
    $active = $menu_items->getActive();
    $current_itemid = $active->id;

    $current_id = trim(JRequest::getVar('id', 0));
    $current_task = trim(JRequest::getVar('task', 0));
    $swid = trim(JRequest::getVar('swid', 0));
    $cur_option = trim(JRequest::getVar('option', ''));

    if (($cur_option == "com_virtuemart")) {

        $prod_id = trim(JRequest::getVar('virtuemart_product_id', 0));
        $cat_id = trim(JRequest::getVar('virtuemart_category_id', 0));
        if ($prod_id) {
            $current_itemid = $prod_id + 100000;
        } else {
            $current_itemid = $cat_id + 10000;
        }
    }
    if (!$current_itemid && $current_id) {
        if (preg_match("/category/i", $current_task)) {
            $current_itemid = $current_id + 1000;
        } elseif (preg_match("/section/i", $current_task)) {
            $current_itemid = $current_id;
        } elseif (preg_match("/view/i", $current_task)) {
            $current_itemid = $current_id + 10000;
        }
    }
    $indent = 0;
    $parent_value = $current_itemid;
    $parent = 1;
    $id = 0;
    
    if($menustyle=="treeview" || $menustyle=="treemenu"){
      $id=$current_itemid;  
       for ($i = 0; $i < count($ordered); $i++) {
            $row = $ordered[$i];
            $params =  $menu_items->getParams($row['ID']);
            $alias = $params->get('aliasoptions', $row['ID']);
            if ($row['ID'] == $parent_value || $alias == $parent_value) {
                $parent_value = $row['PARENT'];
                $indent = $row['indent'];
                $id = $row['ID'];
            }
        }
    }else{
    
    while ($parent) {
        for ($i = 0; $i < count($ordered); $i++) {
            $row = $ordered[$i];
            $params =  $menu_items->getParams($row['ID']);
            $alias = $params->get('aliasoptions', $row['ID']);
            if ($row['ID'] == $parent_value || $alias == $parent_value) {
                $parent_value = $row['PARENT'];
                $indent = $row['indent'];
                $id = $row['ID'];
            }
        }
        if (!$indent) {
            $parent = 0;
        }
    }
    }
    return ($id);
}



function sw_getsubactive($ordered) {
    $menu_items = @ JSite::getMenu();
    $active = $menu_items->getActive();
    $current_itemid = $active->id;

   
  
      $id=$current_itemid;  
      
      
      foreach ($ordered as $row) {
            //echo $row['ID']."<br />";
            $params =  $menu_items->getParams($row['ID']);
            $alias = $params->get('aliasoptions', $row['ID']);
            if (($alias == $current_itemid)) {
                $id = $row['ID'];
            }
        }
      
      
   
    return ($id);
}


function sw_getsubmenu($ordered, $parent_level, $levels, $menu) {
    global $Itemid;
    $option2 = trim(JRequest::getVar('option', 0));
    $id = trim(JRequest::getVar('id', 0));
    $current_itemid = trim(JRequest::getVar('Itemid', 0));
    $menu_items = @ JSite::getMenu();
    $i = 0;
    $indent = 0;
    $menudisplay = 0;
    $parent = 1;
    if (($menu == "swcontentmenu") && ($option2 == "com_content") && $id) {
        $parent_value = $id;
    } elseif ($menu == "swcontentmenu") {
        $parent = 0;
    } else {
        $parent_value = $current_itemid;
        $menudisplay = 0;
        $parent = 1;
    }
    $id = 0;
    //echo "parent ".$parent."<br />";
    while ($parent) {
        foreach ($ordered as $row) {
            //echo $row['ID']."<br />";
            $params =  $menu_items->getParams($row['ID']);
            $alias = $params->get('aliasoptions', $row['ID']);
            if (($row['ID'] == $parent_value || $row['ID'] == $parent_value + 1000 || $row['ID'] == $parent_value + 10000 || $alias == $parent_value)) {

                $parent_value = $row['PARENT'];
                $indent = $row['indent'];
                $id = $row['ID'];
            }
        }
        if ($indent == $parent_level) {
            $parent = 0;
            $id = $parent_value;
        } elseif ($indent == $parent_level - 1) {
            $parent = 0;
            //$id=$parent_value;
        } elseif ($indent < $parent_level - 1) {
            $parent = 0;


            if ($parent_level == 2) {
                $id = $id;
            } else {
                $id = 0;
            }
        }

        $i++;
        if ($i > $levels) {
            $parent = 0;
        }
    }
    for ($i = 0; $i < count($ordered); $i++) {
        $row = $ordered[$i];
        //echo "id ".$id." PID ".$row['PARENT']."<br />";
        if (($row['PARENT'] == $id && $row['indent'] == $parent_level)) {
            $menudisplay = 1;
        }
        if (($row['PARENT'] == $id - 1000)) {
            $menudisplay = 1;
        }
        if (($row['indent'] == 0)) {
            $ordered[$i]['PARENT'] = 0;
        }
    }
    //echo "display ".$id;

    if ($menudisplay) {
        $ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $id, $levels);
        $ordered[0]['mid'] = $id;
    } else {
        $ordered = array();
    }

    return $ordered;
}

class swBrowser {

    var $Name = "Unknown";
    var $Version = "Unknown";
    var $Platform = "Unknown";
    var $UserAgent = "Not reported";
    var $AOL = false;

    function swBrowser() {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $bd['platform'] = "Unknown";
        $bd['swBrowser'] = "Unknown";
        $bd['version'] = "Unknown";
        $this->UserAgent = $agent;
        if (preg_match("/win/i", $agent))
            $bd['platform'] = "Windows";
        elseif (preg_match("/mac/i", $agent))
            $bd['platform'] = "MacIntosh";
        elseif (preg_match("/linux/i", $agent))
            $bd['platform'] = "Linux";
        elseif (preg_match("/OS2/i", $agent))
            $bd['platform'] = "OS/2";
        elseif (preg_match("/BeOS/i", $agent))
            $bd['platform'] = "BeOS";
        if (preg_match("/opera/i", $agent)) {
            $val = stristr($agent, "opera");
            if (preg_match("//i", $val)) {
                $val = explode("/", $val);
                $bd['swBrowser'] = $val[0];
                $val = explode(" ", $val[1]);
                $bd['version'] = $val[0];
            } else {
                $val = explode(" ", stristr($val, "opera"));
                $bd['swBrowser'] = $val[0];
                $bd['version'] = $val[1];
            }
        } elseif (preg_match("/webtv/i", $agent)) {
            $val = explode("/", stristr($agent, "webtv"));
            $bd['swBrowser'] = $val[0];
            $bd['version'] = $val[1];
        } elseif (preg_match("/microsoft internet explorer/i", $agent)) {
            $bd['swBrowser'] = "MSIE";
            $bd['version'] = "1.0";
            $var = stristr($agent, "/");
            if (preg("/308|425|426|474|0b1/", $var)) {
                $bd['version'] = "1.5";
            }
        } elseif (preg_match("/NetPositive/i", $agent)) {
            $val = explode("/", stristr($agent, "NetPositive"));
            $bd['platform'] = "BeOS";
            $bd['swBrowser'] = $val[0];
            $bd['version'] = $val[1];
        } elseif (preg_match("/msie/i", $agent) && !preg_match("/opera/i", $agent)) {
            $val = explode(" ", stristr($agent, "msie"));
            $bd['swBrowser'] = $val[0];
            $bd['version'] = $val[1];
        } elseif (preg_match("/mspie/i", $agent) || preg_match('/pocket/i', $agent)) {
            $val = explode(" ", stristr($agent, "mspie"));
            $bd['swBrowser'] = "MSPIE";
            $bd['platform'] = "WindowsCE";
            if (preg_match("/mspie/i", $agent))
                $bd['version'] = $val[1];
            else {
                $val = explode("/", $agent);
                $bd['version'] = $val[1];
            }
        } elseif (preg_match("/galeon/i", $agent)) {
            $val = explode(" ", stristr($agent, "galeon"));
            $val = explode("/", $val[0]);
            $bd['swBrowser'] = $val[0];
            $bd['version'] = $val[1];
        } elseif (preg_match("/Konqueror/i", $agent)) {
            $val = explode(" ", stristr($agent, "Konqueror"));
            $val = explode("/", $val[0]);
            $bd['swBrowser'] = $val[0];
            $bd['version'] = $val[1];
        } elseif (preg_match("/icab/i", $agent)) {
            $val = explode(" ", stristr($agent, "icab"));
            $bd['swBrowser'] = $val[0];
            $bd['version'] = $val[1];
        } elseif (preg_match("/omniweb/i", $agent)) {
            $val = explode("/", stristr($agent, "omniweb"));
            $bd['swBrowser'] = $val[0];
            $bd['version'] = $val[1];
        } elseif (preg_match("/Phoenix/i", $agent)) {
            $bd['swBrowser'] = "Phoenix";
            $val = explode("/", stristr($agent, "Phoenix/"));
            $bd['version'] = $val[1];
        } elseif (preg_match("/firebird/i", $agent)) {
            $bd['swBrowser'] = "Firebird";
            $val = stristr($agent, "Firebird");
            $val = explode("/", $val);
            $bd['version'] = $val[1];
        } elseif (preg_match("/Firefox/i", $agent)) {
            $bd['swBrowser'] = "Firefox";
            $val = stristr($agent, "Firefox");
            $val = explode("/", $val);
            $bd['version'] = $val[1];
        } elseif (preg_match("/mozilla/i", $agent) && preg_match("/rv:[0-9].[0-9][a-b]/i", $agent) && !preg_match("/netscape/i", $agent)) {
            $bd['swBrowser'] = "Mozilla";
            $val = explode(" ", stristr($agent, "rv:"));
            preg_match("/rv:[0-9].[0-9][a-b]/i", $agent, $val);
            $bd['version'] = str_replace("rv:", "", $val[0]);
        } elseif (preg_match("/mozilla/i", $agent) && preg_match("/rv:[0-9]\.[0-9]/i", $agent) && !preg_match("/netscape/i", $agent)) {
            $bd['swBrowser'] = "Mozilla";
            $val = explode(" ", stristr($agent, "rv:"));
            preg_match("/rv:[0-9]\.[0-9]\.[0-9]/i", $agent, $val);
            $bd['version'] = str_replace("rv:", "", $val[0]);
        } elseif (preg_match("/libwww/i", $agent)) {
            if (preg_match("/amaya/i", $agent)) {
                $val = explode("/", stristr($agent, "amaya"));
                $bd['swBrowser'] = "Amaya";
                $val = explode(" ", $val[1]);
                $bd['version'] = $val[0];
            } else {
                $val = explode("/", $agent);
                $bd['swBrowser'] = "Lynx";
                $bd['version'] = $val[1];
            }
        } elseif (preg_match("/safari/i", $agent)) {
            $bd['swBrowser'] = "Safari";
            $bd['version'] = "";
        } elseif (preg_match("/netscape/i", $agent)) {
            $val = explode(" ", stristr($agent, "netscape"));
            $val = explode("/", $val[0]);
            $bd['swBrowser'] = $val[0];
            $bd['version'] = $val[1];
        } elseif (preg_match("/mozilla/i", $agent) && !preg_match("/rv:[0-9]\.[0-9]\.[0-9]/i", $agent)) {
            $val = explode(" ", stristr($agent, "mozilla"));
            $val = explode("/", $val[0]);
            $bd['swBrowser'] = "Netscape";
            $bd['version'] = $val[1];
        }
        $bd['swBrowser'] = preg_replace("[^a-z,A-Z]", "", $bd['swBrowser']);
        $bd['version'] = preg_replace("[^0-9,.,a-z,A-Z]", "", $bd['version']);
        if (preg_match("/AOL/i", $agent)) {
            $var = stristr($agent, "AOL");
            $var = explode(" ", $var);
            $bd['aol'] = preg_replace("[^0-9,.,a-z,A-Z]", "", $var[1]);
        }
        $this->Name = $bd['swBrowser'];
        $this->Version = $bd['version'];
        $this->Platform = $bd['platform'];
    }

}




function sw_stringToObject3($data)
{
   $obj= new stdClass();
   $lines = explode("\n", $data);

		// Process the lines.
		foreach ($lines as $line)
		{
			// Trim any unnecessary whitespace.
			$line = trim($line);

			// Ignore empty lines and comments.
			if (empty($line) || ($line{0} == ';'))
			{
				continue;
			}

			// Check that an equal sign exists and is not the first character of the line.
			if (!strpos($line, '='))
			{
				// Maybe throw exception?
				continue;
			}

			// Get the key and value for the line.
			list ($key, $value) = explode('=', $line, 2);

			// Validate the key.
			if (preg_match('/[^A-Z0-9_]/i', $key))
			{
				// Maybe throw exception?
				continue;
			}

			// If the value is quoted then we assume it is a string.
			$length = strlen($value);
			if ($length && ($value[0] == '"') && ($value[$length - 1] == '"'))
			{
				// Strip the quotes and Convert the new line characters.
				$value = stripcslashes(substr($value, 1, ($length - 2)));
				$value = str_replace('\n', "\n", $value);
			}
			else
			{
				// If the value is not quoted, we assume it is not a string.

				// If the value is 'false' assume boolean false.
				if ($value == 'false')
				{
					$value = false;
				}
				// If the value is 'true' assume boolean true.
				elseif ($value == 'true')
				{
					$value = true;
				}
				// If the value is numeric than it is either a float or int.
				elseif (is_numeric($value))
				{
					// If there is a period then we assume a float.
					if (strpos($value, '.') !== false)
					{
						$value = (float) $value;
					}
					else
					{
						$value = (int) $value;
					}
				}
			}

			
				$obj->$key = $value;
			
		}

		// Cache the string to save cpu cycles -- thus the world :)
		

		return $obj;
}

?>
