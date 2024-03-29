<?php
/**
 * private.php
 *
 * Common parameters for the application on private -your local environment
 */
return array(
    'timeZone'=>'GMT',
    'import'=>array(
        'common.modules.role.models.*',
        'common.modules.user.models.*',
        'common.modules.user.components.*',
        'common.modules.message.models.*',
        'common.modules.profile.models.*',
    ),
	'components' => array(
		// DB connection configurations. Set proper credentials for you application
		// or override this value in main-local.php
		'db' => array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=funnyshirt',
			'username' => 'root',
			'password' => '',
		),
	    'user'=>array(
              'class' => 'common.modules.user.components.YumWebUser',
              'allowAutoLogin'=>true,
              'loginUrl' => array('//user/user/login'),
    	),
	),
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'clevertech'
		),
          'user' => array(
            'class' => 'common.modules.user.UserModule',
            'debug' => false,
            'userTable' => 'user',
            'translationTable' => 'translation',
	        'baseLayout' => 'backend.views.layouts.main',
	        'layout' => 'common.modules.user.views.layouts.yum',
	        'loginLayout' => 'common.modules.user.views.layouts.login',
	        'adminLayout' => 'common.modules.user.views.layouts.yum',
            'enableBootstrap' => false,
            //'afterLogin' => 'canBackendLogin',
            //'captchaAfterUnsuccessfulLogins' => 0 
          ),
          /*'usergroup' => array(
            'class' => 'common.modules.usergroup.UsergroupModule',
            'usergroupTable' => 'usergroup',
            'usergroupMessageTable' => 'user_group_message',
          ),*/
          //'membership' => array(
          //  'class' => 'common.modules.membership.MembershipModule',
          //  'membershipTable' => 'membership',
          //  'paymentTable' => 'payment',
          //),
          'registration' => array(
            'class' => 'common.modules.registration.RegistrationModule',
          ),
          /*'friendship' => array(
            'class' => 'common.modules.friendship.FriendshipModule',
            'friendshipTable' => 'friendship',
          ),*/
          'avatar' => array(
            'class' => 'common.modules.avatar.AvatarModule',
            'avatarThumbnailWidth' => 40,
            //'avatarPath' => 'uploads/avatars',
            'avatarMaxWidth' => 200,
            'baseUrl' => '/../..'
          ),
          'profile' => array(
            'class' => 'common.modules.profile.ProfileModule',
            'enableProfileComments' => false,
            'privacySettingTable' => 'privacysetting',
            'profileTable' => 'profile',
            'profileCommentTable' => 'profile_comment',
            'profileVisitTable' => 'profile_visit',
            'publicFieldsView' =>'common.modules.profile.views.profile.public_fields',
            'profileFormView' =>'common.modules.profile.views.profile._form',
            'profileCommentView' =>'common.modules.profile.views.profileComment._view',
	        'profileCommentIndexView' =>'common.modules.profile.views.profileComment.index',
            'profileCommentCreateView' =>'common.modules.profile.views.profileComment.create',
          ),
          'role' => array(
            'class' => 'common.modules.role.RoleModule',
            'roleTable' => 'role',
            'userRoleTable' => 'user_role',
            'actionTable' => 'action',
            'permissionTable' => 'permission',
          ),
          /*'message' => array(
            'class' => 'common.modules.message.MessageModule',
            'messageTable' => 'message',
          ),*/

	),
	'params' => array(
		'env.code' => 'private'
	)
);
