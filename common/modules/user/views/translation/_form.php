<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'translation-form',
    'type' => 'inline',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>


<div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

	<?php echo $form->errorSummary($models); ?>
    <div class="row-fluid">
        <div class="span6 no_margin">
        <?php echo $form->labelEx($models[0],'message',array('class'=>'span3 right')); ?>
    	<?php echo $form->textFieldRow($models[0],'message',array('class'=>'span9')); ?>
        </div><div class="span6">
        <?php echo $form->labelEx($models[0],'category',array('class'=>'span3 right')); ?>
    	<?php echo $form->textFieldRow($models[0],'category',array('class'=>'span9 pull-right')); ?>
        </div>
    </div>
	<hr />
    <div class="items row-fluid">
    	<?php foreach($models as $model) { ?>
        	<div class="span3">
            	<?php echo CHtml::label($model->language, 'translation_'.$model->language); ?>
            	<?php echo CHtml::textField('translation_'.$model->language, $model->translation,array('class'=>'span12')); ?>
        	</div>
    	<?php } ?>
    </div>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton',array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $models[0]->isNewRecord ? Yum::t('Create') : Yum::t('Save')
    )
); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
