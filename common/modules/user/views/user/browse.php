<?php
$this->title = Yum::t('Browse users');
$this->breadcrumbs=array(Yum::t('Browse users'));

Yum::register('js/tooltip.min.js');
Yum::register('css/yum.css');
?>
<div class="search_options">

<?php echo CHtml::beginForm('','POST',array('class'=>'well well-small')); ?>

<div class="input-prepend input-append no_margin">
    <span class="add-on"><i class="icon-search"></i></span>
    <?php echo CHtml::textField('search_username',
    		$search_username, array('submit' => array('//user/user/browse'),'placeholder'=>Yum::t('Search for username'))); ?>
    <?php echo CHtml::submitButton(Yum::t('Search'),array('class'=>'btn','style'=>'height: 30px;')); ?>
</div>

<?php
echo CHtml::endForm();

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'viewData'=>array('cssclass'=>'span4 well well-small'),
    'itemsCssClass'=>'items row-fluid',
		'template' => '{summary} {sorter} {items} <div style="clear:both;"></div> {pager}',
    'sortableAttributes'=>array(
        'username',
        'lastvisit',
    ),
));

?>

</div>

<div style="clear: both;"> </div>


