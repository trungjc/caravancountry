<?php
/**
* @package     	2JToolBox
* @author       2JoomlaNet http://www.2joomla.net
* @�opyright   	Copyright (c) 2008-2012 2Joomla.net All rights reserved
* @license      released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version      $Revision: 1.0.2 $
**/


defined('JPATH_BASE') or die;
jimport('joomla.html.html');
jimport('joomla.form.formfield');
JFormHelper::loadFieldClass('list');
class JFormFieldTwoJList extends JFormFieldList{
	protected $type = 'TwoJList';
	public $hide = 0;
	protected function getInput(){
		$this->hide = isset($this->element['hide']) ? $this->element['hide'] : 0;
		if( $json = (string)$this->element['json'] ) $this->element['class'] .= ' twojtoolbox_fieldrefresh';
		$ret_html = parent::getInput();
		$ret_html .= isset($this->element['addtext']) ? '<div class="twojtoolbox_form_addtext">'.$this->element['addtext']."</div>" : '';
		if( $json ){
			$ret_html .= '<script type="text/javascript">emsajax(\'#'.$this->id.'\').change( function(){ ems_twojtoolbox_onchange( this, '.$json.');});</script>';
		}
		return $ret_html;
	}
}
