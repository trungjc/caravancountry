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

// Get task and tmpl vars
$tmpl = JRequest::getVar('tmpl');
$task = JRequest::getVar('task');
$sefid = JRequest::getInt('sefid', 0);
?>

<script language="javascript">
	function submitbutton(pressbutton){
		var form = document.adminForm;
		
		// Check if is modal ivew
		<?php if ($tmpl == 'component') { ?>
		form.modal.value = '1';
		<?php } ?>
		
		if (pressbutton == 'editCancel') {
			submitform(pressbutton);
			return;
		}
		
		// Real URL must begin with index.php
		if (form.url_old.value.match(/^http/) || form.url_old.value.match(/^www./)) {
			alert('<?php echo JText::_("Do not enter http or www in URLs plz, only internal redirects."); ?>');
		} else {
			submitform(pressbutton);
		}
	}
	
	<?php if ($this->MijosefConfig->jquery_mode == 1) { ?>
	$(document).ready(function(){
		$("#url_new").autocomplete('components/com_mijosef/library/autocompleters/sefurls.php');
	});

	$(document).ready(function(){
		$("#url_old").autocomplete('components/com_mijosef/library/autocompleters/notfoundurls.php');
	});
	<?php } ?>
</script>

<form action="index.php?option=com_mijosef&amp;controller=movedurls&amp;task=edit&cid[]=<?php echo $this->row->id; ?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<?php
	if ($tmpl == 'component') {
		?>
		<fieldset class="adminform">
			<table class="toolbar1">
				<tr>
					<td class="desc" width="550px">
						&nbsp;
					</td>
					<td>
						<a href="#" onclick="javascript: submitbutton('editSave'); window.top.setTimeout('SqueezeBox.close();', 1000);" class="toolbar1"><span class="icon-32-save1" title="<?php echo JText::_('JTOOLBAR_SAVE'); ?>"></span><?php echo JText::_('JTOOLBAR_SAVE'); ?></a>
					</td>
					<?php if ($task != 'add') {	?>
					<td>
						<a href="#" onclick="javascript: submitbutton('editApply');" class="toolbar1"><span class="icon-32-apply1" title="<?php echo JText::_('JTOOLBAR_APPLY'); ?>"></span><?php echo JText::_('JTOOLBAR_APPLY'); ?></a>
					</td>
					<?php }	?>
					<td>
						<a href="#" onclick="javascript: submitbutton('editCancel'); window.top.setTimeout('SqueezeBox.close();', 1000);" class="toolbar1"><span class="icon-32-cancel1" title="<?php echo JText::_('JTOOLBAR_CANCEL'); ?>"></span><?php echo JText::_('JTOOLBAR_CANCEL'); ?></a>
					</td>
				</tr>
			</table>
		</fieldset>
		<?php
	}
	?>
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_MIJOSEF_URL_MOVED_EDIT_LEGEND'); ?></legend>
			<table class="admintable">
				<tr>
					<td width="20%" class="key2">
						<label>
							<?php echo JText::_('COM_MIJOSEF_URL_MOVED_NEW'); ?>
						</label>
					</td>
					<td width="80%">
						<input class="inputbox" type="text" name="url_new" id="url_new" size="70" style="width: 300px;" value="<?php echo $this->row->url_new; ?>" />
					</td>
				</tr>
				<tr>
					<td width="20%" class="key2">
						<label>
							<?php echo JText::_('COM_MIJOSEF_URL_MOVED_OLD'); ?>
						</label>
					</td>
					<td width="80%">
						<?php
						$url_old = $this->getSefURL($sefid);
						if (!empty($url_old)) { ?>
							<input class="inputbox" type="text" name="url_old" id="url_old" size="70" style="width: 300px;" value="<?php echo $url_old; ?>" />
						<?php } else { ?>
							<input class="inputbox" type="text" name="url_old" id="url_old" size="70" style="width: 300px;" value="<?php echo $this->row->url_old; ?>" />
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="key2">
						<label>
							<?php echo JText::_('Published'); ?>
						</label>
					</td>
					<td width="80%">
						<?php echo $this->lists['published']; ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="key2">
						<label>
							<?php echo JText::_('Hits'); ?>
						</label>
					</td>
					<td width="80%">
						<input type="text" name="hits" id="hits" class="inputbox" size="7" style="width: 30px;" value="<?php echo $this->row->hits; ?>" />
					</td>
				</tr>
			</table>
		</fieldset>
	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="movedurls" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="modal" value="0" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>