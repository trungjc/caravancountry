<?php

/**
* swmenupro v4.5
* http://swonline.biz
* Copyright 2006 Sean White
**/

defined('_JEXEC') or die('Restricted access');

class com_swmenuproInstallerScript {

    /**
     * method to install the component
     *
     * @return void
     */
    function install($parent) {
	
	 $module_installer = new JInstaller;
        if($module_installer->install(dirname(__FILE__).'/admin/module')){
            echo 'Module install success', '<br />';
        } else{
          echo 'Module install failed', '<br />';
        }
	$msg="";
      
        if(!is_dir(JPATH_ROOT  .'/images/swmenupro')){
	if (@mkdir(JPATH_ROOT . '/images/swmenupro')){
				chmod(JPATH_ROOT . '/images/swmenupro',0757);
				//echo 'Directory created: '.JPATH_ROOT .DS. 'images'.DS.'swmenupro';
			}else{
			echo '<b>ERROR:</b>cannot create directory '.JPATH_ROOT .'/images/swmenupro';
                        }
        }
        if(sw_copydirr(JPATH_ROOT. '/modules/mod_swmenupro/images',JPATH_ROOT . '/images/swmenupro',0757,false)){
	//rename($absolute_path."/modules/mod_swmenupro/mod_swmenupro.sw",$absolute_path."/modules/mod_swmenupro/mod_swmenupro.xml");
	$msg.="Successfully Installed swmenupro images";
	}else{
	$msg.="Could Not Install swmenupro Images.  Please visit the swmenupro Upgrade/Repair facility by clicking <a href=\"index.php?option=com_swmenupro&task=upgrade\">here.</a>\n";
	}
        
        
	
	$msg.="<div align=\"center\">\n";
	$msg.="<table cellpadding=\"4\" cellspacing=\"0\" border=\"0\" align=\"center\" width=\"100%\"> \n";
	$msg.="<tr><td align=\"center\"><img src=\"components/com_swmenupro/images/swmenupro_logo_small.png\" border=\"0\"/></td></tr>\n";
	//$msg.="<tr><td align=\"center\"><br /> <b>Module Status: ".$module_msg."</b><br /></td></tr>\n";
	$msg.="<tr><td align=\"center\">swmenupro has been sucessfully installed.  Thankyou for purchasing. <br /> For support, please see the forums at <a href=\"http://www.swmenupro.com\">www.swmenupro.com</a> </td></tr>\n";
    $msg.="<tr> \n";
    $msg.="<td width=\"100%\" align=\"center\">\n";
	$msg.="<a href=\"http://www.swmenupro.com\" target=\"_blank\">	\n";
	$msg.="<img src=\"components/com_swmenupro/images/swmenupro_logo_small.png\" alt=\"swmenupro.com\" border=\"0\" />\n";
	$msg.="</a><br/> swMenuPro &copy;2005 by Sean White\n";
	$msg.="</td> \n";
    $msg.="</tr> \n";
    $msg.="</table> \n";
    $msg.="</div> \n";	
	echo $msg;
	
	
}


 function uninstall($parent) {
       $database		=& JFactory::getDBO();
       $database->setQuery("DROP TABLE IF EXISTS `#__swmenupro_styles`");
       $database->query(); 
            

}







}



function sw_copydirr($fromDir,$toDir,$chmod=0757,$verbose=false)
/*
copies everything from directory $fromDir to directory $toDir
and sets up files mode $chmod
*/
{
	//* Check for some errors
	$errors=array();
	$messages=array();
	if (!is_writable($toDir))
	$errors[]='target '.$toDir.' is not writable';
	if (!is_dir($toDir))
	$errors[]='target '.$toDir.' is not a directory';
	if (!is_dir($fromDir))
	$errors[]='source '.$fromDir.' is not a directory';
	if (!empty($errors))
	{
		if ($verbose)
		foreach($errors as $err)
		echo '<strong>Error</strong>: '.$err.'<br />';
		return false;
	}
	//*/
	$exceptions=array('.','..');
	//* Processing
	$handle=opendir($fromDir);
	while (false!==($item=readdir($handle)))
	if (!in_array($item,$exceptions))
	{
		//* cleanup for trailing slashes in directories destinations
		$from=str_replace('//','/',$fromDir.'/'.$item);
		$to=str_replace('//','/',$toDir.'/'.$item);
		//*/
		if (is_file($from))
		{
			if (@copy($from,$to))
			{
				chmod($to,$chmod);
				touch($to,filemtime($from)); // to track last modified time
				$messages[]='File copied from '.$from.' to '.$to;
			}
			else
			$errors[]='cannot copy file from '.$from.' to '.$to;
		}
		if (is_dir($from))
		{
			if (@mkdir($to))
			{
				chmod($to,$chmod);
				$messages[]='Directory created: '.$to;
			}
			else
			$errors[]='cannot create directory '.$to;
			sw_copydirr($from,$to,$chmod,$verbose);
		}
	}
	closedir($handle);
	//*/
	//* Output
	if ($verbose)
	{
		foreach($errors as $err)
		echo '<strong>Error</strong>: '.$err.'<br />';
		foreach($messages as $msg)
		echo $msg.'<br />';
	}
	//*/
	return true;
}

?>
