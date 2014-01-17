<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<div class="view well well-small">

	<div style="display: inline-block; max-width: 90%;">
        <?php
        echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:</b>\n";
        echo "\t<?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}),array('view','id'=>\$data->{$this->tableSchema->primaryKey})); ?>\n\t<br />\n\n";
        $count=0;
        foreach($this->tableSchema->columns as $column)
        {
        	if($column->isPrimaryKey)
        		continue;
        	if(++$count==7)
        		echo "\t<?php /*\n";
        	echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";
        	echo "\t<?php echo CHtml::encode(\$data->{$column->name}); ?>\n\t<br />\n\n";
        }
        if($count>=7)
        	echo "\t*/ ?>\n";
        ?>
	</div> 
    <div class="pull-right" style="width: 42px;"> 
    <?php echo "<?php"; ?> 
        $this->widget('bootstrap.widgets.TbButtonGroup',
        array(
          'stacked' => true,
          'size' => 'mini',
          'buttons' => array(
            array(
            'url' => array('view','id'=><?php echo "\t\$data->{$this->tableSchema->primaryKey}\n" ?>),
            'icon' => 'icon-eye-open',
            ),
            array(
            'url' => array('update','id'=><?php echo "\t\$data->{$this->tableSchema->primaryKey}\n" ?>),
            'icon' => 'icon-pencil',
            ),
          ),
        )
        );
    <?php echo "?>"; ?> 
    </div>
</div>