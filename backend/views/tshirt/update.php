<?php
$this->breadcrumbs=array(
	'Tshirts'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Tshirts','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova Tshirt','url'=>array('new'),'icon'=>'plus'),
	array('label'=>'Ver Tshirts','url'=>array('view','id'=>$model->ID),'icon'=>'eye-open'),
	array('label'=>'Gerir Tshirts','url'=>array('admin'),'icon'=>'cog'),
);
?>

<legend><h1>Atualizar Tshirt #<?php echo $model->ID; ?></h1></legend>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>