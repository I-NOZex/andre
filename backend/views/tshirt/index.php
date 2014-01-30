<?php
$this->breadcrumbs=array(
	'Tshirts',
);

$this->menu=array(
	array('label'=>'Nova Tshirt','url'=>array('new'),'icon'=>'plus'),
	array('label'=>'Gerir Tshirts','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Tshirts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',

    'beforeAjaxUpdate' => 'function(){
      $(".list-view").prepend(\'<div class="loading_overlay"></div>\');}',

    'afterAjaxUpdate' => 'function(){
      $(".loading_overlay").remove();}',
)); ?>
