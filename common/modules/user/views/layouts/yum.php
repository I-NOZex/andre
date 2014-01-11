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

Yum::renderFlash();
echo '<div class="container-fluid no_padding">';

if(!Yii::app()->user->isGuest){
echo '<div class="span-7 no_margin">';
    echo '<div class="well" style="padding: 8px 0;">';
	echo $this->renderMenu();
    echo '</div>';
echo '</div>';
}
echo '<div class="span-20 last">';
echo '<div id="content"> ';
echo $content;
echo '</div>';
echo '</div>';

echo '</div>';
?>


<?php $this->endContent(); ?>
