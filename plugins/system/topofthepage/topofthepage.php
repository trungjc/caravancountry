<?php
/**
 * @version		$Id: topofthepage.php 20196 2011-03-04 02:40:25Z mrichey $
 * @package		plg_sys_topofthepage
 * @copyright	Copyright (C) 2005 - 2011 Michael Richey. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class plgSystemTopofthepage extends JPlugin
{
        var $_initialized = false;

//        function onAfterRoute()
        function onBeforeCompileHead()
	{
                if($this->_initialized) return true;
                $app = JFactory::getApplication();
                
                // do we run in administrator ?
                $version = new JVersion;
                $shortversion = explode('.',$version->getShortVersion()); 
                if($app->isAdmin() && !$this->params->get('runinadmin',0)) return true;
                $this->_initialized = true;
                
                $doc = JFactory::getDocument();

                // we don't run in pages that aren't html
                if($doc->getType() != 'html') return true;

                // we don't run in modal pages or other incomplete pages
                if(in_array(JRequest::getString('tmpl'),array('component','raw'))) return true;
                
                // sweet - it's on!        
                $loadframework = $this->params->get('loadjsframework',1);
                $framework = $this->params->get('jsframework','mootools');
                switch($framework) {
                    case 'jquery':
                        if($loadframework) { JHtml::_('jquery.framework'); }
                        $doc->addScript(JURI::root(true).'/media/plg_system_topofthepage/jquery.easing.min.js');
                        $doc->addScript(JURI::root(true).'/media/plg_system_topofthepage/jqtopofthepage.js');
                        break;
                    default:           
                        if($loadframework) { JHtml::_('behavior.framework',true); }
                        $doc->addScript(JURI::root(true).'/media/plg_system_topofthepage/ScrollSpy-yui-compressed.js');
                        if($this->params->get('smoothscroll',0)==1) $doc->addScript(JURI::root(true).'/media/plg_system_topofthepage/smoothscroll.js');
                        $doc->addScript(JURI::root(true).'/media/plg_system_topofthepage/topofthepage.js');
                        break;
                }
                $options=array('buttontext'=>false,'version'=>$shortversion[0]);
                $options['scrollspy']=$this->params->get('spyposition',200);
                $options['opacity']=$this->params->get('visibleopacity',100);
                if(!$this->params->get('omittext',0)) {
                    JFactory::getLanguage()->load('plg_system_topofthepage',JPATH_ADMINISTRATOR);
                    $options['buttontext']=JText::_('PLG_SYS_TOPOFTHEPAGE_GOTOTOP');
                }
                $linklocation = explode('_',$this->params->get('linklocation','bottom_right'));
                $options['styles']=array('position'=>'fixed');
                if($framework == 'mootools') {
                    $options['styles']['opacity']=0;
                    $options['styles']['dislpay']='block';
                } else {
                    $options['styles']['dislpay']='none';
                    $options['styles']['opacity']=$options['opacity']/100;
                    $options['styles']['filter']='alpha(opacity='.$options['opacity'].')';
                }
                switch($linklocation[0]) {
                    case 'top':
                        $options['styles']['top']='0px';
                        break;
                    default:
                        $options['styles']['bottom']='0px';
                        break;
                }
                switch($linklocation[1]) {
                    case 'left':
                        $options['styles']['left']='0px';
                        break;
                    case 'center':
                        $options['styles']['left']='center';
                        break;
                    default:
                        $options['styles']['right']='0px';
                        break;
                }
                $options['topalways']=($this->params->get('topalways',0))?true:false;
                if($this->params->get('smoothscroll',0)==1) {
                    $options['smoothscroll']['duration']=$this->params->get('smoothscrollduration',500);
                    $options['smoothscroll']['transition']=$this->params->get('smoothscrolltransition','linear');
                    if($options['smoothscroll']['transition'] != 'linear') {
                        switch($framework) {
                            case 'jquery':
                                $options['smoothscroll']['transition']=$this->params->get('smoothscrolleasing','easeInOut').$this->params->get('smoothscrolltransition','linear');
                                break;
                            default:
                                $easingtable=array('easeInOut'=>'in:out','easeIn'=>'in','easeOut'=>'out');
                                $options['smoothscroll']['transition']=$easingtable[$this->params->get('smoothscrolleasing','easeInOut')].':'.strtolower($this->params->get('smoothscrolltransition','linear'));
                                break;
                        }
                    }
                }
                $doc->addScriptDeclaration('window.plg_system_topofthepage_options = '.json_encode($options).';'."\n");
                if($this->params->get('usestyle',1)==1) $doc->addStyleDeclaration($this->params->get('linkstyle'));
		return true;
	}
}