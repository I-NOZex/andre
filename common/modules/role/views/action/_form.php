<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'action-form',
	'enableAjaxValidation'=>false,
    'type' => 'horizontal'
)); 

?>
<fieldset>

    <legend><?php echo ($model->isNewRecord) ? Yum::t('Create Action') : "Update Action $model->id"; ?></legend>

    <div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'span4')); ?>

		<?php echo $form->textAreaRow($model,'comment',array('rows'=>6, 'cols'=>50,'class'=>'span4')); ?>

		<?php echo $form->textFieldRow($model,'subject',array('size'=>60,'maxlength'=>255,'class'=>'span4')); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array('buttonType' => 'submit',
    'type' => 'primary',
    'label' => $model->isNewRecord ? Yum::t('Create') : Yum::t('Save'))
    ); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
