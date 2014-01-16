<?php
$this->title = Yum::t('Manage roles');

$this->breadcrumbs=array(
	Yum::t('Roles')=>array('index'),
	Yum::t('Manage'),
);

echo '<p class="title">'.Yum::t('Manage roles').'</p>';
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'title',
			'type' => 'raw',
			'value'=> 'CHtml::link(CHtml::encode($data->title),
				array("//role/role/view","id"=>$data->id))',
		),
		'price',
		'membership_priority',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('width'=>'50')
		),
	),
)); ?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton',array(
        'label' => Yum::t('Create new role'),
        //'size'=>'small',
        'icon'=>'icon-plus',
        'url'=>array('//role/role/create')
        ));  ?>
</div>