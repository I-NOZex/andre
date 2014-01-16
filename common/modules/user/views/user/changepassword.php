<?php
$this->pageTitle = Yum::t("change password");

$this->breadcrumbs = array(
	Yum::t("Change password"));

if(isset($expired) && $expired)
	$this->renderPartial('password_expired');
?>

<div class="form">
<fieldset>
    <legend><?php echo Yum::t('Change password'); ?></legend>
<?php echo CHtml::beginForm('','POST',array('class'=>'form-horizontal')); ?>
	<div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>
	<?php echo CHtml::errorSummary($form); ?>

	<?php if(!Yii::app()->user->isGuest) {
		echo '<div class="control-group">';
		echo CHtml::activeLabelEx($form,'currentPassword',array('class'=>'control-label'));
        echo '<div class="controls">';
		echo CHtml::activePasswordField($form,'currentPassword'); 
		echo '</div></div>';
	} ?>

<?php $this->renderPartial(
		'common.modules.user.views.user.passwordfields', array(
			'form'=>$form)); ?>
	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => Yum::t("Save")
            )
        ); ?>
	</div>
</fieldset>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
