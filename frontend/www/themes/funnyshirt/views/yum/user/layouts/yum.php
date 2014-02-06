<?php
Yii::app()->clientScript->registerCssFile(
		Yii::app()->getAssetManager()->publish(
			Yii::getPathOfAlias('YumModule.assets.css').'/yum.css'));

$this->beginContent(Yum::module()->baseLayout); ?>

<?php
if (Yum::module()->debug) {
	echo CHtml::openTag('div', array('class' => 'yumwarning'));
	echo Yum::t(
			'You are running the Yii User Management Module {version} in Debug Mode!', array(
				'{version}' => Yum::module()->version));
	echo CHtml::closeTag('div');
}

Yum::renderFlash(); ?>
<div class="large-12 medium-12 small-12 columns">
<?php echo $content; ?>
</div>

<?php $this->endContent(); ?>
