<?php
$this->breadcrumbs=array(
    'TShirts'=>array('/site'),
    'Ver Tshirt',
);
$this->pageTitle = "Tshirt \"{$model->Nome}\"";
//$this->img = Tshirt::model()->getImg($model->ID);
$imgs;
$path = '/andre/frontend/www/../../uploads/';
foreach ($model->imagem as $img){
    if ($path.$img->Path == Tshirt::model()->getImg($model->ID))
        $imgs['featured'] = $path.$img->Path;
    else
        $imgs['image'.$model->ID] = $path.$img->Path;
}
$this->img = $imgs;
$this->detail = array($model->Nome,"Preço: ".$model->Preco."€");
?>
<?php //var_dump($model->imagem[0]->getImg()); ?>
  <div class="large-9 columns">
<?php foreach(Yii::app()->user->getFlashes() as $key => $message): ?>
    <div data-alert class="alert-box radius <?php echo $key ?>">
        <?php echo $message ?>
        <?php echo CHtml::link('Ir para carrinho &rarr;',array('/site/carrinho'),
        array('class'=>'label button tinny radius',
              'style'=>'margin:0')) ?>
        <a href="#" class="close">&times;</a>
    </div>
<?php endforeach; ?>
    <div class="large-12 columns">
    <h4><?php echo $model->Nome; ?></h4>
<!--        <div class="large-6 columns"> -->
            <ul class="inline-list">
                <li><span class="label radius">Item #:</span></li>
                <li><span class="label radius secondary"><?php echo $model->ID; ?></span></li>
            </ul>
            <ul class="inline-list">
                <li><span class="label radius">Preço T-shirt:</span></li>
                <li><span class="label radius secondary"><?php echo $model->Preco; ?>€</span></li>
            </ul>
            <p><small>Portes grátis para encomendas em Portugal</small> </p>
            <hr />
            <?php $this->renderPartial('_adicionarTshirt', array('model'=>$model,'errors'=>$errors)); ?>
<!--        </div>-->
<!--        <div class="large-6 columns">

        </div>-->
      <!--</div>-->
    </div>
  </div>