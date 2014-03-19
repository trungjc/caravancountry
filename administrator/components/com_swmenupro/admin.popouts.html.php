<?PHP
/**
* swmenupro v4.5
* http://swonline.biz
* Copyright 2004 Sean White
**/

function popoutMenuConfig( $rows,$row2, $ordered, $lists,$orders3)
{
	
  $absolute_path=JPATH_ROOT;
  
   $live_site = JURI::root();
   $menutype2="";
   switch ($rows->menustyle){
		case "gosumenu":
			$menutype2=_SW_MYGOSU_MENU;
			break;
		case "transmenu":
			$menutype2=_SW_TRANS_MENU;
			break;
		case "accordian":
			$menutype2=_SW_ACCORDIAN_MENU;
			break;
		case "superfishmenu":
			$menutype2=_SW_SUPERFISH_MENU;
			break;
		default:
			$menutype2=_SW_MYGOSU_MENU;
			break;
   }
   
?>

  <script src="../media/system/js/mootools-core.js" type="text/javascript"></script>
 
<script src="../media/system/js/core.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery-1.6.min.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery.corner.js"></script> 
<script type="text/javascript" src="components/com_swmenupro/js/swmenupro_popout.js"></script>
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/ddaccordion.js"></script> 

<link rel="stylesheet" href="../media/system/css/modal.css" type="text/css" />
  
  <script src="../media/system/js/modal.js" type="text/javascript"></script>
  
  


<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery-ui.min2.js"></script> 

<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/cufon-yui.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery.jec-1.3.4.js"></script> 

<script type="text/javascript" src="components/com_swmenupro/js/jscolor/jscolor.js"></script>



<link rel="stylesheet" href="components/com_swmenupro/css/swmenupro.css" type="text/css" />
<link rel="stylesheet" href="components/com_swmenupro/css/jquery-ui.css" type="text/css" />

<script type="text/javascript" language="javascript" src="components/com_swmenupro/js/dhtml.js"></script>
<script type="text/javascript" language="javascript">
<!--


function submitbutton(pressbutton) {
	doMainBorder();
	doSubBorder();
	document.adminForm.target="_self";
	document.adminForm.action="index.php";
	submitform( pressbutton );
}

function doImagesWindow() {
    if(document.adminForm.menutype.value != document.adminForm.menuname.value){
         document.getElementById('images_window').style.display="none";
         document.getElementById('images_message').innerHTML="<?php echo _SW_MENU_CHANGE_NOTICE; ?>";
    }else{
         document.getElementById('images_window').style.display="block";
         document.getElementById('images_message').innerHTML="";
    }
}


var originalOrder2='<?php echo $rows->parentid;?>';
var originalPos2='<?php echo $rows->menutype;?>';
var orders2=new Array();	// array in the format [key,value,text]
<?php	$i=0;
foreach ($orders3 as $k=>$items) {
	foreach ($items as $v) {
		echo "\n	orders2[".$i++."]=new Array( '$k','$v->value','$v->text' );";
	}
}
?>
//-->
</script> 

 <style type='text/css'>
            <!--

            .top_preview{
                display:block;
                background-color:<?php echo $rows->main_back; ?>;
                padding:<?php echo $rows->main_pad_top."px ".$rows->main_pad_right."px ".$rows->main_pad_bottom."px ".$rows->main_pad_left."px"; ?>;
                margin:<?php echo $rows->top_margin_top."px ".$rows->top_margin_right."px ".$rows->top_margin_bottom."px ".$rows->top_margin_left."px"; ?>;
                color:<?php echo $rows->main_font_color; ?>;
                font-size:<?php echo $rows->main_font_size; ?>px;
                font-family:<?php echo $rows->font_family; ?>;
                font-weight:<?php echo $rows->font_weight; ?>;
                <?php
                if ($rows->main_width != 0) {
                    echo " width:" . $rows->main_width . "px; \n";
                }
               
                if ($rows->main_height != 0) {
                    echo " height:" . $rows->main_height . "px; \n";
                }
                ?>
                text-align:<?php echo $rows->main_align; ?>;
                white-space:<?php echo $rows->top_wrap; ?>;
                border:<?php echo $rows->main_border_over_width."px ".$rows->main_border_over_style." ".$rows->main_border_color_over; ?>;
                <?php
                switch ($rows->top_font_extra) {
                    case "italic":
                    case "oblique":
                        echo " font-style:" . $rows->top_font_extra . ";\n";
                        echo " text-decoration: none ;\n";
                        echo " text-transform: none ;\n";
                        break;
                    case "underline":
                    case "overline":
                    case "line-through":
                        echo " text-decoration:" . $rows->top_font_extra . " ;\n";
                        echo " font-style: none ;\n";
                        echo " text-transform: none ;\n";
                        break;
                    case "uppercase":
                    case "lowercase":
                    case "capitalize":
                        echo " text-transform:" . $rows->top_font_extra . " ;\n";
                        echo " text-decoration: none ;\n";
                        echo " font-style: none ;\n";
                        break;
                    default:
                        echo " font-style: none ;\n";
                        echo " text-decoration: none;\n";
                        echo " text-transform: none ;\n";
                        break;
                }
                
                ?>

            }

            .top_preview.normal{
                background-image:<?php echo "url('../" . $rows->main_back_image . "')"; ?>;
                background-repeat:<?php echo $rows->top_background_repeat; ?>;
                background-position:<?php echo $rows->top_background_position; ?>;
            }


            #top_preview_hover{
                background-image:<?php echo "url('../" . $rows->main_back_image_over . "')"; ?>;
                background-repeat:<?php echo $rows->top_hover_background_repeat; ?>;
                background-position:<?php echo $rows->top_hover_background_position; ?>;
                background-color:<?php echo $rows->main_over; ?>;
                color:<?php echo $rows->main_font_color_over; ?>;

            }

            #top_preview_active{
                background-image:<?php echo "url('../" . $rows->active_background_image . "')"; ?>;
                background-repeat:<?php echo $rows->active_background_repeat; ?>;
                background-position:<?php echo $rows->active_background_position; ?>;
                background-color:<?php echo $rows->active_background; ?>;
                color:<?php echo $rows->active_font; ?>;

            }

            .jquery-corner { position: relative; }
            div.autosize { display: table;width:auto}
            div.autosize > div { display: table-cell; }


            #top_preview_outer{
                position:relative;
                z-index:-1;
                display:block;

                background-image:<?php echo "url('../" . $rows->complete_background_image . "')"; ?>;
                background-repeat:<?php echo $rows->complete_background_repeat; ?>;
                background-position:<?php echo $rows->complete_background_position; ?>;
                background-color:<?php echo $rows->complete_background; ?>;
                padding:<?php echo $rows->complete_margin_top."px ".$rows->complete_margin_right."px ".$rows->complete_margin_bottom."px ".$rows->complete_margin_left."px"; ?>;
                border:<?php echo $rows->main_border_width."px ".$rows->main_border_style." ".$rows->main_border_color; ?>;
               
            }

            #top_preview_parent{
                position:relative;
                z-index:1;
                display:block;
            }

            .top_preview_item{
                position:relative;
                z-index:1;
                display:block;
            }
            .top_preview{
                position:relative;
                z-index:-1;
                display:block;
            }



            .sub_preview.level1{
                display:block;
                 padding:<?php echo $rows->sub_pad_top."px ".$rows->sub_pad_right."px ".$rows->sub_pad_bottom."px ".$rows->sub_pad_left."px"; ?>;
               

                color:<?php echo $rows->sub_font_color; ?>;
                font-size:<?php echo $rows->sub_font_size; ?>px;
                font-family:<?php echo $rows->sub_font_family; ?>;
                font-weight:<?php echo $rows->font_weight_over; ?>;
                <?php
                if ($rows->sub_width != 0) {
                    echo " width:" . $rows->sub_width . "px; \n";
                }
               
                if ($rows->sub_height != 0) {
                    echo " height:" . $rows->sub_height . "px; \n";
                }
                ?>
                text-align:<?php echo $rows->sub_align; ?>;
                white-space:<?php echo $rows->sub_wrap; ?>;
                 border:<?php echo $rows->sub_border_over_width."px ".$rows->sub_border_over_style." ".$rows->sub_border_color_over; ?>;
               
                <?php
                switch ($rows->sub_font_extra) {
                    case "italic":
                    case "oblique":
                        echo " font-style:" . $rows->sub_font_extra . ";\n";
                        echo " text-decoration: none ;\n";
                        echo " text-transform: none ;\n";
                        break;
                    case "underline":
                    case "overline":
                    case "line-through":
                        echo " text-decoration:" . $rows->sub_font_extra . " ;\n";
                        echo " font-style: none ;\n";
                        echo " text-transform: none ;\n";
                        break;
                    case "uppercase":
                    case "lowercase":
                    case "capitalize":
                        echo " text-transform:" . $rows->sub_font_extra . " ;\n";
                        echo " text-decoration: none ;\n";
                        echo " font-style: none ;\n";
                        break;
                    default:
                        echo " font-style: none ;\n";
                        echo " text-decoration: none;\n";
                        echo " text-transform: none ;\n";
                        break;
                }
                ?>

            }

            .sub_preview.level1.normal{
                  background-color:<?php echo $rows->sub_back; ?>;
             
               
                background-image:<?php echo "url('../" . $rows->sub_back_image . "')"; ?>;
                background-repeat:<?php echo $rows->sub_background_repeat; ?>;
                background-position:<?php echo $rows->sub_background_position; ?>;

            }

            .sub_preview.level1.hover{
                background-image:<?php echo "url('../" . $rows->sub_back_image_over . "')"; ?>;
                background-repeat:<?php echo $rows->sub_hover_background_repeat; ?>;
                background-position:<?php echo $rows->sub_hover_background_position; ?>;
                background-color:<?php echo $rows->sub_over; ?>;
                color:<?php echo $rows->sub_font_color_over; ?>;

            }
            /*
             .sub_preview.level1.active{
                background-image:<?php echo "url('../" . $rows->sub_active_background_image . "')"; ?>;
                background-repeat:<?php echo $rows->sub_active_background_repeat; ?>;
                background-position:<?php echo $rows->sub_active_background_position; ?>;
                background-color:<?php echo $rows->sub_active_background; ?>;
                color:<?php echo $rows->sub_font_color_over; ?>;

            }
            */
         
            #sub_preview_outer{
                position:relative;
                z-index:-1;
                display:block;
                   border:<?php echo $rows->sub_border_width."px ".$rows->sub_border_style." ".$rows->sub_border_color; ?>;

              
            }

            #sub_preview_parent{
                position:relative;
                z-index:1;
                display:block;


                background-color:none;
            }



            -->
        </style>
 <div id="swmenu_main_container" class="swmenu_container" align="center">


            <table  class="sw_inner_container_header"  border="0" >
                <tr>
                    <td width="33%" valign="bottom"><img src="components/com_swmenupro/images/swmenupro_logo_small.png" align="left" border="0"/></td>
                    <td width="53%" valign="bottom" align="left"><span class="swmenu_sectionname"><?php echo $menutype2." "._SW_MODULE_EDITOR; ?></span> </td>
                    <td align="left" nowrap>
                       
 <?php if (file_exists($absolute_path . "/modules/mod_swmenupro/styles/menu".$rows->id.".css") && $rows->id) { ?>
                            <a class="sw_manual_button" href="index.php?option=com_swmenupro&task=editCSS&id=<?php echo $rows->id."&limit=".$rows->limit."&limitstart=".$rows->limitstart; ?>" ><img src="components/com_swmenupro/images/paper_content_pencil.png" align="absmiddle" ><?php echo _SW_CSS_LINK; ?></a>
        <?php } else { ?>
                            <a class="sw_manual_button" href="javascript:void(0);" onClick="doSave('export');" ><img src="components/com_swmenupro/images/export_to_file.png" align="absmiddle" ><?php echo _SW_EXPORT_LINK; ?></a>
        <?php } ?>

                    </td>
                </tr>
            </table>

            <form action="index.php" method="POST" name="adminForm" id="sw_admin_form">
                <table class="sw_inner_container" cellpadding="0" cellspacing="0" border="0" >
  <tr><td>
   	<a id="tab6" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_MODULE_SETTINGS_TAB; ?></a></td>
   	<td><a id="tab1" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_SIZE_OFFSETS_TAB; ?></a></td>
    <td><a id="tab2" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_BACKGROUND_INDICATORS_TAB; ?></a></td>
   <td> <a id="tab3" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_FONTS_TEXT_TAB; ?></a></td>
  <td>  <a id="tab5" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_BORDERS_CORNERS_TAB; ?></a></td>
  <td>  <a id="tab7" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);doImagesWindow();"><?php echo _SW_IMAGES_CSS_TAB; ?></a>
      </td> 
  </tr>
