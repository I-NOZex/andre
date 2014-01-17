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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->pluralize($this->modelClass); ?>','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova <?php echo $this->modelClass; ?>','url'=>array('create'),'icon'=>'plus'),
	array('label'=>'Ver <?php echo $this->pluralize($this->modelClass); ?>','url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'icon'=>'eye-open'),
	array('label'=>'Gerir <?php echo $this->pluralize($this->modelClass); ?>','url'=>array('admin'),'icon'=>'cog'),
);
?>

<legend><h1>Atualizar <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1></legend>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>