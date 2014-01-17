<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'Nova <?php echo $this->modelClass; ?>','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Gerir <?php echo $this->pluralize($this->modelClass); ?>','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1><?php echo $label; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    
    'beforeAjaxUpdate' => 'function(){
      $(".list-view").prepend(\'<div class="loading_overlay"></div>\');}',

    'afterAjaxUpdate' => 'function(){
      $(".loading_overlay").remove();}',
)); ?>
