<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="en"/>

	<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon"/>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
	      media="screen, projection"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
	      media="print"/>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
	      media="screen, projection"/>
	<![endif]-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container-fluid" id="page">
    <?php if (Yii::app()->user->isGuest){
        $this->renderPartial('//layouts/menu');
    }else if(Yii::app()->user->isAdmin()){
        $this->renderPartial('//layouts/menu_admin');
    }else if (Yii::app()->user->hasRole('Uploader')){
        $this->renderPartial('//layouts/menu_uploader');
    }?>
	<!-- mainmenu -->
	<div class="container-fluid no_padding" style="margin-top:65px">
		<?php if (isset($this->breadcrumbs)): ?>
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		<?php endif?>
		<?php echo $content; ?>
	</div>
    <div id="footer">
    <hr />
        Copyright &copy; <?php echo date('Y'); ?> <b><?php echo CHtml::encode(Yii::app()->name);?></b>.<br/>
        Todos os direitos reservados.
    </div>
    <!-- footer -->
</div>
<!-- page -->
</body>
</html>