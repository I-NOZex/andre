<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tshirt-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
    'htmlOptions'=> array('enctype' => 'multipart/form-data'),
)); ?>

<fieldset>
<div class="well well-small">
	<p class="help-block">Campos com <span class="required">*</span> são de preenchimento obrigatório.</p>
</div>

	<?php echo $form->errorSummary($model); ?>
     <?php //die(var_dump($model->ID).'<HR>'.var_dump(Tshirt::model()->lastId()+1));?>
	<?php echo ($model->isNewRecord) ? CHtml::hiddenField('Tid' , $model->ID, array('id' => 'Tid'))
                                     : CHtml::hiddenField('Tid' , Tshirt::model()->lastId()+1, array('id' => 'Tid')); ?>
                                                                         
	<?php echo $form->textFieldRow($model,'Nome',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Preco',array('maxlength'=>19, 'append'=>'<b>€</b>', 'class'=>'right')); ?>

    <?php echo $form->datepickerRow($model, 'DataEntrada', array(
                'options' => array(
                        'language' => 'pt',
                        'format' => 'dd-mm-yyyy',
                        'weekStart' => '1'
                    ),
                'prepend' => '<i class="icon-calendar"></i>',
                'value' => Yii::app()->dateFormatter->format('dd-MM-yyyy',time()),
                )
            ); ?>
    <div class="controls">
    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Adicionar Imagens...',
    'type' => 'info',
    'icon' => 'upload white',
    'htmlOptions' => array(
    'data-toggle' => 'modal',
    'data-target' => '#myModal',
    ),
    )
    );?>
    </div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Criar' : 'Guardar',
		)); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
    <?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal', 'htmlOptions' => array('style'=>'width: auto; max-width: 630px;'))
    ); ?>

    <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Adicionar Imagens</h4>
    </div>

    <div class="modal-body">
<?php
    $picture = new ImagemTshirt('upload');
    //$data = !$model->isNewRecord ? "{Tid: ".$model->ID."}" : "{Tid: ".(Tshirt::model()->lastId()+1)."}";
    $data = !$model->isNewRecord ? $model->ID : Tshirt::model()->lastId()+1;
    $this->widget('bootstrap.widgets.TbFileUpload', array(
            'url' => $this->createUrl('ImagemTshirt/upload'),
            //'imageProcessing' => false,
            'model' => $picture,
            'attribute' => 'Path',
            'multiple' => true,
            //Our custom upload template
            'uploadView' => 'backend.views.imagemTshirt.upload',
            //our custom download template
            'downloadView' => 'backend.views.imagemTshirt.download',
            'options' => array(
                //'formData' => $data,
                'maxFileSize' => 2000000,
                'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
                'locale' => array('fileupload'=> array('start'=>'Iniciar','cancel'=>'Cancelar','delete'=>'Apagar')),
                //Additional javascript options
                //This is the submit callback that will gather
                //the additional data  corresponding to the current file
                'submit' => "js:function (e, data) {
                    var inputs = data.context.find(':input');
                    data.formData = inputs.serializeArray();
                    data.formData.push({name:'Tid', value:'".$data."'});
                    console.log(data.formData);
                    return true;
                }"
            ),
        )
    );
    ?>
    </div>

    <div class="modal-footer">
    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Fechar',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal'),
    )
    ); ?>
    </div>

    <?php $this->endWidget(); ?>

