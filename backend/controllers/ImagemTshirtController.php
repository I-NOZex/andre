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
				'actions'=>array('upload','upload2'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionUpload2(){
        header('Vary: Accept');
        if (isset($_SERVER['HTTP_ACCEPT']) &&
            (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false))
        {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }
        $data = array();

        $model = new ImagemTshirt('upload');
        $model->picture = CUploadedFile::getInstance($model, 'Path');
        //die(var_dump($model->picture));
        if ($model->picture !== null  && $model->validate(array('picture')))
        {
            $model->picture->saveAs(
            'uploads/'.$model->picture->name);
            $model->Path = $model->picture->name;
            // save picture name

            if( $model->save())
            {
                // return data to the fileuploader
                $data[] = array(
                    'name' => $model->picture->name,
                    'type' => $model->picture->type,
                    'size' => $model->picture->size,
                    // we need to return the place where our image has been saved
                    //'url' => $model->getImageUrl(), // Should we add a helper method?
                    // we need to provide a thumbnail url to display on the list
                    // after upload. Again, the helper method now getting thumbnail.
                    //'thumbnail_url' => $model->getImageUrl(ImagemTshirt::IMG_THUMBNAIL),
                    // we need to include the action that is going to delete the picture
                    // if we want to after loading
                    'delete_url' => $this->createUrl('ImagemTshirt/delete',
                        array('id' => $model->ID, 'method' => 'uploader')),
                    'delete_type' => 'POST');
            } else {
                $data[] = array('error' => 'Unable to save model after saving picture');
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

    public function actionUpload(){
        $this->render('upload');
    }

}