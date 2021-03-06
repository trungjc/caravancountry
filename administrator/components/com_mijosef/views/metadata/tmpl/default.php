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
	function showInput() {
		var action = document.getElementById('meta_action').value;
		var fields = document.getElementById('meta_fields');
		
		if (action == 'clean' || action == 'update') {
			fields.style.display = 'block';
		} else {
			fields.style.display = 'none';
		}
	}

	function apply() {
		var selection = document.getElementById('meta_selection').value;
		var action = document.getElementById('meta_action').value;
		
		// Seperator
		if (action == 'sep') {
			return;
		}
		
		// No selection
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
		
		// If purge, show warning
		if (action == 'clean') {
			if (!confirm('<?php echo JText::_("COM_MIJOSEF_TOOLBAR_CONFIRM_CLEAN_META"); ?>')) {
				return;
			}
		}
		
		// If update, show warning
		if (action == 'update') {
			if (!confirm('<?php echo JText::_("COM_MIJOSEF_TOOLBAR_CONFIRM_UPDATE_META"); ?>')) {
				return;
			}
		}
		
		// Call the action
		document.adminForm.fields.value = document.getElementById('tb_newfields').value;
		document.adminForm.selection.value = selection;
		submitbutton(action);
	}

	function resetFilters() {
		document.adminForm.search_url.value = '';
		document.adminForm.filter_component.value = '';
		document.adminForm.search_title.value = '';
		document.adminForm.filter_title.value = '-1';
		document.adminForm.filter_desc.value = '-1';
		document.adminForm.search_desc.value = '';
		document.adminForm.filter_key.value = '-1';
		document.adminForm.search_key.value = '';
		document.adminForm.filter_published.value = '-1';
		
		document.adminForm.submit();
	}

	function changeType(type) {
		window.location = 'index.php?option=com_mijosef&controller=metadata&task=view&type='+type;
	}
</script>

