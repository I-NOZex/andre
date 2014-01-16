<div class="view well well-small" style="float: left;margin-right: 10px;">
<h3 class="no_margin">
<?php echo CHtml::link($data->getAvatar(true), array(
			'//avatar/avatar/editAvatar', 'id' => $data->id)); ?> 
<?php echo CHtml::link($data->username, array(
			'//avatar/avatar/editAvatar', 'id' => $data->id)); ?>
</h3>
</div>
