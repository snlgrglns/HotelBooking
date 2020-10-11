<?php

class RoomController extends Controller
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
				'actions'=>array('index','view','create','update','abtrm'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','open','close'),
				'users'=>array('admin','augustlake'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionAbtrm($id){
        $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
        $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl."/uploads/"; // URL for the uploads folder
        $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath."/../uploads/"; // path to the uploads folder

        $model = Room::model()->findByPk($id);

        if(isset($_POST['abtrm']))
        {
            $desc = $_POST['c'];
            if($model->saveAttributes(array('description'=>$desc))){
                Yii::app()->user->setFlash('success', "Successfully Saved!!!");
                $this->redirect(array('room/admin'));
            }else{
                Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
            }
        }
        $this->render('abtrm',array('model'=>$model));
	}

	public function actionOpen($id){
        $room = Room::model()->findByPk($id);
        if($room->saveAttributes(array('status'=>1))){
            Yii::app()->user->setFlash('success', "Success!! $room->room_type room changed to open!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('room/admin'));
	}

	public function actionClose($id){
        $room = Room::model()->findByPk($id);
		$roomImages = RoomImages::model()->findAllByAttributes(array('room_id'=>$id));
        if($room->saveAttributes(array('status'=>0))){
			if(!empty($roomImages)){
				foreach($roomImages as $rI){
					$rI->saveAttributes(array('image_status'=>0));
				}
			}
            Yii::app()->user->setFlash('success', "Success!! $room->room_type room changed to close!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('room/admin'));
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
		$model=new Room;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			$model->status = 1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
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
		$dataProvider=new CActiveDataProvider('Room');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Room('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Room']))
			$model->attributes=$_GET['Room'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Room the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Room::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Room $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
