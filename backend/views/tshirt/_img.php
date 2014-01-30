<div class="span1 well well-small">

    <?php echo CHtml::image(CHtml::encode(Yii::app()->baseUrl.'/../../uploads/'.$data->Path.'_thumb'),'tshirt') ?>
    <?php /*$this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Zoom',
    'icon' => 'zoom-in white',
    'type' => 'primary',
    'size' => 'small',
    //'url' => 'fullsizeimage',
    'htmlOptions' => array(
        'data-toggle' => 'modal',
        'class' => 'btn_zoom',
        'data-target' => '#myModal',
        'data-img-url' => CHtml::encode(Yii::app()->baseUrl.'/../../uploads/'.$data->Path),
    ),
    )
    );*/
?>
<?php
$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'stacked' => true,
        'size' => 'small',
        'buttons' => array(
            array(
                'buttonType' => 'button',
                'label' => 'Zoom',
                'icon' => 'zoom-in white',
                'type' => 'primary',
                'size' => 'small',
                //'url' => 'fullsizeimage',
                'htmlOptions' => array(
                    'data-toggle' => 'modal',
                    'class' => 'btn_zoom',
                    'data-target' => '#myModal',
                    'data-img-url' => CHtml::encode(Yii::app()->baseUrl.'/../../uploads/'.$data->Path),
                ),
            ),
            array(
                'buttonType' => 'button',
                'label' => 'Apagar',
                'icon' => 'remove white',
                'type' => 'danger',
                'size' => 'small',
                //'url' => array('/ImagemTshirt/delete',array('ID'=>$data->ID)),
                'htmlOptions' => array(
                    'submit'=>array('/ImagemTshirt/delete','id'=>$data->ID),
                    'confirm'=>'Are you sure you want to delete this item?',
                    //'data-toggle' => 'modal',
                    //'class' => 'btn_zoom',
                    //'data-target' => '#myModal',
                    //'data-img-url' => CHtml::encode(Yii::app()->baseUrl.'/../../uploads/'.$data->Path),
                ),
            ),
        ),
    )
);
?>
</div>
