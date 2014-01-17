<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tshirt-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

<fieldset>
<div class="well well-small">
	<p class="help-block">Campos com <span class="required">*</span> são de preenchimento obrigatório.</p>
</div>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Nome',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Preco',array('class'=>'span5','maxlength'=>19)); ?>

	<?php echo $form->textFieldRow($model,'DataEntrada',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Criar' : 'Guardar',
		)); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
