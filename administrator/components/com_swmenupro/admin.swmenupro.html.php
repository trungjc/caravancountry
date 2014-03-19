<?php
/**
* swmenupro v5.0
* http://swonline.biz
* Copyright 2006 Sean White
**/

// ensure this file is being included by a parent file
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Make sure the user is authorized to view this page


jimport( 'joomla.application.component.controller' );


class HTML_swmenupro
{
	function editCSS($id,  &$content,$limit, $limitstart,$menu ) {
		
	$absolute_path=JPATH_ROOT;
	 $live_site = JURI::root();
		$css_path =	$absolute_path . '/modules/mod_swmenupro/styles/menu'.$id.'.css';
	?>
	<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery-1.6.min.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery.corner.js"></script> 
	<script type="text/javascript" >
	<!--
	function doApply() {
		document.adminForm.returntask.value="editCSS";
		document.adminForm.action="index.php";
		setTimeout('document.adminForm.submit()',200) ;
	}

	function doPreviewWindow(id) {
	document.adminForm.target="win1";
document.adminForm.tmpl.value='component'
document.adminForm.action="index.php";
document.adminForm.task.value="preview";

 window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=800,height=800,directories=no,location=no');
 setTimeout('document.adminForm.submit()',200) ;
 setTimeout('document.adminForm.target="_self"',300);
setTimeout('document.adminForm.action="index.php"',300);
 setTimeout('document.adminForm.tmpl.value="index"',300);
 setTimeout('document.adminForm.task.value="manualsave"',300);
	
}
//jQuery('#toolbar-box').remove();
//jQuery('.swmenu_container').corner('15px');
//jQuery('.sw_manual_button').corner();
	-->
    </script>		
	<link rel="stylesheet" type="text/css" href="components/com_swmenupro/css/swmenupro.css" />
	<div class="swmenu_container" >
	<form action="index.php" method="post" name="adminForm">
	<table  class="sw_inner_container_header"  border="0" >
      <tr>
        <td ><img src="components/com_swmenupro/images/swmenupro_logo_small.png" align="left" border="0"/></td>
        <td align="left" valign="bottom"><span class="swmenu_sectionname"><?php echo _SW_MANUAL_CSS_EDITOR; ?></span> </td>
        <td valign="top" align="center"><a class="sw_manual_button" href="index.php?option=com_swmenupro&task=editDhtmlMenu&id=<?php echo $id."&limit=".$limit."&limitstart=".$limitstart; ?>" ><img src="components/com_swmenupro/images/export_to_file.png" align="absmiddle" ><?php echo _SW_MANAGER_LINK; ?></a></td>
     </tr>
    </table>
	<table class="sw_inner_container" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td colspan="3" align="left"><?php echo "<b>".$css_path." :</b>"; ?><b><?php echo is_writable($css_path) ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></b></td>
	  </tr>
    </table>
    <table  style="width:790px;margin:auto;" class="swmenu_tabheading" >
      <tr>
        <td align="left" width="80%"><?php echo _SW_MODULE_NAME; ?>: &nbsp; <?php echo $menu['title']; ?> </td>
        <td align="right"><a href="javascript:void(0);" class="swmenu_button_save"  onClick="document.adminForm.submit();" onmouseover="return escape('<?php echo _SW_SAVE_TIP; ?>')" ><?php echo _SW_SAVE_BUTTON; ?></a></td>
        <td><a href="javascript:void(0);" class="swmenu_button_apply"  onClick="doApply();" onmouseover="return escape('<?php echo _SW_APPLY_TIP; ?>')" ><?php echo _SW_APPLY_BUTTON; ?></a></td>
        <td><a href="javascript:void(0);" class="swmenu_button_preview"  onClick="doPreviewWindow();" onmouseover="return escape('<?php echo _SW_PREVIEW_TIP; ?>')" ><?php echo _SW_PREVIEW_BUTTON; ?></a></td>
        <td><a href="index.php?option=com_swmenupro&limit=<?php echo $limit."&limitstart=".$limitstart; ?>"  class="swmenu_button_cancel" onmouseover="return escape('<?php echo _SW_CANCEL_TIP; ?>')"><?php echo _SW_CANCEL_BUTTON; ?></a></td>
      </tr>
   </table>
   <table  style="width:790px;margin:auto;" >
	 <tr>
	   <td><textarea style="width:100%;height:600px" cols="110" rows="25" name="filecontent" ><?php echo $content; ?></textarea></td>
	 </tr>
	</table>

<input type="hidden" name="preview" value="manual" />

<input type="hidden" name="tmpl" id="no_html" value="index" />
<input type="hidden" name="option" value="com_swmenupro" />
<input type="hidden" name="task" value="manualsave" />
<input type="hidden" name="mid" id="mid" value="<?php echo $id;?>" />
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<input type="hidden" name="limit" id="limit" value="<?PHP echo $limit; ?>" />
<input type="hidden" name="limitstart" id="limitstart" value="<?PHP echo $limitstart; ?>" />
<input type="hidden" name="returntask" value="showmodules" />
</form>
</div>
<script language="JavaScript" type="text/javascript" src="components/com_swmenupro/js/wz_tooltip.js"></script>  

<script type="text/javascript" >
	<!--
//jQuery('#toolbar-box').remove();
jQuery('.swmenu_container').corner();
jQuery('.sw_manual_button').corner();
jQuery('.sw_inner_container_header').corner('tl tr');
jQuery("div#successful").corner();
setTimeout(function(){
  
jQuery("div#successful").fadeOut("slow", function () {
jQuery("div#successful").remove();
});

}, 3000);
//jQuery.noConflict();
	-->
    </script>		
<?php
	}


	
	
	
	
	

function imageConfig3( $ordered,$row,$lists,$rows2) {
	$absolute_path=JPATH_ROOT;	
	
		$menu = @$rows2->menutype ? $rows2->menutype : 'mainmenu';
		$menustyle = @$rows2->menustyle;
		$hybrid = @$rows2->hybrid ? $rows2->hybrid: 0 ;

		$rows=$ordered;
		
       // $live_site = $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
        $live_site = JURI::root(); 
        if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
 
		//echo $live_site."hello";
?>
<script type="text/javascript" src="components/com_swmenupro/js/DynamicTreeBuilder2.js"></script>
<script type="text/javascript" src="components/com_swmenupro/js/plugins2.js"></script>

<script type="text/javascript" >
<!--
var cp = new ColorPicker('window'); // Popup window

-->
</script>		
<div class="swmenu_images_container" >

<table width="100%" cellpadding="0" cellspacing="0"><tr><td valign="top">
<i><?php echo _SW_SELECT_ITEM_TIP; ?></i>
<table cellspacing="0" cellpadding="0" width="438">
    <tr>
        <td valign="top">
            <div class="DynamicTree" >
            <div class="wrap1" style="float:left" >
            <div class="top">&nbsp;<b><?php echo $menu.($hybrid?" <i>(". _SW_HYBRID.")</i>":""); ?></b></div>
            <div class="wrap2" id="tree" >
 <?php 
 $name = "";
 $link = "";
 $counter = 0;
 $doMenu = 1;
 $number = count($ordered);

 while ($doMenu && $number){
 	$ordered[$counter]['TARGET']="_self";
 	if ($ordered[$counter]['indent'] == 0){
 		$hasSub = 0;
 		if (($counter+1 == $number) || ($ordered[$counter+1]['indent'] == 0)){
 			$doSubMenu = 0;
 			echo "<div class=\"".$ordered[$counter]['TYPE']."\" ><a href=\"".$ordered[$counter]['URL']."\" title=\"".$ordered[$counter]['TITLE']."\" target=\"".$ordered[$counter]['TARGET']."\"> \n";
 			echo $ordered[$counter]['TITLE']."</a></div> \n";
 		}else{
 			$doSubMenu = 1;
 			echo "<div class=\"".$ordered[$counter]['TYPE']."\" ><a href='".$ordered[$counter]['URL']."' title='".$ordered[$counter]['TITLE']."' target='".$ordered[$counter]['TARGET']."'>\n";
 			echo $ordered[$counter]['TITLE']."</a> \n";
 		}
 		$counter++;
 		while($doSubMenu){
 			$ordered[$counter]['TARGET']="_self";
 			if ($counter+1 == $number){
 				$doSubMenu = 0;
 				$doMenu = 0;
 				echo "<div class=\"".$ordered[$counter]['TYPE']."\" ><a href='".$ordered[$counter]['URL']."' title='".$ordered[$counter]['TITLE']."' target='".$ordered[$counter]['TARGET']."'> \n";
 				echo $ordered[$counter]['TITLE']."</a></div> \n";
 				echo str_repeat("</div> \n",($ordered[$counter]['indent']-@$ordered[$counter+1]['indent']));
 			}elseif ($ordered[$counter]['indent'] < $ordered[$counter + 1]['indent']){
 				echo "<div class=\"".$ordered[$counter]['TYPE']."\" ><a href='".$ordered[$counter]['URL']."' title='".$ordered[$counter]['TITLE']."' target='".$ordered[$counter]['TARGET']."'>".$ordered[$counter]['TITLE']."\n";
 				echo "</a>\n";
 			}elseif ($ordered[$counter]['indent'] == $ordered[$counter + 1]['indent']){
 				echo "<div class=\"".$ordered[$counter]['TYPE']."\" ><a href='".$ordered[$counter]['URL']."' title='".$ordered[$counter]['TITLE']."' target='".$ordered[$counter]['TARGET']."'> \n";
 				echo $ordered[$counter]['TITLE']."</a></div>";
 			}else{
 				echo "<div class=\"".$ordered[$counter]['TYPE']."\" ><a href='".$ordered[$counter]['URL']."' title='".$ordered[$counter]['TITLE']."' target='".$ordered[$counter]['TARGET']."'> \n";
 				echo $ordered[$counter]['TITLE']."</a></div>";
 				echo str_repeat("</div> \n",($ordered[$counter]['indent']-$ordered[$counter+1]['indent']));
 			}
 			if (($counter+1 == $number) || ($ordered[$counter+1]['indent'] == 0)){
 				$doSubMenu = 0;
 			}
 			$counter++;
 			$hasSub++;
 		}
 	}
 	if ($counter == ($number)){ $doMenu = 0;}
 }
?>
      </div></div></div>
    </td></tr>
  </table>
  </td><td valign="top">
    <table width="300" id="images_properties" ><tr><td>
      
    <div class="selected_label"><?php echo _SW_SELECTED_ITEM; ?></div><div class="swmenu_red" id="tree-info-name"> <?php echo _SW_NONE_SELECTED; ?></div>
   
   

<div class="image_box2" ><a href="javascript:void(0);"><img src="components/com_swmenupro/images/plus.gif" align="left" /><?php echo _SW_ITEM_PROPERTIES_TAB2; ?></a></div>
<div  class="image_section" >
    <table style="padding-top:0px;" cellpadding="3" width="100%" cellspacing="0">
       <tr class="swmenu_menubackgr3">
         <td><?php echo _SW_SHOW_ITEM; ?>:</td><td align="right"><?php echo $lists['showitem']; ?></td>
       </tr><tr>
         <td><?php echo _SW_SHOW_ITEM_NAME; ?>:</td><td align="right"><?php echo $lists['showname']; ?></td>
       </tr><tr class="swmenu_menubackgr3">
         <td><?php echo _SW_IS_LINK; ?>:</td><td align="right"><?php echo $lists['target']; ?></td>
       </tr><tr>
         <td><?php echo _SW_IMAGE_ALIGN; ?>:</td><td align="right"><?php echo $lists['align']; ?></td>
       </tr>
    </table>   
   
</div>


<div class="image_box2" ><a href="javascript:void(0);"><img src="components/com_swmenupro/images/plus.gif" align="left" /><?php echo _SW_MENU_ITEM_IMAGES; ?></a></div>
<div  class="image_section" >
    
    <table cellpadding="3" width="100%" cellspacing="0">
        <tr>
        <td><b><?php echo _SW_IMAGE; ?>:</b></td><td align="right">
            <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('tree-image');"/>
          
          <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('tree-image').src='../';document.getElementById('tree-imagehidden').value='';treeInfoUpdate();" />
          <input class="input" size="35" id="tree-imagehidden" name="tree-imagehidden" type="hidden" value="" onchange="treeInfoUpdate();"/></td>
      </tr>  
      <tr>
        <td colspan="2" align="center" style="border:0px solid #ccc;" bgcolor="white"><img src="" name="tree-image" id="tree-image" /><br />
        <span class="swmenu_smallgrey"><?php echo _SW_IMAGE." "._SW_PREVIEW; ?></span></td>
      </tr>     
   </table>
   <table cellpadding="5" width="100%" cellspacing="0" id="image_pref" >
      <tr class="swmenu_menubackgr3">
        <td><?php echo _SW_WIDTH; ?>:</td>
        <td><input class="input" size="2" id="tree-image_width" name="tree-image_width" type="text" value="" onchange="treeInfoUpdate();"/>
        </td><td><?php echo _SW_HEIGHT; ?>:</td>
        <td><input class="input" size="2" id="tree-image_height" name="tree-image_height" type="text" value="" onchange="treeInfoUpdate();"/></td>
      </tr><tr>
        <td><?php echo _SW_HSPACE; ?>:</td><td><input class="input" size="2" id="tree-image_hspace" name="tree-image_hspace" type="text" value="" onchange="treeInfoUpdate();"/>
        </td><td><?php echo _SW_VSPACE; ?>:</td><td><input class="input" size="2" id="tree-image_vspace" name="tree-image_vspace" type="text" value="" onchange="treeInfoUpdate();"/></td>
      </tr>
    </table>
    
    <table style="border-top:5px solid #C2E8FD;" cellpadding="3" width="100%" cellspacing="0">
        <tr>
        <td><b><?php echo _SW_IMAGE_OVER; ?>:</b> </td><td align="right">
            <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('tree-image_over');"/>
          
          <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('tree-image_over').src='none';document.getElementById('tree-image_overhidden').value='';treeInfoUpdate();" />
          <input class="input" size="35" id="tree-image_overhidden" name="tree-image_overhidden" type="hidden" value="" onchange="treeInfoUpdate();"/></td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="border:0px solid #ccc;" bgcolor="white"><img src="" name="tree-image_over" id="tree-image_over" /><br />
        <span class="swmenu_smallgrey"><?php echo _SW_IMAGE_OVER." "._SW_PREVIEW; ?></span></td>
      </tr>
    </table>
    <table cellpadding="5" width="100%" cellspacing="0" id="image_pref" >
      <tr class="swmenu_menubackgr3">
        <td><?php echo _SW_WIDTH; ?>:</td>
        <td><input class="input" size="2" id="tree-image_over_width" name="tree-image_over_width" type="text" value="" onchange="treeInfoUpdate();"/></td>
        <td><?php echo _SW_HEIGHT; ?>:</td>
        <td><input class="input" size="2" id="tree-image_over_height" name="tree-image_height" type="text" value="" onchange="treeInfoUpdate();"/></td>
      </tr><tr>
        <td><?php echo _SW_HSPACE; ?>:</td><td><input class="input" size="2" id="tree-image_over_hspace" name="tree-image_over_hspace" type="text" value="" onchange="treeInfoUpdate();"/></td>
        <td><?php echo _SW_VSPACE; ?>:</td><td><input class="input" size="2" id="tree-image_over_vspace" name="tree-image_over_vspace" type="text" value="" onchange="treeInfoUpdate();"/></td>
      </tr>
   </table>    
</div>
 

<div class="image_box2" ><a href="javascript:void(0);"><img src="components/com_swmenupro/images/plus.gif" align="left" /><?php echo _SW_ITEM_CSS_TAB2; ?></a></div>
<div  class="image_section" >
    <table cellpadding="3" cellspacing="0"  width="100%" >
      <tr>
        <td><b><?php echo _SW_CSS; ?>:</b></td>
	  </tr><tr class="swmenu_menubackgr3">
	    <td><textarea cols="30" rows="6" name="tree-normal_css" id="tree-normal_css" class="inputbox" onchange="treeInfoUpdate();"></textarea></td>
	  </tr><tr>
	    <td><b><?php echo _SW_CSS_OVER; ?>:</b></td>
	  </tr><tr class="swmenu_menubackgr3">
	    <td><textarea cols="30" rows="6" name="tree-over_css" id="tree-over_css" class="inputbox" onchange="treeInfoUpdate();"></textarea></td>
      </tr><tr>
        <td align="center" class="auto_label"><b><?php echo _SW_AUTO_CSS_CREATOR_LABEL; ?></b></td>
	  </tr><tr class="swmenu_menubackgr3">
		<td align="center"><?php echo $lists["ncsstype"]; ?></td>
	  </tr>	
	</table>
<div id="ncsstype-border">
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_COLOR; ?>:</td>
		  <td>
                      
                      <div >
        <div id="ncsstype-border-color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor=''>
          </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'ncsstype-border-color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="ncsstype-border-color" name="ncsstype-border-color" value=""/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('ncsstype-border-color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                      </div>  
                      
                  </td> 
                     </tr><tr>
		  <td><?php echo _SW_STYLE; ?>:</td>
		  <td><?php echo $lists["ncsstype-border-style"]; ?></td>
		</tr><tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_WIDTH; ?>:</td><td><?php echo $lists["ncsstype-border-width"]; ?>px	</td>
		</tr>
	</table>
 </div>
				
 <div id="ncsstype-background" >
	<table cellpadding="3" cellspacing="0" width="100%">
      <tr class="swmenu_menubackgr3">
		<td width="20%"><?php echo _SW_COLOR; ?>:</td>
		<td colspan="2">
                     <div >
        <div id="ncsstype-background-color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor=''>
          </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'ncsstype-background-color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="ncsstype-background-color" name="ncsstype-background-color" value=""/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('ncsstype-background-color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                      </div>  
                      
                  </td> 
                     </tr><tr>
        <td><?php echo _SW_IMAGE; ?>:</td>
        <td colspan="2">
          <table id="ncsstype-background_image_box" style="border: 1px solid #000000; width:120px; height:20px"  align="left"> 
            <tr> 
              <td width="100%" height="20">&nbsp;</td>
            </tr> 
           </table>
         
             <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('ncsstype-background_image');"/>
          
          <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('ncsstype-background_image_box').style.background='none';document.getElementById('ncsstype-background_image').value='';" />
          <input type="hidden" size="40" id="ncsstype-background_image" name="ncsstype-background_image" value=""/>
             
            </td>  
       </tr><tr class="swmenu_menubackgr3">
		<td colspan="2"><?php echo _SW_REPEAT; ?>:</td>
		<td><?php echo $lists["ncsstype-background-repeat"]; ?></td>
	  </tr><tr>
		<td colspan="2"><?php echo _SW_LEFT_OFFSET; ?>:</td><td><input type="text" size="4" id="ncsstype-x_offset" name="ncsstype-x_offset" value="0"/>&nbsp;px</td>
	  </tr><tr class="swmenu_menubackgr3">
		<td colspan="2"><?php echo _SW_TOP_OFFSET; ?>:</td><td><input type="text" size="4" id="ncsstype-y_offset" name="ncsstype-y_offset" value="0"/>&nbsp;px</td>
	  </tr>
	</table>
 </div>
					
 <div id="ncsstype-dimensions" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_WIDTH; ?>:</td><td><input type="text" size="4" id="ncsstype-x_width" name="ncsstype-x_width" value=""/>&nbsp;px</td>
		</tr><tr>
		  <td><?php echo _SW_HEIGHT; ?>:</td><td><input type="text" size="4" id="ncsstype-y_height" name="ncsstype-y_height" value=""/>&nbsp;px</td>
		</tr>
	</table>
</div>
					
<div id="ncsstype-offsets" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
          <td><?php echo _SW_LEFT_OFFSET; ?>:</td><td><input type="text" size="4" id="ncsstype-x2_offset" name="ncsstype-x2_offset" value=""/>&nbsp;px</td>
		</tr><tr>
	      <td><?php echo _SW_TOP_OFFSET; ?>:</td><td><input type="text" size="4" id="ncsstype-y2_offset" name="ncsstype-y2_offset" value=""/>&nbsp;px</td>
		</tr>
	</table>
</div>
					
<div id="ncsstype-effects" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_OPACITY; ?>:</td>
		  <td><input type="text" size="4" id="ncsstype-opacity" name="ncsstype-opacity" value=""/>&nbsp;%</td>
		</tr>
	</table>
</div>
					
<div id="ncsstype-font" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
	      <td><?php echo _SW_FONT_FAMILY_LABEL; ?>:</td>
		  <td><?php echo $lists["ncsstype-font-family"]; ?></td>
		</tr><tr>
	      <td><?php echo _SW_FONT_STYLE; ?>:</td>
		  <td><?php echo $lists["ncsstype-font-style"]; ?></td>
		</tr><tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_FONT_WEIGHT; ?>:</td>
		  <td><?php echo $lists["ncsstype-font-weight"]; ?></td>
		</tr><tr>
		  <td><?php echo _SW_FONT_SIZE; ?>:</td>
		  <td><input type="text" size="4" id="ncsstype-font-size" name="ncsstype-font-size" value=""/>&nbsp;px</td>
		</tr>
	</table>
</div>
					
<div id="ncsstype-text" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_COLOR; ?>:</td>
		  <td>
                       <div >
        <div id="ncsstype-font-color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor=''>
          </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'ncsstype-font-color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="ncsstype-font-color" name="ncsstype-font-color" value=""/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('ncsstype-font-color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                      </div>  
                      
                  </td> 
                     </tr><tr>
		  <td><?php echo _SW_ALIGNMENT; ?>:</td>
		  <td><?php echo $lists["ncsstype-text-align"]; ?></td>
		</tr><tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_TEXT_DECORATION; ?>:</td>
		  <td><?php echo $lists["ncsstype-text-decoration"]; ?></td>
		</tr><tr>
		  <td><?php echo _SW_TEXT_TRANSFORM; ?>:</td>
		  <td><?php echo $lists["ncsstype-text-transform"]; ?></td>
		</tr><tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_WHITE_SPACE; ?>:</td>
		  <td><?php echo $lists["ncsstype-white-space"]; ?></td>
		</tr><tr>
		  <td><?php echo _SW_TEXT_INDENT; ?>:</td>
		  <td><input type="text" size="4" id="ncsstype-text-indent" name="ncsstype-text-indent" value="0"/>&nbsp;px</td>
		</tr>
	</table>
</div>
					
<div id="ncsstype-padding" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
          <TD><?php echo _SW_TOP; ?>:</td><td><input type="text"  size="4" id="ncsstype-pad_top" name="ncsstype-pad_top" value="0" maxlength="4"/>&nbsp;px</TD>
        </tr><tr>
          <TD><?php echo _SW_RIGHT; ?>:</td><td><input type="text"  size="4" id="ncsstype-pad_right" name="ncsstype-pad_right" value="0" maxlength="4"/>&nbsp;px</TD>
        </tr><tr class="swmenu_menubackgr3">
          <TD><?php echo _SW_BOTTOM; ?>:</td><td><input type="text"  size="4" id="ncsstype-pad_bottom" name="ncsstype-pad_bottom" value="0" maxlength="4"/>&nbsp;px</TD>
        </tr><tr>
          <TD><?php echo _SW_LEFT; ?>:</td><td><input type="text"  size="4" id="ncsstype-pad_left" name="ncsstype-pad_left" value="0" maxlength="4"/>&nbsp;px</TD>
        </tr>
	</table>
</div>
					
<div id="ncsstype-margin" >
	<table cellpadding="3" cellspacing="0" width="100%">
      <tr class="swmenu_menubackgr3">
        <TD><?php echo _SW_TOP; ?>:</td><td><input type="text"  size="4" id="ncsstype-margin_top" name="ncsstype-margin_top" value="0" maxlength="4"/>&nbsp;px</TD>
      </tr><tr>
        <TD><?php echo _SW_RIGHT; ?>:</td><td><input type="text"  size="4" id="ncsstype-margin_right" name="ncsstype-margin_right" value="0" maxlength="4"/>&nbsp;px</TD>
      </tr><tr class="swmenu_menubackgr3">
        <TD><?php echo _SW_BOTTOM; ?>:</td><td><input type="text"  size="4" id="ncsstype-margin_bottom" name="ncsstype-margin_bottom" value="0" maxlength="4"/>&nbsp;px</TD>
      </tr><tr>
        <TD><?php echo _SW_LEFT; ?>:</td><td><input type="text"  size="4" id="ncsstype-margin_left" name="ncsstype-margin_left" value="0" maxlength="4"/>&nbsp;px</TD>
      </tr>
    </table>
</div>

<div id="css_buttons" align="center">
	<TABLE width="100%">
      <TR class="swmenu_menubackgr3">
        <TD align="center"><a href="javascript:void(0);" class="swmenu_button_save" onclick="doCSS('ncsstype','normal');" ><?php echo _SW_UPDATE_CSS_BUTTON; ?></a></td>
        <td align="center"><a href="javascript:void(0);" class="swmenu_button_preview" onclick="doCSS('ncsstype','over');" ><?php echo _SW_UPDATE_OVER_CSS_BUTTON; ?></a></td>
      </tr>
    </table>
</div>
</div>






<div class="image_box2" ><a href="javascript:void(0);"><img src="components/com_swmenupro/images/plus.gif" align="left" /><?php echo _SW_MENU_ITEM_HTML; ?></a></div>
<div  class="image_section" >
    <table cellpadding="3" cellspacing="0"  width="100%" >
      <tr class="swmenu_menubackgr3">
	    <td><textarea cols="30" rows="16" name="tree-custom_html" id="tree-custom_html" class="inputbox" onchange="treeInfoUpdate();"></textarea></td>
	  </tr><tr>
        <td ><b><?php echo _SW_MENU_PLACE_HTML; ?>:</b>&nbsp;
            <a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_MENU_PLACE_HTML_TIP; ?>')" >
	      <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a><?php echo $lists["html_position"]; ?>
        </td>
	  </tr>	
	</table>

</div>





<div class="image_box2" ><a href="javascript:void(0);"><img src="components/com_swmenupro/images/plus.gif" align="left" /><?php echo _SW_MULTIPLE_TAB2; ?></a></div>
   <div class="image_section">
       <table  cellpadding="3" width="100%" cellspacing="0">
          <tr class="swmenu_menubackgr3">
            <td width="15%"><b><?php echo _SW_STEP_1; ?>.</b></td>
            <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_STEP_1_TIP; ?>')" >
	        <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a></td>
	        <td><?php echo $lists['autoassign']; ?></td>
          </tr><tr>
            <td><b><?php echo _SW_STEP_2; ?>.</b></td>
            <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_STEP_2_TIP; ?>')" >
	        <img src="components/com_swmenupro/images/info.png" alt="info" align="middle" name="info" border="0" /></a></td>
	        <td><?php echo $lists['autoattrib']; ?></td>
          </tr>
          <tr class="swmenu_menubackgr3">
            <td width="15%"><b><?php echo _SW_STEP_3; ?>.</b></td>
            <td><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_STEP_3_TIP; ?>')" >
	        <img src="components/com_swmenupro/images/info.png" alt="info" align="left" name="info" border="0" /></a></td>
	        <td><a href="javascript:void(0);" class="swmenu_button_wide_create" onClick="doAutoAssign(<?php echo count($ordered); ?>)" ><?php echo _SW_APPLY_BUTTON; ?></a></td>
         </tr>
       </table>
                
 <div id="auto_image">
     
     
     <table cellpadding="3" width="100%" cellspacing="0">
        <tr>
        <td><b><?php echo _SW_IMAGE; ?>:</b></td><td align="right">
            <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('globalimage');"/>
          
          <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('globalimage').src='../';document.getElementById('globalimagehidden').value='';" />
          <input class="input" size="35" id="globalimagehidden" name="globalimagehidden" type="hidden" value="" /></td>
      </tr>  
      <tr>
        <td colspan="2" align="center" style="border:0px solid #ccc;" bgcolor="white"><img src="" name="globalimage" id="globalimage" /><br />
        <span class="swmenu_smallgrey"><?php echo _SW_IMAGE." "._SW_PREVIEW; ?></span></td>
      </tr>     
   </table>
   <table cellpadding="5" width="100%" cellspacing="0" id="image_pref" >
      <tr class="swmenu_menubackgr3">
        <td><?php echo _SW_WIDTH; ?>:</td>
        <td><input class="input" size="2" id="globalimage_width" name="globalimage_width" type="text" value="" />
        </td><td><?php echo _SW_HEIGHT; ?>:</td>
        <td><input class="input" size="2" id="globalimage_height" name="globalimage_height" type="text" value="" /></td>
      </tr><tr>
        <td><?php echo _SW_HSPACE; ?>:</td><td><input class="input" size="2" id="globalimage_hspace" name="globalimage_hspace" type="text" value="" />
        </td><td><?php echo _SW_VSPACE; ?>:</td><td><input class="input" size="2" id="globalimage_vspace" name="globalimage_vspace" type="text" value="" /></td>
      </tr>
    </table>
     
 </div>
                
 <div id="auto_css_div" style="display:none;">
     <table cellpadding="3" cellspacing="0"  width="100%" >
         
         <tr>
	    <td><b><?php echo _SW_CSS; ?>:</b></td>
	  </tr><tr class="swmenu_menubackgr3">
	    <td><textarea cols="30" rows="6" name="auto_css" id="auto_css" class="inputbox" ></textarea></td>
      </tr><tr>
        <td align="center" class="auto_label"><b><?php echo _SW_AUTO_CSS_CREATOR_LABEL; ?></b></td>
	  </tr><tr class="swmenu_menubackgr3">
		<td align="center"><?php echo $lists["ocsstype"]; ?></td>
	  </tr>	
      
	</table>
						
 <div id="ocsstype-border">
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_COLOR; ?>:</td>
		  <td>
                      
                      <div >
        <div id="ocsstype-border-color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor=''>
          </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'ocsstype-border-color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="ocsstype-border-color" name="ocsstype-border-color" value=""/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('ocsstype-border-color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                      </div>  
                      
                  </td> 
                     </tr><tr>
		  <td><?php echo _SW_STYLE; ?>:</td>
		  <td><?php echo $lists["ocsstype-border-style"]; ?></td>
		</tr><tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_WIDTH; ?>:</td><td><?php echo $lists["ocsstype-border-width"]; ?>px	</td>
		</tr>
	</table>
 </div>
				
 <div id="ocsstype-background" >
	<table cellpadding="3" cellspacing="0" width="100%">
      <tr class="swmenu_menubackgr3">
		<td width="20%"><?php echo _SW_COLOR; ?>:</td>
		<td colspan="2">
                     <div >
        <div id="ocsstype-background-color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor=''>
          </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'ocsstype-background-color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="ocsstype-background-color" name="ocsstype-background-color" value=""/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('ocsstype-background-color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                      </div>  
                      
                  </td> 
                     </tr><tr>
        <td><?php echo _SW_IMAGE; ?>:</td>
        <td colspan="2">
          <table id="ocsstype-background_image_box" style="border: 1px solid #000000; width:120px; height:20px"  align="left"> 
            <tr> 
              <td width="100%" height="20">&nbsp;</td>
            </tr> 
           </table>
         
             <input class="sw_get" type="button" name="getimage"  value="<?php echo _SW_GET_IMAGE_BUTTON; ?>" onclick="get_background_image('ocsstype-background_image');"/>
          
          <input class="sw_clear" type="button"  value="<?php echo _SW_CLEAR; ?>" onclick="document.getElementById('ocsstype-background_image_box').style.background='none';document.getElementById('ocsstype-background_image').value='';" />
          <input type="hidden" size="40" id="ocsstype-background_image" name="ocsstype-background_image" value=""/>
             
            </td>  
       </tr><tr class="swmenu_menubackgr3">
		<td colspan="2"><?php echo _SW_REPEAT; ?>:</td>
		<td><?php echo $lists["ocsstype-background-repeat"]; ?></td>
	  </tr><tr>
		<td colspan="2"><?php echo _SW_LEFT_OFFSET; ?>:</td><td><input type="text" size="4" id="ocsstype-x_offset" name="ocsstype-x_offset" value="0"/>&nbsp;px</td>
	  </tr><tr class="swmenu_menubackgr3">
		<td colspan="2"><?php echo _SW_TOP_OFFSET; ?>:</td><td><input type="text" size="4" id="ocsstype-y_offset" name="ocsstype-y_offset" value="0"/>&nbsp;px</td>
	  </tr>
	</table>
 </div>
					
 <div id="ocsstype-dimensions" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_WIDTH; ?>:</td><td><input type="text" size="4" id="ocsstype-x_width" name="ocsstype-x_width" value=""/>&nbsp;px</td>
		</tr><tr>
		  <td><?php echo _SW_HEIGHT; ?>:</td><td><input type="text" size="4" id="ocsstype-y_height" name="ocsstype-y_height" value=""/>&nbsp;px</td>
		</tr>
	</table>
</div>
					
<div id="ocsstype-offsets" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
          <td><?php echo _SW_LEFT_OFFSET; ?>:</td><td><input type="text" size="4" id="ocsstype-x2_offset" name="ocsstype-x2_offset" value=""/>&nbsp;px</td>
		</tr><tr>
	      <td><?php echo _SW_TOP_OFFSET; ?>:</td><td><input type="text" size="4" id="ocsstype-y2_offset" name="ocsstype-y2_offset" value=""/>&nbsp;px</td>
		</tr>
	</table>
</div>
					
<div id="ocsstype-effects" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_OPACITY; ?>:</td>
		  <td><input type="text" size="4" id="ocsstype-opacity" name="ocsstype-opacity" value=""/>&nbsp;%</td>
		</tr>
	</table>
</div>
					
<div id="ocsstype-font" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
	      <td><?php echo _SW_FONT_FAMILY_LABEL; ?>:</td>
		  <td><?php echo $lists["ocsstype-font-family"]; ?></td>
		</tr><tr>
	      <td><?php echo _SW_FONT_STYLE; ?>:</td>
		  <td><?php echo $lists["ocsstype-font-style"]; ?></td>
		</tr><tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_FONT_WEIGHT; ?>:</td>
		  <td><?php echo $lists["ocsstype-font-weight"]; ?></td>
		</tr><tr>
		  <td><?php echo _SW_FONT_SIZE; ?>:</td>
		  <td><input type="text" size="4" id="ocsstype-font-size" name="ocsstype-font-size" value=""/>&nbsp;px</td>
		</tr>
	</table>
</div>
					
<div id="ocsstype-text" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_COLOR; ?>:</td>
		  <td>
                       <div >
        <div id="ocsstype-font-color_box" style="float:left;margin-right:10px;border: 1px solid #000000; width:20px; height:26px" bgColor=''>
          </div><input type="text" size="8" onchange="doColorChange(this);" class="color {styleElement:'ocsstype-font-color_box',hash:true,required:false,pickerOnfocus:false,pickerClosable:true}" id="ocsstype-font-color" name="ocsstype-font-color" value=""/>
      <a onMouseOver="this.style.cursor='pointer'" onClick="document.getElementById('ocsstype-font-color').color.showPicker()"><img src="components/com_swmenupro/images/sel.gif"/><?php echo _SW_GET; ?></a>
                      </div>  
                      
                  </td> 
                     </tr><tr>
		  <td><?php echo _SW_ALIGNMENT; ?>:</td>
		  <td><?php echo $lists["ocsstype-text-align"]; ?></td>
		</tr><tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_TEXT_DECORATION; ?>:</td>
		  <td><?php echo $lists["ocsstype-text-decoration"]; ?></td>
		</tr><tr>
		  <td><?php echo _SW_TEXT_TRANSFORM; ?>:</td>
		  <td><?php echo $lists["ocsstype-text-transform"]; ?></td>
		</tr><tr class="swmenu_menubackgr3">
		  <td><?php echo _SW_WHITE_SPACE; ?>:</td>
		  <td><?php echo $lists["ocsstype-white-space"]; ?></td>
		</tr><tr>
		  <td><?php echo _SW_TEXT_INDENT; ?>:</td>
		  <td><input type="text" size="4" id="ocsstype-text-indent" name="ocsstype-text-indent" value="0"/>&nbsp;px</td>
		</tr>
	</table>
</div>
					
<div id="ocsstype-padding" >
	<table cellpadding="3" cellspacing="0" width="100%">
		<tr class="swmenu_menubackgr3">
          <TD><?php echo _SW_TOP; ?>:</td><td><input type="text"  size="4" id="ocsstype-pad_top" name="ocsstype-pad_top" value="0" maxlength="4"/>&nbsp;px</TD>
        </tr><tr>
          <TD><?php echo _SW_RIGHT; ?>:</td><td><input type="text"  size="4" id="ocsstype-pad_right" name="ocsstype-pad_right" value="0" maxlength="4"/>&nbsp;px</TD>
        </tr><tr class="swmenu_menubackgr3">
          <TD><?php echo _SW_BOTTOM; ?>:</td><td><input type="text"  size="4" id="ocsstype-pad_bottom" name="ocsstype-pad_bottom" value="0" maxlength="4"/>&nbsp;px</TD>
        </tr><tr>
          <TD><?php echo _SW_LEFT; ?>:</td><td><input type="text"  size="4" id="ocsstype-pad_left" name="ocsstype-pad_left" value="0" maxlength="4"/>&nbsp;px</TD>
        </tr>
	</table>
</div>
					
<div id="ocsstype-margin" >
	<table cellpadding="3" cellspacing="0" width="100%">
      <tr class="swmenu_menubackgr3">
        <TD><?php echo _SW_TOP; ?>:</td><td><input type="text"  size="4" id="ocsstype-margin_top" name="ocsstype-margin_top" value="0" maxlength="4"/>&nbsp;px</TD>
      </tr><tr>
        <TD><?php echo _SW_RIGHT; ?>:</td><td><input type="text"  size="4" id="ocsstype-margin_right" name="ocsstype-margin_right" value="0" maxlength="4"/>&nbsp;px</TD>
      </tr><tr class="swmenu_menubackgr3">
        <TD><?php echo _SW_BOTTOM; ?>:</td><td><input type="text"  size="4" id="ocsstype-margin_bottom" name="ocsstype-margin_bottom" value="0" maxlength="4"/>&nbsp;px</TD>
      </tr><tr>
        <TD><?php echo _SW_LEFT; ?>:</td><td><input type="text"  size="4" id="ocsstype-margin_left" name="ocsstype-margin_left" value="0" maxlength="4"/>&nbsp;px</TD>
      </tr>
    </table>
</div>

<div id="oss_buttons" align="center">
	<TABLE width="100%">
		<TR class="swmenu_menubackgr3"><TD align="center">
			<a href="javascript:void(0);" class="swmenu_button_save" onclick="doCSS('ocsstype','auto');" ><?php echo _SW_UPDATE_CSS_BUTTON; ?></a>
           </td>
         </tr>
     </table>
</div>
</div>
</div>


                
</td></tr></table></td></tr></table>

    <script type="text/javascript">

    var tree = new DynamicTreeBuilder("tree");
    tree.init();
    DynamicTreePlugins.call(tree);
    
    hideAll();
    
    function URLDecode(psEncodeString)
{
  // Create a regular expression to search all +s in the string
  var lsRegExp = /\+/g;
  // Return the decoded string
  return unescape(String(psEncodeString).replace(lsRegExp, " "));
}
    
  <?php 
  for($i=0;$i<count($ordered);$i++){
      	echo "var node = tree.allNodes['tree-".($i+1)."'];\n";
      		echo "node.act_id='".$ordered[$i]['ID']."';\n";
      		echo "node.showname='".(is_null($ordered[$i]['SHOWNAME'])?'1':$ordered[$i]['SHOWNAME'])."';\n";
      		echo "node.target='".(is_null($ordered[$i]['TARGETLEVEL'])?'1':$ordered[$i]['TARGETLEVEL'])."';\n";
      		echo "node.showitem='".(is_null($ordered[$i]['SHOWITEM'])?'1':$ordered[$i]['SHOWITEM'])."';\n";
      	
      	
      	if ($ordered[$i]['IMAGE']!="" && $ordered[$i]['IMAGE']!="undefined"){
      		
      		$image = explode(",", $ordered[$i]['IMAGE']);
      		      		 		
      		echo "node.image='../".$image[0]."';\n";
      		echo "node.image_width='".$image[1]."';\n";
      		echo "node.image_height='".$image[2]."';\n";
      		echo "node.image_hspace='".$image[4]."';\n";
      		echo "node.image_vspace='".$image[3]."';\n";
      		echo "node.image_align='".$ordered[$i]['IMAGEALIGN']."';\n";
      	}else{
      		echo "node.image='';";
      		echo "node.image_width='';\n";
      		echo "node.image_height='';\n";
      		echo "node.image_hspace='';\n";
      		echo "node.image_vspace='';\n";
      		echo "node.image_align='';\n";	
      	}
      	if ($ordered[$i]['IMAGEOVER']!="" && $ordered[$i]['IMAGEOVER']!="undefined"){
      		
      		$image = explode(",", $ordered[$i]['IMAGEOVER']);
      		    		
      		 		
      		echo "node.image_over='../".$image[0]."';\n";
      		echo "node.image_over_width='".$image[1]."';\n";
      		echo "node.image_over_height='".$image[2]."';\n";
      		echo "node.image_over_hspace='".$image[4]."';\n";
      		echo "node.image_over_vspace='".$image[3]."';\n";
      		echo "node.image_over_align='".$ordered[$i]['IMAGEALIGN']."';\n";
      	}else{
      		echo "node.image_over='';";
      		echo "node.image_over_width='';\n";
      		echo "node.image_over_height='';\n";
      		echo "node.image_over_hspace='';\n";
      		echo "node.image_over_vspace='';\n";   
      		echo "node.image_over_align='';\n";		
      	}
      	if ($ordered[$i]['NCSS']!="" && $ordered[$i]['NCSS']!="undefined"){
      		echo "node.ncss='".urlencode($ordered[$i]['NCSS'])."';\n";
      		echo "node.ncss=URLDecode(node.ncss);\n";
      	}else{
      		echo "node.ncss='';\n";	
      	}
      	if ($ordered[$i]['OCSS']!="" && $ordered[$i]['OCSS']!="undefined"){
      		echo "node.ocss='".urlencode($ordered[$i]['OCSS'])."';\n";
      		echo "node.ocss=URLDecode(node.ocss);\n";
      	}else{
      		echo "node.ocss='';\n";	
      	}
        if (@$ordered[$i]['HTML']!="" && @$ordered[$i]['HTML']!="undefined"){
      		echo "node.custom_html='".urlencode($ordered[$i]['HTML'])."';\n";
      		echo "node.custom_html=URLDecode(node.custom_html);\n";
      	}else{
      		echo "node.custom_html='';\n";	
      	}
        if (@$ordered[$i]['HTML_POSITION']!="" && @$ordered[$i]['HTML_POSITION']!="undefined"){
      		echo "node.html_position='".$ordered[$i]['HTML_POSITION']."';\n";
      		echo "node.html_position=node.html_position;\n";
      	}else{
      		echo "node.html_position='before';\n";	
      	}
           	
      }
   
?>
 </script>
   <input id="no_html" name="no_html" type="hidden" value="0" />
  <input id="manual" name="manual" type="hidden" value="0" />
  <input id="rel_path" name="rel_path" type="hidden" value="<?php echo $live_site; ?>" />
  <input id="module" name="module" type="hidden" value="1" />
  <input id="menuname" name="menuname" type="hidden" value="<?php echo $menu; ?>" />
  <input id="images_preview" name="images_preview" type="hidden" value="1" />
  <input id="php_out" name="php_out" type="hidden" value="" />
</div>

<script type="text/javascript" src="components/com_swmenupro/js/actions2.js"></script>
<script type="text/javascript">
<!--
/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

ddaccordion.init({
headerclass: 'image_box2',
contentclass: 'image_section',
revealtype:'click',
mouseoverdelay: 50,
collapseprev: false, 
defaultexpanded: [0],
onemustopen: false,
animatedefault: false,
persiststate: false,
toggleclass: ['','activeitem'],
togglehtml: ["src", "components/com_swmenupro/images/plus.gif", "components/com_swmenupro/images/minus.gif"],
animatespeed:'normal',
oninit:function(headers, expandedindices){ },
onopenclose:function(header, index, state, isuseractivated){ }
})

jQuery('#images_properties').corner();

//-->
</script>
   
   
<?php
}


function showModules( &$rows, $pageNav, $lists )
{
	$absolute_path=JPATH_ROOT;
	$live_site = JURI::root(); 
?> 
	
	<script src="../media/system/js/core.js" type="text/javascript"></script> 
	<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery-1.6.min.js"></script> 
        <script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery-ui.min2.js"></script> 
     
<script type="text/javascript">
<!--
function moduledelete(title,id){
	if (confirm("<?php echo _SW_DELETE_MODULE_NOTICE; ?> " + title +"?")){
		form=document.adminForm;
		num="cb"+id;
		form.task.value="remove";
		form.id.value=id;
		setTimeout('form.submit()',200) ;
	}
}


function newstyle(){
	form=document.adminForm;
	form.task.value="editDhtmlMenu";
	if(!form.menustyle.value){
		alert("<?php echo _SW_NO_MENU_NOTICE; ?>");
	}else if(form.new_title.value=="" || form.new_title.value=="Please Enter Module Title.."){
		alert("<?php echo "Please Enter A Module Title"; ?>");
	}else{
		//form.menuname.value=title;
		form.newmenu.value="1";
		//form.id.value="0";
               // alert(form.menustyle.value);
		setTimeout('form.submit()',200) ;
	}
}

function doSystemPopup(){
	window.open('components/com_swmenupro/menu_systems.php', 'win1', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=780,height=550,directories=no,location=no');
}

function doPreviewWindow(id) {
	form=document.adminForm;
	form.tmpl.value="component";
	form.id.value=id;
	form.target="win1";
	form.action="index.php";
	form.task.value="preview";

	window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=600,height=500,directories=no,location=no');
	setTimeout('form.submit()',200) ;
	setTimeout('form.target="_self"',300);
	setTimeout('form.action="index.php"',300);
	setTimeout('form.tmpl.value="index"',300);
	setTimeout('form.task.value="showmodules"',300);
}

function doStyleExport() {
	form=document.adminForm;
	form.tmpl.value="component";
        form.no_html.value=1;
	form.format.value="raw";
        var array_of_checked_values = jQuery("#ex_list").multiselect("getChecked").map(function(){
   return this.value;	
}).get();
        form.ex_checked.value=array_of_checked_values;
	//form.target="win1";
	//form.action="index.php";
	form.task.value="style_export";

	//window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=600,height=500,directories=no,location=no');
	setTimeout('form.submit()',200) ;
	//setTimeout('form.target="_self"',300);
	//setTimeout('form.action="index.php"',300);
	setTimeout('form.tmpl.value="index"',300);
        setTimeout('form.no_html.value=0',300);
        setTimeout('form.format.value="html"',300);
	setTimeout('form.task.value="showmodules"',300);
}

function doStyleImport() {
	var form = document.adminForm;
			// do field validation
			if (form.userfile.value == ""){
				alert( "<?php echo _SW_UPLOAD_FILE_NOTICE; ?>" );
			} else {
				form.task.value="importstyles";
				form.submit();
			}
}

function doModuleEdit(id) {
	form=document.adminForm;
	//form.tmpl.value="component";
	form.id.value=id;
	//form.target="win1";
	form.action="index.php";
	form.task.value="editDhtmlMenu";
form.submit();
	//window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=600,height=500,directories=no,location=no');
	//setTimeout('form.submit()',200) ;
//	setTimeout('form.target="_self"',300);
//	setTimeout('form.action="index.php"',300);
//	setTimeout('form.tmpl.value="index"',300);
//	setTimeout('form.task.value="showmodules"',300);
}

function doEditCSS(id) {
	form=document.adminForm;
	//form.tmpl.value="component";
	form.id.value=id;
	//form.target="win1";
	form.action="index.php";
	form.task.value="editCSS";
form.submit();
	//window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=600,height=500,directories=no,location=no');
	//setTimeout('form.submit()',200) ;
//	setTimeout('form.target="_self"',300);
//	setTimeout('form.action="index.php"',300);
//	setTimeout('form.tmpl.value="index"',300);
//	setTimeout('form.task.value="showmodules"',300);
}
function doExportMenu(id) {
	form=document.adminForm;
	//form.tmpl.value="component";
	form.id.value=id;
	//form.target="win1";
	form.action="index.php";
	form.task.value="exportMenu";
form.submit();
	//window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=600,height=500,directories=no,location=no');
	//setTimeout('form.submit()',200) ;
//	setTimeout('form.target="_self"',300);
//	setTimeout('form.action="index.php"',300);
//	setTimeout('form.tmpl.value="index"',300);
//	setTimeout('form.task.value="showmodules"',300);
}

-->
</script>

<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery.corner.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/jquery.multiselect.js"></script> 
<script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenupro/ddaccordion.js"></script> 
<link rel="stylesheet" href="components/com_swmenupro/css/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="components/com_swmenupro/css/jquery.multiselect.css" type="text/css" />	
<link rel="stylesheet" href="components/com_swmenupro/css/swmenupro.css" type="text/css" />
<div class="swmenu_container" >

<form enctype="multipart/form-data" action="index.php" method="POST" id="adminForm" name="adminForm"> 
<table  class="sw_inner_container_header"  border="0" >
  <tr>
   <td ><img src="components/com_swmenupro/images/swmenupro_logo_small.png" align="left" border="0"/></td>
  
   </tr>
</table>

<div style="clear:both;"></div>

 
<table class="sw_inner_container" cellpadding="0" cellspacing="0" border="0" width="750" >
<tr><td width="520" valign="top">
 
  <table cellpadding="2" cellspacing="0" border="0" width="99%" align="left"> 
     <tr><td colspan="7" class="swmenu_tabheading"># <?php echo _SW_MENU_MODULES; ?></td> 
      </tr>
      <?php
      if(!file_exists($absolute_path."/modules/mod_swmenupro/mod_swmenupro.php")){
      	echo "<tr><td><b>"._SW_NO_MODULE_NOTICE."</td></tr></b>";
      }else if(!count($rows)){
      	echo "<tr><td><b>"._SW_MAKE_MODULE_NOTICE."</td></tr></b>";
      }
      $k = 0;
      for ($i=0, $n=count($rows); $i < $n; $i++)
      {
      $row = &$rows[$i];
      
	?> 
      <tr class="swmenu_row<?PHP echo $k; ?>"> 
        <td width="10"><?php echo $i+$pageNav->limitstart+1;?></td>
        <td  width="10"><input type="checkbox" id="cb<?PHP echo $i; ?>" name="cid[]" value="<?PHP echo $row->id; ?>"  /></td> 
        <td width="160"><div align="left"> <a href="#edit" onmouseover="this.T_WIDTH=180;return escape('<?php echo sprintf( _SW_MODULE_TIP, $row->menustyle,$row->menutype,$row->position2,$row->groupname,$row->published?_SW_YES:_SW_NO); ?><br /><b>ID:</b> <?php echo $row->id; ?>')" onclick="doModuleEdit('<?php echo $row->id; ?>')"><?PHP echo $row->title; ?></a></div></td> 
        <td align="right">
        <?PHP 
        echo "<a href=\"javascript: void(0);\" class=\"swmenu_button_edit\" onmouseover=\"return escape('".sprintf (_SW_EDIT_MODULE_TIP,addslashes($row->title))."')\" onclick=\"doModuleEdit('".$row->id."')\">"._SW_EDIT_BUTTON."</a></td><td>\n";

        if(file_exists($absolute_path."/modules/mod_swmenupro/styles/menu".$row->id.".css")){
        	echo "<a href=\"javascript: void(0);\" class=\"swmenu_button_editCSS\" onmouseover=\"this.T_WIDTH=120;return escape('".sprintf (_SW_EDIT_CSS_TIP,addslashes($row->title))."')\" onclick=\"doEditCSS('".$row->id."')\">"._SW_EDITCSS_BUTTON."</a></td><td>";

        }else{
        	echo "<a href=\"javascript: void(0);\" class=\"swmenu_button_export\" onmouseover=\"this.T_WIDTH=120;return escape('".sprintf (_SW_EXPORT_MODULE_TIP,addslashes($row->title))."')\" onclick=\"doExportMenu('".$row->id."')\">"._SW_EXPORT_BUTTON."</a></td><td>";
        }
        // echo "<a href=\"javascript: void(0);\" class=\"swmenu_button_images\" onmouseover=\"return escape('".sprintf (_SW_EDIT_IMAGES_TIP,addslashes($row->title))."')\" onclick=\"return listItemTask('cb".$i."','editImages')\">"._SW_IMAGES_BUTTON."</a></td><td>\n";
        echo "<a href=\"javascript: void(0);\" class=\"swmenu_button_preview\" onmouseover=\"return escape('".sprintf (_SW_PREVIEW_MODULE_TIP,addslashes($row->title))."')\" onclick=\"doPreviewWindow('".$row->id."')\">"._SW_PREVIEW_BUTTON."</a></td><td>\n";
        echo "<a href=\"javascript: void(0);\" class=\"swmenu_button_delete\" onmouseover=\"return escape('".sprintf (_SW_DELETE_MODULE_TIP,addslashes($row->title))."')\" onclick=\"moduledelete('".$row->title."','".$row->id."')\">"._SW_DELETE_BUTTON."</a>\n";
     	?> 
		</td> 
      </tr> 
      <?PHP 
      $k = 1 - $k;
      }
?> 
<tr> <td colspan="7"> <table cellpadding="0" width="100%" cellspacing="0"  border="0"><tr>
       <?php
      
      if(substr(JVERSION,0,1)==3){
      echo "<td class=\"swmenu_pagination\"  >\n";
      echo "Display#".$pageNav->getLimitBox(); 
      echo "</td>\n";
        echo "<td class=\"swmenu_pagination\"   >\n";
      echo $pageNav->getListFooter(); 
      echo "</td>\n";
        echo "<td class=\"swmenu_pagination\"   >\n";
      echo $pageNav->getPagesCounter(); 
      echo "</td>\n";
      }else{
          
        echo "<td class=\"swmenu_pagination\"   >\n";
      echo $pageNav->getListFooter(); 
      echo "</td>\n";   
      }
      ?>
      
      
            </tr></table>
      </td> 
 </tr> 
     
    </table> 
    </td><td width="230" valign="top">
         <div class="image_box2" style="margin-top:-3px;" ><a href="javascript:void(0);"><img src="components/com_swmenupro/images/plus.gif" align="left" /><?php echo _SW_CREATE_MODULE; ?></a></div>
<div  class="image_section2" >
     <table cellpadding="0" width="100%" cellspacing="0" class="swmenu_table_new_module" border="0">
    <tr><td colspan="2" align="center"><br /><input class="ui-multiselect ui-widget ui-state-default ui-corner-all" type="text" size="1" style="width:210px;" id="new_title" name="new_title" value="Please Enter Module Title.."  /></td></tr>
   <tr><td colspan="2" align="center"><br />
  
   <?php echo $lists['menutype']; ?>
   <br />
  </td></tr><tr><td style="padding-left:24px;padding-top:0px;" ><br /><input type="radio" id="default" name="action2" value="new" onClick="document.getElementById('indexsite2').style.display='none';" checked></td><td><br /> <label for="default"><?php echo _SW_USE_DEFAULT_MODULE; ?></label>
</td></tr><tr><td style="padding-left:24px;padding-bottom:0px;" ><input type="radio" name="action2" value="index" onClick="document.getElementById('indexsite2').style.display='block';" id="copy"></td><td> <label for="copy"><?php echo _SW_COPY_MODULE; ?></label>
 </td></tr><tr><td colspan="2" align="center" >
<table align="center" id="indexsite2" style="display:none;width:100%;">
<tr><td colspan="2" align="center" width="100%">

<?php echo $lists['menustyle']; ?>
</td></tr><tr>
<td style="padding-left:24px;padding-bottom:0px;">
<input type="checkbox" id="copyCSS" name="copyCSS" checked></td> <td><label for="copyCSS">
<?php echo _SW_COPY_IMAGES; ?></label>
</td></tr></table>
</td>
</tr>
<tr><td colspan="2" align="center"><a href="javascript:void(0);" onmouseover="return escape('<?php echo _SW_CREATE_MENU_TIP; ?>')" class="swmenu_button_wide_create" onclick="newstyle();" /><?php echo _SW_CREATE_BUTTON; ?></a>

</td></tr></table></div>
        
       
        
        <div class="image_box2" ><a href="javascript:void(0);"><img src="components/com_swmenupro/images/plus.gif" align="left" /><?php echo "Export Styles" ; ?></a></div>
<div  class="image_section2" align="center" >
    <?php echo $lists['ex_list']; ?>
   <a href="javascript:void(0);" class="swmenu_button_wide_preview" onclick="doStyleExport();" ><?php echo "Export Styles"; ?></a><br />
</div>
  <div class="image_box2" ><a href="javascript:void(0);"><img src="components/com_swmenupro/images/plus.gif" align="left" /><?php echo "Import Styles" ; ?></a></div>
<div  class="image_section2" >
   <input class="ui-multiselect ui-widget ui-state-default ui-corner-all" name="userfile" type="file" size="26"/>
	<a href="javascript:void(0);" class="swmenu_button_wide_preview" onclick="doStyleImport();" ><?php echo "Import Styles"; ?></a><br />
</div>
     <div class="image_box2" ><a href="index.php?option=com_swmenupro&task=upgrade" ><?php echo _SW_UPGRADE_LINK; ?></a></div>   
        
        
        
        

   
 </td></tr></table>  
<input type="hidden" name="option" value="com_swmenupro" />
<input type="hidden" name="task" value="showmodules" />
<input type="hidden" name="preview" value="manager" /> 
<input type="hidden" name="copymenu" value="0" /> 
<input type="hidden" name="newmenu" value="0" /> 
<input type="hidden" name="boxchecked" value="0" /> 
<input type="hidden" name="id" value="0" /> 
<input type="hidden" name="tmpl" id="tmpl" value="index" />
<input type="hidden" name="format" id="format" value="html" />
<input type="hidden" name="ex_checked" id="ex_checked" value="" />
<input type="hidden" name="no_html" id="no_html" value="0" />
</form>
</div>
<br />
<div style="clear:both;"></div>

<script type="text/javascript"> 
<!--
jQuery("#ex_list").multiselect({
      noneSelectedText: 'Select Menu Styles'
 
});
jQuery("#ex_list").multiselect('uncheckAll');
jQuery("#menustyle").multiselect({
    height:360,
      noneSelectedText: 'Select Menu System',
      multiple:false,
      selectedList:1,
      header:false
 
});

jQuery("#menustyle").multiselect('uncheckAll');

//alert(jQuery("#menustyle").val());
document.getElementById('menustyle').value="-999";

jQuery("#menu_id").multiselect({
      noneSelectedText: 'Select Menu Module',
      multiple:false,
      selectedList:1,
      header:false
 
});
jQuery("#menu_id").multiselect('uncheckAll');

 jQuery("div#successful").corner();
setTimeout(function(){
  
jQuery("div#successful").fadeOut("slow", function () {
jQuery("div#successful").remove();
});

}, 3000);
  jQuery('.swmenu_button_wide_create').corner();
   jQuery('.swmenu_button_wide_preview').corner();
jQuery('.sw_manual_button').corner();
jQuery('.sw_inner_container_header').corner('tl tr');
//jQuery.noConflict();

-->
</script> 
<script type="text/javascript" src="components/com_swmenupro/js/wz_tooltip.js"></script> 
<script type="text/javascript">
<!--
/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

ddaccordion.init({
headerclass: 'image_box2',
contentclass: 'image_section2',
revealtype:'click',
mouseoverdelay: 50,
collapseprev: true, 
defaultexpanded: [0],
onemustopen: true,
animatedefault: false,
persiststate: false,
toggleclass: ['','activeitem'],
togglehtml: ["src", "components/com_swmenupro/images/plus.gif", "components/com_swmenupro/images/minus.gif"],
animatespeed:'normal',
oninit:function(headers, expandedindices){ },
onopenclose:function(header, index, state, isuseractivated){ }
})

jQuery('#images_properties').corner();

//-->
</script>
<?php
	}


	function footer()
	{
	?> 
	<br clear="all" />
    <table cellpadding="4" cellspacing="0" border="0" align="center" width="100%"> 
      <tr> 
        <td width="100%" align="center">
		<a href="http://www.swmenupro.com" target="_blank">	
		<img src="components/com_swmenupro/images/swmenupro_logo_small.png" width="120" height="20" alt="swmenupro.com" border="0"/>
		</a><br/> swMenuPro &copy;2004-2012 by Sean White<br />
		 <a href="http://www.swmenupro.com" target="_blank">http://www.swmenupro.com</a>
		</td> 
        </tr> 
    </table> 
   
  <?php
	}
        
        
        
        function accordTransPreview()
	{
	?> 
	  <div id="preview_div"> 
<table align="center" width="100%" border="0" cellpadding="10" cellspacing="0"><tr><td align="center">
<table border="0" cellpadding="0" cellspacing="0"><tr><td >
<div id="top_preview_parent" ><div  id="top_preview_outer">
<div  class="top_preview_item"><a class="top_preview normal" id="top_preview_normal"><?php echo _SW_TOP_MENU_ITEM; ?></a></div>
<div  class="top_preview_item"><a class="top_preview" id="top_preview_hover"><?php echo _SW_TOP_MENU_ITEM." "._SW_HOVER; ?></a></div>

<div id="sub_preview_parent" ><div  id="sub_preview_outer">
        <div><a class="sub_preview level1 normal first" id="sub_preview1"  ><?php echo _SW_SUB_MENU_ITEM; ?></a></div>
<div><a class="sub_preview level1 hover" id="sub_preview2"><?php echo _SW_SUB_MENU_ITEM." "._SW_HOVER; ?></a></div>
<div><a class="sub_preview level1 active" id="sub_preview3"><?php echo _SW_SUB_MENU_ITEM." Active"; ?></a></div>
<div><a class="sub_preview level1 normal last" id="sub_preview4"><?php echo _SW_SUB_MENU_ITEM; ?></a></div>
</div></div>

<div  class="top_preview_item"><a class="top_preview" id="top_preview_active"><?php echo _SW_TOP_MENU_ITEM." "._SW_ACTIVE; ?></a></div>
<div  class="top_preview_item"><a class="top_preview last normal" id="top_preview_normal2"><?php echo _SW_TOP_MENU_ITEM; ?></a></div>
</div></div></td></tr></table>
</td><td  align="center">

              <table align="center" border="0" cellpadding="0" cellspacing="0"><tr><td>
<div  id="levelx_preview_parent"><div  id="levelx_preview_outer">
       <table border="0" cellpadding="0" cellspacing="0"><tr><td valign="top">
                   <div><a class="sub_preview levelx normal first" id="sub_preview5"><?php echo "LevelX Sub Item"; ?></a> </div>
 <div><a class="sub_preview levelx normal" id="sub_preview6"><?php echo "LevelX Sub Item"; ?></a> </div>
 <div><a class="sub_preview levelx hover" id="sub_preview7"><?php echo "LevelX Sub Item Hover"; ?></a> </div>
 <div><a class="sub_preview levelx normal last" id="sub_preview8"><?php echo "LevelX Sub Item"; ?></a> </div>
</td>

            </tr></table></div></div></td></tr></table></td></tr></table>


                    </div>
               
  <?php
	}
        
        
        
         function multiTabPreview()
	{
	?> 
	  <div id="preview_div"> 


<div id="top_preview_parent" ><div  id="top_preview_outer">
<table  border="0" cellpadding="0" cellspacing="0"><tr><td>
<a class="top_preview normal" id="top_preview_normal"><?php echo _SW_TOP_MENU_ITEM; ?></a></td>
<td><a class="top_preview" id="top_preview_hover"><?php echo _SW_TOP_MENU_ITEM." "._SW_HOVER; ?></a></td>
<td><a class="top_preview" id="top_preview_active"><?php echo _SW_TOP_MENU_ITEM." "._SW_ACTIVE; ?></a></td>
<td><a class="top_preview last normal" id="top_preview_normal2"><?php echo _SW_TOP_MENU_ITEM; ?></a>
</td></tr></table>
</div></div>
              
             
<div id="sub_preview_parent" ><div  id="sub_preview_outer">
         <table  border="0" cellpadding="0" cellspacing="0"><tr><td>
<a class="sub_preview level1 normal first" id="sub_preview1"  ><?php echo _SW_SUB_MENU_ITEM; ?></a></td>
<td><a class="sub_preview level1 hover" id="sub_preview2"><?php echo _SW_SUB_MENU_ITEM." "._SW_HOVER; ?></a></td>
<td><a class="sub_preview level1 active" id="sub_preview3"><?php echo _SW_SUB_MENU_ITEM." Active"; ?></a></td>
<td><a class="sub_preview level1 normal last" id="sub_preview4"><?php echo _SW_SUB_MENU_ITEM; ?></a></td>
             </tr></table>
</div></div>





              <table align="center" border="0" cellpadding="0" cellspacing="0"><tr><td>
<div  id="levelx_preview_parent"><div  id="levelx_preview_outer">
       <table border="0" cellpadding="0" cellspacing="0"><tr><td valign="top">
                   <div><a class="sub_preview levelx normal first" id="sub_preview5"><?php echo "LevelX Sub Item"; ?></a> </div>
 <div><a class="sub_preview levelx normal" id="sub_preview6"><?php echo "LevelX Sub Item"; ?></a> </div>
 <div><a class="sub_preview levelx hover" id="sub_preview7"><?php echo "LevelX Sub Item Hover"; ?></a> </div>
 <div><a class="sub_preview levelx normal last" id="sub_preview8"><?php echo "LevelX Sub Item"; ?></a> </div>
</td>

            </tr></table></div></div></td></tr></table>


                    </div>
               
  <?php
	}
        
        
         function columnPreview()
	{
	?> 
	  <div id="preview_div"> 


<div id="top_preview_parent" ><div  id="top_preview_outer">
<table  border="0" cellpadding="0" cellspacing="0"><tr><td>
<a class="top_preview normal" id="top_preview_normal"><?php echo _SW_TOP_MENU_ITEM; ?></a></td>
<td><a class="top_preview" id="top_preview_hover"><?php echo _SW_TOP_MENU_ITEM." "._SW_HOVER; ?></a></td>
<td><a class="top_preview" id="top_preview_active"><?php echo _SW_TOP_MENU_ITEM." "._SW_ACTIVE; ?></a></td>
<td><a class="top_preview last normal" id="top_preview_normal2"><?php echo _SW_TOP_MENU_ITEM; ?></a>
</td></tr></table>
</div></div>
              
             
<div id="sub_preview_parent" ><div  id="sub_preview_outer">
         <table  border="0" cellpadding="0" cellspacing="0"><tr><td>
<a class="sub_preview level1 normal first" id="sub_preview1"  ><?php echo _SW_SUB_MENU_ITEM; ?></a></td>
<td><a class="sub_preview level1 hover" id="sub_preview2"><?php echo _SW_SUB_MENU_ITEM." "._SW_HOVER; ?></a></td>
<td><a class="sub_preview level1 active" id="sub_preview3"><?php echo _SW_SUB_MENU_ITEM." Active"; ?></a></td>
<td><a class="sub_preview level1 normal last" id="sub_preview4"><?php echo _SW_SUB_MENU_ITEM; ?></a></td>
             </tr></table>
</div></div>





              <table align="center" border="0" cellpadding="0" cellspacing="0"><tr><td>
<div  id="levelx_preview_parent"><div  id="levelx_preview_outer">
       <table border="0" cellpadding="0" cellspacing="0"><tr><td valign="top">
                   <div><a class="sub_preview levelx normal first" id="sub_preview5"><?php echo "LevelX Sub Item"; ?></a> </div>
 <div><a class="sub_preview levelx normal" id="sub_preview6"><?php echo "LevelX Sub Item"; ?></a> </div>
 <div><a class="sub_preview levelx hover" id="sub_preview7"><?php echo "LevelX Sub Item Hover"; ?></a> </div>
 <div><a class="sub_preview levelx normal last" id="sub_preview8"><?php echo "LevelX Sub Item"; ?></a> </div>
</td>

            </tr></table></div></div></td></tr></table>


                    </div>
               
  <?php
	}

function upgradeForm( $row,$lists) {
	
	$absolute_path=JPATH_ROOT;
	$live_site = JURI::root(); 
?>
      
        <script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenufree/jquery-1.6.min.js"></script>
        <script type="text/javascript" src="<?php echo $live_site; ?>/modules/mod_swmenufree/jquery.corner.js"></script>
<script language="javascript" type="text/javascript">
	function uploadUpgrade() {
		var form = document.filename;
			// do field validation
			if (form.userfile.value == ""){
				alert( "<?php echo _SW_UPLOAD_FILE_NOTICE; ?>" );
			} else {
				form.task.value="uploadfile";
				form.submit();
			}
	}
        
        function uploadCufon() {
                var form = document.filename;
                // do field validation
                if (form.cufonfile.value == ""){
                    alert( "Not a valid font file" );
                } else {
                    form.task.value="upload_ttf";
                    form.submit();
                }
            }
	
	function uploadLanguage() {
		var form = document.filename;
			// do field validation
			if (form.languagefile.value == ""){
				alert( "<?php echo _SW_UPLOAD_FILE_NOTICE; ?>" );
			} else {
				form.task.value="uploadlanguage";
				form.submit();
			}
	}
	
	function changeLanguage() {
		var form = document.filename;
			form.task.value="changelanguage";
				form.submit();
			
	}
</script>
<link rel="stylesheet" type="text/css" href="components/com_swmenupro/css/swmenupro.css" />
	<div class="swmenu_container" >
	<form enctype="multipart/form-data" action="index.php" method="post" name="filename">
	<table  class="sw_inner_container_header"  border="0" >
  <tr>
   <td ><img src="components/com_swmenupro/images/swmenupro_logo_small.png" align="left" border="0"/></td>
     <td valign="bottom"><span class="swmenu_sectionname"><?php echo _SW_UPGRADE_FACILITY; ?></span> </td>
     <td valign="top" >
 
 <a class="sw_manual_button" href="index.php?option=com_swmenupro&task=showmodules" ><img src="components/com_swmenupro/images/gtk_refresh.png" align="absmiddle" ><?php echo _SW_RETURN_MANAGER_LINK; ?></a>
 
 </td>
     
   </tr>
</table>
<div class="swmenu_tabheading" style="width:750px;margin:auto;" align="center">&nbsp;</div>

<table  align="center" cellpadding="0" cellspacing="0" border="0" width="750">
  <tr><td width="50%" valign="top">

<table width="100%"><tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td colspan="2" class="swmenu_tabheading" ><?php echo _SW_UPGRADE_VERSIONS; ?></td></tr>  
<tr class="swmenu_menubackgr">
	<td><?php echo _SW_COMPONENT_VERSION; ?>:</td><td> <?php echo $row->component_version;?></td>
  </tr><tr>
	<td><?php echo _SW_MODULE_VERSION; ?>: </td><td><?php echo $row->module_version;?></td>
  </tr>
</table>

</td></tr><tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td  class="swmenu_tabheading" ><?php echo _SW_SELECTED_LANGUAGE_HEADING; ?></td></tr>  
<tr class="swmenu_menubackgr">
	<td><?php echo _SW_LANGUAGE_FILES; ?>:</td>
  </tr><tr>
	<td><?php echo $lists['langfiles'];?>
  <input class="button" type="button" onclick="changeLanguage();" value="<?php echo _SW_LANGUAGE_CHANGE_BUTTON; ?>" /></td>
  </td>
  </tr>
</table>

</td></tr>
<!--
<tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td  class="swmenu_tabheading" ><?php echo _SW_UPLOAD_LANGUAGE_HEADING; ?></td></tr>  
<tr class="swmenu_menubackgr">
	<td><input class="text_area" name="languagefile" type="file" size="50"/>
	<input class="button" type="button" onclick="uploadLanguage();" value="<?php echo _SW_LANGUAGE_UPLOAD_BUTTON; ?>" /></td>
  </tr>
</table>

</td></tr>
-->
<tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td  class="swmenu_tabheading" ><?php echo _SW_UPLOAD_UPGRADE; ?></td></tr>  
<tr class="swmenu_menubackgr">
	<td><input class="text_area" name="userfile" type="file" size="50"/>
	<input class="button" type="button" onclick="uploadUpgrade();" value="<?php echo _SW_UPLOAD_UPGRADE_BUTTON;?>" /></td>
  </tr>
</table>

</td></tr>


</table>

</td><td width="50%" valign="top">

<table width="100%" align="right"><tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td class="swmenu_tabheading" ><?php echo _SW_MESSAGES;?></td></tr>  
<tr>
	<td><?php echo @$row->message?$row->message:_SW_OK;?></td>
  </tr>
</table>

</td></tr><tr><td>
<table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
<tr><td  class="swmenu_tabheading" ><?php echo _SW_FILE_PERMISSIONS; ?></td></tr>  
<tr>
	<td>
	 <table align="center">
	  <tr>
		  <td>/media</td><td><?php echo is_writable($absolute_path."/media") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
		<td>/modules</td><td><?php echo is_writable($absolute_path."/modules") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
	    <td>/modules/mod_swmenupro</td><td><?php echo is_writable($absolute_path."/modules/mod_swmenupro") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
	    <td>/modules/mod_swmenupro/images</td><td><?php echo is_writable($absolute_path."/modules/mod_swmenupro/images") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
	    <td>/modules/mod_swmenupro/styles</td><td><?php echo is_writable($absolute_path."/modules/mod_swmenupro/styles") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
      </tr><tr>
		<td>/components/com_swmenupro</td><td><?php echo is_writable($absolute_path."/components/com_swmenupro") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?></td>
	  </tr><tr>
		<td>/administrator/components/com_swmenupro</td><td><?php echo is_writable($absolute_path."/administrator/components/com_swmenupro") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?>
	  </td></tr>
	  <tr>
		<td>/administrator/components/com_swmenupro/language</td><td><?php echo is_writable($absolute_path."/administrator/components/com_swmenupro/language") ? '<font color="green">'._SW_WRITABLE.'</font>' : '<font color="red">'._SW_UNWRITABLE.'</font>' ?>
	  </td></tr>
	</table>
	</td>
  </tr>
</table>

</td></tr></table>

</td></tr></table>



<input type="hidden" name="task" value="uploadfile"/>
<input type="hidden" name="option" value="com_swmenupro"/>
<script type="text/javascript"> 
<!--

//jQuery('#toolbar-box').remove();
//jQuery('.sw_inner_container').dropShadow();
//jQuery('.sw_inner_container_header').dropShadow();
//jQuery('.pagetext').dropShadow();
//jQuery('.swmenu_container').corner();
jQuery('.sw_manual_button').corner();
jQuery('.sw_inner_container_header').corner('tl tr');
jQuery.noConflict();

-->
</script> 
</form>
</div>
		<?php
	}


function uploadCufon( ) {
	
?>
      
       
<script language="javascript" type="text/javascript">
	
        
        function uploadCufon() {
                var form = document.filename;
                // do field validation
                if (form.cufonfile.value == ""){
                    alert( "Not a valid font file" );
                } else {
                    form.task.value="upload_ttf";
                   // window.parent.jInsertCufon(form.cufonfile);
                    form.submit();
                }
            }
	
	
</script>
<link rel="stylesheet" type="text/css" href="components/com_swmenupro/css/swmenupro.css" />
	<div class="swmenu_container" >
	<form enctype="multipart/form-data" action="index.php" method="post" name="filename">
	


                                        <table cellpadding="4" align="left" cellspacing="4" style="border:1px solid #ccc;margin-top:4px;" width="100%">
                                            <tr><td  class="swmenu_tabheading" ><?php echo _SW_UPLOAD_TTF; ?></td></tr>
                                            <tr class="swmenu_menubackgr">
                                                <td><input class="text_area" name="cufonfile" type="file" size="50"/>
                                                    <input class="button" type="button" onclick="uploadCufon();" value="<?php echo _SW_UPLOAD_UPGRADE_BUTTON; ?>" /></td>
                                            </tr>
                                        </table>

              



<input type="hidden" name="task" value="upload_ttf"/>
<input type="hidden" name="tmpl" value="component"/>
<input type="hidden" name="option" value="com_swmenupro"/>

</form>
</div>
		<?php
	}

}
?>
