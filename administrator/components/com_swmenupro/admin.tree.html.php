<?PHP
/**
* swmenupro v4.5
* http://swonline.biz
* Copyright 2004 Sean White
**/

function treeMenuConfig( $rows,$row2, $ordered, $lists,$orders3)
{
	
  $absolute_path=JPATH_ROOT;
  
   $live_site = JURI::root();
   
	include_once($absolute_path.'/modules/mod_swmenupro/styles.php');
        include($absolute_path.'/modules/mod_swmenupro/functions.php');
        
       
        
        
?>
<script src="../media/system/js/mootools-core.js" type="text/javascript"></script>
<script src="../media/system/js/core.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery-1.6.min.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery.corner.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery-ui.min2.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery.treeview.js"></script> 
<script type="text/javascript" src="components/com_swmenupro/js/swmenupro_tree.js"></script>
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/ddaccordion.js"></script> 

<link rel="stylesheet" href="../media/system/css/modal.css" type="text/css" />
  
  <script src="../media/system/js/modal.js" type="text/javascript"></script>
  
 
  




<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/cufon-yui.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery.jec-1.3.4.js"></script> 

<script type="text/javascript" src="components/com_swmenupro/js/jscolor/jscolor.js"></script>

 <?php

if(@$rows->top_ttf){
	echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/fonts/".$rows->top_ttf."\"></script>\n";
	}
	
	if(@$rows->sub_ttf){
		
	echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/fonts/".$rows->sub_ttf."\"></script>\n";
	}
        
 ?>

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



<?php

$swmenupro=array();
while (list ($key, $val) = each ($rows))
{
    $swmenupro[$key]=$val;
}
$swmenupro['id']="0";
 $swmenupro['active_menu']=$ordered[0]['ID'];
$str=mygosuTreeMenuStyle($swmenupro, $ordered);

echo "\n<style type='text/css' >\n";
echo $str;
echo "\n</style>\n";




?>









<div id="swmenu_main_container" class="swmenu_container" align="center">

  
    <table  class="sw_inner_container_header"  border="0" >
                <tr>
                    <td width="33%" valign="bottom"><img src="components/com_swmenupro/images/swmenupro_logo_small.png" align="left" border="0"/></td>
                    <td width="53%" valign="bottom" align="left"><span class="swmenu_sectionname"><?php echo _SW_TREE_MENU." "._SW_MODULE_EDITOR; ?></span> </td>
                    <td align="left" nowrap>
                       
 <?php if (file_exists($absolute_path . "/modules/mod_swmenupro/styles/menu".$rows->id.".css") && $rows->id) { ?>
                            <a class="sw_manual_button" href="index.php?option=com_swmenupro&task=editCSS&id=<?php echo $rows->id."&limit=".$rows->limit."&limitstart=".$rows->limitstart; ?>" ><img src="components/com_swmenupro/images/paper_content_pencil.png" align="absmiddle" ><?php echo _SW_CSS_LINK; ?></a>
        <?php } else { ?>
                            <a class="sw_manual_button" href="javascript:void(0);" onClick="doSave('export');" ><img src="components/com_swmenupro/images/export_to_file.png" align="absmiddle" ><?php echo _SW_EXPORT_LINK; ?></a>
        <?php } ?>

                    </td>
                </tr>
            </table>

<form action="index.php" method="POST" name="adminForm">
<table  class="sw_inner_container" cellpadding="0" cellspacing="0" border="0" >
  <tr>
   	<td><a id="tab6" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_MODULE_SETTINGS_TAB; ?></a></td>
   	<td><a id="tab1" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_TREE_SIZE_TAB; ?></a></td>
    <td><a id="tab2" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_COLOR_BACKGROUNDS_TAB; ?></a></td>
    <td><a id="tab3" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);"><?php echo _SW_FONTS_PADDING_TAB; ?></a></td>  
    <td><a id="tab7" class="swmenu_offtab" onclick="dhtml.cycleTab(this.id);doImagesWindow();"><?php echo _SW_IMAGES_CSS_TAB; ?></a></td>
    <td><a style="display:block;width:120px;" width="120">&nbsp;</a></td>
  </tr>
</table>

