<?php
/**
* swmenupro v5.0
* http://swonline.biz
* Copyright 2006 Sean White
**/

//error_reporting (E_ERROR | E_WARNING | E_PARSE | E_NOTICE); 
defined('_JEXEC') or die('Restricted access');

$database = &JFactory::getDBO();
$absolute_path=JPATH_ROOT;
require_once($absolute_path ."/modules/mod_swmenupro/styles.php");
require_once($absolute_path ."/modules/mod_swmenupro/functions.php");

$swmenufree=array();

reset($_POST);
while (list ($key, $val) = each($_POST)) {
    if ($val)
        $$key = $val;
    $swmenupro[$key] = $val;
}

//echo $swmenupro['preview'].$id." preview";
if ($swmenupro['preview'] == "manual") {
    // $cid = ( JRequest::getVar('cid', 0));
  //  $id = ( JRequest::getVar('id', $cid[0]));
   $sql="SELECT * FROM #__swmenupro_styles where moduleid=".$id;
	$database->setQuery($sql);
	$swmenupro_obj=$database->loadObject();
        $temp_array = sw_stringToObject($swmenupro_obj->params);
   
while (list ($key, $val) = each($temp_array)) {
    $$key = $val;
    $swmenupro[$key] = $val;
}
  $swmenupro['preview']="manual"; 
}
if ($swmenupro['preview'] == "manager") {
     $cid = ( JRequest::getVar('cid', 0));
    $id = ( JRequest::getVar('id', $cid[0]));
  //  echo $id;
   $sql="SELECT * FROM #__swmenupro_styles where moduleid=".$id;
	$database->setQuery($sql);
	$swmenupro_obj=$database->loadObject();
        $temp_array = sw_stringToObject($swmenupro_obj->params);
   
while (list ($key, $val) = each($temp_array)) {
    $$key = $val;
    $swmenupro[$key] = $val;
}
  $swmenupro['preview']="manager"; 
 // $images_preview=0;
} 
//echo $menustyle;
if($menutype && $id && $menustyle){

$content= "\n<!--SWmenuPro6.2 ".$menustyle." by http://www.swmenupro.com-->\n";   

if($menutype && $id && $menustyle){
   // echo $parent_id;
	 if(($menutype=="virtuemart2"||$menutype=="virtueprod2")){$parent_temp=0;}else{$parent_temp=1;}
    //if(($menu=="virtuemart"||$menu=="virtueprod")&&$parent_id==1){$parent_id=0;}
    
	 $final_menu =array();
	 $swmenupro_array=swGetMenuLinks($menutype,$id,$swmenupro['hybrid'],1);
	 $ordered = chain('ID', 'PARENT', 'ORDER', $swmenupro_array, $parent_temp, $swmenupro['levels']);
	 $images_preview = JRequest::getVar( 'images_preview', 0 );
	
	//  $out = JRequest::getVar( 'php_out', '' );
	 
	 if ($images_preview){
    		
			 $final_menu =array();
	 
	 //echo "out:".$swmenupro['php_out'];
	 
	 
	 $data3=explode("}}",$swmenupro['php_out']);
	 
	 foreach ($data3 as $dat){
		
		$data4=explode("~~",$dat);
		
		if(@$data4[3]){
		$temp_id=explode("-", $data4[0]);
		$id=@$temp_id[1]?$temp_id[1]:0;
		$temp_id=explode("-", $data4[1]);
		$parent=@$temp_id[1]?$temp_id[1]:0;
		
		$name=$data4[3];
		$browserNav=$data4[6];
		//$order=$data4[7];
		
		$link=$data4[4];
		
		$ordering=($data4[7]+1);
		if(($data4[8]!="")){
			$image=substr($data4[8],3).",".$data4[10].",".$data4[11].",".$data4[12].",".$data4[13];
		}else{

			$image="";
		}
		$showname=$data4[18];
		$showitem=$data4[22];
		$imagealign=$data4[19];
		
		$ncss=($data4[20]=="undefined")?"":$data4[20];
		$ocss=($data4[21]=="undefined")?"":$data4[21];
                $custom_html=($data4[24]=="undefined")?"":urldecode($data4[24]);
		$html_position=($data4[25]=="undefined")?"":$data4[25];
		if(($data4[9]!="")){
			$imageover=substr($data4[9],3).",".$data4[14].",".$data4[15].",".$data4[16].",".$data4[17];
		}else{
			$imageover="";

		}
           
              if($showitem) { 
            	$final_menu[] =array("TITLE" => $name, "URL" =>  'javascript:void(0);' , "ID" => $id  , "PARENT" => $parent ,  "ORDER" => $ordering, "IMAGE" => $image, "IMAGEOVER" => $imageover, "SHOWNAME" => $showname, "IMAGEALIGN" => $imagealign, "TARGETLEVEL" => 0, "TARGET" => 0,"ACCESS" => '1',"NCSS" => $ncss,"OCSS" => $ocss,"SHOWITEM" => $showitem , "HTML" => $custom_html,"HTML_POSITION" => $html_position    );
              }
		}}
       
    }else{
    	
    	 for($i=0;$i<count($ordered);$i++){
            	$swmenu=$ordered[$i];
            	$swmenu['URL'] = "javascript:void(0);";
            	if($swmenu['SHOWITEM']==null || $swmenu['SHOWITEM']==1 ){
				$swmenu['SHOWITEM']=1;
				}else{
				$swmenu['SHOWITEM']=0;
				}
				if($swmenu['SHOWITEM']) { 
            		$final_menu[] =array("TITLE" => $swmenu['TITLE'], "URL" =>  'javascript:void(0);' , "ID" => $swmenu['ID']  , "PARENT" => $swmenu['PARENT'] ,  "ORDER" => $swmenu['ORDER'], "IMAGE" => $swmenu['IMAGE'], "IMAGEOVER" => $swmenu['IMAGEOVER'], "SHOWNAME" => $swmenu['SHOWNAME'], "IMAGEALIGN" => $swmenu['IMAGEALIGN'], "TARGETLEVEL" => $swmenu['TARGETLEVEL'], "TARGET" => 0,"ACCESS" => $swmenu['ACCESS'],"NCSS" => $swmenu['NCSS'],"OCSS" => $swmenu['OCSS'],"SHOWITEM" => $swmenu['SHOWITEM'] , "HTML" => $swmenu['HTML'],"HTML_POSITION" => $swmenu['HTML_POSITION']  );
             	}
    	 }
    }

	if(count($final_menu)){
          if ($menustyle == "popoutmenu"){
	$swmenupro['position']="relative";
          }else{
          //  $swmenupro['position']="center";  
          }
	//echo previewHead(@$preview_background);
	
	
	
	
	
	echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/jquery-1.6.min.js\"></script>\n";
//	echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/jquery.colorbox.js\"></script>\n";
	
	  echo "<link type=\"text/css\" href=\"../modules/mod_swmenupro/jquery.tooltip.css\" rel=\"stylesheet\" />\n";
              echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/jquery.tooltip.js\"></script>\n";
	
			echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/jquery.corner.js\"></script>\n";
			
		echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/curvycorners.src.js\"></script>\n";
	
	if(@$swmenupro['top_ttf']){
	
		echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/cufon-yui.js\"></script>\n";
		
	echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/fonts/".$swmenupro['top_ttf']."\"></script>\n";
	}
	
	if(@$swmenupro['sub_ttf']){
		
	
	
	if(!$swmenupro['top_ttf']){
	echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/cufon-yui.js\"></script>\n";
	}
		
	echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/fonts/".$swmenupro['sub_ttf']."\"></script>\n";
	}
	
	
	
	
	
	$swmenupro['position']="center";
	
	if($preview){
		$ordered = chain('ID', 'PARENT', 'ORDER', $final_menu, $swmenupro['parentid'], $swmenupro['levels']);
	}else{
		//$ordered = chain('ID', 'PARENT', 'ORDER', $final_menu, 0, $swmenupro['levels']);
	}
       // echo count($ordered).$menustyle;
		if ($menustyle == "accordtransmenu"){$content.= doAccordTransMenuPreview($ordered, $swmenupro);}
		if ($menustyle == "multitabmenu"){$content.= doMultiTabMenuPreview($ordered, $swmenupro);}
		
		if ($menustyle == "accordian"){$content.= doAccordianPreview($ordered, $swmenupro);}
		
		if ($menustyle == "treemenu"){$content.= doTreeMenuPreview($ordered, $swmenupro);}
                if ($menustyle == "treeview"){$content.= domygosuTreeMenuPreview($ordered, $swmenupro);}
		if ($menustyle == "gosumenu" ){$content.= doGosuMenuPreview($ordered, $swmenupro);}
		if ($menustyle == "superfishmenu" ){$content.= dosuperFishMenuPreview($ordered, $swmenupro);}
		if ($menustyle == "transmenu"){$content.= doTransMenuPreview($ordered, $swmenupro);}
		if ($menustyle == "columnmenu"){$content.= doColumnMenuPreview($ordered, $swmenupro);}
	}
}

$content.="\n<!--End SWmenuPro menu module-->\n";

}