</table>

<table class="swmenu_tabheading" style="margin:auto;">
  <tr>
   <td width="80%"> <?php echo _SW_MODULE_NAME.": ". $row2->title; ?>&nbsp;
                        </td><td><a href="javascript:void(0);" class="swmenu_button_save" onClick="doSave('save');" onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_SAVE_TIP; ?>')" ><?php echo _SW_SAVE_BUTTON; ?></a>
   </td><td><a href="javascript:void(0);" class="swmenu_button_apply" onClick="doSave('apply');" onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_APPLY_TIP; ?>')" ><?php echo _SW_APPLY_BUTTON; ?></a>
   </td><td><a href="javascript:void(0);" class="swmenu_button_export" onClick="doSave('export');" onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_EXPORT_TIP; ?>')" ><?php echo _SW_EXPORT_BUTTON; ?></a>
   </td><td><a href="javascript:void(0);" class="swmenu_button_preview" onClick="doPreviewWindow();" onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_PREVIEW_TIP; ?>')" ><?php echo _SW_PREVIEW_BUTTON; ?></a>
   </td><td><a href="index.php?option=com_swmenupro&limit=<?php echo $rows->limit."&limitstart=".$rows->limitstart; ?>" class="swmenu_button_cancel"  onmouseover="this.T_ABOVE=true;return escape('<?php echo _SW_CANCEL_TIP; ?>')"><?php echo _SW_CANCEL_BUTTON; ?></a>
   </td>
 </tr>
