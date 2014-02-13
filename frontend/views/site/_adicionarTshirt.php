<?php
/*<?php
$validator = new CartValidator::model();
echo CHtml::beginForm(Yii::app()->baseUrl.'/site/add2cart'); ?>

    <?php echo CHtml::errorSummary($validator); ?>

<div class="row">
    <div class="large-6 columns">
        <h3>Tamanho <small>Escolha o tamanho do artigo</small></h3>
        <?php echo CHtml::dropDownList('tamanho', '',
                      array('xs' => 'Muito Pequeno (XS)',
                            's' => 'Pequeno (S)',
                            'm' => 'Médio (M)',
                            'l' => 'Largo (L)',
                            'xl' => 'Grande (XL)',
                            'xxl' => 'Super Grande (XXL)',
                            'xxxl' => 'Extra Grande (XXXL)'),
                      array('empty' => '↓ Selecione um Tamanho ↓')); ?>
   </div>
   <div class="large-6 columns">
        <h3>Quantidade <small>Escolha a quantidade de artigos que deseja</small></h3>
        <?php echo CHtml::textField('quantidade','1') ; ?>
   </div>
   <?php echo CHtml::submitButton('Adicionar ao Carrinho',array('class'=>'button small')); ?>
</div>


<?php echo CHtml::endForm(); ?>*/
?>


<?php
$validator = new CartValidator;
$form=$this->beginWidget('CActiveForm',
            array(
                'htmlOptions' =>array('data-abide'=>'data-abide'),
                )
); ?>

    <?php //echo CHtml::errorSummary($validator); ?>
    <?php  //var_dump($errors); ?>

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

<div class="row">
    <div class="large-6 columns">
        <?php echo $form->label($validator,'tamanho'); ?>
        <?php echo $form->dropDownList($validator,'tamanho',array('xs' => 'Muito Pequeno (XS)',
                            's' => 'Pequeno (S)',
                            'm' => 'Médio (M)',
                            'l' => 'Largo (L)',
                            'xl' => 'Grande (XL)',
                            'xxl' => 'Super Grande (XXL)',
                            'xxxl' => 'Extra Grande (XXXL)'),
                      array('empty' => '↓ Selecione um Tamanho ↓',
                            'required'=>'required')); ?>
        <small class="error">É obrigatório especificar um Tamanho!</small>
    </div>

    <div class="large-6 columns">
        <?php echo $form->label($validator,'quantidade'); ?>
        <?php echo $form->textField($validator,'quantidade',array("pattern"=>"number",'required'=>'required','value'=>1)); ?>
        <small class="error">É obrigatório especificar a Quantidade (deve ser um número válido)</small>
    </div>

<div class="large-12 column">
<?php echo CHtml::submitButton('Adicionar ao Carrinho',array('class'=>'button small')); ?>
</div>
</div>
<?php $this->endWidget(); ?>
