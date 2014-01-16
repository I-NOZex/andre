<?php
$this->breadcrumbs=array(
	Yum::t('Action')=>array('index'),
	$model->title,
); ?>

<p class="title"><?php echo Yum::t('Action').' '.$model->title; ?></p>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'comment',
		'subject',
	),
)); ?>
