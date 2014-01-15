<?php $this->pageTitle=Yii::app()->name; ?>

<div class="page-header">
<h1>Bem Vindo á administração da <i style="color: #16A2EB"><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
</div>
<?php //Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You have successfully created your Yii application.');?>
<?php //$this->widget('bootstrap.widgets.TbAlert'); ?>
<div class="row-fluid">
    <div class="span4">
    <div class="title"><h3 class="no_margin">Conteúdo</h3></div>
    <?php
        $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Filmes',
        'headerIcon' => 'icon-facetime-video',
        'htmlOptions' => array(''),
        ));
        echo '<div class="btn-toolbar no_margin">';
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Inserir novo',
            'size'=>'small',
            'type'=>'success',
            'icon'=>'icon-white icon-plus',
            'url'=>array('/filme/create')
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Ver Todos',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-list',
            'url'=>array('/filme/')
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
                'title' => 'Series',
                'headerIcon' => 'icon-film',
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

    <div class="span4">
    <div class="title"><h3 class="no_margin">Gestão</h3></div>
    <?php
        $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Comentários &nbsp;<span class="badge badge-warning pull-right">0</span>',
        'headerIcon' => 'icon-comment',
        'htmlOptions' => array(''),
        ));
        echo '<div class="btn-toolbar no_margin">';
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Aprovar Pendentes',
            'size'=>'small',
            'type'=>'success',
            'icon'=>'icon-white icon-ok',
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Ver Todos',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-list',
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Top Comentados',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-star',
            ));
        echo '</div>';
        $this->endWidget();

        $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Denuncias &nbsp;<span class="badge badge-warning">4</span>',
        'headerIcon' => 'icon-exclamation-sign',
        'htmlOptions' => array(''),
        ));
        echo '<div class="btn-toolbar no_margin">';
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Ver Pendentes',
            'size'=>'small',
            'type'=>'danger',
            'icon'=>'icon-white icon-remove',
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Ver Solucionados',
            'size'=>'small',
            'type'=>'success',
            'icon'=>'icon-white icon-ok',
            ));
            $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Ver Todos',
            'size'=>'small',
            'type'=>'inverse',
            'icon'=>'icon-white icon-list',
            ));
        echo '</div>';
        $this->endWidget();
    ?></div>

    <div class="span4">
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