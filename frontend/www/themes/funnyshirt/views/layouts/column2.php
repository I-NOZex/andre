<?php $this->beginContent('//layouts/main'); ?>
    <div class="columns" style="margin-bottom: 10px;">
    <?php if(!empty($this->breadcrumbs)):?>
       <div class="box-body post-body round_corner">
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'separator'=>'',
                    'inactiveLinkTemplate'=>'<li class="current"><a href="#">{label}</a></li>',
            )); ?>
       </div><!-- breadcrumbs -->
    <?php endif ?>
    </div>
      <!-- Side Bar -->
            <div class="large-3 medium-3 small-12 columns">
            <?php if (!empty($this->img)): ?>
                <ul class="clearing-thumbs clearing-feature" data-clearing>
                <?php //die(var_dump($this->img)); ?>
                <?php foreach ($this->img as $field => $value): ?>
                    <?php if($field=="featured"):?>
            	        <li class="clearing-featured-img">
                            <a href="<?php echo $value; ?>">
                                <div>
                                <img src="<?php echo $value; ?>">
                                <span class="button tiny">Mais Imagens +</span>
                                </div>
                            </a>
                        </li>
                    <?php else: ?>
        	            <li>
                            <a href="<?php echo $value; ?>">
                                <img src="<?php echo $value; ?>_thumb">
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
           <?php else: ?>
                <img src="<?php echo Yii::app()->baseUrl?>/images/logo.png"/>
           <?php endif; ?>

              <div class="hide-for-small panel">
                <h3><?php echo $this->detail[0]; ?></h3>
                <h6 class="subheader"><?php echo $this->detail[1]; ?></h6>
              </div>
              <a href="<?php echo Yii::app()->createUrl('site/carrinho')?>">
              <div class="panel callout radius">
                <?php $items = Yii::app()->shoppingCart->getItemsCount(); ?>
                <h6> <?php echo ($items == 0) ? "Sem itens no carrinho" :
                            (($items > 1) ? "{$items} itens no seu carrinho" :
                                "{$items} item no seu carrinho" ); ?>
                </h6>
              </div>
              </a>

            </div>

        <!-- End Side Bar -->
        <!-- Thumbnails -->
            <?php echo $content; ?>
		<!-- End Thumbnails -->
<?php $this->endContent(); ?>