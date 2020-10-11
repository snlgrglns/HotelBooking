<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $criteria_sl = new CDbCriteria();
        $criteria_sl->condition = 'status=:status and type=:type';
        $criteria_sl->params = array('status'=>1, 'type'=>'home');
        $criteria_sl->order = 'RAND()';
        $criteria_sl->limit = 3;
        $slider = Slider::model()->findAll($criteria_sl);

        $criteria_rm = new CDbCriteria();
        $criteria_rm->condition = 'image_status=:image_status';
        $criteria_rm->params = array('image_status'=>1);
        $criteria_rm->group = "room_id";
        $roomImages = RoomImages::model()->findAll($criteria_rm);
        $room = Room::model()->findAllByAttributes(array('status'=>1));

        $welcome = Contents::model()->findByAttributes(array('type'=>'welcome','status'=>1));

        $criteria = new CDbCriteria();
        $criteria->condition = 'status=:status';
        $criteria->params = array('status'=>1);
        $criteria->order = "id DESC";
        $criteria->limit = 4;
        $services = Services::model()->findAll($criteria);

        /************************bottom image start**********************************/
//        $criteria_bti = new CDbCriteria();
//        $criteria_bti->condition = 'image_status=:image_status';
//        $criteria_bti->params = array('image_status'=>1);
//        $criteria_bti->order = 'RAND()';
//        $criteria_bti->limit = 10;
//        $bottimages = RoomImages::model()->findAll($criteria_bti);
        $bottimages=null;
        /************************bottom image end**********************************/
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index', array('slider'=>$slider, 'room'=>$room,'services'=>$services,'welcome'=>$welcome,'bottimages'=>$bottimages,'roomImages'=>$roomImages));
    }
    
    public function actionTariff(){
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=:status';
        $criteria->params = array('status'=>1);
        $criteria->order = "room_price ASC";
        $rooms=Room::model()->findAll($criteria);
        $tariff=Contents::model()->findByAttributes(array('type'=>'tariff','status'=>1));
        $this->render('tariff',array('rooms'=>$rooms, 'tariff'=>$tariff));
    }

    public function actionGallery(){
        $criteria = new CDbCriteria();
        $criteria->condition = 'image_status=:image_status';
        $criteria->params = array('image_status'=>1);
        $item_count = RoomImages::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!

        $note = Contents::model()->findByAttributes(array('type'=>'gallery','status'=>1));

        $this->render('gallery',
            array(
                'images'=>RoomImages::model()->findAll($criteria),
                'note'=>$note,
                'item_count'=>$item_count,
                'page_size'=>Yii::app()->params['listPerPage'],
                'pages'=>$pages,
            ));
    }

    public function actionTestimonial(){
        $test = Testimonials::model()->findAllByAttributes(array('status'=>1));
        $this->render('testimonials',array('test'=>$test));
    }

    public function actionAbout(){
        $about = Contents::model()->findByAttributes(array('type'=>'about','status'=>1));

        $criteria_fsl = new CDbCriteria();
        $criteria_fsl->condition = 'status=:status and type=:type';
        $criteria_fsl->params = array('status'=>1, 'type'=>'about');
        $criteria_fsl->order = 'RAND()';
        $criteria_fsl->limit = 5;
        $forflex = Slider::model()->findAll($criteria_fsl);

        $criteria = new CDbCriteria();
        $criteria->condition = 'status=:status';
        $criteria->params = array('status'=>1);
        $criteria->order = "id DESC";
        $services = Services::model()->findAll($criteria);

        $staff = Staff::model()->findAllByAttributes(array('status'=>1));

        $this->render('about',array('about'=>$about,'services'=>$services,'sliders'=>$forflex,'staff'=>$staff));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    public function actionCheck(){
        if(isset($_GET['check'])) {
            $arrival = $_GET['arrival'];
            $departure = $_GET['departure'];
            Yii::app()->session['check_in'] = $arrival;
            Yii::app()->session['check_out'] = $departure;

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

    public function actionAboutrm($id){
        $abtroom = Room::model()->findByPk($id);
        if($abtroom->status == 1) {
            $criteria_fsl = new CDbCriteria();
            $criteria_fsl->condition = 'room_id=:room_id and image_status=:image_status';
            $criteria_fsl->params = array('room_id' => $id, 'image_status' => 1);
            $criteria_fsl->order = 'RAND()';
            $criteria_fsl->limit = 5;
            $sliders = RoomImages::model()->findAll($criteria_fsl);

            $criteria_oth = new CDbCriteria();
            $criteria_oth->condition = 'room_id!=:room_id and image_status=:image_status';
            $criteria_oth->params = array('room_id' => $id, 'image_status' => 1);
            $criteria_oth->group = "room_id";
            $other_rooms = RoomImages::model()->findAll($criteria_oth);

            $this->render('aboutroom', array('room' => $abtroom,'sliders'=>$sliders,'others'=>$other_rooms));
        }else{
            $this->redirect(array('index'));
        }
    }

    public function actionSt(){
        $data = @$_POST['room_data'];     //checked_room_id+'=>'+room_no+'=>'+adult+'=>'+child
        $check_in = @$_POST['check_in'];
        $check_out = @$_POST['check_out'];
        Yii::app()->session['data'] = $data;
        Yii::app()->session['check_in'] = $check_in;
        Yii::app()->session['check_out'] = $check_out;
        $this->redirect(array('userinfo'));
    }

    public function actionUserinfo(){
        $data = Yii::app()->session['data'];
        $check_in= Yii::app()->session['check_in'];
        $check_out=Yii::app()->session['check_out'];
        $model = new CustomerInfo();
        if(!empty($data) and !empty($check_in) and !empty($check_out)) {
            $model->setScenario('bookCust');
//            $this->performAjaxValidation($model);
            if (isset($_POST['CustomerInfo'])) {
                $model->attributes = $_POST['CustomerInfo'];
                $model->created_on = date('Y-m-d');
                $model->status = '0';
                $model->view_stat = '0';
                if ($model->validate()) {
                    if ($model->save()){
                        $data_arr = explode(',',$data);
                        foreach($data_arr as $da) {
                            $book_room = new BookedRoom();
                            list($room, $room_no, $adult, $child) = explode('=>', $da); //checked_room_id+'=>'+room_no+'=>'+adult+'=>'+child
                            $book_room->customer_id = $model->id;
                            $book_room->room_type = $room;
//                            $book_room->category = $cat;
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
                        $ownmail = $frmemail.','.'blink.asym@gmail.com';
                        $msgtoown = "Room Booked By $model->first_name $model->last_name";
                        mail($ownmail, 'New Room Book', $msgtoown, $headers);
                        $this->redirect(Yii::app()->createUrl('site/booked'));
                        exit();
                    }
                }
            }
            $this->render('userinfo', array('model' => $model));
        }else{
            $this->redirect(array('index'));
        }
    }


    public function actionBooked(){
        unset(Yii::app()->session['data']);
        unset(Yii::app()->session['check_in']);
        unset(Yii::app()->session['check_out']);

        $this->render('bookingdone');
    }

    public function actionContactUs(){
        $address = Address::model()->findByAttributes(array('status'=>'1'));
        $this->render('contact_us',array('address'=>$address));
    }

    public function actionServices(){
        $criteria = new CDbCriteria();
        $criteria->condition = 'status=:status';
        $criteria->params = array('status'=>1);
        $criteria->order = "id DESC";
        $services = Services::model()->findAll($criteria);
        $this->render('services',array('services'=>$services));
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='booked-room-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    /**
     * Displays the login page
     */
    /*	public function actionLogin()
        {
        }*/

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array('admin/'));
    }
}