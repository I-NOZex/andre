<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'encomenda-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>

<fieldset>
<div class="well well-small">
	<p class="help-block">Campos com <span class="required">*</span> são de preenchimento obrigatório.</p>
</div>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'IDEncomenda',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDCliente',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Data',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NumVisa',array('class'=>'span5','maxlength'=>16)); ?>

	<?php echo $form->textFieldRow($model,'Endereco',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'Entregue',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Criar' : 'Guardar',
		)); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
