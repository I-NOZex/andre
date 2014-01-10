<?php
Yii::setPathOfAlias('ProfileModule' , dirname(__FILE__));

class ProfileModule extends CWebModule {
	public $adminLayout = 'common.modules.user.views.layouts.yum';
	public $layout = 'common.modules.user.views.layouts.yum';

	public $requiredProfileFields = array('firstname', 'lastname');

	public $profileRules = array(
			array('email', 'unique'),
			array('email', 'CEmailValidator'),
			);

	// set this to true to allow all users to access user profiles
	public $profilesViewableByGuests = false;

	public $enableProfileVisitLogging = true;
	public $enablePrivacySetting = true;
	public $enableProfileComments = true;

	public $profileTable = '{{profile}}';
	public $privacySettingTable = '{{privacysetting}}';
	public $profileCommentTable = '{{profile_comment}}';
	public $profileVisitTable = '{{profile_visit}}';

	public $profileView = '/profile/view';
	public $profileViewRoute = '//profile/profile/view';

	public $publicFieldsView =
		'common.modules.profile.views.profile.public_fields';
	public $profileFormView =
		'common.modules.profile.views.profile._form';
	public $profileCommentView =
		'common.modules.profile.views.profileComment._view';
		public $profileCommentIndexView =
		'common.modules.profile.views.profileComment.index';
	public $profileCommentCreateView =
		'common.modules.profile.views.profileComment.create';
  public $profileEditView = '/profile/update';
  public $privacySettingView= '/privacy/update';

	// Which columns should be displayed in the user administration Grid
	public $gridColumns = array('email', 'firstname', 'lastname', 'street');

	public $controllerMap=array(
			'comments'=>array(
				'class'=>'ProfileModule.controllers.YumProfileCommentController'),
			'privacy'=>array(
				'class'=>'ProfileModule.controllers.YumPrivacysettingController'),
			'profile'=>array(
				'class'=>'ProfileModule.controllers.YumProfileController'),
			);

	public function init() {
		$this->setImport(array(
			'common.modules.user.controllers.*',
			'common.modules.user.models.*',
			'ProfileModule.components.*',
			'ProfileModule.models.*',
		));
	}
}
