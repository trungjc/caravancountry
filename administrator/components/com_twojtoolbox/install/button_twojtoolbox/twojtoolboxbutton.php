<?php
/**
* @package     2JToolBox
* @author       2JoomlaNet http://www.2joomla.net
* @ñopyright   Copyright (c) 2008-2012 2Joomla.net All rights reserved
* @license      released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version      $Revision: 1.0.2 $
**/


defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class plgButtonTwojToolBoxButton extends JPlugin{

	public function __construct(& $subject, $config){
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	public function onDisplay($name){
		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();
		$template = $app->getTemplate();
		$link = 'index.php?option=com_twojtoolbox&amp;view=ajax&amp;layout=twojtoolboxbutton&amp;tmpl=component&amp;e_name='.$name;
		JHtml::_('behavior.modal');
		$button = new JObject;
		$button->set('modal', true);
		$button->set('link', $link);
		$button->set('text', JText::_('PLG_EDITORSXTD_TWOJTOOLBOX_BUTTON'));
		
		if( version_compare(JVERSION,'3.0.0','ge') ) {
			$button->set('name', 'briefcase');
		} else {
			$button->set('name', 'article');
		}		
		
		$button->set('options', "{handler: 'iframe', size: {x: 600, y: 400}}");
		return $button;
	}
}
