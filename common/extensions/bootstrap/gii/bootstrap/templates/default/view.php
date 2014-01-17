<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->pluralize($this->modelClass); ?>','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova <?php echo $this->modelClass; ?>','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Atualizar <?php echo $this->modelClass; ?>','url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'icon'=>'pencil'),
	array('label'=>'Eliminar <?php echo $this->modelClass; ?>','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Are you sure you want to delete this item?'),'icon'=>'trash'),
	array('label'=>'Gerir <?php echo $this->pluralize($this->modelClass); ?>','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Visualizar <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
