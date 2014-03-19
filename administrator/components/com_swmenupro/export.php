<?php
defined('_JEXEC') or die('Restricted access');
$absolute_path = JPATH_ROOT;
$config = &JFactory::getConfig();
$database = &JFactory::getDBO();
require_once($absolute_path . "/administrator/components/com_swmenupro/pcl/zip.lib.php");

$data = new zipfile();
$images=array();
$fonts=array();
$absolute_path = JPATH_ROOT;
$filename = array();

$style = JRequest::getVar('ex_checked', 0);
$styles=explode(",",$style);

foreach($styles as $id){
 
$swmenupro=array();
  
$sql="SELECT * FROM #__swmenupro_styles where moduleid=".$id;
	$database->setQuery($sql);
	$swmenupro_obj=$database->loadObject();
        $temp_array = sw_stringToObject($swmenupro_obj->params);
   
while (list ($key, $val) = each($temp_array)) {
    $$key = $val;
    $swmenupro[$key] = $val;
}


$data->addFile($swmenupro_obj->params, "".$swmenupro['title'].".swm");

     if (file_exists($absolute_path . "/modules/mod_swmenupro/styles/menu" . $id.".css")) {
        $handle = fopen($absolute_path . "/modules/mod_swmenupro/styles/menu" . $id.".css", "r");
        $str_f = "";
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            $str_f.= $buffer;
        }
        fclose($handle);
        $data->addFile($str_f, "css/".$swmenupro['title'].".css");
    }

    if (file_exists($absolute_path . "/modules/mod_swmenupro/fonts/".@$swmenupro['top_ttf'])&&@$swmenupro['top_ttf'] ) {
        $fonts[].= $swmenupro['top_ttf'];
    }
    if (file_exists($absolute_path . "/modules/mod_swmenupro/fonts/".@$swmenupro['sub_ttf'])&&@$swmenupro['sub_ttf'] ) {
          $fonts[].= $swmenupro['sub_ttf'];
    }
    if (file_exists($absolute_path . "/modules/mod_swmenupro/fonts/".@$swmenupro['levelx_sub_ttf'])&&@$swmenupro['levelx_sub_ttf'] ) {
        $fonts[].= $swmenupro['levelx_sub_ttf'];
    }



 
 
    if (@$swmenupro['top_sub_indicator'] && file_exists($absolute_path . "/" . $swmenupro['top_sub_indicator'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['top_sub_indicator'];
    }
    if (@$swmenupro['sub_sub_indicator'] && file_exists($absolute_path . "/" . $swmenupro['sub_sub_indicator'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['sub_sub_indicator'];
    }
    if (@$swmenupro['levelx_sub_indicator'] && file_exists($absolute_path . "/" . $swmenupro['levelx_sub_indicator'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['levelx_sub_indicator'];
    }
 
    if (@$swmenupro['main_back_image'] && file_exists($absolute_path . "/" . $swmenupro['main_back_image'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['main_back_image'];
    }
    if (@$swmenupro['main_back_image_over'] && file_exists($absolute_path . "/" . $swmenupro['main_back_image_over'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['main_back_image_over'];
    }
    if (@$swmenupro['sub_back_image'] && file_exists($absolute_path . "/" . $swmenupro['sub_back_image'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['sub_back_image'];
    }
    if (@$swmenupro['sub_back_image_over'] && file_exists($absolute_path . "/" . $swmenupro['sub_back_image_over'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['sub_back_image_over'];
    }
     if (@$swmenupro['levelx_sub_back_image'] && file_exists($absolute_path . "/" . $swmenupro['levelx_sub_back_image'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['levelx_sub_back_image'];
    }
    if (@$swmenupro['levelx_sub_back_image_over'] && file_exists($absolute_path . "/" . $swmenupro['levelx_sub_back_image_over'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['levelx_sub_back_image_over'];
    }
     if (@$swmenupro['sub_active_background_image'] && file_exists($absolute_path . "/" . $swmenupro['sub_active_background_image'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['sub_active_background_image'];
    }
    if (@$swmenupro['active_background_image'] && file_exists($absolute_path . "/" . $swmenupro['active_background_image'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['active_background_image'];
    }
    if (@$swmenupro['complete_background_image'] && file_exists($absolute_path . "/" . $swmenupro['complete_background_image'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['complete_background_image'];
    }
    
    
     if (@$swmenupro['tree_top_icon'] && file_exists($absolute_path . "/" . $swmenupro['tree_top_icon'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['tree_top_icon'];
    }
    if (@$swmenupro['tree_folder_icon'] && file_exists($absolute_path . "/" . $swmenupro['tree_folder_icon'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['tree_folder_icon'];
    }
     if (@$swmenupro['tree_folder_open_icon'] && file_exists($absolute_path . "/" . $swmenupro['tree_folder_open_icon'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['tree_folder_open_icon'];
    }
    if (@$swmenupro['tree_file_icon'] && file_exists($absolute_path . "/" . $swmenupro['tree_file_icon'])) {
        $filename[].= $absolute_path . "/" . $swmenupro['tree_file_icon'];
    }
    
  }
  
  
  
  $images = array_unique($filename);
  //print_r($filename);
  if(count($images)){
    foreach ($images as $image) {

        $handle = fopen($image, "rb");
        $contents = fread($handle, filesize($image));
        $file=substr($image,(strlen($absolute_path)+1));
        fclose($handle);
        $data->addFile($contents, $file);
    }
}
    

 $fonts = array_unique($fonts);
  //print_r($filename);
  if(count($fonts)){
    foreach ($fonts as $font) {
        $handle = fopen($absolute_path . "/modules/mod_swmenupro/fonts/" .$font, "r");
        $str_f = "";
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            $str_f.= $buffer;
        }
        //$file=substr($font,(strlen($absolute_path)+28));
        fclose($handle);
        $data->addFile($str_f, "fonts/".$font);
    }
}
    
 
    
 
  header("Content-type: application/octet-stream");
  header("Content-disposition: attachment; filename=swmenu_export.zip");
  echo $data->file();



    
    
    
   

    
    
    
    

?>
