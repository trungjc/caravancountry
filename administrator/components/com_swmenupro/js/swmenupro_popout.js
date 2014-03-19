/**
* swmenupro v2.0
* http://swonline.biz
* Copyright 2004 Sean White
**/


function checkNumberSyntax(temp_name,temp_box,temp_minimum,temp_maximum,temp_default){
var temp_x = document.getElementById(temp_box);
var temp_message;
  if(!IsNumeric(temp_x.value)||(temp_x.value=="")||(temp_x.value > temp_maximum)||(temp_x.value < temp_minimum)){

alert("You need to input a valid number for "+temp_name+" between "+temp_minimum+" and "+temp_maximum);
  temp_x.value = temp_default;
  }
}


function IsNumeric(sText)
{
   var ValidChars = "0123456789-";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   }



function trim(value) {
   var temp = value;
   var obj = /^(\s*)([\W\w]*)(\b\s*$)/;
   if (obj.test(temp)) { temp = temp.replace(obj, '$2'); }
   var obj = / /g;
   while (temp.match(obj)) { temp = temp.replace(obj, ""); }
   return temp;
}



function do_top_font_extra(){
	tfe=document.getElementById('top_font_extra').value;

	switch (tfe){
		case "italic":
		    jQuery('.top_preview').css('font-style',tfe);
			jQuery('.top_preview').css('text-decoration','none');
			jQuery('.top_preview').css('text-transform','none');
			break;
		case "oblique":
			jQuery('.top_preview').css('font-style',tfe);
			jQuery('.top_preview').css('text-decoration','none');
			jQuery('.top_preview').css('text-transform','none');
			break;
		case "line-through":
			jQuery('.top_preview').css('text-decoration',tfe);
		    jQuery('.top_preview').css('font-style','normal');
			jQuery('.top_preview').css('text-transform','none');
			break;
		case "underline":
			jQuery('.top_preview').css('text-decoration',tfe);
		    jQuery('.top_preview').css('font-style','normal');
			jQuery('.top_preview').css('text-transform','none');
			break;
		case "overline":
			jQuery('.top_preview').css('text-decoration',tfe);
		    jQuery('.top_preview').css('font-style','normal');
			jQuery('.top_preview').css('text-transform','none');
			break;
		case "capitalize":
		    jQuery('.top_preview').css('text-transform',tfe);
		    jQuery('.top_preview').css('font-style','normal');
			jQuery('.top_preview').css('text-decoration','none');
			break;
		case "uppercase":
		    jQuery('.top_preview').css('text-transform',tfe);
		    jQuery('.top_preview').css('font-style','normal');
			jQuery('.top_preview').css('text-decoration','none');
			break;
		case "lowercase":
		    jQuery('.top_preview').css('text-transform',tfe);
		    jQuery('.top_preview').css('font-style','normal');
			jQuery('.top_preview').css('text-decoration','none');
			break;
		default:
			jQuery('.top_preview').css('text-decoration','none');
			jQuery('.top_preview').css('text-transform','none');
			jQuery('.top_preview').css('font-style','normal');
			break;		
	}
}


function do_sub_font_extra(){
	tfe=document.getElementById('sub_font_extra').value;

	switch (tfe){
		case "italic":
		    jQuery('.sub_preview').css('font-style',tfe);
			jQuery('.sub_preview').css('text-decoration','none');
			jQuery('.sub_preview').css('text-transform','none');
			break;
		case "oblique":
			jQuery('.sub_preview').css('font-style',tfe);
			jQuery('.sub_preview').css('text-decoration','none');
			jQuery('.sub_preview').css('text-transform','none');
			break;
		case "line-through":
			jQuery('.sub_preview').css('text-decoration',tfe);
		    jQuery('.sub_preview').css('font-style','normal');
			jQuery('.sub_preview').css('text-transform','none');
			break;
		case "underline":
			jQuery('.sub_preview').css('text-decoration',tfe);
		    jQuery('.sub_preview').css('font-style','normal');
			jQuery('.sub_preview').css('text-transform','none');
			break;
		case "overline":
			jQuery('.sub_preview').css('text-decoration',tfe);
		    jQuery('.sub_preview').css('font-style','normal');
			jQuery('.sub_preview').css('text-transform','none');
			break;
		case "capitalize":
		    jQuery('.sub_preview').css('text-transform',tfe);
		    jQuery('.sub_preview').css('font-style','normal');
			jQuery('.sub_preview').css('text-decoration','none');
			break;
		case "uppercase":
		    jQuery('.sub_preview').css('text-transform',tfe);
		    jQuery('.sub_preview').css('font-style','normal');
			jQuery('.sub_preview').css('text-decoration','none');
			break;
		case "lowercase":
		    jQuery('.sub_preview').css('text-transform',tfe);
		    jQuery('.sub_preview').css('font-style','normal');
			jQuery('.sub_preview').css('text-decoration','none');
			break;
		default:
			jQuery('.sub_preview').css('text-decoration','none');
			jQuery('.sub_preview').css('text-transform','none');
			jQuery('.sub_preview').css('font-style','normal');
			break;		
	}
}




