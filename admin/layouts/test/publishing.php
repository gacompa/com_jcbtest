<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				Alizarina 
/-------------------------------------------------------------------------------------------------------/

	@version		1.0.0
	@build			31st July, 2025
	@created		30th July, 2025
	@package		jcbtest
	@subpackage		publishing.php
	@author			gacompa <http://alizarina.eu>	
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
  ____  _____  _____  __  __  __      __       ___  _____  __  __  ____  _____  _  _  ____  _  _  ____ 
 (_  _)(  _  )(  _  )(  \/  )(  )    /__\     / __)(  _  )(  \/  )(  _ \(  _  )( \( )( ___)( \( )(_  _)
.-_)(   )(_)(  )(_)(  )    (  )(__  /(__)\   ( (__  )(_)(  )    (  )___/ )(_)(  )  (  )__)  )  (   )(  
\____) (_____)(_____)(_/\/\_)(____)(__)(__)   \___)(_____)(_/\/\_)(__)  (_____)(_)\_)(____)(_)\_) (__) 

/------------------------------------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die;

// get the form
$form = $displayData->getForm();

// get the layout fields override method name (from layout path/ID)
$layout_path_array = explode('.', $this->getLayoutId());
// Since we cannot pass the layout and tab names as parameters to the model method
// this name combination of tab and layout in the method name is the only work around
// seeing that JCB uses those two values (tab_name & layout_name) as the layout file name.
// example of layout name: details_left.php
// example of method name: getFields_details_left()
$fields_tab_layout = 'fields_' . $layout_path_array[1];

// get the fields
$fields = $displayData->get($fields_tab_layout) ?: array(
	'title',
	'created',
	'created_by',
	'modified',
	'modified_by'
);

$hiddenFields = $displayData->get('hidden_fields') ?: [];

?>
<?php if ($fields && count((array) $fields)) :?>
<?php foreach($fields as $field): ?>
	<?php if (in_array($field, $hiddenFields)) : ?>
		<?php $form->setFieldAttribute($field, 'type', 'hidden'); ?>
	<?php endif; ?>
	<?php echo $form->renderField($field, null, null, array('class' => 'control-wrapper-' . $field)); ?>
<?php endforeach; ?>
<?php endif; ?>
