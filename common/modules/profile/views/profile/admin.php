<?php
echo '<p class="title">'.Yum::t('Manage profiles').'</p>'; 

$columns = YumProfile::getProfileFields();
 $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'profiles-grid',
			'dataProvider'=>$dataProvider,
			'filter'=>null,
			'columns'=> array_merge($columns,array('class'=>'bootstrap.widgets.TbButtonColumn'))
			)
);
 ?>


