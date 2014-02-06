<div class="large-9 medium-9 small-12 columns">
<h4>Artigos em Carrinho</h4>
<?php if($errors): ?>
<div data-alert class="alert-box alert radius">
    <ul class="no-bullet" style="margin: 0">
    <?php foreach($errors as $error): ?>
      <?php foreach($error as $e): ?>
        <li><?php echo $e; ?></li>
      <?php endforeach; ?>
    <?php endforeach; ?>
    </ul>
  <a href="#" class="close">&times;</a>
</div>
<?php endif; ?>
    <table class=" large-12 medium-12 small-12">
        <thead>
            <tr>
                <th>Imagem</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Tamanho</th>
                <th class="text-center">Preço</th>
                <th class="text-center">Quantidade</th>
                <th class="text-right">Total</th>
                <th width="20"></th>
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
                <td class="text-center">
                    <form name="updt" id="updt"<?php echo $position->ID ?> action="<?php echo Yii::app()->createUrl('/site/atualizarArtigo',
                                                                                        array('id'=>$position->ID));?>" method="POST">
                    <?php echo CHtml::textField('quantidade',$position->getQuantity(),array("pattern"=>"number",'required'=>'required','id'=>'qt')); ?>
                    </form>
                </td>
                <td class="text-right"><?php echo $position->getSumPrice(); ?>€</td>
                <td>
                    <?php echo CHtml::link('<b>Remover</b>',array('/site/removerArtigo','id'=>$position->ID),
                                            array(
                                                'class'=>'button tiny alert',
                                                'style'=>'margin: 0px; min-width: 100%;'
                                            )); ?>
                    <?php echo CHtml::link('<b>Atualizar</b>','#',
                                            array(
                                                'class'=>'button tiny info',
                                                'style'=>'margin: 0px; min-width: 100%;',
                                                'onClick'=>"{js: $('#updt').submit();}"
                                            )); ?>
                </td>
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
</div>