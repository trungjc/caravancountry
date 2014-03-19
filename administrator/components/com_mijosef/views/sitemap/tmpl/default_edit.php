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
$tmpl = JRequest::getWord('tmpl');
$task = JRequest::getWord('task');
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

		submitform(pressbutton);
	}
	
	<?php if ($this->MijosefConfig->jquery_mode == 1) { ?>
	$(document).ready(function(){
		$("#url_sef").autocomplete('components/com_mijosef/library/autocompleters/sefurls.php');
	});
	<?php } ?>
</script>

<form action="index.php?option=com_mijosef&amp;controller=sitemap&amp;task=edit&cid[]=<?php echo $this->row->id; ?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
	<?php
	if ($tmpl == 'component') {
		?>
		<fieldset class="adminform">
			<table class="toolbar1">
				<tr>
					<td class="desc" width="550px">
						<?php
							$text = JText::_('COM_MIJOSEF_COMMON_SITEMAP');
							if ($task != 'add') {
								$text = $this->row->url_sef; 
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
		<legend><?php echo JText::_('COM_MIJOSEF_COMMON_SITEMAP'); ?></legend>
		<table class="admintable">
			<tr>
				<td class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_URL_SEF_COMMON_URL_SEF'); ?>
					</label>
				</td>
				<td class="value2">
					<input class="inputbox" type="text" name="url_sef" id="url_sef" size="70" value="<?php echo $this->row->url_sef; ?>" />
				</td>
			</tr>
			<tr>
				<td class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_SITEMAP_DATE'); ?>
					</label>
				</td>
				<td class="value2">
					<?php echo JHTML::calendar($this->row->sdate, 'sdate', 'sdate', '%Y-%m-%d', 'size="13"'); ?>
				</td>
			</tr>
			<tr>
				<td class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_SITEMAP_FREQUENCY'); ?>
					</label>
				</td>
				<td class="value2">
					<?php echo JHTML::_('select.genericlist', Mijosef::get('sitemap')->getFrequencyList(), 'frequency', 'class="inputbox" size="1" style="width: 80px;"','value', 'text', $this->row->frequency); ?>
				</td>
			</tr>
			<tr>
				<td class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_SITEMAP_PRIORITY'); ?>
					</label>
				</td>
				<td class="value2">
					<?php echo JHTML::_('select.genericlist', Mijosef::get('sitemap')->getPriorityList(), 'priority', 'class="inputbox" size="1" style="width: 80px;"','value', 'text', $this->row->priority); ?>
				</td>
			</tr>
			<tr>
				<td class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_SITEMAP_PARENT'); ?>
					</label>
				</td>
				<td class="value2">
					<input class="inputbox" type="text" name="sparent" size="6" style="width: 50px;" value="<?php echo $this->row->sparent; ?>" />
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo 'HTML ' . JText::_('COM_MIJOSEF_COMMON_SITEMAP') . ' ' . JText::_('COM_MIJOSEF_COMMON_TITLE'); ?></legend>
		<table class="admintable">
			<tr>
				<td class="key2">
					<label>
						<?php echo JText::_('COM_MIJOSEF_COMMON_METADATA') . ' ' . JText::_('COM_MIJOSEF_COMMON_TITLE'); ?>
					</label>
				</td>
				<td class="value2">
					<input class="inputbox" type="text" name="meta_title" id="meta_title" size="70" value="<?php echo $this->row->meta_title; ?>" />
				</td>
			</tr>
			<tr>
				<td class="key2">
					<label>
						<?php echo JText::_('Custom') . ' ' . JText::_('COM_MIJOSEF_COMMON_TITLE'); ?>
					</label>
				</td>
				<td class="value2">
					<input class="inputbox" type="text" name="title" id="title" size="70" value="<?php echo $this->row->title; ?>" />
				</td>
			</tr>
		</table>
	</fieldset>
	
	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="sitemap" />
	<input type="hidden" name="task" value="edit" />
	<input type="hidden" name="modal" value="0" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>