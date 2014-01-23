<?php $this->pageTitle=Yii::app()->name; ?>

<div class="page-header">
<h1>Bem Vindo á administração da <i style="color: #16A2EB"><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
</div>
<?php //Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You have successfully created your Yii application.');?>
<?php //$this->widget('bootstrap.widgets.TbAlert'); ?>
<div class="row-fluid">
    <div class="span6">
    <div class="title"><h3 class="no_margin">Artigos</h3></div>
    <?php
        $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'T-Shirts',
        'headerIcon' => 'icon-tshirt',
        'htmlOptions' => array(''),
        ));
        echo '<div class="btn-toolbar no_margin">';
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Inserir Nova',
            'size'=>'small',
            'type'=>'success',
            'icon'=>'icon-white icon-plus',
            'url'=>array('/tshirt/new')
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Ver Todas',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-list',
            'url'=>array('/tshirt/')
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Categorias',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-tags',
            'url'=>array('/categoria')
            ));
        echo '</div>';
        $this->endWidget();

        $this->beginWidget('bootstrap.widgets.TbBox', array(
                'title' => 'Encomendas',
                'headerIcon' => 'icon-shopping-cart',
                'htmlOptions' => array(''),
                ));
        echo '<div class="btn-toolbar no_margin">';
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Inserir nova',
            'size'=>'small',
            'type'=>'success',
            'icon'=>'icon-white icon-plus',
            'url'=>array('/serie/create')
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Ver Todas',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-list',
            'url'=>array('/serie')
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Categorias',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-tags',
            'url'=>array('/categoria')
            ));
        echo '</div>';
        $this->endWidget();
    ?></div>
    <div class="span6">
    <div class="title"><h3 class="no_margin">Administração</h3></div>
    <?php
        $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Utilizadores',
        'headerIcon' => 'icon-user',
        'htmlOptions' => array(''),
        ));
        echo '<div class="btn-toolbar no_margin">';
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Novo',
            'size'=>'small',
            'type'=>'success',
            'icon'=>'icon-white icon-plus',
            'url'=>array('//user/user/create')
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Ver Todos',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-list',
            'url'=>array('//user/user')
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Funções',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-briefcase',
            'url'=>array('//role/role/admin')
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Permições',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-lock',
            'url'=>array('//role/permission/admin')
            ));
        echo '</div>';
        $this->endWidget();

        $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Configurações',
        'headerIcon' => 'icon-wrench',
        'htmlOptions' => array(''),
        ));
        echo '<div class="btn-toolbar no_margin">';
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Site',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-home',
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Performance',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-tasks',
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'SEO',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-globe',
            ));
        echo '</div>';
        $this->endWidget();
    ?></div>
</div>