<?php
Yii::import('bootstrap.widgets.TbMenu');

class YumUserMenu extends TbMenu {
	public function init() {
		$this->type = 'list';
        $this->encodeLabel = false;
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
				array('label' => Yum::t('Profile'), 'visible' => Yum::hasModule('profile'),'itemOptions'=>array('class'=>'nav-header')),
    				array('label' => Yum::t('My profile'), 'url' => array('//profile/profile/view')),
    		        array('label' => Yum::t('Edit personal data'), 'url' => array('//profile/profile/update')),
    				array('label' => Yum::t('Upload avatar image'),'url' => array('/avatar/avatar/editAvatar'),'visible' => Yum::hasModule('avatar')),
    				array('label' => Yum::t('Privacy settings'), 'url' => array('/profile/privacy/update')),

				array('label' => Yum::t('Membership'),'visible' => Yum::hasModule('membership'),'itemOptions'=>array('class'=>'nav-header')),
				    array('label' => Yum::t('My memberships'),'visible' => Yum::hasModule('membership'), 'url' => array('/membership/membership/index')),
					array('label' => Yum::t('Browse memberships'),'visible' => Yum::hasModule('membership'), 'url' => array('/membership/membership/order')),

				array('label' => Yum::t('Messages'),'visible' => Yum::hasModule('message'),'itemOptions'=>array('class'=>'nav-header')),
				    array('visible' =>Yum::hasModule('message'),'label' => Yum::t('My inbox').' <span class="badge badge-info well" style="vertical-align:text-top">'.
                            /*YumMessage::model()->unread()->count().*/'</span>','url' => array('/message/message/index')),
					array('visible' =>Yum::hasModule('message'),'label' => Yum::t('Sent messages'), 'url' => array('/message/message/sent')),
                    array('visible' =>Yum::hasModule('message'),'label' => Yum::t('Write a message'), 'url' => array('/message/message/compose')),

				array('label' => Yum::t('Social'), 'itemOptions'=>array('class'=>'nav-header')),
				    array('label' => Yum::t('My friends'),'url' => array('/friendship/friendship/index'),'visible' => Yum::hasModule('friendship')),
					array('label' => Yum::t('Browse users'), 'url' => array('/user/user/browse')),
					array('label' => Yum::t('My groups'), 'url' => array('/usergroup/groups/index'),'visible' => Yum::hasModule('usergroup')),
					array('label' => Yum::t('Create new usergroup'), 'url' => array('/usergroup/groups/create'),'visible' => Yum::hasModule('usergroup')),
					array('label' => Yum::t('Browse usergroups'), 'url' => array('/usergroup/groups/browse'),'visible' => Yum::hasModule('usergroup')),

				array('label' => Yum::t('Misc'), 'itemOptions'=>array('class'=>'nav-header')),
				    array('label' => Yum::t('Change password'), 'url' => array('//user/user/changePassword')),
					array('label' => Yum::t('Delete account'), 'url' => array('//user/user/delete')),
					array('label' => Yum::t('Logout'), 'url' => array('//user/user/logout')),
				);
	}
}
?>






