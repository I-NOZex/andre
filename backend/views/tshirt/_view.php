<div class="view well well-small">
<?php
$img = ImagemTshirt::model()->find('IDTShirt = :id OR (IDTShirt = :id AND TipoImagem = :ti)',array(':id'=>$data->ID,':ti'=>2));
if (!empty($img)): ?>
    <div class="pull-left" style="margin-right: 10px; width: 80px;">
        <?php echo CHtml::image(CHtml::encode(Yii::app()->baseUrl.'/../../uploads/'.$img->Path.'_thumb') ,'tshirt');?>
    </div>
<?php endif; ?>

	<div style="display: inline-block; max-width: 90%;">
        	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nome')); ?>:</b>
	<?php echo CHtml::encode($data->Nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Preco')); ?>:</b>
	<?php echo CHtml::encode($data->Preco.'€'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DataEntrada')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->dateFormatter->format('dd-MM-yyyy',$data->DataEntrada)); ?>
	<br />

	</div> 
    <div class="pull-right" style="width: 42px;"> 
    <?php 
        $this->widget('bootstrap.widgets.TbButtonGroup',
        array(
          'stacked' => true,
          'size' => 'mini',
          'buttons' => array(
            array(
            'url' => array('view','id'=>	$data->ID
),
            'icon' => 'icon-eye-open',
            ),
            array(
            'url' => array('update','id'=>	$data->ID
),
            'icon' => 'icon-pencil',
            ),
          ),
        )
        );
    ?> 
    </div>
</div>