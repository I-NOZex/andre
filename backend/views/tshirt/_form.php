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

	<?php echo $form->textFieldRow($model,'Nome',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Preco',array('maxlength'=>19, 'append'=>'<b>€</b>', 'class'=>'right')); ?>

    <?php echo $form->datepickerRow($model, 'DataEntrada', array(
                'options' => array(
                        'language' => 'pt',
                        'format' => 'dd-mm-yyyy'
                    ),
                'prepend' => '<i class="icon-calendar"></i>',
                )
            ); ?>

    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Adicionar Imagens',
    'type' => 'primary',
    'htmlOptions' => array(
    'data-toggle' => 'modal',
    'data-target' => '#myModal',
    ),
    )
    );?>
    <?php
    /*$picture = new ImagemTshirt;
    $this->widget('bootstrap.widgets.TbFileUpload', array(
            'url' => $this->createUrl('ImagemTshirt/upload'),
            //'imageProcessing' => false,
            'model' => $picture,
            'attribute' => 'Path',
            'multiple' => true,
            'options' => array(
                'maxFileSize' => 2000000,
                'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
            )
            /*'callbacks' => array(
                    'done' => new CJavaScriptExpression(
                        'function(e, data) { alert(\'done!\'); }'
                    ),
                    'fail' => new CJavaScriptExpression(
                        'function(e, data) { alert(\'fail!\'); }'
                    ),
            ),
        )
    );*/
    ?>



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
    $this->widget('bootstrap.widgets.TbFileUpload', array(
            'url' => $this->createUrl('ImagemTshirt/upload2'),
            //'imageProcessing' => false,
            'model' => $picture,
            'attribute' => 'Path',
            'multiple' => true,
            'options' => array(
                'maxFileSize' => 2000000,
                'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
                'locale' => array('fileupload'=> array('start'=>'Iniciar','cancel'=>'Cancelar','delete'=>'Apagar')),
                'callbacks' => array(
                        'done' => new CJavaScriptExpression(
                            'function(e, data) { alert(\'done!\'); }'
                        ),
                        'fail' => new CJavaScriptExpression(
                            'function(e, data) { alert(\'fail!\'); }'
                        ),
                ),
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

