<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				Alizarina 
/-------------------------------------------------------------------------------------------------------/

	@version		1.0.0
	@build			31st July, 2025
	@created		30th July, 2025
	@package		jcbtest
	@subpackage		trashhelper.php
	@author			gacompa <http://alizarina.eu>	
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
  ____  _____  _____  __  __  __      __       ___  _____  __  __  ____  _____  _  _  ____  _  _  ____ 
 (_  _)(  _  )(  _  )(  \/  )(  )    /__\     / __)(  _  )(  \/  )(  _ \(  _  )( \( )( ___)( \( )(_  _)
.-_)(   )(_)(  )(_)(  )    (  )(__  /(__)\   ( (__  )(_)(  )    (  )___/ )(_)(  )  (  )__)  )  (   )(  
\____) (_____)(_____)(_/\/\_)(____)(__)(__)   \___)(_____)(_/\/\_)(__)  (_____)(_)\_)(____)(_)\_) (__) 

/------------------------------------------------------------------------------------------------------*/



use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper as Html;
use Joomla\CMS\Layout\LayoutHelper;
use JCB\Component\Jcbtest\Administrator\Helper\JcbtestHelper;

// No direct access to this file
defined('JPATH_BASE') or die;



?>

<!--[JCBGUI.layout.layout.97.$$$$]-->
<?php if ($displayData->state->get('filter.published') == -2 && ($displayData->canState && $displayData->canDelete)) : ?>
	<script>
		// change the class of the delete button
		jQuery("#toolbar-delete button").toggleClass("btn-danger");
		// function to empty the trash
		function emptyTrash() {
			if (document.adminForm.boxchecked.value == 0) {
				// select all the items visable
				document.adminForm.elements['checkall-toggle'].checked=1;
				Joomla.checkAll(document.adminForm.elements['checkall-toggle']);
				// check to confirm the deletion
				if(confirm('<?php echo Text::_("COM_JCBTEST_ARE_YOU_SURE_YOU_WANT_TO_DELETE_CONFIRMING_WILL_PERMANENTLY_DELETE_THE_SELECTED_ITEMS") ?>')) {
					Joomla.submitbutton('<?php echo $displayData->getName(); ?>.delete');
				} else {
					document.adminForm.elements['checkall-toggle'].checked=0;
					Joomla.checkAll(document.adminForm.elements['checkall-toggle']);
				}
			} else {
				// confirm deletion of those selected
				if (confirm('<?php echo Text::_("COM_JCBTEST_ARE_YOU_SURE_YOU_WANT_TO_DELETE_CONFIRMING_WILL_PERMANENTLY_DELETE_THE_SELECTED_ITEMS") ?>')) {
					Joomla.submitbutton('<?php echo $displayData->getName(); ?>.delete');
				};
			}
			return false;
		}
		// function to exit the tash state
		function exitTrash() {
			document.adminForm.filter_published.selectedIndex = 0;
			document.adminForm.submit();
			return false;
		}
	</script>
	<div class="alert alert-error">
		<?php if (empty($displayData->items)): ?>
			<h4 class="alert-heading">
				<span class="icon-trash"></span>
				<?php echo Text::_("COM_JCBTEST_TRASH_AREA") ?>
			</h4>
			<p><?php echo Text::_("COM_JCBTEST_YOU_ARE_CURRENTLY_VIEWING_THE_TRASH_AREA_AND_YOU_DONT_HAVE_ANY_ITEMS_IN_TRASH_AT_THE_MOMENT") ?></p>
		<?php else: ?>
			<h4 class="alert-heading">
				<span class="icon-trash"></span>
				<?php echo Text::_("COM_JCBTEST_TRASHED_ITEMS") ?>
			</h4>
			<p><?php echo Text::_("COM_JCBTEST_YOU_ARE_CURRENTLY_VIEWING_THE_TRASHED_ITEMS") ?></p>
			<button onclick="emptyTrash();" class="btn btn-small btn-danger">
				<span class="icon-delete" aria-hidden="true"></span>
				<?php echo Text::_("COM_JCBTEST_EMPTY_TRASH") ?>
			</button>
		<?php endif; ?>
		<button onclick="exitTrash();" class="btn btn-small">
			<span class="icon-back" aria-hidden="true"></span>
			<?php echo Text::_("COM_JCBTEST_EXIT_TRASH") ?>
		</button>
	</div>
<?php endif; ?><!--[/JCBGUI$$$$]-->

