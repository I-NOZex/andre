<?php
$this->breadcrumbs=array(
	'Tshirts'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'Listar Tshirts','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova Tshirt','url'=>array('new'),'icon'=>'plus'),
	array('label'=>'Atualizar Tshirt','url'=>array('update','id'=>$model->ID),'icon'=>'pencil'),
	array('label'=>'Eliminar Tshirt','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?'),'icon'=>'trash'),
	array('label'=>'Gerir Tshirts','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Visualizar Tshirt #<?php echo $model->ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'Nome',
		'Preco',
		'DataEntrada',
	),
)); ?>
