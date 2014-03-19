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

<script type="text/javascript">
	function showInput() {
		var action = document.getElementById('sefurls_action').value;
		
		var inputs = new Array('tags', 'ilinks', 'bookmarks', 'tag');
		for (var i = 0; i < inputs.length; i++) {
			var name = 'div' + inputs[i];
			var act = 'set' + inputs[i];
			
			var el = document.getElementById(name);
			el.style.display = (act == action) ? 'block' : 'none';
		}
	}

	function apply() {
		var selection = document.getElementById('sefurls_selection').value;
		var action = document.getElementById('sefurls_action').value;
		
		if (action == 'sep') {
			return;
		}
		
		if (selection == 'selected' && document.adminForm.boxchecked.value == 0) {
			alert('<?php echo JText::_('Please make a selection from the list'); ?>');
			return;
		}
		
		// If delete, show warning
		if (action == 'delete') {
			if (!confirm('<?php echo JText::_('COM_MIJOSEF_TOOLBAR_CONFIRM_DELETE'); ?>')) {
				return;
			}
		}
		
		// If delete, show warning
		if (action == 'trash') {
			if (!confirm('<?php echo JText::_('COM_MIJOSEF_TOOLBAR_CONFIRM_TRASH'); ?>')) {
				return;
			}
		}
		
		// Call the action
		document.adminForm.newtags.value = document.getElementById('tb_newtags').value;
		document.adminForm.newilinks.value = document.getElementById('tb_newilinks').value;
		document.adminForm.newbookmarks.value = document.getElementById('tb_newbookmarks').value;
		document.adminForm.newtag.value = document.getElementById('tb_newtag').value;
		document.adminForm.selection.value = selection;
		submitbutton(action);
	}
	
	function resetFilters() {
		document.adminForm.search_sef.value = '';
		document.adminForm.search_real.value = '';
		document.adminForm.filter_component.value = '-1';
		document.adminForm.filter_lang.value = '-1';
		document.adminForm.filter_published.value = '-1';
		document.adminForm.filter_used.value = '-1';
		document.adminForm.filter_locked.value = '-1';
		document.adminForm.filter_blocked.value = '-1';
		document.adminForm.fromdate.value = '';
		document.adminForm.todate.value = '';
		document.adminForm.filter_date.value = 'c';
		document.adminForm.search_hits.value = '';
		document.adminForm.search_id.value = '';
		
		document.adminForm.submit();
	}

	function changeType(type) {
		window.location = 'index.php?option=com_mijosef&controller=sefurls&task=view&type='+type;
	}

	$(document).ready(function(){
		$("#tb_newtag").autocomplete('components/com_mijosef/library/autocompleters/tags.php');
	});
</script>

