<?php
if(!$profile = $model->profile)
	$profile = new YumProfile;


$this->pageTitle = Yum::t('Profile');
$this->title = CHtml::activeLabel($model,'username');
$this->breadcrumbs = array(Yum::t('Profile'), $model->username);
Yum::renderFlash();
?>

<div id="profile">

    <div class="row-fluid">
        <div class="span3"><?php echo $model->getAvatar(); ?></div>
        <div class="span9"><?php $this->renderPartial(Yum::module('profile')->publicFieldsView, array(
        			'profile' => $model->profile)); ?></div>
    </div>
    <hr />
    <div class="row-fluid">
        <div class="span3"><?php if(Yum::hasModule('friendship'))
            $this->renderPartial(
            		'common.modules.friendship.views.friendship.friends', array(
            			'model' => $model)); ?>
        </div>
        <div class="span9"><?php
        if(Yum::module('profile')->enableProfileComments
        		&& Yii::app()->controller->action->id != 'update'
        		&& isset($model->profile))
        	$this->renderPartial(Yum::module('profile')->profileCommentIndexView, array(
        			 'model' => $model->profile)); ?>
        </div>
     </div>

    <div class="span9"><?php
    if(@Yum::module('message')->messageSystem != 0)
    $this->renderPartial('/message/write_a_message', array(
    			'model' => $model)); ?>
    </div>

</div>
<?php
if(!Yii::app()->user->isGuest && Yii::app()->user->id == $model->id): ?>
<ul class="button-group radius">
  <li><?php echo CHtml::link(Yum::t('Edit profile'),array('//profile/profile/update'),array('class'=>'button')); ?></li>
  <li><?php echo CHtml::link(Yum::t('Upload avatar image'),array('//avatar/avatar/editAvatar'),array('class'=>'button')); ?></li>
</ul>
<?php endif; ?>

