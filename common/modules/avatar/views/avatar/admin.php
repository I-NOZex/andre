<?php $this->title = Yum::t('Avatar administration');

$this->breadcrumbs = array(
	Yum::t('Users') => array('admin'),
	Yum::t('Avatars'));

echo '<p class="title">'.Yum::t('Avatar administration').'</p>';

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'sortableAttributes' => array('username', 'createtime', 'status', 'lastvisit', 'avatar'),
	'itemView' => '_view',
)); ?>


