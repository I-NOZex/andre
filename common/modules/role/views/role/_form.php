<div class="form">
<fieldset>
    <legend><?php echo Yum::t('Create role'); ?></legend>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
array('id' => 'horizontalForm',
'type' => 'horizontal')); ?>

<div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'title',array('class'=>'span5')); ?>

<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50,'class'=>'span5')); ?>

<?php if(Yum::hasModule('membership')) {
    $hint = Yum::t('Leave empty or set to 0 to disable membership for this role.');
    $hint .= '<br />'.Yum::t('Set to >0 to enable membership for this role and set a priority.');
    $hint .= '<br />'.Yum::t('Higher is usually more worthy. This is used to determine downgrade possibilities.');
    echo $form->textFieldRow($model, 'membership_priority',array('hint' =>$hint,'class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model, 'price',
    array('hint' =>Yum::t('How expensive is a membership? Set to 0 to disable membership for this role'),'class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model, 'duration',
    array('hint' =>Yum::t('How many days will the membership be valid after payment?'),'class'=>'span5')); ?>

    <div style="clear: both;"> </div>
<?php } ?>

</fieldset>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton',array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? Yum::t('Create role') : Yum::t('Save role')
    )
); ?>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

