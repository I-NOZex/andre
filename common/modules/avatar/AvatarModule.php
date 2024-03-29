<?php
Yii::setPathOfAlias('AvatarModule' , dirname(__FILE__));

class AvatarModule extends CWebModule {
	public $defaultController = 'avatar';

	public $enableGravatar = true;

	// enable gravatar automatically for new registered users?
	public $enableGravatarDefault = true;

	// override this with your custom layout, if available
	public $adminLayout = 'common.modules.user.views.layouts.yum';
	public $layout = 'common.modules.user.views.layouts.yum';

	public $avatarPath = 'images';
    public $baseUrl =  "";    

	// Set avatarMaxWidth to a value other than 0 to enable image size check
	public $avatarMaxWidth = 0;

	public $avatarThumbnailWidth = 50; // For display in user browse, friend list
	public $avatarDisplayWidth = 200;


	public $controllerMap=array(
		'avatar'=>array('class'=>'AvatarModule.controllers.YumAvatarController'),
	);

	public function init() {
		$this->setImport(array(
					'common.modules.user.controllers.*',
					'common.modules.user.models.*',
					'common.modules.avatar.controllers.*',
					'common.modules.avatar.models.*',
					));
	}
}
