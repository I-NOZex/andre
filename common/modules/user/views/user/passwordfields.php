<?php if(Yum::module()->enablepStrength) {
Yum::register('js/pStrength.jquery.js'); 
Yii::app()->clientScript->registerScript('', "
	$('#YumUserChangePassword_password').pStrength({
		'onPasswordStrengthChanged' : function(passwordStrength, percentage) {
		$('#password-strength').html('".Yum::t('Password strength').":' + percentage + '%');
		},
});
");
}
?>

<div class="control-group">
<?php echo CHtml::activeLabelEx($form,'password',array('class'=>'control-label')); ?>
<div class="controls"><?php echo CHtml::activePasswordField($form,'password'); ?>
<?php if(Yum::module()->displayPasswordStrength) { ?>
<div id="password-strength"></div>
<?php } ?>
<hr class="no_margin"/>
<?php if(isset($help)){ ?>
<p class="help-block"> Leave password <em> empty </em> to <?php echo $help; ?></p>
<?php } ?>
</div>
</div>


<div class="control-group">
<?php echo CHtml::activeLabelEx($form,'verifyPassword',array('class'=>'control-label')); ?>
<div class="controls"><?php echo CHtml::activePasswordField($form,'verifyPassword'); ?></div>
</div>

