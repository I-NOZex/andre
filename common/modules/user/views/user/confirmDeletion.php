<?php
$this->title = Yum::t('Confirm deletion');

$this->breadcrumbs = array(
	Yum::t('Delete account'));

printf('<p class="title">%s</p>', Yum::t('Are you really sure you want to delete your Account?')); ?>

<?php echo CHtml::form(array('delete'),'POST',array('class'=>'form-vertical well'));  ?>
<?php printf('<label>%s</label>', Yum::t('Please enter your password to confirm deletion:')); ?>
<?php echo CHtml::passwordField('confirmPassword','',array('class'=>'span3')) . "<br />"; ?>

<div class="form-actions no_margin" style="padding: 20px 0px 0px;">
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array(
        'buttons' => array(
            array('label' => Yum::t('Cancel deletion'),
                'icon'=>'arrow-left white', 'type'=>'primary', 'htmlOptions' => array('submit' => array('profile'))),
            array('label' => Yum::t('Confirm deletion'),
                'icon'=>'remove white', 'type'=>'danger', 'buttonType' => 'submit')
        ))); ?>
    <?php //echo CHtml::submitButton(Yum::t('Confirm deletion'));  ?>
</div>
<?php echo CHtml::endForm(); ?>
