<div class="form">
<fieldset>
    <legend><?php echo Yum::t('Create permission'); ?></legend>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'permission-create-form',
	'enableAjaxValidation'=>true,
    'type' => 'horizontal'
)); ?>

	<div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->radioButtonListInlineRow($model, 'type', array(
				'user' => Yum::t('User'),
				'role' => Yum::t('Role')),
                array('hint' => Yum::t('Do you want to grant this permission to a user or a role'))
                ); ?>

	<div id="assignment_user">
        <div class="control-group">
        	<?php echo $form->labelEx($model,'principal_id',array('class'=>'control-label')); ?>
        	<div class="controls"><?php $this->widget('Relation', array(
        				'model' => $model,
        				'relation' => 'principal',
        				'fields' => 'username',
        				));?>
        	<?php echo $form->error($model,'principal_id',array('class'=>'help-inline error')); ?></div>
        </div>

        <div class="control-group">
    		<?php echo $form->labelEx($model,'subordinate_id',array('class'=>'control-label')); ?>
    		<div class="controls"><?php $this->widget('Relation', array(
    					'model' => $model,
    					'allowEmpty' => true,
    					'relation' => 'subordinate',
    					'fields' => 'username',
    					));?>
    		<?php echo $form->error($model,'subordinate_id'); ?></div>
        </div>

		<?php echo $form->dropDownListRow($model,'template', array(
					'0' => Yum::t('No'),
					'1' => Yum::t('Yes'),
					)); ?>
	</div>



	<div id="assignment_role" style="display: none;">
        <div class="control-group">
    	<?php echo $form->labelEx($model,'principal_id',array('class'=>'control-label')); ?>
        	<div class="controls"><?php $this->widget('Relation', array(
        				'model' => $model,
        				'relation' => 'principal_role',
        				'fields' => 'title',
                        'htmlOptions' => array('disabled' => 'disabled')
        				));?>
        	<?php echo $form->error($model,'principal_id'); ?></div>
        </div>

        <div class="control-group">
    		<?php echo $form->labelEx($model,'subordinate_id',array('class'=>'control-label')); ?>
        		<div class="controls"><?php $this->widget('Relation', array(
        					'model' => $model,
        					'allowEmpty' => true,
        					'relation' => 'subordinate_role',
        					'fields' => 'title',
                            'htmlOptions' => array('disabled' => 'disabled')
        					));?>
        		<?php echo $form->error($model,'subordinate_id'); ?></div>
        </div>
    </div>

    <div class="control-group">
    		<?php echo $form->labelEx($model,'action',array('class'=>'control-label')); ?>
        		<div class="controls"><?php $this->widget('Relation', array(
        					'model' => $model,
        					'relation' => 'Action',
        					'fields' => 'title',
        					));?>
        	<?php echo $form->error($model,'action'); ?></div>
    </div>

    		<?php echo $form->textAreaRow($model,'comment'); ?>

</fieldset>

<div class="form-actions">
<?php $this->widget(
'bootstrap.widgets.TbButton',
array(
'buttonType' => 'submit',
'type' => 'primary',
'label' => Yum::t('Submit')
)
); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php Yii::app()->clientScript->registerScript('type', "
$('#YumPermission_type_0').click(function() {
$('#assignment_role').hide();
$('#assignment_role #ytYumPermission_type,#assignment_role #YumPermission_principal_id,#assignment_role #YumPermission_subordinate_id').prop( 'disabled', true );
$('#assignment_user #ytYumPermission_type,#assignment_user #YumPermission_principal_id,#assignment_user #YumPermission_subordinate_id').prop( 'disabled', false );
$('#assignment_user').show();

});

$('#YumPermission_type_1').click(function() {
$('#assignment_role #ytYumPermission_type,#assignment_role #YumPermission_principal_id,#assignment_role #YumPermission_subordinate_id').prop( 'disabled', false );
$('#assignment_role').show();
$('#assignment_user #ytYumPermission_type,#assignment_user #YumPermission_principal_id,#assignment_user #YumPermission_subordinate_id').prop( 'disabled', true );
$('#assignment_user').hide();
});

");
