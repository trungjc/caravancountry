<?php

/**
 * swmenupro v6.0
 * http://swmenupro.com
 * Copyright 2006 Sean White
 * */
defined('_JEXEC') or die('Restricted access');

function click_customcss($ordered, $item, $id, $class) {
    $str = "";

    if ($item['indent'] == 0) {
        if ($class) {
            $str.="#click-menu" . $id . "-" . ($item['ORDER'] - 1) . ".box1-open .inbox1 ,\n";
            //$str.="#click-menu".$id."-".($item['ORDER']-1).".box1-open  ,\n";
            $str.="#click-menu" . $id . "-" . ($item['ORDER'] - 1) . " a:hover {\n";
        } else {
            $str.=" #click-menu" . $id . "-" . ($item['ORDER'] - 1) . " .inbox1 {\n";
        }
    } else {
        $topcount = 0;
        $subcount = 0;
        $k = "";
        for ($i = 0; $i < (count($ordered)); $i++) {
            if ($ordered[$i]['ID'] == $item['ID']) {
                $k = "-" . ($topcount - 1) . "-" . $subcount;
            }
            if ($ordered[$i]['indent']) {
                $subcount++;
            } else {
                $topcount++;
                $subcount = 0;
            }
        }
        if ($class) {
            $str.="#click-menu" . $id . $k . " .inbox2-active ,\n";
            $str.="#click-menu" . $id . $k . " #click-sub-active" . $id . " ,\n";
            $str.="#click-menu" . $id . $k . " .inbox2" . $class . " {\n";
        } else {
            $str.="#click-menu" . $id . $k . " .inbox2{\n";
        }
    }
    return $str;
}

