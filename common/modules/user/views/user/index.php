<?php
$this->title = Yum::t('Users');
$this->breadcrumbs=array(Yum::t("Users"));
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'dataProvider'=>$dataProvider,
            'type'=>'striped',
            'htmlOptions' => array('class'=>'no_padding'),
			'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),
				array("//profile/profile/view","id"=>$data->id))',
			),
		array(
			'name' => 'createtime',
			'value' => 'date(UserModule::$dateFormat,$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => 'date(UserModule::$dateFormat,$data->lastvisit)',
		),
	),
)); ?>