function doMainPadding(){
var padtop = trim(document.getElementById('main_pad_top').value);
var padright = trim(document.getElementById('main_pad_right').value);
var padbottom = trim(document.getElementById('main_pad_bottom').value);
var padleft = trim(document.getElementById('main_pad_left').value);

//document.getElementById('main_padding').value = padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ';
//document.getElementById('top_preview').style.padding = padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ';
jQuery('.top_preview').css('padding',padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ');
//alert("hello");
}

function doTopMargin(){
var padtop = trim(document.getElementById('top_margin_top').value);
var padright = trim(document.getElementById('top_margin_right').value);
var padbottom = trim(document.getElementById('top_margin_bottom').value);
var padleft = trim(document.getElementById('top_margin_left').value);

//document.getElementById('top_margin').value = padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ';

if(document.getElementById('t_corner_style').value=='none'){
jQuery('.top_preview').css('margin',padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ');
}else{
jQuery('.top_preview').css('margin','0');
jQuery('.top_preview_item').css('margin',padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ');

}


var str = document.getElementById('orientation').value; 
var orientation = str.substring(0,10);
if((padleft+padright==0)&&orientation=="horizontal"){
	document.getElementById('border_hack').value='1';
	jQuery('#top_preview_normal').css('border-right','none');
	jQuery('#top_preview_hover').css('border-right','none');
	jQuery('#top_preview_active').css('border-right','none');
}else if((padtop+padbottom==0)&&orientation.substring(0,8)=="vertical"){
	document.getElementById('border_hack').value='1';
	jQuery('#top_preview_normal').css('border-bottom','none');
	jQuery('#top_preview_hover').css('border-bottom','none');
	jQuery('#top_preview_active').css('border-bottom','none');
}else{
	document.getElementById('border_hack').value='0';
var mainwidth = trim(document.getElementById('main_border_over_width').value);
var mainstyle = trim(document.getElementById('main_border_over_style').value);
var maincolor = trim(document.getElementById('main_border_color_over').value);

//document.getElementById('main_border_over').value = mainwidth+'px '+mainstyle+' '+maincolor;
//document.getElementById('top_preview').style.border= mainwidth+'px '+mainstyle+' '+maincolor;
if(document.getElementById('t_corner_style').value=='none'){
jQuery('.top_preview').css('border',mainwidth+'px '+mainstyle+' '+maincolor);
}
}
//do_top_corner();
}


function doCompletePadding(){
var padtop = trim(document.getElementById('complete_margin_top').value);
var padright = trim(document.getElementById('complete_margin_right').value);
var padbottom = trim(document.getElementById('complete_margin_bottom').value);
var padleft = trim(document.getElementById('complete_margin_left').value);

//document.getElementById('complete_padding').value = padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ';
jQuery('#top_preview_outer').css('padding',padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ');
}

function doSubPadding(){

var padtop = trim(document.getElementById('sub_pad_top').value);
var padright = trim(document.getElementById('sub_pad_right').value);
var padbottom = trim(document.getElementById('sub_pad_bottom').value);
var padleft = trim(document.getElementById('sub_pad_left').value);

//document.getElementById('sub_padding').value = padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ';
jQuery('.sub_preview').css('padding',padtop+'px '+padright+'px '+padbottom+'px '+padleft+'px ');
}


function doMainBorder(){
var mainwidth = trim(document.getElementById('main_border_width').value);
var mainstyle = trim(document.getElementById('main_border_style').value);
var maincolor = trim(document.getElementById('main_border_color').value);


	t_border=(document.getElementById('tot_border').checked?true:false);
	r_border=(document.getElementById('tor_border').checked?true:false);
	b_border=(document.getElementById('tob_border').checked?true:false);
	l_border=(document.getElementById('tol_border').checked?true:false);

//document.getElementById('main_border').value = mainwidth+'px '+mainstyle+' '+maincolor;
if(document.getElementById('c_corner_style').value!='none'){
do_complete_corner();
}else{
if(t_border){
jQuery('#top_preview_outer').css('border-top',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('#top_preview_outer').css('border-top','none');
}
if(r_border){
jQuery('#top_preview_outer').css('border-right',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('#top_preview_outer').css('border-right','none');
}
if(b_border){
jQuery('#top_preview_outer').css('border-bottom',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('#top_preview_outer').css('border-bottom','none');
}
if(l_border){
jQuery('#top_preview_outer').css('border-left',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('#top_preview_outer').css('border-left','none');
}
}
var mainwidth = trim(document.getElementById('main_border_over_width').value);
var mainstyle = trim(document.getElementById('main_border_over_style').value);
var maincolor = trim(document.getElementById('main_border_color_over').value);

t_border=(document.getElementById('tit_border').checked?true:false);
	r_border=(document.getElementById('tir_border').checked?true:false);
	b_border=(document.getElementById('tib_border').checked?true:false);
	l_border=(document.getElementById('til_border').checked?true:false);
auto_border=(document.getElementById('t_auto_border').checked?true:false);

if(auto_border){

document.getElementById('tit_border').checked=true;
document.getElementById('tir_border').checked=true;
document.getElementById('tib_border').checked=true;
document.getElementById('til_border').checked=true;
t_border=true;
r_border=true;
b_border=false;
l_border=true;
}
if(document.getElementById('t_corner_style').value=='none'){
//alert(t_border);
if(t_border){
jQuery('.top_preview').css('border-top',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('.top_preview').css('border-top','none');
}
if(r_border){
jQuery('.top_preview').css('border-right',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('.top_preview').css('border-right','none');
}
if(b_border){
jQuery('.top_preview').css('border-bottom',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('.top_preview').css('border-bottom','none');
}
if(l_border){
jQuery('.top_preview').css('border-left',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('.top_preview').css('border-left','none');
}

if(auto_border){
jQuery('.top_preview.last').css('border-bottom',mainwidth+'px '+mainstyle+' '+maincolor);
}

}else{
	
do_top_corner();
}
//doTopMargin();
}


function doMainBorderTree(){
var mainwidth = trim(document.getElementById('main_border_width').value);
var mainstyle = trim(document.getElementById('main_border_style').value);
var maincolor = trim(document.getElementById('main_border_color').value);

//document.getElementById('main_border').value = mainwidth+'px '+mainstyle+' '+maincolor;
}


function doSubBorder(){
var mainwidth = trim(document.getElementById('sub_border_width').value);
var mainstyle = trim(document.getElementById('sub_border_style').value);
var maincolor = trim(document.getElementById('sub_border_color').value);

t_border=(document.getElementById('sot_border').checked?true:false);
	r_border=(document.getElementById('sor_border').checked?true:false);
	b_border=(document.getElementById('sob_border').checked?true:false);
	l_border=(document.getElementById('sol_border').checked?true:false);

	
if(document.getElementById('s_corner_style').value!='none'){
do_sub_corner();
}else{
jQuery('#sub_preview_parent').css('padding','0');
jQuery('#sub_preview_parent').css('background-color','transparent');
if(t_border){
jQuery('#sub_preview_outer').css('border-top',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('#sub_preview_outer').css('border-top','none');
}
if(r_border){
jQuery('#sub_preview_outer').css('border-right',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('#sub_preview_outer').css('border-right','none');
}
if(b_border){
jQuery('#sub_preview_outer').css('border-bottom',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('#sub_preview_outer').css('border-bottom','none');
}
if(l_border){
jQuery('#sub_preview_outer').css('border-left',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('#sub_preview_outer').css('border-left','none');
}

}
//jQuery('#sub_preview_outer').css('border',mainwidth+'px '+mainstyle+' '+maincolor);

var mainwidth = trim(document.getElementById('sub_border_over_width').value);
var mainstyle = trim(document.getElementById('sub_border_over_style').value);
var maincolor = trim(document.getElementById('sub_border_color_over').value);
t_border=(document.getElementById('sit_border').checked?true:false);
	r_border=(document.getElementById('sir_border').checked?true:false);
	b_border=(document.getElementById('sib_border').checked?true:false);
	l_border=(document.getElementById('sil_border').checked?true:false);
auto_border=(document.getElementById('s_auto_border').checked?true:false);

if(auto_border){

document.getElementById('sit_border').checked=true;
document.getElementById('sir_border').checked=true;
document.getElementById('sib_border').checked=true;
document.getElementById('sil_border').checked=true;
t_border=true;
r_border=true;
b_border=false;
l_border=true;
}
if(document.getElementById('si_corner_style').value!='none'){
do_sub_inside_corner();
}else{
jQuery('.sub_preview.level1').parent().css('padding','0');
jQuery('#sub_preview.level1').parent().css('background-color','transparent');
if(t_border){
jQuery('.sub_preview.level1').css('border-top',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('.sub_preview.level1').css('border-top','none');
}
if(r_border){
jQuery('.sub_preview.level1').css('border-right',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('.sub_preview.level1').css('border-right','none');
}
if(b_border){
jQuery('.sub_preview.level1').css('border-bottom',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('.sub_preview.level1').css('border-bottom','none');
}
if(l_border){
jQuery('.sub_preview.level1').css('border-left',mainwidth+'px '+mainstyle+' '+maincolor);
}else{
jQuery('.sub_preview.level1').css('border-left','none');
}

if(auto_border){
jQuery('.sub_preview.level1.last').css('border-bottom',mainwidth+'px '+mainstyle+' '+maincolor);
}

}
//do_sub_corner();
}

function doTransSubBorder(){
var mainwidth = trim(document.getElementById('sub_border_width').value);
var mainstyle = trim(document.getElementById('sub_border_style').value);
var maincolor = trim(document.getElementById('sub_border_color').value);

//document.getElementById('sub_border').value = mainwidth+'px '+mainstyle+' '+maincolor;

}

function doSlideClickSubBorder(){
var mainwidth = trim(document.getElementById('sub_border_over_width').value);
var mainstyle = trim(document.getElementById('sub_border_over_style').value);
var maincolor = trim(document.getElementById('sub_border_color_over').value);

//document.getElementById('sub_border_over').value = mainwidth+'px '+mainstyle+' '+maincolor;

}

function checkColorSyntax(temp_name,temp_box,temp_default){
temp_x = document.getElementById(temp_box);
var validChar = '0123456789ABCDEF';
var temp_message;
var temp_error = 0; 

var re = new RegExp (' ', 'gi') ;


 temp_x.value = temp_x.value.replace(re, '') ;
 document.getElementById(temp_box + '_box').bgColor = temp_x.value;
 
}


function swapValue(temp_name, i){

var temp_x ;
var temp_y ;

  if (document.getElementById) {
     temp_x = document.getElementById(temp_name).value;
     if (temp_x == 1){
        document.getElementById(temp_name).value = 0;
        document.getElementById(temp_name+'image').src = 'images/publish_x.png';
        
  }else{
      document.getElementById(temp_name).value = 1;
      document.getElementById(temp_name+'image').src = 'images/tick.png';
    
  }
 
 // doPreview(i)
    
  }
}



function copyColor(temp_box){
var temp_x ;

  if (document.getElementById) {
     temp_x = document.getElementById('CPCP_Input_RGB').value;
     document.getElementById(temp_box).value = temp_x;
     document.getElementById(temp_box + '_box').bgColor = temp_x;
    
  }
}

function copyBackImage(temp_box){
var temp_x ;

  if (document.getElementById) {
     temp_x = document.getElementById(temp_box).value;
     document.getElementById(temp_box + '_box').background = temp_x;
      
  }
}





function changelevel() {
        document.adminForm.target="_self";
        document.adminForm.action="index.php";
        setTimeout('document.adminForm.submit()',200) ;
        }



function doSave(task) {
	
	if(document.adminForm.title.value==""){

		alert("Menu module needs a name.");

	}else if(document.adminForm.menutype.value==-999){

		alert("Menu module needs a valid menu source.");

	}else{


doMainBorder();
doSubBorder();

	document.getElementById("php_out").value = tree.exportToSql().replace(/</g, "&lt;").replace(/>/g, "&gt;");
	document.adminForm.task.value="saveedit";
	document.adminForm.returntask.value=task;
    document.adminForm.target="_self";
    document.adminForm.action="index.php";
    setTimeout('document.adminForm.submit()',200) ;
        }


}



function doPreviewWindow() {

if(document.adminForm.menustyle.value =="treemenu"){
//doMainBorderTree();
 } else if(document.adminForm.menustyle.value =="transmenu"){
//doMainBorder();
//doSubBorder();
 } else{
 //doMainBorder();
 //doSubBorder();
 }
 doMainBorder();
 doSubBorder();
var menustyle=document.adminForm.menustyle.value;
if(document.adminForm.menutype.value != document.adminForm.menuname.value){
document.adminForm.images_preview.value=0;
 }
  document.getElementById("php_out").value = tree.exportToSql().replace(/</g, "&lt;").replace(/>/g, "&gt;");
document.adminForm.target="win1";
document.adminForm.tmpl.value='component';
//document.adminForm.no_html.value="1";
document.adminForm.action="index.php";
document.adminForm.task.value="preview";

 window.open('', 'win1', 'status=no,toolbar=no,scrollbars=auto,titlebar=no,menubar=no,resizable=yes,width=800,height=800,directories=no,location=no');
 setTimeout('document.adminForm.submit()',200) ;
 setTimeout('document.adminForm.target="_self"',300);
 setTimeout('document.adminForm.action="index.php"',300);
  setTimeout('document.adminForm.tmpl.value="index"',300);
   setTimeout('document.adminForm.no_html.value=0',300);


}

function processJson(data) { 
 
 var id=document.getElementById('id').value;
 

jQuery.colorbox({
iframe:true,
href:'index.php',
          html:data,
          open:   true,
		  width:  '80%',
		  height: '90%',
		  onComplete:function(){
   jQuery('.cboxIframe').html="hello";
  // alert(data);
}
                  // NO FRAME, JUST DIV CONTAINER?
        });

		
//SqueezeBox.open('index.php?option=com_swmenupro&task=preview&layout=modal&tmpl=component&client_id=0', {handler: 'iframe', size: {x: 800, y: 600}});
 // setTimeout('document.adminForm.submit()',200) ;
 setTimeout('document.adminForm.target="_self"',300);
 setTimeout('document.adminForm.action="index.php"',300);
  setTimeout('document.adminForm.no_html.value=0',300);
	
}


function hide_all(){
document.getElementById("auto_image").style.display="none";

document.getElementById("auto_css_div").style.display="none";
}





function showCSS(csstype) {
hideAll();
		cssvalue= document.getElementById(csstype);
		document.getElementById("css_buttons").style.display="block";
			document.getElementById("oss_buttons").style.display="block";
		if(cssvalue.value.substring(0,6)=="border"){

	document.getElementById(csstype+'-border').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		if(cssvalue.value=="padding:"){

	document.getElementById(csstype+'-padding').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		if(cssvalue.value=="margin:"){

	document.getElementById(csstype+'-margin').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		
if(cssvalue.value=="background:"){

	document.getElementById(csstype+'-background').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		if(cssvalue.value=="font:"){

	document.getElementById(csstype+'-font').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		if(cssvalue.value=="offsets"){

	document.getElementById(csstype+'-offsets').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		if(cssvalue.value=="dimensions"){

	document.getElementById(csstype+'-dimensions').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		if(cssvalue.value=="effects"){

	document.getElementById(csstype+'-effects').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		if(cssvalue.value=="text"){

	document.getElementById(csstype+'-text').style.display="block";
	//document.getElementById("colorwheel").style.display="block";

		}
		}


function doCSS(csstype, typestate) {

		cssvalue= document.getElementById(csstype);
		str="";
		
			if(cssvalue.value.substring(0,6)=="border"){
				str= cssvalue.value+" "+document.getElementById(csstype+"-border-width").value+"px "+document.getElementById(csstype+"-border-style").value+" "+document.getElementById(csstype+"-border-color").value+" !important;\n";
			
			}
			if(cssvalue.value=="padding:"){
				str= cssvalue.value+" "+document.getElementById(csstype+"-pad_top").value+"px "+document.getElementById(csstype+"-pad_right").value+"px "+document.getElementById(csstype+"-pad_bottom").value+"px "+document.getElementById(csstype+"-pad_left").value+"px"+" !important;\n";
			}
			if(cssvalue.value=="margin:"){
				str= cssvalue.value+" "+document.getElementById(csstype+"-margin_top").value+"px "+document.getElementById(csstype+"-margin_right").value+"px "+document.getElementById(csstype+"-margin_bottom").value+"px "+document.getElementById(csstype+"-margin_left").value+"px"+" !important;\n";
			}
			if(cssvalue.value=="background:"){
				str= (document.getElementById(csstype+"-background-color").value?"background-color: "+document.getElementById(csstype+"-background-color").value+" !important;\n":"");
				str+= (document.getElementById(csstype+"-background_image").value?"background-image: url("+document.getElementById(csstype+"-background_image").value+") !important;\n":"");
				str+= (document.getElementById(csstype+"-background_image").value?"background-repeat: "+document.getElementById(csstype+"-background-repeat").value+";\n":"");
				str+= (document.getElementById(csstype+"-background_image").value?"background-position: "+document.getElementById(csstype+"-x_offset").value+"px "+document.getElementById(csstype+"-y_offset").value+"px"+";\n":"");
			}
			if(cssvalue.value=="text"){
				str= (document.getElementById(csstype+"-font-color").value?"color: "+document.getElementById(csstype+"-font-color").value+" !important;\n":"");
				str+= "text-align: "+document.getElementById(csstype+"-text-align").value+" !important;\n";
				str+= "text-decoration: "+document.getElementById(csstype+"-text-decoration").value+" !important;\n";
				str+= "text-transform: "+document.getElementById(csstype+"-text-transform").value+";\n";
				str+= "white-space: "+document.getElementById(csstype+"-white-space").value+";\n";
				str+= "text-indent: "+document.getElementById(csstype+"-text-indent").value+"px;\n";
			}
			if(cssvalue.value=="font:"){
				str= (document.getElementById(csstype+"-font-size").value?"font-size: "+document.getElementById(csstype+"-font-size").value+"px !important;\n":"");
				str+= "font-style: "+document.getElementById(csstype+"-text-align").value+" !important;\n";
				str+= "font-weight: "+document.getElementById(csstype+"-text-decoration").value+" !important;\n";
				str+= "font-family: "+document.getElementById(csstype+"-font-family").value+" !important;\n";
			}
			if(cssvalue.value=="offsets"){
				str= (document.getElementById(csstype+"-y2_offset").value?"top: "+document.getElementById(csstype+"-y2_offset").value+"px;\n":"");
				str+= (document.getElementById(csstype+"-x2_offset").value?"left: "+document.getElementById(csstype+"-x2_offset").value+"px;\n":"");
			}
			if(cssvalue.value=="dimensions"){
				str= (document.getElementById(csstype+"-y_height").value?"height: "+document.getElementById(csstype+"-y_height").value+"px;\n":"");
				str+= (document.getElementById(csstype+"-x_width").value?"width: "+document.getElementById(csstype+"-x_width").value+"px;\n":"");
			}
			if(cssvalue.value=="effects" && document.getElementById(csstype+"-opacity").value){
				str= "-moz-opacity: "+(document.getElementById(csstype+"-opacity").value/100)+";\n";
				str+= "filter:alpha(opacity="+document.getElementById(csstype+"-opacity").value+");\n";
			}
			

			if(str){
				if(csstype=="ncsstype" && typestate=='normal'){
					css= document.getElementById('tree-normal_css');
				}else if(csstype=="ocsstype" && typestate=='auto'){
					css= document.getElementById('auto_css');
				}else if(csstype=="ncsstype" && typestate=='over'){
					css= document.getElementById('tree-over_css');
				}
				css.value+=str;
			}
			
treeInfoUpdate();
hideAll();
document.getElementById('ncsstype').value=0;
document.getElementById('ocsstype').value=0;
}







function hideAll() {

		document.getElementById('ncsstype-border').style.display="none";
		document.getElementById('ncsstype-margin').style.display="none";
		document.getElementById('ncsstype-padding').style.display="none";
		
		document.getElementById('ncsstype-background').style.display="none";
		document.getElementById('ncsstype-font').style.display="none";
		document.getElementById('ncsstype-offsets').style.display="none";
		document.getElementById('ncsstype-dimensions').style.display="none";
		document.getElementById('ncsstype-effects').style.display="none";
		document.getElementById('css_buttons').style.display="none";
		document.getElementById('ncsstype-text').style.display="none";

		document.getElementById('ocsstype-border').style.display="none";
		document.getElementById('ocsstype-margin').style.display="none";
		document.getElementById('ocsstype-padding').style.display="none";
		
		document.getElementById('ocsstype-background').style.display="none";
		document.getElementById('ocsstype-font').style.display="none";
		document.getElementById('ocsstype-offsets').style.display="none";
		document.getElementById('ocsstype-dimensions').style.display="none";
		document.getElementById('ocsstype-effects').style.display="none";
		document.getElementById('oss_buttons').style.display="none";
		document.getElementById('ocsstype-text').style.display="none";

		//document.getElementById('auto_css_div').style.display="none";
		//document.getElementById('ncsstype').value=0;
		//document.getElementById('ocsstype').value=0;
		//document.getElementById("colorwheel").style.display="none";
		//tt_Hide();
		}






function doAutoAssign(counter){

var temp_attrib ;
var temp_assign ;

  if (document.getElementById) {
     temp_assign = document.getElementById('autoassign').value;
	 temp_attrib = document.getElementById('autoattrib').value;

 
	 switch(temp_assign)
	  {
		case('all'):
			for(i=0;i<counter;i++)
			{
			applyattrib(temp_attrib,i);

			}
		break;

		case('top'):
			for(i=0;i<counter;i++)
			{
			 var node = tree.allNodes['tree-'+(i+1)];
				
				if(node.parentNode.id=="tree"){
					
				applyattrib(temp_attrib,i);
				}
			}
		break;
		
		case('active'):
			for(i=0;i<counter;i++)
			{
				if(document.adminForm.cid[i].checked==true){
					
				applyattrib(temp_attrib,i);
				}
			}
		break;
		case('parent'):
			for(i=0;i<counter;i++)
			{
			 var node = tree.allNodes['tree-'+(i+1)];
				if(node.isFolder){
				applyattrib(temp_attrib,i);
				}
			}
		break;

		case('sub'):
			for(i=0;i<counter;i++)
			{
			 var node = tree.allNodes['tree-'+(i+1)];
				
				if(node.parentNode.id!="tree"){
					
				applyattrib(temp_attrib,i);
				}
			}
		break;

		case('child'):
			for(i=0;i<counter;i++)
			{
			 var node = tree.allNodes['tree-'+(i+1)];
				if(node.isDoc){
				applyattrib(temp_attrib,i);
				}
			}
		break;
		}
	}
	document.getElementById('autoattrib').selectedIndex=0;
	document.getElementById('autoassign').selectedIndex=0;
	treeInfo();
	hide_all();
}

function check_box(){
 var form =document.adminForm;
 var node = tree.getActiveNode();
 var i = parseInt(node.id.replace('tree-',''));
 if(form.cid[(i-1)].checked==false){
	form.cid[(i-1)].checked=true; 
 }else{
	 form.cid[(i-1)].checked=false;
 }
}

function doSelectChange(){

var temp_attrib ;
var temp_assign ;

  if (document.getElementById) {
    temp_assign = document.getElementById('autoassign').value;
	var form = document.adminForm;
	j=form.cid.length; //alert(j)
	for (i=0; i<j; i++){
		
		if(temp_assign!="active"){
			form.cid[i].checked=false;
			
		}

		 switch(temp_assign)
	  {
		case('all'):
			form.cid[i].checked=true;
		break;

		case('top'):
		 var node = tree.allNodes['tree-'+(i+1)];
			if(node.parentNode.id=="tree"){
				form.cid[i].checked=true;	
			}
		break;
		
		case('parent'):
		 var node = tree.allNodes['tree-'+(i+1)];
				if(node.isFolder){
				form.cid[i].checked=true;	
			}
		break;

		case('sub'):
		 var node = tree.allNodes['tree-'+(i+1)];
			if(node.parentNode.id!="tree"){
				form.cid[i].checked=true;		
			
			}
		break;

		case('child'):
			 var node = tree.allNodes['tree-'+(i+1)];
				if(node.isDoc){
				form.cid[i].checked=true;	
		}
		break;
		}
	}


	
	}
	//treeInfo();
	//hide_all();
}

function doImageChange(){
var temp_x= document.getElementById('autoattrib').value;
hide_all();
if(temp_x=="image1" || temp_x=="image2"){
document.getElementById("auto_image").style.display="block";
		//ImageSelector.select('globalimage');
	}else if (temp_x=="normalcss" || temp_x=="overcss"){
			document.getElementById("auto_css_div").style.display="block";
				}else if (temp_x=='dontshowname'){
				//hideAll();
				}else if (temp_x=='imageleft'){
				//hideAll();
				
				}else if (temp_x=='imageright'){
				//hideAll();
				}else if (temp_x=='islink'){
				//hideAll();
				}else if (temp_x=='isnotlink'){
			//hideAll();
				}else{
				//	hideAll();
				}
}


function applyattrib(temp_attrib,i){

	var node = tree.allNodes['tree-'+(i+1)];
			
				if(temp_attrib=='image1'||temp_attrib=='image2'){
					var temp_globalimage=document.getElementById('globalimagehidden').value;
					var temp_globalimage_width=document.getElementById('globalimage_width').value;
					var temp_globalimage_height=document.getElementById('globalimage_height').value;
					var temp_globalimage_hspace=document.getElementById('globalimage_hspace').value;
					var temp_globalimage_vspace=document.getElementById('globalimage_vspace').value;
					
					
					if (temp_attrib=='image1'){
					node.image = temp_globalimage;
					node.image_width = temp_globalimage_width;
					node.image_height = temp_globalimage_height;
					node.image_hspace = temp_globalimage_hspace;
					node.image_vspace = temp_globalimage_vspace;
					
					node.image_width = temp_globalimage_width;
					node.image_height = temp_globalimage_height;
					node.image_hspace = temp_globalimage_hspace;
					node.image_vspace = temp_globalimage_vspace;
					}else{
					node.image_over = temp_globalimage;
					node.image_over_width = temp_globalimage_width;
					node.image_over_height = temp_globalimage_height;
					node.image_over_hspace = temp_globalimage_hspace;
					node.image_over_vspace = temp_globalimage_vspace;
					
					node.image_over_hspace = temp_globalimage_width;
					node.image_over_height = temp_globalimage_height;
					node.image_over_hspace = temp_globalimage_hspace;
					node.image_over_vspace = temp_globalimage_vspace;
					}
				
				
				}else if (temp_attrib=='showname'){
				node.showname=1;
				
				}else if (temp_attrib=='dontshowname'){
				node.showname=0;
				
				}else if (temp_attrib=='imageleft'){
				node.image_align="left";
				
				}else if (temp_attrib=='imageright'){
				node.image_align="right";
				
				}else if (temp_attrib=='islink'){
				node.target = 1;
				}else if (temp_attrib=='isnotlink'){
				node.target = 0;
				}else if (temp_attrib=='showitem'){
				node.showitem = 1;
				}else if (temp_attrib=='dontshowitem'){
				node.showitem = 0;
				}else if (temp_attrib=='normalcss'){
				node.ncss = document.getElementById('auto_css').value;
				}else if (temp_attrib=='overcss'){
				node.ocss = document.getElementById('auto_css').value;
				}
				
}

function get_cufon(){


  		SqueezeBox.open('index.php?option=com_swmenupro&task=get_cufon&layout=modal&tmpl=component&client_id=0', {handler: 'iframe', size: {x: 450, y: 180}});
                       
                }

function  jInsertCufon(filename, fontname){
jQuery('#top_ttf').append( new Option(fontname,filename) );
jQuery('#sub_ttf').append( new Option(fontname,filename) );

//alert(filename);
}
function get_module(){
id=document.getElementById("id").value;
//class="modal" href="index.php?option=com_modules&amp;client_id=0&amp;task=module.edit&amp;id=40&amp;tmpl=component&amp;view=module&amp;layout=modal" rel="{handler: 'iframe', size: {x: 900, y: 550}}"
  		SqueezeBox.open('index.php?option=com_modules&client_id=0&task=module.edit&view=module&layout=modal&tmpl=component&id='+id, {handler: 'iframe', size: {x: 870, y: 620}});
		
	//	SqueezeBox.open('index.php?option=com_modules&client_id=0&task=module.add&view=module&layout=modal&tmpl=component&eid=711', {handler: 'iframe', size: {x: 800, y: 520}});
		
                       
                }


function get_background_image(textField){


  field = document.getElementById(textField);
  if(field.id=='top_sub'||field.id=='sub_sub'){
  folder='swmenupro/arrows';
  filename=field.value;
  //alert(filename);
  }else{
  folder = document.getElementById('defaultfolder').value;
  filename=field.value;
  }
  //filename=field.value;
               
					if(filename  && field.id!="ncsstype-background_image"){
					var m = filename.match(/(.*)[\/\\]([^\/\\]+\.\w+)$/);
		            folder=m[1].substring(7);
                   // alert(folder);
					}

			SqueezeBox.open('index.php?option=com_media&view=images&tmpl=component&e_name='+textField+'&folder='+folder, {handler: 'iframe', size: {x: 800, y: 520}});
                       
                }

function jInsertEditorText(imagetext,ts){
                    
                   // field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
                    filename=jQuery(imagetext).attr('src');
					
					
					if(filename){
					var m = filename.match(/(.*)[\/\\]([^\/\\]+\.\w+)$/);
		            folder=m[1].substring(7);
                   document.getElementById('defaultfolder').value=folder;
					
					//alert(filename);
					
					//field.style.background = "url(../" + filename + ")"; 
                    //field2.value =  filename;
					//alert(this.field2.id);
					if(field2.id=='main_back_image'){
					field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
					field.style.background = "url(../" + filename + ")"; 
                    field2.value =  filename;
					jQuery('.top_preview.normal').css('background-image','url(../'+filename+')');
					jQuery('#top_sub_table').css('background-image','url(../'+document.getElementById('main_back_image').value+')');
					}else if(field2.id=='main_back_image_over'){
					field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
					field.style.background = "url(../" + filename + ")"; 
                    field2.value =  filename;
					jQuery('#top_preview_hover').css('background-image','url(../'+filename+')');
					}else if(field2.id=='sub_back_image'){
					field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
					field.style.background = "url(../" + filename + ")"; 
                    field2.value =  filename;
					jQuery('.sub_preview.normal').css('background-image','url(../'+filename+')');
					jQuery('#sub_sub_table').css('background-image','url(../'+document.getElementById('sub_back_image').value+')');
					}else if(field2.id=='sub_back_image_over'){
					field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
					field.style.background = "url(../" + filename + ")"; 
                    field2.value =  filename;
					jQuery('.sub_preview.hover').css('background-image','url(../'+filename+')');
					}else if(field2.id=='active_background_image'){
					field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
					field.style.background = "url(../" + filename + ")"; 
                    field2.value =  filename;
					jQuery('#top_preview_active').css('background-image','url(../'+filename+')');
					}else if(field2.id=='complete_background_image'){
					field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
					field.style.background = "url(../" + filename + ")"; 
                    field2.value =  filename;
					jQuery('#top_preview_outer').css('background-image','url(../'+filename+')');
					}else if(field2.id=='top_sub'){
					 field = document.getElementById(ts);
                     field2 = document.getElementById(ts+"_indicator");
					 field.src = "../" + filename; 
                     field2.value = filename; 
					}else if(field2.id=='sub_sub'){
					 field = document.getElementById(ts);
                     field2 = document.getElementById(ts+"_indicator");
					 field.src = "../" + filename; 
                     field2.value = filename; 
					}else if(field2.id=='tree-image'){
					 field = document.getElementById(ts);
                     field2 = document.getElementById(ts+"hidden");
                     field.src =  "../" + filename; //params.f_url
                     field2.value = "../" +  filename; //params.f_url
                     treeInfoUpdate();
					}else if(field2.id=='tree-image_over'){
					 field = document.getElementById(ts);
                     field2 = document.getElementById(ts+"hidden");
                     field.src =  "../" + filename; //params.f_url
                     field2.value = "../" +  filename; //params.f_url
                     treeInfoUpdate();
					}else if(field2.id=='ncsstype-background_image'){
					field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
					field.style.background = "url(../" + filename + ")"; 
                    field2.value =  document.getElementById("rel_path").value + "/" +filename;
					}else if(field2.id=='globalimage'){
					 field = document.getElementById(ts);
                     field2 = document.getElementById(ts+"hidden");
                     field.src =  "../" + filename; //params.f_url
                     field2.value = "../" +  filename; //params.f_url
                    }else if(field2.id=='ocsstype-background_image'){
					field = document.getElementById(ts+'_box');
                    field2 = document.getElementById(ts);
					field.style.background = "url(../" + filename + ")"; 
                    field2.value =  document.getElementById("rel_path").value + "/" +filename;
					}
                    

}

					
					
                    // field.style.background = "url(../" + filename + ")"; 
                   //  field2.value =  filename;
					
                }





function doFontColor(el){
	
	if(el.id=="main_font_color"){
		jQuery('.top_preview.normal').css('color',el.value);
    	if(document.getElementById( "top_ttf" ).value!=''){
			var col=document.getElementById('main_font_color').value;
			var str=jQuery('#top_ttf option:selected').text();
		    Cufon.replace('.top_preview.normal',{fontFamily:str,fontColor:col});
		}
	}else if(el.id=="main_font_color_over"){
		jQuery('#top_preview_hover').css('color',el.value);
    	if(document.getElementById( "top_ttf" ).value!=''){
			var col=document.getElementById('main_font_color_over').value;
			var str=jQuery('#top_ttf option:selected').text();
		    Cufon.replace('#top_preview_hover',{fontFamily:str,fontColor:col});
		}
	}else if(el.id=="sub_font_color"){
		jQuery('.sub_preview.normal').css('color',el.value);
    	if(document.getElementById( "sub_ttf" ).value!=''){
			var col=document.getElementById('sub_font_color').value;
			var str=jQuery('#sub_ttf option:selected').text();
		    Cufon.replace('.sub_preview.normal',{fontFamily:str,fontColor:col});
		}
	}else if(el.id=="sub_font_color_over"){
		jQuery('#sub_preview_hover').css('color',el.value);
    	if(document.getElementById( "sub_ttf" ).value!=''){
			var col=document.getElementById('sub_font_color_over').value;
			var str=jQuery('#sub_ttf option:selected').text();
		    Cufon.replace('#sub_preview_hover',{fontFamily:str,fontColor:col});
		}
	}else if(el.id=="active_font"){
		jQuery('#top_preview_active').css('color',el.value);
    	if(document.getElementById( "top_ttf" ).value!=''){
			var col=document.getElementById('active_font').value;
			var str=jQuery('#top_ttf option:selected').text();
		    Cufon.replace('#top_preview_active',{fontFamily:str,fontColor:col});
		}
	}
	
	
	
}




function do_complete_corner(){
	
	c_style=document.getElementById('c_corner_style').value;
	c_size=document.getElementById('c_corner_size').value;
	c_corner=(document.getElementById('ctl_corner').checked?'tl ':'');
	c_corner+=(document.getElementById('ctr_corner').checked?'tr ':'');
	c_corner+=(document.getElementById('cbl_corner').checked?'bl ':'');
	c_corner+=(document.getElementById('cbr_corner').checked?'br ':'');
	//alert(c_corner);

if(document.getElementById('c_corner_style').value=="none"){
	//alert('hello');
jQuery('div.jquery-corner',jQuery('#top_oreview_outer')).remove();
jQuery('#top_preview_outer').uncorner();
jQuery('div.jquery-corner', jQuery('#top_preview_parent')).remove();
//jQuery('div.jquery-corner').remove();
jQuery('#top_preview_parent').uncorner();
jQuery('#top_preview_parent').css('background-color','transparent');
//jQuery('#top_preview_outer').css('border',document.getElementById('main_border').value);
doMainBorder();
//jQuery('#top_preview_outer').css('background-color', document.getElementById('complete_background').value);
}else{
jQuery('div.jquery-corner',jQuery('#top_preview_outer')).remove();
//jQuery('div.jquery-corner:not(.top_preview)').remove();
jQuery('#top_preview_outer').uncorner();
jQuery('div.jquery-corner', jQuery('#top_preview_parent')).remove();
//jQuery('div.jquery-corner').remove();
jQuery('#top_preview_parent').uncorner();

if((document.getElementById('main_border_width').value>0)&&(document.getElementById('main_border_style').value!='none')){
	col=document.getElementById('main_border_color').value;
	b_width=document.getElementById('main_border_width').value;
	bw=parseInt(c_size)+parseInt(b_width);
	jQuery('#top_preview_outer').css('border','0');
	jQuery('#top_preview_parent').css('background-color',col);
	jQuery('#top_preview_parent').css('padding',(parseInt(b_width))+'px');
	jQuery('#top_preview_parent').corner('keep '+c_style+' '+c_corner+' '+bw+'px');
	
	jQuery('#top_preview_outer').corner(c_style+' '+c_corner+' '+c_size+'px');	

	
	
}else{
	//alert("hello");
jQuery('#top_preview_outer').css('border','0');
jQuery('#top_preview_parent').css('padding','0');
jQuery('#top_preview_parent').css('background-color','transparent');
jQuery('#top_preview_outer').corner(c_style+' '+c_corner+' '+c_size+'px');
}
//do_top_corner();
}
//doMainBorder();
}

function do_top_corner(){
	
	c_style=document.getElementById('t_corner_style').value;
	c_size=document.getElementById('t_corner_size').value;
	c_corner=(document.getElementById('ttl_corner').checked?'tl ':'');
	c_corner+=(document.getElementById('ttr_corner').checked?'tr ':'');
	c_corner+=(document.getElementById('tbl_corner').checked?'bl ':'');
	c_corner+=(document.getElementById('tbr_corner').checked?'br ':'');
	//alert(c_corner);

if(document.getElementById('t_corner_style').value=="none"){
	//alert('hello');
	jQuery('div.jquery-corner', jQuery('.top_preview_item')).remove();
//jQuery('div.jquery-corner').remove();
jQuery('.top_preview_item').uncorner();
jQuery('div.jquery-corner', jQuery('.top_preview')).remove();
jQuery('.top_preview').uncorner();

jQuery('.top_preview').css('margin-top',document.getElementById('top_margin_top').value+'px');
jQuery('.top_preview').css('margin-right',document.getElementById('top_margin_right').value+'px');
jQuery('.top_preview').css('margin-bottom',document.getElementById('top_margin_bottom').value+'px');
jQuery('.top_preview').css('margin-left',document.getElementById('top_margin_left').value+'px');
jQuery('.top_preview_item').css('background-color','transparent');
jQuery('.top_preview_item').css('margin','0');
jQuery('.top_preview_item').css('padding','0');
doMainBorder();
//jQuery('#top_preview_outer').css('background-color', document.getElementById('complete_background').value);
}else{
	jQuery('div.jquery-corner',jQuery('.top_preview')).remove();
//jQuery('div.jquery-corner:not(.top_preview)').remove();
jQuery('.top_preview').uncorner();
jQuery('div.jquery-corner', jQuery('.top_preview_item')).remove();
//jQuery('div.jquery-corner').remove();
jQuery('.top_preview_item').uncorner();

if((document.getElementById('main_border_over_width').value>0)&&(document.getElementById('main_border_over_style').value!='none')&&(document.getElementById('t_corner_style').value!='none')){
	col=document.getElementById('main_border_color_over').value;
	b_width=document.getElementById('main_border_over_width').value;
	bw=parseInt(c_size)+parseInt(b_width);
	
	jQuery('.top_preview_item').css('margin-top',document.getElementById('top_margin_top').value+'px');
	jQuery('.top_preview_item').css('margin-right',document.getElementById('top_margin_right').value+'px');
	jQuery('.top_preview_item').css('margin-bottom',document.getElementById('top_margin_bottom').value+'px');
	jQuery('.top_preview_item').css('margin-left',document.getElementById('top_margin_left').value+'px');
	
	jQuery('.top_preview_item').css('background-color',col);
	jQuery('.top_preview_item').css('border','0');
jQuery('.top_preview').css('border','0');
	jQuery('.top_preview').css('margin','0');
	jQuery('.top_preview_item').css('padding',(parseInt(b_width))+'px');
	jQuery('.top_preview_item').corner(c_style+' '+c_corner+' '+bw+'px');
	
	jQuery('.top_preview').corner(c_style+' '+c_corner+' '+c_size+'px');	

	
	
}else if(document.getElementById('t_corner_style').value=='none'){
	//doMainBorder();
}else{
jQuery('.top_preview').css('margin-top',document.getElementById('top_margin_top').value+'px');
jQuery('.top_preview').css('margin-right',document.getElementById('top_margin_right').value+'px');
jQuery('.top_preview').css('margin-bottom',document.getElementById('top_margin_bottom').value+'px');
jQuery('.top_preview').css('margin-left',document.getElementById('top_margin_left').value+'px');
jQuery('.top_preview_item').css('background-color','transparent');
jQuery('.top_preview_item').css('margin','0');
jQuery('.top_preview_item').css('padding','0');
jQuery('.top_preview').corner(c_style+' '+c_corner+' '+c_size+'px');
//doMainBorder();
}
//doMainBorder();
}
}
//jQuery('#sub_preview_outer').parent().css('background-color','#000');
function do_sub_corner(){
	
	s_style=document.getElementById('s_corner_style').value;
	s_size=document.getElementById('s_corner_size').value;
	s_corner_first=(document.getElementById('stl_corner').checked?'tl ':'');
	s_corner_first+=(document.getElementById('str_corner').checked?'tr ':'');
	s_corner_last=(document.getElementById('sbl_corner').checked?'bl ':'');
	s_corner_last+=(document.getElementById('sbr_corner').checked?'br ':'');
	
	

jQuery('.sub_preview.level1').uncorner();
jQuery('#sub_preview_parent').uncorner();
jQuery('#sub_preview_parent').css('background-color','transparent');
jQuery('#sub_preview_parent').css('padding','0px');
jQuery('.sub_preview.level1').parent().css('background-color','transparent');
	jQuery('.sub_preview.level1').parent().css('padding','0px');

if((document.getElementById('sub_border_width').value>0)&&(document.getElementById('sub_border_style').value!='none')&&s_style!='none'){
	col=document.getElementById('sub_border_color').value;
	b_width=document.getElementById('sub_border_width').value;
	bw=parseInt(s_size)+parseInt(b_width);
	jQuery('#sub_preview_outer').css('border','0');
	jQuery('#sub_preview_parent').css('background-color',col);
	jQuery('#sub_preview_parent').css('padding',(parseInt(b_width))+'px');
	jQuery('#sub_preview_parent').corner('keep '+s_style+' '+s_corner_first+' '+s_corner_last+' '+bw+'px');
	
	//jQuery('#sub_preview_outer').corner(s_style+' '+s_corner_first+' '+s_corner_last+' '+s_size+'px');	
if(s_corner_first&&(s_style!='none')){jQuery('.sub_preview.level1.first').corner('keep '+s_style+' '+s_corner_first+' '+s_size+'px');}
if(s_corner_last&&(s_style!='none')){jQuery('.sub_preview.level1.last').corner('keep '+s_style+' '+s_corner_last+' '+s_size+'px');}
//if(si_corner&&(si_style!='none')){jQuery('.sub_preview.level1').corner('keep '+si_style+' '+si_corner+' '+si_size+'px');}
	
	
}else if(s_style=='none'){
doSubBorder();
}else{
//if(si_corner&&(si_style!='none')){jQuery('.sub_preview.level1').corner('keep '+si_style+' '+si_corner+' '+si_size+'px');}


if(s_corner_first&&(s_style!='none')){jQuery('.sub_preview.level1.first').corner('keep '+s_style+' '+s_corner_first+' '+s_size+'px');}
if(s_corner_last&&(s_style!='none')){jQuery('.sub_preview.level1.last').corner('keep '+s_style+' '+s_corner_last+' '+s_size+'px');}

}



//doSubBorder();

}

function do_sub_inside_corner(){
	
	si_style=document.getElementById('si_corner_style').value;
	si_size=document.getElementById('si_corner_size').value;
	si_corner=(document.getElementById('sitl_corner').checked?'tl ':'');
	si_corner+=(document.getElementById('sitr_corner').checked?'tr ':'');
	si_corner+=(document.getElementById('sibl_corner').checked?'bl ':'');
	si_corner+=(document.getElementById('sibr_corner').checked?'br ':'');



jQuery('.sub_preview.level1').uncorner();
jQuery('.sub_preview.level1').parent().uncorner();
//jQuery('.sub_preview.level1').parent().css('background-color','transparent');
//jQuery('#sub_preview_parent').css('padding','0px');
jQuery('.sub_preview.level1').parent().css('background-color','transparent');
	jQuery('.sub_preview.level1').parent().css('padding','0px');

if((document.getElementById('sub_border_over_width').value>0)&&(document.getElementById('sub_border_over_style').value!='none')&&si_style!='none'){
	col=document.getElementById('sub_border_color_over').value;
	b_width=document.getElementById('sub_border_over_width').value;
	bw=parseInt(si_size)+parseInt(b_width);
	jQuery('.sub_preview.level1').css('border','0');
	//jQuery('.sub_preview.level1').wrap('<div></div>');
	jQuery('.sub_preview.level1').parent().css('background-color',col);
	jQuery('.sub_preview.level1').parent().css('padding',(parseInt(b_width))+'px');
	jQuery('.sub_preview.level1').parent().corner('keep '+si_style+' '+si_corner+' '+bw+'px');
	
	//jQuery('#sub_preview_outer').corner(s_style+' '+s_corner_first+' '+s_corner_last+' '+s_size+'px');	
//if(s_corner_first&&(s_style!='none')){jQuery('.sub_preview.level1.first').corner('keep '+s_style+' '+s_corner_first+' '+s_size+'px');}
//if(s_corner_last&&(s_style!='none')){jQuery('.sub_preview.level1.last').corner('keep '+s_style+' '+s_corner_last+' '+s_size+'px');}
if(si_corner&&(si_style!='none')){jQuery('.sub_preview.level1').corner('keep '+si_style+' '+si_corner+' '+si_size+'px');}
	
	
}else if(si_style=='none'){
doSubBorder();
}else{
if(si_corner&&(si_style!='none')){jQuery('.sub_preview.level1').corner('keep '+si_style+' '+si_corner+' '+si_size+'px');}


//if(s_corner_first&&(s_style!='none')){jQuery('.sub_preview.level1.first').corner('keep '+s_style+' '+s_corner_first+' '+s_size+'px');}
//if(s_corner_last&&(s_style!='none')){jQuery('.sub_preview.level1.last').corner('keep '+s_style+' '+s_corner_last+' '+s_size+'px');}

}



//doSubBorder();

}

function doShadow(){
	//alert('hello');
	//jQuery('#top_preview_outer').removeShadow();
	//jQuery('.top_preview').removeShadow();
	//jQuery('#sub_preview_outer').removeShadow();
	
	//cs=jQuery('input[name=complete_shadow]:checked').val();
	//if(cs==1){
	//	jQuery('#top_preview_outer').dropShadow();
		//jQuery('#top_preview_outer').corner('30px');
		
		//var myShadowId = jQuery("#top_preview_outer").shadowId();
		//alert(myShadowId);
		//jQuery('.dropShadow').corner('30px');
	//}
	//ts=jQuery('input[name=top_shadow]:checked').val();
	//if(ts==1){
		//jQuery('.top_preview').dropShadow();
	//}
	//ss=jQuery('input[name=sub_shadow]:checked').val();
	//if(ss==1){
		//jQuery('#sub_preview_outer').dropShadow();
	//}
	
	
	
}
		
		
function doCompletePreview(){
var el=document.getElementById('font_family');	
		
jQuery('.top_preview').css('font-family',el.value);	

el=document.getElementById('main_font_size');	
		
jQuery('.top_preview').css('font-size',el.value+'px');	


el=document.getElementById('main_width');	
		
if(el.value>0){jQuery('.top_preview').css('width',el.value+'px');}else{jQuery('.top_preview').css('width','auto')}	

el=document.getElementById('main_height');	
		
if(el.value>0){jQuery('.top_preview').css('height',el.value+'px');}else{jQuery('.top_preview').css('height','auto')}		

el=document.getElementById('font_weight');	
		
jQuery('.top_preview').css('font-weight',el.value);	

el=document.getElementById('main_align');	
		
jQuery('.top_preview').css('text-align',el.value);

el=document.getElementById('top_wrap');	
		
jQuery('.top_preview').css('white-space',el.value);	

do_top_font_extra();


el= document.getElementById("main_font_color");
jQuery('.top_preview.normal').css('color',el.value);

if(document.getElementById( "top_ttf" ).value!=''){
	do_top_ttf();
}

el= document.getElementById("main_font_color_over");
jQuery('#top_preview_hover').css('color',el.value);


el= document.getElementById("active_font");
jQuery('#top_preview_active').css('color',el.value);

if(document.getElementById( "top_ttf" ).value!=''){
	var size=document.getElementById('main_font_size').value;
	var str=jQuery('#top_ttf option:selected').text();
    Cufon.replace('#top_preview_active',{fontFamily:str,fontColor:el.value,fontSize:size+'px'});
}


el= document.getElementById("complete_background");
if(el.value!=''){jQuery('#top_preview_outer').css('background-color',el.value);}else{jQuery('#top_preview_outer').css('background-color','transparent');}

el= document.getElementById("main_back");
if(el.value!=''){jQuery('.top_preview.normal').css('background-color',el.value);}else{jQuery('.top_preview.normal').css('background-color','transparent');}

el= document.getElementById("main_over");
if(el.value!=''){jQuery('#top_preview_hover').css('background-color',el.value);}else{jQuery('#top_preview_hover').css('background-color','transparent');}

el= document.getElementById("active_background");
if(el.value!=''){jQuery('#top_preview_active').css('background-color',el.value);}else{jQuery('#top_preview_active').css('background-color','transparent');}

el= document.getElementById("complete_background_image");
jQuery('#top_preview_outer').css('background-image','url(../'+el.value+')');

el= document.getElementById("main_back_image");
jQuery('.top_preview.normal').css('background-image','url(../'+el.value+')');

el= document.getElementById("main_back_image_over");
jQuery('#top_preview_hover').css('background-image','url(../'+el.value+')');

el= document.getElementById("active_background_image");
jQuery('#top_preview_active').css('background-image','url(../'+el.value+')');

	
doCompletePadding();
doMainPadding();
do_complete_corner();
do_top_corner();






var el=document.getElementById('sub_font_family');	
		
jQuery('.sub_preview').css('font-family',el.value);	

el=document.getElementById('sub_font_size');	
		
jQuery('.sub_preview').css('font-size',el.value+'px');	


el=document.getElementById('sub_width');	
		
if(el.value>0){jQuery('.sub_preview').css('width',el.value+'px');}else{jQuery('.sub_preview').css('width','auto')}	

el=document.getElementById('sub_height');	
		
if(el.value>0){jQuery('.sub_preview').css('height',el.value+'px');}else{jQuery('.sub_preview').css('height','auto')}		

el=document.getElementById('font_weight_over');	
		
jQuery('.sub_preview').css('font-weight',el.value);	

el=document.getElementById('sub_align');	
		
jQuery('.sub_preview').css('text-align',el.value);

el=document.getElementById('sub_wrap');	
		
jQuery('.sub_preview').css('white-space',el.value);	

do_sub_font_extra();


el= document.getElementById("sub_font_color");
jQuery('.sub_preview.normal').css('color',el.value);

if(document.getElementById( "sub_ttf" ).value!=''){
	do_sub_ttf();
}

el= document.getElementById("sub_font_color_over");
jQuery('#sub_preview_hover').css('color',el.value);




el= document.getElementById("sub_back");
if(el.value!=''){jQuery('.sub_preview.normal').css('background-color',el.value);}else{jQuery('.sub_preview.normal').css('background-color','transparent');}

el= document.getElementById("sub_over");
if(el.value!=''){jQuery('.sub_preview.hover').css('background-color',el.value);}else{jQuery('.sub_preview.hover').css('background-color','transparent');}

el= document.getElementById("sub_back_image");
jQuery('.sub_preview.normal').css('background-image','url(../'+el.value+')');

el= document.getElementById("sub_back_image_over");
jQuery('.sub_preview.hover').css('background-image','url(../'+el.value+')');


doSubPadding();
doSubBorder();
do_sub_corner();

jQuery('#top_sub_table').css('background-color',document.getElementById('main_back').value);
jQuery('#sub_sub_table').css('background-color',document.getElementById('sub_back').value);
jQuery('#top_sub_table').css('background-image','url(..'+document.getElementById('main_back_image').value+')');
jQuery('#sub_sub_table').css('background-image','url(..'+document.getElementById('sub_back_image').value+')');
		
	//doShadow();		
			
}


function doColorChange(el){
	//alert(el.id);
	if(el.value!=""){
		if(el.id=='complete_background'){
			jQuery('#top_preview_outer').css('background-color',el.value);
		}else if(el.id=='main_back'){
			jQuery('.top_preview.normal').css('background-color',el.value);
		}else if(el.id=='main_over'){
			jQuery('#top_preview_hover').css('background-color',el.value);
		}else if(el.id=='sub_back'){
			jQuery('.sub_preview.normal').css('background-color',el.value);
		}else if(el.id=='sub_over'){
			jQuery('.sub_preview.hover').css('background-color',el.value);
		}else if(el.id=='active_background'){
			jQuery('#top_preview_active').css('background-color',el.value);
		}
	}else{
		if(el.id=='complete_background'){
			jQuery('#top_preview_outer').css('background-color','transparent');
		}else if(el.id=='main_back'){
			jQuery('.top_preview.normal').css('background-color','transparent');
		}else if(el.id=='main_over'){
			jQuery('#top_preview_hover').css('background-color','transparent');
		}else if(el.id=='sub_back'){
			jQuery('.sub_preview.normal').css('background-color','transparent');
		//	alert('hello');
		}else if(el.id=='sub_over'){
			jQuery('.sub_preview.hover').css('background-color','transparent');
		}else if(el.id=='active_background'){
			jQuery('#top_preview_active').css('background-color','transparent');
		}
	}
	jQuery('#top_sub_table').css('background-color',document.getElementById('main_back').value);
jQuery('#sub_sub_table').css('background-color',document.getElementById('sub_back').value);
	
}




function remove_cufon(selector) {
jQuery(selector).html( cufon_text(selector) );
return true;
}

function cufon_text(selector) {
var g = '';
jQuery(selector +' cufon cufontext').each(function() {
    g = g + jQuery(this).html();
}); 
return jQuery.trim(g);
}

function do_top_ttf(){
	var str=jQuery('#top_ttf option:selected').text();
	if(document.getElementById('top_ttf').value==""){
		// Cufon.replace('.top_preview');
		remove_cufon('#top_preview_normal');
		remove_cufon('#top_preview_hover');
		remove_cufon('#top_preview_active');
		remove_cufon('#top_preview_normal2');
		//alert("hello");
	
	}else{
	
	s2="../modules/mod_swmenupro/fonts/"+document.getElementById('top_ttf').value;


 jQuery.getScript(s2, function() {
 	
            Cufon.replace('#top_preview_normal ',{fontFamily:str});
              Cufon.replace('#top_preview_hover ',{fontFamily:str});
                Cufon.replace('#top_preview_active ',{fontFamily:str});
                Cufon.replace('#top_preview_normal2 ',{fontFamily:str});
        });


	}
	
	if(str=="None"){
	document.getElementById('top_font_face').value="";
	}else{
document.getElementById('top_font_face').value=str;
}

//Cufon.replace('.top_preview',{hover: true});
}

function do_sub_ttf(){
	var str=jQuery('#sub_ttf option:selected').text();
	if(document.getElementById('sub_ttf').value==""){
		// Cufon.replace('.top_preview');
		remove_cufon('#sub_preview_normal');
		remove_cufon('#sub_preview_hover');
		remove_cufon('#sub_preview_active');
		remove_cufon('#sub_preview_normal2');
		remove_cufon('#sub_preview_normal3');
		//alert("hello");
	
	}else{
	
	s2="../modules/mod_swmenupro/fonts/"+document.getElementById('sub_ttf').value;


 jQuery.getScript(s2, function() {
 	
 
            Cufon.replace('#sub_preview_normal ',{fontFamily:str});
              Cufon.replace('#sub_preview_hover ',{fontFamily:str});
                Cufon.replace('#sub_preview_active ',{fontFamily:str});
                Cufon.replace('#sub_preview_normal2 ',{fontFamily:str});
                 Cufon.replace('#sub_preview_normal3 ',{fontFamily:str});
        });


	}
	//alert(jQuery('#sub_ttf option:selected').text());
if(str=="None"){
	document.getElementById('sub_font_face').value="";
	}else{
document.getElementById('sub_font_face').value=str;
}
//Cufon.replace('.top_preview',{hover: true});
}




(function(){

if (this.Hash) return;

var Hash = this.Hash = new Type('Hash', function(object){
	if (typeOf(object) == 'hash') object = Object.clone(object.getClean());
	for (var key in object) this[key] = object[key];
	return this;
});

this.$H = function(object){
	return new Hash(object);
};

Hash.implement({

	forEach: function(fn, bind){
		Object.forEach(this, fn, bind);
	},

	getClean: function(){
		var clean = {};
		for (var key in this){
			if (this.hasOwnProperty(key)) clean[key] = this[key];
		}
		return clean;
	},

	getLength: function(){
		var length = 0;
		for (var key in this){
			if (this.hasOwnProperty(key)) length++;
		}
		return length;
	}

});

Hash.alias('each', 'forEach');

Hash.implement({

	has: Object.prototype.hasOwnProperty,

	keyOf: function(value){
		return Object.keyOf(this, value);
	},

	hasValue: function(value){
		return Object.contains(this, value);
	},

	extend: function(properties){
		Hash.each(properties || {}, function(value, key){
			Hash.set(this, key, value);
		}, this);
		return this;
	},

	combine: function(properties){
		Hash.each(properties || {}, function(value, key){
			Hash.include(this, key, value);
		}, this);
		return this;
	},

	erase: function(key){
		if (this.hasOwnProperty(key)) delete this[key];
		return this;
	},

	get: function(key){
		return (this.hasOwnProperty(key)) ? this[key] : null;
	},

	set: function(key, value){
		if (!this[key] || this.hasOwnProperty(key)) this[key] = value;
		return this;
	},

	empty: function(){
		Hash.each(this, function(value, key){
			delete this[key];
		}, this);
		return this;
	},

	include: function(key, value){
		if (this[key] == undefined) this[key] = value;
		return this;
	},

	map: function(fn, bind){
		return new Hash(Object.map(this, fn, bind));
	},

	filter: function(fn, bind){
		return new Hash(Object.filter(this, fn, bind));
	},

	every: function(fn, bind){
		return Object.every(this, fn, bind);
	},

	some: function(fn, bind){
		return Object.some(this, fn, bind);
	},

	getKeys: function(){
		return Object.keys(this);
	},

	getValues: function(){
		return Object.values(this);
	},

	toQueryString: function(base){
		return Object.toQueryString(this, base);
	}

});

Hash.alias({indexOf: 'keyOf', contains: 'hasValue'});


})();




function doSliders(){
	
	
	


		var select1 = document.getElementById( "c_corner_size" );
		var slider1 = jQuery( "<div align='left' style='width:140px;float:left;margin-left:10px;' id='slider1'></div>" ).insertBefore( select1 ).slider({
			min: 1,
			max: 80,
			range: "min",
			value: select1.value,
			slide: function( event, ui ) {
				select1.value = ui.value ;
				do_complete_corner();
			}
		});
		jQuery( "#c_corner_size" ).change(function() {
			slider1.slider( "value", select1.value );
			do_complete_corner();
			
		});
		
		
		var select2 = document.getElementById( "t_corner_size" );
		var slider2 = jQuery( "<div align='left' style='width:140px;float:left;margin-left:10px;' id='slider2'></div>" ).insertBefore( select2 ).slider({
			min: 1,
			max: 40,
			range: "min",
			value: select2.value,
			slide: function( event, ui ) {
				select2.value = ui.value ;
				do_top_corner();
			}
		});
		jQuery( "#t_corner_size" ).change(function() {
			slider2.slider( "value", select2.value );
			do_top_corner();
			
		});
		
		var select3 = document.getElementById( "s_corner_size" );
		var slider3 = jQuery( "<div align='left' style='width:140px;float:left;margin-left:10px;' id='slider3'></div>" ).insertBefore( select3 ).slider({
			min: 1,
			max: 40,
			range: "min",
			value: select3.value,
			slide: function( event, ui ) {
				select3.value = ui.value ;
				do_sub_corner();
			}
		});
		jQuery( "#s_corner_size" ).change(function() {
			slider3.slider( "value", select3.value );
			do_sub_corner();
			
		});

		var select4 = document.getElementById( "main_border_width" );
		var slider4 = jQuery( "<div align='left' style='width:140px;float:left;margin-left:10px;' id='slider4'></div>" ).insertBefore( select4 ).slider({
			min: 0,
			max: 10,
			range: "min",
			value: select4.value,
			slide: function( event, ui ) {
				select4.value = ui.value ;
				if(document.getElementById( "c_corner_style" ).value!='none'){
					do_complete_corner();
				}else{
				doMainBorder();
				}
			}
		});
		jQuery( "#main_border_width" ).change(function() {
			slider4.slider( "value", select4.value );
			if(document.getElementById( "c_corner_style" ).value!='none'){
					do_complete_corner();
				}else{
				doMainBorder();
				}
		});
		
		var select5 = document.getElementById( "main_border_over_width" );
		var slider5 = jQuery( "<div align='left' style='width:140px;float:left;margin-left:10px;' id='slider5'></div>" ).insertBefore( select5 ).slider({
			min: 0,
			max: 10,
			range: "min",
			value: select5.value,
			slide: function( event, ui ) {
				select5.value = ui.value ;
				doMainBorder();
			}
		});
		jQuery( "#main_border_over_width" ).change(function() {
			slider5.slider( "value", select5.value );
			doMainBorder();
			
		});
		
		var select6 = document.getElementById( "sub_border_width" );
		//4alert(select.value);
		var slider6 = jQuery( "<div align='left' style='width:140px;float:left;margin-left:10px;' id='slider6'></div>" ).insertBefore( select6 ).slider({
			min: 0,
			max: 10,
			range: "min",
			value: select6.value,
			slide: function( event, ui ) {
				select6.value = ui.value ;
				doSubBorder();
			}
		});
		jQuery( "#sub_border_width" ).change(function() {
			slider6.slider( "value", select6.value );
			doSubBorder();
			
		});
		
		var select7 = document.getElementById( "sub_border_over_width" );
		//4alert(select.value);
		var slider7 = jQuery( "<div align='left' style='width:140px;float:left;margin-left:10px;' id='slider7'></div>" ).insertBefore( select7 ).slider({
			min: 0,
			max: 10,
			range: "min",
			value: select7.value,
			slide: function( event, ui ) {
				select7.value = ui.value ;
				doSubBorder();
			}
		});
		jQuery( "#sub_border_over_width" ).change(function() {
			slider7.slider( "value", select7.value );
			doSubBorder();
			
		});

	
		var select8 = document.getElementById( "main_font_size" );
		//4alert(select.value);
		var slider8 = jQuery( "<div align='left' style='width:170px;float:left;margin-left:10px;' id='slider8'></div>" ).insertBefore( select8 ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select8.value,
			slide: function( event, ui ) {
				select8.value = ui.value ;
				jQuery('.top_preview').css('font-size',select8.value+'px');
				if(document.getElementById( "top_ttf" ).value!=''){
					var str=jQuery('#top_ttf option:selected').text();
				    Cufon.replace('.top_preview',{fontSize:select8.value+'px',fontFamily:str});
				}
			}
		});
		jQuery( "#main_font_size" ).change(function() {
			slider8.slider( "value", select8.value );
			if(document.getElementById( "top_ttf" ).value!=''){
					var str=jQuery('#top_ttf option:selected').text();
				    Cufon.replace('.top_preview',{fontSize:select8.value+'px',fontFamily:str});
				}
			
		});


		var select9 = document.getElementById( "sub_font_size" );
		var slider9 = jQuery( "<div align='left' style='width:170px;float:left;margin-left:10px;' id='slider9'></div>" ).insertBefore( select9 ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select9.value,
			slide: function( event, ui ) {
				select9.value = ui.value ;
				jQuery('.sub_preview').css('font-size',select9.value+'px');
				if(document.getElementById( "sub_ttf" ).value!=''){
					var str=jQuery('#sub_ttf option:selected').text();
				    Cufon.replace('.sub_preview',{fontSize:select9.value+'px',fontFamily:str});
				}
			}
		});
		jQuery( "#sub_font_size" ).change(function() {
			slider9.slider( "value", select9.value );
			if(document.getElementById( "sub_ttf" ).value!=''){
					var str=jQuery('#sub_ttf option:selected').text();
				    Cufon.replace('.sub_preview',{fontSize:select9.value+'px',fontFamily:str});
				}
			
		});
		
		var select10 = document.getElementById( "main_width" );
		var slider10 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider10'></div>" ).insertBefore( select10 ).slider({
			min: 0,
			max: 300,
			range: "min",
			value: select10.value,
			slide: function( event, ui ) {
				select10.value = ui.value ;
				if(select10.value!=0){
					jQuery('.top_preview').css('width',select10.value+'px');
				}else{
					jQuery('.top_preview').css({'width':''});
				}
			}
		});
		jQuery( "#main_width" ).change(function() {
			slider10.slider( "value", select10.value );
			if(select10.value!=0){
					jQuery('.top_preview').css('width',select10.value+'px');
				}else{
					jQuery('.top_preview').css({'width':''});
				}
			
		});
		
		var select11 = document.getElementById( "main_height" );
		var slider11 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider11'></div>" ).insertBefore( select11 ).slider({
			min: 0,
			max: 200,
			range: "min",
			value: select11.value,
			slide: function( event, ui ) {
				select11.value = ui.value ;
				if(select11.value!=0){
					jQuery('.top_preview').css('height',select11.value+'px');
				}else{
					jQuery('.top_preview').css({'height':''});
				}
			}
		});
		jQuery( "#main_height" ).change(function() {
			slider11.slider( "value", select11.value );
			if(select11.value!=0){
					jQuery('.top_preview').css('height',select11.value+'px');
				}else{
					jQuery('.top_preview').css({'height':''});
				}
			
		});
		var select12 = document.getElementById( "sub_width" );
		var slider12 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider12'></div>" ).insertBefore( select12 ).slider({
			min: 0,
			max: 300,
			range: "min",
			value: select12.value,
			slide: function( event, ui ) {
				select12.value = ui.value ;
				if(select12.value!=0){
					jQuery('.sub_preview').css('width',select12.value+'px');
				}else{
					jQuery('.sub_preview').css({'width':''});
				}
			}
		});
		jQuery( "#sub_width" ).change(function() {
			slider12.slider( "value", select12.value );
			select12.value = ui.value ;
				if(select12.value!=0){
					jQuery('.sub_preview').css('width',select12.value+'px');
				}else{
					jQuery('.sub_preview').css({'width':''});
				}
			
		});
		var select13 = document.getElementById( "sub_height" );
		var slider13 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider13'></div>" ).insertBefore( select13 ).slider({
			min: 0,
			max: 200,
			range: "min",
			value: select13.value,
			slide: function( event, ui ) {
				select13.value = ui.value ;
				if(select13.value!=0){
					jQuery('.sub_preview').css('height',select13.value+'px');
				}else{
					jQuery('.sub_preview').css({'height':''});
				}
			}
		});
		jQuery( "#sub_height" ).change(function() {
			slider13.slider( "value", select13.value );
			if(select13.value!=0){
					jQuery('.sub_preview').css('height',select13.value+'px');
				}else{
					jQuery('.sub_preview').css({'height':''});
				}
		});
		var select14 = document.getElementById( "top_margin_top" );
		var slider14 = jQuery( '#slider14' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select14.value,
			slide: function( event, ui ) {
				select14.value = ui.value ;
				doTopMargin();
			}
		});
		jQuery( "#top_margin_top" ).change(function() {
			slider14.slider( "value", select14.value );
			doTopMargin();
			
		});
		var select15 = document.getElementById( "top_margin_right" );
		var slider15 = jQuery( '#slider15' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select15.value,
			slide: function( event, ui ) {
				select15.value = ui.value ;
				doTopMargin();
			}
		});
		jQuery( "#top_margin_right" ).change(function() {
			slider15.slider( "value", select15.value );
			doTopMargin();
		});
		var select16 = document.getElementById( "top_margin_bottom" );
		var slider16 = jQuery( '#slider16' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select16.value,
			slide: function( event, ui ) {
				select16.value = ui.value ;
				doTopMargin();
			}
		});
		jQuery( "#top_margin_bottom" ).change(function() {
			slider16.slider( "value", select16.value );
			doTopMargin();
		});
		var select17 = document.getElementById( "top_margin_left" );
		var slider17 = jQuery( '#slider17' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select17.value,
			slide: function( event, ui ) {
				select17.value = ui.value ;
				doTopMargin();
			}
		});
		jQuery( "#top_margin_left" ).change(function() {
			slider17.slider( "value", select17.value );
			doTopMargin();
		});

		var select18 = document.getElementById( "complete_margin_top" );
		var slider18 = jQuery( '#slider18' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select18.value,
			slide: function( event, ui ) {
				select18.value = ui.value ;
				doCompletePadding();
			}
		});
		jQuery( "#complete_margin_top" ).change(function() {
			slider18.slider( "value", select18.value );
			doCompletePadding();
			
		});
		var select19 = document.getElementById( "complete_margin_right" );
		var slider19 = jQuery( '#slider19' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select19.value,
			slide: function( event, ui ) {
				select19.value = ui.value ;
				doCompletePadding();
			}
		});
		jQuery( "#complete_margin_right" ).change(function() {
			slider19.slider( "value", select19.value );
			doCompletePadding();
		});
		var select20 = document.getElementById( "complete_margin_bottom" );
		var slider20 = jQuery( '#slider20' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select20.value,
			slide: function( event, ui ) {
				select20.value = ui.value ;
				doCompletePadding();
			}
		});
		jQuery( "#complete_margin_bottom" ).change(function() {
			slider20.slider( "value", select20.value );
			doCompletePadding();
		});
		var select21 = document.getElementById( "complete_margin_left" );
		var slider21 = jQuery( '#slider21' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select21.value,
			slide: function( event, ui ) {
				select21.value = ui.value ;
				doCompletePadding();
			}
		});
		jQuery( "#complete_margin_left" ).change(function() {
			slider21.slider( "value", select21.value );
			doCompletePadding();
		});
		
		
		var select22 = document.getElementById( "main_pad_top" );
		var slider22 = jQuery( '#slider22' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select22.value,
			slide: function( event, ui ) {
				select22.value = ui.value ;
				doMainPadding();
			}
		});
		jQuery( "#main_pad_top" ).change(function() {
			slider22.slider( "value", select22.value );
			doMainPadding();
		});
		var select23 = document.getElementById( "main_pad_right" );
		var slider23 = jQuery( '#slider23' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select23.value,
			slide: function( event, ui ) {
				select23.value = ui.value ;
				doMainPadding();
			}
		});
		jQuery( "#main_pad_right" ).change(function() {
			slider23.slider( "value", select23.value );
			doMainPadding();
		});
		var select24 = document.getElementById( "main_pad_bottom" );
		var slider24 = jQuery( '#slider24' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select24.value,
			slide: function( event, ui ) {
				select24.value = ui.value ;
				doMainPadding();
			}
		});
		jQuery( "#main_pad_bottom" ).change(function() {
			slider24.slider( "value", select24.value );
			doMainPadding();
		});
		var select25 = document.getElementById( "main_pad_left" );
		var slider25 = jQuery( '#slider25' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select25.value,
			slide: function( event, ui ) {
				select25.value = ui.value ;
				doMainPadding();
			}
		});
		jQuery( "#main_pad_left" ).change(function() {
			slider25.slider( "value", select25.value );
			doMainPadding();
		});

		var select26 = document.getElementById( "sub_pad_top" );
		var slider26 = jQuery( '#slider26' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select26.value,
			slide: function( event, ui ) {
				select26.value = ui.value ;
				doSubPadding();
			}
		});
		jQuery( "#sub_pad_top" ).change(function() {
			slider26.slider( "value", select26.value );
			doSubPadding();
		});
		var select27 = document.getElementById( "sub_pad_right" );
		var slider27 = jQuery( '#slider27' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select27.value,
			slide: function( event, ui ) {
				select27.value = ui.value ;
				doSubPadding();
			}
		});
		jQuery( "#sub_pad_right" ).change(function() {
			slider27.slider( "value", select27.value );
			doSubPadding();
		});
		var select28 = document.getElementById( "sub_pad_bottom" );
		var slider28 = jQuery( '#slider28' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select28.value,
			slide: function( event, ui ) {
				select28.value = ui.value ;
				doSubPadding();
			}
		});
		jQuery( "#sub_pad_bottom" ).change(function() {
			slider28.slider( "value", select28.value );
			doSubPadding();
		});
		var select29 = document.getElementById( "sub_pad_left" );
		var slider29 = jQuery( '#slider29' ).slider({
			min: 0,
			max: 50,
			range: "min",
			value: select29.value,
			slide: function( event, ui ) {
				select29.value = ui.value ;
				doSubPadding();
			}
		});
		jQuery( "#sub_pad_left" ).change(function() {
			slider29.slider( "value", select29.value );
			doSubPadding();
		});
		
		var select30 = document.getElementById( "main_top" );
		var slider30 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider30'></div>" ).insertBefore( select30 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select30.value,
			slide: function( event, ui ) {
				select30.value = ui.value ;
				//do_complete_corner();
			}
		});
		jQuery( "#main_top" ).change(function() {
			slider30.slider( "value", select30.value );
			
		});
		
		
		var select31 = document.getElementById( "main_left" );
		var slider31 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider31'></div>" ).insertBefore( select31 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select31.value,
			slide: function( event, ui ) {
				select31.value = ui.value ;
				//do_top_corner();
			}
		});
		jQuery( "#main_left" ).change(function() {
			slider31.slider( "value", select31.value );
			
		});
		
		var select32 = document.getElementById( "level1_sub_top" );
		var slider32 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider32'></div>" ).insertBefore( select32 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select32.value,
			slide: function( event, ui ) {
				select32.value = ui.value ;
				//do_complete_corner();
			}
		});
		jQuery( "#level1_sub_top" ).change(function() {
			slider32.slider( "value", select32.value );
			
		});
		
		
		var select33 = document.getElementById( "level1_sub_left" );
		var slider33 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider33'></div>" ).insertBefore( select33 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select33.value,
			slide: function( event, ui ) {
				select33.value = ui.value ;
				//do_top_corner();
			}
		});
		jQuery( "#level1_sub_left" ).change(function() {
			slider33.slider( "value", select33.value );
			
		});
		
		var select34 = document.getElementById( "level2_sub_top" );
		var slider34 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider34'></div>" ).insertBefore( select34 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select34.value,
			slide: function( event, ui ) {
				select34.value = ui.value ;
				//do_complete_corner();
			}
		});
		jQuery( "#level2_sub_top" ).change(function() {
			slider34.slider( "value", select34.value );
			
		});
		
		
		var select35 = document.getElementById( "level2_sub_left" );
		var slider35 = jQuery( "<div align='left' style='width:160px;float:left;margin-left:10px;' id='slider35'></div>" ).insertBefore( select35 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select35.value,
			slide: function( event, ui ) {
				select35.value = ui.value ;
				//do_top_corner();
			}
		});
		jQuery( "#level2_sub_left" ).change(function() {
			slider35.slider( "value", select35.value );
			
		});
		
		var select36 = document.getElementById( "specialB" );
		var slider36 = jQuery( "<div align='left' style='width:120px;float:left;margin-left:10px;' id='slider36'></div>" ).insertBefore( select36 ).slider({
			min: 0,
			max: 1000,
			range: "min",
			value: select36.value,
			slide: function( event, ui ) {
				select36.value = ui.value ;
				//do_complete_corner();
			}
		});
		jQuery( "#specialB" ).change(function() {
			slider36.slider( "value", select36.value );
			
		});
		
		
		var select37 = document.getElementById( "specialA" );
		var slider37 = jQuery( "<div align='left' style='width:120px;float:left;margin-left:10px;' id='slider37'></div>" ).insertBefore( select37 ).slider({
			min: 0,
			max: 100,
			range: "min",
			value: select37.value,
			slide: function( event, ui ) {
				select37.value = ui.value ;
				jQuery('#sub_preview_outer').css('opacity',(select37.value/100));
			}
		});
		jQuery( "#specialA" ).change(function() {
			slider37.slider( "value", select37.value );
			jQuery('#sub_preview_outer').css('opacity',(select37.value/100));
			
		});
		
		
		var select38 = document.getElementById( "top_sub_indicator_top" );
		var slider38 = jQuery( "<div align='left' style='width:120px;float:left;margin-left:10px;' id='slider38'></div>" ).insertBefore( select38 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select38.value,
			slide: function( event, ui ) {
				select38.value = ui.value ;
				//do_complete_corner();
			}
		});
		jQuery( "#top_sub_indicator_top" ).change(function() {
			slider38.slider( "value", select38.value );
			
		});
		
		
		var select39 = document.getElementById( "top_sub_indicator_left" );
		var slider39 = jQuery( "<div align='left' style='width:120px;float:left;margin-left:10px;' id='slider39'></div>" ).insertBefore( select39 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select39.value,
			slide: function( event, ui ) {
				select39.value = ui.value ;
				//do_top_corner();
			}
		});
		jQuery( "#top_sub_indicator_left" ).change(function() {
			slider39.slider( "value", select39.value );
			
		});

		
		var select40 = document.getElementById( "sub_sub_indicator_top" );
		var slider40 = jQuery( "<div align='left' style='width:120px;float:left;margin-left:10px;' id='slider40'></div>" ).insertBefore( select40 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select40.value,
			slide: function( event, ui ) {
				select40.value = ui.value ;
				//do_complete_corner();
			}
		});
		jQuery( "#sub_sub_indicator_top" ).change(function() {
			slider40.slider( "value", select40.value );
			
		});
		
		
		var select41 = document.getElementById( "sub_sub_indicator_left" );
		var slider41 = jQuery( "<div align='left' style='width:120px;float:left;margin-left:10px;' id='slider41'></div>" ).insertBefore( select41 ).slider({
			min: -100,
			max: 100,
			range: "min",
			value: select41.value,
			slide: function( event, ui ) {
				select41.value = ui.value ;
				//do_top_corner();
			}
		});
		jQuery( "#sub_sub_indicator_left" ).change(function() {
			slider41.slider( "value", select41.value );
			
		});

	
	var select43 = document.getElementById( "si_corner_size" );
		var slider43 = jQuery( "<div align='left' style='width:140px;float:left;margin-left:10px;' id='slider43'></div>" ).insertBefore( select43 ).slider({
			min: 1,
			max: 40,
			range: "min",
			value: select43.value,
			slide: function( event, ui ) {
				select43.value = ui.value ;
				do_sub_corner();
			}
		});
		jQuery( "#si_corner_size" ).change(function() {
			slider43.slider( "value", select43.value );
			do_sub_corner();
			
		});
	
	
	
}
