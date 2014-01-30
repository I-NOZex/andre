<?php
$this->breadcrumbs=array(
	'Tshirts'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'Listar Tshirts','url'=>array('index'),'icon'=>'list'),
	array('label'=>'Nova Tshirt','url'=>array('new'),'icon'=>'plus'),
	array('label'=>'Atualizar Tshirt','url'=>array('update','id'=>$model->ID),'icon'=>'pencil'),
	array('label'=>'Eliminar Tshirt','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?'),'icon'=>'trash'),
	array('label'=>'Gerir Tshirts','url'=>array('admin'),'icon'=>'cog'),
);
?>

<h1>Visualizar Tshirt #<?php echo $model->ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'Nome',
        array(
            'name'=>'Preco',
            'value'=> $model->Preco.'€'
        ),
        array('name'=>'Data de Entrada',
            'value'=>Yii::app()->dateFormatter->format('dd-MM-yyyy',$model->DataEntrada)),
	),
)); ?>

<?php
//$dataProvider =  new CArrayDataProvider('Tshirt',array('keyField' => 'ID'));
//$dataProvider->setData($model->imagem);
$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>new CArrayDataProvider($model->imagem, array('keyField' => 'ID')),
	'itemView'=>'_img',
	'id'=>'listImages',

    'beforeAjaxUpdate' => 'function(){
      $(".list-view").prepend(\'<div class="loading_overlay"></div>\');}',

    'afterAjaxUpdate' => 'function(){
      $(".loading_overlay").remove();}',
)); ?>
<div class="form-actions clear">
    <?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
    'label' => 'Adicionar Imagens...',
    'type' => 'info',
    'icon' => 'upload white',
    'htmlOptions' => array(
    'data-toggle' => 'modal',
    'data-target' => '#upload',
    ),
    )
    );?>
</div>
<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
$( document ).ready(function() {
    $('.btn_zoom').click(function(e) {
        $('#myModal img#fullsizeimage').attr('src', $(this).attr('data-img-url'));
    });
});
/*]]>*/
</script>
<?php //foreach($model->imagem as $img)
//echo '<img src="'.Yii::app()->baseUrl.'/../../uploads/'.$img->Path.'"/>'; ?>
<?php
    $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'myModal')
    ); ?>

    <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Tamanho Real</h4>
    </div>

    <div class="modal-body" style="text-align: center;">
        <?php echo CHtml::image('#','tshirt',array('id'=>'fullsizeimage')) ?>
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

    <?php $this->endWidget();
/***************************************************/
     $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'upload', 'htmlOptions' => array('style'=>'width: auto; max-width: 630px;'))
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
                }",
                'success'=>'js:function(data){window.location.reload(true);}',
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