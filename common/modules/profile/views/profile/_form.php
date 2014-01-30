<?php
if(Yum::module()->rtepath != false)
	Yii::app()->clientScript-> registerScriptFile(Yum::module()->rtepath);                                                                         
if(Yum::module()->rteadapter != false)
	Yii::app()->clientScript-> registerScriptFile(Yum::module()->rteadapter); 

if($profile)
	foreach(YumProfile::getProfileFields() as $field) {
		echo CHtml::openTag('div',array('class'=>'control-group '));

		echo CHtml::activeLabelEx($profile, $field,array('class'=>'control-label')); ?>
        <div class="controls">
		<?php echo CHtml::activeTextField($profile,
				$field); ?>
        </div>
		<?php echo CHtml::error($profile,$field,array('class'=>'help-inline error'));

		echo CHtml::closeTag('div');
	}
?>
