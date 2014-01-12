<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type' => 'inverse', // null or 'inverse'
    'brand' => 'LiveTuga <sup>Admin</sup>',
    'brandUrl' => array('/site/index'),
    'collapse' => true, // requires bootstrap-responsive.css
    'fluid' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => array('class' => 'pull-right'),
            'encodeLabel' => false,
            'items' => array(
                        '---',
                        array('label' => Yum::t('Login'), 'url' => array('/site/login'))
        )
)))); ?>