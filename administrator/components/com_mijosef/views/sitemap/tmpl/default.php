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

$save_img = JHTML::_('image', 'filesave.png', 'administrator/components/com_mijosef/assets/images/', NULL, NULL, JText::_('Save'));
?>

<script type="text/javascript">
	function showInput() {
		var action = document.getElementById('sitemap_action').value;
		
		if (action == 'pinggoogle' || action == 'pingyahoo' || action == 'pingbing' || action == 'pingservices') {
			var selection = document.getElementById('sitemap_selection');
			selection.style.display = 'none';
			return;
		}
		
		var inputs = new Array('parent', 'date', 'priority', 'frequency');
		for (var i = 0; i < inputs.length; i++) {
			var name = 'div' + inputs[i];
			var act = 'set' + inputs[i];
			
			var el = document.getElementById(name);
			el.style.display = (act == action) ? 'block' : 'none';
		}
	}
	
	function apply() {
		var selection = document.getElementById('sitemap_selection').value;
		var action = document.getElementById('sitemap_action').value;
		
		if (action == 'sep') {
			return;
		}
		
		if (selection == 'selected' && document.adminForm.boxchecked.value == 0) {
			if (action != 'pinggoogle' && action != 'pingyahoo' && action != 'pingbing' && action != 'pingservices') {
				alert('<?php echo JText::_("Please make a selection from the list"); ?>');
				return;
			}
		}
		
		// If delete, show warning
		if (action == 'delete') {
			if (!confirm('<?php echo JText::_("COM_MIJOSEF_TOOLBAR_CONFIRM_DELETE"); ?>')) {
				return;
			}
		}
		
		// Call the action
		document.adminForm.newparent.value = document.getElementById('tb_newparent').value;
		document.adminForm.newdate.value = document.getElementById('tb_newdate').value;
		document.adminForm.newfrequency.value = document.getElementById('tb_newfrequency').value;
		document.adminForm.newpriority.value = document.getElementById('tb_newpriority').value;
		document.adminForm.selection.value = selection;
		submitbutton(action);
	}
	
	function resetFilters() {
		document.adminForm.search_sef.value = '';
		document.adminForm.filter_component.value = '';
		document.adminForm.search_parent.value = '';
        document.adminForm.search_order.value = '';
		document.adminForm.filter_date.value = '';
		document.adminForm.filter_freq.value = '-1';
		document.adminForm.filter_priority.value = '-1';
		document.adminForm.search_id.value = '';
		
		document.adminForm.submit();
	}
</script>

