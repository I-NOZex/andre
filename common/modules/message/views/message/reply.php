<div class="form">
<fieldset>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'yum-message-form',
			'action' => array('//message/message/compose'),
			'enableAjaxValidation'=>true,
            'type' => 'horizontal'
			)); ?>

<div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>
<?php
	echo CHtml::hiddenField('YumMessage[to_user_id]', $to_user_id);
	echo CHtml::hiddenField('YumMessage[answered]', $answer_to);
    echo '<div class="control-group controls">'.Yum::t('This message will be sent to {username}', array(
				'{username}' => '<b>'.YumUser::model()->findByPk($to_user_id)->username.'</b>')).'</div>';
?>

<?php echo $form->textFieldRow($model,'title',array('size'=>45,'maxlength'=>45,'class'=>'span4')); ?>

<?php echo $form->textAreaRow($model,'message',array('rows'=>6, 'cols'=>50,'class'=>'span4')); ?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton',array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => Yum::t('Reply')
    )
); ?></div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->