function doAccordTransMenuPreview($ordered, $swmenupro){

//echo previewHead();
echo '<script type="text/javascript" src="../modules/mod_swmenupro/ddaccordion.js"></script>';
echo '<script type="text/javascript" src="../modules/mod_swmenupro/transmenu_Packed.js"></script>';
if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";

}else{

//if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$padding_hack){$swmenupro = fixPadding($swmenupro);}
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo AccordTransMenuStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";
}
echo "<div align='center' >";
echo AccordTransMenu($ordered, $swmenupro);
echo swmenu_gettooltip($ordered);
echo "</div>";
}


function doMultiTabMenuPreview($ordered, $swmenupro){

echo '<script type="text/javascript" src="../modules/mod_swmenupro/DropDownMenuX2.js"></script>';




if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";

}else{


echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo multiTabMenuStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";
}
//echo "</head><body>";
echo MultiTabMenu($ordered, $swmenupro);
echo swmenu_gettooltip($ordered);
//echo "</body></html>";
}

function doAccordianPreview($ordered, $swmenupro){


echo '<script type="text/javascript" src="../modules/mod_swmenupro/ddaccordion.js"></script>';

if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";

}else{

//if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo AccordianStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";
}
//echo "</head><body>";
if($swmenupro['orientation']!="vertical"){
//	echo "<div align='left'>";
}else{
//	echo "<div align='center'>";
}
echo Accordian($ordered, $swmenupro);
//echo "</div>".changeBgColor();
echo swmenu_gettooltip($ordered);
//echo "</body></html>";
}

