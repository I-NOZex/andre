<?php
/* @var $this ImagemTshirtController */

$this->breadcrumbs=array(
	'Imagem Tshirt'=>array('/imagemTshirt'),
	'Upload',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
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
            ),
            'htmlOptions' => array('class'=>'a')
            /*'callbacks' => array(
                    'done' => new CJavaScriptExpression(
                        'function(e, data) { alert(\'done!\'); }'
                    ),
                    'fail' => new CJavaScriptExpression(
                        'function(e, data) { alert(\'fail!\'); }'
                    ),
            ),*/
        )
    );
    ?>