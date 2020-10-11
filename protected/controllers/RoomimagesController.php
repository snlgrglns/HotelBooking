<?php

class RoomImagesController extends Controller
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

    public function actionActivate($id)
    {
        $roomImg = RoomImages::model()->findByPk($id);
        if($roomImg->saveAttributes(array('image_status'=>1))){
            Yii::app()->user->setFlash('success', "Successfully Activated!!!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('roomimages/create/'.$roomImg->room_id));
    }

    public function actionDeactivate($id)
    {
        $roomImg = RoomImages::model()->findByPk($id);
        if($roomImg->saveAttributes(array('image_status'=>0))){
            Yii::app()->user->setFlash('success', "Successfully DeActivated!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('roomimages/create/'.$roomImg->room_id));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id)
    {
        $modelsrch=new RoomImages('search');
        $modelsrch->unsetAttributes();  // clear any default values
        $modelsrch->room_id = $id;
        if(isset($_GET['RoomImages']))
            $modelsrch->attributes=$_GET['RoomImages'];

        $model=new RoomImages;
        $room = Room::model()->findByPk($id);
        $model->setScenario('upImage');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['RoomImages']))
        {
            $model->attributes=$_POST['RoomImages'];
            $images = CUploadedFile::getInstancesByName('image');
            $folder = Yii::app()->basePath . '/../images/roomImages/fullsized/';
            $folderthmb = Yii::app()->basePath . '/../images/roomImages/thumbs/';
            if ($model->validate()) {
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                if (!is_dir($folderthmb)) {
                    mkdir($folderthmb);
                }
                foreach($images as $image=>$i){
                    $rand = rand(0, 99999);
                    $model1=new RoomImages();
                    $fileName = time().'_'.$rand;
                    $type=$i->extensionName;
                    $destination = $folder.'/'.$fileName.'.'.$type;
                    $model1->room_id = $id;
                    $model1->image = $fileName.'.'.$type;
                    $model1->image_status = '1';
                    if($model1->save()){
                        if($i->saveAs($destination)){
                            $this->createThumbnail($model1->image, $type);
                        }
                    }
                }
            }
            $this->redirect(array('/roomimages/create/'.$id));
        }

        $this->render('create',array(
            'model'=>$model,
            'room_name'=>$room->room_type,
            'modelsrch'=>$modelsrch
        ));
    }

    public function createThumbnail($filename, $type) {
        $final_width_of_image = 400;
        $med_width_of_image = 1000;
        $path_to_image_directory = 'images/roomImages/fullsized/';
        $path_to_medium_directory = 'images/roomImages/medium/';
        $path_to_thumbs_directory = 'images/roomImages/thumbs/';
        if(strcasecmp($type, 'jpeg') == 0 or strcasecmp($type, 'jpg') == 0) {
            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
        } else if (strcasecmp($type, 'gif') == 0) {
            $im = imagecreatefromgif($path_to_image_directory . $filename);
        } else if (strcasecmp($type, 'png') == 0) {
            $im = imagecreatefrompng($path_to_image_directory . $filename);
        }

        $ox = imagesx($im);
        $oy = imagesy($im);

        $nx = $final_width_of_image;
        $ny = 400;

        $nxmed = $med_width_of_image;
        $nymed = floor($oy * ($med_width_of_image / $ox));

        $nm = imagecreatetruecolor($nx, $ny);
        $nmed = imagecreatetruecolor($nxmed, $nymed);

        imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
        imagecopyresized($nmed, $im, 0,0,0,0,$nxmed,$nymed,$ox,$oy);

        if(!file_exists($path_to_thumbs_directory)) {
            if(!mkdir($path_to_thumbs_directory)) {
                die("There was a problem. Please try again!");
            }
        }
        if(!file_exists($path_to_medium_directory)) {
            if(!mkdir($path_to_medium_directory)) {
                die("There was a problem. Please try again!");
            }
        }

        imagejpeg($nm, $path_to_thumbs_directory . $filename);
        imagejpeg($nmed, $path_to_medium_directory . $filename);
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
        $dataProvider=new CActiveDataProvider('RoomImages');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new RoomImages('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['RoomImages']))
            $model->attributes=$_GET['RoomImages'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return RoomImages the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=RoomImages::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param RoomImages $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='room-images-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
