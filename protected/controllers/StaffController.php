<?php

class StaffController extends Controller
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
                'actions'=>array('index','view', 'create','update','activate','deactivate'),
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
        $staff = Staff::model()->findByPk($id);
        if($staff->saveAttributes(array('status'=>'1'))){
            Yii::app()->user->setFlash('success', "Successfully Activated!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('staff/admin'));
    }

    public function actionDeactivate($id){
        $staff = Staff::model()->findByPk($id);
        if($staff->saveAttributes(array('status'=>'0'))){
            Yii::app()->user->setFlash('success', "Successfully DeActivated!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('staff/admin'));
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
        $model=new Staff;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Staff']))
        {
            $model->attributes=$_POST['Staff'];
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $fileName = time().'_'.$uploadedFile;  // $timestamp + file name
            $model->image = $fileName;
            $model->status = 1;
            if($model->save()) {
                $folder = Yii::app()->basePath . '/../images/staff/' . $model->id;
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
        $model=$this->loadModel($id);
        $prevImg = $model->image;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Staff']))
        {
            $model->attributes=$_POST['Staff'];
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $fileName = time().'_'.$uploadedFile;  // $timestamp + file name
            if(empty($uploadedFile)){
                $model->image = $prevImg;
            }else{
                $model->image = $fileName;
            }
            if($model->save()){
                $folder = Yii::app()->basePath . '/../images/staff/' . $model->id;
                $destination = $folder . '/' . $fileName;
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                if(!empty($uploadedFile)){
                    $folder = Yii::app()->basePath . '/../images/staff/'.$model->id.'/';

                    unlink($folder.$prevImg);
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
        $dataProvider=new CActiveDataProvider('Staff');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Staff('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Staff']))
            $model->attributes=$_GET['Staff'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Staff the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Staff::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Staff $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='staff-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
