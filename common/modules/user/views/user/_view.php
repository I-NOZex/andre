<?php
/*<div class="tooltip" id="tooltip_<?php echo $data->id; ?>">
	<?php $this->renderPartial('_tooltip', array('data' =>  $data)); ?>
</div>*/
?>

<div class="<?php echo (empty($widget->viewData['cssclass'])) ? $cssclass : $widget->viewData['cssclass']; ?>" id="user_<?php echo $data->id;?>">

<?php
$online = '';
if(Yum::hasModule('profile') && Yum::module('profile')->enablePrivacySetting) {
	if($data->privacy && $data->privacy->show_online_status) {
		if($data->isOnline()) {
			$online .= CHtml::image(Yum::register('images/green_button.png'));
		}
	}
}

?>

<?php printf('<h3>%s %s %s</h3>', CHtml::link($data->getAvatar(true),
		array('//profile/profile/view', 'id' => $data->id)), $data->username, $online); ?>

</div>

<div class="popover fade top in" id="tooltip_<?php echo $data->id; ?>">
	<div class="arrow"></div>
	<h3 class="popover-title"><?php echo $data->username; ?></h3>
	<div class="popover-content"><?php $this->renderPartial('_tooltip', array('data' =>  $data)); ?></div>
</div>

<?php
Yii::app()->clientScript->registerScript('tooltip_'.$data->id, "
$('#user_{$data->id}').tooltip({
'position': 'top center',
//'offset': [-20, -275],
'tip': '#tooltip_{$data->id}',
'fadeInSpeed': 250,
'fadeOutSpeed': 150,
'effect':'fade'
}); 
");
?>

