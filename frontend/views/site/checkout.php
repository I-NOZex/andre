<?php
$this->breadcrumbs=array(
	'Carrinho'=>array('/site/carrinho'),
	'Confirmar Encomenda',
);
$this->setPageTitle('Confirmar Encomenda');
$this->menu=array(
	array('label'=>'Listar Encomendas','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Gerir Encomendas','url'=>array('admin'),'icon'=>'cog'),
);
?>
<div class="large-9 medium-9 small-12 columns">
<?php if(!Yii::app()->shoppingCart->isEmpty()): ?>
<h1>Confirmar Encomenda</h1>

    <table class=" large-12 medium-12 small-12">
        <thead>
            <tr>
                <th>Imagem</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Tamanho</th>
                <th class="text-center">Preço</th>
                <th class="text-center">Quantidade</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $positions = Yii::app()->shoppingCart->getPositions();
            foreach($positions as $position): ?>
            <?php $total += $position->getSumPrice(); ?>
            <tr>
                <td><?php echo CHtml::image(Tshirt::model()->getImg($position->ID,true)); ?></td>
                <td class="text-center"><?php echo $position->Nome; ?></td>
                <td class="text-center"><?php echo strtoupper(Yii::app()->session["tamanho[".$position->ID."]"]); ?></td>
                <td class="text-center"><?php echo $position->Preco; ?>€</td>
                <td class="text-center"><?php echo $position->getQuantity(); ?></td>
                <td class="text-right"><?php echo $position->getSumPrice(); ?>€</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr >
                <td colspan="5"></td>
                <td colspan="2">Total: <?php echo $total; ?>€</td>
            </tr>
        </tfoot>
    </table>
<?php //die(var_dump(Yii::app()->user->getId())) ?>
<?php echo $this->renderPartial('_checkout', array('model'=>$model)); ?>
<?php else: ?>
<div class="alert-box info">O seu carrinho encontra-se vazio.</div>
<?php echo CHtml::link('Proseguir para as compras &rarr;',array('/site'),array('class'=>'button tiny')); ?>
<?php endif; ?>
</div>