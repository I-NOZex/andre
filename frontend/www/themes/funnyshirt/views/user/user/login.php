<?php
$form = new CForm(array(
			'elements'=>array(
				'username'=>array(
					'type'=>'text',
					'maxlength'=>32,
					),
				'password'=>array(
					'type'=>'password',
					'maxlength'=>32,
					),
				'rememberMe'=>array(
					'type'=>'checkbox',
					)
				),

			'buttons'=>array(
				'login'=>array(
					'type'=>'submit',
					'label'=>'Login',
					),
				),
			), $model);
?>

<?php
$this->pageTitle = Yum::t('Login');
$this->title = Yum::t('Login');
$this->breadcrumbs=array(Yum::t('Login'));
if(isset(Yii::app()->request->cookies['flash'])){
    $data = unserialize(Yii::app()->request->cookies['flash']->value);
    Yii::app()->user->setFlash($data[0], Yum::t($data[1]).CHtml::link(' Go Home →','http://livetuga.net',array('class'=>'pull-right')));
    $this->widget('bootstrap.widgets.TbAlert');
    unset(Yii::app()->request->cookies['flash']);
}

echo CHtml::beginForm(array('//user/auth/login'),'post',array('class'=>'form-horizontal'));

if(isset($_GET['action']))
	echo CHtml::hiddenField('returnUrl', urldecode($_GET['action']));

?>

<div class="form">
<fieldset>
<?php if($model->hasErrors()) { ?>
<div class="alert">
<?php echo CHtml::errorSummary($model); ?>
</div>
<?php } ?>


<div class="loginform">
<legend><?php echo Yum::t('Please fill out the following form with your login credentials:'); ?></legend>

<div class="control-group">
	<?php
if(Yum::module()->loginType & UserModule::LOGIN_BY_USERNAME)
	echo CHtml::activeLabelEx($model,'username',array('class'=>'control-label'));
if(Yum::module()->loginType & UserModule::LOGIN_BY_EMAIL)
	printf ('<label for="YumUserLogin_username" class="control-label required">%s <span class="required">*</span></label>', Yum::t('E-Mail address'));
	?>

	<div class="controls"><?php echo CHtml::activeTextField($model,'username',array('class'=>'span4')) ?></div>
</div>

<div class="control-group">
		<?php echo CHtml::activeLabelEx($model,'password',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo CHtml::activePasswordField($model,'password',array('class'=>'span4')); ?></div>
</div>

<?php if ($model->scenario == 'captcha' && CCaptcha::checkRequirements()) { ?>
	<div class="control-group">
		<?php echo CHtml::activeLabel($model, 'verifyCode',array('class'=>'control-label')); ?>
	   <div class="controls">
       <div class="input-append input-prepend">
				<?php $this->widget('CCaptcha',array(
                    'buttonOptions' => array('class' => 'btn btn-warning','style'=>'height:22px;'),
                    'buttonLabel' => '<i class="icon-white icon-refresh" style="margin-top: 4px;"></i>',
                    'imageOptions' => array('style'=>'height:30px', 'class'=>'add-on no_padding'),
                )); ?>
				<?php echo CHtml::activeTextField($model, 'verifyCode',array(
                    'style'=>'height:22px;background-color:white;text-align:left;width:241px;','class'=>'add-on')); ?>
       </div>
		</div>
		<?php echo CHtml::error($model, 'verifyCode'); ?>
	</div>
<?php } ?>


</div>
		
<?php if(Yum::module()->loginType & UserModule::LOGIN_BY_HYBRIDAUTH 
		&& Yum::module()->hybridAuthProviders) { ?>
	<div class="span5 hybridauth">
<?php echo Yum::t('You can also login by') . ': <br />'; 
foreach(Yum::module()->hybridAuthProviders as $provider) 
	echo CHtml::link(
			CHtml::image(
				Yii::app()->getAssetManager()->publish(
					Yii::getPathOfAlias(
						'common.modules.user.assets.images').'/'.strtolower($provider).'.png'),
				$provider) . $provider, $this->createUrl(
					'//user/auth/login', array('hybridauth' => $provider)), array(
					'class' => 'social')) . '<br />'; 
?>
</div>

<div class="clearfix"></div>

<?php } ?>

<div class="form-actions">

<span class="hint">
<div class="button-bar">
	<ul class="button-group round">
        <li><?php echo CHtml::submitButton(Yum::t('Login'), array('class' => 'button','style'=>'padding-bottom: 14px;')); ?></li>
	    <li><?php if(Yum::hasModule('registration') && Yum::module('registration')->enableRegistration)
            echo CHtml::link(Yum::t("Registration"),Yum::module('registration')->registrationUrl, array('class' => 'button success'));?>
        </li>
	    <li><?php if(Yum::hasModule('registration') && Yum::module('registration')->enableRecovery)
	        echo CHtml::link(Yum::t("Lost password?"),Yum::module('registration')->recoveryUrl, array('class' => 'button alert'));?>
        </li>
	</ul>
</div>
</span>

</div>
</fieldset>
</div>

<?php echo CHtml::endForm(); ?>

