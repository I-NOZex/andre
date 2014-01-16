<?php
if(!$this->title) 
	$this->title = Yum::t('Compose new message'); 
if($this->breadcrumbs == array())
	$this->breadcrumbs = array(Yum::t('Messages'), Yum::t('Compose'));
?>

<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'yum-message-form',
			'action' => array('//message/message/compose'),
			'enableAjaxValidation'=>true,
			'enableClientValidation'=>true,
            'type' => 'horizontal'
			)); ?>

<fieldset>
<legend><?php echo Yum::t('Write a message'); ?></legend>

<div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

<?php echo $form->errorSummary($model);

echo CHtml::hiddenField('YumMessage[answered]', $answer_to);

if($to_user_id) {
	echo CHtml::hiddenField('YumMessage[to_user_id]', $to_user_id);
	echo Yum::t('This message will be sent to {username}', array(
				'{username}' => YumUser::model()->findByPk($to_user_id)->username));
} else {
	echo $form->dropDownListRow($model, 'to_user_id',
			CHtml::listData(Yii::app()->user->data()->getFriends(), 'id', 'username'),
            array('hint'=>Yum::t('Only your friends are shown here'),'class'=>'span4'));
} ?>
<?php echo $form->textFieldRow($model,'title',array('size'=>45,'maxlength'=>45,'class'=>'span4')); ?>

<?php echo $form->textAreaRow($model,'message',array('rows'=>6, 'cols'=>50,'class'=>'span4')); ?>
</fieldset>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton',array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? Yum::t('Send') : Yum::t('Save')
    )
); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
