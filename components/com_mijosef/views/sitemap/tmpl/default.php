<?php
/**
* @version		1.0.0
* @package		MijoSEF
* @subpackage	MijoSEF
* @copyright	2009-2013 Mijosoft LLC, mijosoft.com
* @license		GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @license		2009-2012 GNU/GPL based on AceSEF joomace.net
*/

//No Permision
defined('_JEXEC') or die('Restricted access');
?>

<?php if ($this->params->get('show_page_title', 1)) { ?>
	<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
<?php } ?>

<table  width="100%" cellpadding="4" cellspacing="0" border="0" align="center">
	<?php
	for ($i = 0, $n=count($this->items); $i <  $n; $i ++) {
		$row = &$this->items[$i];
		?>
			<tr>
				<td>
					<?php echo $row->title;?>
				</td>
			</tr>
		<?php
	}
	?>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<div class="pagination">
				<?php echo $this->pagination->getPagesLinks(); ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>