<form action="index.php?option=com_mijosef&amp;controller=sitemap&amp;task=view" method="post" name="adminForm" id="adminForm">
	<table class="adminlist table table-striped">
		<thead>
			<tr>
				<th width="13">
					<?php echo JText::_('COM_MIJOSEF_COMMON_NUM'); ?>
				</th>
				<th width="20">
                    <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
				</th>
				<th>
					<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_COMMON_SEF').' '.JText::_('COM_MIJOSEF_COMMON_URL'), 'url_sef', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<?php if ($this->MijosefConfig->ui_sitemap_title == 1) { ?>
				<th width="240">
					<?php echo 'HTML ' . JText::_('COM_MIJOSEF_COMMON_SITEMAP') . ' ' . JText::_('COM_MIJOSEF_COMMON_TITLE'); ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_published == 1) { ?>
				<th width="50" style="text-align: center;">
					<?php echo JText::_('Published'); ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_id == 1) { ?>
				<th width="1%" style="text-align: center;">
					<?php echo JText::_('ID'); ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_parent == 1) { ?>
				<th width="75" style="text-align: center;">
					<?php echo JText::_('COM_MIJOSEF_SITEMAP_PARENT'); ?>
					<a href="#" onclick="javascript: submitform('saveParent');" title="<?php echo JText::_('Save'); ?>"><?php echo $save_img; ?></a>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_order == 1) { ?>
				<th width="90" style="text-align: right;">
					<?php echo JText::_('Order'); ?>
					<a href="#" onclick="javascript: submitform('saveOrder');" title="<?php echo JText::_('Save'); ?>"><?php echo $save_img; ?></a>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_date == 1) { ?>
				<th width="110">
					<?php echo JText::_('COM_MIJOSEF_SITEMAP_DATE'); ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_frequency == 1) { ?>
				<th width="50" style="text-align: center;">
					<?php echo JText::_('COM_MIJOSEF_SITEMAP_FREQUENCY'); ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_priority == 1) { ?>
				<th width="50" style="text-align: center;">
					<?php echo JText::_('COM_MIJOSEF_SITEMAP_PRIORITY'); ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_cached == 1) { ?>
				<th width="50" style="text-align: center;">
					<?php echo JText::_('COM_MIJOSEF_COMMON_CACHED'); ?>
				</th>
				<?php }	?>
			</tr>
			<tr>
				<th style="vertical-align: top !important;" colspan="2">
					<?php echo $this->lists['reset_filters']; ?>
				</th>
				<th style="vertical-align: top !important;">
					<?php echo $this->lists['search_sef']; ?>
					<?php echo $this->lists['component_list']; ?>
				</th>
				<?php if ($this->MijosefConfig->ui_sitemap_title == 1) { ?>
				<th style="vertical-align: top !important;">
					&nbsp;
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_published == 1) { ?>
				<th style="text-align: center; vertical-align: top !important;">
					<?php echo $this->lists['published_list']; ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_id == 1) { ?>
				<th style="text-align: center; vertical-align: top !important;">
					<?php echo $this->lists['search_id']; ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_parent == 1) { ?>
				<th style="text-align: center; vertical-align: top !important;">
					<?php echo $this->lists['search_parent']; ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_order == 1) { ?>
				<th style="text-align: right; vertical-align: top !important;">
					<?php echo $this->lists['search_order']; ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_date == 1) { ?>
				<th style="text-align: center; vertical-align: top !important;">
					<?php echo $this->lists['filter_date']; ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_frequency == 1) { ?>
				<th style="text-align: center; vertical-align: top !important;">
					<?php echo $this->lists['frequency_list']; ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_priority == 1) { ?>
				<th style="text-align: center; vertical-align: top !important;">
					<?php echo $this->lists['priority_list']; ?>
				</th>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_cached == 1) { ?>
				<th style="text-align: center; vertical-align: top !important;">
					&nbsp;
				</th>
				<?php }	?>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		$n = count($this->items);
		for ($i=0; $i < $n; $i++) {
			$row		= &$this->items[$i];
			$checked	= JHTML::_('grid.id', $i, $row->id);
			
			// Title
			if ($this->MijosefConfig->ui_sitemap_title == 1) {
				$style = "";
				
				if (isset($this->titles[$row->url_sef]) && (!empty($this->titles[$row->url_sef]->title) || !empty($this->titles[$row->url_sef]->meta_title))) {
					if (!empty($this->titles[$row->url_sef]->title)) {
						$title = $this->titles[$row->url_sef]->title;
					}
					else {
						$title = $this->titles[$row->url_sef]->meta_title;
					}
					
					$title_link = JRoute::_('index.php?option=com_mijosef&controller=sitemap&task=edit&cid[]='.$row->id.'&tmpl=component');
				}
				else {
					$style = 'style="color:Red"';
					$title = JText::_('COM_MIJOSEF_SITEMAP_NO_TITLE');
					$title_link = JRoute::_('index.php?option=com_mijosef&controller=sitemap&task=edit&cid[]='.$row->id.'&tmpl=component');
				}
			
				if (strlen($title) >= 40) {
					$title = substr($title, 0, 40) . '...';
				}
			}
			
			// Published icon
			if ($this->MijosefConfig->ui_sitemap_published == 1) {
				$published_icon = $this->getIcon($i, $row->published ? 'unpublish' : 'publish', $row->published ? 'icon-16-published-on.png' : 'icon-16-published-off.png');
			}
			
			// Date
			if ($this->MijosefConfig->ui_sitemap_date == 1) {
				if ($row->sdate == '0000-00-00' || $row->sdate == ''){
					$c_date = date('Y-m-d');
					$date = JHTML::calendar($c_date, 'sdate['.$row->id.']', 'sdate['.$row->id.']', '%Y-%m-%d', 'size="11" style="width: 80px;"');
				} else {
					$date = JHTML::calendar($row->sdate, 'sdate['.$row->id.']', 'sdate['.$row->id.']', '%Y-%m-%d', 'size="11" style="width: 80px;"');
				}
			}
			
			// Frequency
			if ($this->MijosefConfig->ui_sitemap_frequency == 1) {
				if ($row->frequency == ''){
					$frequency = JHTML::_('select.genericlist', Mijosef::get('sitemap')->getFrequencyList(), 'frequency['.$row->id.']', 'class="inputbox" size="1" style="width: 80px;"', 'value', 'text', $this->MijosefConfig->sm_freq);
				} else {
					$frequency = JHTML::_('select.genericlist', Mijosef::get('sitemap')->getFrequencyList(), 'frequency['.$row->id.']', 'class="inputbox" size="1" style="width: 80px;"', 'value', 'text', $row->frequency);
				}
			}
			
			// Priority
			if ($this->MijosefConfig->ui_sitemap_priority == 1) {
				if ($row->priority == ''){
					$priority = JHTML::_('select.genericlist', Mijosef::get('sitemap')->getPriorityList(), 'priority['.$row->id.']', 'class="inputbox" size="1" style="width: 80px;"', 'value', 'text', $this->MijosefConfig->sm_priority);
				} else {
					$priority = JHTML::_('select.genericlist', Mijosef::get('sitemap')->getPriorityList(), 'priority['.$row->id.']', 'class="inputbox" size="1" style="width: 80px;"', 'value', 'text', $row->priority);
				}
			}
			
			// Cache icon
			if ($this->MijosefConfig->ui_sitemap_cached == 1) {
				$cached = false;
				if (isset($this->cache[$row->url_sef])) {
					$cached = true;
				}
				$cached_icon = $this->getIcon($i, $cached ? 'uncache' : 'cache', $cached ? 'icon-16-cache-on.png' : 'icon-16-cache-off.png');
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
					<a href="../<?php echo $row->url_sef; ?>" title="<?php echo JText::_('COM_MIJOSEF_URL_SEF_TOOLTIP_SEF_URL'); ?>" target="_blank">
					<?php echo substr($row->treename, 0, 173); ?></a>
					<input type="hidden" name="ids[<?php echo $row->id; ?>]" value="<?php echo $row->id; ?>">
				</td>
				<?php if ($this->MijosefConfig->ui_sitemap_title == 1) { ?>
				<td>
					<a href="<?php echo $title_link; ?>" <?php echo $style; ?> class="modal" rel="{handler: 'iframe', size: {x: 650, y: 450}}">
						<?php echo $title; ?>
					</a>
				</td>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_published == 1) { ?>
				<td style="text-align: center;">
					<?php echo $published_icon;?>
				</td>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_id == 1) { ?>
				<td style="text-align: center;">
					<?php echo $row->id;?>
				</td>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_parent == 1) { ?>
				<td style="text-align: center;">
					<input type="text" name="sparent[<?php echo $row->id; ?>]" size="5" value="<?php echo $row->sparent; ?>" style="width: 30px; text-align: center" />
				</td>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_order == 1) { ?>
				<td style="text-align: right;">
					<?php if ($row->sparent == 0 && $row->sorder != 1) { ?>
					<span><?php echo $this->getIcon($i, 'orderUp', 'icon-16-uparrow-g.png'); ?></span>
					<?php } ?>
					<span><?php echo $this->getIcon($i, 'orderDown', 'icon-16-downarrow-g.png'); ?></span>
					<?php $disabled = $row->sparent == 0 ?  '' : 'disabled="disabled"'; ?>
					<input type="text" name="sorder[<?php echo $row->id; ?>]" size="4" <?php echo $disabled ?> value="<?php echo $row->sorder; ?>" style="width: 30px; text-align: center" />
				</td>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_date == 1) { ?>
				<td style="text-align: center;">
					<?php echo $date; ?>
				</td>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_frequency == 1) { ?>
				<td style="text-align: center;">
					<?php echo $frequency; ?>
				</td>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_priority == 1) { ?>
				<td style="text-align: center;">
					<?php echo $priority; ?>
				</td>
				<?php }	?>
				<?php if ($this->MijosefConfig->ui_sitemap_cached == 1) { ?>
				<td style="text-align: center;">
					<?php echo $cached_icon;?>
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

	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="sitemap" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<input type="hidden" name="newparent" value="" />
	<input type="hidden" name="newdate" value="" />
	<input type="hidden" name="newpriority" value="" />
	<input type="hidden" name="newfrequency" value="" />
	<?php echo JHTML::_('form.token'); ?>
</form>