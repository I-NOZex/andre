<div class="form">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
array('id' => 'horizontalForm',
'type' => 'horizontal')
);
?>

    <legend><?php echo $user->isNewRecord ? Yum::t('Create new user') : Yum::t('Update user'); ?></legend>

    <div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>
<?php
// If errors occured, display errors for all involved models
$models = array($user, $passwordform);
if(isset($profile) && $profile !== false)
	$models[] = $profile;
	$hasErrors = false;
	foreach($models as $m)
if($m->hasErrors())
	$hasErrors = true;
	if($hasErrors) {
		echo '<div class="alert alert-error">';
		echo CHtml::errorSummary($models);
		echo '</div>';
	}
	?>

<div class="span5 no_margin">

 <?php echo $form->textFieldRow($user,'username'); ?>

 <?php echo $form->dropDownListRow($user,'status',YumUser::itemAlias('UserStatus')); ?>

 <?php echo $form->dropDownListRow($user,'superuser',YumUser::itemAlias('AdminStatus')); ?>

<?php $this->renderPartial('/user/passwordfields', array(
			'form'=>$passwordform,'help'=>$user->isNewRecord ? 'generate a random Password' : 'keep it <em> unchanged </em>')); ?>

<?php if(Yum::hasModule('role')) {
	Yii::import('common.modules.role.models.*');
?>
<div class="control-group roles">
<label class="control-label"><?php echo Yum::t('User belongs to these roles'); ?></label>

<div class="controls"><?php $this->widget('YumModule.components.select2.ESelect2', array(
				'model' => $user,
				'attribute' => 'roles',
				'htmlOptions' => array(
					'multiple' => 'multiple',
					'style' => 'width:220px;'),
				'data' => CHtml::listData(YumRole::model()->findAll(), 'id', 'title'),
				)); ?></div>
</div>
<?php } ?>

</div>

<div class="span5">
<?php if(Yum::hasModule('profile')) 
$this->renderPartial(Yum::module('profile')->profileFormView, array(
			'profile' => $profile)); ?>
</div>

<div class="clearfix"></div>

<div class="form-actions">
<?php echo CHtml::submitButton($user->isNewRecord
			? Yum::t('Create')
			: Yum::t('Save'),array('class'=>'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>
</div>
<div class="clearfix"></div>
