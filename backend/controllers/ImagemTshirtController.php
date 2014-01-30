<?php

class ImagemTshirtController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('upload','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionUpload(){
        header('Vary: Accept');
        if (isset($_SERVER['HTTP_ACCEPT']) &&
            (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false))
        {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }
        $data = array();
        $this->init( );
        $model = new ImagemTshirt('upload');
        $model->picture = CUploadedFile::getInstance($model, 'Path');
        //die(var_dump($model->picture));
        if ($model->picture !== null  && $model->validate(array('picture')))
        {
            $model->picture->saveAs(
            'uploads/'.$model->picture->name);
            $model->Path = $model->picture->name;
            $model->TipoImagem = Yii::app()->request->getPost('tipo', '');
            //die(var_dump($_REQUEST));
            $model->IDTShirt = Yii::app()->request->getPost('Tid', '');
            // save picture name

            if( $model->save())
            {
                // return data to the fileuploader
                $data[] = array(
                    'name' => $model->picture->name,
                    'type' => $model->picture->type,
                    'size' => $model->picture->size,
                    'tipo' => Yii::app()->request->getPost('tipo', ''),
                    // we need to return the place where our image has been saved
                    'url' => $model->getImageUrl(), // Should we add a helper method?
                    // we need to provide a thumbnail url to display on the list
                    // after upload. Again, the helper method now getting thumbnail.
                    'thumbnail_url' => $model->getImageUrl(true),
                    // we need to include the action that is going to delete the picture
                    // if we want to after loading
                    'delete_url' => $this->createUrl('ImagemTshirt/delete',
                        array('id' => $model->ID, 'method' => 'uploader')),
                    'delete_type' => 'POST');
            } else {
                if(Yii::app()->request->getPost('tipo', '') == "null"){
                    unlink('uploads/'.$model->Path);
                    $data[] = array('error' => 'Tem de Especificar um tipo, tente de novo!');
                }else{
                    $data[] = array('error' => 'Unable to save model after saving picture');
                }
            }
        } else {
            if ($model->hasErrors('picture'))
            {
                $data[] = array('error', $model->getErrors('picture'));
            } else {
                throw new CHttpException(500, "Could not upload file ".     CHtml::errorSummary($model));
            }
        }
        // JQuery File Upload expects JSON data
        echo json_encode($data);
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	    $model = $this->loadModel($id);
		if ($this->loadModel($id)->delete()){
    	    unlink('uploads/'.$model->Path);
    	    unlink('uploads/'.$model->Path.'_thumb');
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : Yii::app()->request->getUrlReferrer(true));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ImagemTshirt the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ImagemTshirt::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}