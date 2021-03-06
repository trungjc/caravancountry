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
	function upgradeExt(url) {		
		document.adminForm.task.value = 'installUpgrade';
		document.adminForm.mijosofturl.value = url;
		document.adminForm.submit();
	}

	function noPersonalId() {
		var res = alert('No Personal ID, please enter your Personal ID into MijoSEF configuration.');
		return res;
	}

	function apply() {
		var selection = document.getElementById('ext_selection').value;
		var action = document.getElementById('ext_action').value;
		
		if (action == 'sep') {
			return;
		}
		
		if (selection == 'selected' && document.adminForm.boxchecked.value == 0) {
			alert('Please make a selection from the list');
			return;
		}
		
		// If purge URLs, show warning
		if (action == 'savepurgeurls') {
			if (!confirm('<?php echo JText::_("COM_MIJOSEF_TOOLBAR_CONFIRM_PURGE_URLS"); ?>')) {
				return;
			}
		}
		
		// If update URLs, show warning
		if (action == 'saveupdateurls') {
			if (!confirm('<?php echo JText::_("COM_MIJOSEF_TOOLBAR_CONFIRM_UPDATE_URLS"); ?>')) {
				return;
			}
		}
		
		// If purge meta, show warning
		if (action == 'savepurgemeta') {
			if (!confirm('<?php echo JText::_("COM_MIJOSEF_TOOLBAR_CONFIRM_PURGE_META"); ?>')) {
				return;
			}
		}
		
		// If update meta, show warning
		if (action == 'saveupdatemeta') {
			if (!confirm('<?php echo JText::_("COM_MIJOSEF_TOOLBAR_CONFIRM_UPDATE_META"); ?>')) {
				return;
			}
		}
		
		// Call the action
		document.adminForm.selection.value = selection;
		submitbutton(action);
	}

	function resetFilters() {
		document.adminForm.search_name.value = '';
		document.adminForm.filter_router.value = '-1';
		document.adminForm.search_prefix.value = '';
		document.adminForm.filter_skipmenu.value = '-1';
		
		document.adminForm.submit();
	}
</script>

<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm_pck">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_INSTALL'); ?></legend>
		<table class="adminform">
			<tbody>
				<tr>
					<td width="80">
						<label for="install_package"><?php echo JText::_('COM_MIJOSEF_COMMON_SELECT_FILE'); ?>:</label>
					</td>
					<td>
						<input class="input_box" type="file" size="57" id="install_package" name="install_package" />
						<input class="btn btn-primary" type="submit" onclick="submitbutton()" value="<?php echo JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_INSTALL_UPLOAD'); ?>" />
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="extensions" />
	<input type="hidden" name="task" value="installUpgrade" />
	<?php echo JHTML::_('form.token'); ?>
</form>

