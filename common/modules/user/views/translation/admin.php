<?php
$this->title = Yum::t('Manage Translations');

$this->breadcrumbs=array(
		Yum::t('Translation')=>array('admin'),
		Yum::t('Manage'),
		);
?>

<p class="title"><?php echo Yum::t('Manage Translations'); ?> </p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'category-grid',
			'dataProvider'=> (!$untranslated) ? $model->search() : $model->untranslated($untranslated),
    			'filter'=>$model,
			'columns'=>array(
				array('name' => 'language',
					'filter' => Yum::getAvailableLanguages(),
					),
				array('name' => 'message',
					'type' => 'raw'),
				array('name' => 'category',
					'type' => 'raw'),
				array('name' => 'translation',
					'type' => 'raw'),
				array(
            	    'class'=>'bootstrap.widgets.TbButtonColumn',
					'template' => '{update}',
					'updateButtonUrl'=>'Yii::app()->controller->createUrl("update", array(
							"message" => urlencode($data->message),
							"category" => urlencode($data->category),
							"language" => urlencode($data->language),
                            "returnUrl" => urlencode(Yii::app()->request->requestUri)))',
					),
				),
			)); ?>
<div class="form-actions btn-toolbar">
<?php $this->widget('bootstrap.widgets.TbButton',array(
        'icon' => 'plus',
        'label' => Yum::t('Create new Translation'),
        'url' => array('create'),
    )); ?>
<?php
$buttons = array();
$langs = Yum::getAvailableLanguages();
foreach($langs as $lang)
    $buttons[] = array('label'=>$lang, 'url'=>array('//user/translation/admin','lang'=>$lang));

$this->widget('bootstrap.widgets.TbButtonGroup', array(
    'htmlOptions' => array('class' => 'dropup'),
    'buttons'=>array(
        array('label' => !$untranslated ? Yum::t('Untranslated') : Yum::t('All Translations'),
            'url' => !$untranslated ? "javascript:$('a#yw3.btn').trigger('click'); void(0);" : array('//user/translation/admin'), 'icon' => 'flag'),
        array('items' => $buttons, 'htmlOptions' => array('style'=>'height: 20px'))
    ))); ?>
</div>