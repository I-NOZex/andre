<div class="form">
<?php
$this->title = Yum::t('Upload avatar');

$this->breadcrumbs = array(
		Yum::t('Profile') => array('//profile/profile/view'),
		Yum::t('Upload avatar'));

if(Yii::app()->user->isAdmin())
	echo '<p class="title">'.Yum::t('Set Avatar for user ' . $model->username).'</p>';
else if($model->avatar) {
	echo '<p class="title">'.Yum::t('Your Avatar image').'</p>';
	echo $model->getAvatar();
}
else
	echo '<p class="title">'.Yum::t('Upload avatar').'</p>';
	echo Yum::t('You do not have set an avatar image yet');

	echo '<br />';

if(Yum::module('avatar')->avatarMaxWidth != 0)
	echo '<p>' . Yum::t('The image should have at least 50px and a maximum of 200px in width and height. Supported filetypes are .jpg, .gif and .png') . '</p>';

    echo '<fieldset>';
	echo CHtml::errorSummary($model,null,null,array('class'=>'alert alert-error'));
	echo CHtml::beginForm(array('//avatar/avatar/editAvatar', 'id' => $model->id), 'POST',
    array('enctype' => 'multipart/form-data','class'=>'form-horizontal'));
	echo '<div class="control-group">';
	echo CHtml::activeLabelEx($model, 'avatar',array('class'=>'control-label'));
    echo '<div class="controls">';
	echo CHtml::activeFileField($model, 'avatar');
	echo CHtml::error($model, 'avatar',array('class'=>'help-inline error'));
	echo '</div></div><div class="form-actions">';
    $btns = array();
    $btns[] = array('label' => Yum::t('Upload avatar'), 'buttonType' => 'submit', 'type'=>'primary', 'icon'=>'upload white');
    $btns[] = array('label' => Yum::t('Remove Avatar'), 'type'=>'danger', 'icon'=>'remove white', 'url' => array('//avatar/avatar/removeAvatar', 'id' => $model->id));
	if(Yum::module('avatar')->enableGravatar)
    $btns[] = array('label' => Yum::t('Use Gravatar'), 'url' => array('//avatar/avatar/enableGravatar', 'id' => $model->id));
    $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons' => $btns));
	echo CHtml::endForm();
    echo '</div></fieldset>';
?>

</div>
