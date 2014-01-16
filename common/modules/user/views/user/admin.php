<?php
$this->title = Yum::t('Manage users');

$this->breadcrumbs = array(
		Yum::t('Users'),
		Yum::t('Manage'));

echo Yum::renderFlash();

echo '<p class="title">'.Yum::t('Manage users').'</p>';

$columns = array(
		array(
			'name'=>'id',
			'filter' => false,
			'type'=>'raw',
			'value'=>'CHtml::link($data->id,
				array("//user/user/update","id"=>$data->id))',
			),
		array(
			'name'=>'username',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->username),
				array("//user/user/view","id"=>$data->id))',
			),
		);

$columns[] = array(
		'header' => Yum::t(Yum::module('profile')->gridColumns[0]),
		'filter' => CHtml::textField('YumProfile["email"]', $profile->email),
		'name' => 'profile.'.Yum::module('profile')->gridColumns[0],
		);

$columns[] = array(
		'name'=>'createtime',
		'filter' => false,
		'value'=>'date(UserModule::$dateFormat,$data->createtime)',
		);
$columns[] = array(
		'name'=>'lastvisit',
		'filter' => false,
		'value'=>'date(UserModule::$dateFormat,$data->lastvisit)',
		);
$columns[] = array(
		'name'=>'status',
		'filter' => array(
			'0' => Yum::t('Not active'),
			'1' => Yum::t('Active'),
			'-1' => Yum::t('Banned'),
			'-2' => Yum::t('Deleted')),
		'value'=>'YumUser::itemAlias("UserStatus",$data->status)',
		);
$columns[] = array(
		'name'=>'superuser',
		'filter' => array(0 => Yum::t('No'), 1 => Yum::t('Yes')),
		'value'=>'YumUser::itemAlias("AdminStatus",$data->superuser)',
		);

$columns[] = array(
		'name'=>Yum::t('Roles'),
		'type' => 'raw',
		'visible' => Yum::hasModule('role'),
		'filter' => false,
		'value'=>'$data->getRoles()',
		);

$columns[] = array('class'=>'bootstrap.widgets.TbButtonColumn','htmlOptions'=>array('width'=>'50'));

$this->widget('bootstrap.widgets.TbGridView',array(
			'dataProvider'=>$model->search(),
			'filter' => $model,
			'columns'=>$columns,
            'responsiveTable'=>true,
            'type'=>'striped condensed',
			)
		); ?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton',array(
        'label' => Yum::t('Create new User'),
        //'size'=>'small',
        'icon'=>'icon-plus',
        'url'=>array('//user/user/create')
        ));  ?>
</div>