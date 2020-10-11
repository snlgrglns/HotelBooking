<?php
class SliderController extends Controller
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
				'actions'=>array('index','view','create','update','activate','deactivate','home','about'),
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
        $slider = Slider::model()->findByPk($id);
        if($slider->saveAttributes(array('status'=>1))){
            Yii::app()->user->setFlash('success', "Success!! Activated!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('slider/admin'));
    }

    public function actionDeactivate($id){
        $slider = Slider::model()->findByPk($id);
        if($slider->saveAttributes(array('status'=>0))){
            Yii::app()->user->setFlash('success', "Success!! De-Activated!!!");
        }else{
            Yii::app()->user->setFlash('error', "Oops something went wrong. Try again later !!!");
        }
        $this->redirect(array('slider/admin'));
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

	public function createThumbnail($filename, $type) {
		$med_width_of_image = 1000;
		$path_to_image_directory = 'images/slider/fullsized/';
		$path_to_medium_directory = 'images/slider/medium/';
		$path_to_thumbs_directory = 'images/slider/thumbs/';
		if(strcasecmp($type, 'jpeg') == 0 or strcasecmp($type, 'jpg') == 0) {
			$im = imagecreatefromjpeg($path_to_image_directory . $filename);
		} else if (strcasecmp($type, 'gif') == 0) {
			$im = imagecreatefromgif($path_to_image_directory . $filename);
		} else if (strcasecmp($type, 'png') == 0) {
			$im = imagecreatefrompng($path_to_image_directory . $filename);
		}

		$ox = imagesx($im);
		$oy = imagesy($im);

		$nx = 100;
		$ny = 100;

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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Slider;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $rand = rand(1111, 9999);
		if(isset($_POST['Slider']))
		{
			$model->attributes=$_POST['Slider'];
			$uploadedFile = CUploadedFile::getInstance($model, 'image');
			$fileName = date('Ymdhis');  // $timestamp + file name
			$model->status = 1;
            if(!empty($uploadedFile)) {
                $type = $uploadedFile->extensionName;
                $model->image = $fileName . '_' . $rand . '.' . $type;
            }
			if($model->save()) {
				$folder = Yii::app()->basePath . '/../images/slider/fullsized/';
				$folderthmb = Yii::app()->basePath . '/../images/slider/thumbs/';
				$destination = $folder.'/'.$model->image;
				if (!is_dir($folder)) {
					mkdir($folder);
				}
				if (!is_dir($folderthmb)) {
					mkdir($folderthmb);
				}
				if(!empty($uploadedFile)){
					if($uploadedFile->saveAs($destination)){
						$this->createThumbnail($model->image, $type);
					}
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
        $rand = rand(1111, 9999);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slider']))
		{
			$model->attributes=$_POST['Slider'];
			$uploadedFile = CUploadedFile::getInstance($model, 'image');
            $fileName = date('Ymdhis');  // $timestamp + file name
            if(empty($uploadedFile)){
                $model->image = $prevImg;
            }else{
                $model->image = $fileName;
                $type=$uploadedFile->extensionName;
                $model->image = $fileName.'_'.$rand.'.'.$type;
            }
			if($model->save()){
                $folder = Yii::app()->basePath . '/../images/slider/fullsized/';
                $folderthmb = Yii::app()->basePath . '/../images/slider/thumbs/';
                $destination = $folder.'/'.$model->image;
                if (!is_dir($folder)) {
                    mkdir($folder);
                }
                if (!is_dir($folderthmb)) {
                    mkdir($folderthmb);
                }
                if(!empty($uploadedFile)){
                    if($uploadedFile->saveAs($destination)){
                        $this->createThumbnail($model->image, $type);
                    }
                    $folder = Yii::app()->basePath . '/../images/slider/fullsized/';
                    $folderthmb = Yii::app()->basePath . '/../images/slider/thumbs/';
                    $folderMedium = Yii::app()->basePath . '/../images/slider/medium/';

                    unlink($folder.$prevImg);
                    unlink($folderthmb.$prevImg);
                    unlink($folderMedium.$prevImg);
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
		$dataProvider=new CActiveDataProvider('Slider');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Slider('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slider']))
			$model->attributes=$_GET['Slider'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionHome()
	{
		$model=new Slider('search');
		$model->unsetAttributes();  // clear any default values
        $model->type = 'home';
		if(isset($_GET['Slider']))
			$model->attributes=$_GET['Slider'];

		$this->render('ho_ab',array(
			'model'=>$model,'type'=>'Home',
		));
	}

	public function actionAbout()
	{
		$model=new Slider('search');
		$model->unsetAttributes();  // clear any default values
        $model->type = 'about';
		if(isset($_GET['Slider']))
			$model->attributes=$_GET['Slider'];

		$this->render('ho_ab',array(
			'model'=>$model,'type'=>'About Us',
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Slider the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Slider::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Slider $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='slider-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