</table>

                <div id="page1" class="pagetext" >

                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td width="50%" valign="top" align="center">
                                <table class="sw_table_left"  >
                                   
                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_POSITION_LABEL; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_TOP_MENU . " - " . _SW_ALIGNMENT; ?>:</td>
                                        <td> <div align="right"><?php echo $lists['position']; ?></div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_TOP_MENU . " - " . _SW_ORIENTATION; ?>:</td>
                                        <td> <div align="right"><?php echo $lists['orientation']; ?></div></td>
                                    </tr><tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SIZES_LABEL . " " . _SW_AUTOSIZE; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_TOP_MENU . " " . _SW_ITEM_WIDTH; ?></td>
                                        <td> <div align="right">
                                                <input type="text" size="4" id="main_width" name="main_width" value="<?php echo $rows->main_width; ?>" />px</div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_TOP_MENU . " " . _SW_ITEM_HEIGHT; ?></td>
                                        <td> <div align="right">
                                                <input id="main_height" name="main_height" type="text" value="<?php echo $rows->main_height; ?>" size="4"/>px</div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_SUB_MENU . " " . _SW_ITEM_WIDTH; ?></td>
                                        <td> <div align="right">
                                                <input type="text" size="4" id="sub_width" name="sub_width" value="<?php echo $rows->sub_width; ?>"/>px</div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_SUB_MENU . " " . _SW_ITEM_HEIGHT; ?></td>
                                        <td> <div align="right">
                                                <input id="sub_height" name="sub_height" type="text" value="<?php echo $rows->sub_height; ?>" size="4"/>px</div></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_TOP_OFFSETS_LABEL; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_TOP_OFFSET; ?>:</td>
                                        <td> <div align="right">
                                                <input type="text" size="4" id="main_top" name="main_top" value="<?php echo $rows->main_top; ?>"/>px</div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_LEFT_OFFSET; ?>:</td>
                                        <td> <div align="right">
                                                <input type="text" size="4" id="main_left" name="main_left" value="<?php echo $rows->main_left; ?>"/>px</div></td>
                                    </tr><tr>
                                        <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_SUB_OFFSETS_LABEL; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_LEVEL . " 1 " . _SW_TOP_OFFSET; ?>:</td>
                                        <td> <div align="right">
                                                <input type="text" size="4" id="level1_sub_top" name="level1_sub_top" value="<?php echo $rows->level1_sub_top; ?>"/>px</div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_LEVEL . " 1 " . _SW_LEFT_OFFSET; ?>:</td>
                                        <td> <div align="right">
                                                <input type="text" size="4" id="level1_sub_left" name="level1_sub_left" value="<?php echo $rows->level1_sub_left; ?>"/>px</div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_LEVELX . " " . _SW_TOP_OFFSET; ?>:</td>
                                        <td> <div align="right">
                                                <input type="text" size="4" id="level2_sub_top" name="level2_sub_top" value="<?php echo $rows->level2_sub_top; ?>"/>px</div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_LEVELX . " " . _SW_LEFT_OFFSET; ?>:</td>
                                        <td> <div align="right">
                                                <input type="text" size="4" id="level2_sub_left" name="level2_sub_left" value="<?php echo $rows->level2_sub_left; ?>"/>px</div></td>
                                    </tr>

                                </table>
                            </td>
                            <td width="50%" valign="top" align="center">
                                <table class="sw_table_right"  >


                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_COMPLETE_MENU_PADDING; ?></div></td>
                                    </tr><tr>
                                        <td colspan="2" align="center">
                                            <table>
                                                <tr class="swmenu_menubackgr">
                                                    <td width="90" align="center"><?php echo _SW_TOP; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_RIGHT; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_BOTTOM; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_LEFT; ?></td>
                                                </tr><tr>
                                                    <td width="90" align="center"><input type="text" onchange="doCompletePadding();" size="3" id="complete_margin_top" name="complete_margin_top" value="<?php echo $rows->complete_margin_top; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doCompletePadding();" size="3" id="complete_margin_right" name="complete_margin_right" value="<?php echo $rows->complete_margin_right; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doCompletePadding();" size="3" id="complete_margin_bottom" name="complete_margin_bottom" value="<?php echo $rows->complete_margin_bottom; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doCompletePadding();" size="3" id="complete_margin_left" name="complete_margin_left" value="<?php echo $rows->complete_margin_left; ?>" maxlength="3" />px</td>
                                                </tr><tr>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider18'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider19'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider20'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider21'></div></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_TOP_MENU_MARGINS_LABEL; ?></div></td>
                                    </tr><tr>
                                        <td colspan="2" align="center">
                                            <table>
                                                <tr class="swmenu_menubackgr">
                                                    <td width="90" align="center"><?php echo _SW_TOP; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_RIGHT; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_BOTTOM; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_LEFT; ?></td>
                                                </tr><tr>
                                                    <td width="90" align="center"><input type="text" onchange="doTopMargin();" size="3" id="top_margin_top" name="top_margin_top" value="<?php echo $rows->top_margin_top; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doTopMargin();" size="3" id="top_margin_right" name="top_margin_right" value="<?php echo $rows->top_margin_right; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doTopMargin();" size="3" id="top_margin_bottom" name="top_margin_bottom" value="<?php echo $rows->top_margin_bottom; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doTopMargin();" size="3" id="top_margin_left" name="top_margin_left" value="<?php echo $rows->top_margin_left; ?>" maxlength="3" />px</td>
                                                </tr><tr>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider14'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider15'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider16'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider17'></div></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_TOP_MENU . " " . _SW_PADDING; ?></div></td>
                                    </tr><tr>
                                        <td colspan="2" align="center">
                                            <table>
                                                <tr class="swmenu_menubackgr">
                                                    <td width="90" align="center"><?php echo _SW_TOP; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_RIGHT; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_BOTTOM; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_LEFT; ?></td>
                                                </tr><tr>
                                                    <td width="90" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_top" name="main_pad_top" value="<?php echo $rows->main_pad_top; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_right" name="main_pad_right" value="<?php echo $rows->main_pad_right; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_bottom" name="main_pad_bottom" value="<?php echo $rows->main_pad_bottom; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_left" name="main_pad_left" value="<?php echo $rows->main_pad_left; ?>" maxlength="3" />px</td>
                                                </tr><tr>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider22'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider23'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider24'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider25'></div></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr><tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SUB_MENU . " " . _SW_PADDING; ?></div></td>
                                    </tr><tr>
                                        <td colspan="2" align="center">
                                            <table>
                                                <tr class="swmenu_menubackgr">
                                                    <td width="90" align="center"><?php echo _SW_TOP; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_RIGHT; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_BOTTOM; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_LEFT; ?></td>
                                                </tr><tr>
                                                    <td width="90" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_top" name="sub_pad_top" value="<?php echo $rows->sub_pad_top; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_right" name="sub_pad_right" value="<?php echo $rows->sub_pad_right; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_bottom" name="sub_pad_bottom" value="<?php echo $rows->sub_pad_bottom; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_left" name="sub_pad_left" value="<?php echo $rows->sub_pad_left; ?>" maxlength="3" />px</td>
                                                </tr><tr>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider26'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider27'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider28'></div></td>
                                                    <td width="90" align="center"><div style='width:70px;' id='slider29'></div></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>



                </div>



                <div id="page2" class="pagetext">

                   <table cellpadding="0" cellspacing="0" border="0" >
  <tr>
    <td width="50%" valign="top" align="center"> 
      <table class="sw_table_left" >
        <tr>
          <td colspan="3" class="swmenu_tabheading"> <div align="center"><?php echo _SW_BACKGROUND_IMAGE_LABEL; ?></div></td>
        </tr>
        <tr class="swmenu_menubackgr" >
        <td width="30%"> <?php echo _SW_COMPLETE_MENU; ?>:</td>
        <td align="right"> 
          <table  align="right" id="complete_background_image_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->complete_background_image;?>" align="left"> 
            <tr><td width="100%" height="36">&nbsp;</td></tr>
          </table>
        </td><td width="40%" align="right">
            <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('complete_background_image');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('complete_background_image_box').style.background='none';document.getElementById('complete_background_image').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
         <input type="hidden" id="complete_background_image" name="complete_background_image" value="<?php echo $rows->complete_background_image;?>"/>
       
          </td>
     </tr>
      <tr class="swmenu_menubackgr" >
        <td align="right" colspan="3"> <?php echo _SW_BACKGROUND_REPEAT; ?>:
        <?php echo $lists['complete_background_repeat']; ?>
            <?php echo _SW_BACKGROUND_POSITION; ?>:
          <?php echo $lists['complete_background_position']; ?></td>
      </tr>
      <tr>
          <td><?php echo _SW_ACTIVE_MENU; ?>:</td>
          <td align="right"> 
          <table  align="right" id="active_background_image_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->active_background_image;?>" align="left"> 
            <tr><td width="100%" height="36">&nbsp;</td></tr>
          </table>
        </td><td align="right">
           <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('active_background_image');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('active_background_image_box').style.background='none';document.getElementById('active_background_image').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
       
          <input type="hidden" id="active_background_image" name="active_background_image" value="<?php echo $rows->active_background_image;?>"/>
       
          </td>
      </tr>
     
     <tr>
        <td align="right" colspan="3"> <?php echo _SW_BACKGROUND_REPEAT; ?>:
        <?php echo $lists['active_background_repeat']; ?>
            <?php echo _SW_BACKGROUND_POSITION; ?>:
          <?php echo $lists['active_background_position']; ?></td>
      </tr>
     
   <tr class="swmenu_menubackgr" >
          <td><?php echo _SW_TOP_MENU; ?>:</td>
          <td align="right"> 
          <table  align="right" id="main_back_image_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->main_back_image;?>" align="left"> 
            <tr><td width="100%" height="36">&nbsp;</td></tr>
          </table>
        </td><td align="right">
          <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('main_back_image');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('main_back_image_box').style.background='none';document.getElementById('main_back_image').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
       
          <input type="hidden" id="main_back_image" name="main_back_image" value="<?php echo $rows->main_back_image;?>"/>
       
          </td>
      </tr>
      <tr class="swmenu_menubackgr" >
        <td align="right" colspan="3"> <?php echo _SW_BACKGROUND_REPEAT; ?>:
        <?php echo $lists['top_background_repeat']; ?>
            <?php echo _SW_BACKGROUND_POSITION; ?>:
          <?php echo $lists['top_background_position']; ?></td>
      </tr>
      
      <tr>
        <td><?php echo _SW_TOP_MENU." "._SW_HOVER; ?>:</td>
        <td align="right"> 
          <table  align="right" id="main_back_image_over_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->main_back_image_over;?>" align="left"> 
            <tr><td width="100%" height="36">&nbsp;</td></tr>
          </table>
        </td><td align="right">
           <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('main_back_image_over');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('main_back_image_over_box').style.background='none';document.getElementById('main_back_image_over').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
        
          <input type="hidden" id="main_back_image_over" name="main_back_image_over" value="<?php echo $rows->main_back_image_over;?>"/>
       
          </td>
     </tr>
     <tr>
        <td align="right" colspan="3"> <?php echo _SW_BACKGROUND_REPEAT; ?>:
        <?php echo $lists['top_hover_background_repeat']; ?>
            <?php echo _SW_BACKGROUND_POSITION; ?>:
          <?php echo $lists['top_hover_background_position']; ?></td>
      </tr>
     
     
     
     <tr class="swmenu_menubackgr" >
       <td><?php echo _SW_SUB_MENU; ?>:</td>
      <td align="right"> 
          <table  align="right" id="sub_back_image_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->sub_back_image;?>" align="left"> 
            <tr><td width="100%" height="36">&nbsp;</td></tr>
          </table>
        </td><td align="right">
           <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('sub_back_image');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('sub_back_image_box').style.background='none';document.getElementById('sub_back_image').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
       
          <input type="hidden" id="sub_back_image" name="sub_back_image" value="<?php echo $rows->sub_back_image;?>"/>
       
          </td>
     </tr>
     <tr class="swmenu_menubackgr" >
        <td align="right" colspan="3"> <?php echo _SW_BACKGROUND_REPEAT; ?>:
        <?php echo $lists['sub_background_repeat']; ?>
            <?php echo _SW_BACKGROUND_POSITION; ?>:
          <?php echo $lists['sub_background_position']; ?></td>
      </tr>
     <tr>
       <td><?php echo _SW_SUB_MENU." "._SW_HOVER; ?>:</td>
         <td align="right"> 
          <table  align="right" id="sub_back_image_over_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->sub_back_image_over;?>" align="left"> 
            <tr><td width="100%" height="36">&nbsp;</td></tr>
          </table>
        </td><td align="right">
           <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('sub_back_image_over');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('sub_back_image_over_box').style.background='none';document.getElementById('sub_back_image_over').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
       
          <input type="hidden" id="sub_back_image_over" name="sub_back_image_over" value="<?php echo $rows->sub_back_image_over;?>"/>
       
          </td>
      </tr>
     <tr>
        <td align="right" colspan="3"> <?php echo _SW_BACKGROUND_REPEAT; ?>:
        <?php echo $lists['sub_hover_background_repeat']; ?>
            <?php echo _SW_BACKGROUND_POSITION; ?>:
          <?php echo $lists['sub_hover_background_position']; ?></td>
      </tr>
      
      
     
   </table>
                            </td>
                            <td width="50%" valign="top" align="center">
                                <table class="sw_table_right"  >

                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_BACKGROUND_COLOR_LABEL; ?></div></td>
                                    </tr>

                                    <tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_COMPLETE_MENU ?>:</td>
                                        <td>  <div style="float:right;" >
                                                <div id="complete_background_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor='<?php echo $rows->complete_background; ?>'>
                                                </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'complete_background_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="complete_background" name="complete_background" value="<?php echo $rows->complete_background; ?>"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('complete_background').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('complete_background_box').style.background='none';document.getElementById('complete_background').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo _SW_ACTIVE_MENU ?>:</td>
                                        <td>  <div style="float:right;" >
                                                <div id="active_background_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor='<?php echo $rows->active_background; ?>'>
                                                </div><input type="text" size="8"  onchange="doColorChange(this);" class="color {styleElement:'active_background_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="active_background" name="active_background" value="<?php echo $rows->active_background; ?>"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('active_background').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif" /><?php echo _SW_GET; ?></a>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('active_background_box').style.background='none';document.getElementById('active_background').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
                                    </tr>
                                    <tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td>  <div style="float:right;" >
                                                <div id="main_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor='<?php echo $rows->main_back; ?>'>
                                                </div>
                                                <input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'main_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="main_back" name="main_back" value="<?php echo $rows->main_back; ?>"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_back').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_box').style.background='none';document.getElementById('main_back').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_TOP_MENU . " " . _SW_HOVER; ?>:</td>
                                        <td>  <div style="float:right;" >
                                                <div id="main_over_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor='<?php echo $rows->main_over; ?>'>
                                                </div>
                                                <input type="text" size="8"  onchange="doColorChange(this);" class="color {styleElement:'main_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="main_over" name="main_over" value="<?php echo $rows->main_over; ?>"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_over_box').style.background='none';document.getElementById('main_over').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
                                    </tr>



                                    <tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td> <div style="float:right;" >
                                                <div id="sub_back_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor='<?php echo $rows->sub_back; ?>'>
                                                </div>
                                                <input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'sub_back_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"  id="sub_back" name="sub_back" value="<?php echo $rows->sub_back; ?>"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_back').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_back_box').style.background='none';document.getElementById('sub_back').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_SUB_MENU . " " . _SW_HOVER; ?>:</td>
                                        <td>  <div style="float:right;" >
                                                <div id="sub_over_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor='<?php echo $rows->sub_over; ?>'>
                                                </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'sub_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="sub_over" name="sub_over" value="<?php echo $rows->sub_over; ?>"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_over_box').style.background='none';document.getElementById('sub_over').value='';doCompletePreview();">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
                                    </tr>
                                  

                                    
                                    
                                    
                                     <tr>
                                        <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_SUB_INDICATOR; ?></div></td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><b><?php echo _SW_TOP_MENU; ?>:</b>
   </td>
 <td align="right">
     <table  style="border: 1px solid #000000; width:100px;margin-right:10px;"  align="left"> 
            <tr><td id="top_sub_table" align="center" valign="center" width="100%" height="20"><?php echo $lists['top_sub_indicator']; ?></td></tr>
          </table> 
              <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('top_sub');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('top_sub').src='../modules/mod_swmenupro/images/empty.gif';document.getElementById('top_sub_indicator').value='';">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
             
                                        </td>
                                    <tr class="swmenu_menubackgr">
                                        <td height="20" ><?php echo _SW_ALIGNMENT; ?>:</td>
                                        <td> <div align="right"><?php echo $lists['top_sub_indicator_align']; ?></div></td>
                                    </tr>

                                    <tr>
                                        <td height="20"><?php echo _SW_TOP_OFFSET; ?>:</td>
                                        <td> <div align="right">
        <?php echo $lists['top_sub_indicator_top']; ?>px</div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td height="20"><?php echo _SW_LEFT_OFFSET; ?>:</td>
                                        <td> <div align="right">
        <?php echo $lists['top_sub_indicator_left']; ?>px</div></td>
                                    </tr>
                                    
