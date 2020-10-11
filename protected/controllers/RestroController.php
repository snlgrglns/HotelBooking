<?php

class RestroController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column3';

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
                'actions'=>array('index','restrocontact'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array(),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array(),
                'users'=>array('admin','augustlake'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='contact')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRestrocontact(){
        $model=new Contact;
        $model->name=$_POST['name'];
        $model->email=$_POST['email'];
        $model->message=$_POST['message'];
        $model->status = 0;
        $model->type='restro';
        $model->received_on = date('Y-m-d H:i:s');
        if($model->save()){
            echo CJSON::encode(array(
                    'msg'=>'yes',
                )
            );
        }
    }

    public function actionIndex(){
        $logo = RestroLogo::model()->findByAttributes(array('status'=>'1'));
        $left_mov_img = RestroLeftImg::model()->findByAttributes(array('status'=>'1'));

        $criteria_sl = new CDbCriteria();
        $criteria_sl->condition = 'status=:status';
        $criteria_sl->params = array('status'=>1);
        $criteria_sl->order = 'RAND()';
        $criteria_sl->limit = 3;
        $restro_slider = RestroSlider::model()->findAll($criteria_sl);

        $restro_abt = RestroAboutus::model()->findByAttributes(array('status'=>'1'));

        $restro_openings=RestroOpeningHrs::model()->findAll();

        $menuscat=RestroMenuCategory::model()->findAllByAttributes(array('status'=>'1'));

        $tests = Testimonials::model()->findAllByAttributes(array('status'=>1));
        $this->render('index', array('logo'=>$logo, 'restro_slider'=>$restro_slider,'left_mov_img'=>$left_mov_img,
            'restro_abt'=>$restro_abt,'restro_openings'=>$restro_openings,'tests'=>$tests,'menuscat'=>$menuscat));
    }
}
