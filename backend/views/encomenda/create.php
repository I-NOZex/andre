<?php
$this->breadcrumbs=array(
	'Encomendas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Encomendas','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Gerir Encomendas','url'=>array('admin'),'icon'=>'cog'),
);
?>

<legend><h1>Nova Encomenda</h1></legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>