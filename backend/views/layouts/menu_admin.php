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
				array('label' => 'Tshirts', 'url' => '#','items' => array(
                    array('label' => 'Ver todas', 'url' => array('/tshirt')),
                    array('label' => 'Adicionar', 'url' => array('/tshirt/new')),
                )),
				array('label' => 'Encomendas', 'url' => '#','items' => array(
                        array('label' => 'Ver todas', 'url' => array('/encomenda')),
                    )),
                array('label' => 'Utilizadores', 'url' => '#','items' => array(
                        array('label' => 'Listar', 'url' => array('//user/user/index')),
                        array('label' => 'Novo', 'url' => array('//user/user/create')),
                        array('label' => 'Cargos', 'url' => array('//role/role/admin')),
                        array('label' => 'Permições', 'url' => array('//role/permission/admin')),
                        array('label' => 'Acções', 'url' => array('//role/action/admin')),
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
				array(
                'label' => Yum::t('Welcome').' <b>'.Yii::app()->user->name.'</b>',
                'url' => array('/site/login'), 'items' => array(
					array('label' => Yum::t('Profile'), 'url' => array('//profile/profile/view')),
					array('label' => Yum::t('Change password'), 'url' => array('//user/user/changePassword/')),
					'---',
					array('label' => Yum::t('Logout'), 'url' => array('//user/user/logout')),
				)),
			),
		),
	),
)); ?>