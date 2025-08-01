<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				Alizarina 
/-------------------------------------------------------------------------------------------------------/

	@version		1.0.0
	@build			31st July, 2025
	@created		30th July, 2025
	@package		jcbtest
	@subpackage		default.php
	@author			gacompa <http://alizarina.eu>	
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
  ____  _____  _____  __  __  __      __       ___  _____  __  __  ____  _____  _  _  ____  _  _  ____ 
 (_  _)(  _  )(  _  )(  \/  )(  )    /__\     / __)(  _  )(  \/  )(  _ \(  _  )( \( )( ___)( \( )(_  _)
.-_)(   )(_)(  )(_)(  )    (  )(__  /(__)\   ( (__  )(_)(  )    (  )___/ )(_)(  )  (  )__)  )  (   )(  
\____) (_____)(_____)(_/\/\_)(____)(__)(__)   \___)(_____)(_/\/\_)(__)  (_____)(_)\_)(____)(_)\_) (__) 

/------------------------------------------------------------------------------------------------------*/

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\HTML\HTMLHelper as Html;
use JCB\Joomla\Utilities\ArrayHelper;
use JCB\Joomla\Utilities\StringHelper;

// No direct access to this file
defined('_JEXEC') or die;

Html::_('jquery.framework');
Html::_('bootstrap.tooltip');
Html::_('script', 'system/core.js', false, true);
Html::_('behavior.keepalive');

?>
<script type="text/javascript">
<?php if ($this->hasPackage && ArrayHelper::check($this->headerList)) : ?>
Joomla.continueImport = function() {
    var form = document.getElementById('adminForm');
    var error = false;
    var therequired = [<?php $i = 0; foreach($this->headerList as $name => $title) { echo ($i != 0)? ', "vdm_'.$name.'"':'"vdm_'.$name.'"'; $i++; } ?>];
    for(i = 0; i < therequired.length; i++) {
        if(document.getElementById(therequired[i]).value == "" ) {
            error = true;
            break;
        }
    }
    // do field validation
    if (error) {
        alert("<?php echo Text::_('COM_JCBTEST_IMPORT_MSG_PLEASE_SELECT_ALL_COLUMNS', true); ?>");
    } else {
        document.getElementById('loading').style.display = 'block';
        form.gettype.value = 'continue';
        form.submit();
    }
};
<?php else: ?>
Joomla.submitbutton = function() {
    var form = document.getElementById('adminForm');
    // do field validation
    if (form.import_package.value == "") {
        alert("<?php echo Text::_('COM_JCBTEST_IMPORT_MSG_PLEASE_SELECT_A_FILE', true); ?>");
    } else {
        document.getElementById('loading').style.display = 'block';
        form.gettype.value = 'upload';
        form.submit();
    }
};

Joomla.submitbutton3 = function() {
    var form = document.getElementById('adminForm');
    // do field validation
    if (form.import_directory.value == ""){
        alert("<?php echo Text::_('COM_JCBTEST_IMPORT_MSG_PLEASE_SELECT_A_DIRECTORY', true); ?>");
    } else {
        document.getElementById('loading').style.display = 'block';
        form.gettype.value = 'folder';
        form.submit();
    }
};

Joomla.submitbutton4 = function() {
    var form = document.getElementById('adminForm');
    // do field validation
    if (form.import_url.value == "" || form.import_url.value == "http://") {
        alert("<?php echo Text::_('COM_JCBTEST_IMPORT_MSG_ENTER_A_URL', true); ?>");
    } else {
        document.getElementById('loading').style.display = 'block';
        form.gettype.value = 'url';
        form.submit();
    }
};
<?php endif; ?>

// Add spindle-wheel for importations:
document.addEventListener('DOMContentLoaded', function() {
    // get page body
    var outerBodyDiv = document.querySelector('body');
    // start loading spinner
    var loadingDiv = document.createElement('div');
    loadingDiv.id = 'loading';
    // Set CSS properties individually
    loadingDiv.style.background = "rgba(255, 255, 255, .8) url('components/com_[[[component]]]/assets/images/import.gif') 50% 15% no-repeat";
    loadingDiv.style.top = (outerBodyDiv.getBoundingClientRect().top + window.pageYOffset) + "px";
    loadingDiv.style.left = (outerBodyDiv.getBoundingClientRect().left + window.pageXOffset) + "px";
    loadingDiv.style.width = outerBodyDiv.offsetWidth + "px";
    loadingDiv.style.height = outerBodyDiv.offsetHeight + "px";
    loadingDiv.style.position = 'fixed';
    loadingDiv.style.opacity = '0.80';
    loadingDiv.style.msFilter = "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
    loadingDiv.style.filter = "alpha(opacity=80)";
    loadingDiv.style.display = 'none';
    // add to page body
    outerBodyDiv.appendChild(loadingDiv);
});

</script>