<table class="swmenu_tabheading" style="margin:auto;" >
  <tr>
   <td width="80%"> <?php echo _SW_MODULE_NAME.": ". $row2->title; ?>
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
      <table class="sw_table_left" >
              
          <tr> 
                    <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_TREE_WIDTH_ALIGN_LABEL; ?></div></td> 
                  </tr><tr class="swmenu_menubackgr"> 
                    <td ><?php echo _SW_WIDTH; ?>:<br /><i><?php echo _SW_AUTOSIZE; ?></i></td>
                    <td  align="right"> <div align="right"> 
                    <input type="text" size="8" id="main_width" name="main_width" value="<?php echo $rows->main_width;?>" />px</div></td> 
                  </tr>
                  <tr>
          <td><?php echo _SW_ALIGNMENT; ?>:</td>
          <td> <div align="right"><?php echo $lists['tree_align']; ?></div></td>
        </tr><tr> 
                    <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_TREE_ICONS_LINES_LABEL; ?></div></td> 
                  </tr><tr  class="swmenu_menubackgr"> 
                    <td><?php echo _SW_USE_LINES; ?></td> 
                    <td > <div align="right">
                    <select name="tree_lines" id="tree_lines" onchange="doTreeLines(this)">
                    <option <?php if (@$rows->tree_lines == 'none') {echo 'selected';} ?> value="none">None</option>
                    <option <?php if (@$rows->tree_lines == 'default') {echo 'selected';} ?> value="default">Default</option>
                    <option <?php if (@$rows->tree_lines == 'simple') {echo 'selected';} ?> value="simple">Simple</option>
                    <option <?php if (@$rows->tree_lines == 'black') {echo 'selected';} ?> value="black">Black</option>
                    <option <?php if (@$rows->tree_lines == 'gray') {echo 'selected';} ?> value="gray">Gray</option>
                    <option <?php if (@$rows->tree_lines == 'blue') {echo 'selected';} ?> value="blue">Blue</option>
                    <option <?php if (@$rows->tree_lines == 'purple') {echo 'selected';} ?> value="purple">Purple</option>
                    <option <?php if (@$rows->tree_lines == 'yellow') {echo 'selected';} ?> value="yellow">Yellow</option>
                    <option <?php if (@$rows->tree_lines == 'orange') {echo 'selected';} ?> value="orange">Orange</option>
                    <option <?php if (@$rows->tree_lines == 'red') {echo 'selected';} ?> value="red">Red</option>
                    <option <?php if (@$rows->tree_lines == 'green') {echo 'selected';} ?> value="green">Green</option>
                    <option <?php if (@$rows->tree_lines == 'famfamfam') {echo 'selected';} ?> value="famfamfam">FamFam</option>
                    </select></div></td>
                  </tr>
                  
                  
                 
                <tr> 
                  <td><?php echo _SW_ICON_TOP; ?>:</td> 
                  <td align="right"><img id="tree_top_icon_image" src="<?php echo ($rows->tree_top_icon?"../".$rows->tree_top_icon:"");?>" align="left"/>
                   <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('tree_top_icon');"/>
                   <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('tree_top_icon_image').src='../modules/mod_swmenupro/images/empty.gif';document.getElementById('tree_top_icon').value='';jQuery('.tree-menu0.treeview li.tree-top0').css('background-image','none');" />
                   <input type="hidden" id="tree_top_icon" name="tree_top_icon" value="<?php echo $rows->tree_top_icon;?>"/> </td>
                </tr> 
                <tr class="swmenu_menubackgr" >
                     <td><?php echo _SW_ICON_FOLDER; ?>:</td> 
                  <td align="right"><img id="tree_folder_icon_image" src="<?php echo ($rows->tree_folder_icon?"../".$rows->tree_folder_icon:"");?>" align="left"/>
                   <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('tree_folder_icon');"/>
                   <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('tree_folder_icon_image').src='../modules/mod_swmenupro/images/empty.gif';document.getElementById('tree_folder_icon').value='';jQuery('.tree-menu0.treeview li.expandable span.folder').css('background-image','none');" />
                   <input type="hidden" id="tree_folder_icon" name="tree_folder_icon" value="<?php echo $rows->tree_folder_icon;?>"/> </td>
                </tr> 
                <tr> 
                     <td><?php echo _SW_ICON_FOLDER_OPEN; ?>:</td> 
                  <td align="right"><img id="tree_folder_open_icon_image" src="<?php echo ($rows->tree_folder_open_icon?"../".$rows->tree_folder_open_icon:"");?>" align="left"/>
                   <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('tree_folder_open_icon');"/>
                   <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('tree_folder_open_icon_image').src='../modules/mod_swmenupro/images/empty.gif';document.getElementById('tree_folder_open_icon').value='';jQuery('.tree-menu0.treeview li.collapsable span.folder').css('background-image','none');" />
                   <input type="hidden" id="tree_folder_open_icon" name="tree_folder_open_icon" value="<?php echo $rows->tree_folder_open_icon;?>"/> </td>
                </tr> <tr class="swmenu_menubackgr" > 
                  <td ><?php echo _SW_ICON_DOCUMENT; ?>:</td> 
                <td align="right"><img id="tree_file_icon_image" src="<?php echo ($rows->tree_file_icon?"../".$rows->tree_file_icon:"");?>" align="left"/>
                   <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('tree_file_icon');"/>
                   <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('tree_file_icon_image').src='../modules/mod_swmenupro/images/empty.gif';document.getElementById('tree_file_icon').value='';jQuery('.tree-menu0.treeview span.file').css('background-image','none');" />
                   <input type="hidden" id="tree_file_icon" name="tree_file_icon" value="<?php echo $rows->tree_file_icon;?>"/> </td>
                </tr> 
                
                
                 <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_COMPLETE_MENU." "._SW_CORNER_STYLES_LABEL; ?></div></td>
            </tr>
            <tr class="swmenu_menubackgr">
              <td><?php echo _SW_CORNER_STYLE; ?>:</td>
              <td align="right">
                  <?php echo $lists['c_corner_style']; ?>
                
              </td>
            </tr>
            <tr>
              <td><?php echo _SW_CORNER_SIZE; ?>:</td>
              <td align="right">
                  <?php echo $lists['c_corner_size']; ?> px
               
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <table>
                  <tr class="swmenu_menubackgr">
                    <td width="75" align="center"><?php echo _SW_CORNER_TOP_LEFT; ?></td>
                    <td width="75" align="center"><?php echo _SW_CORNER_TOP_RIGHT; ?></td>
                    <td width="75" align="center"><?php echo _SW_CORNER_BOTTOM_LEFT; ?></td>
                    <td width="75" align="center"><?php echo _SW_CORNER_BOTTOM_RIGHT; ?></td>
                  </tr><tr>
                    <td width="75" align="center"><?php echo $lists['ctl_corner']; ?></td>
                    <td width="75" align="center"><?php echo $lists['ctr_corner']; ?></td>
                    <td width="75" align="center"><?php echo $lists['cbl_corner']; ?></td>
                    <td width="75" align="center"><?php echo $lists['cbr_corner']; ?></td>
                  </tr>
                 
                </table>
              </td>
            </tr>
            
            
           
                
        
      </table>
    </td>
    <td width="50%" valign="top" align="center"> 
      <table class="sw_table_right" >
       
         <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_TREE_INDENT_LABEL; ?></div></td>
            </tr><tr>
              <td colspan="2" align="center">
                <table>
                  <tr class="swmenu_menubackgr">
                    <td width="88" align="center"><?php echo _SW_TOP; ?></td>
                    <td width="88" align="center"><?php echo _SW_RIGHT; ?></td>
                    <td width="88" align="center"><?php echo _SW_BOTTOM; ?></td>
                    <td width="88" align="center"><?php echo _SW_LEFT; ?></td>
                 </tr><tr>
                                                    <td width="90" align="center"><input type="text" onchange="doTopMargin();" size="3" id="top_margin_top" name="top_margin_top" value="<?php echo @$rows->top_margin_top; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doTopMargin();" size="3" id="top_margin_right" name="top_margin_right" value="<?php echo @$rows->top_margin_right; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doTopMargin();" size="3" id="top_margin_bottom" name="top_margin_bottom" value="<?php echo @$rows->top_margin_bottom; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doTopMargin();" size="3" id="top_margin_left" name="top_margin_left" value="<?php echo @$rows->top_margin_left; ?>" maxlength="3" />px</td>
                                                </tr><tr>
                                                  <td width="88" align="center"><div style='width:70px;' id='slider14'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider15'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider16'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider17'></div></td>
                  </tr>
                </table>
              </td>
            </tr>
          
            <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_COMPLETE_MENU_PADDING; ?></div></td>
            </tr><tr>
              <td colspan="2" align="center">
                <table>
                  <tr class="swmenu_menubackgr">
                    <td width="88" align="center"><?php echo _SW_TOP; ?></td>
                    <td width="88" align="center"><?php echo _SW_RIGHT; ?></td>
                    <td width="88" align="center"><?php echo _SW_BOTTOM; ?></td>
                    <td width="88" align="center"><?php echo _SW_LEFT; ?></td>
                  </tr><tr>
                      <td width="90" align="center"><input type="text" onchange="doCompletePadding();" size="3" id="complete_margin_top" name="complete_margin_top" value="<?php echo $rows->complete_margin_top; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doCompletePadding();" size="3" id="complete_margin_right" name="complete_margin_right" value="<?php echo $rows->complete_margin_right; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doCompletePadding();" size="3" id="complete_margin_bottom" name="complete_margin_bottom" value="<?php echo $rows->complete_margin_bottom; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doCompletePadding();" size="3" id="complete_margin_left" name="complete_margin_left" value="<?php echo $rows->complete_margin_left; ?>" maxlength="3" />px</td>
                                                 </tr><tr>
                    <td width="88" align="center"><div style='width:70px;' id='slider18'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider19'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider20'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider21'></div></td>
                  </tr>
                </table>
              </td>
            </tr>
           
            
            
            
         <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_FOLDER_MENU_ITEM." "._SW_PADDING; ?></div></td>
            </tr><tr>
              <td colspan="2" align="center">
                <table>
                  <tr class="swmenu_menubackgr">
                    <td width="88" align="center"><?php echo _SW_TOP; ?></td>
                    <td width="88" align="center"><?php echo _SW_RIGHT; ?></td>
                    <td width="88" align="center"><?php echo _SW_BOTTOM; ?></td>
                    <td width="88" align="center"><?php echo _SW_LEFT; ?></td>
                  </tr><tr>
                    <td width="90" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_top" name="main_pad_top" value="<?php echo $rows->main_pad_top; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_right" name="main_pad_right" value="<?php echo $rows->main_pad_right; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_bottom" name="main_pad_bottom" value="<?php echo $rows->main_pad_bottom; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doMainPadding();" size="3" id="main_pad_left" name="main_pad_left" value="<?php echo $rows->main_pad_left; ?>" maxlength="3" />px</td>
                                               </tr><tr>
                    <td width="88" align="center"><div style='width:70px;' id='slider22'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider23'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider24'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider25'></div></td>
                  </tr>
                </table>
              </td>
            </tr><tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_DOCUMENT_MENU_ITEM." "._SW_PADDING; ?></div></td>
            </tr><tr>
              <td colspan="2" align="center">
                <table>
                  <tr class="swmenu_menubackgr">
                    <td width="88" align="center"><?php echo _SW_TOP; ?></td>
                    <td width="88" align="center"><?php echo _SW_RIGHT; ?></td>
                    <td width="88" align="center"><?php echo _SW_BOTTOM; ?></td>
                    <td width="88" align="center"><?php echo _SW_LEFT; ?></td>
                  </tr><tr>
                      <td width="90" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_top" name="sub_pad_top" value="<?php echo $rows->sub_pad_top; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_right" name="sub_pad_right" value="<?php echo $rows->sub_pad_right; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_bottom" name="sub_pad_bottom" value="<?php echo $rows->sub_pad_bottom; ?>" maxlength="3" />px</td>
                                                    <td width="90" align="center"><input type="text" onchange="doSubPadding();" size="3" id="sub_pad_left" name="sub_pad_left" value="<?php echo $rows->sub_pad_left; ?>" maxlength="3" />px</td>
                                                 </tr><tr>
                    <td width="88" align="center"><div style='width:70px;' id='slider26'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider27'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider28'></div></td>
                    <td width="88" align="center"><div style='width:70px;' id='slider29'></div></td>
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

