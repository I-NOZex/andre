<?php
$this->breadcrumbs=array(
	'Tshirts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Tshirts','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Gerir Tshirts','url'=>array('admin'),'icon'=>'cog'),
);
?>

<legend><h1>Nova Tshirt</h1></legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>