<?php
$this->breadcrumbs=array(
	'Encomendas'=>array('index'),
	$model->IDEncomenda,
);

$this->menu=array(
	array('label'=>'Listar Encomendas','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova Encomenda','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Atualizar Encomenda','url'=>array('update','id'=>$model->IDEncomenda),'icon'=>'pencil'),
	array('label'=>'Eliminar Encomenda','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDEncomenda),'confirm'=>'Are you sure you want to delete this item?'),'icon'=>'trash'),
	array('label'=>'Gerir Encomendas','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Visualizar Encomenda #<?php echo $model->IDEncomenda; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDEncomenda',
		'IDCliente',
		'Data',
		'Total',
		'NumVisa',
		'Endereco',
		'Entregue',
	),
)); ?>
