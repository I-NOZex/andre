<div class="view well well-small">

	<div style="display: inline-block; max-width: 90%;">
        	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nome')); ?>:</b>
	<?php echo CHtml::encode($data->Nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Preco')); ?>:</b>
	<?php echo CHtml::encode($data->Preco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DataEntrada')); ?>:</b>
	<?php echo CHtml::encode($data->DataEntrada); ?>
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