function AccordTransMenuStyle($swmenupro, $ordered) {
   $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
    if (substr($swmenupro['main_back_image'], 0, 1) == "/") {
        $swmenupro['main_back_image'] = substr($swmenupro['main_back_image'], 1, (strlen($swmenupro['main_back_image']) - 1));
    }
    if (substr($swmenupro['main_back_image_over'], 0, 1) == "/") {
        $swmenupro['main_back_image_over'] = substr($swmenupro['main_back_image_over'], 1, (strlen($swmenupro['main_back_image_over']) - 1));
    }
    if (substr($swmenupro['sub_back_image'], 0, 1) == "/") {
        $swmenupro['sub_back_image'] = substr($swmenupro['sub_back_image'], 1, (strlen($swmenupro['sub_back_image']) - 1));
    }
    if (substr($swmenupro['sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['sub_back_image_over'] = substr($swmenupro['sub_back_image_over'], 1, (strlen($swmenupro['sub_back_image_over']) - 1));
    }
    if (substr($swmenupro['active_background_image'], 0, 1) == "/") {
        $swmenupro['active_background_image'] = substr($swmenupro['active_background_image'], 1, (strlen($swmenupro['active_background_image']) - 1));
    }


    $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
    $swmenupro['main_back_image'] = $swmenupro['main_back_image'] ? $live_site . "/" . $swmenupro['main_back_image'] : "";
    $swmenupro['main_back_image_over'] = $swmenupro['main_back_image_over'] ? $live_site . "/" . $swmenupro['main_back_image_over'] : "";
    $swmenupro['sub_back_image'] = $swmenupro['sub_back_image'] ? $live_site . "/" . $swmenupro['sub_back_image'] : "";
    $swmenupro['sub_back_image_over'] = $swmenupro['sub_back_image_over'] ? $live_site . "/" . $swmenupro['sub_back_image_over'] : "";
    $swmenupro['active_background_image'] = $swmenupro['active_background_image'] ? $live_site . "/" . $swmenupro['active_background_image'] : "";

    //<style type="text/css">
    //<!--

   
    
    $str = "#menu" . $swmenupro['id'] . " table,\n";
    $str.=  (($swmenupro['sub_border_width']==0)||($swmenupro['sub_border_style']=="none"))?" #subwrap" . $swmenupro['id'] . " table,\n":"";
    $str.= (($swmenupro['sub_border_over_width']==0)||($swmenupro['sub_border_over_style']=="none"))?" #subwrap" . $swmenupro['id'] . " td,\n":"";
    $str.= (($swmenupro['sub_border_over_width']==0)||($swmenupro['sub_border_over_style']=="none"))?" #subwrap" . $swmenupro['id'] . " tr,\n":"";
    $str.= "#menu" . $swmenupro['id'] . " tr,\n";
    $str.= "#menu" . $swmenupro['id'] . " td,\n";
    $str.= "#accord-menu".$swmenupro['id']." tr,\n";
    $str.= "#accord-menu".$swmenupro['id']." td{\n";
    $str.= "border:0 !important; \n";
    // $str.= " overflow:hidden; \n";
    // $str.= " left:-1000px; \n";
    // $str.= " top:-1000px; \n";
    $str.= "}\n";

    $str.="#click-menu" . $swmenupro['id'] . " { \n";
    
     $str.=" top: " . $swmenupro['main_top'] . "px  ; \n";
    $str.=" left: " . $swmenupro['main_left'] . "px; \n";
    if ($swmenupro['main_width'] != 0) {
        $str.= "width:" . $swmenupro['main_width'] . "px  !important  ; \n";
    }
     $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.=$swmenupro['complete_background'] ? " background-color: " . $swmenupro['complete_background'] . "  ; \n" : "";
   // $str.=" display: block; \n";
     
     
    if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    //$str.=" position: relative ; \n";
    //$str.=" z-index: 199; \n";
      $str.="}\n";
   
    $str.="#click-menu" . $swmenupro['id'] . " .inbox1 {\n";
    //$str.=" position:relative; \n";
      if ( @$swmenupro['t_auto_border']) {
     $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
      
    }
    //$str.=" border: ". $swmenupro['main_border_over']." !important ; \n";
   $str.= $swmenupro['top_margin_top'] ? " margin-top: " . $swmenupro['top_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_right'] ? " margin-right: " . $swmenupro['top_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_bottom'] ? " margin-bottom: " . $swmenupro['top_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_left'] ? " margin-left: " . $swmenupro['top_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-image: URL(\"" . $swmenupro['main_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image'] ? " background-repeat:" . $swmenupro['top_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-position:" . $swmenupro['top_background_position'] . " ;\n" : "";
    $str.=$swmenupro['main_back'] ? " background-color: " . $swmenupro['main_back'] . "; \n" : "";
    $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    if ($swmenupro['main_height'] != 0) {
        $str.= "height:" . $swmenupro['main_height'] . "px  !important  ; \n";
    }
    $str.=" font-size: " . $swmenupro['main_font_size'] . "px   ; \n";
    $str.=" font-family: " . $swmenupro['font_family'] . "  !important  ; \n";
    $str.=" text-align: " . $swmenupro['main_align'] . "  !important  ; \n";
    $str.=" font-weight: " . $swmenupro['font_weight'] . "  !important  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  !important  ; \n" : "";
    $str.=" text-decoration: none  !important  ; \n";
  
    $str.=" display:block; \n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " !important;\n";
            $str.=" font-style: normal !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" font-style: normal !important;\n";
            break;
        default:
            $str.=" font-style: normal !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
    }
     if ($swmenupro['t_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ttl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ttr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ttl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['ttr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
    }

    $str.="}\n";

   // if ($swmenupro['border_hack']) {
        $str.="#click-menu" . $swmenupro['id'] . " .inbox1.last {\n";
        $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
   
        $str.="}\n";
  //  }

    $str.="#click-menu" . $swmenupro['id'] . "  div.active .inbox1, \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1-active,\n";
    $str.="#click-menu" . $swmenupro['id'] . " .inbox1:hover{ \n";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . " !important ; \n" : "";
     $str.=$swmenupro['main_back_image_over'] ? " background-image: URL(\"" . $swmenupro['main_back_image_over'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image_over'] ? " background-repeat:" . $swmenupro['top_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-position:" . $swmenupro['top_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['main_over'] ? " background-color: " . $swmenupro['main_over'] . "    ; \n" : "";
    //$str.=" border: ". $swmenupro['main_border_over']."  !important  ; \n";
    $str.="}\n";

    $str.="#click-menu" . $swmenupro['id'] . "  div.active .inbox1.act, \n";
    $str.="#click-menu" . $swmenupro['id'] . " .inbox1.act{ \n";
//$str.="#click-menu". $swmenupro['id']."  div.active .inbox1{ \n";
     $str.=$swmenupro['active_background_image'] ? " background-image: URL(\"" . $swmenupro['active_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['active_background_image'] ? " background-repeat:" . $swmenupro['active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['active_background_image'] ? " background-position:" . $swmenupro['active_background_position'] . " ;\n" : "";
    $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . " !important; \n" : "";
    $str.=$swmenupro['active_font'] ? " color: " . $swmenupro['active_font'] . " !important ; \n" : "";
    $str.="}\n";



    $str.=" .section" . $swmenupro['id'] . " { \n";
    //$str.=" clear:both; \n";
    //$str.=" /float:left ; \n";
    $str.=" margin: 0px ; \n";
    $str.=" padding: 0px ; \n";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_width']) ? " border-top-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&($swmenupro['sub_border_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_color'] )? " border-top-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_width']) ? " border-right-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&($swmenupro['sub_border_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_color'] )? " border-right-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_width']) ? " border-bottom-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&($swmenupro['sub_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_color'] )? " border-bottom-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_width']) ? " border-left-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&($swmenupro['sub_border_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_color'] )? " border-left-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
   // $str.=" position:relative; \n";
   // $str.=" top: " . $swmenupro['level1_sub_top'] . "px  ; \n";
   // $str.=" left: " . $swmenupro['level1_sub_left'] . "px; \n";
    //$str.=" height:300px ; \n";
    //$str.=" display:   none; \n";
//$str.=" line-height: 0px ; \n";
    $str.=" filter: alpha(opacity=" . $swmenupro['specialA'] . ");\n";
    $str.="opacity:" . ($swmenupro['specialA'] / 100) . ";\n";
    if ($swmenupro['sub_width'] != 0) {
        $str.= "width:" . $swmenupro['sub_width'] . "px  !important  ; \n";
    } else {
        $str.= "width:100% !important  ; \n";
    }

    $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2  {\n";
    if ($swmenupro['sub_height'] != 0) {
        $str.= "height:" . $swmenupro['sub_height'] . "px  !important  ; \n";
    }
    //if ($swmenupro['sub_width']!=0){$str.= "width:".$swmenupro['sub_width']."px  !important  ; \n";}
     $str.=$swmenupro['sub_back_image'] ? " background-image: URL(\"" . $swmenupro['sub_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image'] ? " background-repeat:" . $swmenupro['sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image'] ? " background-position:" . $swmenupro['sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_back'] ? " background-color: " . $swmenupro['sub_back'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . " !important ; \n" : "";
    $str.=" font-weight: " . $swmenupro['font_weight'] . " !important ; \n";
    $str.=" font-size: " . $swmenupro['sub_font_size'] . "px !important ; \n";
    $str.=" font-family: " . $swmenupro['sub_font_family'] . " !important ; \n";
    $str.=" text-align: " . $swmenupro['sub_align'] . " !important ; \n";
    $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
    if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
    $str.=" text-decoration: none !important ; \n";
    $str.=" margin:0px  !important  ; \n";
    $str.=" display:    block; \n";
      $str.=" position: relative; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . "; \n";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" font-style: normal !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" font-style: normal !important;\n";
            break;
        default:
            $str.=" font-style: normal !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
    }
     if ($swmenupro['si_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['sitl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sitr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sibr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sibl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['sitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
    }
  
    $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2.active, \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2:hover { \n";
    //if ($swmenupro['sub_width']!=0){$str.= "width:".$swmenupro['sub_width']."px  !important  ; \n";}
    $str.=$swmenupro['sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['sub_back_image_over'] . "\") ;\n" : "";
    $str.=$swmenupro['sub_over'] ? " background-color: " . $swmenupro['sub_over'] . " !important ; \n" : "";
    $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . " !important ; \n" : "";
    $str.=" font-weight: " . $swmenupro['font_weight'] . " !important ; \n";
    $str.=" font-size: " . $swmenupro['sub_font_size'] . "px !important ; \n";
    $str.=" font-family: " . $swmenupro['sub_font_family'] . " !important ; \n";
    $str.=" text-align: " . $swmenupro['sub_align'] . " !important ; \n";
    $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
   if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" font-style: normal !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" font-style: normal !important;\n";
            break;
        default:
            $str.=" font-style: normal !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
    }
    $str.=" margin:0px  !important  ; \n";
   // $str.=" display:    block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . "; \n";
    $str.="}\n";

    //  $str.=".click-menu" . $swmenupro['id'] . " .inbox2-active:hover , \n";
   //  $str.=".click-menu" . $swmenupro['id'] . " .inbox2.active.first , \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2.first { \n";
    
       if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
         $ctext.="0 ";
        $ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }

   
    $str.="}\n";
     $str.=".click-menu" . $swmenupro['id'] . " .inbox2.sub-active:hover, \n";
     $str.=".click-menu" . $swmenupro['id'] . " .inbox2.sub-active{ \n";
       $str.=$swmenupro['sub_active_background_image'] ? " background-image: URL(\"" . $swmenupro['sub_active_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_active_background_image'] ? " background-repeat:" . $swmenupro['sub_active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_active_background_image'] ? " background-position:" . $swmenupro['sub_active_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_active_background'] ? " background-color: " . $swmenupro['sub_active_background'] . " !important ; \n" : "";
    $str.=$swmenupro['sub_active_font'] ? " color: " . $swmenupro['sub_active_font'] . " !important ; \n" : "";
      $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2.last { \n";
    
       if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        $ctext.="0 ";
        $ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
    // @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }

   $str.= $swmenupro['sub_border_over_width'] ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= ($swmenupro['sub_border_over_style']!="none") ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= $swmenupro['sub_border_color_over'] ? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";

    $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2.first.last { \n";
    
       if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }

    $str.="}\n";
    $str.=".click-menu" . $swmenupro['id'] . " div.active .inbox1 .seq2,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1:hover .seq2,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2:hover .seq2, \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1 .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2 .seq1 \n";
    $str.="{\n";
    $str.=" display:    block; \n";
    $str.="}\n";

    //$str.=".click-menu". $swmenupro['id']." .inbox1:hover .seq2,\n";
    //$str.=".click-menu". $swmenupro['id']." .inbox2:hover .seq2 \n";
    //$str.="{ \n";
    //$str.=" display:    block; \n";
    //$str.="} \n";
    $str.=".click-menu" . $swmenupro['id'] . " div.active .inbox1-active .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " div.active .inbox1 .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1-active .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2-active .seq2,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1:hover .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1 .seq2,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2:hover .seq1, \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2 .seq2  \n";
    $str.="{ \n";
    $str.=" display:    none; \n";
    $str.="} \n";
    
    
    
    
    
    
    
    $str.= ".transMenu" . $swmenupro['id'] . " {\n";
    $str.= " position:absolute ; \n";
    $str.= " overflow:hidden; \n";
    $str.= " left:-1000px; \n";
    $str.= " top:-1000px; \n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .content {\n";
    $str.= " position:absolute  ; \n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .items {\n";
    $str.= $swmenupro['levelx_sub_width'] ? " width: " . $swmenupro['levelx_sub_width'] . "px ;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xot_border'])) ? " border-top: " . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xor_border'])) ? " border-right:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xob_border'])) ? " border-bottom:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xol_border'])) ? " border-left:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= " position:relative ; \n";
    $str.= " left:0px; top:0px; \n";
    $str.= " z-index:2; \n";

    $str.= "}\n";

   

    $str.= ".transMenu" . $swmenupro['id'] . "  td \n";
    $str.= "{\n";
     $str.= $swmenupro['levelx_sub_pad_top'] ? " padding-top: " . $swmenupro['levelx_sub_pad_top'] . "px !important;\n" : "";
    $str.= $swmenupro['levelx_sub_pad_right'] ? " padding-right: " . $swmenupro['levelx_sub_pad_right'] . "px !important;\n" : "";
    $str.= $swmenupro['levelx_sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['levelx_sub_pad_bottom'] . "px !important;\n" : "";
    $str.= $swmenupro['levelx_sub_pad_left'] ? " padding-left: " . $swmenupro['levelx_sub_pad_left'] . "px !important;\n" : "";
    //$str.= " padding: " . $swmenupro['sub_padding'] . " !important;  \n";
    $str.= " font-size: " . $swmenupro['levelx_sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['levelx_sub_font_family'] . "  ; \n";
    $str.= " text-align: " . $swmenupro['levelx_sub_font_align'] . " ; \n";
    $str.= " font-weight: " . $swmenupro['levelx_sub_font_weight'] . "  ; \n";
    $str.=$swmenupro['levelx_sub_font_color'] ? " color: " . $swmenupro['levelx_sub_font_color'] . "  ; \n" : "";
  
    $str.= "} \n";

    $str.= "#subwrap" . $swmenupro['id'] . " \n";
    $str.= "{ \n";
    $str.= " text-align: left ; \n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . "  .item:hover td, \n";
    $str.= ".transMenu" . $swmenupro['id'] . "  .item.hover td\n";
    $str.= "{ \n";
    $str.=$swmenupro['levelx_sub_font_color_over'] ? " color: " . $swmenupro['levelx_sub_font_color_over'] . " !important ; \n" : "";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .item { \n";
   
    $str.= $swmenupro['levelx_sub_height'] ? " height: " . $swmenupro['levelx_sub_height'] . "px;" : "";
    $str.= " text-decoration: none ; \n";
    $str.= $swmenupro['levelx_sub_width'] ? " width: " . $swmenupro['levelx_sub_width'] . "px;" : "";
    switch ($swmenupro['levelx_sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['levelx_sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['levelx_sub_font_extra'] . " !important;\n";
            $str.=" font-style: normal !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['levelx_sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" font-style: normal !important;\n";
            break;
        default:
            $str.=" font-style: normal !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
    }
   
    $str.=" white-space: " . $swmenupro['levelx_sub_font_wrap'] . "; \n";
    $str.= " cursor:pointer; \n";
    //$str.= " cursor:hand; \n";
    
    $str.= "}\n";


    $str.= ".transMenu" . $swmenupro['id'] . " .item td { \n";
    
    if(($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['x_auto_border'])){
    $str.="border-right:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" ;  
    $str.="border-left:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" ;  
    $str.="border-bottom:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" ;  
    }else{
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xit_border'])) ? " border-top: " . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xir_border'])) ? " border-right:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xib_border'])) ? " border-bottom:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xil_border'])) ? " border-left:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    }
     
    $str.= "}\n";



    $str.= ".transMenu" . $swmenupro['id'] . " .item .top_item { \n";
   //if(($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['x_auto_border'])){
    $str.="border-top:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" ;  
   // }
    $str.= "}\n";


    $str.= ".transMenu" . $swmenupro['id'] . " .background {\n";
  $str.=$swmenupro['levelx_sub_back_image'] ? " background-image: URL(\"" . $swmenupro['levelx_sub_back_image'] . "\") ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['levelx_sub_back_image'] ? " background-repeat:" . $swmenupro['levelx_sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['levelx_sub_back_image'] ? " background-position:" . $swmenupro['levelx_sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['levelx_sub_back'] ? " background-color: " . $swmenupro['levelx_sub_back'] . "  ; \n" : "";
    $str.= " position:absolute ; \n";
    $str.= " left:0px; top:0px; \n";
    $str.= " z-index:1; \n";
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . "); \n";
     if ($swmenupro['x_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['xtl_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xtr_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xbr_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xbl_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['xtl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xtr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['x_corner_size']."px; \n":"";
    }
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .shadowRight { \n";
    $str.= " position:absolute ; \n";
    $str.= " z-index:3; \n";
    if ($swmenupro['extra']==2000) {
        $str.= " top:3px; width:2px; \n";
    } else {
        $str.= " top:-3000px; width:2px; \n";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ");\n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .shadowBottom { \n";
    $str.= " position:absolute ; \n";
    $str.= " z-index:1; \n";
    if ($swmenupro['extra']==2000) {
        $str.= " left:3px; height:2px; \n";
    } else {
        $str.= " left:-3000px; height:2px; \n";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ");\n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .item.hover ,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " .item:hover {\n";
  $str.=$swmenupro['levelx_sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['levelx_sub_back_image_over'] . "\") !important;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['levelx_sub_back_image_over'] ? " background-repeat:" . $swmenupro['levelx_sub_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['levelx_sub_back_image_over'] ? " background-position:" . $swmenupro['levelx_sub_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['levelx_sub_over'] ? " background-color: " . $swmenupro['levelx_sub_over'] . " !important ; \n" : "";
    
    $str.= "}\n";

      $str.= ".transMenu" . $swmenupro['id'] . " .item td ,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " .top_item td{\n";

     if ($swmenupro['xi_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['xitl_corner']?$ctext.=$swmenupro['xi_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xitr_corner']?$ctext.=$swmenupro['xi_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xibr_corner']?$ctext.=$swmenupro['xi_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xibl_corner']?$ctext.=$swmenupro['xi_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['xitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['xi_corner_size']."px; \n":"";
     @$swmenupro['xitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['xi_corner_size']."px; \n":"";
     @$swmenupro['xibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['xi_corner_size']."px; \n":"";
     @$swmenupro['xibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['xi_corner_size']."px; \n":"";
    }
    $str.= "}\n";
    
    //$str.= "#menu". $swmenupro['id']." a img.seq1,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " img.seq1\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.= "}\n";

    //$str.= "#menu". $swmenupro['id']." a.hover img.seq2,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " .item.hover img.seq2 \n";
    $str.= "{\n";
    $str.= " display:   inline; \n";
    $str.= "}\n";

    //$str.= "#menu". $swmenupro['id']." a.hover img.seq1,\n";
    //$str.= "#menu". $swmenupro['id']." a img.seq2,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " img.seq2,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " .item.hover img.seq1\n";
    $str.= "{\n";
    $str.= " display:   none; \n";
    $str.= "}\n";

    $str.="#trans-active" . $swmenupro['id'] . " a img.seq1\n";
    $str.="{\n";
    $str.=" display: none;\n";
    $str.="}\n";

    $str.="#trans-active" . $swmenupro['id'] . " a img.seq2\n";
    $str.="{\n";
    $str.=" display: inline;\n";
    $str.="}\n";

    //-->
    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            if ($ordered[$i]['indent'] > 1) {
                $str.=clicktrans_customcss($ordered, $ordered[$i], $swmenupro['id'], "");
            } else {
                $str.=click_customcss($ordered, $ordered[$i], $swmenupro['id'], "");
            }
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
            if ($ordered[$i]['indent'] > 1) {
                $str.=clicktrans_customcss($ordered, $ordered[$i], $swmenupro['id'], ":hover");
            } else {
                $str.=click_customcss($ordered, $ordered[$i], $swmenupro['id'], ":hover");
            }
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }
    return $str;
}


function multiTabMenuStyle($swmenupro, $ordered) {
 
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
    if (substr($swmenupro['main_back_image'], 0, 1) == "/") {
        $swmenupro['main_back_image'] = substr($swmenupro['main_back_image'], 1, (strlen($swmenupro['main_back_image']) - 1));
    }
    if (substr($swmenupro['main_back_image_over'], 0, 1) == "/") {
        $swmenupro['main_back_image_over'] = substr($swmenupro['main_back_image_over'], 1, (strlen($swmenupro['main_back_image_over']) - 1));
    }
    if (substr($swmenupro['sub_back_image'], 0, 1) == "/") {
        $swmenupro['sub_back_image'] = substr($swmenupro['sub_back_image'], 1, (strlen($swmenupro['sub_back_image']) - 1));
    }
    if (substr($swmenupro['sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['sub_back_image_over'] = substr($swmenupro['sub_back_image_over'], 1, (strlen($swmenupro['sub_back_image_over']) - 1));
    }
    if (substr($swmenupro['levelx_sub_back_image'], 0, 1) == "/") {
        $swmenupro['levelx_sub_back_image'] = substr($swmenupro['sub_back_image2'], 1, (strlen($swmenupro['sub_back_image2']) - 1));
    }
    if (substr($swmenupro['levelx_sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['levelx_sub_back_image_over'] = substr($swmenupro['sub_back_image_over2'], 1, (strlen($swmenupro['sub_back_image_over2']) - 1));
    }
    if (substr($swmenupro['active_background_image'], 0, 1) == "/") {
        $swmenupro['active_background_image'] = substr($swmenupro['active_background_image'], 1, (strlen($swmenupro['active_background_image']) - 1));
    }


    $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
    $swmenupro['main_back_image'] = $swmenupro['main_back_image'] ? $live_site . "/" . $swmenupro['main_back_image'] : "";
    $swmenupro['main_back_image_over'] = $swmenupro['main_back_image_over'] ? $live_site . "/" . $swmenupro['main_back_image_over'] : "";
    $swmenupro['sub_back_image'] = $swmenupro['sub_back_image'] ? $live_site . "/" . $swmenupro['sub_back_image'] : "";
    $swmenupro['sub_back_image_over'] = $swmenupro['sub_back_image_over'] ? $live_site . "/" . $swmenupro['sub_back_image_over'] : "";
    $swmenupro['levelx_sub_back_image'] = $swmenupro['levelx_sub_back_image'] ? $live_site . "/" . $swmenupro['levelx_sub_back_image'] : "";
    $swmenupro['levelx_sub_back_image_over'] = $swmenupro['levelx_sub_back_image_over'] ? $live_site . "/" . $swmenupro['levelx_sub_back_image_over'] : "";
    $swmenupro['active_background_image'] = $swmenupro['active_background_image'] ? $live_site . "/" . $swmenupro['active_background_image'] : "";



     $str = "#menu" . $swmenupro['id'] . " table,\n";
    $str.= "#menu" . $swmenupro['id'] . ",\n";
    $str.= "#menu" . $swmenupro['id'] . " tr,\n";
    $str.= "#menu" . $swmenupro['id'] . " td{\n";
    $str.= "border:0 !important; \n";
   
    $str.= "}\n";

    $str.="#outerwrap" . $swmenupro['id'] . " {\n";
    $str.=" top: " . $swmenupro['main_top'] . "px  ; \n";
    $str.=" left: " . $swmenupro['main_left'] . "px; \n";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "padding-bottom:0px;\n";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.=$swmenupro['complete_background'] ? " background-color: " . $swmenupro['complete_background'] . "  ; \n" : "";
      $str.=$swmenupro['complete_width'] ? " width: " . $swmenupro['complete_width'] . "%  ; \n" : "";
    $str.=" display: block; \n";
     
     
    if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    $str.=" position: relative ; \n";
   // $str.=" margin: 0; \n";
   // $str.=" z-index: 199; \n";
    $str.="}\n";

    $str.=".ddmx" . $swmenupro['id'] . " a.item1,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1:hover,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1-active:hover {\n";
    $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    //$str.=" top: ".$swmenupro['main_top']."px  ; \n";
    //$str.=" left: ".$swmenupro['main_left']."px; \n";
    $str.=" font-size: " . $swmenupro['main_font_size'] . "px  ; \n";
    $str.=" font-family: " . $swmenupro['font_family'] . "  ; \n";
    $str.=" text-align: " . $swmenupro['main_align'] . "  ; \n";
    $str.=" font-weight: " . $swmenupro['font_weight'] . "  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  ; \n" : "";

    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }


   if ( @$swmenupro['t_auto_border']) {
          if (($swmenupro['orientation'] == "vertical/left" || $swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical")) {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
        }else{
             $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-right: 0; \n";
            
            }
    } else {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
      
    }



    //$str.=" text-decoration: none  ; \n";
    $str.=" display: block; \n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=" position: relative !important; \n";
  //  $str.=" z-index: 200; \n";
    $str.= $swmenupro['top_margin_top'] ? " margin-top: " . $swmenupro['top_margin_top'] . "px ;\n" : "margin-top: 0px ;\n";
    $str.= $swmenupro['top_margin_right'] ? " margin-right: " . $swmenupro['top_margin_right'] . "px ;\n" : "margin-right: 0px ;\n";
    $str.= $swmenupro['top_margin_bottom'] ? " margin-bottom: " . $swmenupro['top_margin_bottom'] . "px ;\n" : "margin-bottom: 0px ;\n";
    $str.= $swmenupro['top_margin_left'] ? " margin-left: " . $swmenupro['top_margin_left'] . "px ;\n" : "margin-left: 0px ;\n";
    $str.=$swmenupro['main_back_image'] ? " background-image: URL(\"" . $swmenupro['main_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image'] ? " background-repeat:" . $swmenupro['top_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-position:" . $swmenupro['top_background_position'] . " ;\n" : "";
    if ($swmenupro['main_width'] != 0) {
        $str.= " width:" . $swmenupro['main_width'] . "px; \n";
    }
    if ($swmenupro['main_height'] != 0) {
        $str.= " height:" . $swmenupro['main_height'] . "px; \n";
    }
    $str.=$swmenupro['main_back'] ? " background-color: " . $swmenupro['main_back'] . "  ; \n" : "";
    if ($swmenupro['t_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ttl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ttr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ttl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['ttr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
    }
    $str.="}\n";

    $str.=".ddmx" . $swmenupro['id'] . " td.item11.last a.item1-active,\n";
    $str.=".ddmx" . $swmenupro['id'] . " td.item11.last a.item1 {\n";
   $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    
    $str.="}\n";




    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover ,\n";
  //  $str.= ".ddmx" . $swmenupro['id'] . " .last a:hover,\n";
  //  $str.= ".ddmx" . $swmenupro['id'] . " .acton.last a,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover{\n";
 $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=$swmenupro['main_over'] ? " background-color: " . $swmenupro['main_over'] . "  ; \n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-image: URL(\"" . $swmenupro['main_back_image_over'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image_over'] ? " background-repeat:" . $swmenupro['top_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-position:" . $swmenupro['top_hover_background_position'] . " ;\n" : "";
    
    $str.="}\n";


    $str.= ".ddmx" . $swmenupro['id'] . " .item11:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.last:hover,\n";
    //$str.= ".ddmx".$swmenupro['id']." .item11.acton.last a.item1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton a.item1,\n";
    //$str.= ".ddmx".$swmenupro['id']." .item11.acton.last a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11 a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.last a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover {\n";
    //$str.= is_file($absolute_path."/".$swmenupro['main_back_image_over']) ? "background-image: URL(\"".$live_site."/".$swmenupro['main_back_image_over']."\") ;\n":"background-image:none !important;\n";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . "  ; \n" : "";
    //$str.=$swmenupro['main_over']?" background-color: ".$swmenupro['main_over']." !important ; \n":"";
    $str.="}\n";



    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1 {\n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=$swmenupro['active_background_image'] ? " background-image: URL(\"" . $swmenupro['active_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['active_background_image'] ? " background-repeat:" . $swmenupro['active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['active_background_image'] ? " background-position:" . $swmenupro['active_background_position'] . " ;\n" : "";
    $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . " ; \n" : "";
    $str.=$swmenupro['active_font'] ? " color: " . $swmenupro['active_font'] . " !important ; \n" : "";
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " span.item2.level1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.level1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.level1:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.level1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.level1:hover {\n";
    $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
    $str.= " font-size: " . $swmenupro['sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['sub_font_family'] . " ; \n";
    $str.= " text-align: " . $swmenupro['sub_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['font_weight_over'] . "  ; \n";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    $str.= " display: block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . " ; \n";
    $str.= " position: relative; \n";
    $str.= " z-index:1000; \n";

    if ($swmenupro['sub_height'] != 0) {
        $str.= " height:" . $swmenupro['sub_height'] . "px; \n";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ") \n";
    $str.="}\n";
    
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2 {\n";
    if ($swmenupro['sub_width'] != 0) {
        $str.= " width:" . $swmenupro['sub_width'] . "px ; \n";
    }
    $str.=$swmenupro['sub_back_image'] ? " background-image: URL(\"" . $swmenupro['sub_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image'] ? " background-repeat:" . $swmenupro['sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image'] ? " background-position:" . $swmenupro['sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_back'] ? " background-color: " . $swmenupro['sub_back'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . "  ; \n" : "";
    if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-right: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
   if ($swmenupro['si_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['sitl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sitr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sibr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sibl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['sitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
    }
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item2.last.level1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item2.level1 ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.level1 ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.level1 {\n";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
   
    $str.= " z-index:500; \n";
     if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        $ctext.="0 ";
        $ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
    // @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";

   
         $str.= ".ddmx" . $swmenupro['id'] . " a.item2.subactive.level1  ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item2-active.subactive.level1 ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item2.level1:hover ,\n";
  $str.= ".ddmx" . $swmenupro['id'] . " .section a.item2.level1:hover,\n";
  $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.level1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.subactive.level1:hover {\n";
    
    $str.=$swmenupro['sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['sub_back_image_over'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image_over'] ? " background-repeat:" . $swmenupro['sub_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image_over'] ? " background-position:" . $swmenupro['sub_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_over'] ? " background-color: " . $swmenupro['sub_over'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . "  ; \n" : "";
  
    $str.= "}\n";
    
    

   //  $str.= ".ddmx" . $swmenupro['id'] . " .item2.subactive ,\n";
      $str.= ".ddmx" . $swmenupro['id'] . " a.item2.subactive.level1  ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item2-active.subactive.level1 ,\n";
 //   $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item2.level1:hover ,\n";
   // $str.= ".ddmx" . $swmenupro['id'] . " .section a.item2.level1:hover,\n";
   // $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.level1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.subactive.level1:hover {\n";
    
    $str.=$swmenupro['sub_active_background_image'] ? " background-image: URL(\"" . $swmenupro['sub_active_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_active_background_image'] ? " background-repeat:" . $swmenupro['sub_active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_active_background_image'] ? " background-position:" . $swmenupro['sub_active_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_active_background'] ? " background-color: " . $swmenupro['sub_active_background'] . "  ; \n" : "";
    $str.=$swmenupro['sub_active_font'] ? " color: " . $swmenupro['sub_active_font'] . "  ; \n" : "";
  
    $str.= "}\n";
    
    
    
    
     $str.= ".ddmx" . $swmenupro['id'] . " a.item2.levelX,\n";
   // $str.= ".ddmx" . $swmenupro['id'] . " a.item2.levelX:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.levelX{\n";
  //  $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.levelX:hover {\n";
     $str.= $swmenupro['levelx_sub_back_image'] ? " background-image: URL(\"" . $swmenupro['levelx_sub_back_image'] . "\") !important ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['levelx_sub_back'] ? " background-color: " . $swmenupro['levelx_sub_back'] . " !important ; \n" : "";
    $str.=$swmenupro['levelx_sub_font_color'] ? " color: " . $swmenupro['levelx_sub_font_color'] . " !important ; \n" : "";
   
   $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['levelx_sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['levelx_sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['levelx_sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['levelx_sub_pad_left'] . "px;\n" : "";
    $str.= " font-size: " . $swmenupro['levelx_sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['levelx_sub_font_family'] . " ; \n";
    $str.= " text-align: " . $swmenupro['levelx_sub_font_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['levelx_sub_font_weight'] . "  ; \n";
    switch ($swmenupro['levelx_sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['levelx_sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['levelx_sub_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['levelx_sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    $str.= " display: block; \n";
    $str.=" white-space: " . $swmenupro['levelx_sub_font_wrap'] . " ; \n";
    $str.= " position: relative; \n";
    $str.= " z-index:1000; \n";

    if ($swmenupro['sub_height'] != 0) {
      //  $str.= " height:" . $swmenupro['sub_height'] . "px; \n";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ") \n";
    $str.="}\n";
    
  

  //  $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.last.levelX,\n";
  //  $str.= ".ddmx" . $swmenupro['id'] . " a.item2.last.levelX {\n";
//	$str.= is_file($absolute_path."/".$swmenupro['sub_back_image']) ? " background-image: URL(\"".$live_site."/".$swmenupro['sub_back_image']."\") ;\n":"";
//	$str.=$swmenupro['sub_back']?" background-color: ".$swmenupro['sub_back']." !important ; \n":"";
    //$str.=$swmenupro['sub_font_color']?" color: ".$swmenupro['sub_font_color']." !important ; \n":"";
    //$str.= " border-bottom: " . $swmenupro['sub_border_over'] . " !important ; \n";
 //   $str.= " z-index:500; \n";
  //  $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item2-active.levelX ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item2.levelX:hover ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .section a.item2.levelX:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.levelX,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.levelX:hover {\n";
    $str.= $swmenupro['levelx_sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['levelx_sub_back_image_over'] . "\") !important ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['levelx_sub_over'] ? " background-color: " . $swmenupro['levelx_sub_over'] . " !important ; \n" : "";
    $str.=$swmenupro['levelx_sub_font_color_over'] ? " color: " . $swmenupro['levelx_sub_font_color_over'] . " !important ; \n" : "";
   
    $str.= "}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " .section {\n";
   $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xot_border'])) ? " border-top: " . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xor_border'])) ? " border-right:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xob_border'])) ? " border-bottom:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xol_border'])) ? " border-left:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    
    $str.= " position: absolute; \n";
    $str.= " visibility: hidden; \n";
    $str.= " display: block; \n";
    $str.= " z-index: -1; \n";
    // $str.="float:left !important;\n";
    //if ($swmenupro['sub_width']!=0){$str.= " width:".$swmenupro['sub_width']."px !important; \n";}
    //$str.=$swmenupro['levelx_sub_back']?" background-color: ".$swmenupro['levelx_sub_back']." !important ; \n":"";
    $str.="}\n";
    
    $str.= ".ddmx" . $swmenupro['id'] . " .section.level1 {\n";
   //$str.="width:100%;\n";
   //$str.="float:left !important;\n";
   // $str.= $swmenupro['sub_back_image2'] ? " background-image: URL(\"" . $swmenupro['sub_back_image2'] . "\") ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['sub_back']?" background-color: ".$swmenupro['sub_back']." !important ; \n":"";
    $str.="}\n";
   
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton.last .item1 img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton .item1 img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " img.seq1\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active:hover img.seq2\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton.last .item1 img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton .item1 img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover img.seq1\n";

    $str.= "{\n";
    $str.= " display:   none; \n";
    $str.="}\n";

    $str.= "* html .ddmx" . $swmenupro['id'] . " td { position: relative; } /* ie 5.0 fix */\n";
    //$str.="-->\n";
    //$str.="</style>\n";

    $str.=".ddmx" . $swmenupro['id'] . " .item2-active img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item2 img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item1-active img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item1 img{\n";
    $str.=" border:none;\n";
    $str.="}\n";


   
    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            $str.=mygosu_customcss($ordered, $ordered[$i], $swmenupro['id'], "");
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
            $str.=mygosu_customcss($ordered, $ordered[$i], $swmenupro['id'], ":hover");
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }

   
    return $str;
}

function clicktrans_customcss($ordered, $item, $id, $class) {
    $str = "";

    $itemtop = $item;
    $subcount = 0;
    $subcount2 = 0;
    $clname = "";
    for ($i = 0; $i < (count($ordered) - 1); $i++) {
        if (($item['PARENT'] == $ordered[$i]['PARENT']) && ($ordered[$i]['ORDER'] == 1)) {
            $itemtop = $ordered[$i];
        }
        if ($ordered[$i]["ID"] == $itemtop['ID']) {
            $subcount2 = $subcount;
        }
        if ((@$ordered[($i + 1)]['PARENT'] == $ordered[$i]['ID'] && $ordered[$i + 1]['indent'] > 1)) {
            $subcount++;
        }
    }
    $clname = "#TransMenu" . ($subcount2 - 1) . "-" . ($item['ORDER'] - 1);
    if ($class) {
        $str.=$clname . $class . " {\n";
    } else {
        $str.=$clname . $class . " {\n";
    }

    return $str;
}

function AccordianStyle($swmenupro, $ordered) {
   $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
    if (substr($swmenupro['main_back_image'], 0, 1) == "/") {
        $swmenupro['main_back_image'] = substr($swmenupro['main_back_image'], 1, (strlen($swmenupro['main_back_image']) - 1));
    }
    if (substr($swmenupro['main_back_image_over'], 0, 1) == "/") {
        $swmenupro['main_back_image_over'] = substr($swmenupro['main_back_image_over'], 1, (strlen($swmenupro['main_back_image_over']) - 1));
    }
    if (substr($swmenupro['sub_back_image'], 0, 1) == "/") {
        $swmenupro['sub_back_image'] = substr($swmenupro['sub_back_image'], 1, (strlen($swmenupro['sub_back_image']) - 1));
    }
    if (substr($swmenupro['sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['sub_back_image_over'] = substr($swmenupro['sub_back_image_over'], 1, (strlen($swmenupro['sub_back_image_over']) - 1));
    }
    if (substr($swmenupro['active_background_image'], 0, 1) == "/") {
        $swmenupro['active_background_image'] = substr($swmenupro['active_background_image'], 1, (strlen($swmenupro['active_background_image']) - 1));
    }


    $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
    $swmenupro['main_back_image'] = $swmenupro['main_back_image'] ? $live_site . "/" . $swmenupro['main_back_image'] : "";
    $swmenupro['main_back_image_over'] = $swmenupro['main_back_image_over'] ? $live_site . "/" . $swmenupro['main_back_image_over'] : "";
    $swmenupro['sub_back_image'] = $swmenupro['sub_back_image'] ? $live_site . "/" . $swmenupro['sub_back_image'] : "";
    $swmenupro['sub_back_image_over'] = $swmenupro['sub_back_image_over'] ? $live_site . "/" . $swmenupro['sub_back_image_over'] : "";
    $swmenupro['active_background_image'] = $swmenupro['active_background_image'] ? $live_site . "/" . $swmenupro['active_background_image'] : "";

    //<style type="text/css">
    //<!--

    $str = "#menu" . $swmenupro['id'] . " table,\n";

    //$str.= "#subwrap".$swmenupro['id']." table,\n";
    //$str.= "#subwrap".$swmenupro['id']." ,\n";
    $str.= "#menu" . $swmenupro['id'] . ",\n";
    $str.= "#menu" . $swmenupro['id'] . " tr,\n";
    $str.= "#menu" . $swmenupro['id'] . " td{\n";
    //$str.= "#subwrap".$swmenupro['id']." tr,\n";
    //$str.= "#subwrap".$swmenupro['id']." td{\n";
    $str.= "border:0 !important; \n";
    // $str.= " overflow:hidden; \n";
    // $str.= " left:-1000px; \n";
    // $str.= " top:-1000px; \n";
    $str.= "}\n";

    $str.="#click-menu" . $swmenupro['id'] . " { \n";
    
     $str.=" top: " . $swmenupro['main_top'] . "px  ; \n";
    $str.=" left: " . $swmenupro['main_left'] . "px; \n";
    if ($swmenupro['main_width'] != 0) {
        $str.= "width:" . $swmenupro['main_width'] . "px  !important  ; \n";
    }
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.=$swmenupro['complete_background'] ? " background-color: " . $swmenupro['complete_background'] . "  ; \n" : "";
    $str.=" display: block; \n";
     
     
    if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    $str.=" position: relative ; \n";
    $str.=" z-index: 199; \n";
      $str.="}\n";
   
    $str.="#click-menu" . $swmenupro['id'] . " .inbox1 {\n";
    //$str.=" position:relative; \n";
     if ( @$swmenupro['t_auto_border']) {
     $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
      
    }
    //$str.=" border: ". $swmenupro['main_border_over']." !important ; \n";
   $str.= $swmenupro['top_margin_top'] ? " margin-top: " . $swmenupro['top_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_right'] ? " margin-right: " . $swmenupro['top_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_bottom'] ? " margin-bottom: " . $swmenupro['top_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_left'] ? " margin-left: " . $swmenupro['top_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-image: URL(\"" . $swmenupro['main_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image'] ? " background-repeat:" . $swmenupro['top_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-position:" . $swmenupro['top_background_position'] . " ;\n" : "";
    $str.=$swmenupro['main_back'] ? " background-color: " . $swmenupro['main_back'] . "; \n" : "";
    $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    if ($swmenupro['main_height'] != 0) {
        $str.= "height:" . $swmenupro['main_height'] . "px  !important  ; \n";
    }
    $str.=" font-size: " . $swmenupro['main_font_size'] . "px   ; \n";
    $str.=" font-family: " . $swmenupro['font_family'] . "  !important  ; \n";
    $str.=" text-align: " . $swmenupro['main_align'] . "  !important  ; \n";
    $str.=" font-weight: " . $swmenupro['font_weight'] . "  !important  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  !important  ; \n" : "";
    $str.=" text-decoration: none  !important  ; \n";
  
    $str.=" display:block  !important  ; \n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " !important;\n";
            $str.=" font-style: normal !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" font-style: normal !important;\n";
            break;
        default:
            $str.=" font-style: normal !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
    }
     if ($swmenupro['t_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ttl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ttr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ttl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['ttr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
    }

    $str.="}\n";

   // if (@$swmenupro['t_auto_border']) {
    $str.="#click-menu" . $swmenupro['id'] . " .inbox1.last {\n";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    
        $str.="}\n";
   // }

    $str.="#click-menu" . $swmenupro['id'] . "  div.active .inbox1, \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1-active,\n";
    $str.="#click-menu" . $swmenupro['id'] . " .inbox1:hover{ \n";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . " !important ; \n" : "";
     $str.=$swmenupro['main_back_image_over'] ? " background-image: URL(\"" . $swmenupro['main_back_image_over'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image_over'] ? " background-repeat:" . $swmenupro['top_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-position:" . $swmenupro['top_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['main_over'] ? " background-color: " . $swmenupro['main_over'] . "    ; \n" : "";
    //$str.=" border: ". $swmenupro['main_border_over']."  !important  ; \n";
    $str.="}\n";

    $str.="#click-menu" . $swmenupro['id'] . "  div.active .inbox1.act, \n";
    $str.="#click-menu" . $swmenupro['id'] . " .inbox1.act{ \n";
//$str.="#click-menu". $swmenupro['id']."  div.active .inbox1{ \n";
     $str.=$swmenupro['active_background_image'] ? " background-image: URL(\"" . $swmenupro['active_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['active_background_image'] ? " background-repeat:" . $swmenupro['active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['active_background_image'] ? " background-position:" . $swmenupro['active_background_position'] . " ;\n" : "";
    $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . " !important; \n" : "";
    $str.=$swmenupro['active_font'] ? " color: " . $swmenupro['active_font'] . " !important ; \n" : "";
    $str.="}\n";



    $str.=" .section" . $swmenupro['id'] . " { \n";
    //$str.=" clear:both; \n";
    //$str.=" /float:left ; \n";
    $str.=" margin: 0px ; \n";
    $str.=" padding: 0px ; \n";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_width']) ? " border-top-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&($swmenupro['sub_border_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_color'] )? " border-top-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_width']) ? " border-right-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&($swmenupro['sub_border_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_color'] )? " border-right-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_width']) ? " border-bottom-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&($swmenupro['sub_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_color'] )? " border-bottom-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_width']) ? " border-left-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&($swmenupro['sub_border_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_color'] )? " border-left-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.=" position:relative; \n";
    $str.=" top: " . $swmenupro['level1_sub_top'] . "px  ; \n";
    $str.=" left: " . $swmenupro['level1_sub_left'] . "px; \n";
    //$str.=" height:300px ; \n";
    //$str.=" display:   none; \n";
//$str.=" line-height: 0px ; \n";
    $str.=" filter: alpha(opacity=" . $swmenupro['specialA'] . ");\n";
    $str.="opacity:" . ($swmenupro['specialA'] / 100) . ";\n";
    if ($swmenupro['sub_width'] != 0) {
        $str.= "width:" . $swmenupro['sub_width'] . "px  !important  ; \n";
    } else {
        $str.= "width:100% !important  ; \n";
    }

    $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2  {\n";
     if ($swmenupro['sub_height'] != 0) {
        $str.= "height:" . $swmenupro['sub_height'] . "px  !important  ; \n";
    }
    //if ($swmenupro['sub_width']!=0){$str.= "width:".$swmenupro['sub_width']."px  !important  ; \n";}
     $str.=$swmenupro['sub_back_image'] ? " background-image: URL(\"" . $swmenupro['sub_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image'] ? " background-repeat:" . $swmenupro['sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image'] ? " background-position:" . $swmenupro['sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_back'] ? " background-color: " . $swmenupro['sub_back'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . " !important ; \n" : "";
    $str.=" font-weight: " . $swmenupro['font_weight'] . " !important ; \n";
    $str.=" font-size: " . $swmenupro['sub_font_size'] . "px !important ; \n";
    $str.=" font-family: " . $swmenupro['sub_font_family'] . " !important ; \n";
    $str.=" text-align: " . $swmenupro['sub_align'] . " !important ; \n";
    $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
 if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
   
    $str.=" text-decoration: none !important ; \n";
    $str.=" margin:0px  !important  ; \n";
    $str.=" display:    block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . "; \n";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" font-style: normal !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" font-style: normal !important;\n";
            break;
        default:
            $str.=" font-style: normal !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
    }
     if ($swmenupro['si_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['sitl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sitr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sibr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sibl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['sitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
    }
  
    $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2.active, \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2:hover { \n";
    //if ($swmenupro['sub_width']!=0){$str.= "width:".$swmenupro['sub_width']."px  !important  ; \n";}
    $str.=$swmenupro['sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['sub_back_image_over'] . "\") ;\n" : "";
    $str.=$swmenupro['sub_over'] ? " background-color: " . $swmenupro['sub_over'] . " !important ; \n" : "";
    $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . " !important ; \n" : "";
    $str.=" font-weight: " . $swmenupro['font_weight'] . " !important ; \n";
    $str.=" font-size: " . $swmenupro['sub_font_size'] . "px !important ; \n";
    $str.=" font-family: " . $swmenupro['sub_font_family'] . " !important ; \n";
    $str.=" text-align: " . $swmenupro['sub_align'] . " !important ; \n";
    $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
    if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" font-style: normal !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" font-style: normal !important;\n";
            break;
        default:
            $str.=" font-style: normal !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
    }
    $str.=" margin:0px  !important  ; \n";
    $str.=" display:    block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . "; \n";
    $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2.first { \n";
    
       if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
         $ctext.="0 ";
        $ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }

   
    $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2.last { \n";
    
       if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        $ctext.="0 ";
        $ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
    // @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }

 if ( @$swmenupro['s_auto_border']) {
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    }

    $str.="}\n";

    $str.=".click-menu" . $swmenupro['id'] . " .inbox2.first.last { \n";
    
       if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }

    $str.=".click-menu" . $swmenupro['id'] . " div.active .inbox1 .seq2,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1:hover .seq2,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2:hover .seq2, \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1 .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2 .seq1 \n";
    $str.="{\n";
    $str.=" display:    block; \n";
    $str.="}\n";

    //$str.=".click-menu". $swmenupro['id']." .inbox1:hover .seq2,\n";
    //$str.=".click-menu". $swmenupro['id']." .inbox2:hover .seq2 \n";
    //$str.="{ \n";
    //$str.=" display:    block; \n";
    //$str.="} \n";
    $str.=".click-menu" . $swmenupro['id'] . " div.active .inbox1-active .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " div.active .inbox1 .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1-active .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2-active .seq2,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1:hover .seq1,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox1 .seq2,\n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2:hover .seq1, \n";
    $str.=".click-menu" . $swmenupro['id'] . " .inbox2 .seq2  \n";
    $str.="{ \n";
    $str.=" display:    none; \n";
    $str.="} \n";
    //-->
    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            $str.=clickslide_customcss($ordered, $ordered[$i], $swmenupro['id'], "");
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
            $str.=clickslide_customcss($ordered, $ordered[$i], $swmenupro['id'], ":hover");
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }
    return $str;
}

function clickslide_customcss($ordered, $item, $id, $class) {
    $str = "";

    if ($item['indent'] == 0) {

        $topcount = 0;

        for ($i = 0; $i < (count($ordered)); $i++) {
            if ($ordered[$i]['ID'] == $item['ID']) {
                $topcount = $i + 1;
            }
        }


        if ($class) {
            $str.="#topclick" . $id . ($topcount) . " a.inbox1:hover, #topclick" . $id . ($topcount) . " a.inbox1-active {\n";
        } else {
            $str.=" #topclick" . $id . ($topcount) . " a.inbox1{\n";
        }
    } else {

        if ($class) {
            $str.="#subclick" . $id . $item['ID'] . ":hover {\n";
        } else {
            $str.="#subclick" . $id . $item['ID'] . " {\n";
        }
    }
    return $str;
}

function columnMenuStyle($swmenupro,$ordered){
	
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
    if (substr($swmenupro['main_back_image'], 0, 1) == "/") {
        $swmenupro['main_back_image'] = substr($swmenupro['main_back_image'], 1, (strlen($swmenupro['main_back_image']) - 1));
    }
    if (substr($swmenupro['main_back_image_over'], 0, 1) == "/") {
        $swmenupro['main_back_image_over'] = substr($swmenupro['main_back_image_over'], 1, (strlen($swmenupro['main_back_image_over']) - 1));
    }
    if (substr($swmenupro['sub_back_image'], 0, 1) == "/") {
        $swmenupro['sub_back_image'] = substr($swmenupro['sub_back_image'], 1, (strlen($swmenupro['sub_back_image']) - 1));
    }
    if (substr($swmenupro['sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['sub_back_image_over'] = substr($swmenupro['sub_back_image_over'], 1, (strlen($swmenupro['sub_back_image_over']) - 1));
    }
    if (substr($swmenupro['levelx_sub_back_image'], 0, 1) == "/") {
        $swmenupro['levelx_sub_back_image'] = substr($swmenupro['sub_back_image2'], 1, (strlen($swmenupro['sub_back_image2']) - 1));
    }
    if (substr($swmenupro['levelx_sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['levelx_sub_back_image_over'] = substr($swmenupro['sub_back_image_over2'], 1, (strlen($swmenupro['sub_back_image_over2']) - 1));
    }
    if (substr($swmenupro['active_background_image'], 0, 1) == "/") {
        $swmenupro['active_background_image'] = substr($swmenupro['active_background_image'], 1, (strlen($swmenupro['active_background_image']) - 1));
    }


    $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
    $swmenupro['main_back_image'] = $swmenupro['main_back_image'] ? $live_site . "/" . $swmenupro['main_back_image'] : "";
    $swmenupro['main_back_image_over'] = $swmenupro['main_back_image_over'] ? $live_site . "/" . $swmenupro['main_back_image_over'] : "";
    $swmenupro['sub_back_image'] = $swmenupro['sub_back_image'] ? $live_site . "/" . $swmenupro['sub_back_image'] : "";
    $swmenupro['sub_back_image_over'] = $swmenupro['sub_back_image_over'] ? $live_site . "/" . $swmenupro['sub_back_image_over'] : "";
    $swmenupro['levelx_sub_back_image'] = $swmenupro['levelx_sub_back_image'] ? $live_site . "/" . $swmenupro['levelx_sub_back_image'] : "";
    $swmenupro['levelx_sub_back_image_over'] = $swmenupro['levelx_sub_back_image_over'] ? $live_site . "/" . $swmenupro['levelx_sub_back_image_over'] : "";
    $swmenupro['active_background_image'] = $swmenupro['active_background_image'] ? $live_site . "/" . $swmenupro['active_background_image'] : "";



     $str = "#menu" . $swmenupro['id'] . " table,\n";
    $str.= "#menu" . $swmenupro['id'] . ",\n";
    $str.= "#menu" . $swmenupro['id'] . " tr,\n";
    $str.= "#menu" . $swmenupro['id'] . " td{\n";
   // $str.= "border:0; \n";
   
    $str.= "}\n";

    $str.="#outerwrap" . $swmenupro['id'] . " {\n";
    $str.=" top: " . $swmenupro['main_top'] . "px  ; \n";
    $str.=" left: " . $swmenupro['main_left'] . "px; \n";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.=$swmenupro['complete_background'] ? " background-color: " . $swmenupro['complete_background'] . "  ; \n" : "";
    //$str.=$swmenupro['complete_width'] ? " width: " . $swmenupro['complete_width'] . "%  ; \n" : "";
    $str.=" display: block; \n";
     
     
    if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    $str.=" position: relative ; \n";
    $str.=" z-index: 199; \n";
    $str.="}\n";

    $str.=".ddmx" . $swmenupro['id'] . " a.item1,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1:hover,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1-active:hover {\n";
    $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    //$str.=" top: ".$swmenupro['main_top']."px  ; \n";
    //$str.=" left: ".$swmenupro['main_left']."px; \n";
    $str.=" font-size: " . $swmenupro['main_font_size'] . "px  ; \n";
    $str.=" font-family: " . $swmenupro['font_family'] . "  ; \n";
    $str.=" text-align: " . $swmenupro['main_align'] . "  ; \n";
    $str.=" font-weight: " . $swmenupro['font_weight'] . "  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  ; \n" : "";

    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }


     if ( @$swmenupro['t_auto_border']) {
          if (($swmenupro['orientation'] == "vertical/left" || $swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical")) {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
        }else{
             $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-right: 0; \n";
            
            }
    } else {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
      
    }



    //$str.=" text-decoration: none  ; \n";
    $str.=" display: block; \n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=" position: relative !important; \n";
    $str.=" z-index: 200; \n";
    $str.= $swmenupro['top_margin_top'] ? " margin-top: " . $swmenupro['top_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_right'] ? " margin-right: " . $swmenupro['top_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_bottom'] ? " margin-bottom: " . $swmenupro['top_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_left'] ? " margin-left: " . $swmenupro['top_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-image: URL(\"" . $swmenupro['main_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image'] ? " background-repeat:" . $swmenupro['top_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-position:" . $swmenupro['top_background_position'] . " ;\n" : "";
    if ($swmenupro['main_width'] != 0) {
        $str.= " width:" . $swmenupro['main_width'] . "px; \n";
    }
    if ($swmenupro['main_height'] != 0) {
        $str.= " height:" . $swmenupro['main_height'] . "px; \n";
    }
    $str.=$swmenupro['main_back'] ? " background-color: " . $swmenupro['main_back'] . "  ; \n" : "";
    if ($swmenupro['t_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ttl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ttr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ttl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['ttr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
    }
    $str.="}\n";

    $str.=".ddmx" . $swmenupro['id'] . "  a.item1.last:hover,\n";
    $str.=".ddmx" . $swmenupro['id'] . "  a.item1-active.last,\n";
    $str.=".ddmx" . $swmenupro['id'] . "  a.item1.last {\n";
   if (($swmenupro['orientation'] == "vertical/left" || $swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical")) {
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        }else{
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        
            }
    $str.="}\n";




    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover ,\n";
   // $str.= ".ddmx" . $swmenupro['id'] . " .last a:hover,\n";
 //   $str.= ".ddmx" . $swmenupro['id'] . " .acton.last a,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover{\n";
 $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=$swmenupro['main_over'] ? " background-color: " . $swmenupro['main_over'] . "  ; \n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-image: URL(\"" . $swmenupro['main_back_image_over'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image_over'] ? " background-repeat:" . $swmenupro['top_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-position:" . $swmenupro['top_hover_background_position'] . " ;\n" : "";
    
    $str.="}\n";


  //  $str.= ".ddmx" . $swmenupro['id'] . " .item11:hover,\n";
  //  $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton:hover,\n";
  //  $str.= ".ddmx" . $swmenupro['id'] . " .item11.last:hover,\n";
    //$str.= ".ddmx".$swmenupro['id']." .item11.acton.last a.item1,\n";
 //   $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton a.item1,\n";
    //$str.= ".ddmx".$swmenupro['id']." .item11.acton.last a:hover,\n";
//    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11 a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.last a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover {\n";
    //$str.= is_file($absolute_path."/".$swmenupro['main_back_image_over']) ? "background-image: URL(\"".$live_site."/".$swmenupro['main_back_image_over']."\") ;\n":"background-image:none !important;\n";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . "  ; \n" : "";
    //$str.=$swmenupro['main_over']?" background-color: ".$swmenupro['main_over']." !important ; \n":"";
    $str.="}\n";



    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1 {\n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=$swmenupro['active_background_image'] ? " background-image: URL(\"" . $swmenupro['active_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['active_background_image'] ? " background-repeat:" . $swmenupro['active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['active_background_image'] ? " background-position:" . $swmenupro['active_background_position'] . " ;\n" : "";
    $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . " ; \n" : "";
    $str.=$swmenupro['active_font'] ? " color: " . $swmenupro['active_font'] . " !important ; \n" : "";
    $str.="}\n";

  
    
    
    
    
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.level1{\n";
    $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
    $str.= " font-size: " . $swmenupro['sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['sub_font_family'] . " ; \n";
    $str.= " text-align: " . $swmenupro['sub_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['font_weight_over'] . "  ; \n";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    $str.= " display: block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . " ; \n";
    $str.= " position: relative; \n";
    $str.= " z-index:1000; \n";

    if ($swmenupro['sub_height'] != 0) {
        $str.= " height:" . $swmenupro['sub_height'] . "px; \n";
    }
    
     if ($swmenupro['sub_width'] != 0) {
        $str.= " width:" . $swmenupro['sub_width'] . "px ; \n";
    }
    $str.=$swmenupro['sub_back_image'] ? " background-image: URL(\"" . $swmenupro['sub_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image'] ? " background-repeat:" . $swmenupro['sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image'] ? " background-position:" . $swmenupro['sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_back'] ? " background-color: " . $swmenupro['sub_back'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . "  ; \n" : "";
   if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-right: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
     if ($swmenupro['si_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['sitl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sitr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sibr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sibl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['sitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ") \n";
    $str.="}\n";
    
    
 
	$str.= ".ddmx".$swmenupro['id']." a.item2-active.level1,\n";
	$str.= ".ddmx".$swmenupro['id']." a.item2.level1:hover {\n";
    $str.=$swmenupro['sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['sub_back_image_over'] . "\") ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['sub_back_image_over'] ? " background-repeat:" . $swmenupro['sub_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image_over'] ? " background-position:" . $swmenupro['sub_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_over'] ? " background-color: " . $swmenupro['sub_over'] . " !important ; \n" : "";
    $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . " !important ; \n" : "";
  
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.level1.last,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.level1.last {\n";
     $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= " z-index:500; \n";
     if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
         $ctext.="0 ";
         @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        $ctext.="0 ";
       
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
    // @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    // @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";
    
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.level1.first,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.level1.first {\n";
    if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
           @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
       $ctext.="0 ";
       $ctext.="0 ";
         @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    // @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
   //  @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";
    
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.level1.first.last,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.level1.first.last {\n";
    if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";


    
    $str.= ".ddmx" . $swmenupro['id'] . " .levelx_outer{\n";
    $str.=$swmenupro['levelx_sub_back_image'] ? " background-image: URL(\"" . $swmenupro['levelx_sub_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['levelx_sub_back_image'] ? " background-repeat:" . $swmenupro['levelx_sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['levelx_sub_back_image'] ? " background-position:" . $swmenupro['levelx_sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['levelx_sub_back'] ? " background-color: " . $swmenupro['levelx_sub_back'] . "  ; \n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xot_border'])) ? " border-top: " . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xor_border'])) ? " border-right:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xob_border'])) ? " border-bottom:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_outside_border_width'])&&($swmenupro['levelx_outside_border_style']!="none")&&($swmenupro['xol_border'])) ? " border-left:" . $swmenupro['levelx_outside_border_width'] . "px  ".$swmenupro['levelx_outside_border_style']." ".$swmenupro['levelx_outside_border_color']."  !important;\n" : "";
     $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ") \n";
    $str.="}\n";
    
     $str.= ".ddmx" . $swmenupro['id'] . " .levelx_outer.first{\n";
    if ($swmenupro['x_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['xtl_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
        $ctext.="0 ";
       $ctext.="0 ";
        @$swmenupro['xbl_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['xtl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['x_corner_size']."px; \n":"";
    // @$swmenupro['xtr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['x_corner_size']."px; \n":"";
    // @$swmenupro['xbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['x_corner_size']."px; \n":"";
    }
    $str.="}\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .levelx_outer.last{\n";
    if ($swmenupro['x_corner_style'] == 'curvycorner') {
        $ctext="";
     $ctext.="0 ";
        @$swmenupro['xtr_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xbr_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
       $ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
   //  @$swmenupro['xtl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xtr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['x_corner_size']."px; \n":"";
  //   @$swmenupro['xbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['x_corner_size']."px; \n":"";
    }
    $str.="}\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .levelx_outer.last.first{\n";
    if ($swmenupro['x_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['xtl_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xtr_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xbr_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xbl_corner']?$ctext.=$swmenupro['x_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['xtl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xtr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['x_corner_size']."px; \n":"";
     @$swmenupro['xbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['x_corner_size']."px; \n":"";
    }
    $str.="}\n";
       
     $str.= ".ddmx" . $swmenupro['id'] . " a.item2.levelx{\n";
    $str.= $swmenupro['levelx_sub_pad_top'] ? " padding-top: " . $swmenupro['levelx_sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['levelx_sub_pad_right'] ? " padding-right: " . $swmenupro['levelx_sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['levelx_sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['levelx_sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['levelx_sub_pad_left'] ? " padding-left: " . $swmenupro['levelx_sub_pad_left'] . "px;\n" : "";
    $str.= " font-size: " . $swmenupro['levelx_sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['levelx_sub_font_family'] . " ; \n";
    $str.= " text-align: " . $swmenupro['levelx_sub_font_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['levelx_sub_font_weight'] . "  ; \n";
    $str.=$swmenupro['levelx_sub_font_color'] ? " color: " . $swmenupro['levelx_sub_font_color'] . " !important ; \n" : "";
    switch ($swmenupro['levelx_sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['levelx_sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['levelx_sub_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['levelx_sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    $str.= " display: block; \n";
    $str.=" white-space: " . $swmenupro['levelx_sub_font_wrap'] . " ; \n";
    $str.= " position: relative; \n";
    $str.= " z-index:1000; \n";

    if ($swmenupro['sub_height'] != 0) {
      //  $str.= " height:" . $swmenupro['sub_height'] . "px; \n";
    }
     if ( @$swmenupro['x_auto_border']) {
     $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xot_border'])) ? " border-top: " . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xor_border'])) ? " border-right:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xol_border'])) ? " border-left:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.="border-bottom:0;\n";
    }else{
        $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xot_border'])) ? " border-top: " . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xor_border'])) ? " border-right:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xob_border'])) ? " border-bottom:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xol_border'])) ? " border-left:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
      
       }
        if ($swmenupro['xi_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['xitl_corner']?$ctext.=$swmenupro['xi_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xitr_corner']?$ctext.=$swmenupro['xi_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xibr_corner']?$ctext.=$swmenupro['xi_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['xibl_corner']?$ctext.=$swmenupro['xi_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['xitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['xi_corner_size']."px; \n":"";
     @$swmenupro['xitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['xi_corner_size']."px; \n":"";
     @$swmenupro['xibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['xi_corner_size']."px; \n":"";
     @$swmenupro['xibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['xi_corner_size']."px; \n":"";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ") \n";
    $str.="}\n";
    
    
     $str.= ".ddmx".$swmenupro['id']." .item2.levelx.last{\n";
     $str.= (($swmenupro['levelx_inside_border_width'])&&($swmenupro['levelx_inside_border_style']!="none")&&($swmenupro['xob_border'])) ? " border-bottom:" . $swmenupro['levelx_inside_border_width'] . "px  ".$swmenupro['levelx_inside_border_style']." ".$swmenupro['levelx_inside_border_color']."  !important;\n" : "";
    $str.="}\n";
     
     
     
     
  $str.= ".ddmx".$swmenupro['id']." a.item2-active.levelx,\n";
	$str.= ".ddmx".$swmenupro['id']." a.item2.levelx:hover {\n";
    $str.=$swmenupro['levelx_sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['levelx_sub_back_image_over'] . "\") ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['levelx_sub_back_image_over'] ? " background-repeat:" . $swmenupro['levelx_sub_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['levelx_sub_back_image_over'] ? " background-position:" . $swmenupro['levelx_sub_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['levelx_sub_over'] ? " background-color: " . $swmenupro['levelx_sub_over'] . " !important ; \n" : "";
    $str.=$swmenupro['levelx_sub_font_color_over'] ? " color: " . $swmenupro['levelx_sub_font_color_over'] . " !important ; \n" : "";
 
    $str.="}\n";
  

    $str.= ".ddmx" . $swmenupro['id'] . " .section {\n";
  //  $str.= " border: " . $swmenupro['sub_border'] . " ; \n";
    //$str.="float:left;";
    $str.= " position: absolute; \n";
    $str.= " visibility: hidden; \n";
   // $str.= " display: block; \n";
    $str.= " z-index: -1; \n";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_width']) ? " border-top-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&($swmenupro['sub_border_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_color'] )? " border-top-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_width']) ? " border-right-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&($swmenupro['sub_border_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_color'] )? " border-right-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_width']) ? " border-bottom-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&($swmenupro['sub_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_color'] )? " border-bottom-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_width']) ? " border-left-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&($swmenupro['sub_border_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_color'] )? " border-left-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.="}\n";
    
   
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton.last .item1 img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton .item1 img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " img.seq1\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active:hover img.seq2\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton.last .item1 img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton .item1 img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover img.seq1\n";

    $str.= "{\n";
    $str.= " display:   none; \n";
    $str.="}\n";

    $str.= "* html .ddmx" . $swmenupro['id'] . " td { position: relative; } /* ie 5.0 fix */\n";
    //$str.="-->\n";
    //$str.="</style>\n";

    $str.=".ddmx" . $swmenupro['id'] . " .item2-active img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item2 img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item1-active img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item1 img{\n";
    $str.=" border:none;\n";
    $str.="}\n";


   
    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            $str.=mygosu_customcss($ordered, $ordered[$i], $swmenupro['id'], "");
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
            $str.=mygosu_customcss($ordered, $ordered[$i], $swmenupro['id'], ":hover");
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }

   
    return $str;
	
}

function mygosuTreeMenuStyle($swmenupro, $ordered) {
  
   
   $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
   $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
   
    $str="";

    $str.="#menu" . $swmenupro['id'] . " {\n";
   //  $str.="#tree-outer" . $swmenupro['id'] . " {\n";
    //$str.=" list-style: none;\n";
    //$str.=" margin: 0 0 0 ".$swmenupro['level1_sub_left'].'px'.";\n";
    //$str.=" padding: 0px 0 0 0;\n";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    if ($swmenupro['main_width'] != 0) {
        $str.= " width:" . $swmenupro['main_width'] . "px; \n";
    }
    $str.=$swmenupro['complete_background']?" background-color: " . $swmenupro['complete_background'] . ";":"";
     $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
     if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview, .tree-menu" . $swmenupro['id'] . ".treeview ul {\n";
    $str.=" list-style: none;\n";
    //$str.=" margin: 0 0 0 ".$swmenupro['level1_sub_left'].'px'.";\n";
    //$str.=" padding: 0px 0 0 0;\n";
    //$str.=" width: ".$swmenupro['main_width'].'px'.";\n";
    //  $str.=" background-color: ".$swmenupro['main_back'].";\n";
    //$str.=$swmenupro['main_back_image'] ? "background-image: URL(\"".$swmenupro['main_back_image']."\")  ; \n":"";
    $str.="}\n";


    $str.=".tree-menu" . $swmenupro['id'] . ".treeview ul {\n";
    //$str.=" list-style-type: none;\n";
   // $str.=" font-family: " . $swmenupro['font_family'] . ";\n";
   // $str.=" font-size: " . $swmenupro['main_font_size'] . 'px' . ";\n";
   // $str.=" text-decoration: none;\n";
   // $str.=" color: " . $swmenupro['main_font_color'] . ";\n";
   // $str.=" font-weight: " . $swmenupro['font_weight'] . ";\n";
   // $str.=" text-align: " . $swmenupro['main_align'] . ";\n";
    //$str.=" width: ".$swmenupro['main_width'].'px'.";\n";
    //$str.=" line-height: 16px;\n";


    $str.=" margin: 0;\n";
    $str.=" padding: 0;\n";
    $str.="}\n";

   // $str.=".tree-menu" . $swmenupro['id'] . ".treeview a {\n";
    //$str.=" list-style-type: none;\n";
   // $str.=" font-family: " . $swmenupro['font_family'] . ";\n";
   // $str.=" font-size: " . $swmenupro['main_font_size'] . 'px' . ";\n";
   // $str.=" text-decoration: none;\n";
   // $str.=" color: " . $swmenupro['main_font_color'] . ";\n";
   // $str.=" font-weight: " . $swmenupro['font_weight'] . ";\n";
   // $str.=" text-align: " . $swmenupro['main_align'] . ";\n";
    //$str.=" width: ".$swmenupro['main_width'].'px'.";\n";
    //$str.=" line-height: 16px;\n";
    //$str.=" border: ".$swmenupro['main_border']."; \n";
    //$str.=" background-color: ".$swmenupro['main_back'].";\n";
    // $str.=$swmenupro['main_back_image'] ? "background-image: URL(\"".$swmenupro['main_back_image']."\")  ; \n":"";
    //$str.=" margin: 0;\n";
    //$str.=" padding: 0;\n";
   // $str.="}\n";



    $str.=".tree-menu" . $swmenupro['id'] . ".treeview .hitarea {\n";
    $str.=" background: url(" . $live_site."/images/swmenupro/tree_lines/treeview-".$swmenupro['tree_lines'] . ".gif) -64px -25px no-repeat;\n";
    //$str.=" background: url(" . $live_site . "/modules/mod_swmenupro/images/treeview-default.gif) -64px -25px no-repeat;\n";
    $str.=" height: 16px;\n";
    $str.=" width: 16px;\n";
    $str.=" margin-left: -16px;\n";
    $str.=" float:left;\n";
    $str.=" cursor:pointer;\n";
    $str.="}\n";

    $str.="* html .hitarea {\n";
    $str.=" display:inline;\n";
    $str.=" float:none; \n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li {\n";
    $str.=" margin: 0;\n";

    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview a:hover {\n";
    $str.="background-color: transparent  ; \n";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . "; \n" : "";
   // $str.=" font-weight: " . $swmenupro['font_weight_over'] . "  ; \n";
    $str.=" cursor:pointer;\n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li {\n";
    $str.=" background: url(" . $live_site."/images/swmenupro/tree_lines/treeview-".$swmenupro['tree_lines'] . "-line.gif) 0 0 no-repeat;\n";
    //$str.=" background: url(" . $live_site . "/images/swmenu/tree_icons/treeview-default-line.gif) 0 0 no-repeat;\n";
    $str.="}\n";
    
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.tree-top" . $swmenupro['id'] . "{\n";
     $str.=" background: url(" . $live_site."/".$swmenupro['tree_top_icon'] . ") 0 0 no-repeat;\n";
 
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.collapsable,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.expandable {\n";
    $str.=" background-position: 0 -176px;\n";
    $str.="}\n";

    //  $str.=".tree-menu".$swmenupro['id'].".treeview li.collapsable,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview .expandable-hitarea {\n";
    $str.=" background-position: -80px -3px;\n";
    $str.="}\n";

    //$str.=".tree-menu".$swmenupro['id'].".treeview li.collapsable,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.last {\n";
    $str.=" background-position: 0 -1766px;\n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.lastCollapsable,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.lastExpandable {\n";
    $str.=" background: url(" . $live_site."/images/swmenupro/tree_lines/treeview-".$swmenupro['tree_lines'] . ".gif) 0 0 no-repeat;\n";
    //$str.=" background: url(" . $live_site . "/images/swmenu/tree_icons/treeview-default.gif) 0 0 no-repeat;\n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.lastCollapsable {\n";
    $str.=" background-position: 0 -111px;\n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.lastExpandable {\n";
    $str.=" background-position: -32px -67px;\n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li {\n";
   //   $str.=" margin: 0px;\n";
    $str.= $swmenupro['top_margin_top'] ? " padding-top: " . $swmenupro['top_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_right'] ? " padding-right: " . $swmenupro['top_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_bottom'] ? " padding-bottom: " . $swmenupro['top_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_left'] ? " padding-left: " . $swmenupro['top_margin_left'] . "px ;\n" : "";
    $str.="}\n";


    $str.=".tree-menu" . $swmenupro['id'] . ".treeview div.lastCollapsable-hitarea,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview div.lastExpandable-hitarea {\n";
    $str.=" background-position: 0;\n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.folder,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.file {\n";
    //$str.=" padding:1px 0 1px 16px;\n";
    $str.=" display:block;\n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.folder {\n";
    $str.=" background: url(" . $live_site."/".$swmenupro['tree_folder_open_icon'] . ") 0 0 no-repeat;\n";
   $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.expandable span.folder {\n";
    $str.=" background: url(" . $live_site."/".$swmenupro['tree_folder_icon'] . ") 0 0 no-repeat;\n";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.file {\n";
    $str.=" background: url(" . $live_site."/".$swmenupro['tree_file_icon'] . ") 0 0 no-repeat;\n";
    $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
    $str.="}\n";

    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.selected a:hover,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.selected a{\n";
    
     $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . "  ; \n" : "";
    $str.="}\n";
    
    
    
    
   // $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.folder,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.file a{\n";
   //$str.= " padding: " . $swmenupro['sub_padding'] . "  ; \n";
    $str.= " font-size: " . $swmenupro['sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['sub_font_family'] . " ; \n";
    $str.= " text-align: " . $swmenupro['sub_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['font_weight_over'] . " ; \n";
     $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . "  ; \n" : "";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    $str.= " display: block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . " ; \n";
  //  $str.=$swmenupro['sub_back_image'] ? "background-image: URL(\"".$swmenupro['sub_back_image']."\")  ; \n":"";
    $str.=$swmenupro['sub_back']?" background-color: " . $swmenupro['sub_back'] . ";":"";
    $str.="}\n";
    
     $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.file a:hover{\n";
  $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . "  ; \n" : "";
//   $str.=$swmenupro['sub_back_image_over'] ? "background-image: URL(\"".$swmenupro['sub_back_image_over']."\")  ; \n":"";
   $str.=$swmenupro['sub_over']?" background-color: " . $swmenupro['sub_over'] . ";":"";
     $str.="}\n";
    
  // $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.collapsable li.expandable span.folder a,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.folder a{\n";
    $str.=" font-size: " . $swmenupro['main_font_size'] . "px ; \n";
    $str.=" font-family: " . $swmenupro['font_family'] . "; \n";
    $str.=" text-align: " . $swmenupro['main_align'] . "  ; \n";
    $str.=" font-weight: " . $swmenupro['font_weight'] . "  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  ; \n" : "";

    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }

    $str.=" display: block; \n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
   // $str.=$swmenupro['main_back_image'] ? "background-image: URL(\"".$swmenupro['main_back_image']."\")  ; \n":"";
    $str.=$swmenupro['main_back']?" background-color: " . $swmenupro['main_back'] . ";":"";

    $str.="}\n";

   // $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.collapsable li.expandable span.folder a:hover,\n";
  //   $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.collapsable span.folder a,\n";
     $str.=".tree-menu" . $swmenupro['id'] . ".treeview span.folder a:hover{\n";
  $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . "  ; \n" : "";
 //  $str.=$swmenupro['main_back_image_over'] ? "background-image: URL(\"".$swmenupro['main_back_image_over']."\")  ; \n":"";
   $str.=$swmenupro['main_over']?" background-color: " . $swmenupro['main_over'] . ";":"";
     $str.="}\n";

    
     
    // $str.=".tree-menu" . $swmenupro['id'] . ".treeview .selected .file a:hover,\n";
    $str.=".tree-menu" . $swmenupro['id'] . ".treeview .selected a:hover,\n";
     $str.=".tree-menu" . $swmenupro['id'] . ".treeview .selected a{\n";
     // $str.="#tree" . $swmenupro['id'] .$active->id. " a{\n";
  
     $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['active_font'] . " !important  ; \n" : "";
   
    $str.=$swmenupro['sub_back']?" background-color: " . $swmenupro['active_background'] . " !important;":"";
    $str.="}\n";
    
     
     
     
     
     
     
 // $str.=".tree-menu" . $swmenupro['id'] . ".treeview li.collapsable li.expandable span.folder a{\n";
 //  $str.=$swmenupro['main_back_image'] ? "background-image: URL(\"".$swmenupro['main_back_image']."\")  ; \n":"";

  //  $str.="}\n";

    /*
     * .tree-menu125 span.folder { background: url(images/folder.gif) 0 0 no-repeat; }
      .tree-menu125 li.expandable span.folder { background: url(images/folder-closed.gif) 0 0 no-repeat; }
      .tree-menu125 span.file { background: url(images/file.gif) 0 0 no-repeat; }
     * .tree-menu125 span.folder, .tree-menu125 span.file { padding: 1px 0 1px 16px; display: block; }
      .treeview div.lastCollapsable-hitarea, .treeview div.lastExpandable-hitarea { background-position: 0; }
      .tree-menu125 li { padding: 3px 0 2px 16px; }
      .tree-menu125 span.folder, .tree-menu125 span.file { padding: 1px 0 1px 16px; display: block; }
      .tree-menu125 span.folder { background: url(images/folder.gif) 0 0 no-repeat; }
      .tree-menu125 li.expandable span.folder { background: url(images/folder-closed.gif) 0 0 no-repeat; }
      .tree-menu125 span.file { background: url(images/file.gif) 0 0 no-repeat; }
     */

    //-->
    //</style>
    
    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            $str.=" #tree" . $swmenupro['id'] . ($ordered[$i]['ID']) . " a{\n";
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
             $str.=" #tree" . $swmenupro['id'] . ($ordered[$i]['ID']) . " .selected a,\n";
            $str.=" #tree" . $swmenupro['id'] . ($ordered[$i]['ID']) . " a:hover{\n";
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }
    return $str;
}

function TreeMenuStyle($swmenupro, $ordered) {
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
   

    $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
     $str="";
    
    
    $str.= ".dtree" . $swmenupro['id'] . " {\n";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    if ($swmenupro['main_width'] != 0) {
        $str.= " width:" . $swmenupro['main_width'] . "px; \n";
    }
    $str.=$swmenupro['complete_background']?" background-color: " . $swmenupro['complete_background'] . ";":"";
     $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
     if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    $str.="}\n";

    $str.=".dtree" . $swmenupro['id'] . " img {\n";
    $str.=" border: 0px !important ; \n";
    $str.=" vertical-align: middle !important ; \n";
    $str.="}\n";

    $str.=".dtree" . $swmenupro['id'] . " a.nodeSel ,\n";
     $str.=".dtree" . $swmenupro['id'] . " a.node ,\n";
    $str.=".dtree" . $swmenupro['id'] . " a.folder {\n";
    $str.=" font-size: " . $swmenupro['main_font_size'] . "px ; \n";
    $str.=" font-family: " . $swmenupro['font_family'] . "; \n";
    $str.=" text-align: " . $swmenupro['main_align'] . "  ; \n";
    $str.=" font-weight: " . $swmenupro['font_weight'] . "  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  ; \n" : "";

    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }

   // $str.=" display: block; \n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
  //  $str.=$swmenupro['main_back_image'] ? "background-image: URL(\"".$swmenupro['main_back_image']."\")  ; \n":"";
    $str.=$swmenupro['main_back']?" background-color: " . $swmenupro['main_back'] . ";":"";
     $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    $str.="}\n";

    $str.=".dtree" . $swmenupro['id'] . " a.node, .dtree" . $swmenupro['id'] . " a.nodeSel {\n";
    $str.=" white-space: nowrap; \n";
  // $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
  //  $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
 //   $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
  //  $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
    $str.="}\n";

    $str.=".dtree" . $swmenupro['id'] . " a.node:hover, .dtree" . $swmenupro['id'] . " a.folder:hover {\n";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . "  ; \n" : "";
  // $str.=$swmenupro['main_back_image_over'] ? "background-image: URL(\"".$swmenupro['main_back_image_over']."\")  ; \n":"";
   $str.=$swmenupro['main_over']?" background-color: " . $swmenupro['main_over'] . ";":"";
    $str.="}\n";

   
    
    $str.=".dtree" . $swmenupro['id'] . " a.file {\n";
   //$str.= " padding: " . $swmenupro['sub_padding'] . "  ; \n";
    $str.= " font-size: " . $swmenupro['sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['sub_font_family'] . " ; \n";
    $str.= " text-align: " . $swmenupro['sub_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['font_weight_over'] . " ; \n";
     $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . "  ; \n" : "";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    //$str.= " display: block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . " ; \n";
  //  $str.=$swmenupro['sub_back_image'] ? "background-image: URL(\"".$swmenupro['sub_back_image']."\")  ; \n":"";
    $str.=$swmenupro['sub_back']?" background-color: " . $swmenupro['sub_back'] . ";":"";
     $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
    $str.="}\n";
    
   $str.=".dtree" . $swmenupro['id'] . " a.node.file:hover {\n";
  $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . "  ; \n" : "";
  // $str.=$swmenupro['sub_back_image_over'] ? "background-image: URL(\"".$swmenupro['sub_back_image_over']."\")  ; \n":"";
   $str.=$swmenupro['sub_over']?" background-color: " . $swmenupro['sub_over'] . ";":"";
     $str.="}\n";

    $str.=".dtree" . $swmenupro['id'] . " .clip {\n";
    $str.=" overflow: hidden; \n";
    $str.="}\n";
    //-->
    //</style>
    
     $str.=".dtree" . $swmenupro['id'] . " a.nodeSel {\n";
    $str.=$swmenupro['active_font'] ? " color: " . $swmenupro['active_font'] . " !important ; \n" : "";
  //  $str.=" font-weight: " . $swmenupro['font_weight_over'] . " !important ; \n";
    $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . " !important ; \n" : "";
    $str.="}\n";

    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            $str.=" #sd" . $swmenupro['id'] . ($i + 1) . " {\n";
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
            $str.=" a.nodeSel#sd" . $swmenupro['id'] . ($i + 1) . ",\n";
            $str.=" #sd" . $swmenupro['id'] . ($i + 1) . ":hover {\n";
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }
    return $str;
}

function gosuMenuStyle($swmenupro, $ordered) {
   
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
    if (substr($swmenupro['main_back_image'], 0, 1) == "/") {
        $swmenupro['main_back_image'] = substr($swmenupro['main_back_image'], 1, (strlen($swmenupro['main_back_image']) - 1));
    }
    if (substr($swmenupro['main_back_image_over'], 0, 1) == "/") {
        $swmenupro['main_back_image_over'] = substr($swmenupro['main_back_image_over'], 1, (strlen($swmenupro['main_back_image_over']) - 1));
    }
    if (substr($swmenupro['sub_back_image'], 0, 1) == "/") {
        $swmenupro['sub_back_image'] = substr($swmenupro['sub_back_image'], 1, (strlen($swmenupro['sub_back_image']) - 1));
    }
    if (substr($swmenupro['sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['sub_back_image_over'] = substr($swmenupro['sub_back_image_over'], 1, (strlen($swmenupro['sub_back_image_over']) - 1));
    }
    if (substr($swmenupro['active_background_image'], 0, 1) == "/") {
        $swmenupro['active_background_image'] = substr($swmenupro['active_background_image'], 1, (strlen($swmenupro['active_background_image']) - 1));
    }


    $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
    $swmenupro['main_back_image'] = $swmenupro['main_back_image'] ? $live_site . "/" . $swmenupro['main_back_image'] : "";
    $swmenupro['main_back_image_over'] = $swmenupro['main_back_image_over'] ? $live_site . "/" . $swmenupro['main_back_image_over'] : "";
    $swmenupro['sub_back_image'] = $swmenupro['sub_back_image'] ? $live_site . "/" . $swmenupro['sub_back_image'] : "";
    $swmenupro['sub_back_image_over'] = $swmenupro['sub_back_image_over'] ? $live_site . "/" . $swmenupro['sub_back_image_over'] : "";
    $swmenupro['active_background_image'] = $swmenupro['active_background_image'] ? $live_site . "/" . $swmenupro['active_background_image'] : "";


    $str = "#outertable" . $swmenupro['id'] . " table,\n";
    $str.= "#outertable" . $swmenupro['id'] . " tr,\n";
    $str.= "#outertable" . $swmenupro['id'] . " td,\n";
    $str.= "#menu" . $swmenupro['id'] . " table,\n";
    $str.= "#menu" . $swmenupro['id'] . " tr,\n";
    $str.= "#menu" . $swmenupro['id'] . " td{\n";
    $str.= "border:0 !important ; \n";
   
    $str.= "}\n";

    $str.="#outerwrap" . $swmenupro['id'] . " {\n";
    $str.=" top: " . $swmenupro['main_top'] . "px  ; \n";
    $str.=" left: " . $swmenupro['main_left'] . "px; \n";
   $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.=$swmenupro['complete_background'] ? " background-color: " . $swmenupro['complete_background'] . "  ; \n" : "";
    $str.=" display: block; \n";
     
     
    if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    $str.=" position: relative ; \n";
    $str.=" z-index: 199; \n";
    $str.="}\n";

    $str.=".ddmx" . $swmenupro['id'] . " a.item1,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1:hover,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.=".ddmx" . $swmenupro['id'] . " a.item1-active:hover {\n";
    $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    //$str.=" top: ".$swmenupro['main_top']."px  ; \n";
    //$str.=" left: ".$swmenupro['main_left']."px; \n";
    $str.=" font-size: " . $swmenupro['main_font_size'] . "px  ; \n";
    $str.=" font-family: " . $swmenupro['font_family'] . "  ; \n";
    $str.=" text-align: " . $swmenupro['main_align'] . "  ; \n";
    $str.=" font-weight: " . $swmenupro['font_weight'] . "  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  ; \n" : "";

    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }


  if ( @$swmenupro['t_auto_border']) {
          if (($swmenupro['orientation'] == "vertical/left" || $swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical")) {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
        }else{
             $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-right: 0; \n";
            
            }
    } else {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
      
    }


    //$str.=" text-decoration: none  ; \n";
    $str.=" display: block; \n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=" position: relative !important; \n";
    $str.=" z-index: 200; \n";
    $str.= $swmenupro['top_margin_top'] ? " margin-top: " . $swmenupro['top_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_right'] ? " margin-right: " . $swmenupro['top_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_bottom'] ? " margin-bottom: " . $swmenupro['top_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_left'] ? " margin-left: " . $swmenupro['top_margin_left'] . "px ;\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-image: URL(\"" . $swmenupro['main_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image'] ? " background-repeat:" . $swmenupro['top_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-position:" . $swmenupro['top_background_position'] . " ;\n" : "";
    if ($swmenupro['main_width'] != 0) {
        $str.= " width:" . $swmenupro['main_width'] . "px; \n";
    }
    if ($swmenupro['main_height'] != 0) {
        $str.= " height:" . $swmenupro['main_height'] . "px; \n";
    }
    $str.=$swmenupro['main_back'] ? " background-color: " . $swmenupro['main_back'] . "  ; \n" : "";
    if ($swmenupro['t_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ttl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ttr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ttl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['ttr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
    }
    $str.="}\n";

    $str.=".ddmx" . $swmenupro['id'] . " td.item11.last a.item1-active,\n";
    $str.=".ddmx" . $swmenupro['id'] . " td.item11.last a.item1 {\n";
    if (($swmenupro['orientation'] == "vertical/left" || $swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical")) {
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        }else{
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        
            }
    $str.="}\n";




    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover ,\n";
   // $str.= ".ddmx" . $swmenupro['id'] . " .last a:hover,\n";
   // $str.= ".ddmx" . $swmenupro['id'] . " .acton.last a,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover{\n";
 $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=$swmenupro['main_over'] ? " background-color: " . $swmenupro['main_over'] . "  ; \n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-image: URL(\"" . $swmenupro['main_back_image_over'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image_over'] ? " background-repeat:" . $swmenupro['top_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-position:" . $swmenupro['top_hover_background_position'] . " ;\n" : "";
    
    $str.="}\n";


    $str.= ".ddmx" . $swmenupro['id'] . " .item11:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.last:hover,\n";
    //$str.= ".ddmx".$swmenupro['id']." .item11.acton.last a.item1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton a.item1,\n";
    //$str.= ".ddmx".$swmenupro['id']." .item11.acton.last a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11 a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.last a:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover {\n";
    //$str.= is_file($absolute_path."/".$swmenupro['main_back_image_over']) ? "background-image: URL(\"".$live_site."/".$swmenupro['main_back_image_over']."\") ;\n":"background-image:none !important;\n";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . "  ; \n" : "";
    //$str.=$swmenupro['main_over']?" background-color: ".$swmenupro['main_over']." !important ; \n":"";
    $str.="}\n";



    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .acton a.item1 {\n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=$swmenupro['active_background_image'] ? " background-image: URL(\"" . $swmenupro['active_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['active_background_image'] ? " background-repeat:" . $swmenupro['active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['active_background_image'] ? " background-position:" . $swmenupro['active_background_position'] . " ;\n" : "";
    $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . " ; \n" : "";
    $str.=$swmenupro['active_font'] ? " color: " . $swmenupro['active_font'] . " !important ; \n" : "";
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " a.item2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active:hover {\n";
    $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px;\n" : "";
    $str.= " font-size: " . $swmenupro['sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['sub_font_family'] . " ; \n";
    $str.= " text-align: " . $swmenupro['sub_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['font_weight_over'] . "  ; \n";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    $str.= " display: block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . " ; \n";
    $str.= " position: relative; \n";
    $str.= " z-index:1000; \n";

    if ($swmenupro['sub_height'] != 0) {
        $str.= " height:" . $swmenupro['sub_height'] . "px; \n";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ") \n";
    $str.="}\n";
    
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active ,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2 {\n";
    if ($swmenupro['sub_width'] != 0) {
        $str.= " width:" . $swmenupro['sub_width'] . "px ; \n";
    }
    $str.=$swmenupro['sub_back_image'] ? " background-image: URL(\"" . $swmenupro['sub_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image'] ? " background-repeat:" . $swmenupro['sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image'] ? " background-position:" . $swmenupro['sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_back'] ? " background-color: " . $swmenupro['sub_back'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . "  ; \n" : "";
    if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
   if ($swmenupro['si_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['sitl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sitr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sibr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sibl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['sitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
    }
    $str.="}\n";
    
    
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.last,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.last {\n";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= " z-index:500; \n";
     if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        $ctext.="0 ";
        $ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
    // @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";
    
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.first,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.first {\n";
    if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        $ctext.="0 ";
        $ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";
    
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active.first.last,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2.first.last {\n";
    if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";

    
    $str.= ".ddmx" . $swmenupro['id'] . " .section a.item2:hover,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active:hover {\n";
    $str.=$swmenupro['sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['sub_back_image_over'] . "\") ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['sub_back_image_over'] ? " background-repeat:" . $swmenupro['sub_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image_over'] ? " background-position:" . $swmenupro['sub_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_over'] ? " background-color: " . $swmenupro['sub_over'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . " !important ; \n" : "";
   
    $str.= "}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " .section {\n";
   $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_width']) ? " border-top-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&($swmenupro['sub_border_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_color'] )? " border-top-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_width']) ? " border-right-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&($swmenupro['sub_border_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_color'] )? " border-right-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_width']) ? " border-bottom-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&($swmenupro['sub_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_color'] )? " border-bottom-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_width']) ? " border-left-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&($swmenupro['sub_border_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_color'] )? " border-left-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= " position: absolute; \n";
    $str.= " visibility: hidden; \n";
    $str.= " display: block ; \n";
    $str.= " z-index: -1; \n";
    $str.="}\n";
   

    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton.last .item1 img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton .item1 img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " img.seq1\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2:hover img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active:hover img.seq2\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.="}\n";

    $str.= ".ddmx" . $swmenupro['id'] . " img.seq2,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton.last .item1 img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " .item11.acton .item1 img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item2-active:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1:hover img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active img.seq1,\n";
    $str.= ".ddmx" . $swmenupro['id'] . " a.item1-active:hover img.seq1\n";

    $str.= "{\n";
    $str.= " display:   none; \n";
    $str.="}\n";

    $str.= "* html .ddmx" . $swmenupro['id'] . " td { position: relative; } /* ie 5.0 fix */\n";
    //$str.="-->\n";
    //$str.="</style>\n";

    $str.=".ddmx" . $swmenupro['id'] . " .item2-active img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item2 img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item1-active img,\n";
    $str.=".ddmx" . $swmenupro['id'] . " .item1 img{\n";
    $str.=" border:none;\n";
    $str.="}\n";


    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            $str.=mygosu_customcss($ordered, $ordered[$i], $swmenupro['id'], "");
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
            $str.=mygosu_customcss($ordered, $ordered[$i], $swmenupro['id'], ":hover");
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }
    return $str;
}

function mygosu_customcss($ordered, $item, $id, $class) {

    $str = "";
    if ($item['indent'] == 0) {
        if ($class) {
            $str.=".ddmx" . $id . " td.item11.acton.last #menu" . $id . "-" . ($item['ORDER'] - 1) . ",\n";
            $str.=".ddmx" . $id . " td.item11.acton #menu" . $id . "-" . ($item['ORDER'] - 1) . ",\n";
            $str.=".ddmx" . $id . " a.item1-active#menu" . $id . "-" . ($item['ORDER'] - 1) . ",\n";
            $str.=".ddmx" . $id . " #menu" . $id . "-" . ($item['ORDER'] - 1) . $class . " {\n";
        } else {
            $str.=".ddmx" . $id . " #menu" . $id . "-" . ($item['ORDER'] - 1) . " {\n";
        }
    } else {
        $k = "-" . ($item['ORDER'] - 1);
        $cid = $item['PARENT'];
        for ($j = 0; $j < ($item['indent']); $j++) {
            for ($i = 0; $i < (count($ordered)); $i++) {
                if ($cid == $ordered[$i]['ID']) {
                    $k = "-" . ($ordered[$i]['ORDER'] - 1) . $k;
                    $cid = $ordered[$i]['PARENT'];
                    $i = count($ordered);
                }
            }
        }
        if ($class) {
            $str.=".ddmx" . $id . " td.item11.acton #menu" . $id . $k . $class . " ,\n";
            $str.=".ddmx" . $id . " a.item1-active#menu" . $id . $k . $class . " ,\n";
            $str.=".ddmx" . $id . " #menu" . $id . $k . $class . " {\n";
        } else {
            $str.=".ddmx" . $id . " #menu" . $id . $k . " {\n";
        }
    }
    return $str;
}

function superfishMenuStyle($swmenupro, $ordered) {
    $live_site =  JURI::base();
  if(substr($live_site,(strlen($live_site)-1),1)=="/"){$live_site=substr($live_site,0,(strlen($live_site)-1));}
	if(substr($live_site,(strlen($live_site)-13),13)=="administrator"){$live_site=substr($live_site,0,(strlen($live_site)-14));}

    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
    if (substr($swmenupro['main_back_image'], 0, 1) == "/") {
        $swmenupro['main_back_image'] = substr($swmenupro['main_back_image'], 1, (strlen($swmenupro['main_back_image']) - 1));
    }
    if (substr($swmenupro['main_back_image_over'], 0, 1) == "/") {
        $swmenupro['main_back_image_over'] = substr($swmenupro['main_back_image_over'], 1, (strlen($swmenupro['main_back_image_over']) - 1));
    }
    if (substr($swmenupro['sub_back_image'], 0, 1) == "/") {
        $swmenupro['sub_back_image'] = substr($swmenupro['sub_back_image'], 1, (strlen($swmenupro['sub_back_image']) - 1));
    }
    if (substr($swmenupro['sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['sub_back_image_over'] = substr($swmenupro['sub_back_image_over'], 1, (strlen($swmenupro['sub_back_image_over']) - 1));
    }
    if (substr($swmenupro['active_background_image'], 0, 1) == "/") {
        $swmenupro['active_background_image'] = substr($swmenupro['active_background_image'], 1, (strlen($swmenupro['active_background_image']) - 1));
    }


    $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
    $swmenupro['main_back_image'] = $swmenupro['main_back_image'] ? $live_site . "/" . $swmenupro['main_back_image'] : "";
    $swmenupro['main_back_image_over'] = $swmenupro['main_back_image_over'] ? $live_site . "/" . $swmenupro['main_back_image_over'] : "";
    $swmenupro['sub_back_image'] = $swmenupro['sub_back_image'] ? $live_site . "/" . $swmenupro['sub_back_image'] : "";
    $swmenupro['sub_back_image_over'] = $swmenupro['sub_back_image_over'] ? $live_site . "/" . $swmenupro['sub_back_image_over'] : "";
    $swmenupro['active_background_image'] = $swmenupro['active_background_image'] ? $live_site . "/" . $swmenupro['active_background_image'] : "";

    $str = "#sfmenu" . $swmenupro['id'] . " {\n";
   $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
     $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.=$swmenupro['complete_background'] ? " background-color: " . $swmenupro['complete_background'] . "  ; \n" : "";
if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    $str.="position: relative; \n";
   
    $str.="top: " . $swmenupro['main_top'] . "px  ; \n";
    $str.="left: " . $swmenupro['main_left'] . "px; \n";
    $str.="}\n";




    $str.=".sw-sf" . $swmenupro['id'] . ", .sw-sf" . $swmenupro['id'] . " * {\n";
    //$str.="border:".$swmenupro['main_border']." !important ; \n";
    $str.="margin: 0 ; \n";
    $str.="padding: 0 ; \n";
    $str.="list-style: none ; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " {\n";
    //$str.="height:auto; \n";
    //$str.=" border: ".$swmenupro['main_border']." !important ; \n";
    $str.="line-height: 1.0  ; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " hr {display: block; clear: left; margin: -0.66em 0; visibility: hidden;}\n";


    $str.=".sw-sf" . $swmenupro['id'] . " ul{\n";
    $str.="position: absolute; \n";
    $str.="top: -999em; \n";
    //$str.=" border: ".$swmenupro['main_border']." !important ; \n";
    //if ($swmenupro['main_width']!=0){$str.= " width:".$swmenupro['main_width']."px; \n";}else{$str.= " width:100%; \n";}
    $str.="width: 10em; \n";
    $str.="display: block; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " ul li {\n";
    //$str.="display:block; \n";
    $str.="width: 100%  ; \n";
    //$str.="height: 1px !important ; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " li:hover {\n";
    $str.="z-index:300 ; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " li:hover {\n";
    $str.="visibility: inherit ; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " li {\n";
    $str.="float: left; \n";
    $str.="position: relative; \n";
    //$str.="display: inline; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " li li{\n";
    $str.=" top: 0 ; \n";
    $str.=" left: 0; \n";
    //$str.="float: left; \n";
    $str.="position: relative; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " a {\n";
    $str.="display: block; \n";
    $str.="position: relative; \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " li:hover ul ,\n";
    $str.=".sw-sf" . $swmenupro['id'] . " li.sfHover ul {\n";
    $str.="left: 0; \n";
    $str.="top: 2.5em; \n";
    $str.="z-index: 400; \n";
    $str.="width:100%; \n";
    $str.="}\n";

    $str.="ul.sw-sf" . $swmenupro['id'] . " li:hover li ul ,\n";
    $str.="ul.sw-sf" . $swmenupro['id'] . " li.sfHover li ul {\n";
    $str.="top: -999em; \n";
    $str.="}\n";

    $str.="ul.sw-sf" . $swmenupro['id'] . " li li:hover ul ,\n";
    $str.="ul.sw-sf" . $swmenupro['id'] . " li li.sfHover ul {\n";
    $str.="left: 10em; \n";
//	if ($swmenupro['main_width']!=0){$str.= " left:".$swmenupro['main_width']."px; \n";}else{$str.= " left:100%; \n";}
    $str.="top: 0; \n";
    $str.="}\n";

    $str.="ul.sw-sf" . $swmenupro['id'] . " li li:hover li ul ,\n";
    $str.="ul.sw-sf" . $swmenupro['id'] . " li li.sfHover li ul {\n";
    $str.="top: -999em; \n";
    $str.="}\n";

    $str.="ul.sw-sf" . $swmenupro['id'] . " li li li:hover ul ,\n";
    $str.="ul.sw-sf" . $swmenupro['id'] . " li li li.sfHover ul {\n";
    $str.="left: 10em; \n";
//	if ($swmenupro['main_width']!=0){$str.= " left:".$swmenupro['main_width']."px; \n";}else{$str.= " left:100%; \n";}
    $str.="top: 0; \n";
    $str.="}\n";

   

    $str.=".sf-section" . $swmenupro['id'] . " {\n";
     $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_width']) ? " border-top-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&($swmenupro['sub_border_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_color'] )? " border-top-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_width']) ? " border-right-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&($swmenupro['sub_border_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_color'] )? " border-right-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_width']) ? " border-bottom-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&($swmenupro['sub_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_color'] )? " border-bottom-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_width']) ? " border-left-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&($swmenupro['sub_border_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_color'] )? " border-left-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    // $str.="top:" . $swmenupro['level1_sub_top'] . "px ; \n";
    //    $str.="left:" . $swmenupro['level1_sub_left'] . "px ; \n"; 
   //     $str.="position:relative; ; \n";
    $str.="}\n";

    if ($swmenupro['orientation'] == "vertical") {


        $str.=".sw-sf" . $swmenupro['id'] . ".sf-vertical, .sw-sf" . $swmenupro['id'] . ".sf-vertical li {\n";
        //if ($swmenupro['main_width']==0){$str.= "float:none; \n";}
        //$str.="float:none !important; \n";
        $str.="display:block ; \n";
        //$str.="outline:0; \n";
        //$str.=" border: ".$swmenupro['main_border']." !important ; \n";
        $str.="margin: 0  ; \n";
        if ($swmenupro['main_width'] != 0) {
            $str.= " width:" . $swmenupro['main_width'] . "px; \n";
        } else {
            $str.= "width:100%; \n";
        }
        //if ($swmenupro['main_height']!=0){$str.= " height:".$swmenupro['main_height']."px; \n";}
        $str.="}\n";

        $str.=".sw-sf" . $swmenupro['id'] . ".sf-vertical li:hover ul, .sw-sf" . $swmenupro['id'] . ".sf-vertical li.sfHover ul {\n";
        //$str.="width:auto; \n";
        if ($swmenupro['main_width'] != 0) {
            $str.= " left:" . ($swmenupro['main_width'] + $swmenupro['level1_sub_left']) . "px; \n";
        } else {
            $str.= " left:100%; \n";
        }
        $str.="top:" . $swmenupro['level1_sub_top'] . "px ; \n";
        $str.="}\n";
    } else {

        $str.=".sw-sf" . $swmenupro['id'] . " li.sfHover li , .sw-sf" . $swmenupro['id'] . " li:hover li {\n";
        //$str.="width:auto; \n";
        //if ($swmenupro['main_width']!=0){$str.= " left:".($swmenupro['main_width']+$swmenupro['level1_sub_left'])."px; \n";}else{$str.= " left:100%; \n";}
        $str.="top:" . $swmenupro['level1_sub_top'] . "px ; \n";
        $str.="left:" . $swmenupro['level1_sub_left'] . "px ; \n"; 
        $str.="display:block ; \n";
        
        $str.="}\n";
    }

    $str.=".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li {\n";
    //$str.="left: 10em !important ; \n";
    $str.="top:" . $swmenupro['level2_sub_top'] . "px ; \n";
    $str.="left:" . $swmenupro['level2_sub_left'] . "px ; \n";
    $str.="}\n";



    $str.=".sw-sf" . $swmenupro['id'] . " a.item1 {\n";
 $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    $str.=" font-size: " . $swmenupro['main_font_size'] . "px  ; \n";
    $str.=" font-family: " . $swmenupro['font_family'] . "  ; \n";
    $str.=" text-align: " . $swmenupro['main_align'] . "  ; \n";
    $str.=" font-weight: " . $swmenupro['font_weight'] . "  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  ; \n" : "";
    $str.= $swmenupro['top_margin_top'] ? " margin-top: " . $swmenupro['top_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_right'] ? " margin-right: " . $swmenupro['top_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_bottom'] ? " margin-bottom: " . $swmenupro['top_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_left'] ? " margin-left: " . $swmenupro['top_margin_left'] . "px ;\n" : "";
    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }


    
      if ( @$swmenupro['t_auto_border'] &&  $swmenupro['orientation'] == "vertical") {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else  if ( @$swmenupro['t_auto_border']) {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-right: 0; \n";
    } else {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
      
    }
  
    $str.=" display: block; \n";
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=" position: relative; \n";
    //$str.="z-index: 100; \n";
    $str.=$swmenupro['main_back_image'] ? " background-image: URL(\"" . $swmenupro['main_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image'] ? " background-repeat:" . $swmenupro['top_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-position:" . $swmenupro['top_background_position'] . " ;\n" : "";
    $str.=$swmenupro['main_back'] ? " background-color: " . $swmenupro['main_back'] . "  ; \n" : "";
    if ($swmenupro['main_width'] != 0) {
        $str.= " width:" . $swmenupro['main_width'] . "px; \n";
    }
    if ($swmenupro['main_height'] != 0) {
        $str.= " height:" . $swmenupro['main_height'] . "px; \n";
    }
    if ($swmenupro['t_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ttl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ttr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ttl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['ttr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
    }
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " a.item1.last {\n";

    if ( @$swmenupro['t_auto_border'] &&  $swmenupro['orientation'] == "vertical") {
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    } else  if ( @$swmenupro['t_auto_border']) {
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    }
    $str.="}\n";

    //$str.= ".sw-sf".$swmenupro['id']." .current a.item1,\n";
    //$str.= ".sw-sf".$swmenupro['id']." li:hover,\n";
    //$str.= ".sw-sf".$swmenupro['id']." li.sfHover,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover a.item1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " a:focus,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " a:hover ,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " a:active {\n";
    $str.=$swmenupro['main_back_image_over'] ? " background-image: URL(\"" . $swmenupro['main_back_image_over'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image_over'] ? " background-repeat:" . $swmenupro['top_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-position:" . $swmenupro['top_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . "  ; \n" : "";
    $str.=$swmenupro['main_over'] ? " background-color: " . $swmenupro['main_over'] . "  ; \n" : "";
    $str.="}\n";

    $str.= ".sw-sf" . $swmenupro['id'] . " .current  a.item1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " .current.sfHover a.item1,\n";
    //$str.= ".sw-sf".$swmenupro['id']."  li.sfHover .current a.item1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " .current a.item1:hover {\n";
    $str.=$swmenupro['active_background_image'] ? " background-image: URL(\"" . $swmenupro['active_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['active_background_image'] ? " background-repeat:" . $swmenupro['active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['active_background_image'] ? " background-position:" . $swmenupro['active_background_position'] . " ;\n" : "";
    $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . " ; \n" : "";
    $str.=$swmenupro['active_font'] ? " color: " . $swmenupro['active_font'] . "  ; \n" : "";
    $str.="}\n";



    $str.= ".sw-sf" . $swmenupro['id'] . "  a.item2 {\n";
     $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px ;\n" : "";
    $str.= " font-size: " . $swmenupro['sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['sub_font_family'] . "  ; \n";
    $str.= " text-align: " . $swmenupro['sub_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['font_weight_over'] . "  ; \n";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    $str.= " display: block; \n";
    $str.=" white-space: " . $swmenupro['sub_wrap'] . " ; \n";
    $str.=$swmenupro['sub_back_image'] ? " background-image: URL(\"" . $swmenupro['sub_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image'] ? " background-repeat:" . $swmenupro['sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image'] ? " background-position:" . $swmenupro['sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_back'] ? " background-color: " . $swmenupro['sub_back'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . "  ; \n" : "";

    $str.= " position: relative; \n";
   if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
    if ($swmenupro['sub_width'] != 0) {
        $str.= " width:" . $swmenupro['sub_width'] . "px; \n";
    }
    if ($swmenupro['sub_height'] != 0) {
        $str.= " height:" . $swmenupro['sub_height'] . "px; \n";
    }
     if ($swmenupro['si_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['sitl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sitr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sibr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sibl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['sitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ") \n";
    $str.="}\n";

    $str.=".sw-sf" . $swmenupro['id'] . " a.item2.last {\n";
   if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
   }
    if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        $ctext.="0 ";
        $ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
    // @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";
    
   
    $str.= ".sw-sf" . $swmenupro['id'] . " a.item2.first {\n";
    if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        $ctext.="0 ";
        $ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     //@$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";
    
   
    $str.= ".sw-sf" . $swmenupro['id'] . " a.item2.first.last {\n";
    if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.="}\n";


    
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li.sfHover a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover a.item2:hover,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover  li.sfHover a.item2:hover,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover  li.sfHover li.sfHover a.item2:hover,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover  li.sfHover li.sfHover li.sfHover a.item2:hover,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover  li.sfHover li.sfHover li.sfHover li.sfHover a.item2:hover,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover  li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2:hover,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover  li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a.item2:hover,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . "  a.item2:hover {\n";
    $str.=$swmenupro['sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['sub_back_image_over'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image_over'] ? " background-repeat:" . $swmenupro['sub_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image_over'] ? " background-position:" . $swmenupro['sub_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_over'] ? " background-color: " . $swmenupro['sub_over'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . "  ; \n" : "";
    $str.= "}\n";

    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li.sfHover li a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a.item2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a.item2{\n";
  $str.=$swmenupro['sub_back_image'] ? " background-image: URL(\"" . $swmenupro['sub_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['sub_back_image'] ? " background-repeat:" . $swmenupro['sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image'] ? " background-position:" . $swmenupro['sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_back'] ? " background-color: " . $swmenupro['sub_back'] . "  ; \n" : "";
    $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . "  ; \n" : "";
    $str.="}\n";

    $str.= ".sw-sf" . $swmenupro['id'] . " li.current img.seq2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li img.seq1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover img.seq2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover img.seq2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li img.seq1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover img.seq2,\n";
    //$str.= ".sw-sf".$swmenupro['id']." li.sfHover li.sfHover li.sfHover li img.seq1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " img.seq1\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.="}\n";



    $str.= ".sw-sf" . $swmenupro['id'] . " img.seq2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover img.seq1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li img.seq2,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover img.seq1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover img.seq1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.sfHover li.sfHover li.sfHover li img.seq2,\n";
    //$str.= ".sw-sf".$swmenupro['id']." a.item2:hover img.seq1,\n";
    //$str.= ".sw-sf".$swmenupro['id']." a.item1:hover img.seq1,\n";
    $str.= ".sw-sf" . $swmenupro['id'] . " li.current img.seq1\n";
    $str.= "{\n";
    $str.= " display:   none; \n";
    $str.="}\n";



    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            $str.=superfish_customcss($ordered, $ordered[$i], $swmenupro['id'], "");
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
            $str.=superfish_customcss($ordered, $ordered[$i], $swmenupro['id'], ":hover");
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }
    return $str;
}

function superfish_customcss($ordered, $item, $id, $class) {

    $str = "";
    if ($item['indent'] == 0) {
        if ($class) {
            $str.="#sf-" . $id . $item['ID'] . ".current a.item1,\n";
            $str.="#sf-" . $id . $item['ID'] . ".sfHover a.item1{\n";
        } else {
            $str.="#sf-" . $id . $item['ID'] . " a.item1{\n";
        }
    } else {
        if ($class) {
            $str.="#sf-" . $id . $item['ID'] . ".current a.item2,\n";
            $str.="#sf-" . $id . $item['ID'] . ".sfHover a.item2{\n";
        } else {
            $str.="#sf-" . $id . $item['ID'] . " a.item2{\n";
        }
    }
    return $str;
}

function transMenuStyle($swmenupro, $ordered) {
  
    $live_site = JURI::base();
    if (substr($live_site, (strlen($live_site) - 1), 1) == "/") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 1));
    }
    if (substr($live_site, (strlen($live_site) - 13), 13) == "administrator") {
        $live_site = substr($live_site, 0, (strlen($live_site) - 14));
    }
    if (substr($swmenupro['complete_background_image'], 0, 1) == "/") {
        $swmenupro['complete_background_image'] = substr($swmenupro['complete_background_image'], 1, (strlen($swmenupro['complete_background_image']) - 1));
    }
    if (substr($swmenupro['main_back_image'], 0, 1) == "/") {
        $swmenupro['main_back_image'] = substr($swmenupro['main_back_image'], 1, (strlen($swmenupro['main_back_image']) - 1));
    }
    if (substr($swmenupro['main_back_image_over'], 0, 1) == "/") {
        $swmenupro['main_back_image_over'] = substr($swmenupro['main_back_image_over'], 1, (strlen($swmenupro['main_back_image_over']) - 1));
    }
    if (substr($swmenupro['sub_back_image'], 0, 1) == "/") {
        $swmenupro['sub_back_image'] = substr($swmenupro['sub_back_image'], 1, (strlen($swmenupro['sub_back_image']) - 1));
    }
    if (substr($swmenupro['sub_back_image_over'], 0, 1) == "/") {
        $swmenupro['sub_back_image_over'] = substr($swmenupro['sub_back_image_over'], 1, (strlen($swmenupro['sub_back_image_over']) - 1));
    }
    if (substr($swmenupro['active_background_image'], 0, 1) == "/") {
        $swmenupro['active_background_image'] = substr($swmenupro['active_background_image'], 1, (strlen($swmenupro['active_background_image']) - 1));
    }


    $swmenupro['complete_background_image'] = $swmenupro['complete_background_image'] ? $live_site . "/" . $swmenupro['complete_background_image'] : "";
    $swmenupro['main_back_image'] = $swmenupro['main_back_image'] ? $live_site . "/" . $swmenupro['main_back_image'] : "";
    $swmenupro['main_back_image_over'] = $swmenupro['main_back_image_over'] ? $live_site . "/" . $swmenupro['main_back_image_over'] : "";
    $swmenupro['sub_back_image'] = $swmenupro['sub_back_image'] ? $live_site . "/" . $swmenupro['sub_back_image'] : "";
    $swmenupro['sub_back_image_over'] = $swmenupro['sub_back_image_over'] ? $live_site . "/" . $swmenupro['sub_back_image_over'] : "";
    $swmenupro['active_background_image'] = $swmenupro['active_background_image'] ? $live_site . "/" . $swmenupro['active_background_image'] : "";

    $str=  (($swmenupro['sub_border_width']==0)||($swmenupro['sub_border_style']=="none"))?" #subwrap" . $swmenupro['id'] . " table,\n":"";
    $str.= (($swmenupro['sub_border_over_width']==0)||($swmenupro['sub_border_over_style']=="none"))?" #subwrap" . $swmenupro['id'] . " td,\n":"";
    $str.= (($swmenupro['sub_border_over_width']==0)||($swmenupro['sub_border_over_style']=="none"))?" #subwrap" . $swmenupro['id'] . " tr,\n":"";
    $str.= "#menu" . $swmenupro['id'] . " table,\n";
    $str.= "#menu_wrap" . $swmenupro['id'] . " tr,\n";
    $str.= "#menu_wrap" . $swmenupro['id'] . " td,\n";
    $str.= "#menu" . $swmenupro['id'] . " tr,\n";
    $str.= "#menu" . $swmenupro['id'] . " td{\n";
    $str.= "border:0; \n";
    $str.= "}\n";
    
    
    $str.= ".transMenu" . $swmenupro['id'] . " {\n";
    $str.= " position:absolute ; \n";
    $str.= " overflow:hidden; \n";
    $str.= " left:-1000px; \n";
    $str.= " top:-1000px; \n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .content {\n";
    $str.= " position:absolute  ; \n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .items {\n";
    $str.= $swmenupro['sub_width'] ? " width: " . $swmenupro['sub_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_width']) ? " border-top-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&($swmenupro['sub_border_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sot_border']&&$swmenupro['sub_border_color'] )? " border-top-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_width']) ? " border-right-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&($swmenupro['sub_border_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sor_border']&&$swmenupro['sub_border_color'] )? " border-right-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_width']) ? " border-bottom-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&($swmenupro['sub_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sob_border']&&$swmenupro['sub_border_color'] )? " border-bottom-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_width']) ? " border-left-width: " . $swmenupro['sub_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&($swmenupro['sub_border_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sol_border']&&$swmenupro['sub_border_color'] )? " border-left-color: " . $swmenupro['sub_border_color'] . " ;\n" : "";
    $str.= " position:relative ; \n";
    $str.= " left:0px; top:0px; \n";
    $str.= " z-index:2; \n";

    $str.= "}\n";

   

    $str.= ".transMenu" . $swmenupro['id'] . "  td \n";
    $str.= "{\n";
     $str.= $swmenupro['sub_pad_top'] ? " padding-top: " . $swmenupro['sub_pad_top'] . "px !important;\n" : "";
    $str.= $swmenupro['sub_pad_right'] ? " padding-right: " . $swmenupro['sub_pad_right'] . "px !important;\n" : "";
    $str.= $swmenupro['sub_pad_bottom'] ? " padding-bottom: " . $swmenupro['sub_pad_bottom'] . "px !important;\n" : "";
    $str.= $swmenupro['sub_pad_left'] ? " padding-left: " . $swmenupro['sub_pad_left'] . "px !important;\n" : "";
    //$str.= " padding: " . $swmenupro['sub_padding'] . " !important;  \n";
    $str.= " font-size: " . $swmenupro['sub_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['sub_font_family'] . "  ; \n";
    $str.= " text-align: " . $swmenupro['sub_align'] . " ; \n";
    $str.= " font-weight: " . $swmenupro['font_weight_over'] . "  ; \n";
    $str.=$swmenupro['sub_font_color'] ? " color: " . $swmenupro['sub_font_color'] . "  ; \n" : "";
    $str.= "} \n";

    $str.= "#subwrap" . $swmenupro['id'] . " \n";
    $str.= "{ \n";
    $str.= " text-align: left ; \n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . "  .item:hover td, \n";
    $str.= ".transMenu" . $swmenupro['id'] . "  .item.hover td\n";
    $str.= "{ \n";
    $str.=$swmenupro['sub_font_color_over'] ? " color: " . $swmenupro['sub_font_color_over'] . " !important ; \n" : "";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .item { \n";
   
    $str.= $swmenupro['sub_height'] ? " height: " . $swmenupro['sub_height'] . "px;" : "";
    $str.= " text-decoration: none ; \n";
    $str.= $swmenupro['sub_width'] ? " width: " . $swmenupro['sub_width'] . "px;" : "";
    switch ($swmenupro['sub_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" font-style: normal !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['sub_font_extra'] . " !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" font-style: normal !important;\n";
            break;
        default:
            $str.=" font-style: normal !important;\n";
            $str.=" text-decoration: none !important;\n";
            $str.=" text-transform: none !important;\n";
            break;
    }
   
    $str.=" white-space: " . $swmenupro['sub_wrap'] . "; \n";
    $str.= " cursor:pointer; \n";
    //$str.= " cursor:hand; \n";
    $str.= "}\n";


    $str.= ".transMenu" . $swmenupro['id'] . " .item td { \n";
   if ( @$swmenupro['s_auto_border']) {
     $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
        $str.= " border-top: 0; \n";
    } else {
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_over_width']) ? " border-right-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sir_border']&&$swmenupro['sub_border_color_over'] )? " border-right-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_over_width']) ? " border-bottom-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sib_border']&&$swmenupro['sub_border_color_over'] )? " border-bottom-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_over_width']) ? " border-left-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sil_border']&&$swmenupro['sub_border_color_over'] )? " border-left-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
      
    }
   if ($swmenupro['si_corner_style'] == 'curvycorner') {
        $ctext="";
       
        @$swmenupro['sitl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sitr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
         @$swmenupro['sibr_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sibl_corner']?$ctext.=$swmenupro['si_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['sitl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sitr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['si_corner_size']."px; \n":"";
     @$swmenupro['sibl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['si_corner_size']."px; \n":"";
    }
    $str.= "}\n";



    $str.= ".transMenu" . $swmenupro['id'] . " .item .top_item { \n";
     $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_over_width']) ? " border-top-width: " . $swmenupro['sub_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&($swmenupro['sub_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['sub_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['sit_border']&&$swmenupro['sub_border_color_over'] )? " border-top-color: " . $swmenupro['sub_border_color_over'] . " ;\n" : "";
    $str.= "}\n";


    $str.= ".transMenu" . $swmenupro['id'] . " .background {\n";
  $str.=$swmenupro['sub_back_image'] ? " background-image: URL(\"" . $swmenupro['sub_back_image'] . "\") ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['sub_back_image'] ? " background-repeat:" . $swmenupro['sub_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image'] ? " background-position:" . $swmenupro['sub_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_back'] ? " background-color: " . $swmenupro['sub_back'] . "  ; \n" : "";
    $str.= " position:absolute ; \n";
    $str.= " left:0px; top:0px; \n";
    $str.= " z-index:1; \n";
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . "); \n";
     if ($swmenupro['s_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['stl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['str_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbr_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['sbl_corner']?$ctext.=$swmenupro['s_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['stl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['str_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['s_corner_size']."px; \n":"";
     @$swmenupro['sbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['s_corner_size']."px; \n":"";
    }
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .shadowRight { \n";
    $str.= " position:absolute ; \n";
    $str.= " z-index:3; \n";
    if ($swmenupro['extra']) {
        $str.= " top:3px; width:2px; \n";
    } else {
        $str.= " top:-3000px; width:2px; \n";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ");\n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .shadowBottom { \n";
    $str.= " position:absolute ; \n";
    $str.= " z-index:1; \n";
    if ($swmenupro['extra']) {
        $str.= " left:3px; height:2px; \n";
    } else {
        $str.= " left:-3000px; height:2px; \n";
    }
    $str.= " opacity:" . ($swmenupro['specialA'] / 100) . "; \n";
    $str.= " filter:alpha(opacity=" . ($swmenupro['specialA']) . ");\n";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .item.hover ,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " .item:hover {\n";
  $str.=$swmenupro['sub_back_image_over'] ? " background-image: URL(\"" . $swmenupro['sub_back_image_over'] . "\") !important;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['sub_back_image_over'] ? " background-repeat:" . $swmenupro['sub_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['sub_back_image_over'] ? " background-position:" . $swmenupro['sub_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['sub_over'] ? " background-color: " . $swmenupro['sub_over'] . " !important ; \n" : "";
    $str.= "}\n";

    $str.= ".transMenu" . $swmenupro['id'] . " .transImage { \n";
  //  $str.= " padding:3px !important ; \n";
    //$str.="text-align:right;\n";
  //  $str.="width:10px;\n";
    $str.= "}\n";




    $str.= "#td_menu_wrap" . $swmenupro['id'] . " {\n";
    $str.= " top: " . $swmenupro['main_top'] . "px; \n";
    $str.= " left: " . $swmenupro['main_left'] . "px; \n";    
    $str.= " z-index: 100; \n";
    $str.= " position:relative; \n";
    $str.= $swmenupro['complete_margin_top'] ? " padding-top: " . $swmenupro['complete_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_right'] ? " padding-right: " . $swmenupro['complete_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_bottom'] ? " padding-bottom: " . $swmenupro['complete_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['complete_margin_left'] ? " padding-left: " . $swmenupro['complete_margin_left'] . "px ;\n" : "";
   // $str.=" padding:" . $swmenupro['complete_padding'] . " ; \n";
    $str.=$swmenupro['complete_background_image'] ? " background-image: URL(\"" . $swmenupro['complete_background_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['complete_background_image'] ? " background-repeat:" . $swmenupro['complete_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['complete_background_image'] ? " background-position:" . $swmenupro['complete_background_position'] . " ;\n" : "";
    $str.=$swmenupro['complete_background'] ? " background-color: " . $swmenupro['complete_background'] . "  ; \n" : "";
    if ($swmenupro['c_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ctl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ctr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbr_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['cbl_corner']?$ctext.=$swmenupro['c_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ctl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['ctr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['c_corner_size']."px; \n":"";
     @$swmenupro['cbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['c_corner_size']."px; \n":"";
    }
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_width']) ? " border-top-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&($swmenupro['main_border_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tot_border']&&$swmenupro['main_border_color'] )? " border-top-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_width']) ? " border-right-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&($swmenupro['main_border_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tor_border']&&$swmenupro['main_border_color'] )? " border-right-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_width']) ? " border-bottom-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&($swmenupro['main_border_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tob_border']&&$swmenupro['main_border_color'] )? " border-bottom-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_width']) ? " border-left-width: " . $swmenupro['main_border_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&($swmenupro['main_border_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tol_border']&&$swmenupro['main_border_color'] )? " border-left-color: " . $swmenupro['main_border_color'] . " ;\n" : "";
    $str.= "}\n";

  

    $str.= "#menu" . $swmenupro['id'] . " a:hover,\n";
    $str.= "#menu" . $swmenupro['id'] . " a.hover   { \n";
     $str.=$swmenupro['main_back_image_over'] ? " background-image: URL(\"" . $swmenupro['main_back_image_over'] . "\") ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['main_back_image_over'] ? " background-repeat:" . $swmenupro['top_hover_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image_over'] ? " background-position:" . $swmenupro['top_hover_background_position'] . " ;\n" : "";
    $str.=$swmenupro['main_font_color_over'] ? " color: " . $swmenupro['main_font_color_over'] . " !important ; \n" : "";
    $str.=$swmenupro['main_over'] ? " background-color: " . $swmenupro['main_over'] . " ; \n" : "";
    $str.= "}\n";

    $str.= "#trans-active" . $swmenupro['id'] . " a.hover, \n";
    $str.= "#trans-active" . $swmenupro['id'] . " a:hover, \n";
    $str.= "#trans-active" . $swmenupro['id'] . " a{\n";
   $str.=$swmenupro['active_background'] ? " background-color: " . $swmenupro['active_background'] . "  ; \n" : "";
    $str.=$swmenupro['active_font'] ? " color: " . $swmenupro['active_font'] . " !important ; \n" : "";
    //$str.=$swmenupro['main_font_color_over']?" color: ".$swmenupro['main_font_color_over']." !important ; \n":"";
    $str.=$swmenupro['active_background_image'] ? " background-image: URL(\"" . $swmenupro['active_background_image'] . "\") ;\n" : "background-image:none !important;\n";
    $str.=$swmenupro['active_background_image'] ? " background-repeat:" . $swmenupro['active_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['active_background_image'] ? " background-position:" . $swmenupro['active_background_position'] . " ;\n" : "";
    $str.= "} \n";


    $str.= "table.menu" . $swmenupro['id'] . " a{\n";
    $str.= $swmenupro['main_pad_top'] ? " padding-top: " . $swmenupro['main_pad_top'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_right'] ? " padding-right: " . $swmenupro['main_pad_right'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_bottom'] ? " padding-bottom: " . $swmenupro['main_pad_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['main_pad_left'] ? " padding-left: " . $swmenupro['main_pad_left'] . "px ;\n" : "";
    //$str.= " padding: " . $swmenupro['main_padding'] . "  ; \n";
   
    if ($swmenupro['main_width'] != 0) {
        $str.= " width:" . $swmenupro['main_width'] . "px; \n";
    }
    if ($swmenupro['main_height'] != 0) {
        $str.= " height:" . $swmenupro['main_height'] . "px; \n";
    }
    $str.= " font-size: " . $swmenupro['main_font_size'] . "px  ; \n";
    $str.= " font-family: " . $swmenupro['font_family'] . "  ; \n";
    $str.= " text-align: " . $swmenupro['main_align'] . "  ; \n";
    $str.= " font-weight: " . $swmenupro['font_weight'] . "  ; \n";
    $str.=$swmenupro['main_font_color'] ? " color: " . $swmenupro['main_font_color'] . "  ; \n" : "";
    $str.= " text-decoration: none  ; \n";
    $str.= " margin-bottom:0px  ; \n";
    $str.= " display:block ; \n";
    //$str.= " white-space:nowrap ; \n";
    $str.=$swmenupro['main_back'] ? " background-color: " . $swmenupro['main_back'] . "  ; \n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-image: URL(\"" . $swmenupro['main_back_image'] . "\") ;\n" : "background-image:none ;\n";
    $str.=$swmenupro['main_back_image'] ? " background-repeat:" . $swmenupro['top_background_repeat'] . ";\n" : "";
    $str.=$swmenupro['main_back_image'] ? " background-position:" . $swmenupro['top_background_position'] . " ;\n" : "";
    switch ($swmenupro['top_font_extra']) {
        case "italic":
        case "oblique":
            $str.=" font-style:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "underline":
        case "overline":
        case "line-through":
            $str.=" text-decoration:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" font-style: normal ;\n";
            $str.=" text-transform: none ;\n";
            break;
        case "uppercase":
        case "lowercase":
        case "capitalize":
            $str.=" text-transform:" . $swmenupro['top_font_extra'] . " ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" font-style: normal ;\n";
            break;
        default:
            $str.=" font-style: normal ;\n";
            $str.=" text-decoration: none ;\n";
            $str.=" text-transform: none ;\n";
            break;
    }
    $str.=" white-space: " . $swmenupro['top_wrap'] . "; \n";
    $str.=" position: relative; \n";
    $str.= $swmenupro['top_margin_top'] ? " margin-top: " . $swmenupro['top_margin_top'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_right'] ? " margin-right: " . $swmenupro['top_margin_right'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_bottom'] ? " margin-bottom: " . $swmenupro['top_margin_bottom'] . "px ;\n" : "";
    $str.= $swmenupro['top_margin_left'] ? " margin-left: " . $swmenupro['top_margin_left'] . "px ;\n" : "";
   // $str.=" margin:" . $swmenupro['top_margin'] . " ; \n";

   if ( @$swmenupro['t_auto_border']) {
          if (($swmenupro['orientation'] == "vertical/left" || $swmenupro['orientation'] == "vertical/right" || $swmenupro['orientation'] == "vertical")) {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-bottom: 0; \n";
        }else{
             $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
        $str.= " border-right: 0; \n";
            
            }
    } else {
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_over_width']) ? " border-top-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-top-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tit_border']&&$swmenupro['main_border_color_over'] )? " border-top-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_over_width']) ? " border-right-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-right-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tir_border']&&$swmenupro['main_border_color_over'] )? " border-right-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_over_width']) ? " border-left-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['til_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-left-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['til_border']&&$swmenupro['main_border_color_over'] )? " border-left-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
      
    }
    if ($swmenupro['t_corner_style'] == 'curvycorner') {
        $ctext="";
        @$swmenupro['ttl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['ttr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbr_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
        @$swmenupro['tbl_corner']?$ctext.=$swmenupro['t_corner_size']."px ":$ctext.="0 ";
    $str.="border-radius: " . $ctext.";\n";
    //$str.="-webkit-border-radius:  " . $ctext.";\n";
    $str.="-moz-border-radius:  " . $ctext.";\n";
     @$swmenupro['ttl_corner']?$str.="-webkit-border-top-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['ttr_corner']?$str.="-webkit-border-top-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbr_corner']?$str.="-webkit-border-bottom-right-radius: ".$swmenupro['t_corner_size']."px; \n":"";
     @$swmenupro['tbl_corner']?$str.="-webkit-border-bottom-left-radius: ".$swmenupro['t_corner_size']."px; \n":"";
    }
    $str.= "}\n";
//echo $border_hack."border";
  

    $str.= "table.menu" . $swmenupro['id'] . " td.last" . $swmenupro['id'] . " a {\n";
 $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_over_width']) ? " border-bottom-width: " . $swmenupro['main_border_over_width'] . "px ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&($swmenupro['main_border_over_style']!="none")) ? " border-bottom-style: " . $swmenupro['main_border_over_style'] . " ;\n" : "";
    $str.= (@$swmenupro['tib_border']&&$swmenupro['main_border_color_over'] )? " border-bottom-color: " . $swmenupro['main_border_color_over'] . " ;\n" : "";
    $str.= "} \n";






    $str.= "#menu" . $swmenupro['id'] . " span {\n";
    $str.= " display:none; \n";
    $str.= "}\n";

    $str.= "#menu" . $swmenupro['id'] . " a img.seq1,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " img.seq1\n";
    $str.= "{\n";
    $str.= " display:    inline; \n";
    $str.= "}\n";

    $str.= "#menu" . $swmenupro['id'] . " a.hover img.seq2,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " .item.hover img.seq2 \n";
    $str.= "{\n";
    $str.= " display:   inline; \n";
    $str.= "}\n";

    $str.= "#menu" . $swmenupro['id'] . " a.hover img.seq1,\n";
    $str.= "#menu" . $swmenupro['id'] . " a img.seq2,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " img.seq2,\n";
    $str.= ".transMenu" . $swmenupro['id'] . " .item.hover img.seq1\n";
    $str.= "{\n";
    $str.= " display:   none; \n";
    $str.= "}\n";

    $str.="#trans-active" . $swmenupro['id'] . " a img.seq1\n";
    $str.="{\n";
    $str.=" display: none;\n";
    $str.="}\n";

    $str.="#trans-active" . $swmenupro['id'] . " a img.seq2\n";
    $str.="{\n";
    $str.=" display: inline;\n";
    $str.="}\n";


/*
    if ($top_sub_indicator) {
        //	$str.=".menu".$swmenupro['id']." .sw-arrow,\n";
        $str.=".menu" . $swmenupro['id'] . " .sw-arrow a{\n";
        //$str.="position: absolute;\n";
        //$str.="display: block; \n";
        //$str.="right: .75em; \n";
        //$str.="top: 1.05em; \n";
        //$str.="width: 10px; \n";
        //$str.="height: 10px; \n";
        //$str.="text-indent: -999em; \n";
        //$str.="overflow:hidden; \n";



        if ($swmenupro['orientation'] == "vertical/left" || $swmenupro['orientation'] == "horizontal/left") {
            switch ($top_sub_indicator) {
                // cases are slightly different
                case 2:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/white-on.gif') no-repeat center left; \n";
                    break;

                case 3:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/black-on.gif') no-repeat center left; \n";
                    break;

                case 4:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/grey-on.gif') no-repeat center left; \n";
                    break;

                case 5:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/blue-on.gif') no-repeat center left; \n";
                    break;

                case 6:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/red-on.gif') no-repeat center left; \n";
                    break;

                case 7:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/green-on.gif') no-repeat center left; \n";
                    break;

                case 8:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/yellow-on.gif') no-repeat center left; \n";
                    break;

                default: // formerly case 2
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/submenuleft-on.gif') no-repeat center left; \n";
                    break;
            }
        } else {

            switch ($top_sub_indicator) {
                // cases are slightly different
                case 2:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/whiteleft-on.gif') no-repeat center right; \n";
                    break;

                case 3:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/blackleft-on.gif') no-repeat center right; \n";
                    break;

                case 4:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/greyleft-on.gif') no-repeat center right; \n";
                    break;

                case 5:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/blueleft-on.gif') no-repeat center right; \n";
                    break;

                case 6:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/redleft-on.gif') no-repeat center right; \n";
                    break;

                case 7:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/greenleft-on.gif') no-repeat center right; \n";
                    break;

                case 8:
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/yellowleft-on.gif') no-repeat center right; \n";
                    break;

                default: // formerly case 2
                    $str.="background:	url('" . $live_site . "/modules/mod_swmenupro/images/transmenu/submenu-on.gif') no-repeat center right; \n";
                    break;
            }
        }
        $str.="}\n";
    }
*/
    for ($i = 0; $i < count($ordered); $i++) {

        if ($ordered[$i]['NCSS']) {
            $str.=trans_customcss($ordered, $ordered[$i], $swmenupro['id'], "");
            $str.=$ordered[$i]['NCSS'];
            $str.="\n}\n";
        }
        if ($ordered[$i]['OCSS']) {
            $str.=trans_customcss($ordered, $ordered[$i], $swmenupro['id'], ":hover");
            $str.=$ordered[$i]['OCSS'];
            $str.="\n}\n";
        }
    }
    return $str;
}

function trans_customcss($ordered, $item, $id, $class) {
    $str = "";
    if ($item['indent'] == 0) {
        if ($class) {
            $str.="#trans-active" . $id . " a#menu" . $id . $item['ID'] . ",\n";
            $str.="a.hover#menu" . $id . $item['ID'] . ",\n";
            $str.="a#menu" . $id . $item['ID'] . $class . "{\n";
        } else {
            $str.="#menu" . $id . $item['ID'] . "{\n";
        }
    } else {
        $itemtop = $item;
        $subcount = 0;
        $subcount2 = 0;
        $clname = "";
        for ($i = 0; $i < (count($ordered) - 1); $i++) {
            if (($item['PARENT'] == $ordered[$i]['PARENT']) && ($ordered[$i]['ORDER'] == 1)) {
                $itemtop = $ordered[$i];
            }
            if ($ordered[$i]["ID"] == $itemtop['ID']) {
                $subcount2 = $subcount;
            }
            if ((@$ordered[($i + 1)]['PARENT'] == $ordered[$i]['ID'])) {
                $subcount++;
            }
        }
        $clname = "#TransMenu" . ($subcount2 - 1) . "-" . ($item['ORDER'] - 1);
        if ($class) {
            $str.=$clname . $class . " {\n";
        } else {
            $str.=$clname . $class . " {\n";
        }
    }

 
    return $str;
}

?>
