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
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'privacysetting-form',
            //'name'=>'YumProfile',
			'enableAjaxValidation'=>true,
            'type' => 'horizontal'
			)); ?>

    <fieldset class="row-fluid">
        <legend><?php echo Yum::t('Privacy settings for {username}', array(
    			'{username}' => $model->user->username)); ?></legend>

        <div class="well well-small"><?php echo Yum::requiredFieldNote(); ?></div>

        <?php echo $form->errorSummary($model); ?>

        <div class="span8">
        <?php if(Yum::hasModule('friendship')) {
            $form->dropDownListRow($model, 'message_new_friendship', array(
                    0 => Yum::t('No'),
                    1 => Yum::t('Yes')),
                array('class'=>'span9'));
        } ?>

        <?php echo $form->dropDownListRow($model, 'message_new_message', array(
                0 => Yum::t('No'),
                1 => Yum::t('Yes')),
            array('class'=>'span9')); ?>

        <?php if(Yum::module('profile')->enableProfileComments) { ?>
            <div class="row message_new_profilecomment">
                <?php echo $form->dropDownListRow($model, 'message_new_profilecomment', array(
                    0 => Yum::t('No'),
                    1 => Yum::t('Yes')),
                array('class'=>'span9')); ?>
            </div>
        <?php } ?>

        <?php if(Yum::module()->enableOnlineStatus) {
        echo $form->DropDownListRow($model, 'show_online_status',
            array(
            '0' => Yum::t( 'Do not show my online status'),
            '1' => Yum::t( 'Show my online status to everyone'),
            ),
        array('class'=>'span9'));
        } ?>

        <?php
        echo $form->DropDownListRow($model, 'log_profile_visits',
            array(
            '0' => Yum::t( 'Do not show the owner of a profile when i visit him'),
            '1' => Yum::t( 'Show the owner when i visit his profile'),
            ),
        array('class'=>'span9')); ?>

        <?php if(Yum::hasModule('role')) {
        echo $form->DropDownListRow($model, 'appear_in_search',
            array(
            '0' => Yum::t( 'Do not appear in search'),
            '1' => Yum::t( 'Appear in search'),
            ),
        array('class'=>'span9'));
        } ?>

        <?php echo $form->hiddenField($profile,'id');
        /*echo $form->textFieldRow($model, 'ignore_users',
            array('class'=>'span9','size' => 100,'hint'=>Yum::t('Separate usernames with comma to ignore specified users')));*/ ?>

	<?php echo $form->select2Row($model, 'ignore_users', array(
                        'asDropDownList' => false,
                        'options' => array(
                          'data' => YumUser::model()->getUsers(),
                          'placeholder' => Yum::t('Separate usernames with comma to ignore specified users'),
                          'containerCssClass' => 'span9  no_margin',
                          'tokenSeparators' => array(','),
                          'multiple'=>true,
                          'width'=>'74.359%',
                          'initSelection' => 'js:function (element, callback) {
                                  var val = [];
                                  $(element.val().split(",")).each(function () {
                                      val.push({id: this, text: this});
                                  });
                                  callback(val);}
                          ')
                      )); ?>
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
        <?php $this->widget('bootstrap.widgets.TbButtonGroup',array(
                    'buttons' => array(
                        array('label' => Yum::t('Save'), 'buttonType' => 'submit', 'type'=>'primary'),
                        array('label' => Yum::t( 'Cancel'), array('submit' => array('//profile/profile/view')))
                    )));?>
    </div>

<?php $this->endWidget(); ?>
</div> <!-- form -->
