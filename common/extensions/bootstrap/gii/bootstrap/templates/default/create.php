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
	'$label'=>array('index'),
	'Create',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->pluralize($this->modelClass); ?>','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Gerir <?php echo $this->pluralize($this->modelClass); ?>','url'=>array('admin'),'icon'=>'cog'),
);
?>

<legend><h1>Nova <?php echo $this->modelClass; ?></h1></legend>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
