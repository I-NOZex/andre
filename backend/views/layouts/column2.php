<?php $this->beginContent('//layouts/main'); ?>
<div class="container-fluid no_padding">
	<div class="span-7 no_margin">
		<div id="sidebar">
		<?php
			$this->widget('bootstrap.widgets.TbMenu', array(
				'items'=>
                    array_merge(
                        array(
                            array('label'=>'Operações','itemOptions'=>array('class'=>'nav-header'))
                        ),
                        $this->menu,
                        array(
                            array('label'=>'Gerir','itemOptions'=>array('class'=>'nav-header')),
                            array('label'=>'Filmes','url'=>array('/filme'),'icon'=>'facetime-video'),
                            array('label'=>'Séries','url'=>array('/serie'),'icon'=>'film'),
                            array('label'=>'Categorias','url'=>array('/categoria'),'icon'=>'tags'),
                            array('label'=>'Páginas','url'=>'#','icon'=>'file','visible'=>Yii::app()->user->isAdmin()),
                            array('label'=>'Comentários','url'=>'#','icon'=>'comment','visible'=>Yii::app()->user->isAdmin()),
                            array('label'=>'Denúncias','url'=>'#','icon'=>'exclamation-sign','visible'=>Yii::app()->user->isAdmin()),
                            array('label'=>'Utilizadores','url'=>array('//user/user/'),'icon'=>'user','visible'=>Yii::app()->user->isAdmin()),
                            array('label'=>Yum::t('My profile'),'url'=>array('//profile/profile/view'),'icon'=>'user','visible'=>!Yii::app()->user->isAdmin()),
                            array('label'=>'Site','url'=>array('/site/index'),'icon'=>'home'),
                        )
                    ),
                'type'=>'list',
				'htmlOptions'=>array('class'=>'well well-small'),
			));
		?>
		</div><!-- sidebar -->
	</div>
	<div class="span-20 last" id="content">
			<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent(); ?>