<form action="index.php?option=com_mijosef&amp;controller=metadata&amp;task=view" method="post" name="adminForm" id="adminForm">
    <dl id="sef-urls-tabs" class="tabs">
        <dt class="tabs <?php echo ($this->type == 'all') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('all');"><?php echo JText::_('COM_MIJOSEF_METADATA_TABS_ALL'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'dtitle') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('dtitle');"><?php echo JText::_('COM_MIJOSEF_METADATA_TABS_DTITLE'); ?></a></h3></span></dt>
        <dt class="tabs <?php echo ($this->type == 'ddesc') ? 'open' : 'closed'; ?>" style="cursor: pointer;"><span><h3><a href="javascript:changeType('ddesc');"><?php echo JText::_('COM_MIJOSEF_METADATA_TABS_DDESC'); ?></a></h3></span></dt>
    </dl>
	<div class="current">
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
					<th width="190" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_COMMON_TITLE'), 'title', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<th width="190" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_COMMON_META') . ' ' . JText::_('COM_MIJOSEF_COMMON_DESCRIPTION'), 'description', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php if ($this->MijosefConfig->ui_metadata_keys == 1) { ?>
					<th width="190" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_COMMON_META') . ' ' . JText::_('COM_MIJOSEF_COMMON_KEYWORDS'), 'keywords', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_published == 1) { ?>
					<th width="50" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('Published'), 'published', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_cached == 1) { ?>
					<th width="50" style="text-align: center;">
						<?php echo JText::_('COM_MIJOSEF_COMMON_CACHED'); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_id == 1) { ?>
					<th style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('ID'), 'id', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
				</tr>
				<tr>
					<th style="vertical-align: top !important;" colspan="2">
						<?php echo $this->lists['reset_filters']; ?>
					</th>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['search_url']; ?>
						<?php echo $this->lists['component_list']; ?>
					</th>
					<th style="text-align: center; vertical-align: top !important;">
						<?php echo $this->lists['search_title']; ?>
						<?php echo $this->lists['title_list']; ?>
					</th>
					<th style="text-align: center; vertical-align: top !important;">
						<?php echo $this->lists['search_desc']; ?>
						<?php echo $this->lists['desc_list']; ?>
					</th>
					<?php if ($this->MijosefConfig->ui_metadata_keys == 1) { ?>
					<th style="text-align: center; vertical-align: top !important;">
						<?php echo $this->lists['search_key']; ?>
						<?php echo $this->lists['key_list']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_published == 1) { ?>
					<th style="text-align: center; vertical-align: top !important;">
						<?php echo $this->lists['published_list']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_cached == 1) { ?>
					<th style="text-align: center; vertical-align: top !important;">
						&nbsp;
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_id == 1) { ?>
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
				
				// Real URL
				$modal_size = "x: 700, y: 535";
				$real_url = $edit_link = $style = "";
				if (isset($this->urls[$row->url_sef])) {
					if ($this->urls[$row->url_sef]['count'] != 1) {
						$style = 'style="color:Red"';
						$modal_size = "x: 800, y: 400";
						$real_url = JText::_('COM_MIJOSEF_METADATA_RED_URL');
						$edit_link = JRoute::_('index.php?option=com_mijosef&controller=sefurlsdp&task=view&id='.$this->urls[$row->url_sef]['id'].'&amp;tmpl=component');
					} else {
						$real_url = $this->urls[$row->url_sef]['url_real'];
						$edit_link = JRoute::_('index.php?option=com_mijosef&controller=sefurls&task=edit&cid[]='.$this->urls[$row->url_sef]['id'].'&amp;startOffset=1&amp;tmpl=component');
					}
				}
				
				$metatitle	= Mijosef::get('utility')->replaceSpecialChars($row->title, true);
				$metadesc 	= Mijosef::get('utility')->replaceSpecialChars($row->description, true);
				$metakey 	= Mijosef::get('utility')->replaceSpecialChars($row->keywords, true);
				
				// Published icon
				if ($this->MijosefConfig->ui_metadata_published == 1) {
					$published_icon = $this->getIcon($i, $row->published ? 'unpublish' : 'publish', $row->published ? 'icon-16-published-on.png' : 'icon-16-published-off.png');
				}
				
				// Cache icon
				if ($this->MijosefConfig->ui_metadata_cached == 1) {
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
						<?php echo JText::_('COM_MIJOSEF_COMMON_SEF').': '; ?>
						<a href="../<?php echo $row->url_sef; ?>" title="<?php echo JText::_('COM_MIJOSEF_URL_SEF_TOOLTIP_SEF_URL'); ?>" target="_blank">
						<?php echo substr($row->url_sef, 0, 173); ?>
						</a>
						<br/><br/>
						<?php echo JText::_('COM_MIJOSEF_COMMON_REAL').': ';?>
						<a href="<?php echo $edit_link; ?>" <?php echo $style; ?> class="modal" rel="{handler: 'iframe', size: {<?php echo $modal_size; ?>}}">
							<?php echo htmlentities(substr($real_url, 0, 173)); ?>
						</a>
						<input type="hidden" name="sef_id[<?php echo $row->id; ?>]" value="<?php echo $row->id; ?>">
					</td>
					<td style="text-align: center;">
						<textarea name="metatitle[<?php echo $row->id; ?>]" cols="25" rows="5"><?php echo $metatitle; ?></textarea>
					</td>
					<td style="text-align: center;">
						<textarea name="metadesc[<?php echo $row->id; ?>]" cols="25" rows="5"><?php echo $metadesc; ?></textarea>
					</td>
					<?php if ($this->MijosefConfig->ui_metadata_keys == 1) { ?>
					<td style="text-align: center;">
						<textarea name="metakey[<?php echo $row->id; ?>]" cols="25" rows="5"><?php echo $metakey; ?></textarea>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_published == 1) { ?>
					<td style="text-align: center;">
						<?php echo $published_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_cached == 1) { ?>
					<td  style="text-align: center;">
						<?php echo $cached_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_metadata_id == 1) { ?>
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
	<input type="hidden" name="controller" value="metadata" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<input type="hidden" name="fields" value="" />
	<?php echo JHTML::_('form.token'); ?>
</form>