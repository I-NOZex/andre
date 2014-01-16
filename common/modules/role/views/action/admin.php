<?php
$this->breadcrumbs=array(
	Yum::t('Actions')=>array('index'),
	Yum::t('Manage'),
);

?>
<p class="title"><?php echo Yum::t('Manage Actions'); ?></p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'action-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'comment',
		'subject',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('width'=>'50')
		),
	),
)); ?>
