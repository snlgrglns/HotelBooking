<?php

class RestroAboutusController extends Controller
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
		$resab = RestroAboutus::model()->findByPk($id);
		$prevAc = RestroAboutus::model()->findAllByAttributes(array('status'=>1));
		if($resab->saveAttributes(array('status'=>'1'))){
			foreach($prevAc as $pA){
				$pA->saveAttributes(array('status'=>'0'));
			}
		}
		$this->redirect(array('restroAboutus/admin'));
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
		$model=new RestroAboutus;
        $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
        $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl."/uploads/"; // URL for the uploads folder
        $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath."/../uploads/"; // path to the uploads folder
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RestroAboutus']))
		{
			$model->attributes=$_POST['RestroAboutus'];
			$uploadedFile = CUploadedFile::getInstance($model, 'image');
            $model->content = $_POST['c'];
			$fileName = time().'_'.$uploadedFile;  // $timestamp + file name
			$model->image = $fileName;
			if($model->save()) {
				$actives = RestroAboutus::model()->findAllByAttributes(array('status'=>1));
				foreach($actives as $active) {
					$active->saveAttributes(array('status' => 0));
				}
				$model->saveAttributes(array('status' => 1));
				$folder = Yii::app()->basePath . '/../images/restro_abtus/' . $model->id;
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
        $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
        $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl."/uploads/"; // URL for the uploads folder
        $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath."/../uploads/"; // path to the uploads folder
		$model=$this->loadModel($id);
        $prevImg = $model->image;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RestroAboutus']))
		{
			$model->attributes=$_POST['RestroAboutus'];
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $fileName = time().'_'.$uploadedFile;  // $timestamp + file name
            if(empty($uploadedFile)){
                $model->image = $prevImg;
            }else{
                $model->image = $fileName;
            }
            $model->content = $_POST['c'];
            if($model->save()) {
                $folder = Yii::app()->basePath . '/../images/restro_abtus/' . $model->id;
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
		$dataProvider=new CActiveDataProvider('RestroAboutus');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RestroAboutus('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RestroAboutus']))
			$model->attributes=$_GET['RestroAboutus'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RestroAboutus the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RestroAboutus::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RestroAboutus $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='restro-aboutus-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
