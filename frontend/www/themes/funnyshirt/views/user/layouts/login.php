<?php
Yii::app()->clientScript->registerCssFile(
		Yii::app()->getAssetManager()->publish(
			Yii::getPathOfAlias('YumModule.assets.css').'/yum.css'));

$this->beginContent(Yum::module()->baseLayout); ?>
<div class="container-fluid no_padding" id="content">
<?php
if (Yum::module()->debug) {
	echo CHtml::openTag('div', array('class' => 'yumwarning'));
	echo Yum::t(
			'You are running the Yii User Management Module {version} in Debug Mode!', array(
				'{version}' => Yum::module()->version));
	echo CHtml::closeTag('div');
}

 Yum::renderFlash();

	echo $content;  
?>
</div>
<?php $this->endContent(); ?>