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
	function apply() {
		var selection = document.getElementById('tags_selection').value;
		var action = document.getElementById('tags_action').value;
		
		if (action == 'sep') {
			return;
		}
		
		if (selection == 'selected' && document.adminForm.boxchecked.value == 0) {
			alert('Please make a selection from the list');
			return;
		}
		
		// If delete, show warning
		if (action == 'delete') {
			if (!confirm('<?php echo JText::_("COM_MIJOSEF_TOOLBAR_CONFIRM_DELETE"); ?>')) {
				return;
			}
		}
		
		// Call the action
		document.adminForm.selection.value = selection;
		submitbutton(action);
	}
	
	function resetFilters() {
		document.adminForm.url_sef.value = '';
		
		document.adminForm.submit();
	}
</script>

<form action="index.php?option=com_mijosef&amp;controller=tagsmap&amp;task=view&amp;tag=<?php echo JRequest::getString('tag');?>&amp;tmpl=component" method="post" name="adminForm" id="adminForm">
    <div>
        <span style="float: left">
			<h3><?php echo substr(trim(JRequest::getString('tag', null)), 0, 173); ?></h3>
        </span>
        <span style="width: 330px; float: right; vertical-align: top !important;">
			<?php echo $this->toolbar->action; ?>
            <?php echo $this->toolbar->selection; ?>
            <?php echo $this->toolbar->button; ?>
        </span>
    </div>
    <br/>
	<table class="adminlist table table-striped">
		<thead>
			<tr>
				<th width="13">
					<?php echo JText::_('COM_MIJOSEF_COMMON_NUM'); ?>
				</th>
				<th width="20">
                    <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_SEF_COMMON_URL_SEF'), 'u.url_sef', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<th width="50" style="text-align: center;">
					<?php echo JText::_('Published'); ?>
				</th>
			</tr>
			<tr>
				<th style="vertical-align: top !important;" colspan="2">
					<?php echo $this->lists['reset_filters']; ?>
				</th>
				<th style="vertical-align: top !important;">
					<?php echo $this->lists['search_url']; ?>
				</th>
				<th style="vertical-align: top !important;">
					&nbsp;
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		$n = count($this->items);
		for ($i=0; $i < $n; $i++) {
			$row = &$this->items[$i];
			$checked = JHTML::_('grid.id', $i, $row->id);

			// Published icon
			$published_icon = "";
			$tag = JRequest::getString('tag', null);
			if ($tag) {
				$found = MijoDatabase::loadResult("SELECT url_sef FROM #__mijosef_tags_map WHERE url_sef = '{$row->url_sef}' AND tag = '{$tag}'");
				$published_icon = $this->getIcon($i, $found ? 'publish' : 'unpublish', $found ? 'icon-16-published-off.png' : 'icon-16-published-on.png');
			}
			
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
					<?php echo $this->pagination->getRowOffset($i); ?>
				</td>
				<td>
					<?php echo $checked; ?>
				</td>
				<td>
					<?php echo $row->url_sef; ?>
				</td>
				<td style="text-align: center;">
					<?php echo $published_icon;?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
	</table>

	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="tagsmap" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<?php echo JHTML::_('form.token'); ?>
</form>