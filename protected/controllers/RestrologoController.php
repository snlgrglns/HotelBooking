<?php

class RestroLogoController extends Controller
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
				'actions'=>array('index','view','create','update','activate'),
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
		$logo = RestroLogo::model()->findByPk($id);
		$prevAc = RestroLogo::model()->findAllByAttributes(array('status'=>1));
		if($logo->saveAttributes(array('status'=>'1'))){
			foreach($prevAc as $pA){
				$pA->saveAttributes(array('status'=>'0'));
			}
		}
		$this->redirect(array('restroLogo/admin'));
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
		$model=new RestroLogo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RestroLogo']))
		{
			$model->attributes=$_POST['RestroLogo'];
			$uploadedFile = CUploadedFile::getInstance($model, 'logo');
			$fileName = time().'_'.$uploadedFile;  // $timestamp + file name
			$model->logo = $fileName;
			if($model->save()) {
				$actives = RestroLogo::model()->findAllByAttributes(array('status'=>1));
				foreach($actives as $active) {
					$active->saveAttributes(array('status' => 0));
				}
				$model->saveAttributes(array('status' => 1));
				$folder = Yii::app()->basePath . '/../images/restro_logo/' . $model->id;
				$destination = $folder . '/' . $fileName;
				if (!is_dir($folder)) {
					mkdir($folder);
				}
				if(!empty($uploadedFile)){
					$uploadedFile->saveAs($destination);
				}
				$this->redirect(array('admin'));
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
		$model=$this->loadModel($id);
        $prevImg = $model->logo;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RestroLogo']))
		{
			$model->attributes=$_POST['RestroLogo'];
            $uploadedFile = CUploadedFile::getInstance($model, 'logo');
            $fileName = time().'_'.$uploadedFile;  // $timestamp + file name
            if(empty($uploadedFile)){
                $model->logo = $prevImg;
            }else{
                $model->logo = $fileName;
            }
            if($model->save()) {
                $folder = Yii::app()->basePath . '/../images/restro_logo/' . $model->id;
                $destination = $folder . '/' . $fileName;
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                if(!empty($uploadedFile)){
                    $uploadedFile->saveAs($destination);
                }
                $this->redirect(array('admin'));
            }
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
		$dataProvider=new CActiveDataProvider('RestroLogo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RestroLogo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RestroLogo']))
			$model->attributes=$_GET['RestroLogo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RestroLogo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RestroLogo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RestroLogo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='restro-logo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
