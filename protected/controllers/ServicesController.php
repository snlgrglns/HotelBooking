<?php

class ServicesController extends Controller
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
				'actions'=>array('index','view','create','update','activate','deactivate'),
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
        $service = Services::model()->findByPk($id);
        if($service->saveAttributes(array('status'=>1))){
            Yii::app()->user->setFlash('success', "Success!! $service->heading room changed to active state!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('services/admin'));
    }

    public function actionDeactivate($id){
        $service = Services::model()->findByPk($id);
        if($service->saveAttributes(array('status'=>0))){
            Yii::app()->user->setFlash('success', "Success!! $service->heading room changed to deactive state!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('services/admin'));
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
		$model=new Services;
//        $model->setScenario('servCreate');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$model->attributes=$_POST['Services'];
            $uploadedFile = CUploadedFile::getInstance($model, 'icon_image');
            $fileName = time().'_'.$uploadedFile;  // $timestamp + file name
            $model->icon_image = $fileName;
			$model->status = '1';
            $model->full_description = $_POST['c'];
			if($model->save()) {
                $folder = Yii::app()->basePath . '/../images/services/' . $model->id;
                $destination = $folder . '/' . $fileName;
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                if(!empty($uploadedFile)){
                    $uploadedFile->saveAs($destination);
                }
                $this->redirect(array('view', 'id' => $model->id));
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
        $prevImg = $model->icon_image;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$model->attributes=$_POST['Services'];
            $uploadedFile = CUploadedFile::getInstance($model, 'icon_image');
            $fileName = time().'_'.$uploadedFile;  // $timestamp + file name
            if(empty($uploadedFile)){
                $model->icon_image = $prevImg;
            }else{
                $model->icon_image = $fileName;
            }
            $model->status = '1';
            $model->full_description = $_POST['c'];
			if($model->save()){
                $folder = Yii::app()->basePath . '/../images/services/' . $model->id;
                $destination = $folder . '/' . $fileName;
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                if(!empty($uploadedFile)){
                    $uploadedFile->saveAs($destination);
                }
                $this->redirect(array('view', 'id' => $model->id));
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
		$dataProvider=new CActiveDataProvider('Services');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Services('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Services']))
			$model->attributes=$_GET['Services'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Services the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Services::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Services $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='services-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
