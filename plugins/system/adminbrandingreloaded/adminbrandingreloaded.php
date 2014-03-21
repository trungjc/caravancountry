<?php
/*------------------------------------------------------------------------
# plg_adminbrandingreloaded - System - Admin Branding Reloaded
# ------------------------------------------------------------------------
# author    Sabuj Kundu
# copyright Copyright (C) 2010-2012 codeboxr.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://codeboxr.com
# Technical Support:  Forum - http://codeboxr.com/product/joomla-3-0-admin-branding-admin-branding-reloaded
-------------------------------------------------------------------------*/

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );
 
/**
 * AdminbrandingReloaded system plugin
 */
class plgSystemAdminbrandingReloaded extends JPlugin
{
	/**
	 * Constructor.
	 *
	 * @access	protected
	 * @param	object	$subject The object to observe
	 * @param 	array   $config  An array that holds the plugin configuration
	 * @since	1.0
	 */
	public function __construct( &$subject, $config )
	{
            parent::__construct( $subject, $config );
            //global $mainframe;

            // Do some extra initialisation in this constructor if required
            // load plugin parameters
            //$this->_plugin = JPluginHelper::getPlugin( 'system', 'adminbranding' );
            //$this->params = new JParameter( $this->_plugin->params );
            // return if params are empty
            if(!$this->params) return;
            
            $this->_joomla32ge     = false; 

            if ( version_compare( JVERSION, '3.2', '>=' ) == 1) {  

                $this->_joomla32ge = true;
            }

            //change admin header portion
            $this->_hidelogo        = $this->params->get('hidelogo',0);  //Hide Joomla logo
            //$this->_headercolor     = $this->params->get('headercolor','h_green');
            $this->_headercolor     = '';
            
            
            $this->_showslogo       = $this->params->get('showslogo',0); //show custom logo in place of joomla logo
            $this->_customlogo      = $this->params->get('customlogo',''); //custom logo image
            $this->_customlogow     = $this->params->get('customlogow','143'); //default image width
            $this->_customlogoh     = $this->params->get('customlogoh','30'); //default image height
            $this->_headerheight    = $this->params->get('headerheight','36'); //custom header height

            $this->_titleleftmargin = $this->params->get('titleleftmargin','0'); //header title left margin
           
            // admin login page
            
            
            $app = JFactory::getApplication(); //global $mainframe;  in j1.5
            // Dont run in admin if preview is not enabled
            if (!$app->isAdmin()) return;

            $user = JFactory::getUser();
            if($user->guest) $this->_loginpage = true;
            else $this->_loginpage = false;
            
            $this->_usebrandlogo    = $this->params->get('usebrandlogo',0);
            $this->_brandlogo       = $this->params->get('brandlogo','');
            if($this->_joomla32ge){
                $this->_brandlogow      = $this->params->get('brandlogow','15');
            }
            else{
                $this->_brandlogow      = $this->params->get('brandlogow','150');    
            }
            
            $this->_brandlogoh      = $this->params->get('brandlogoh','20');
            
            //login image
            $this->_showcllogo       = $this->params->get('showcllogo',0); //show custom login logo
            $this->_customlogologin  = $this->params->get('customlogologin',''); //custom logo
            $this->_customlogologinh = $this->params->get('customlogologinh','75'); //custom logo height
            //footer joomla icon 
            $this->_lfootericon      = $this->params->get('lfootericon', 1); //Hide footer joomla icon
            
            //background color for login page
            $this->_lbodycolor       = $this->params->get('lbodycolor', 0 );  
            $this->_lbodycolorval    = $this->params->get('lbodycolorval','#E0DEDF');  //default login page background color
            
            //login body background image 
            
            $this->_lbodyimage       = $this->params->get('lbodyimage',0);
            $this->_lbodyimageval    = $this->params->get('lbodyimageval','');
            $this->_lbodyimagetile   = $this->params->get('lbodyimagetile',1);
            $this->_lbodyimageposx   = $this->params->get('lbodyimageposx','center'); //horizontal position of background image
            $this->_lbodyimageposy   = $this->params->get('lbodyimageposy','center'); //vertical position of background image
            
            $this->_headrchnge       = intval($this->params->get('headrchnge',0));
            $this->_headrgrad        = intval($this->params->get('headrgrad',0));
            $this->_headerbg         = $this->params->get('headerbg','#184A7D');
            $this->_headergradstart  = $this->params->get('headergradstart','#17568c');
            $this->_headergradend    = $this->params->get('headergradend','#1a3867');
	}
 
	/**
	 * Do something onAfterInitialise 
	 */
	function onAfterInitialise()
	{
	         
	
	}
 
	/**
	 * Do something onAfterRoute 
	 */
	function onAfterRoute()
	{
	
	}
 
