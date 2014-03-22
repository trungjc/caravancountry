<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

class IgalleryControllerImagefront extends JControllerForm
{
	function __construct($config = array())
	{
		$config['base_path'] = JPATH_SITE.'/components/com_igallery';
		parent::__construct($config);
	}
	
	function reportImage()
	{
		$model = $this->getModel();

		$msg = '';
		if( !$model->reportImage() ) 
		{
			JError::raise(2, 500, $model->getError() );
			return false;
		}
		else
		{
			$msg = JText::_('YOUR_MESSAGE_SENT');
			$this->setRedirect($_SERVER['HTTP_REFERER'], $msg);
		}


	}
}
