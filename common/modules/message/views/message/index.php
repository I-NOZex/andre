<?php
$this->title = Yum::t('My inbox');

$this->breadcrumbs=array(
		Yum::t('Messages')=>array('index'),
		Yum::t('My inbox'));

echo Yum::renderFlash();

echo '<p class="title">' . Yum::t('Messages') . '</p>';

$this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'yum-message-grid',
			'dataProvider' => $model->search(),
			'columns'=>array(
				array(
					'type' => 'raw',
					'name' => Yum::t('From'),
					'value' => 'CHtml::link($data->from_user->username, array(
							"//profile/profile/view",
							"id" => $data->from_user_id)
						)'
					),
				array(
					'type' => 'raw',
					'name' => Yum::t('title'),
					'value' => 'CHtml::link($data->getTitle(), array("view", "id" => $data->id))',
					),
				array(
					'name' => 'timestamp',
					'value' => '$data->getDate()',
					),
				array(
            	    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'htmlOptions'=>array('width'=>'32'),
					'template' => '{view}{delete}',
					),
				),
				)); ?>
