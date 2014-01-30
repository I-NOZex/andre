<?php $this->beginContent('//layouts/main'); ?>
    <?php if(!empty($this->breadcrumbs)):?>
       <div class="box-body post-body round_corner">
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
            )); ?>
       </div><!-- breadcrumbs -->
    <?php endif ?>
    
    <?php echo $content; ?>
<?php $this->endContent(); ?>