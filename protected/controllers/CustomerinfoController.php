<?php

class CustomerInfoController extends Controller
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
                'actions'=>array('create','update','index','view'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','print','notviewed','pending','verify','cancel','arriving','leaving','pickup'),
                'users'=>array('admin','augustlake'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionVerify($id){
        $customer = CustomerInfo::model()->findByPk($id);
        $bookRooms = BookedRoom::model()->findAllByAttributes(array('customer_id'=>$id));
        if($customer->saveAttributes(array('status'=>'1'))){
            foreach($bookRooms as $bR){
                $bR->saveAttributes(array('room_status'=>'1'));
            }
            Yii::app()->user->setFlash('success', "Successfull Verified!!!");
        }
        $this->redirect(array('/customerInfo/view/'.$id));
    }
    public function actionCancel($id){
        $customer = CustomerInfo::model()->findByPk($id);
        $bookRooms = BookedRoom::model()->findAllByAttributes(array('customer_id'=>$id));
        if($customer->saveAttributes(array('status'=>'2'))){
            foreach($bookRooms as $bR){
                $bR->saveAttributes(array('room_status'=>'2'));
            }
            Yii::app()->user->setFlash('success', "Successfully Cancelled!!!");
        }
        $this->redirect(array('/customerInfo/view/'.$id));
    }
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->loadModel($id)->saveAttributes(array('view_stat'=>'1'));
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionPrint(){
        $id = $_GET['id'];
        $this->render('printInfo',array(
            'model'=>$this->loadModel($id),
        ));
    }


    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new CustomerInfo;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['CustomerInfo']))
        {
            $model->attributes=$_POST['CustomerInfo'];
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
        $model->saveAttributes(array('view_stat'=>'1'));
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['CustomerInfo']))
        {
            $model->attributes=$_POST['CustomerInfo'];
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
        $dataProvider=new CActiveDataProvider('CustomerInfo');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new CustomerInfo('search');
        $model->unsetAttributes();
        if(isset($_GET['CustomerInfo']))
            $model->attributes=$_GET['CustomerInfo'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }
    public function actionNotviewed()
    {
        $model=new CustomerInfo('search');
        $model->unsetAttributes();
        $model->view_stat = 0;
        if(isset($_GET['CustomerInfo']))
            $model->attributes=$_GET['CustomerInfo'];

        $this->render('pend_notview',array(
            'model'=>$model,'msg'=>'Manage Not Viewed Customers',
        ));
    }
    public function actionPending()
    {
        $model=new CustomerInfo('search');
        $model->unsetAttributes();
        $model->status = 0;
        if(isset($_GET['CustomerInfo']))
            $model->attributes=$_GET['CustomerInfo'];

        $this->render('pend_notview',array(
            'model'=>$model,'msg'=>'Manage Pending Customers',
        ));
    }

    public function actionPickup()
    {
        $currentDate = date('Y-m-d');
        $sqlPick = "SELECT  c.id, c.pick_up_at_airport, c.status, b.br_id, b.customer_id, b.check_in, b.room_status from tbl_customer_info c, tbl_booked_room b where c.id = b.customer_id and
        c.pick_up_at_airport = 'yes' and c.status = '1' and  b.check_in = '$currentDate' and b.room_status = 1 GROUP BY b.customer_id";
        $connection=Yii::app()->db;
        $pick = $connection->createCommand($sqlPick)->queryAll();
        foreach($pick as $p){
            $cust_id[]=$p['customer_id'];
        }
        $model=new CustomerInfo('search');
        $model->unsetAttributes();
        if(!empty($pick)) {
            $model->id = $cust_id;
        }else{
            $model->id = 'fafdasfd';
        }
        if(isset($_GET['CustomerInfo']))
            $model->attributes=$_GET['CustomerInfo'];

        $this->render('pickup',array(
            'model'=>$model,
        ));
    }

    public function actionArriving()
    {
        $currentDate = date('Y-m-d');
        $sqlArr = "SELECT  b.customer_id  from tbl_booked_room b where b.check_in >='$currentDate' and b.room_status = 1 GROUP BY b.customer_id ORDER BY b.check_in ASC";
        $connection=Yii::app()->db;
        $arriving = $connection->createCommand($sqlArr)->queryAll();
        foreach($arriving as $arr){
            $cust_id[]=$arr['customer_id'];
        }
        $model=new CustomerInfo('search');
        $model->unsetAttributes();
        if(!empty($arriving)) {
            $model->id = $cust_id;
        }else{
            $model->id = 'fafdasfd';
        }
        if(isset($_GET['CustomerInfo']))
            $model->attributes=$_GET['CustomerInfo'];

        $this->render('checkingIn',array(
            'model'=>$model,
        ));
    }
    public function actionLeaving()
    {
        $currentDate = date('Y-m-d');
        $sqlArr = "SELECT  b.customer_id  from tbl_booked_room b where b.check_in <= '$currentDate' and b.check_out >='$currentDate' and b.room_status = 1 GROUP BY b.customer_id ORDER BY b.check_out ASC";
        $connection=Yii::app()->db;
        $arriving = $connection->createCommand($sqlArr)->queryAll();
        foreach($arriving as $arr){
            $cust_id[]=$arr['customer_id'];
        }
        $model=new CustomerInfo('search');
        $model->unsetAttributes();
        if(!empty($cust_id)) {
            $model->id = $cust_id;
        }else{
            $model->id = 'fadadfasd';
        }
        if(isset($_GET['CustomerInfo']))
            $model->attributes=$_GET['CustomerInfo'];

        $this->render('checkingOut',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CustomerInfo the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=CustomerInfo::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CustomerInfo $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='customer-info-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
