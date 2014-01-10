<?php
Yii::setPathOfAlias('UsergroupModule' , dirname(__FILE__));

class UsergroupModule extends CWebModule {
	public $usergroupTable = '{{usergroup}}';
	public $usergroupMessageTable = '{{usergroup_message}}';
	public $userparticipationTable = '{{user_usergroup}}';

	public $adminLayout = 'common.modules.user.views.layouts.yum';
	public $layout = 'common.modules.user.views.layouts.yum';

	public $controllerMap=array(
			'groups'=>array(
				'class'=>'UsergroupModule.controllers.YumUsergroupController'),
			);

	public function init() {
		$this->setImport(array(
					'common.modules.user.controllers.*',
					'common.modules.user.models.*',
					'common.modules.usergroup.controllers.*',
					'common.modules.usergroup.models.*',
					));
	}


}
