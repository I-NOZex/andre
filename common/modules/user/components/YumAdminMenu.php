<?php
Yii::import('bootstrap.widgets.TbMenu');

class YumAdminMenu extends TbMenu {
	public function init() {
		$this->type = 'list';
		return parent::init();
	}

	public function run() {
	    $title = sprintf('%s: <span class="text-info">%s</span>',
				Yum::t('Logged in as'),
				Yii::app()->user->data()->username);
		$this->widget('YumMenu', array(
					'items' => $this->getMenuItems($title),
                    'htmlOptions'=>array('class'=>'well well-small'),
					));
		parent::run();
	}

	public function getMenuItems($title) {
		return array(
                array('label'=>$title,'itemOptions'=>array('class'=>'nav-header')),
                array('label'=>'','itemOptions'=>array('class'=>'divider')),
				array(
                'label'=>Yum::t('Users'),
                'itemOptions'=>array('class'=>'nav-header')),
						array('label'=> Yum::t('Statistics'), 'url'=>array('//user/statistics/index')),
						array('label' => Yum::t('User Administration'), 'url' => array('//user/user/admin')),
						array('label' => Yum::t('Avatar administration'), 'url' => array('//avatar/avatar/admin'), 'visible' => Yum::hasModule('avatar')),
						array('label' => Yum::t('Create new User'), 'url' => array('//user/user/create')),
						array('label' => Yum::t('Generate Demo Data'), 'url' => array('//user/user/generateData'), 'visible' => Yum::module()->debug),

				array(
					'label'=>Yum::t('Roles / Access control'),
                    'itemOptions'=>array('class'=>'nav-header'),
					'active' => Yii::app()->controller->id == 'role' || Yii::app()->controller->id == 'permission' || Yii::app()->controller->id == 'action', 'visible' => Yum::hasModule('role')),
						array('label' => Yum::t('Roles'), 'url' => array('//role/role/admin')),
						array('label' => Yum::t('Create new role'), 'url' => array('//role/role/create')),
						array('label' => Yum::t('Permissions'), 'url' => array('//role/permission/admin')),
						array('label' => Yum::t('Grant permission'), 'url' => array('//role/permission/create')),
						array('label' => Yum::t('Actions'), 'url' => array('//role/action/admin')),
						array('label' => Yum::t('Create new action'), 'url' => array('//role/action/create')),

				array('label'=>Yum::t('Membership'),
                      'itemOptions'=>array('class'=>'nav-header'),
						'visible' => Yum::hasModule('membership')),
							array('label' => Yum::t('Ordered memberships'), 'url' => array('//membership/membership/admin'),
                                                    'visible' => Yum::hasModule('membership')),
							array('label' => Yum::t('Payment types'), 'url' => array('//membership/payment/admin'),
                                                    'visible' => Yum::hasModule('membership')),
							array('label' => Yum::t('Create new payment type'), 'url' => array('//membership/payment/create'),
                                                    'visible' => Yum::hasModule('membership')),

				array('label'=>Yum::t('Profiles'),
                      'itemOptions'=>array('class'=>'nav-header'),
						'visible' => Yum::hasModule('profile')),
							array('label' => Yum::t('Manage profiles'), 'url' => array('//profile/profile/admin')),
							array('label' => Yum::t('Show profile visits'), 'url' => array('//profile/profile/visits')),

				array('label' => Yum::t('Messages'),
                      'itemOptions'=>array('class'=>'nav-header'),
						'visible' => Yum::hasModule('message')),
							array('label' => Yum::t('Admin inbox').' <span class="badge badge-info well" style="vertical-align:text-top">'.
                            YumMessage::model()->unread()->count().'</span>',
                            'url' => array('/message/message/index')),
							array('label' => Yum::t('Sent messages'), 'url' => array('/message/message/sent')),
							array('label' => Yum::t('Write a message'), 'url' => array('/message/message/compose')),

				array('label' => Yum::t('Misc'),
                      'itemOptions'=>array('class'=>'nav-header')),
							array('label' => Yum::t('Text translations'), 'url' => array('//user/translation/admin')),
							array('label' => Yum::t('Upload avatar for admin'), 'url' => array('//avatar/avatar/editAvatar'),
								'visible' => Yum::hasModule('avatar')),
							array('label' => Yum::t('Change admin Password'), 'url' => array('//user/user/changePassword')),
							array('label' => Yum::t('Logout'), 'url' => array('//user/user/logout')),

				);

	}
}
?>






