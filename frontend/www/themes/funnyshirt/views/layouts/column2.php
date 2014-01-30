<?php $this->beginContent('//layouts/main'); ?>
      <!-- Side Bar -->

            <div class="large-3 medium-2 small-12 columns">
            <?php if (!empty($this->img)): ?>
                <ul class="clearing-thumbs clearing-feature" data-clearing>
                <?php //foreach ($this->img as $value): ?>
                <?php //var_dump($field);?>=>
                <?php //var_dump($value);?><hr />
        	        <li class="clearing-featured-img"><a href="http://placehold.it/500x500&text=Logo"><span class="button tiny">Mais Imagens +</span><img data-caption="caption here..." src="<?php echo $this->img; ?>"></a></li>
        	        <li><a href="http://placehold.it/200x200&text=[img]"><img data-caption="caption here..." src="http://placehold.it/100x100&text=[img]"></a></li>
        	        <li><a href="http://placehold.it/200x200&text=[img]"><img data-caption="caption here..." src="http://placehold.it/100x100&text=[img]"></a></li>
                <?php //endforeach; ?>
                </ul>
           <?php else: ?>
                <img src="http://placehold.it/500x500&text=Logo"/>
           <?php endif; ?>

              <div class="hide-for-small panel">
                <h3><?php echo $this->detail[0]; ?></h3>
                <h6 class="subheader"><?php echo $this->detail[1]; ?></h6>
              </div>

              <a href="#">
              <div class="panel callout radius">
                <h6>99  items in your cart</h6>
              </div>
              </a>

            </div>

        <!-- End Side Bar -->
    <?php if(!empty($this->breadcrumbs)):?>
       <div class="box-body post-body round_corner">
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
            )); ?>
       </div><!-- breadcrumbs -->
    <?php endif ?>
        <!-- Thumbnails -->
            <?php echo $content; ?>
		<!-- End Thumbnails -->
<?php $this->endContent(); ?>