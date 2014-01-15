<?php $this->widget('bootstrap.widgets.TbNavbar', array(
	'type' => 'inverse', // null or 'inverse'
	'brand' => CHtml::encode(Yii::app()->name).'<sup>Admin</sup>',
	'brandUrl' => array('/site/index'),
	'collapse' => true, // requires bootstrap-responsive.css
    'fluid' => true,
	'items' => array(
		array(
			'class' => 'bootstrap.widgets.TbMenu',
			'items' => array(
				array('label' => 'Conteudo', 'url' => '#','items' => array(
                    array('label' => 'Filmes', 'url' => '#','items' => array(
                        array('label' => 'Listar', 'url' => array('/filme/index')),
                        array('label' => 'Inserir', 'url' => array('/filme/create')),
                    )),
                    array('label' => 'Series', 'url' => '#','items' => array(
                        array('label' => 'Listar', 'url' => array('/serie/index')),
                        array('label' => 'Inserir', 'url' => array('/serie/create')),
                    )),
                    array('label' => 'Categorias', 'url' => '#','items' => array(
                        array('label' => 'Listar', 'url' => array('/categoria/index')),
                        array('label' => 'Inserir', 'url' => array('/categoria/create')),
                    )),
                    array('label' => 'Páginas', 'url' => '#','items' => array(
                        array('label' => 'Listar', 'url' => '#'),
                        array('label' => 'Inserir', 'url' => '#'),
                    ))
                )),
				array('label' => 'Comentários', 'url' => '#','items' => array(
                        array('label' => 'Listar', 'url' => '#'),
                        array('label' => 'Aprovar', 'url' => '#'),
                    )),
				array('label' => 'Estatisticas', 'url' => '#','items' => array(
				    array('label' => 'Classificações', 'url' => '#'),
                    array('label' => 'Denuncias', 'url' => '#'),
                    array('label' => 'Sessões', 'url' => '#'),
                )),
                array('label' => 'Utilizadores', 'url' => '#','items' => array(
                        array('label' => 'Listar', 'url' => array('//user/user/index')),
                        array('label' => 'Novo', 'url' => array('//user/user/create')),
                        array('label' => 'Cargos', 'url' => array('//role/role/admin')),
                        array('label' => 'Permições', 'url' => array('//role/permission/admin')),
                        array('label' => 'Acções', 'url' => array('//role/action/admin')),
                    )),
				array('label' => 'Configurações', 'url' => '#','items' => array(
                        array('label' => 'Site', 'url' => '#'),
                        array('label' => 'Performance', 'url' => '#'),
                        array('label' => 'SEO', 'url' => '#'),
                    )),
			),
        ),
		/*'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Procurar"></form>',*/
		array(
			'class' => 'bootstrap.widgets.TbMenu',
			'htmlOptions' => array('class' => 'pull-right'),
            'encodeLabel' => false,
			'items' => array(
                '---',
                array('label'=>Yii::app()->user->data()->getAvatar(true)),
				array('linkOptions'=>array('class'=>(YumMessage::model()->unread()->count()>0) ? 'text-blink' : ''),
                'label' => Yum::t('Welcome').' <b>'.Yii::app()->user->name.'</b>',
                'url' => array('/site/login'), 'items' => array(
					array('label' => Yum::t('Profile'), 'url' => '#'),
					array('label' => Yum::t('Change password'), 'url' => '#'),
                    array('label' => Yum::t('Messages').' <span class="badge badge-inverse well">'.
                    YumMessage::model()->unread()->count().
                    '</span>', 'url' => array('/message/message/index')),
					'---',
					array('label' => Yum::t('Logout'), 'url' => array('//user/user/logout')),
				)),
			),
		),
	),
)); ?>