<form action="index.php?option=com_mijosef&amp;controller=extensions&amp;task=view" method="post" name="adminForm" id="adminForm">
	<table class="adminlist table table-striped"">
		<thead>
			<tr>
				<th width="13">
					<?php echo JText::_('COM_MIJOSEF_COMMON_NUM'); ?>
				</th>
                <th width="20">
                    <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                </th>
				<th nowrap="nowrap">
					<?php echo JHTML::_('grid.sort', JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_COMPONENT'), 'name', $this->lists['order_dir'], $this->lists['order']); ?>
				</th>
				<th width="60" class="title">
					<?php echo JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_VERSION'); ?>
				</th>
				<th width="90" class="title">
					<?php echo JTEXT::_('COM_MIJOSEF_CPANEL_LATEST_VERSION'); ?>
				</th>
				<th width="80" class="title">
					<?php echo JTEXT::_('COM_MIJOSEF_EXTENSIONS_VIEW_LICENSE'); ?>
				</th>
				<th width="90" class="title">
					<?php echo JTEXT::_('COM_MIJOSEF_EXTENSIONS_VIEW_STATUS'); ?>
				</th>
				<th width="130" class="title">
					<?php echo JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_ROUTER'); ?>
				</th>
				<th width="120" class="title">
					<?php echo JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_PREFIX'); ?>
				</th>
				<th width="120" class="title">
					<?php echo JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_SKIP'); ?>
				</th>
				<th width="90" class="title">
					<?php echo JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_AUTHOR'); ?>
				</th>
			</tr>
			<tr>
				<th style="vertical-align: top !important;" colspan="2">
					<?php echo $this->lists['reset_filters']; ?>
				</th>
				<th>
					<?php echo $this->lists['search_name']; ?>
				</th>
				<th>
					&nbsp;
				</th>
				<th>
					&nbsp;
				</th>
				<th>
					&nbsp;
				</th>
				<th>
					&nbsp;
				</th>
				<th style="vertical-align: top !important;">
					<?php echo $this->lists['router_list']; ?>
				</th>
				<th>
					<?php echo $this->lists['search_prefix']; ?>
				</th>
				<th style="vertical-align: top !important;">
					<?php echo $this->lists['skip_list']; ?>
				</th>
				<th>
					&nbsp;
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count($this->items); $i < $n; $i++) {
			$row = &$this->items[$i];
			
			// Load parameters
			$params = new JRegistry($this->params[$row->extension]->params);
			
			// Version checker is disabled
			if (!isset($this->info)) {
				$license = JText::_('Disabled');
				$info->version = JText::_('Disabled');
			}
			elseif (!isset($this->info[$row->extension])) {
				$license = JText::_('Not Available');
				$info->version = JText::_('Not Available');
			} else {
				$info = $this->info[$row->extension];
				$license = 'Commercial';
				if (strpos($info->description, 'free') === 0) {
					$license = 'Free';
				}
			}
			
			// Name
			if (!empty($row->name)) {
				$edit_link = JRoute::_('index.php?option=com_mijosef&controller=extensions&task=edit&cid[]='.$row->id.'&amp;tmpl=component');
				$name = '<a href="'.$edit_link.'" style="cursor:pointer" class="modal" rel="{handler: \'iframe\', size: {x: 650, y: 500}}">'.$row->name.'</a>';
			} else {
				$name = $row->extension;
			}
			
			// Installed Version, author, author URL
			$installed_version = "-";
			$author = "-";
			$xml_file = JPATH_MIJOSEF_ADMIN.'/extensions/'.$row->extension.'.xml';
			if (file_exists($xml_file)) {
				$author_name 		= Mijosef::get('utility')->getXmlText($xml_file, 'author');
				$author_url			= Mijosef::get('utility')->getXmlText($xml_file, 'authorUrl');
				$author 			= '<a href="http://'.$author_url.'" target= "_blank">'.$author_name.'</a>';
				$installed_version	= Mijosef::get('utility')->getXmlText($xml_file, 'version');
			}
			
			// Latest version
			if ($info->version == JText::_('Disabled') || $info->version == JText::_('Not Available')) {
				$latest_version = $info->version;
			} else {
				$compared = version_compare($installed_version, $info->version);
				if ($compared == 0) {
					$latest_version = '<strong><font color="green">'.$info->version.'</font></strong>';
				} elseif($compared == -1) {
					$latest_version = '<a href="http://mijosoft.com" target="_blank"><b><font color="red">'.$info->version.'</font></b></a>';
				} else {
					$latest_version = '<a href="http://mijosoft.com" target="_blank"><b><font color="orange">'.$info->version.'</font></b></a>';
				}
			}
			
			// Status
			if ($info->version == JText::_('Disabled')) {
				$status = $info->version;
			} elseif ($info->version == JText::_('Not Available')) {
				$status = '<input type="button" class="btn btn-success btn-small hasTip" value="'.JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_STATUS_4').'" onclick="window.open(\'http://mijosoft.com/services/new-extension-request\');" title="'.JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_STATUS_GET').'" />';
			} else {
				if (file_exists(JPATH_MIJOSEF_ADMIN.'/extensions/'.$row->extension.'.php')) {
					$compared = version_compare($installed_version, $info->version);
					if ($compared != -1) { // Up-to-date
						$status = JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_STATUS_1');
					} else {
						// Upgrade needed
						$pid = Mijosef::getConfig()->pid;
						
						if ($license == 'Free') {
							$url = 'index.php?option=com_mijoextensions&view=download&model=ext_mijosef_'.str_replace('com_', '', $row->extension).'&free=1';
							$func = "upgradeExt('".$url."');";
						}
						elseif (!empty($pid)) {
							$url = 'index.php?option=com_mijoextensions&view=download&model=ext_mijosef_'.str_replace('com_', '', $row->extension).'&pid='.$pid;
							$func = "upgradeExt('".$url."');";
						}
						else {
							$func = "return noPersonalId();";
						}
						
						$status = '<input type="button" class="btn btn-danger btn-small hasTip" value="'.JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_STATUS_2').'" onclick="'.$func.'" title="'.JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_STATUS_UPGRADE').'"/>';
					}
				} else {
					$status = '<input type="button" class="btn btn-success btn-small hasTip" value="'.JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_STATUS_3').'" onclick="window.open(\''. $info->link .'\');" title="'.JText::_('COM_MIJOSEF_EXTENSIONS_VIEW_STATUS_GET').'" />';
				}
			}
			
			// Router
			$router = JHTML::_('select.genericlist', Mijosef::get('utility')->getRouterList($row->extension), 'router['.$row->id.']', 'class="inputbox" size="1" style="width: 170px;"', 'value', 'text', $params->get('router', '1'));
			
			// Prefix
			$prefix = $params->get('prefix');
			
			// Skip menu
			$skip_menu = Mijosef::get('utility')->getRadioList('skip_menu['.$row->id.']', $params->get('skip_menu'), '', 'skip_menu'.$row->id);

			$checked = JHTML::_('grid.id', $i, $row->id);
			
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
					<?php echo $this->pagination->getRowOffset($i); ?>
				</td>
				<td>
					<?php echo $checked; ?>
				</td>
				<td>
					<?php echo $name; ?>
					<input type="hidden" name="id[<?php echo $row->id; ?>]" value="<?php echo $row->id; ?>">
				</td>
				<td align="center">
					<?php echo $installed_version; ?>
				</td>
				<td align="center">
					<?php echo $latest_version; ?>
				</td>
				<td align="center">
					<?php echo $license; ?>
				</td>
				<td align="center">
					<?php echo $status; ?>
				</td>
				<td align="center">
					<?php echo $router; ?>
				</td>
				<td align="center">
					<input type="text" name="prefix[<?php echo $row->id; ?>]" size="25" style="width: 100px;" value="<?php echo $prefix; ?>" />
				</td>
				<td align="center">
					<?php echo $skip_menu; ?>
				</td>
				<td align="center">
					<?php echo $author; ?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="12">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
	</table>

	<input type="hidden" name="option" value="com_mijosef" />
	<input type="hidden" name="controller" value="extensions" />
	<input type="hidden" name="task" value="view" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="mijosofturl" value="" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_dir']; ?>" />
	<input type="hidden" name="selection" value="selected" />
	<?php echo JHTML::_('form.token'); ?>
</form>