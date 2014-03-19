<?php
/**
* @package     2JToolBox
* @author       2JoomlaNet http://www.2joomla.net
* @ñopyright   Copyright (c) 2008-2012 2Joomla.net All rights reserved
* @license      released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version      $Revision: 1.0.2 $
**/

defined('_JEXEC') or die;

jimport('joomla.html.html');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
jimport('joomla.utilities.arrayhelper');
JFormHelper::loadFieldClass('filelist');

class JFormFieldCssFileList extends JFormFieldFileList{
	public $type = 'CssFileList';
	public $hide = 0;
	protected function getInput(){
		$this->hide = isset($this->element['hide']) ? $this->element['hide'] : 0;
		if( $json = (string)$this->element['json'] ) $this->element['class'] .= ' twojtoolbox_fieldrefresh';
		$ret_html = parent::getInput();
		$ret_html .= isset($this->element['addtext']) ? '<div class="twojtoolbox_form_addtext" style="margin-right: 10px;">'.$this->element['addtext'].' <strong>'.$this->element['directory']."</strong></div>" : '';
		
		if(isset($this->element['editCssButton'])){
			$ret_html .=  ' <button id="'.$this->id.'_editCssButton" class="twojtoolbox_editCssButton">'.JText::_('COM_TWOJTOOLBOX_ITEM_CSSEDITBUTTON').'</button><div id="'.$this->id.'_editCssInlineStatus" class="twojtoolbox_editCssStatus"></div>';
			JFactory::getDocument()->addScriptDeclaration(' emsajax(document).ready( function(){ twojtoolbox_editCssEvent("'.$this->id.'", "'.$this->form->getValue('type').'"); }); ');
		}
		if( $json ){ 
			JFactory::getDocument()->addScriptDeclaration(' emsajax(document).ready( function(){  emsajax("#'.$this->id.'").change( function(){ ems_twojtoolbox_onchange( this, '.$json.'); }); }); '); 
		}
		return $ret_html;
	}
	protected function getOptions(){	
		$type_plugin = $this->form->getValue('type');
		if(!$type_plugin) return false;
		$plugin_info  = TwojToolboxHelper::plugin_info( $type_plugin, 1);
		$this->element['directory'] = str_replace(array('\\', '/'), '/', $this->element['directory']);
		if($plugin_info) $this->element['directory'] = 'components/com_twojtoolbox/plugins/'.$type_plugin.'/'.$plugin_info->v_active.'/'.($this->element['directory']?$this->element['directory']:'css');
			else return false;
		if( !isset($this->element['filter']) )$this->element['filter']='.css';
		$this->element['hide_none'] = 1;
		$this->element['hide_default'] = 1;
		$options = parent::getOptions();
		
		$map_path = JPATH_ROOT.'/'.$this->element['directory'].'/'.($this->element['cssMap']?$this->element['cssMap']:'css.map.txt');
		if( JFile::exists( $map_path ) ){ 
			$json_array = json_decode( JFile::read( $map_path ), true );
			if( !json_last_error() ){
				for($i=0;$i<count($options); $i++){
					if( isset($json_array[$options[$i]->text]) ) $options[$i]->text = $json_array[$options[$i]->text];
				}
			}
		}
		return $options;
	}
}