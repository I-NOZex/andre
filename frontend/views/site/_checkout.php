<?php $form=$this->beginWidget('CActiveForm',array(
	'id'=>'encomenda-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('data-abide'=>'data-abide')
)); ?>

<fieldset>
<legend>Confirmar Encomenda</legend>
	<p class="help-block">Campos com <span class="required">*</span> são de preenchimento obrigatório.</p>

	<?php echo $form->errorSummary($model); ?>
      <div class="row">
        <div class="small-3 columns">
          <?php echo $form->labelEx($model,'NumVisa',array('class'=>'right inline')); ?>
        </div>
        <div class="small-9 columns">
          <?php echo $form->textField($model,'NumVisa',array('class'=>'span5','maxlength'=>16,'required'=>'required','pattern'=>"card")); ?>
          <small class="error">Introduza um número de cartão VISA válido</small>
        </div>
      </div>

      <div class="row">
        <div class="small-3 columns">
          <?php echo $form->labelEx($model,'Endereco',array('class'=>'right inline')); ?>
        </div>
        <div class="small-9 columns">
          <?php echo $form->textField($model,'Endereco',array('class'=>'span5','maxlength'=>256,'required'=>'required','pattern'=>"[a-zA-Z]+")); ?>
          <small class="error">Introduza um Endereço válido</small>
        </div>
      </div>

	<div class="form-actions">
		<button type="submit">Submit</button>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
