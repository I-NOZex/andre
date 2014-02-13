<?php
$this->breadcrumbs=array(
	'Encomendas'=>array('index'),
	$model->IDEncomenda,
);

$this->menu=array(
	array('label'=>'Listar Encomendas','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Atualizar Encomenda','url'=>array('update','id'=>$model->IDEncomenda),'icon'=>'pencil'),
	array('label'=>'Eliminar Encomenda','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDEncomenda),'confirm'=>'Are you sure you want to delete this item?'),'icon'=>'trash'),
	array('label'=>'Gerir Encomendas','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Visualizar Encomenda #<?php echo $model->IDEncomenda; ?></h1>

<?php
$fields = array();
//var_dump($model->linhaencomendas);
//die;
foreach($model->linhaencomendas as $item){
$fields[] =   array(
        'value'=>'<hr/>',
        'type'=>'raw',
    );
$fields[] =   array(
        'label'=>$item->getAttributeLabel('IDLinhaEncomenda'),
        'value'=>$item->IDLinhaEncomenda,
    );
$fields[] =   array(
        'label'=>$item->getAttributeLabel('IDTShirt'),
        'value'=>$item->IDTShirt,
    );
$fields[] =   array(
        'label'=>$item->getAttributeLabel('PrecoUn'),
        'value'=>$item->PrecoUn,
    );
$fields[] =   array(
        'label'=>$item->getAttributeLabel('Quantidade'),
        'value'=>$item->Quantidade,
    );
$fields[] =   array(
        'label'=>$item->getAttributeLabel('Tamanho'),
        'value'=>$item->Tamanho,
    );
}
?>
<?php //die(var_dump($fields)) ?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=> array_merge(array(
		'IDEncomenda',
		'IDCliente',
		'Data',
		'Total',
		'NumVisa',
		'Endereco',
		'Entregue',
    ),$fields)
)); ?>
