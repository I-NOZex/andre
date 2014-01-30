<?php
/**
 * index.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 8:30 PM
 */
?>

    <!-- Thumbnails -->


<?php
$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        'htmlOptions'=>array('class'=>'list-view large-9 columns')
        )
);
?>