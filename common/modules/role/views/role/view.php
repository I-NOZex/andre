<?php
$this->title = Yum::t('{role}', array(
			'{role}' => $model->title));

$this->breadcrumbs=array(
	Yum::t('Roles')=>array('index'),
	Yum::t('View'),
	$model->title
); ?>

<p class="title"> <?php echo Yum::t('View Role'); ?></p>

<?php if( !empty($model->description)) echo '<div class="alert alert-info"><i>'.$model->description.'</i></div>'; ?>

<div class="label label-info"><?php echo Yum::t('These users have been assigned to this role'); ?></div>

<?php 
if($assignedUsers);
$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$assignedUsers,
    'columns'=>array(
        'username',          
        'status',          
    ),
));
?>
<br />

<?php
if(Yum::hasModule('membership') && $model->membership_priority) {
		echo Yum::t('Membership priority') . ': '. $model->membership_priority . '<br />';
		echo Yum::t('Membership price') . ': '. $model->price . '<br />';
		echo Yum::t('Membership duration') . ': '. $model->duration . '<br />';

		echo Yum::p('These users have a ordered memberships of this role'); 

		if($activeMemberships)
			$this->widget('bootstrap.widgets.TbGridView', array(
						'dataProvider'=>$activeMemberships,
						'columns'=>array(
							'id',
							'user.username',
							array(
								'name'=>'order_date',
								'value' =>'date("Y. m. d G:i:s", $data->order_date)'),
							array(
								'name'=>'end_date',
								'value' =>'date("Y. m. d G:i:s", $data->end_date)'),
							array(
								'name'=>'payment_date',
								'value' =>'date("Y. m. d G:i:s", $data->payment_date)'),
							'role.price',
							'payment.title',
							),
						));

	}

if(Yii::app()->user->isAdmin()){ ?>
<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton',array(
        'htmlOptions' => array('submit' => array('role/update', 'id' => $model->id)),
        'type' => 'primary',
        'buttonType' => 'button',
        'label' => Yum::t('Update role')
    )
); ?>
</div>
<?php } ?>