<tr>
  <td width="33%"><b><?php echo _SW_SUB_MENU; ?>:</b>
   </td>
 <td align="right"><table style="border: 1px solid #000000; width:100px;margin-right:10px;" align="left"> 
            <tr><td id="sub_sub_table" align="center" valign="center" width="100%" height="20"><?php echo $lists['sub_sub_indicator']; ?></td></tr>
          </table>  <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('sub_sub');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('sub_sub').src='../modules/mod_swmenupro/images/empty.gif';document.getElementById('sub_sub_indicator').value='';">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
             
                                        </td>
                                    <tr class="swmenu_menubackgr">
                                        <td height="20" ><?php echo _SW_ALIGNMENT; ?>:</td>
                                        <td> <div align="right"><?php echo $lists['sub_sub_indicator_align']; ?></div></td>
                                    </tr>

                                    <tr>
                                        <td height="20"><?php echo _SW_TOP_OFFSET; ?>:</td>
                                        <td> <div align="right">
        <?php echo $lists['sub_sub_indicator_top']; ?>px</div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td height="20"><?php echo _SW_LEFT_OFFSET; ?>:</td>
                                        <td> <div align="right">
        <?php echo $lists['sub_sub_indicator_left']; ?>px</div></td>
                                    </tr>
                                    
                                    
                                    


                                </table>
                            </td>
                        </tr>
                    </table>


                </div>


                <div id="page3" class="pagetext">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr>
                           <td width="50%" valign="top" align="center">
                                <table class="sw_table_left" >
                                    <tr>
                                        <td colspan="3" class="swmenu_tabheading"><div align="center"><?php echo _SW_FONT_FAMILY_LABEL; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td  colspan="2" ><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td  width="250"><div align="right"><?php echo $lists['font_family']; ?></div></td>
                                    </tr><tr>
                                        <td colspan="2" ><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td  width="250"><div align="right"><?php echo $lists['sub_font_family']; ?></div></td>
                                    </tr>
                                    <tr>
                                       <td colspan="3" class="swmenu_tabheading"><div align="center"><?php echo _SW_TRUE_TYPE_FONTS_LABEL; ?> &nbsp;<a class="sw_cufon_button"  href="javascript:void(0);" onclick='get_cufon();'/><?php echo _SW_UPLOAD_TTF; ?></a></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td  colspan="2" ><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td width="250"><div align="right"><?php echo $lists['topTTF']; ?></div>




                                        </td>
                                    </tr><tr>
                                        <td colspan="2" ><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td width="250"><div align="right"><?php echo $lists['subTTF']; ?></div></td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="swmenu_tabheading"> <div align="center"><?php echo _SW_FONT_COLOR_LABEL; ?></div>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td  colspan="2"><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td>  <div style="float:right;" >
                                                <div id="main_font_color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:32px" bgColor='<?php echo $rows->main_font_color; ?>'>

                                                </div>

                                                <input name="main_font_color" onchange="doFontColor(this);" type="text" id="main_font_color" value="<?php echo $rows->main_font_color; ?>" size="8" class="color {styleElement:'main_font_color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_font_color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
                                    </tr><tr>
                                        <td  colspan="2"><?php echo _SW_TOP_MENU . " " . _SW_HOVER; ?>:</td>
                                        <td> <div style="float:right;" >
                                                <div id="main_font_color_over_box" style="border: 1px solid #000000; width:20px; height:32px;float:left;margin-right:10px;" bgColor='<?php echo $rows->main_font_color_over; ?>'>
                                                </div>
                                                <input name="main_font_color_over" onchange="doFontColor(this);" type="text" id="main_font_color_over" value="<?php echo $rows->main_font_color_over; ?>" size="8" class="color {styleElement:'main_font_color_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_font_color_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td  colspan="2"><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td>
                                            <div style="float:right;" >
                                                <div id="sub_font_color_box" style="border: 1px solid #000000; width:20px; height:32px;float:left;margin-right:10px;" bgColor='<?php echo $rows->sub_font_color; ?>'>
                                                </div>
                                                <input name="sub_font_color" type="text" onchange="doFontColor(this);" id="sub_font_color" value="<?php echo $rows->sub_font_color; ?>" size="8" class="color {styleElement:'sub_font_color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_font_color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
                                    </tr><tr>
                                        <td  colspan="2"><?php echo _SW_SUB_MENU . " " . _SW_HOVER; ?>:</td>
                                        <td>
                                            <div style="float:right;" >
                                                <div id="sub_font_color_over_box" style="border: 1px solid #000000; width:20px; height:32px;float:left;margin-right:10px;" bgColor='<?php echo $rows->sub_font_color_over; ?>'>
                                                </div>
                                                <input name="sub_font_color_over" type="text" onchange="doFontColor(this);" id="sub_font_color_over" value="<?php echo $rows->sub_font_color_over; ?>"  size="8" class="color {styleElement:'sub_font_color_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_font_color_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
                                    </tr>
                                    <tr  class="swmenu_menubackgr">
                                        <td  colspan="2"><?php echo _SW_ACTIVE_MENU ?>:</td>
                                        <td>
                                            <div style="float:right;" >
                                                <div id="active_font_box" style="border: 1px solid #000000; width:20px; height:32px;float:left;margin-right:10px;" bgColor='<?php echo $rows->active_font; ?>'>
                                                </div><input type="text" size="8" onchange="doFontColor(this);" class="color {styleElement:'active_font_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="active_font" name="active_font" value="<?php echo $rows->active_font; ?>"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('active_font').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
                                    </tr>




                                </table>
                            </td>
                           <td width="50%" valign="top" align="center">
                                <table class="sw_table_right" >
                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_FONT_SIZE_LABEL; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td width="100"><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td>
                                            <div align="right">
                                                <input id="main_font_size" onchange="jQuery('.top_preview').css('font-size',this.value+'px');" name="main_font_size" type="text" value="<?php echo $rows->main_font_size; ?>" size="3" /> px
                                            </div>
                                        </td>
                                    </tr><tr>
                                        <td><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td>
                                            <div align="right">
                                                <input id="sub_font_size" onchange="jQuery('.sub_preview').css('font-size',this.value+'px');" name="sub_font_size" type="text" value="<?php echo $rows->sub_font_size; ?>" size="3" /> px
                                            </div>
                                        </td>
                                    </tr><tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_FONT_WEIGHT_LABEL; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td><div align="right"><?php echo $lists['font_weight']; ?></div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td><div align="right"><?php echo $lists['font_weight_over']; ?></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading">
                                            <div align="center"><?php echo _SW_FONT_ALIGNMENT_LABEL; ?></div>
                                        </td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td><div align="right"><?php echo $lists['main_align']; ?></div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td><div align="right"><?php echo $lists['sub_align']; ?></div></td>
                                    </tr><tr>
                                        <td colspan="2" class="swmenu_tabheading">
                                            <div align="center"><?php echo _SW_TEXT_WRAPPING_LABEL ?></div>
                                        </td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td><div align="right"><?php echo $lists['top_wrap']; ?></div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td><div align="right"><?php echo $lists['sub_wrap']; ?></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading">
                                            <div align="center"><?php echo _SW_ADDITIONAL_STYLES_LABEL ?></div>
                                        </td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_TOP_MENU; ?>:</td>
                                        <td><div align="right"><?php echo $lists['top_font_extra']; ?></div></td>
                                    </tr><tr>
                                        <td><?php echo _SW_SUB_MENU; ?>:</td>
                                        <td><div align="right"><?php echo $lists['sub_font_extra']; ?></div></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                </div>


               <div id="page5" class="pagetext">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td width="50%" valign="top" align="center">
                                <table class="sw_table_left" >
                                   <tr>
                                        <td colspan="3" class="swmenu_tabheading"><div align="center"><?php echo _SW_TOP_MENU." "._SW_BORDER; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td width="35%"><b><?php echo _SW_OUTSIDE." "._SW_BORDER_STYLE; ?>:</b></td>
                                        <td align="right"><?php echo $lists['main_border_style']; ?></td>
                                        <td >
                                        <div style="float:right;">
                                                <div id="main_border_color_box" style="float:left;margin-right:3px;margin-left:3px;border: 1px solid #000000; width:20px; height:16px" bgColor='<?php echo $rows->main_border_color; ?>'>

                                                </div>

                                                <input  name="main_border_color" onChange="doMainBorder();" type="text" id="main_border_color" value="<?php echo $rows->main_border_color; ?>" size="7" class="color {styleElement:'main_border_color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_border_color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div>
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_BORDER_WIDTH; ?>:</td>
                                        <td colspan="2" align="right">
                                            <input id="main_border_width" onchange="doMainBorder();" name="main_border_width" type="text" value="<?php echo $rows->main_border_width; ?>" size="3" /> px

                                        </td>
                                    </tr>
                                     <tr class="swmenu_menubackgr">
                                        <td colspan="3" align="center">
                                            <table>
                                                <tr>
                                                    <td width="90" align="center"><?php echo _SW_TOP." ".$lists['tot_border']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_RIGHT." ".$lists['tor_border']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_BOTTOM." ".$lists['tob_border']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_LEFT." ".$lists['tol_border']; ?></td>
                                                </tr> 
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td><b><?php echo _SW_INSIDE." "._SW_BORDER_STYLE; ?>:</b></td>
                                           <td align="right"><?php echo $lists['main_border_over_style']; ?></td>
                                        <td><div style="float:right;">
                                                <div id="main_border_color_over_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:16px" bgColor='<?php echo $rows->main_border_color_over; ?>'>

                                                </div>

                                                <input  name="main_border_color_over" onChange="doMainBorder();" type="text" id="main_border_color_over" value="<?php echo $rows->main_border_color_over; ?>" size="7" class="color {styleElement:'main_border_color_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_border_color_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div>
                                        </td>
                                     
                                    </tr>
                                    
                                    <tr>
                                        <td><?php echo _SW_BORDER_WIDTH; ?>:</td>
                                        <td colspan="2" align="right">
                                            <input id="main_border_over_width" onchange="doMainBorder();" name="main_border_over_width" type="text" value="<?php echo $rows->main_border_over_width; ?>" size="3" /> px

                                        </td>
                                    </tr>
                                     <tr>
                                        <td colspan="3" align="center">
                                           <table>
                                                <tr>
                                                    <td width="70" align="center"><?php echo _SW_TOP." ".$lists['tit_border']; ?></td>
                                                    <td width="70" align="center"><?php echo _SW_RIGHT." ".$lists['tir_border']; ?></td>
                                                    <td width="70" align="center"><?php echo _SW_BOTTOM." ".$lists['tib_border']; ?></td>
                                                    <td width="70" align="center"><?php echo _SW_LEFT." ".$lists['til_border']; ?></td>
                                                     <td width="70" align="center"><?php echo _SW_AUTO." ".$lists['t_auto_border']; ?></td>
                                                </tr> 
                                            </table>
                                        </td>
                                    </tr>
                                   <td colspan="3" class="swmenu_tabheading"><div align="center"><?php echo _SW_SUB_MENU." "._SW_BORDER; ?></div></td>
                                    <tr class="swmenu_menubackgr">
                                        <td><b><?php echo _SW_OUTSIDE." "._SW_BORDER_STYLE; ?>:</b></td>
                                        <td align="right"><?php echo $lists['sub_border_style']; ?></td>
                                        <td><div style="float:right;">
                                                <div id="sub_border_color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:16px" bgColor='<?php echo $rows->sub_border_color; ?>'>
                                                </div>
                                                <input  name="sub_border_color" type="text" onChange="doSubBorder();" id="sub_border_color" value="<?php echo $rows->sub_border_color; ?>" size="7" class="color {styleElement:'sub_border_color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_border_color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div>
                                        </td>
                                    </tr>
                                    
                                    <tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_BORDER_WIDTH; ?>:</td>
                                        <td colspan="2" align="right">
                                            <input id="sub_border_width" onchange="doSubBorder();" name="sub_border_width" type="text" value="<?php echo $rows->sub_border_width; ?>" size="3" /> px

                                        </td>
                                    </tr>
                                     <tr class="swmenu_menubackgr">
                                        <td colspan="3" align="center">
                                            <table>
                                                <tr>
                                                    <td width="90" align="center"><?php echo _SW_TOP." ".$lists['sot_border']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_RIGHT." ".$lists['sor_border']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_BOTTOM." ".$lists['sob_border']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_LEFT." ".$lists['sol_border']; ?></td>
                                                </tr> 
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td ><b><?php echo _SW_INSIDE." "._SW_BORDER_STYLE; ?>:</b></td>
                                        <td align="right"><?php echo $lists['sub_border_over_style']; ?></td>
                                        <td><div style="float:right;">
                                                <div id="sub_border_color_over_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:16px" bgColor='<?php echo $rows->sub_border_color_over; ?>'>
                                                </div>
                                                <input  name="sub_border_color_over" type="text" onChange="doSubBorder();" id="sub_border_color_over" value="<?php echo $rows->sub_border_color_over; ?>" size="7" class="color {styleElement:'sub_border_color_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_border_color_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo _SW_BORDER_WIDTH; ?>:</td>
                                        <td colspan="2" align="right">
                                            <input id="sub_border_over_width" onchange="doSubBorder();" name="sub_border_over_width" type="text" value="<?php echo $rows->sub_border_over_width; ?>" size="3" /> px

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center">
                                            <table>
                                                <tr>
                                                    <td width="70" align="center"><?php echo _SW_TOP." ".$lists['sit_border']; ?></td>
                                                    <td width="70" align="center"><?php echo _SW_RIGHT." ".$lists['sir_border']; ?></td>
                                                    <td width="70" align="center"><?php echo _SW_BOTTOM." ".$lists['sib_border']; ?></td>
                                                    <td width="70" align="center"><?php echo _SW_LEFT." ".$lists['sil_border']; ?></td>
                                                     <td width="70" align="center"><?php echo _SW_AUTO." ".$lists['s_auto_border']; ?></td>
                                                </tr> 
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    
                                    
                                                                     
                                    
                                </table>
                            </td>
                           <td width="50%" valign="top" align="center">
                                <table class="sw_table_right" >
                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_TOP_MENU." "._SW_CORNER; ?></div></td>
                                    </tr>
                                    <tr class="swmenu_menubackgr">
                                        <td width="35%"><b><?php echo _SW_OUTSIDE." "._SW_CORNER_STYLE; ?>:</b></td>
                                        <td align="right">
        <?php echo $lists['c_corner_style']; ?>

                                        </td>
                                    </tr>
                                    <tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_CORNER_SIZE; ?>:</td>
                                        <td align="right">
        <?php echo $lists['c_corner_size']; ?> px

                                        </td>
                                    </tr>
                                    <tr class="swmenu_menubackgr">
                                        <td colspan="2" align="center">
                                            <table>
                                                <tr>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_TOP_LEFT. " ".$lists['ctl_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_TOP_RIGHT. " ".$lists['ctr_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_BOTTOM_LEFT. " ".$lists['cbl_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_BOTTOM_RIGHT. " ".$lists['cbr_corner']; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b><?php echo _SW_INSIDE." "._SW_CORNER_STYLE; ?>:</b></td>
                                        <td align="right">
        <?php echo $lists['t_corner_style']; ?>

                                        </td>
                                    </tr>
                                     <tr>
                                        <td><?php echo _SW_CORNER_SIZE; ?>:</td>
                                        <td align="right">
        <?php echo $lists['t_corner_size']; ?> px

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                           <table>
                                                <tr>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_TOP_LEFT. " ".$lists['ttl_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_TOP_RIGHT. " ".$lists['ttr_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_BOTTOM_LEFT. " ".$lists['tbl_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_BOTTOM_RIGHT. " ".$lists['tbr_corner']; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SUB_MENU." "._SW_CORNER; ?></div></td>
                                    </tr>
                                    <tr class="swmenu_menubackgr">
                                        <td><b><?php echo _SW_OUTSIDE." "._SW_CORNER_STYLE; ?>:</b></td>
                                        <td align="right">
        <?php echo $lists['s_corner_style']; ?>

                                        </td>
                                    </tr>
                                     <tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_CORNER_SIZE; ?>:</td>
                                        <td align="right">
        <?php echo $lists['s_corner_size']; ?> px

                                        </td>
                                    </tr>
                                   <tr class="swmenu_menubackgr">
                                        <td colspan="2" align="center">
                                            <table>
                                                <tr>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_TOP_LEFT. " ".$lists['stl_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_TOP_RIGHT. " ".$lists['str_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_BOTTOM_LEFT. " ".$lists['sbl_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_BOTTOM_RIGHT. " ".$lists['sbr_corner']; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                   
                                    <tr>
                                        <td><b><?php echo _SW_INSIDE." "._SW_CORNER_STYLE; ?>:</b></td>
                                        <td align="right">
        <?php echo $lists['si_corner_style']; ?>

                                        </td>
                                    </tr>
                                     <tr>
                                        <td><?php echo _SW_CORNER_SIZE; ?>:</td>
                                        <td align="right">
        <?php echo $lists['si_corner_size']; ?> px

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                           <table>
                                                <tr>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_TOP_LEFT. " ".$lists['sitl_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_TOP_RIGHT. " ".$lists['sitr_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_BOTTOM_LEFT. " ".$lists['sibl_corner']; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_CORNER_BOTTOM_RIGHT. " ".$lists['sibr_corner']; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    
                                   
                                    
                                  
                                     
                                </table>
                            </td>
                        </tr>
                    </table>


                </div>



                <div id="page6" class="pagetext">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr>
                           <td width="50%" valign="top" align="center">
                                <table class="sw_table_left" >
                                     <tr>
                                        <td colspan="2" > <div align="center"><a class="sw_joomla_button"  href="javascript:void(0);" onclick='get_module();'/> <?php echo _SW_EDIT_JOOMLA_PROPERTIES; ?></a></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_MENU_SOURCE_LABEL; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td align="left"><?php echo _SW_MENU_SOURCE; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MENU_SOURCE_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['menutype']; ?> </td>
                                    </tr><tr>
                                        <td  align="left" ><?php echo _SW_PARENT; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_PARENT_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
                                            <script language="javascript" type="text/javascript">
                                                <!--
                                                writeDynaList( 'class="inputbox" name="parentid" size="1" style="width:220px"', orders2, originalPos2, originalPos2, originalOrder2 );
                                                //-->
                                            </script> </td>
                                    </tr>
                                      <tr class="swmenu_menubackgr">
                                        <td valign="top"><?php echo _SW_ACTIVE_MENU; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_ACTIVE_MENU_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['active_menu']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo _SW_MAX_LEVELS; ?>:</td><td>
                                            <a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MAX_LEVELS_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
                                            <?php echo $lists['levels']; ?> </td>
                                    </tr>
                                    <tr class="swmenu_menubackgr">
          <td><?php echo _SW_PARENT_LEVEL; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_PARENT_LEVEL_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['parent_level']; ?> </td>
        </tr>
                                      
                                   <tr>
                                        <td valign="top"><?php echo _SW_STYLE_SHEET; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_STYLE_SHEET_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['cssload']; ?> </td>
                                    </tr><tr>
                                        <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_AUTO_ITEM_LABEL; ?></div></td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td valign="top"><?php echo _SW_HYBRID_MENU; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_HYBRID_MENU_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['hybrid']; ?> </td>
                                    </tr><tr>
                                        <td valign="top"><?php echo _SW_TABLES_BLOGS; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_TABLES_BLOGS_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['tables']; ?> </td>
                                    </tr>
                                </table>


                            </td>
                           <td width="50%" valign="top" align="center">
                                <table class="sw_table_right" >
                                  

                                    <tr>
                                        <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_MENU_HACKS; ?></div></td>
                                    </tr>
                                     
                                    
                                    
                                    
                              <?php 
                              
                              if ($rows->menustyle=="accordian"){
                                  
                              ?>
                                    
                                <tr  class="swmenu_menubackgr">
          <td valign="top"><?php echo _SW_EXPAND_ALL; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_EXPAND_ALL_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['expand_all']; ?> </td>
        </tr>
        <tr>
          <td valign="top"><?php echo _SW_AUTO_CLOSE_LABEL; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_AUTO_CLOSE_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
	      <?php echo $lists['autoclose']; ?> </td>
        </tr><tr class="swmenu_menubackgr">
          <td valign="top"><?php echo _SW_SUB_ACTIVATE_LABEL; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_SUB_ACTIVATE_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
	      <?php echo $lists['revealtype']; ?> </td>
        </tr>
        
        <tr>
          <td valign="top"><?php echo _SW_DISABLE_PARENT_LINKS; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_DISABLE_PARENT_LINKS_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['disable_parent']; ?> </td>
        </tr>     
                                    
                                    
                                    
                                    
                                    
                              <?php
                              }else{
                                  
                              ?>
                                    
                                    
                                    
                                    <tr  class="swmenu_menubackgr">
                                        <td width="40%" valign="top"><?php echo _SW_OVERLAY_HACK; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_OVERLAY_HACK_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle"  border="0" /></a>
        <?php echo $lists['overlay_hack']; ?> </td>
                                    </tr>
                                   
                                    <tr>
                                        <td valign="top"><?php echo _SW_PADDING_HACK; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_PADDING_HACK_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['padding_hack']; ?> </td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td valign="top"><?php echo _SW_AUTO_POSITION; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_AUTO_POSITION_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['auto_position']; ?> </td>
                                    </tr>

                                    <tr>
                                        <td valign="top"><?php echo _SW_FLASH_HACK; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_FLASH_HACK_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['flash_hack']; ?> </td>
                                    </tr>
                                    
                                    
                                    
                                    <?php
                              }
                              ?>
                                    
                                    
                                    
                                    <tr class="swmenu_menubackgr">
                                        <td valign="top"><?php echo _SW_DISABLE_JQUERY; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_DISABLE_JQUERY_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['disable_jquery']; ?> </td>
                                    </tr>
                                    
                                     <tr>
                                        <td valign="top"><?php echo _SW_TABLET_HACK; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_TABLET_HACK_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['tablet_hack']; ?> </td>
                                    </tr>

  <tr>
                                        <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SPECIAL_EFFECTS_LABEL; ?></div></td>
                                    </tr><tr>
                                        <td valign="top"><?php echo _SW_SPECIAL_EFFECTS_LABEL; ?>:</td>
                                        <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_SPECIAL_EFFECTS_TIP; ?>')" >
                                                <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
        <?php echo $lists['extra']; ?> </td>
                                    </tr><tr class="swmenu_menubackgr">
                                        <td ><?php echo  _SW_DELAY; ?>:</td>
                                        <td><div align="right">
                                                <input id="specialB" name="specialB" type="text" value="<?php echo $rows->specialB; ?>" size="4" /> ms
                                            </div>
                                        </td>
                                    </tr><tr>
                                        <td ><?php echo _SW_SUB_MENU . " " . _SW_OPACITY; ?>:</td>
                                        <td><div align="right">
                                                <input id="specialA" name="specialA" type="text" value="<?php echo $rows->specialA; ?>" size="4" /> %&nbsp;
                                            </div>
                                        </td></tr>

                                   

                                </table></td>
                        </tr>
                    </table>
                </div>
                
                <div id="page7" class="pagetext">
<div id="images_message"></div>
<div id="images_window">
<?php
HTML_swmenupro::imageConfig3( $ordered,$row2,$lists,$rows);
?>
</div>
</div>

   <input type="hidden" name="title" id="title" value="<?php echo $row2->title; ?>" />
                <input type="hidden" id="border_hack" name="border_hack" value="0" />
                <input type="hidden" name="option" value="com_swmenupro" />
                <input type="hidden" name="tmpl" id="tmpl" value="index" />
                 <input type="hidden" name="no_html" id="no_html" value="0" />
                 <input type="hidden" name="menustyle" id="menustyle" value="<?php echo $rows->menustyle; ?>" />
                <input type="hidden" name="task" value="editdhtmlMenu" />     
                <input type="hidden" name="id" id="id" value="<?php echo $row2->id; ?>">
                <input type="hidden" name="top_font_face" id="top_font_face" value="<?php echo @$rows->top_font_face; ?>">
                <input type="hidden" name="sub_font_face" id="sub_font_face" value="<?php echo @$rows->sub_font_face; ?>">
                 <input type="hidden" name="limit" id="limit" value="<?php echo @$rows->limit; ?>">
                <input type="hidden" name="limitstart" id="limitstart" value="<?php echo @$rows->limitstart; ?>">
                <input type="hidden" name="preview" value="1" />
                <input type="hidden" name="returntask" value="save" />
               
                <input type="hidden" id="defaultfolder" name="defaultfolder" value="<?php echo @$rows->defaultfolder?$rows->defaultfolder:"swmenupro"; ?>" />
            </form>


                    </div>
                

                <div id="preview_pane" >


                    <table class="sw_inner_container" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="40%" class="swmenu_tabheading"> <div align="left">
                                    <a href="javascript:void(0)" onclick="doCompletePreview();"><img src="components/com_swmenupro/images/gtk_refresh.png" ><?php echo _SW_PREVIEW_REFRESH; ?></a></div></td>

                            <td width="20%" class="swmenu_tabheading"> <div align="center" style="font-size:14px;" ><?php echo _SW_LIVE_PREVIEW; ?></div></td>


                            <td class="swmenu_tabheading"> <div align="right"><?php echo _SW_PREVIEW_BACKGROUND; ?>

                                    <input  name="preview_background" onChange="jQuery('#preview_div').css('background-color',this.value);" type="text" id="preview_background" value="#FFFFFF" size="8" class="color {hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                    <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('preview_background').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div>


                            </td>
                        </tr>
                    </table>

        <?php
        
        if ($rows->menustyle=="accordian"){
            
            ?>
                    <div id="preview_div"> 
<table align="center" width="100%" border="0" cellpadding="10" cellspacing="0"><tr><td align="center">
<table border="0" cellpadding="0" cellspacing="0"><tr><td >
<div id="top_preview_parent" ><div  id="top_preview_outer">
<div  class="top_preview_item"><a class="top_preview normal" id="top_preview_normal"><?php echo _SW_TOP_MENU_ITEM; ?></a></div>
<div  class="top_preview_item"><a class="top_preview" id="top_preview_hover"><?php echo _SW_TOP_MENU_ITEM." "._SW_HOVER; ?></a></div>

<div id="sub_preview_parent" ><div  id="sub_preview_outer">
<a class="sub_preview level1 first normal" id="sub_preview_normal"  ><?php echo _SW_SUB_MENU_ITEM; ?></a>
<a class="sub_preview level1 hover" id="sub_preview_hover"><?php echo _SW_SUB_MENU_ITEM." "._SW_HOVER; ?></a>
<a class="sub_preview level1 normal" id="sub_preview_normal2"><?php echo _SW_SUB_MENU_ITEM; ?></a>
<a class="sub_preview level1 last normal" id="sub_preview_normal3"><?php echo _SW_SUB_MENU_ITEM; ?></a>
</div></div>

<div  class="top_preview_item"><a class="top_preview" id="top_preview_active"><?php echo _SW_TOP_MENU_ITEM." "._SW_ACTIVE; ?></a></div>
<div  class="top_preview_item"><a class="top_preview last normal" id="top_preview_normal2"><?php echo _SW_TOP_MENU_ITEM; ?></a></div>
</div></div></td></tr></table>
</td></tr></table>

</div>
                    <?php
            
            
            
            
            
        }else if (substr($rows->orientation, 0, 10) == "horizontal") {
            ?>
                        <div id="preview_div">

                            <table align="center"  border="0" cellpadding="10" cellspacing="0"><tr><td>
                                        <div id="top_preview_parent" ><div  id="top_preview_outer">

                                                <table border="0" cellpadding="0" cellspacing="0"><tr><td>
                                                            <div  class="top_preview_item"><a class="top_preview normal" id="top_preview_normal"><?php echo _SW_TOP_MENU_ITEM; ?></a></div></td><td>
                                                            <div  class="top_preview_item"><a class="top_preview" id="top_preview_hover"><?php echo _SW_TOP_MENU_ITEM . " " . _SW_HOVER; ?></a></div></td><td>
                                                            <div  class="top_preview_item"><a class="top_preview" id="top_preview_active"><?php echo _SW_TOP_MENU_ITEM . " " . _SW_ACTIVE; ?></a></div></td><td>
                                                            <div  class="top_preview_item"><a class="top_preview last normal" id="top_preview_normal2"><?php echo _SW_TOP_MENU_ITEM; ?></a></div></td></tr></table>

                                            </div></div></td></tr></table><br /><br />

                            <table align="center" border="0" cellpadding="0" cellspacing="0"><tr><td>
                                        <div  id="sub_preview_parent"><div  id="sub_preview_outer">
                                                <a class="sub_preview level1 first normal" id="sub_preview_normal"><?php echo _SW_SUB_MENU_ITEM; ?></a>
                                                <a class="sub_preview level1 hover" id="sub_preview_hover"><?php echo _SW_SUB_MENU_ITEM . " " . _SW_HOVER; ?></a>
                                                <a class="sub_preview level1 normal" id="sub_preview_normal2"><?php echo _SW_SUB_MENU_ITEM; ?></a>
                                                <a class="sub_preview level1 last normal" id="sub_preview_normal3"><?php echo _SW_SUB_MENU_ITEM; ?></a>
                                            </div>
                                    </td></tr></table>
                        </div>

            <?php
        } else {
            ?>

                        <div id="preview_div">
                            <table align="center" width="100%" border="0" cellpadding="10" cellspacing="0"><tr><td align="center">
                                        <table border="0" cellpadding="0" cellspacing="0"><tr><td >
                                                    <div id="top_preview_parent" ><div  id="top_preview_outer">
                                                            <div  class="top_preview_item"><a class="top_preview normal" id="top_preview_normal"><?php echo _SW_TOP_MENU_ITEM; ?></a></div>
                                                            <div  class="top_preview_item"><a class="top_preview" id="top_preview_hover"><?php echo _SW_TOP_MENU_ITEM . " " . _SW_HOVER; ?></a></div>
                                                            <div  class="top_preview_item"><a class="top_preview" id="top_preview_active"><?php echo _SW_TOP_MENU_ITEM . " " . _SW_ACTIVE; ?></a></div>
                                                            <div  class="top_preview_item"><a class="top_preview last normal" id="top_preview_normal2"><?php echo _SW_TOP_MENU_ITEM; ?></a></div>
                                                        </div></div></td></tr></table>
                                    </td><td width="50%" align="center">
                                        <table border="0" cellpadding="0" cellspacing="0"><tr><td>
                                                    <div id="sub_preview_parent" ><div  id="sub_preview_outer">
                                                            <a class="sub_preview level1 first normal" id="sub_preview_normal"  ><?php echo _SW_SUB_MENU_ITEM; ?></a>
                                                            <a class="sub_preview level1 hover" id="sub_preview_hover"><?php echo _SW_SUB_MENU_ITEM . " " . _SW_HOVER; ?></a>
                                                            <a class="sub_preview level1 normal" id="sub_preview_normal2"><?php echo _SW_SUB_MENU_ITEM; ?></a>
                                                            <a class="sub_preview level1 last normal" id="sub_preview_normal3"><?php echo _SW_SUB_MENU_ITEM; ?></a>
                                                        </div></div>
                                                </td></tr></table></td></tr>



                        </table>
                                        </div>


        <?php } ?>



                                        </div>

                                



             
             
        

        <script language="JavaScript" type="text/javascript" src="components/com_swmenupro/js/wz_tooltip.js"></script>
        <script language="javascript" type="text/javascript">
            <!--
            dhtml.onTabStyle='swmenu_ontab';
            dhtml.offTabStyle='swmenu_offtab';
            dhtml.cycleTab('tab6');
            -->
        </script>


        <script type="text/javascript">
            <!--


            function change_orientation(){
                var str = document.getElementById('orientation').value;
                var orientation = str.substring(0,10);
                //alert(orientation);

                if(orientation=="horizontal"){
                    jQuery('#preview_div').html('<table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td>'
                        +'<div id="top_preview_parent" ><div  id="top_preview_outer"><table border="0" cellpadding="0" cellspacing="0" ><tr><td>'
                        +'<div  class="top_preview_item"><a class="top_preview first normal" id="top_preview_normal"><?php echo _SW_TOP_MENU_ITEM; ?></a></div></td><td>'
                        +'<div  class="top_preview_item"><a class="top_preview" id="top_preview_hover"><?php echo _SW_TOP_MENU_ITEM . " " . _SW_HOVER; ?></a></div></td><td>'
                        +'<div  class="top_preview_item"><a class="top_preview" id="top_preview_active"><?php echo _SW_TOP_MENU_ITEM . " " . _SW_ACTIVE; ?></a></div></td><td>'
                        +'<div  class="top_preview_item"><a class="top_preview last normal" id="top_preview_normal2"><?php echo _SW_TOP_MENU_ITEM; ?></a></div></td></tr></table>'
                        +'</div></div></td></tr></table><br /><br /><table align="center" border="0" cellpadding="0" cellspacing="0"><tr><td>'
                        +'<div id="sub_preview_parent" ><div  id="sub_preview_outer">'
                        +'<a class="sub_preview level1 first normal" id="sub_preview_normal"><?php echo _SW_SUB_MENU_ITEM; ?></a>'
                        +'<a class="sub_preview level1 hover" id="sub_preview_hover"><?php echo _SW_SUB_MENU_ITEM . " " . _SW_HOVER; ?></a>'
                        +'<a class="sub_preview level1 normal" id="sub_preview_normal2"><?php echo _SW_SUB_MENU_ITEM; ?></a>'
                        +'<a class="sub_preview level1 last normal" id="sub_preview_normal3"><?php echo _SW_SUB_MENU_ITEM; ?></a>'
                        +'</div></div></td></tr></table>'
                );
                }else{
                    jQuery('#preview_div').html('<table border="0" width="100%" cellpadding="10" cellspacing="0" align="center" ><tr><td align="center">'
                        +'<table border="0" cellpadding="0" cellspacing="0"><tr><td>'
                        +'<div id="top_preview_parent" ><div  id="top_preview_outer">'
                        +'<div  class="top_preview_item"><a class="top_preview first normal" id="top_preview_normal"><?php echo _SW_TOP_MENU_ITEM; ?></a></div>'
                        +'<div  class="top_preview_item"><a class="top_preview" id="top_preview_hover"><?php echo _SW_TOP_MENU_ITEM . " " . _SW_HOVER; ?></a></div>'
                        +'<div  class="top_preview_item"><a class="top_preview" id="top_preview_active"><?php echo _SW_TOP_MENU_ITEM . " " . _SW_ACTIVE; ?></a></div>'
                        +'<div  class="top_preview_item"><a class="top_preview last normal" id="top_preview_normal2"><?php echo _SW_TOP_MENU_ITEM; ?></a></div>'
                        +'</div></div></td></tr></table></td><td align="center" width="50%">'
                        +'<table border="0" cellpadding="0" cellspacing="0" align="center"><tr><td>'
                        +'<div id="sub_preview_parent" ><div  id="sub_preview_outer">'
                        +'<a class="sub_preview level1 first normal" id="sub_preview_normal"><?php echo _SW_SUB_MENU_ITEM; ?></a>'
                        +'<a class="sub_preview level1 hover" id="sub_preview_hover"><?php echo _SW_SUB_MENU_ITEM . " " . _SW_HOVER; ?></a>'
                        +'<a class="sub_preview level1 normal" id="sub_preview_normal2"><?php echo _SW_SUB_MENU_ITEM; ?></a>'
                        +'<a class="sub_preview level1 last normal" id="sub_preview_normal3"><?php echo _SW_SUB_MENU_ITEM; ?></a>'
                        +'</div></div></td></tr></table>'
                );



                }
                //doTopMargin;

                doCompletePreview();

            }



  jQuery("div#successful").corner();
setTimeout(function(){
  
jQuery("div#successful").fadeOut("slow", function () {
jQuery("div#successful").remove();
});

}, 3000);


            //setTimeout('doShadow()',2000);
            //if(document.getElementById('top_ttf').value!=""){do_top_ttf();}
            //if(document.getElementById('sub_ttf').value!=""){do_sub_ttf();}
            //if(document.getElementById('c_corner_style').value!=""){do_complete_corner();}
            //if(document.getElementById('t_corner_style').value!=""){do_top_corner();}
            //if(document.getElementById('s_corner_style').value!=""){do_sub_corner();}
            //do_top_corner();

          //  jQuery('#toolbar-box').remove();
            jQuery('#font_family').jec();
             jQuery('#sub_font_family').jec();
              jQuery('#preview_pane').draggable({
  stop: function( event, ui ) {
        x=jQuery('#preview_pane').offset();
      jQuery('#preview_pane').css('position','absolute');
  
     jQuery('#preview_pane').css('top',x.top+'px');
      jQuery('#preview_pane').css('left',x.left+'px');
     // alert(x.top);
      
  }
 // stack:'#swmenu_main_container';
});
   jQuery('#preview_pane').draggable("option",{stack:"#swmenu_main_container"});
             jQuery('#swmenu_main_container').draggable({stack:"#preview_pane"});
              jQuery('.sw_joomla_button').corner();
            // jQuery('.sw_upgrade_button').corner();
            jQuery('.sw_inner_container_header').corner('tl tr');
             jQuery('.swmenu_offtab').corner();
              jQuery('.swmenu_ontab').corner();
            //doShadow();
            doSliders();
            doCompletePreview();
            //setTimeout('doShadow();',2000);
            //jQuery.noConflict();
            -->
        </script>

        <?php
    }
?>
