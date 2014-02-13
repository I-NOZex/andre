<?php
$this->pageTitle = Yum::t( "Profile");
$this->breadcrumbs=array(
		Yum::t('Edit profile'));
$this->title = Yum::t('Edit profile');
?>


<div class="form">

<fieldset>
    <legend><?php echo Yum::t('Edit personal data'); ?></legend>
<?php
$form = $this->beginWidget('CActiveForm',
array('id' => 'horizontalForm')
);
?>

<div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

<?php echo $form->errorSummary(array($user, $profile)); ?>

<?php if(Yum::module()->loginType & UserModule::LOGIN_BY_USERNAME) { ?>

<?php echo $form->labelEx($user,'username'); ?>
<?php echo $form->textField($user,'username',array(
			'size'=>20,'maxlength'=>20)); ?>

<?php } ?> 

<?php if(isset($profile) && is_object($profile))
	$this->renderPartial('/profile/_form', array('profile' => $profile)); ?>

<?php   $buttons = array();

        $buttons[] = array('label'=>$user->isNewRecord? Yum::t('Create my profile') : Yum::t('Save profile changes'),
            'buttonType'=>'submit'); ?>
<?php if(Yum::module('profile')->enablePrivacySetting)
        $buttons[] = array('label'=>Yum::t('Privacy settings'), 'htmlOptions'=>array(
		    'submit' => array('/profile/privacy/update'),'class'=>'button')); ?>

<?php if(Yum::hasModule('avatar'))
        $buttons[] = array('label'=>Yum::t('Upload avatar Image'), 'htmlOptions'=>array(
		    'submit' => array('/avatar/avatar/editAvatar'),'class'=>'button')); ?>

<div class="form-actions">
<?php //die(var_dump($buttons)) ?>
<ul class="button-group radius">
<?php foreach($buttons as $btn): ?>
	<li><?php echo ((isset($btn['buttonType']) && $btn['buttonType']=='submit') ?
                CHtml::submitButton($btn['label'],array('class'=>'button')) :
                CHtml::link($btn['label'],$btn['htmlOptions']['submit'],$btn['htmlOptions'])
                ); ?></li>

<?php endforeach; ?>
</ul>
<?php /*$this->widget('bootstrap.widgets.TbButtonGroup',array(
        'buttons' => $buttons
      ));*/?>
</div></fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->
