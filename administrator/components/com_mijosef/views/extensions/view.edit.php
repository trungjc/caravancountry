<?php
/**
* @package		MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

// No Permission
defined('_JEXEC') or die('Restricted Access');

// Imports
Mijosef::get('utility')->import('library.elements.routerlist');
Mijosef::get('utility')->import('library.elements.categorylist');

// Edit Extension View Class
class MijosefViewExtensions extends MijosefView {

	// Edit extension
	function edit($tpl = NULL) {
		$row = $this->getModel()->getEditData('MijosefExtensions');
		
		$ext_form = JForm::getInstance('extensionForm', JPATH_MIJOSEF_ADMIN.'/extensions/'.$row->extension.'.xml', array(), true, 'config');
		$ext_values = array('params' => json_decode($row->params));
		$ext_form->bind($ext_values);
		
		$default_form = JForm::getInstance('commonForm', JPATH_MIJOSEF_ADMIN.'/extensions/default_params.xml', array(), true, 'config');
		$default_values = array('params' => json_decode($row->params));
		$default_form->bind($default_values);
		
		$row->description = '';
		$row->hasCats = 0;

		$xml_file = JPATH_MIJOSEF_ADMIN.'/extensions/'.$row->extension.'.xml';
		if (file_exists($xml_file)) {
			$row->description = Mijosef::get('utility')->getXmlText($xml_file, 'description');
			$row->hasCats = (int) Mijosef::get('utility')->getXmlText($xml_file, 'hasCats');
		}

		// Get behaviors
        JHTML::_('behavior.combobox');
        JHTML::_('behavior.tooltip');
        JHTML::_('bootstrap.tooltip');

		// Assign data
		$this->row              = $row;
		$this->ext_params       = $ext_form;
		$this->default_params   = $default_form;

		parent::display($tpl);
	}
}