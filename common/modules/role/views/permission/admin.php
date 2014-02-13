<?php
$this->breadcrumbs=array(
		Yum::t('Permissions')=>array('index'),
		Yum::t('Manage'),
		);

?>

<p class="title"><?php echo Yum::t('Manage permissions'); ?></p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'action-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns' => array(
				array(
					'name' => 'type',
					'value' => '$data->type',
					'filter' => array(
						'user' => Yum::t('User'),
						'role' => Yum::t('Role'),
						)
					),
				array(
					'filter' => false,
					'name' => 'principal',
					'value' => '($data->type == "user") ? @$data->principal->username : @$data->principal_role->title',
					),
				'Action.title',
				'Action.comment',
			array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template' => '{delete}',
					),
				),

			)
		); ?>
