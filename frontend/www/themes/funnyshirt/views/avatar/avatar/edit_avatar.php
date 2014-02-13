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
    $btns[] = array('label' => Yum::t('Upload avatar'), 'buttonType' => 'submit');
    $btns[] = array('label' => Yum::t('Remove Avatar'),  'url' => array('//avatar/avatar/removeAvatar', 'id' => $model->id),
    'htmlOptions'=>array('class'=>'button'));
	if(Yum::module('avatar')->enableGravatar)
    $btns[] = array('label' => Yum::t('Use Gravatar'), 'url' => array('//avatar/avatar/enableGravatar', 'id' => $model->id),
    'htmlOptions'=>array('class'=>'button')); ?>

<ul class="button-group radius">
<?php foreach($btns as $btn): ?>
	<li><?php echo ((isset($btn['buttonType']) && $btn['buttonType']=='submit') ?
                CHtml::submitButton($btn['label'],array('class'=>'button')) :
                CHtml::link($btn['label'],$btn['url'],$btn['htmlOptions'])
                ); ?></li>

<?php endforeach; ?>
</ul>
<?php
	echo CHtml::endForm();
    echo '</div></fieldset>';
?>

</div>
