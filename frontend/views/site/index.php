<?php
/**
 * index.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 8:30 PM
 */
?>
<?php $this->setPageTitle('Home'); ?>
    <!-- Thumbnails -->
<div class="list-view large-9 columns">
<?php foreach(Yii::app()->user->getFlashes() as $key => $message): ?>
    <div data-alert class="alert-box radius <?php echo $key ?>">
        <?php echo $message ?>
        <a href="#" class="close">&times;</a>
    </div>
<?php endforeach; ?>
<?php
$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        'htmlOptions'=>array('class'=>'')
        )
);
?>
</div>