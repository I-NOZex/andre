<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'IDEncomenda',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDCliente',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Data',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Total',array('class'=>'span5','maxlength'=>19)); ?>

	<?php echo $form->textFieldRow($model,'NumVisa',array('class'=>'span5','maxlength'=>16)); ?>

	<?php echo $form->textFieldRow($model,'Endereco',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'Entregue',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
