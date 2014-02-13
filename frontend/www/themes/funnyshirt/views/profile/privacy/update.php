<?php
$this->breadcrumbs=array(
		Yum::t('Privacysettings')=>array('index'),
		$model->user->username=>array(
			'//user/user/view','id'=>$model->user_id),
		Yum::t( 'Update'),
		);

$this->title = Yum::t('Privacy settings for {username}', array(
			'{username}' => $model->user->username));

?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'privacysetting-form',
            //'name'=>'YumProfile',
			'enableAjaxValidation'=>true,
			)); ?>

    <fieldset class="-fluid">
        <legend><?php echo Yum::t('Privacy settings for {username}', array(
    			'{username}' => $model->user->username)); ?></legend>

        <div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

        <?php echo $form->errorSummary($model); ?>

        <div class="span8">
        <?php if(Yum::hasModule('friendship')) {
            $form->dropDownList($model, 'message_new_friendship', array(
                    0 => Yum::t('No'),
                    1 => Yum::t('Yes')),
                array('class'=>'span9'));
        } ?>

        <?php echo $form->dropDownList($model, 'message_new_message', array(
                0 => Yum::t('No'),
                1 => Yum::t('Yes')),
            array('class'=>'span9')); ?>

        <?php if(Yum::module('profile')->enableProfileComments) { ?>
            <div class=" message_new_profilecomment">
                <?php echo $form->dropDownList($model, 'message_new_profilecomment', array(
                    0 => Yum::t('No'),
                    1 => Yum::t('Yes')),
                array('class'=>'span9')); ?>
            </div>
        <?php } ?>

        <?php if(Yum::module()->enableOnlineStatus) {
        echo $form->DropDownList($model, 'show_online_status',
            array(
            '0' => Yum::t( 'Do not show my online status'),
            '1' => Yum::t( 'Show my online status to everyone'),
            ),
        array('class'=>'span9'));
        } ?>

        <?php
        echo $form->DropDownList($model, 'log_profile_visits',
            array(
            '0' => Yum::t( 'Do not show the owner of a profile when i visit him'),
            '1' => Yum::t( 'Show the owner when i visit his profile'),
            ),
        array('class'=>'span9')); ?>

        <?php if(Yum::hasModule('role')) {
        echo $form->DropDownList($model, 'appear_in_search',
            array(
            '0' => Yum::t( 'Do not appear in search'),
            '1' => Yum::t( 'Appear in search'),
            ),
        array('class'=>'span9'));
        } ?>

        <?php echo $form->hiddenField($profile,'id'); ?>

								<div class="row">
								<?php echo $form->labelEx($model,'ignore_users'); ?>
								<?php echo $form->textField($model, 'ignore_users',  array('size' => 100)); ?>
								<?php echo $form->error($model,'ignore_users'); ?>
								<div class="hint">
								<p> <?php echo Yum::t('Separate usernames with comma to ignore specified users'); ?> </p>
								</div>
								</div>

        </div>

        <?php /*<div class="profile_field_selection">*/ ?>
        <div class="span4 no_margin">
            <?php
            echo '<h4 style="margin: 0 0 5px;">' . Yum::t('Profile field public options') . '</h4>';
            echo '<p class="help-block">' . Yum::t('Select the fields that should be public') . ':</p>';
            $i = 1;

            $counter=0;

            foreach(YumProfile::getProfileFields() as $field) {
                $counter++;
                //if ($counter==1)echo '<div class="float-left" style="width: 175px;">';
                if ($counter==1) echo '<div class="controls no_margin">';
                printf('<label class="checkbox">%s<label for="privacy_for_field_%d">%s</label></label>',
                CHtml::checkBox("privacy_for_field_{$i}",
                $model->public_profile_fields & $i),
                $i,
                Yum::t($field)

                );
                $i *= 2;

                if ($counter%4==0) echo '</div><div >';
            }
            if ($counter%4!=0) echo '</div>';
            echo '<div class="clear"></div>';
            ?>
        </div>
    </fieldset>
    <div class="form-actions">
    <ul class="button-group radius">
        <li><?php echo CHtml::submitButton(Yum::t('Save'),array('class'=>'button')); ?></li>
        <li><?php echo CHtml::submitButton(Yum::t( 'Cancel'), array('class'=>'button','submit' => array('//profile/profile/view')));?></li>
    </ul>
    </div>

<?php $this->endWidget(); ?>
</div> <!-- form -->