<table cellpadding="0" cellspacing="0" border="0">
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
            <tr><td width="100%" height="28">&nbsp;</td></tr>
          </table>
        </td><td width="40%" align="right">
            <a onMouseOver="this.style.cursor='pointer'" onclick="get_background_image('complete_background_image');"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET_IMAGE_BUTTON; ?></a>
            <a onMouseOver="this.style.cursor='pointer'" onclick="document.getElementById('complete_background_image_box').style.background='none';document.getElementById('complete_background_image').value='';jQuery('#menu0').css('background-image','none');">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a>
         <input type="hidden" id="complete_background_image" name="complete_background_image" value="<?php echo $rows->complete_background_image;?>"/>
       
          </td>
     </tr>
      <tr class="swmenu_menubackgr" >
        <td align="right" colspan="3"> <?php echo _SW_BACKGROUND_REPEAT; ?>:
        <?php echo $lists['complete_background_repeat']; ?>
            <?php echo _SW_BACKGROUND_POSITION; ?>:
          <?php echo $lists['complete_background_position']; ?></td>
      </tr>
      <!--
      <tr>
          <td><?php echo _SW_ACTIVE_MENU; ?>:</td>
          <td align="right"> 
          <table  align="right" id="active_background_image_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->active_background_image;?>" align="left"> 
            <tr><td width="100%" height="28">&nbsp;</td></tr>
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
      -->
      
       <tr>
        <td colspan="3" class="swmenu_tabheading"> <div align="center"><?php echo _SW_COMPLETE_MENU_BORDER; ?></div></td>
      </tr>
    
    <tr class="swmenu_menubackgr">
                                        <td width="35%"><?php echo _SW_BORDER_STYLE; ?>:</td>
                                        <td colspan="2" align="right"><?php echo $lists['main_border_style']; ?></td>
    </tr>
    <tr><td><?php echo _SW_BORDER_COLOR; ?>:</td><td colspan="2">
                                       
                                        <div style="float:right;">
                                                <div id="main_border_color_box" style="float:left;margin-right:3px;margin-left:3px;border: 1px solid #000000; width:20px; height:27px" bgColor='<?php echo $rows->main_border_color; ?>'>

                                                </div>

                                                <input  name="main_border_color" onChange="doMainBorder();" type="text" id="main_border_color" value="<?php echo $rows->main_border_color; ?>" size="7" class="color {styleElement:'main_border_color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
                                                <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_border_color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div>
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr class="swmenu_menubackgr">
                                        <td><?php echo _SW_BORDER_WIDTH; ?>:</td>
                                        <td  colspan="2" align="right">
                                            <input id="main_border_width" onchange="doMainBorder();" name="main_border_width" type="text" value="<?php echo $rows->main_border_width; ?>" size="3" /> px

                                        </td>
                                    </tr>
                                     <tr class="swmenu_menubackgr">
                                        <td colspan="3" align="center">
                                            <table>
                                                <tr>
                                                    <td width="90" align="center"><?php echo _SW_TOP; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_RIGHT; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_BOTTOM; ?></td>
                                                    <td width="90" align="center"><?php echo _SW_LEFT; ?></td>
                                                </tr> <tr>
                                                    <td width="90" align="center"><?php echo $lists['tot_border']; ?></td>
                                                    <td width="90" align="center"><?php echo $lists['tor_border']; ?></td>
                                                    <td width="90" align="center"><?php echo $lists['tob_border']; ?></td>
                                                    <td width="90" align="center"><?php echo $lists['tol_border']; ?></td>
                                                </tr> 
                                            </table>
                                        </td>
                                    </tr>
   
    <!-- 
   <tr class="swmenu_menubackgr" >
          <td><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
          <td align="right"> 
          <table  align="right" id="main_back_image_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->main_back_image;?>" align="left"> 
            <tr><td width="100%" height="28">&nbsp;</td></tr>
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
        <td><?php echo _SW_FOLDER_MENU_ITEM." "._SW_HOVER; ?>:</td>
        <td align="right"> 
          <table  align="right" id="main_back_image_over_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->main_back_image_over;?>" align="left"> 
            <tr><td width="100%" height="28">&nbsp;</td></tr>
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
       <td><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
      <td align="right"> 
          <table  align="right" id="sub_back_image_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->sub_back_image;?>" align="left"> 
            <tr><td width="100%" height="28">&nbsp;</td></tr>
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
       <td><?php echo _SW_DOCUMENT_MENU_ITEM." "._SW_HOVER; ?>:</td>
         <td align="right"> 
          <table  align="right" id="sub_back_image_over_box" style="border: 1px solid #000000; width:120px;margin-right:10px;" background="../<?php echo $rows->sub_back_image_over;?>" align="left"> 
            <tr><td width="100%" height="28">&nbsp;</td></tr>
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
      -->
     
   </table>
  </td>
  <td width="50%" valign="top" align="center"> 
      <table class="sw_table_right" >
       
      <tr>
        <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_BACKGROUND_COLOR_LABEL; ?></div></td>
      </tr>
      
      <tr class="swmenu_menubackgr">
      <td><?php echo _SW_COMPLETE_MENU ?>:</td>
      <td>  <div style="float:right;" >
        <div id="complete_background_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:28px" bgColor='<?php echo $rows->complete_background;?>'>
          </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'complete_background_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="complete_background" name="complete_background" value="<?php echo $rows->complete_background;?>"/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('complete_background').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
          <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('complete_background_box').style.background='none';document.getElementById('complete_background').value='';jQuery('#menu0').css('background-color','transparent');">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
    </tr>
      <tr>
      <td><?php echo _SW_ACTIVE_MENU ?>:</td>
      <td>  <div style="float:right;" >
        <div id="active_background_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:28px" bgColor='<?php echo $rows->active_background;?>'>
         </div><input type="text" size="8"  onchange="doColorChange(this);" class="color {styleElement:'active_background_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="active_background" name="active_background" value="<?php echo $rows->active_background;?>"/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('active_background').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif" /><?php echo _SW_GET; ?></a>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('active_background_box').style.background='none';document.getElementById('active_background').value='';jQuery('#menu0 li.selected').css('background-color','transparent');">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
    </tr>
      <tr class="swmenu_menubackgr">
         <td><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
         <td>  <div style="float:right;" >
           <div id="main_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:28px" bgColor='<?php echo $rows->main_back;?>'>
            </div>
          <input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'main_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="main_back" name="main_back" value="<?php echo $rows->main_back;?>"/>
           <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_back').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a> 
             <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_box').style.background='none';document.getElementById('main_back').value='';doColorChange(document.getElementById('main_back'));">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
      </tr><tr>
        <td><?php echo _SW_FOLDER_MENU_ITEM." "._SW_HOVER; ?>:</td>
        <td>  <div style="float:right;" >
           <div id="main_over_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:28px" bgColor='<?php echo $rows->main_over;?>'>
           </div>
        <input type="text" size="8"  onchange="doColorChange(this);" class="color {styleElement:'main_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="main_over" name="main_over" value="<?php echo $rows->main_over;?>"/>
        <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a> 
            <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_over_box').style.background='none';document.getElementById('main_over').value='';doColorChange(document.getElementById('main_over'));">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
     </tr>
     
     
     
     <tr class="swmenu_menubackgr">
       <td><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
       <td> <div style="float:right;" >
         <div id="sub_back_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:28px" bgColor='<?php echo $rows->sub_back;?>'>
           </div>
     <input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'sub_back_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"  id="sub_back" name="sub_back" value="<?php echo $rows->sub_back;?>"/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_back').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
           <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_back_box').style.background='none';document.getElementById('sub_back').value='';doColorChange(document.getElementById('sub_back'));">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
    </tr><tr>
      <td><?php echo _SW_DOCUMENT_MENU_ITEM." "._SW_HOVER; ?>:</td>
      <td>  <div style="float:right;" >
        <div id="sub_over_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:28px" bgColor='<?php echo $rows->sub_over;?>'>
          </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'sub_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="sub_over" name="sub_over" value="<?php echo $rows->sub_over;?>"/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
          <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_over_box').style.background='none';document.getElementById('sub_over').value='';doColorChange(document.getElementById('sub_over'));">&nbsp;<img src="components/com_swmenupro/images/clear.png" hspace="4" align="top" /><?php echo _SW_CLEAR; ?></a></div></td>
    </tr>
     
   
        
        <!--
    
    <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_SHOW_SHADOW; ?></div></td>
            </tr><tr>
          <td valign="top"><?php echo _SW_COMPLETE_MENU; ?>:</td>
          <td align="right">
          <?php echo $lists['complete_shadow']; ?> </td>
        </tr><tr class="swmenu_menubackgr">
              <td ><?php echo _SW_TOP_MENU; ?></td>
            <td align="right"><?php echo $lists['top_shadow']; ?> </td>
            </tr><tr>
              <td ><?php echo _SW_SUB_MENU; ?></td>
               <td align="right"><?php echo $lists['sub_shadow']; ?> </td>
               </tr>
    
         //-->
      
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
              <td  colspan="2" ><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
              <td  width="250"><div align="right"><?php echo $lists['tree_font_family']; ?></div></td>
            </tr><tr>
              <td colspan="2" ><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
              <td  width="250"><div align="right"><?php echo $lists['tree_sub_font_family']; ?></div></td>
            </tr>
             <tr>
              <td colspan="3" class="swmenu_tabheading"><div align="center"><?php echo _SW_TRUE_TYPE_FONTS_LABEL; ?> &nbsp;<input class="sw_get" type='button' name='getimage' value='<?php echo "Upload File"; ?>' onclick='get_cufon();'/></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td  colspan="2" ><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
              <td width="250"><div align="right"><?php echo $lists['topTTF']; ?></div></td>
            </tr><tr>
              <td colspan="2" ><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
              <td width="250"><div align="right"><?php echo $lists['subTTF']; ?></div></td>
            </tr>
            
             <tr>
         <td colspan="3" class="swmenu_tabheading"> <div align="center"><?php echo _SW_FONT_COLOR_LABEL; ?></div>
       </tr><tr class="swmenu_menubackgr">
         <td  colspan="2"><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
         <td>  <div style="float:right;" >
           <div id="main_font_color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:28px" bgColor='<?php echo $rows->main_font_color;?>'>
             
           </div>
        
         <input name="main_font_color" onchange="doFontColor(this);" type="text" id="main_font_color" value="<?php echo $rows->main_font_color;?>" size="8" class="color {styleElement:'main_font_color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
         <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_font_color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
       </tr><tr>
         <td  colspan="2"><?php echo _SW_FOLDER_MENU_ITEM." "._SW_HOVER; ?>:</td>
         <td> <div style="float:right;" >
           <div id="main_font_color_over_box" style="border: 1px solid #000000; width:20px; height:28px;float:left;margin-right:10px;" bgColor='<?php echo $rows->main_font_color_over;?>'>
             </div>
          <input name="main_font_color_over" onchange="doFontColor(this);" type="text" id="main_font_color_over" value="<?php echo $rows->main_font_color_over;?>" size="8" class="color {styleElement:'main_font_color_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
          <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('main_font_color_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
       </tr><tr class="swmenu_menubackgr">
         <td  colspan="2"><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
         <td> 
          <div style="float:right;" >
           <div id="sub_font_color_box" style="border: 1px solid #000000; width:20px; height:28px;float:left;margin-right:10px;" bgColor='<?php echo $rows->sub_font_color;?>'>
             </div>
           <input name="sub_font_color" type="text" onchange="doFontColor(this);" id="sub_font_color" value="<?php echo $rows->sub_font_color;?>" size="8" class="color {styleElement:'sub_font_color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
           <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_font_color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
        </tr><tr>
           <td  colspan="2"><?php echo _SW_DOCUMENT_MENU_ITEM." "._SW_HOVER; ?>:</td>
           <td>
            <div style="float:right;" >
           <div id="sub_font_color_over_box" style="border: 1px solid #000000; width:20px; height:28px;float:left;margin-right:10px;" bgColor='<?php echo $rows->sub_font_color_over;?>'>
               </div>
            <input name="sub_font_color_over" type="text" onchange="doFontColor(this);" id="sub_font_color_over" value="<?php echo $rows->sub_font_color_over;?>"  size="8" class="color {styleElement:'sub_font_color_over_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
            <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('sub_font_color_over').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
         </tr>
         <tr  class="swmenu_menubackgr">
      <td  colspan="2"><?php echo _SW_ACTIVE_MENU ?>:</td>
      <td> 
      <div style="float:right;" >
           <div id="active_font_box" style="border: 1px solid #000000; width:20px; height:28px;float:left;margin-right:10px;" bgColor='<?php echo $rows->active_font;?>'>
         </div><input type="text" size="8" onchange="doFontColor(this);" class="color {styleElement:'active_font_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="active_font" name="active_font" value="<?php echo $rows->active_font;?>"/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('active_font').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div></td>
    </tr>
         
         
            
            
          </table>
        </td>
        <td width="50%" valign="top" align="center"> 
      <table class="sw_table_right" >
            <tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_FONT_SIZE_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td width="100"><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
              <td>
                <div align="right">
                  <input id="main_font_size" onchange="jQuery('.treeview .folder a').css('font-size',this.value+'px');" name="main_font_size" type="text" value="<?php echo $rows->main_font_size;?>" size="3" /> px
                </div>
              </td>
            </tr><tr>
              <td><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
              <td>
                <div align="right">
                  <input id="sub_font_size" onchange="jQuery('.treeview .file a').css('font-size',this.value+'px');" name="sub_font_size" type="text" value="<?php echo $rows->sub_font_size;?>" size="3" /> px
                </div>
              </td>
            </tr><tr>
              <td colspan="2" class="swmenu_tabheading"><div align="center"><?php echo _SW_FONT_WEIGHT_LABEL; ?></div></td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
              <td><div align="right"><?php echo $lists['tree_font_weight']; ?></div></td>
            </tr><tr>
              <td><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
              <td><div align="right"><?php echo $lists['tree_font_weight_over']; ?></div></td>
            </tr>
            <tr>
              <td colspan="2" class="swmenu_tabheading">
                <div align="center"><?php echo _SW_FONT_ALIGNMENT_LABEL; ?></div>
              </td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
              <td><div align="right"><?php echo $lists['tree_main_align']; ?></div></td>
            </tr><tr>
              <td><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
              <td><div align="right"><?php echo $lists['tree_sub_align']; ?></div></td>
            </tr><tr>
              <td colspan="2" class="swmenu_tabheading">
                <div align="center"><?php echo _SW_TEXT_WRAPPING_LABEL ?></div>
              </td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
              <td><div align="right"><?php echo $lists['tree_top_wrap']; ?></div></td>
            </tr><tr>
              <td><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
              <td><div align="right"><?php echo $lists['tree_sub_wrap']; ?></div></td>
            </tr>
            <tr>
              <td colspan="2" class="swmenu_tabheading">
                <div align="center"><?php echo _SW_ADDITIONAL_STYLES_LABEL ?></div>
              </td>
            </tr><tr class="swmenu_menubackgr">
              <td><?php echo _SW_FOLDER_MENU_ITEM; ?>:</td>
              <td><div align="right"><?php echo $lists['top_font_extra']; ?></div></td>
            </tr><tr>
              <td><?php echo _SW_DOCUMENT_MENU_ITEM; ?>:</td>
              <td><div align="right"><?php echo $lists['sub_font_extra']; ?></div></td>
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
          <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_MENU_SOURCE_LABEL; ?></div></td>
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
            	writeDynaList( 'class="inputbox" name="parentid" size="1" style="width:200px"', orders2, originalPos2, originalPos2, originalOrder2 );
			//-->
			</script> </td>
        </tr>
        <tr class="swmenu_menubackgr">
          <td><?php echo _SW_MAX_LEVELS; ?>:</td><td>
          <a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MAX_LEVELS_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['levels']; ?> </td>
        </tr><tr>
          <td><?php echo _SW_PARENT_LEVEL; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_PARENT_LEVEL_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['parent_level']; ?> </td>
        </tr><tr class="swmenu_menubackgr">
          <td valign="top"><?php echo _SW_STYLE_SHEET; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_STYLE_SHEET_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['cssload']; ?> </td>
        </tr>
      </table></td>
     <td width="50%" valign="top" align="center"> 
      <table class="sw_table_right" >
          <tr>
         <td colspan="2" class="swmenu_tabheading"> <div align="center"><?php echo _SW_GENERAL_LABEL; ?></div></td>
       </tr>
       <tr class="swmenu_menubackgr">
          <td><?php echo _SW_ACTIVE_MENU; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_ACTIVE_MENU_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['active_menu']; ?> </td>
        </tr>
        <tr>
          <td><?php echo _SW_TREE_COOKIE; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_TREE_COOKIE_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['use_cookie']; ?> </td>
        </tr>
        <tr  class="swmenu_menubackgr">
          <td><?php echo _SW_DISABLE_PARENT_LINKS; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_DISABLE_PARENT_LINKS_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a>
          <?php echo $lists['disable_parent']; ?> </td>
        </tr> <tr>
          <td><?php echo _SW_EXPAND_ALL; ?>:</td>
          <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_EXPAND_ALL_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle"  border="0" /></a>
          <?php echo $lists['expand_all']; ?> </td>
        </tr>
        <tr>
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
               </table></td></tr>
        
        
      
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

</div>
  <input type="hidden" name="title" id="title" value="<?php echo $row2->title; ?>" />
                <input type="hidden" id="border_hack" name="border_hack" value="0" />
                <input type="hidden" name="option" value="com_swmenupro" />
                <input type="hidden" name="tmpl" id="tmpl" value="index" />
                 <input type="hidden" name="menustyle" id="menustyle" value="<?php echo $rows->menustyle; ?>" />
                <input type="hidden" name="task" value="editdhtmlMenu" />     
                <input type="hidden" name="id" id="id" value="<?php echo $row2->id; ?>">
                <input type="hidden" name="top_font_face" id="top_font_face" value="<?php echo @$rows->top_font_face; ?>">
                <input type="hidden" name="sub_font_face" id="sub_font_face" value="<?php echo @$rows->sub_font_face; ?>">
                 <input type="hidden" name="limit" id="limit" value="<?php echo @$rows->limit; ?>">
                <input type="hidden" name="limitstart" id="limitstart" value="<?php echo @$rows->limitstart; ?>">
                <input type="hidden" name="preview" value="dynamic" />
                <input type="hidden" name="returntask" value="save" />
               
                <input type="hidden" id="defaultfolder" name="defaultfolder" value="<?php echo @$rows->defaultfolder?$rows->defaultfolder:"swmenupro"; ?>" />
 
</form>


<div id="preview_pane">


<table class="sw_inner_container" cellspacing="0" cellpadding="0">
  <tr>
   <td width="40%" class="swmenu_tabheading"> <div align="left">
   <a href="javascript:void(0)" onclick="doPreviewRefresh();"><img src="components/com_swmenupro/images/gtk_refresh.png" ><?php echo _SW_PREVIEW_REFRESH; ?></a></div></td> 
   
   <td width="20%" class="swmenu_tabheading"> <div align="center" style="font-size:14px;" ><?php echo _SW_LIVE_PREVIEW; ?></div></td>
   
   
   <td class="swmenu_tabheading"> <div align="right"><?php echo _SW_PREVIEW_BACKGROUND; ?>
   
          <input  name="preview_background" onChange="jQuery('#preview_div').css('background-color',this.value);" type="text" id="preview_background" value="#FFFFFF" size="8" class="color {hash:true,required:false,pickerOnfocus:false,pickerClosable:true}"/>
          <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('preview_background').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a></div>
       
   
   </td>
  </tr>
  
  <tr><td colspan="3"> 
    <?php    
    
    for($i=0;$i<count($ordered);$i++){
        $ordered[$i]['URL']="javascript:void:(0);";
    }
    echo mygosuTreeMenu($ordered, $swmenupro);  
    
    
    ?> 
         
    </td></tr>
  
  
  
</table>

    
   
    
    
    
</div>





<script language="JavaScript" type="text/javascript" src="components/com_swmenupro/js/wz_tooltip.js"></script>       
<script language="javascript" type="text/javascript">
<!--
dhtml.onTabStyle='swmenu_ontab';
dhtml.offTabStyle='swmenu_offtab';
dhtml.cycleTab('tab6');
 jQuery('#font_family').jec();
 //jQuery('#font_family').jec({useExistingOptions: true});
 //jQuery('#font_family').jec({position: 0});
  
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
                jQuery('.swmenu_offtab').corner();
              jQuery('.swmenu_ontab').corner();
//jQuery('#toolbar-box').remove();
//jQuery('.sw_inner_container').dropShadow();
//jQuery('.sw_inner_container_header').dropShadow();
//jQuery('.pagetext').dropShadow();
//jQuery('.swmenu_container').corner();
//jQuery('.sw_manual_button').corner();
jQuery('.sw_inner_container_header').corner('tl tr');
do_sliders();
do_complete_corner();
doTopMargin();
jQuery("div#successful").corner();
setTimeout(function(){
  
jQuery("div#successful").fadeOut("slow", function () {
jQuery("div#successful").remove();
});

}, 3000);
-->
</script> 
<?php
}
?>
