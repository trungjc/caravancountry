<?php
/**
* swmenupro v7.1
* http://www.swmenupro.com
* Copyright 2006 Sean White
**/

//error_reporting (E_ERROR | E_WARNING | E_PARSE | E_STRICT | E_NOTICE);
//error_reporting (E_ERROR);
defined('_JEXEC') or die('Restricted access');
$absolute_path=JPATH_ROOT;
$live_site = JURI::base();
if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
$database = JFactory::getDBO();
require_once($absolute_path."/modules/mod_swmenupro/styles.php");
require_once($absolute_path."/modules/mod_swmenupro/functions.php");

//echo $module->id;
$do_menu=1;
$swmenupro=array();

$sql="SELECT * FROM #__swmenupro_styles where moduleid=$module->id";
$database->setQuery($sql);
$swmenupro_obj=$database->loadObject();
if($swmenupro_obj){
   $temp_array = sw_stringToObject3($swmenupro_obj->params);
    while (list ($key, $val) = each($temp_array)) {
       $swmenupro[$key] = $val;
    }
}else{
    $do_menu=0;
}

 if ($do_menu) {
      $doc = JFactory::getDocument();
      $doc->addCustomTag( "\n<!-- start - swMenuPro 9.7_J2.5-J3.0 javascript and CSS links -->\n" );

    if (@$swmenupro['disable_jquery']) {
        define('_swjquery_defined', 1);
    }
    if (@$swmenupro['flash_hack']) {
        $headtag = "<script type=\"text/javascript\" src=\"" . $live_site . "/modules/mod_swmenupro/fix_wmode2transparent_swf.js\"></script>\n";
        $doc = JFactory::getDocument();
        $doc->addCustomTag( $headtag );
    }
  
$content = "\n<!--swMenuPro9.7_J2.5-3.0 " . $swmenupro['menustyle'] . " by http://www.swmenupro.com-->\n";

   
    
         if (!defined('_swjquery_defined')) {
            if ((@$swmenupro['extra'] != "" && @$swmenupro['extra'] != "none" && @$swmenupro['extra'] != "1" && @$swmenupro['extra'] != "0") || @$swmenupro['overlay_hack'] || (@$swmenupro['t_corner_style'] !== 'none') || (@$swmenupro['s_corner_style'] !== 'none') || (@$swmenupro['c_corner_style'] !== 'none')||@$swmenupro['menustyle']=="superfishmenu" ||@$swmenupro['menustyle']=="accordian") {
               $headtag = "<script type=\"text/javascript\" src=\"" . $live_site . "/modules/mod_swmenupro/jquery-1.6.min.js\"></script>\n";
               define('_swjquery_defined', 1);
               $doc = JFactory::getDocument();
               $doc->addCustomTag( $headtag );
            }
         }
          if (!defined('_swcurvycorners_defined')) {
         if ((@$swmenupro['t_corner_style'] == 'curvycorner') || (@$swmenupro['s_corner_style'] == 'curvycorner') || (@$swmenupro['c_corner_style'] == 'curvycorner') ) {
            // $headtag.="<script type=\"text/javascript\"> var curvyCornersNoAutoScan = true; </script>\n";
             $headtag= "<script type=\"text/javascript\" src=\"" . $live_site . "/modules/mod_swmenupro/curvycorners.src.js\"></script>\n";
            define('_swcurvycorners_defined', 1);
            $doc = JFactory::getDocument();
            $doc->addCustomTag( $headtag );
        }
        }
        if (((@$swmenupro['t_corner_style'] != 'none') || (@$swmenupro['s_corner_style'] != 'none') || (@$swmenupro['c_corner_style'] != 'none')) && !defined('_swcorners_defined')) {
            $headtag = "<script type=\"text/javascript\" src=\"" . $live_site . "/modules/mod_swmenupro/jquery.corner.js\"></script>\n";
            define('_swcorners_defined', 1);
            $doc = JFactory::getDocument();
            $doc->addCustomTag( $headtag );
        }
    
    if (@$swmenupro['top_ttf']) {
       
        if (!defined('_swcufon_defined')) {
            $headtag = "<script type=\"text/javascript\" src=\"" . $live_site . "/modules/mod_swmenupro/cufon-yui.js\"></script>\n";
            define('_swcufon_defined', 1);
             $doc = JFactory::getDocument();
             $doc->addCustomTag( $headtag );
        }
        $headtag = "<script type=\"text/javascript\" src=\"" . $live_site . "/modules/mod_swmenupro/fonts/" . $swmenupro['top_ttf'] . "\"></script>\n";
        $doc = JFactory::getDocument();
        $doc->addCustomTag( $headtag );
    }

    if (@$swmenupro['sub_ttf']) {
        if (!defined('_swcufon_defined')) {
            $headtag = "<script type=\"text/javascript\" src=\"" . $live_site . "/modules/mod_swmenupro/cufon-yui.js\"></script>\n";
            define('_swcufon_defined', 1);
            $doc = JFactory::getDocument();
            $doc->addCustomTag( $headtag );
        }
        if ($swmenupro['sub_ttf'] != $swmenupro['top_ttf']) {
            $headtag = "<script type=\"text/javascript\" src=\"" . $live_site . "/modules/mod_swmenupro/fonts/" . $swmenupro['sub_ttf'] . "\"></script>\n";
            $doc = JFactory::getDocument();
            $doc->addCustomTag( $headtag );
        }
    }

//echo $swmenupro['id'];
    if ($swmenupro['menutype'] && $swmenupro['id'] && $swmenupro['menustyle']) {
        if ($swmenupro['cssload'] == 1) {
            $headtag = "<link type='text/css' href='" . $live_site . "/modules/mod_swmenupro/styles/menu".$swmenupro['id'].".css' rel='stylesheet' />\n";
            $doc = JFactory::getDocument();
            $doc->addCustomTag( $headtag );
        }
 if ($swmenupro['parentid']==0){$swmenupro['parentid']=1;};
 if(($swmenupro['menutype']=="virtuemart2"||$swmenupro['menutype']=="virtueprod2")&&$swmenupro['parentid']==1){$swmenupro['parentid']=0;}
if(($swmenupro['menutype']=="virtuemart"||$swmenupro['menutype']=="virtueprod")&&$swmenupro['parentid']==1){$swmenupro['parentid']=0;}

//if(($swmenupro['menutype']=="virtuemart2"||$swmenupro['menutype']=="virtueprod2")&&$swmenupro['parentid']!=0){$swmenupro['parentid']=$swmenupro['parentid']+10000;}
//if(($swmenupro['menutype']=="virtuemart"||$swmenupro['menutype']=="virtueprod")&&$swmenupro['parentid']!=0){$swmenupro['parentid']=$swmenupro['parentid']+10000;}
 
	//echo $swmenupro['id'].$swmenupro['menuname'].$hybrid.$swmenupro['parentid'].$levels;
	
	$ordered=swGetMenu($swmenupro['menuname'],$swmenupro['id'],$swmenupro['hybrid'],$swmenupro['tables'],$swmenupro['parentid'],$swmenupro['levels']);
	//echo "   count".count($ordered)."   ";
	if (count($ordered)){
 		if ($swmenupro['parent_level']){ 
          $ordered=sw_getsubmenu($ordered,$swmenupro['parent_level'],25,$swmenupro['menuname']);
         // echo "   count".count($ordered)."   ";
             if($swmenupro['active_menu']){
             	$swmenupro['active_menu']=sw_getactive($ordered,$swmenupro['menustyle']);
             }
             if (count($ordered)){   
             $ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $ordered[0]['mid'], $swmenupro['levels']);
             $swmenupro['parentid']=$ordered[0]['mid'];
             }
       }elseif($swmenupro['active_menu']){   
 	    	$swmenupro['active_menu']=sw_getactive($ordered,$swmenupro['menustyle']);
 	    	$sub_ordered=sw_getsubmenu($ordered,1,25,$swmenupro['menuname']);
 	    	//$sub_ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $active_menu, $levels); 
 	    	if($sub_ordered){$swmenupro['sub_active_menu']=sw_getactive($sub_ordered,$swmenupro['menustyle']);}
 	    	$ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $swmenupro['parentid'], $swmenupro['levels']); 
 		}else{
 			$ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $swmenupro['parentid'], $swmenupro['levels']); 
 		}
 		
	}
	if(count($ordered)&&(@$swmenupro['orientation']=='horizontal/left')){
      $topcount=count(chain('ID', 'PARENT', 'ORDER', $ordered, $swmenupro['parentid'], 1));
      for($i=0;$i<count($ordered);$i++){
        $swmenu=$ordered[$i];
        if($swmenu['indent']==0){
          $ordered[$i]['ORDER']=$topcount;
          $topcount--;
        }
      }  
      $ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $swmenupro['parentid'], $swmenupro['levels']);     
   }
   
   if (count($ordered) && (@$swmenupro['tablet_hack'])) {
            $useragent=$_SERVER['HTTP_USER_AGENT'];
            if(preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|meego.+mobile|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){

            for ($i = 0; $i < count($ordered); $i++) {
                 if ((($i + 1) != count($ordered)) && (@$ordered[$i + 1]['indent'] > $ordered[$i]['indent'])) {
                $ordered[$i]['URL']="javascript:void(0);";
                }
            }
          }
        }
  // echo count($ordered)." ordered";
	if(count($ordered)){
		
		switch ($swmenupro['menustyle']){
			
			case "accordian":
                        //     if (!defined('_swjquery_defined')){
		//$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery-1.6.min.js\"></script>\n";
	//	define( '_swjquery_defined', 1 );
	//	} $headtag=""; 
                             $headtag=""; 
			if (!defined( '_accordian2_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/ddaccordion.js\"></script>\n";
				define( '_accordian2_defined', 1 );
			}
                       
			if(!$swmenupro['cssload']){
				//if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= AccordianStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";
			}
			$content.= Accordian($ordered, $swmenupro);
			break;
			case "treemenu":
                             $headtag=""; 
			if (!defined( '_tree_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/dtree_Packed.js\"></script>\n";
        		define( '_tree_defined', 1 );
			}
			if(!$swmenupro['cssload']){
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= TreeMenuStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";
			}
			$content.= TreeMenu($ordered, $swmenupro);
			break;
                        case "treeview":
                             $headtag=""; 
                            if (!defined('_swjquery_defined')){
		$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery-1.6.min.js\"></script>\n";
		define( '_swjquery_defined', 1 );
		}
		if (!defined( '_swcookie_defined' ) && $swmenupro['use_cookie']){
				//$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery.treeview.js\"></script>\n";
                                $headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery.cookie.js\"></script>\n";
        		define( '_swcookie_defined', 1 );
			}	
                
                
                if (!defined( '_mygosutree_defined' )){
                 
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery.treeview.js\"></script>\n";
                               // $headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery.cookie.js\"></script>\n";
        		define( '_mygosutree_defined', 1 );
			}
			if(!$swmenupro['cssload']){
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= mygosuTreeMenuStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";
			}
			$content.= mygosuTreeMenu($ordered, $swmenupro);
			break;
			
			case "gosumenu":
                             $headtag=""; 
			if (!defined( '_mygosu_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/DropDownMenuX2.js\"></script>\n";
				define( '_mygosu_defined', 1 );
			}
				
			if(!$swmenupro['cssload']){
				if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= gosuMenuStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";
			}
			$content.= GosuMenu($ordered, $swmenupro);
			break;
			case "superfishmenu":
                           $headtag=""; 
                            if (!defined('_swjquery_defined')){
		$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery-1.6.min.js\"></script>\n";
		define( '_swjquery_defined', 1 );
		}
			if (!defined( '_superfish_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/hoverIntent.js\"></script>\n";
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/superfish.js\"></script>\n";
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/supersubs.js\"></script>\n";
				define( '_superfish_defined', 1 );
			}
                        	
			if(!$swmenupro['cssload']){
				if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= superfishMenuStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";
			}
			$content.= SuperfishMenu($ordered, $swmenupro);
			break;
			case "transmenu":
                            $headtag="";
			if (!defined( '_trans_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/transmenu.js\"></script>\n";
       			define( '_trans_defined', 1 );
			}
			
			if(!$swmenupro['cssload']){
				if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= transMenuStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";	
			}
			$content.= transMenu($ordered, $swmenupro);
			break;	
			
                        case "multitabmenu":
                             $headtag=""; 
			if (!defined( '_mygosu_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/DropDownMenuX2.js\"></script>\n";
       			define( '_mygosu_defined', 1 );
			}
			
			if(!$swmenupro['cssload']){
				//if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= multiTabMenuStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";
			}
			$content.= MultiTabMenu($ordered, $swmenupro);	
			break;	
                        case "accordtransmenu":
                               $headtag="";
			if (!defined( '_accordion_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/ddaccordion.js\"></script>\n";
       			define( '_accordion_defined', 1 );
			}
                        if (!defined( '_trans_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/transmenu.js\"></script>\n";
       			define( '_trans_defined', 1 );
			}
			
			if(!$swmenupro['cssload']){
				//if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")&&$swmenupro['padding_hack']){$swmenupro = fixPadding($swmenupro);}
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= AccordTransMenuStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";
			}
			$content.= AccordTransMenu($ordered, $swmenupro);	
			break;	
			case "columnmenu":
                           $headtag="";   
                             
        
			if(!$swmenupro['cssload']){
				$headtag.= "\n<style type='text/css'>\n";
				$headtag.= "<!--\n";
				$headtag.= columnMenuStyle($swmenupro,$ordered);
				$headtag.= "\n-->\n";
				$headtag.= "</style>\n";
			}
			if (!defined( '_mygosu_defined' )){
				$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/DropDownMenuX2.js\"></script>\n";
				define( '_mygosu_defined', 1 );
			}
			$content.= columnMenu($ordered, $swmenupro);
			break;
		}
	}
}
$content.= swmenu_gettooltip($ordered);
if(@$swmenupro['flash_hack'] && ($swmenupro['menustyle']!="accordian")&& ($swmenupro['menustyle']!="clickmenu")&& ($swmenupro['menustyle']!="clicktransmenu")){$headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/fix_wmode2transparent_swf.js\"></script>\n";}
$content.="\n<!--End SWmenuPro menu module-->\n";

if (defined( '_swtooltip_defined')&&!defined( '_swtooltip2_defined')){
            if (!defined( '_swjquery_defined')){
                $headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery-1.6.min.js\"></script>\n";
                define( '_swjquery_defined', 1 );
            }
              $headtag.= "<link type=\"text/css\" href=\"".$live_site."/modules/mod_swmenupro/jquery.tooltip.css\" rel=\"stylesheet\" />\n";
              $headtag.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/jquery.tooltip.js\"></script>\n";
               define( '_swtooltip2_defined', 1 );
            
              
        }
$headtag.="\n<!--End SWmenuPro CSS and Javascript-->\n";
$doc = JFactory::getDocument();
$doc->addCustomTag( $headtag );
return $content;
 }
?>



