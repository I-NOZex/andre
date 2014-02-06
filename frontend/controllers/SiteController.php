<?php
/**
 * SiteController.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/23/12
 * Time: 12:25 AM
 */
class SiteController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	//public $img='http://placehold.it/500x500&text=Logo';
	public $img;
	public $detail=array(
        "Bem Vindo!",
        "Funny<em>shirt</em> é o seu site online de compra de T-Shirts personalizadas.<br />Boas Compras!"
    );

	public function accessRules() {
		return array(
			// not logged in users should be able to login and view captcha images as well as errors
			array('allow', 'actions' => array('index', 'captcha', 'login', 'error', 'view','carrinho','removerArtigo','AtualizarArtigo')),
			// logged in users can do whatever they want to
			array('allow', 'users' => array('CheckOut')),
			// not logged in users can't do anything except above
			array('deny'),
		);
	}

	/**
	 * Declares class-based actions.
	 * @return array
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
		);
	}

	/* open on startup */
	public function actionIndex() {
        $criteria = new CDbCriteria();
        //your criterias to get your data

        $dataProvider = new CActiveDataProvider('Tshirt',
                        array(
                                'criteria'  => $criteria,
                        )
                    );

		$this->render('index',array('dataProvider'=>$dataProvider));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    $model = $this->loadModel($id);
        $errors = false;
        if(isset($_POST['CartValidator'])){
            $errors = $this->validate($id,$model);
            if(!$errors){
                Yii::app()->shoppingCart->put($model,$_POST['CartValidator']['quantidade']);
                Yii::app()->session["tamanho[".$id."]"] = $_POST['CartValidator']['tamanho'];
            }
        }
		$this->render('view',array(
			'model'=>$model,
            'errors'=>$errors
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionCarrinho()
    {
        $errors = false;
        if(isset($_POST['CartValidator']))
            $errors = $this->validate($id,$model);
		$this->render('carrinho',array('errors'=>$errors));
	}

	public function actionRemoverArtigo($id)
	{
	    $tshirt = $this->loadModel($id);
		Yii::app()->shoppingCart->remove($tshirt->getId());
        unset(Yii::app()->session["tamanho[".$id."]"]);
        $this->redirect(Yii::app()->createUrl('/site/carrinho'));
	}

	public function actionAtualizarArtigo($id)
	{
	    //die(var_dump($_POST['quantidade']));
        if(isset($_POST['quantidade'])){
            $model = $this->loadModel($id);
            $rules = array(
                array('quantidade', 'required'),
                array('quantidade', 'numerical',
                        'integerOnly'=>true,
                        'min'=>1,
                        'tooSmall'=>'Deve adicionar pelo menos 1 artigo!'),
                );
            $errors = $this->validate($id,$model,$rules);
            if(!$errors){
                Yii::app()->shoppingCart->update($model,$_POST['quantidade']);
            }
        }
        $this->redirect(Yii::app()->createUrl('/site/carrinho'));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCheckOut()
	{
		$model=new Encomenda;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Encomenda']))
		{
			$model->attributes=$_POST['Encomenda'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDEncomenda));
		}

		$this->render('checkout',array(
			'model'=>$model,
		));
	}

    public function validate($id,$model,$rules = false){
	    $errors = false;
		if(isset($_POST['CartValidator']))
		{
            if ($rules == false){
            $rules = array(
                array('quantidade, tamanho', 'required'),
                array('tamanho','in','range'=>array('xs','s','m','l','xl','xxl','xxxl'),'allowEmpty'=>false),
                array('quantidade', 'numerical',
                        'integerOnly'=>true,
                        'min'=>1,
                        'tooSmall'=>'Deve adicionar pelo menos 1 artigo!'),
                );
            }

            //die(var_dump($_POST));
            $errors = CartValidator::validateValues($rules);

        }
        return $errors;
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Tshirt::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


}