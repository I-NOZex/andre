<?php
$this->pageTitle = Yum::t('Password recovery');

$this->breadcrumbs=array(
	Yum::t('Login') => Yum::module()->loginUrl,
	Yum::t('Restore'));

?>
<?php if(Yum::hasFlash()) {
echo '<div class="success">';
echo Yum::getFlash(); 
echo '</div>';
} else {
echo '<h2>'.Yum::t('Password recovery').'</h2>';
?>

<div class="form">
<fieldset>
<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
    <!--<div class="alert alert-block alert-error">-->
	<?php echo CHtml::errorSummary($form,'','',array('class'=>'alert alert-block alert-error')); ?>
	<!--</div>-->
	<div class="control-group">
		<?php echo CHtml::activeLabel($form,'login_or_email',array('class'=>'control-label required')); ?>
		<div class="controls"><?php echo CHtml::activeTextField($form,'login_or_email') ?>
		    <span class="help-inline error"><?php echo CHtml::error($form,'login_or_email'); ?></span>
		    <p class="help-block"><?php echo Yum::t("Please enter your user name or email address."); ?></p>
        </div>
	</div>
	
	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
        'type'=>'primary',
        'buttonType'=>'submit',
        'label'=>Yum::t('Restore'))); ?>
		<?php //echo CHtml::submitButton(Yum::t('Restore')); ?>
	</div>
</fieldset>
</div><!-- form -->
<?php echo CHtml::endForm(); ?>
<?php } ?>
