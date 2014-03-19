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
		// Check if is modal ivew
		<?php if ($tmpl == 'component') { ?>
		document.adminForm.modal.value = '1';
		<?php } ?>
		
		submitform(pressbutton);
	}
</script>

<form action="index.php?option=com_mijosef&amp;controller=bookmarks&amp;task=edit&cid[]=<?php echo $this->row->id; ?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<?php
	if ($tmpl == 'component') {
		?>
		<fieldset class="adminform">
			<table class="toolbar1">
				<tr>
					<td class="desc" width="550px">
						<?php
							$text = "New Social Bookmark";
							if ($task != 'add') {
								$text = $this->row->name; 
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
		<legend><?php echo JText::_('COM_MIJOSEF_BOOKMARKS_EDIT_LEGEND'); ?></legend>
		<table class="admintable">
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('COM_MIJOSEF_BOOKMARKS_NAME'); ?>
					</label>
				</td>
				<td class="value2">
					<input class="inputbox" type="text" name="name" id="name" size="50" value="<?php echo $this->row->name; ?>" />
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('COM_MIJOSEF_BOOKMARKS_TYPE'); ?>
					</label>
				</td>
				<td class="value2">
					<?php echo $this->lists['type']; ?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('COM_MIJOSEF_BOOKMARKS_PLACEHOLDER'); ?>
					</label>
				</td>
				<td class="value2">
					{mijosef &nbsp;<input type="text" name="placeholder" id="placeholder" class="inputbox" size="15" style="width: 150px;" value="<?php echo $this->row->placeholder; ?>" />}
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('HTML'); ?>
					</label>
				</td>
				<td class="value2">
					<textarea name="html" id="html" rows="4" cols="50" class="text_area" style="width: 400px;"><?php echo $this->row->html; ?></textarea>
				</td>
			</tr>
			<tr>
				<td width="20%" class="key2">
					<label for="name">
						<?php echo JText::_('Published'); ?>
					</label>
				</td>
				<td class="value2">
					<?php echo $this->lists['published']; ?>
				</td>
			</tr>
		</table>
	</fieldset>
	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="bookmarks" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="modal" value="0" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>