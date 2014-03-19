<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @subpackage	MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

// No Permission
defined('_JEXEC') or die('Restricted access');
?>

<script language="javascript">
	function generateURLs() {
		document.location.href = 'index.php?option=com_mijosef&controller=sefurls&task=generateurls';
	}
</script>
 
<div>
	<center>
	<br /><br /><br />
	<h1><?php echo JText::_('COM_MIJOSEF_URL_SEF_GENERATING_URLS'); ?></h1>
	<br />
	<img onLoad="javascript: generateURLs();" src="components/com_mijosef/assets/images/loading.gif" />
	<br /><br /><br />
	<?php echo JText::_('COM_MIJOSEF_URL_SEF_GENERATING_URLS_MSG'); ?>
	<br />
	</center>
</div>