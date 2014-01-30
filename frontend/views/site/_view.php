<?php $img = CHtml::image(Tshirt::model()->getImg($data->ID),"tshirt") ?>
<div class="large-3 medium-4 small-6 columns">
    <?php echo CHtml::link($img,array('site/view','id'=>$data->ID)); ?>
    <div class="panel">
        <h5><?php echo CHtml::link($data->Nome,array('site/view','id'=>$data->ID));?></h5>
        <h6 class="subheader"><?php echo $data->Preco;?>€</h6>
    </div>
</div>