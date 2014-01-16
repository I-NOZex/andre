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
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
array('id' => 'horizontalForm',
'type' => 'horizontal')
);
?>

<div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

<?php echo $form->errorSummary(array($user, $profile)); ?>

<?php if(Yum::module()->loginType & UserModule::LOGIN_BY_USERNAME) { ?>

<?php echo $form->textFieldRow($user,'username',array(
			'size'=>20,'maxlength'=>20)); ?>

<?php } ?> 

<?php if(isset($profile) && is_object($profile))
	$this->renderPartial('/profile/_form', array('profile' => $profile)); ?>

<?php   $buttons = array();

        $buttons[] = array('label'=>$user->isNewRecord? Yum::t('Create my profile') : Yum::t('Save profile changes'),
            'buttonType'=>'submit', 'type'=>'primary','icon'=>'ok white'); ?>
<?php if(Yum::module('profile')->enablePrivacySetting)
        $buttons[] = array('label'=>Yum::t('Privacy settings'), 'htmlOptions'=>array(
		    'submit' => array('/profile/privacy/update')),'icon'=>'icon-eye-open'); ?>

<?php if(Yum::hasModule('avatar'))
        $buttons[] = array('label'=>Yum::t('Upload avatar Image'), 'htmlOptions'=>array(
		    'submit' => array('/avatar/avatar/editAvatar')),'icon'=>'upload'); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array(
        'buttons' => $buttons
      ));?>
</div></fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->
