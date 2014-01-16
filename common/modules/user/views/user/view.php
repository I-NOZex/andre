<?php
$profiles = Yum::hasModule('profile');

if(Yum::module()->loginType & UserModule::LOGIN_BY_EMAIL & $profiles)
$this->title = Yum::t('View user "{email}"',array(
			'{email}'=>$model->profile->email));
else
$this->title = Yum::t('View user "{username}"',array(
			'{username}'=>$model->username));

$this->breadcrumbs = array(Yum::t('Users') => array('index'), $model->username);

echo Yum::renderFlash();
$buttons = array();
if(Yii::app()->user->isAdmin()) {
$buttons[] = array('label'=>Yum::t('User administration'),'url'=>array('//user/user/admin'),'icon'=>'icon-pencil');

$buttons[] = array('label'=>Yum::t('Update User'),'url'=>array('user/update', 'id' => $model->id),'icon'=>'icon-user');
}

if(Yum::hasModule('profile'))
$buttons[] = array('label'=>Yum::t('Visit profile'),'url'=>array('//profile/profile/view', 'id' => $model->id),'icon'=>'icon-eye-open');

if(Yii::app()->user->isAdmin()) {
	$attributes = array(
			'id',
			);

	if(!Yum::module()->loginType & UserModule::LOGIN_BY_EMAIL)
		$attributes[] = 'username';

	if($profiles && $model->profile) 
		foreach(YumProfile::getProfileFields() as $field) 
			array_push($attributes, array(
						'label' => Yum::t($field),
						'type' => 'raw',
						'value' => $model->profile->getAttribute($field)
						));

	array_push($attributes,
		array(
			'name' => 'createtime',
			'value' => date(UserModule::$dateFormat,$model->createtime),
			),
		array(
			'name' => 'lastvisit',
			'value' => date(UserModule::$dateFormat,$model->lastvisit),
			),
		array(
			'name' => 'lastpasswordchange',
			'value' => date(UserModule::$dateFormat,$model->lastpasswordchange),
			),
		array(
			'name' => 'superuser',
			'value' => YumUser::itemAlias("AdminStatus",$model->superuser),
			),
		array(
			'name' => Yum::t('Activation link'),
			'value' =>$model->getActivationUrl()),
		array(
				'name' => 'status',
			'value' => YumUser::itemAlias("UserStatus",$model->status),
			)
		);

$this->beginWidget(
'bootstrap.widgets.TbBox',
array(
'title' => sprintf('Utilizador "%s"',$model->username),
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class' => 'bootstrap-widget-table'),
'headerButtons' => array(
                      array(
                      'class' => 'bootstrap.widgets.TbButtonGroup',
                      'buttons' => $buttons
                      ))
));
	$this->widget('bootstrap.widgets.TbDetailView', array(
				'data'=>$model,
				'attributes'=>$attributes,
				));
$this->endWidget();
} else {
	// For all users
	$attributes = array(
			'username',
			);

	if($profiles) {
		$profileFields = YumProfileField::model()->forAll()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				array_push($attributes,array(
							'label' => Yii::t('UserModule.user', $field->title),
							'name' => $field->varname,
							'value' => $model->profile->getAttribute($field->varname),
							));
			}
		}
	}

	array_push($attributes,
			array(
				'name' => 'createtime',
				'value' => date(UserModule::$dateFormat,$model->createtime),
				),
			array(
				'name' => 'lastvisit',
				'value' => date(UserModule::$dateFormat,$model->lastvisit),
				)
			);

	$this->widget('bootstrap.widgets.TbDetailView', array(
				'data'=>$model,
				'attributes'=>$attributes,
				));
}


if(Yum::hasModule('role') && Yii::app()->user->isAdmin()) {
	Yii::import('application.modules.role.models.*');
	echo '<h2>'.Yum::t('This user belongs to these roles:') .'</h2>';

	if($model->roles) {
		echo "<div class=\"well well-small\"> ";
        $itens = array();
		foreach($model->roles as $role) {
            $itens[] = array('label'=>$role->title,'url'=>array('//role/role/view','id'=>$role->id),'active'=>true);
		}
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
            'stacked'=>false, // whether this is a stacked menu
            'items'=>$itens,
            'htmlOptions'=>array('class'=>'no_margin'),
        ));
		echo "</div>";
	} else {
		printf('<p>%s</p>', Yum::t('None'));
	}
}
	?>
