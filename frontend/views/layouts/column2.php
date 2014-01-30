<?php $this->beginContent('//layouts/main'); ?>
      <!-- Side Bar -->

            <div class="large-3 medium-2 small-12 columns">
                <ul class="clearing-thumbs clearing-feature" data-clearing>
        	        <li class="clearing-featured-img"><a href="http://placehold.it/500x500&text=Logo"><img data-caption="caption here..." src="http://placehold.it/500x500&text=Logo"></a></li>
        	        <li><a href="http://placehold.it/200x200&text=[img]"><img data-caption="caption here..." src="http://placehold.it/100x100&text=[img]"></a></li>
        	        <li><a href="http://placehold.it/200x200&text=[img]"><img data-caption="caption here..." src="http://placehold.it/100x100&text=[img]"></a></li>
                </ul>
                <div class="clearing-assembled"><div class=""><a class="clearing-close" href="#">×</a><div style="display: none;" class="visible-img"><img alt="" src="http://placehold.it/500x500&amp;text=Logo" style="visibility: visible; margin-left: -143px; margin-top: -143px;"><p class="clearing-caption">caption here...</p><a class="clearing-main-prev disabled" href="#"><span></span></a><a class="clearing-main-next" href="#"><span></span></a></div><div class="carousel"><ul data-clearing="" class="clearing-thumbs clearing-feature" style="">
        	        <li class="clearing-featured-img visible"><a href="http://placehold.it/500x500&amp;text=Logo"><img src="http://placehold.it/500x500&amp;text=Logo" data-caption="caption here..."></a></li>
        	        <li><a href="http://placehold.it/200x200&amp;text=[img]"><img src="http://placehold.it/100x100&amp;text=[img]" data-caption="caption here..."></a></li>
        	        <li><a href="http://placehold.it/200x200&amp;text=[img]"><img src="http://placehold.it/100x100&amp;text=[img]" data-caption="caption here..."></a></li>
                </ul></div></div></div>


              <div class="hide-for-small panel">
                <h3>Header</h3>
                <h5 class="subheader">Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis.
                </h5>
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
	<div class="large-8 columns">
        <!-- Thumbnails -->
		<div class="row">
            <?php echo $content; ?>
		</div>
		<!-- End Thumbnails -->
	</div>
<?php $this->endContent(); ?>