<?php
/**
 * main.php
 *
 * This file holds frontend configuration settings.
 */

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', __DIR__ . '/../..');
Yii::setPathOfAlias('common', __DIR__ . '/../../common');
Yii::setPathOfAlias('frontend', __DIR__ . '/..');
Yii::setPathOfAlias('www', __DIR__ . '/../www');

return CMap::mergeArray(
	require(__DIR__ . '/../../common/config/main.php'),
	array(
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
		'basePath' => 'frontend',
		// set parameters
		'name' => 'Funny<em>Shirt</em>',
		// preload components required before running applications
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
		'preload' => array('log'),
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
		'language' => 'pt',
		// uncomment if a theme is used
		'theme' => 'funnyshirt',
		// setup import paths aliases
		// @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
		'import' => array(
			// uncomment if behaviors are required
			// you can also import a specific one
			/* 'common.extensions.behaviors.*', */
			// uncomment if validators on common folder are required
			/* 'common.extensions.validators.*', */
			'application.components.*',
			'application.controllers.*',
			'application.models.*',
            'ext.yiiext.components.shoppingCart.*'
		),
		/* uncomment and set if required */
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
		/* 'modules' => array(), */
		'components' => array(
			'errorHandler' => array(
				// @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
				'errorAction'=>'site/error'
			),
			'urlManager' => array(
				'rules' => array(
					'<controller:\w+>/<id:\d+>' => '<controller>/view',
					'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
					'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				)
			),
          'shoppingCart' =>
            array(
                'class' => 'ext.yiiext.components.shoppingCart.EShoppingCart',
            ),
		),
    	'modules' => array(
              'user' => array(
    	        'baseLayout' => 'www.themes.funnyshirt.views.layouts.main',
    	        'layout' => 'www.themes.funnyshirt.views.user.layouts.yum',
    	        'loginLayout' => 'www.themes.funnyshirt.views.user.layouts.login',
    	        'adminLayout' => 'www.themes.funnyshirt.views.user.layouts.yum',
              ),
              'profile' => array(
                'publicFieldsView' =>'www.themes.funnyshirt.views.profile.profile.public_fields',
                'layout' => 'www.themes.funnyshirt.views.user.layouts.yum',
                //'profileFormView' =>'www.themes.funnyshirt.views.profile.profile.profile._form',
                //'profileCommentView' =>'www.themes.funnyshirt.views.profile.profile.profileComment._view',
    	        //'profileCommentIndexView' =>'www.themes.funnyshirt.views.profile.profile.profileComment.index',
                //'profileCommentCreateView' =>'www.themes.funnyshirt.views.profile.profile.profileComment.create',
              ),
              'avatar' => array(
                'layout' => 'www.themes.funnyshirt.views.user.layouts.yum',
                'adminLayout' => 'www.themes.funnyshirt.views.user.layouts.yum',
              ),
              'registration' => array(
                'recoverPasswordView' => 'www.themes.funnyshirt.views.registration.registration.recovery'
              )
        ),
	),
	(file_exists(__DIR__ . '/main-env.php') ? require(__DIR__ . '/main-env.php') : array()),
	(file_exists(__DIR__ . '/main-local.php') ? require(__DIR__ . '/main-local.php') : array())
);