function doTreeMenuPreview($ordered, $swmenupro){

//echo previewHead();
echo '<script type="text/javascript" src="../modules/mod_swmenupro/dtree.js"></script>';

if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";

}else{

echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo TreeMenuStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";
}
//echo "</head><body>";
echo TreeMenu($ordered, $swmenupro);
echo swmenu_gettooltip($ordered);
//echo "</body></html>";
}


function domygosuTreeMenuPreview($ordered, $swmenupro){

//echo previewHead();
echo '<script type="text/javascript" src="../modules/mod_swmenupro/jquery.treeview.js"></script>';
if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";


}else{
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo mygosuTreeMenuStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";
}
//echo "</head><body>";
echo mygosuTreeMenu($ordered, $swmenupro);
echo swmenu_gettooltip($ordered);
//echo "</body></html>";
}

function doSuperfishMenuPreview($ordered, $swmenupro){
	//echo previewHead();
	//echo '<script type="text/javascript" src="../modules/mod_swmenupro/jquery.dropshadow.js"></script>';
	//	echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/jquery-1.2.6.pack.js\"></script>\n";
		echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/hoverIntent.js\"></script>\n";
		echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/superfish.js\"></script>\n";
		echo "<script type=\"text/javascript\" src=\"../modules/mod_swmenupro/supersubs.js\"></script>\n";
		
		
	if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";

}else{
if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo superfishMenuStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";
}
//echo "</head><body>";
	if (($swmenupro['main_width']==0) && ($swmenupro['orientation']=="vertical")){
echo "<div align=\"center\" style=\"margin:auto;width:200px;\" >";
}else{
echo "<div align=\"center\" style=\"margin:auto;\" >";	
}
echo SuperfishMenu($ordered, $swmenupro);
echo "</div>";
echo swmenu_gettooltip($ordered);
//echo "</body></html>";
}


function doGosuMenuPreview($ordered, $swmenupro){

echo '<script type="text/javascript" src="../modules/mod_swmenupro/DropDownMenuX2.js"></script>';

if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";

}else{

if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo gosuMenuStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";
}
//echo "</head><body>";
echo GosuMenu($ordered, $swmenupro);
echo swmenu_gettooltip($ordered);
//echo "</body></html>";
}

function doColumnMenuPreview($ordered, $swmenupro){

echo '<script type="text/javascript" src="../modules/mod_swmenupro/DropDownMenuX2.js"></script>';

if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";

}else{

//if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo columnMenuStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";
}
//echo "</head><body>";
echo columnMenu($ordered, $swmenupro);
echo swmenu_gettooltip($ordered);
//echo "</body></html>";
}


function doTransMenuPreview($ordered, $swmenupro){

//echo previewHead();
//echo '<script type="text/javascript" src="../modules/mod_swmenupro/jquery.dropshadow.js"></script>';
echo '<script type="text/javascript" src="../modules/mod_swmenupro/transmenu_Packed.js"></script>';
if($swmenupro['preview']=='manual'){
	$css=JRequest::getVar("filecontent",'');
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	echo	str_replace("\\","",$css);
	echo "\n-->\n";
	echo "</style>\n";
}else if($swmenupro['preview']=='external'){
	
echo "<link type='text/css' href='../modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";

}else{
if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
echo "\n<style type='text/css'>\n";
	echo "<!--\n";
echo transMenuStyle($swmenupro,$ordered);
echo "\n-->\n";
	echo "</style>\n";

}
//echo "</head><body><center>";
echo transMenu($ordered, $swmenupro);
echo swmenu_gettooltip($ordered);
//echo "</center></body></html>";
}

function previewHead($preview_background){
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	echo "<head>\n<title>swMenuPro Menu Module Preview</title>\n";
	echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE7\" />";
	echo "<META HTTP-EQUIV=\"Pragma\" CONTENT=\"no-cache\" />";
	echo "\n<style type='text/css'>\n";
	echo "<!--\n";
	//echo	"body{\nmargin-top:20px;\n}\n";
	echo	"#bg_table{\nposition:absolute;top:700px;left:250px;\n}\n";
	//echo "body{z-index:1000;background-color:#fff;}\n";
	echo "\n-->\n";
	echo "</style>\n";
	?>
<script type="text/javascript">
<!--
function changeBG(){
document.body.style.backgroundColor = '<?php echo $preview_background; ?>';
//alert(document.getElementById('back_color').value);
}

-->
</script>
<?php
 }

function changeBgColor(){
?>


<script type="text/javascript">
<!--
changeBG();
//-->
</script>

    <?php
}
?>
 
    
 
