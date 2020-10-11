<?php

class AdminController extends Controller
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
                'actions'=>array('index','getnot'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('view','create','update','chPw','check','st','userinfo','adhome'),
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
    public function actionCheck(){
        if(isset($_GET['check'])) {
            $arrival = $_GET['arrival'];
            $departure = $_GET['departure'];
            if($arrival<=date('Y-m-d') or $arrival>=$departure){
                if($arrival<=date('Y-m-d')){
                    $arrival=date('Y-m-d', strtotime("+1 days"));;
                }
                if($arrival>=$departure) {
                    $departure = date('Y-m-d', strtotime($arrival . "+1 days"));
                }
                Yii::app()->user->setFlash('error', "Sorry, Your Input Seems To Be Error!!!");
                $this->redirect(array('check','arrival'=>$arrival,'departure'=>$departure,'check'=>'Check Availability'));
            }
            $new = array();
            $notIncIdArr = array();
            $allRoomsId = array();
            $totalRoomArr = array();
            $allRooms = Room::model()->findAllByAttributes(array('status'=>'1'));
            foreach($allRooms as $aR){
                $totalRoomArr[] = array('rid'=>$aR->id, 'tot_room'=>$aR->total_such_room);
                $allRoomsId[]=$aR->id;
            }
            $booked = "select customer_id, room_type, SUM(no_of_room) as tot_used_room from tbl_booked_room
            where (`room_status`='0' or `room_status`='1') and (((`check_in` <= '$arrival' and `check_out` >= '$arrival')
            or (`check_in` < '$departure' and `check_out` >= '$departure')
            or (`check_in` >= '$arrival' and `check_out` < '$departure'))) group by `room_type`";
            $connection=Yii::app()->db;
            $bookedRooms = $connection->createCommand($booked)->queryAll();
            $bookedRoomArr = array();
            foreach($bookedRooms as $bR){
                $bookedRoomArr[]=array('rid'=>$bR['room_type'], 'tot_room'=>$bR['tot_used_room']);
            }
            foreach($totalRoomArr as $key=>$value){
                foreach($bookedRoomArr as $key2=>$value2) {
                    if($value['rid']==$value2['rid']){
                        $new[]=array('id'=>$value['rid'], 'room_no'=>((int)$value['tot_room']-(int)$value2['tot_room']));
                        $notIncIdArr[]=$value['rid'];
                        unset($bookedRoomArr[$key]);
                    }
                }
            }
            $aaa = array_diff($allRoomsId, $notIncIdArr);
            $criteria1 = new CDbCriteria();
            $criteria1->condition = 'status=:status';
            $criteria1->params = array('status' => '1');
            $criteria1->addInCondition('id', $aaa);
            $withFullRoom = Room::model()->findAll($criteria1);
            foreach($withFullRoom as $wFR){
                array_push($new, array('id'=>$wFR->id, 'room_no'=>$wFR->total_such_room));
            }
            $current_user=Yii::app()->user->id;
            Yii::app()->session['userView'.$current_user.'returnURL']=Yii::app()->request->Url;
            $this->render('available', array('avail'=>$new));
        }
    }

    public function actionSt(){
        $data = @$_POST['room_data'];     //checked_room_id+'=>'+room_no+'=>'+adult+'=>'+child
        $check_in = @$_POST['check_in'];
        $check_out = @$_POST['check_out'];
        Yii::app()->session['data'] = $data;
        Yii::app()->session['check_in'] = $check_in;
        Yii::app()->session['check_out'] = $check_out;
        $this->redirect(array('admin/userinfo'));
    }

    public function actionUserinfo(){
        $data = Yii::app()->session['data'];
        $check_in= Yii::app()->session['check_in'];
        $check_out=Yii::app()->session['check_out'];
        if(!empty($data) and !empty($check_in) and !empty($check_out)) {
            $model = new CustomerInfo();
            if (isset($_POST['CustomerInfo'])) {
                $model->attributes = $_POST['CustomerInfo'];
                $model->created_on = date('Y-m-d');
                $model->status = '1';
                $model->view_stat = '1';
                if ($model->validate()) {
                    if ($model->save()) {
                        $data_arr = explode(',',$data);
                        foreach($data_arr as $da) {
                            $book_room = new BookedRoom();
                            list($room, $room_no, $adult, $child) = explode('=>', $da); //checked_room_id+'=>'+room_no+'=>'+adult+'=>'+child
                            $book_room->customer_id = $model->id;
                            $book_room->room_type = $room;
                            $book_room->no_of_room = $room_no;
                            $book_room->no_of_adults = $adult;
                            $book_room->no_of_childs = $child;
                            $book_room->check_in = $check_in;
                            $book_room->check_out = $check_out;
                            $book_room->room_status = '0';
                            $book_room->save();
                        }
                        $to = $model->email1;
                        $frmName = Yii::app()->params['adminName'];
                        $sub = "ROOM BOOKING IN $frmName";
                        $message = "Dear $model->first_name $model->last_name,\r\n
                        We have received your booking request.
                     \r\n Thanks\r\n $frmName";
                        $name = '=?UTF-8?B?' . base64_encode($frmName) . '?=';
                        $frmemail = Yii::app()->params['adminEmail'];
                        $subject = '=?UTF-8?B?' . base64_encode($sub) . '?=';
                        $headers = "From: $name <{$frmemail}>\r\n" .
                            "Reply-To: {$frmemail}\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-type: text/plain; charset=UTF-8";
                        mail($to, $subject, $message, $headers);
                        unset(Yii::app()->session['data']);
                        unset(Yii::app()->session['check_in']);
                        unset(Yii::app()->session['check_out']);
                        $this->redirect(array('customerInfo/'.$model->id));
                    }
                }
            }
            $this->render('userinfo', array('model' => $model));
        }else{
            $this->redirect(array('customerInfo/admin'));
        }
    }

    public function actionGetnot(){
        $new_customers = CustomerInfo::model()->findAllByAttributes(array('status'=>'0'));
        $notviewed = CustomerInfo::model()->findAllByAttributes(array('view_stat'=>'0'));
        $countNewCust = count($new_customers);
        $countNotViewed = count($notviewed);
        $currentDate = date('Y-m-d');
        $tommorow = date('Y-m-d', strtotime("+1 days"));

        $contactus = Contact::model()->findAllByAttributes(array('status'=>'0'));

        $sqlArr = "SELECT  b.* from tbl_booked_room b where b.check_in >='$currentDate' and b.check_in <= '$tommorow' and b.room_status = 1 GROUP BY b.customer_id ORDER BY b.check_in ASC";
        $connection=Yii::app()->db;
        $arriving = $connection->createCommand($sqlArr)->queryAll();
        $arrivingCount = count($arriving);

        $sqlPick = "SELECT  c.id, c.pick_up_at_airport, c.status, b.br_id, b.customer_id, b.check_in, b.room_status from tbl_customer_info c, tbl_booked_room b where c.id = b.customer_id and
        c.pick_up_at_airport = 'yes' and c.status = '1' and  b.check_in = '$currentDate' and b.room_status = 1 GROUP BY b.customer_id";
        $connection=Yii::app()->db;
        $pick = $connection->createCommand($sqlPick)->queryAll();

        $sqlLeav = "SELECT  b.* from tbl_booked_room b where b.check_out >='$currentDate' and b.check_out <= '$tommorow' and b.room_status = 1 GROUP BY b.customer_id ORDER BY b.check_out ASC";
        $connection=Yii::app()->db;
        $leaving = $connection->createCommand($sqlLeav)->queryAll();
        $leavingCount = count($leaving);

        echo CJSON::encode(array(
            'countNewCust'=>$countNewCust,
            'countNotViewed'=>$countNotViewed,
            'arrivingCount'=>$arrivingCount,
            'leavingCount'=>$leavingCount,
            'contactCount'=>count($contactus),
            'pickCount' => count($pick),
        ));
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
        $model=new Admin;
        $model->setScenario('createUser');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Admin']))
        {
            $model->attributes=$_POST['Admin'];
            $model->created_date = date('Y-m-d H:i:s');
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

        if(isset($_POST['Admin']))
        {
            $model->attributes=$_POST['Admin'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }
    public function actionChpw(){
        $userAcId = Yii::app()->user->id;
        if(!empty($userAcId)){
            $model = Admin::model()->findByAttributes(array('id'=>$userAcId));
            $model->setScenario('changePwd');
            if(isset($_POST['Admin'])){
                $model->attributes = $_POST['Admin'];
                $valid = $model->validate();
                if($valid){
                    $model->password = $model->new_password;
                    $user = Yii::app()->getComponent('user');
                    if($model->save()){
                        $user->setFlash(
                            'success',
                            "<strong>Password Successfully Changed</strong>"
                        );
//                        $this->redirect(array('AfterPassword','id'=>$userAcId));
                        $this->refresh();
                    }
                    else
                        $user->setFlash(
                            'Error',
                            "<strong>Failed</strong>"
                        );
                }
            }
        }
        $this->render('changePassword',array(
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
        $model=new LoginForm;
        if(!empty(Yii::app()->user->id)){
            $this->redirect(array('admin/adhome'));
        }
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(array('admin/adhome'));
        }
        // display the login form
        $this->renderPartial('login',array('model'=>$model));
    }

    public function actionAdhome(){
        $this->render('adminhome');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Admin('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Admin']))
            $model->attributes=$_GET['Admin'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Admin the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Admin::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Admin $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='admin-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
