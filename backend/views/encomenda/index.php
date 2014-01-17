<?php
$this->breadcrumbs=array(
	'Encomendas',
);

$this->menu=array(
	array('label'=>'Nova Encomenda','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Gerir Encomendas','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Encomendas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    
    'beforeAjaxUpdate' => 'function(){
      $(".list-view").prepend(\'<div class="loading_overlay"></div>\');}',

    'afterAjaxUpdate' => 'function(){
      $(".loading_overlay").remove();}',
)); ?>