	/**
	 * Do something onAfterDispatch 
	 */
	function onAfterDispatch()
	{
            $version = new JVersion();
           
            $app = JFactory::getApplication(); //global $mainframe;  in j1.5
            // Dont run in admin if preview is not enabled
            if (!$app->isAdmin()) return;
            $doc = JFactory::getDocument();            
            
            $extracss       = '';            
            

            $hidelogo = 'display:none  !important;';
             //if hide joomla logo, variable name may be confusing   
            if(intval($this->_hidelogo)) {
                if($this->_joomla32ge){                                
                    $extracss .= '.header img.logo{'.$hidelogo.'}';    
                }
                else{
                    //less than 3.2
                    $extracss .= 'body a.log img{'.$hidelogo.'}';
                }                
                
            }
            
            
            if($this->_showslogo && $this->_customlogo != ''){
                if($this->_joomla32ge){
                    $extracss .= '.header{height:'.$this->_headerheight.'px !important;}'; 
                    $extracss .= '.header img.logo{'.$hidelogo.'}';    
                    $extracss .= '.header .container-logo{ display:block  !important; max-width:'.$this->_customlogow.'px  !important; width:'.$this->_customlogow.'px  !important; height:'.$this->_customlogoh.'px  !important; background: url("'.JURI::root().$this->_customlogo.'") 0 0 no-repeat  !important;}';
                }
                else{
                    $extracss .= 'body a.logo img{ display:none  !important;}';
                    $extracss .= 'body a.logo{ display:block  !important; max-width:'.$this->_customlogow.'px  !important; width:'.$this->_customlogow.'px  !important; height:'.$this->_customlogoh.'px  !important; background: url("'.JURI::root().$this->_customlogo.'") 0 0 no-repeat  !important;}';
                }                
                
            }
            
            if(intval($this->_usebrandlogo) && $this->_brandlogo != ''){
                if($this->_joomla32ge){   
                    $extracss .= ' body a.admin-logo span.icon-joomla{ background: none none !important;}';
                    $extracss .= 'body a.admin-logo{ background: url("'.JURI::root().$this->_brandlogo.'") 0 0 no-repeat !important; text-indent:-99999px !important; height:'.$this->_brandlogoh.'px  !important; width:'.$this->_brandlogow.'px  !important; }';
                }
                else{
                    $extracss .= 'body .navbar .brand{ background: url("'.JURI::root().$this->_brandlogo.'") 0 0 no-repeat !important; text-indent:-99999px !important; height:'.$this->_brandlogoh.'px  !important; width:'.$this->_brandlogow.'px  !important; }';     
                }
                
            }
            
            if(intval($this->_titleleftmargin) > 0 ){
                $extracss .= ' body .page-title{margin-left:'.$this->_titleleftmargin.'px !important;}';
            }
            
            if($this->_headrchnge){
                //var_dump('hihi');
                $extracss .= " .header {
                                    background-color: $this->_headerbg !important;
                                }";
                if($this->_headrgrad ){
                    $extracss .= " .header {    
                                    background-image: -moz-linear-gradient(top,$this->_headergradstart,$this->_headergradend)  !important;
                                    background-image: -webkit-gradient(linear,0 0,0 100%,from($this->_headergradstart),to($this->_headergradend))  !important;
                                    background-image: -webkit-linear-gradient(top,$this->_headergradstart,$this->_headergradend)  !important;
                                    background-image: -o-linear-gradient(top,$this->_headergradstart,$this->_headergradend)  !important;
                                    background-image: linear-gradient(to bottom,$this->_headergradstart,$this->_headergradend)  !important;
                                    background-repeat: repeat-x;
                                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='$this->_headergradstart', endColorstr='$this->_headergradend', GradientType=0)  !important;
                                    
                                 }";
                }else{
                    $extracss .= " .header {    
                                        background-image: none  !important;                                        
                                        filter: none  !important;
                                    
                                   }";
                }
                
            }
            
            
            if(intval($this->_loginpage)){
                //hurrah we are in login page
                
                if($this->_showcllogo && $this->_customlogologin != ''){
                    $extracss .= ' #element-box img{ display:none  !important;}';
                    $extracss .= ' #element-box hr{ display:block  !important; width:260px  !important; background: url("'.JURI::root().$this->_customlogologin.'")50% 50% no-repeat  !important; height:'.$this->_customlogologinh.'px  !important;}';
                }
                
                if($this->_lfootericon){
                    //var_dump('tst here');
                    $extracss .= ' .view-login .login-joomla{ display:none !important;}';
                }
                
                if($this->_lbodycolor){
                    $extracss .= ' .view-login{ background:'.$this->_lbodycolorval.' !important;}';
                }
                
                if($this->_lbodyimage && $this->_lbodyimageval != ''){
                    if($this->_lbodyimagetile){
                        //let's repeat
                        $extracss .= ' .view-login{ background:'.$this->_lbodycolorval.' url("'.JURI::root().$this->_lbodyimageval.'") 0 0 repeat !important;}';
                    }
                    else{
                        $extracss .= ' .view-login{ background:'.$this->_lbodycolorval.' url("'.JURI::root().$this->_lbodyimageval.'") '.$this->_lbodyimageposx.' '.$this->_lbodyimageposy.' no-repeat !important; }';
                    }
                    
                }                                
            }//end login page                                            
            

            $doc->addStyleDeclaration($extracss);            
	}
 
	/**
	 * Do something onAfterRender 
	 */
	function onAfterRender(){
            $app = JFactory::getApplication(); //global $mainframe;  in j1.5
            // Dont run in admin if preview is not enabled
            if (!$app->isAdmin()) return;
            $doc = JFactory::getDocument();
            
	}
}