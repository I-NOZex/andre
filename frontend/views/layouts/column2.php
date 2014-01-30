<?php $this->beginContent('//layouts/main'); ?>
      <!-- Side Bar -->

            <div class="large-3 medium-2 small-12 columns">

              <img src="http://placehold.it/500x500&text=Logo">

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