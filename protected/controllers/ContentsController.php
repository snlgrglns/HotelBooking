<?php

class ContentsController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','welcome','about','gallery','tariff','activate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','augustlake'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionActivate($id){
        $content = Contents::model()->findByPk($id);
        $prevAc = Contents::model()->findAllByAttributes(array('type'=>$content->type,'status'=>1));
        if($content->saveAttributes(array('status'=>'1'))){
            foreach($prevAc as $pA){
                $pA->saveAttributes(array('status'=>'0'));
            }
        }
        $current_user=Yii::app()->user->id;
        $this->redirect(Yii::app()->session['userView'.$current_user.'returnURL']);
    }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
		$_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl."/uploads/"; // URL for the uploads folder
		$_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath."/../uploads/"; // path to the uploads folder
		$model=new Contents;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contents']))
		{
			$model->attributes=$_POST['Contents'];
            $model->content = $_POST['c'];
			if($model->save()){
                $actives = Contents::model()->findAllByAttributes(array('status'=>1,'type'=>$model->type));
                foreach($actives as $active) {
                    $active->saveAttributes(array('status' => 0));
                }
                $model->saveAttributes(array('status' => 1));
                $this->redirect(array('/contents/'.$model->type));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
		$_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl."/uploads/"; // URL for the uploads folder
		$_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath."/../uploads/"; // path to the uploads folder
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contents']))
		{
			$model->attributes=$_POST['Contents'];
            $model->content = $_POST['c'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Contents');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $current_user=Yii::app()->user->id;
        Yii::app()->session['userView'.$current_user.'returnURL']=Yii::app()->request->Url;
		$model=new Contents('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contents']))
			$model->attributes=$_GET['Contents'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionWelcome()
    {
        $current_user=Yii::app()->user->id;
        Yii::app()->session['userView'.$current_user.'returnURL']=Yii::app()->request->Url;
        $model=new Contents('search');
        $model->unsetAttributes();  // clear any default values
        $model->type = 'welcome';
        if(isset($_GET['Contents']))
            $model->attributes=$_GET['Contents'];

        $this->render('welcome',array(
            'model'=>$model,
        ));
    }
    
    public function actionTariff()
	{
		$current_user=Yii::app()->user->id;
		Yii::app()->session['userView'.$current_user.'returnURL']=Yii::app()->request->Url;
		$model=new Contents('search');
		$model->unsetAttributes();  // clear any default values
		$model->type = 'tariff';
		if(isset($_GET['Contents']))
			$model->attributes=$_GET['Contents'];

		$this->render('tariff',array(
			'model'=>$model,
		));
	}

    public function actionAbout()
    {
        $current_user=Yii::app()->user->id;
        Yii::app()->session['userView'.$current_user.'returnURL']=Yii::app()->request->Url;
        $model=new Contents('search');
        $model->unsetAttributes();  // clear any default values
        $model->type = 'about';
        if(isset($_GET['Contents']))
            $model->attributes=$_GET['Contents'];

        $this->render('about',array(
            'model'=>$model,
        ));
    }

	public function actionGallery()
	{
		$current_user=Yii::app()->user->id;
		Yii::app()->session['userView'.$current_user.'returnURL']=Yii::app()->request->Url;
		$model=new Contents('search');
		$model->unsetAttributes();  // clear any default values
		$model->type = 'gallery';
		if(isset($_GET['Contents']))
			$model->attributes=$_GET['Contents'];

		$this->render('gallery',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Contents the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Contents::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Contents $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contents-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}