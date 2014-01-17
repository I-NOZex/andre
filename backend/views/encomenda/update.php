<?php
$this->breadcrumbs=array(
	'Encomendas'=>array('index'),
	$model->IDEncomenda=>array('view','id'=>$model->IDEncomenda),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Encomendas','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova Encomenda','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Ver Encomendas','url'=>array('view','id'=>$model->IDEncomenda),'icon'=>'eye-open'),
	array('label'=>'Gerir Encomendas','url'=>array('admin'),'icon'=>'cog'),
);
?>

<legend><h1>Atualizar Encomenda #<?php echo $model->IDEncomenda; ?></h1></legend>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>