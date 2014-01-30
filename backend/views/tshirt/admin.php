<?php
$this->breadcrumbs=array(
	'Tshirts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Tshirts','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova Tshirt','url'=>array('new'),'icon'=>'plus'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tshirt-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerir Tshirts</h1>

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
	'id'=>'tshirt-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'afterAjaxUpdate'=>"function(){jQuery('#DataEntrada_s').bdatepicker({'language':'pt','format':'dd-mm-yyyy','weekStart':1});}",
	'columns'=>array(
        array(
            'class'=>'bootstrap.widgets.TbImageColumn',
            'imagePathExpression'=>'Yii::app()->baseUrl."/../../uploads/".$data->imagem[0]->Path."_thumb"',
            'usePlaceKitten'=>false,
            'usePlaceHoldIt'=>true,
            'imageOptions' => array('style'=>'max-width: 50px')
        ),
		'ID',
		'Nome',
        array(
            'name'=>'Preco',
            'value'=> '$data->Preco."€"'
        ),
        array(
            'name' => 'DataEntrada',
            'type' => 'raw',
            'value'=>'Yii::app()->dateFormatter->format("dd-MM-yyyy",$data->DataEntrada)' ,
            'filter'=>$this->widget('bootstrap.widgets.TbDatepicker', array(
                'model'=>$model,
                'attribute'=>'DataEntrada',
                'htmlOptions' => array(
                    'id' => 'DataEntrada_s'
                ),
                'options' => array(
                    'language' => 'pt',
                    'format' => 'dd-mm-yyyy',
                    'weekStart' => '1'
                ),
            ),true)
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>