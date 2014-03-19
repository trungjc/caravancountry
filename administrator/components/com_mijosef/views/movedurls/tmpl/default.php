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
		var selection = document.getElementById('movedurls_selection').value;
		var action = document.getElementById('movedurls_action').value;
		
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
		document.adminForm.search_new.value = '';
		document.adminForm.search_old.value = '';
		document.adminForm.filter_published.value = '-1';
		document.adminForm.filter_hit_val.value = '0';
		document.adminForm.search_hit.value = '';
		document.adminForm.filter_date.value = '';
		document.adminForm.search_id.value = '';
		
		document.adminForm.submit();
	}

	function changeType(type) {
		window.location = 'index.php?option=com_mijosef&controller=sefurls&task=view&type='+type;
	}
</script>

<form action="index.php?option=com_mijosef&controller=movedurls&task=view" method="post" name="adminForm" id="adminForm">
    <dl id="sef-urls-tabs" class="tabs">
        <dt class="tabs <?php echo ($this->type == 'sef') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('sef');"><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_SEF'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'custom') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('custom');"><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_CUSTOM'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'notfound') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('notfound');"><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_404'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'moved') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('moved');"><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_MOVED'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'locked') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('locked');"><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_LOCKED'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'blocked') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('blocked');"><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_BLOCKED'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'duplicated') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('duplicated');"><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_DUPLICATED'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'red') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('red');"><?php echo JText::_('COM_MIJOSEF_COMMON_URLS_RED'); ?></a></h3></span></dt>
        <dt class="tabs"><span><h3><a href="javascript:void(0);">|</a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'quickedit') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><font color="green"><span><h3><a href="javascript:changeType('quickedit');"><?php echo JText::_('COM_MIJOSEF_URL_SEF_QUICK_EDIT'); ?></a></h3></span></font></dt>
        <dt class="tabs <?php echo ($this->type == 'trashed') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><font color="red"><span><h3><a href="javascript:changeType('trashed');"><?php echo JText::_('COM_MIJOSEF_URL_SEF_TRASH'); ?></a></h3></span></font></dt>
    </dl>
	<div class="current" style="background-color:#ffffff;">
		<table class="adminlist table table-striped">
			<thead>
				<tr>
					<th width="13px">
						<?php echo JText::_('COM_MIJOSEF_COMMON_NUM'); ?>
					</th>
					<th width="20px">
                        <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>
					<th nowrap="nowrap">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_MOVED_NEW'), 'url_new', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<th nowrap="nowrap">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_MOVED_OLD'), 'url_old', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php if ($this->MijosefConfig->ui_moved_published == 1) { ?>
					<th width="50px" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('Published'), 'published', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_hits == 1) { ?>
					<th width="120px" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('Hits'), 'hits', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_clicked == 1) { ?>
					<th width="120px" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_MOVED_LAST_HIT'), 'last_hit', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_cached == 1) { ?>
					<th width="50" style="text-align: center;">
						<?php echo JText::_('COM_MIJOSEF_COMMON_CACHED'); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_id == 1) { ?>
					<th width="30px" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', 'ID', 'id', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
				</tr>
				<tr>
					<th style="vertical-align: top !important;" colspan="2">
						<?php echo $this->lists['reset_filters']; ?>
					</th>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['search_new']; ?>
					</th>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['search_old']; ?>
					</th>
					<?php if ($this->MijosefConfig->ui_moved_published == 1) { ?>
					<th style="text-align: center; vertical-align: top !important;">
						<?php echo $this->lists['published_list']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_hits == 1) { ?>
					<th style="text-align: center; vertical-align: top !important;">
						<?php echo $this->lists['hit_val']; ?>
						<?php echo $this->lists['search_hit']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_clicked == 1) { ?>
					<th style="text-align: center; vertical-align: top !important;">
						<?php echo $this->lists['filter_date']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_cached == 1) { ?>
					<th>
						&nbsp;
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_id == 1) { ?>
					<th style="text-align: center; vertical-align: top !important;">
						<?php echo $this->lists['search_id']; ?>
					</th>
					<?php }	?>
				</tr>
			</thead>
			<tbody>
			<?php
			$k = 0;
			for ($i=0, $n=count($this->items); $i < $n; $i++) {
				$row = &$this->items[$i];
				$checked = JHTML::_('grid.id', $i, $row->id);
				
				// Published icon
				$published_icon = $this->getIcon($i, $row->published ? 'unpublish' : 'publish', $row->published ? 'icon-16-published-on.png' : 'icon-16-published-off.png');
	
				if (preg_match("/^(https?|ftps?|itpc|telnet|gopher):\/\//i", $row->url_new)) {
					$preview_link = $row->url_new;
				} else {
					$preview_link = '../'.$row->url_new;
				}
				
				// Cache icon
				if ($this->MijosefConfig->ui_moved_cached == 1) {
					$cached = false;
					if (isset($this->cache[$row->url_old])) {
						$cached = true;
					}
					$cached_icon = $this->getIcon($i, $cached ? 'uncache' : 'cache', $cached ? 'icon-16-cache-on.png' : 'icon-16-cache-off.png');
				}
				
				$edit_link = JRoute::_('index.php?option=com_mijosef&controller=movedurls&task=edit&cid[]='.$row->id.'&amp;tmpl=component');
				
				?>
				<tr class="<?php echo "row$k"; ?>">
					<td>
						<?php echo $this->pagination->getRowOffset($i); ?>
					</td>
					<td>
						<?php echo $checked; ?>
					</td>
					<td>
						<a href="<?php echo $preview_link; ?>" title="<?php echo JText::_('COM_MIJOSEF_URL_SEF_TOOLTIP_SEF_URL'); ?>" target="_blank">
						<?php echo substr($row->url_new, 0, 173); ?></a>
					</td>
					<td>
						<a href="<?php echo $edit_link; ?>" style="cursor:pointer" class="modal" rel="{handler: 'iframe', size: {x: 600, y: 350}}">
							<?php echo htmlentities(substr($row->url_old, 0, 173)); ?>
						</a>
					</td>
					<?php if ($this->MijosefConfig->ui_moved_published == 1) { ?>
					<td style="text-align: center;">
						<?php echo $published_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_hits == 1) { ?>
					<td style="text-align: center;">
						<?php echo $row->hits;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_clicked == 1) { ?>
					<td style="text-align: center;">
						<?php echo (substr($row->last_hit, 0, 10) == '0000-00-00' ? JText::_('Never') : $row->last_hit); ?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_cached == 1) { ?>
					<td style="text-align: center;">
						<?php echo $cached_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_moved_id == 1) { ?>
					<td style="text-align: center;">
						<?php echo $row->id;?>
					</td>
					<?php }	?>
				</tr>
				<?php
				$k = 1 - $k;
			}
			?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="<?php echo $this->colspan;?>">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="movedurls" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<?php echo JHTML::_('form.token'); ?>
</form>