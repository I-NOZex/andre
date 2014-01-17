<?php
$this->breadcrumbs=array(
	'Encomendas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Encomendas','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova Encomenda','url'=>array('create'),'icon'=>'plus'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('encomenda-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerir Encomendas</h1>

<p>
<?php echo Yii::t('app','Pode opcionalmente usar operadores de comparação ({operators}
ou {equal}) no início de cada um dos valores de pesquisa para especificar como a comparação deve ser feita.',
array('{operators}'=>'<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>','{equal}'=>'<b>=</b>')); ?></p>

<?php echo CHtml::link(Yii::t('app','Pesquisa Avançada'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'encomenda-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IDEncomenda',
		'IDCliente',
		'Data',
		'Total',
		'NumVisa',
		'Endereco',
		/*
		'Entregue',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