<form action="index.php?option=com_mijosef&amp;controller=sefurls&amp;task=view" method="post" name="adminForm" id="adminForm">
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
		<table class="adminlist table table-striped" cellspacing="1">
			<thead>
				<tr>
					<th width="13">
						<?php echo JText::_('COM_MIJOSEF_COMMON_NUM'); ?>
					</th>
					<th width="20">
                        <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>
					<th width="35%">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_SEF_COMMON_URL_SEF'), 'url_sef', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<th width="65%">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_SEF_COMMON_URL_REAL'), 'url_real', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php if ($this->MijosefConfig->ui_sef_published == 1) { ?>
					<th width="50" style="text-align: center;">
						<?php echo JText::_('Published'); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_used == 1) { ?>
					<th width="50" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_SEF_COMMON_USED'), 'used', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_locked == 1) { ?>
					<th width="50" style="text-align: center;">
						<?php echo JText::_('COM_MIJOSEF_URL_SEF_COMMON_LOCKED'); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_blocked == 1) { ?>
					<th width="50" style="text-align: center;">
						<?php echo JText::_('COM_MIJOSEF_URL_SEF_COMMON_BLOCKED'); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_cached == 1) { ?>
					<th width="50" style="text-align: center;">
						<?php echo JText::_('COM_MIJOSEF_COMMON_CACHED'); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_date == 1) { ?>
					<th width="70" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_SEF_CREATED'), 'cdate', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<th width="70" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_URL_SEF_MODIFIED'), 'mdate', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_hits == 1) { ?>
					<th width="30" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('Hits'), 'hits', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_id == 1) { ?>
					<th width="30" style="text-align: center;">
						<?php echo JHTML::_('grid.sort', JText::_('ID'), 'id', $this->lists['order_dir'], $this->lists['order']); ?>
					</th>
					<?php }	?>
				</tr>
				<tr>
					<th colspan="2">
						<?php echo $this->lists['reset_filters']; ?>
					</th>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['search_sef']; ?>
					</th>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['search_real']; ?>
						<?php echo $this->lists['component_list']; ?>
						<?php 
							if (Mijosef::get('utility')->JoomFishInstalled() && $this->MijosefConfig->ui_sef_language == 1) {
								echo $this->lists['lang_list'];
							}
						?>
					</th>
					<?php if ($this->MijosefConfig->ui_sef_published == 1) { ?>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['published_list']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_used == 1) { ?>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['used_list']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_locked == 1) { ?>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['locked_list']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_blocked == 1) { ?>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['blocked_list']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_cached == 1) { ?>
					<th>
						&nbsp;
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_date == 1) { ?>
					<th style="vertical-align: top !important;" colspan="2">
						<?php echo $this->lists['fromdate']; ?>
						<?php echo $this->lists['todate']; ?>
						<?php echo $this->lists['date_list']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_hits == 1) { ?>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['search_hits']; ?>
					</th>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_id == 1) { ?>
					<th style="vertical-align: top !important;">
						<?php echo $this->lists['search_id']; ?>
					</th>
					<?php }	?>
				</tr>
			</thead>
			<tbody>
			<?php
			$k = 0;
            $n = count($this->items);
			for ($i = 0; $i < $n; $i++) {
				$row = &$this->items[$i];
				$checked = JHTML::_('grid.id', $i, $row->id);
				
				// Load parameters
				$params = new JRegistry($row->params);
				
				// Published icon
				if ($this->MijosefConfig->ui_sef_published == 1) {
					if ($this->type == 'trashed' || $this->type == 'notfound') {
						$img_published = $params->get('published', '0') ? 'icon-16-published-on.png' : 'icon-16-published-off.png';
						$published_icon = '<img src="components/com_mijosef/assets/images/'.$img_published.'" border="0" />';
					} else {
						$published_icon = $this->getIcon($i, $params->get('published', '0') ? 'unpublish' : 'publish', $params->get('published', '0') ? 'icon-16-published-on.png' : 'icon-16-published-off.png');
					}
				}
				
				// Used icon
				if ($this->MijosefConfig->ui_sef_used == 1) {
					if ($row->used == 2) {
						$task_used = '';
					} else {
						$task_used = 'used';
					}
					if ($row->used == 2) {
						$img_used = 'icon-16-used-on.png';
					} elseif ($row->used == 1) {
						$img_used = 'icon-16-used-on2.png';
					} else {
						$img_used = 'icon-16-used-off.png';
					}
					
					if ($this->type == 'trashed' || $this->type == 'notfound') {
						$used_icon = '<img src="components/com_mijosef/assets/images/'.$img_used.'" border="0" />';
					} else {
						if ($row->used != 2) {
							$used_icon = $this->getIcon($i, $task_used, $img_used);
						} else {
							$used_icon = '<img src="components/com_mijosef/assets/images/'.$img_used.'" border="0" />';
						}
					}
				}
				
				// Locked icon
				if ($this->MijosefConfig->ui_sef_locked == 1) {
					if ($this->type == 'trashed' || $this->type == 'notfound') {
						$img_locked = $params->get('locked', '0') ? 'icon-16-lock-on.png' : 'icon-16-lock-off.png';
						$locked_icon = '<img src="components/com_mijosef/assets/images/'.$img_locked.'" border="0" />';
					} else {
						$locked_icon = $this->getIcon($i, $params->get('locked', '0') ? 'unlock' : 'lock', $params->get('locked', '0') ? 'icon-16-lock-on.png' : 'icon-16-lock-off.png');
					}
				}
				
				// Blocked icon
				if ($this->MijosefConfig->ui_sef_blocked == 1) {
					if ($this->type == 'trashed' || $this->type == 'notfound') {
						$img_blocked = $params->get('blocked', '0') ? 'icon-16-block-on.png' : 'icon-16-block-off.png';
						$blocked_icon = '<img src="components/com_mijosef/assets/images/'.$img_blocked.'" border="0" />';
					} else {
						$blocked_icon = $this->getIcon($i, $params->get('blocked', '0') ? 'unblock' : 'block', $params->get('blocked', '0') ? 'icon-16-block-on.png' : 'icon-16-block-off.png');
					}
				}
				
				// Cache icon
				if ($this->MijosefConfig->ui_sef_cached == 1) {
					$cached = false;
					if (isset($this->cache[$row->url_real])) {
						$cached = true;
					}
					
					if ($this->type == 'trashed' || $this->type == 'notfound') {
						$img_cached = $cached ? 'icon-16-cache-on.png' : 'icon-16-cache-off.png';
						$cached_icon = '<img src="components/com_mijosef/assets/images/'.$img_cached.'" border="0" />';
					} else {
						$cached_icon = $this->getIcon($i, $cached ? 'uncache' : 'cache', $cached ? 'icon-16-cache-on.png' : 'icon-16-cache-off.png');
					}
				}
				
				if ($this->type != 'trashed' || $this->type == 'notfound') {
					$style = '';
					if ($this->duplicates[$row->url_sef] > 1) {
						$style = 'style="color:Red"';
						$d_link = JRoute::_('index.php?option=com_mijosef&controller=sefurlsdp&task=view&id='.$row->id.'&amp;tmpl=component');
					}
					
					$notfound_link = JRoute::_('index.php?option=com_mijosef&controller=movedurls&task=add&sefid='.$row->id.'&tmpl=component');
					
					$edit_link = JRoute::_('index.php?option=com_mijosef&controller=sefurls&task=edit&cid[]='.$row->id.'&amp;tmpl=component');
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
						<?php if ($this->type == 'trashed') { ?>
							<?php echo substr($row->url_sef, 0, 173); ?>
						<?php } elseif ($this->type == 'notfound') { ?>
							<a href="<?php echo $notfound_link; ?>" class="modal" rel="{handler: 'iframe', size: {x: 600, y: 340}}">
								<?php echo substr($row->url_sef, 0, 173); ?>&nbsp;<img src="components/com_mijosef/assets/images/icon-10-external.png" />
							</a>
						<?php } elseif ($this->duplicates[$row->url_sef] == 1) { ?>
						<a href="../<?php echo $row->url_sef; ?>" <?php echo $style; ?> title="<?php echo JText::_('COM_MIJOSEF_URL_SEF_TOOLTIP_SEF_URL'); ?>" target="_blank">
						<?php echo substr($row->url_sef, 0, 173); ?></a>
						
						<?php } elseif ($this->duplicates[$row->url_sef] > 1) { ?>
							<a href="<?php echo $d_link; ?>" <?php echo $style; ?> class="modal" rel="{handler: 'iframe', size: {x: 800, y: 400}}">
								<?php echo substr($row->url_sef, 0, 173); ?>&nbsp;<img src="components/com_mijosef/assets/images/icon-10-external.png" />
							</a>
						<?php } ?>
					</td>
					<td>
						<?php if ($this->type == 'trashed') { ?>
							<?php echo substr($row->url_real, 0, 173); ?>
						<?php } elseif ($this->type == 'notfound') { ?>
							&nbsp;
						<?php } else { ?>
						<a href="<?php echo $edit_link; ?>" style="cursor:pointer" class="modal" rel="{handler: 'iframe', size: {x: 700, y: 560}}">
							<?php echo htmlentities(substr($row->url_real, 0, 173)); ?>
						</a>
						<?php } ?>
					</td>
					<?php if ($this->MijosefConfig->ui_sef_published == 1) { ?>
					<td style="text-align: center;">
						<?php echo $published_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_used == 1) { ?>
					<td style="text-align: center;">
						<?php echo $used_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_locked == 1) { ?>
					<td style="text-align: center;">
						<?php echo $locked_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_blocked == 1) { ?>
					<td style="text-align: center;">
						<?php echo $blocked_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_cached == 1) { ?>
					<td style="text-align: center;">
						<?php echo $cached_icon;?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_date == 1) { ?>
					<td style="text-align: center;">
						<?php 
							if ($row->cdate == '0000-00-00' || $row->cdate == '') {
								$print = JText::_('-');
							} else {
								$print = JHTML::_('date', $row->cdate, JText::_('%d.%m.%y'));
							}
							echo $print;
						?>
					</td>
					<td style="text-align: center;">
						<?php 
							if ($row->mdate == '0000-00-00') {
								$print = JText::_('Never');
							} else {
								$print = JHTML::_('date', $row->mdate, JText::_('%d.%m.%y'));
							}
							echo $print;
						?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_hits == 1) { ?>
					<td style="text-align: center;">
						<?php echo $row->hits; ?>
					</td>
					<?php }	?>
					<?php if ($this->MijosefConfig->ui_sef_id == 1) { ?>
					<td style="text-align: center;">
						<?php echo $row->id; ?>
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
	<input type="hidden" name="controller" value="sefurls" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="newtags" value="" />
	<input type="hidden" name="newilinks" value="" />
	<input type="hidden" name="newbookmarks" value="" />
	<input type="hidden" name="newtag" value="" />
	<input type="hidden" name="selection" value="selected" />
	<?php echo JHTML::_('form.token'); ?>
</form>