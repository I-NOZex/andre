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
<div class="large-9 medium-9 small-12 columns">
<?php echo $this->renderPartial('_checkout', array('model'=>$model)); ?>
</div>