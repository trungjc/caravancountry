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

		// Link must begin with http
		if (form.link.value.match(/^www/) && !form.link.value.match(/^http/)) {
			alert('The Link must begin with http://');
		} else {
			submitform(pressbutton);
		}
	}
	
	<?php if ($this->MijosefConfig->jquery_mode == 1) { ?>
	$(document).ready(function(){
		$("#word").autocomplete('components/com_mijosef/library/autocompleters/tags.php');
	});

	$(document).ready(function(){
		$("#link").autocomplete('components/com_mijosef/library/autocompleters/sefurls.php');
	});
	<?php } ?>
</script>

<form action="index.php?option=com_mijosef&amp;controller=ilinks&amp;task=edit&cid[]=<?php echo $this->row->id; ?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<?php
	if ($tmpl == 'component') {
		?>
		<fieldset class="adminform">
			<table class="toolbar1">
				<tr>
					<td class="desc" width="550px">
						<?php
							$text = "New Internal Link";
							if ($task != 'add') {
								$text = $this->row->word; 
							}
							
							echo '<h3>'.$text.'</h3>';
						?>
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
		<legend><?php echo JText::_('COM_MIJOSEF_ILINKS_EDIT_LEGEND'); ?></legend>
		<table class="admintable">
			<tr>
				<td width="20%" class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_ILINKS_WORD'); ?>
					</label>
				</td>
				<td class="value2">
					<input class="inputbox" type="text" name="word" id="word" size="60" value="<?php echo $this->row->word; ?>" />
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_ILINKS_LINK'); ?>
					</label>
				</td>
				<td class="value2">
					<input class="inputbox" type="text" name="link" id="link" size="60" value="<?php echo $this->row->link; ?>" />
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label>
						<?php echo JText::_('Published'); ?>
					</label>
				</td>
				<td class="value2">
					<?php echo $this->lists['published']; ?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_ILINKS_NOFOLLOW'); ?>
					</label>
				</td>
				<td class="value2">
					<?php echo $this->lists['nofollow']; ?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_ILINKS_BLANK'); ?>
					</label>
				</td>
				<td class="value2">
					<?php echo $this->lists['blank']; ?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_ILINKS_LIMIT'); ?>
					</label>
				</td>
				<td class="value2">
					<input type="text" name="ilimit" id="ilimit" class="inputbox" size="7" style="width: 50px;" value="<?php echo $this->row->ilimit; ?>" />
				</td>
			</tr>
		</table>
	</fieldset>
	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="ilinks" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="modal" value="0" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>