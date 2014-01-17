<div class="view well well-small">

	<div style="display: inline-block; max-width: 90%;">
        	<b><?php echo CHtml::encode($data->getAttributeLabel('IDEncomenda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDEncomenda),array('view','id'=>$data->IDEncomenda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDCliente')); ?>:</b>
	<?php echo CHtml::encode($data->IDCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Data')); ?>:</b>
	<?php echo CHtml::encode($data->Data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Total')); ?>:</b>
	<?php echo CHtml::encode($data->Total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumVisa')); ?>:</b>
	<?php echo CHtml::encode($data->NumVisa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Endereco')); ?>:</b>
	<?php echo CHtml::encode($data->Endereco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Entregue')); ?>:</b>
	<?php echo CHtml::encode($data->Entregue); ?>
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
            'url' => array('view','id'=>	$data->IDEncomenda
),
            'icon' => 'icon-eye-open',
            ),
            array(
            'url' => array('update','id'=>	$data->IDEncomenda
),
            'icon' => 'icon-pencil',
            ),
          ),
        )
        );
    ?> 
    </div>
</div>