<div id="installer-import" class="clearfix">
<form enctype="multipart/form-data" action="<?php echo Route::_('index.php?option=com_jcbtest&view=import');?>" method="post" name="adminForm" id="adminForm" class="form-horizontal form-validate">
	<div id="main-card">

	<?php if ($this->hasPackage && ArrayHelper::check($this->headerList) && ArrayHelper::check($this->headers)) : ?>
		<fieldset class="uploadform">
			<legend><?php echo Text::_('COM_JCBTEST_IMPORT_LINK_FILE_TO_TABLE_COLUMNS'); ?></legend>
			<div class="control-group">
				<label class="control-label" ><h4><?php echo Text::_('COM_JCBTEST_IMPORT_TABLE_COLUMNS'); ?></h4></label>
				<div class="controls">
					<label class="control-label" ><h4><?php echo Text::_('COM_JCBTEST_IMPORT_FILE_COLUMNS'); ?></h4></label>
				</div>
			</div>
			<?php foreach($this->headerList as $name => $title): ?>
				<div class="control-group">
					<label for="<?php echo $name; ?>" class="control-label" ><?php echo $title; ?></label>
					<div class="controls">
					<select  name="<?php echo $name; ?>"  id="vdm_<?php echo $name; ?>" required class="required input_box" >
						<option value=""><?php echo Text::_('COM_JCBTEST_IMPORT_PLEASE_SELECT_COLUMN'); ?></option>
						<option value="IGNORE"><?php echo Text::_('COM_JCBTEST_IMPORT_IGNORE_COLUMN'); ?></option>
						<?php foreach($this->headers as $value => $option): ?>
							<?php $selected = (strtolower($option) ==  strtolower ($title) || strtolower($option) == strtolower($name))? 'selected="selected"':''; ?>
							<option value="<?php echo StringHelper::html($value); ?>" class="required" <?php echo $selected ?>><?php echo StringHelper::html($option); ?></option>
						<?php endforeach; ?>
					</select>
					</div>
				</div>
			<?php endforeach; ?>
			<div class="form-actions">
				<input class="btn btn-primary" type="button" value="<?php echo Text::_('COM_JCBTEST_IMPORT_CONTINUE'); ?>" onclick="Joomla.continueImport()" />
			</div>
		</fieldset>
		<input type="hidden" name="gettype" value="continue" />
	<?php else: ?>
		<?php echo Html::_('uitab.startTabSet', 'myTab', array('active' => 'upload')); ?>

		<?php echo Html::_('uitab.addTab', 'myTab', 'upload', Text::_('COM_JCBTEST_IMPORT_FROM_UPLOAD', true)); ?>
			<fieldset class="uploadform">
				<legend><?php echo Text::_('COM_JCBTEST_IMPORT_UPDATE_DATA'); ?></legend>
				<div class="control-group">
					<label for="import_package" class="control-label"><?php echo Text::_('COM_JCBTEST_IMPORT_SELECT_FILE'); ?></label>
					<div class="controls">
						<input class="input_box" id="import_package" name="import_package" type="file" size="57" />
					</div>
				</div>
				<div class="form-actions">
					<input class="btn btn-primary" type="button" value="<?php echo Text::_('COM_JCBTEST_IMPORT_UPLOAD_BOTTON'); ?>" onclick="Joomla.submitbutton()" />&nbsp;&nbsp;&nbsp;<small><?php echo Text::_('COM_JCBTEST_IMPORT_FORMATS_ACCEPTED'); ?> (.csv .xls .ods)</small>
				</div>
			</fieldset>
		<?php echo Html::_('uitab.endTab'); ?>

		<?php echo Html::_('uitab.addTab', 'myTab', 'directory', Text::_('COM_JCBTEST_IMPORT_FROM_DIRECTORY', true)); ?>
			<fieldset class="uploadform">
				<legend><?php echo Text::_('COM_JCBTEST_IMPORT_UPDATE_DATA'); ?></legend>
				<div class="control-group">
					<label for="import_directory" class="control-label"><?php echo Text::_('COM_JCBTEST_IMPORT_SELECT_FILE_DIRECTORY'); ?></label>
					<div class="controls">
						<input type="text" id="import_directory" name="import_directory" class="span5 input_box" size="70" value="<?php echo $this->state->get('import.directory'); ?>" />
					</div>
				</div>
				<div class="form-actions">
					<input type="button" class="btn btn-primary" value="<?php echo Text::_('COM_JCBTEST_IMPORT_GET_BOTTON'); ?>" onclick="Joomla.submitbutton3()" />&nbsp;&nbsp;&nbsp;<small><?php echo Text::_('COM_JCBTEST_IMPORT_FORMATS_ACCEPTED'); ?> (.csv .xls .ods)</small>
				</div>
				</fieldset>
		<?php echo Html::_('uitab.endTab'); ?>

		<?php echo Html::_('uitab.addTab', 'myTab', 'url', Text::_('COM_JCBTEST_IMPORT_FROM_URL', true)); ?>
			<fieldset class="uploadform">
				<legend><?php echo Text::_('COM_JCBTEST_IMPORT_UPDATE_DATA'); ?></legend>
				<div class="control-group">
					<label for="import_url" class="control-label"><?php echo Text::_('COM_JCBTEST_IMPORT_SELECT_FILE_URL'); ?></label>
					<div class="controls">
						<input type="text" id="import_url" name="import_url" class="span5 input_box" size="70" value="http://" />
					</div>
				</div>
				<div class="form-actions">
					<input type="button" class="btn btn-primary" value="<?php echo Text::_('COM_JCBTEST_IMPORT_GET_BOTTON'); ?>" onclick="Joomla.submitbutton4()" />&nbsp;&nbsp;&nbsp;<small><?php echo Text::_('COM_JCBTEST_IMPORT_FORMATS_ACCEPTED'); ?> (.csv .xls .ods)</small>
				</div>
			</fieldset>
		<?php echo Html::_('uitab.endTab'); ?>
		<?php echo Html::_('uitab.endTabSet'); ?>
		<input type="hidden" name="gettype" value="upload" />
	<?php endif; ?>
	<input type="hidden" name="task" value="import.import" />
	<?php echo Html::_('form.token'); ?>
</form>
</div>