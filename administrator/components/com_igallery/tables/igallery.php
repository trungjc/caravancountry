<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class Tableigallery extends JTable
{
	function Tableigallery(& $db) 
	{
		parent::__construct('#__igallery', 'id', $db);
	}

}
?>
