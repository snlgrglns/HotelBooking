<?php

/**
 * This is the model class for table "restro_slider".
 *
 * The followings are the available columns in table 'restro_slider':
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property integer $status
 */
class RestroSlider extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'restro_slider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, image, description', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
//            array('image', 'file', 'types'=>'jpg,gif,png,jpeg','allowEmpty' => false,'maxSize'=>700*1024,'tooLarge'=>'File has to be smaller than 700KB'),

			array('image', 'file', 'types'=>'jpg,gif,png,jpeg','maxSize'=>700*1024,'on'=>'insert'),
			array('image', 'file', 'allowEmpty'=>true,'types'=>'jpg,gif,png,jpeg','maxSize'=>700*1024,'on'=>'update'),

			array('title', 'length', 'max'=>255),
			array('image', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, image, description, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'image' => 'Image',
			'description' => 'Description',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RestroSlider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function afterDelete() {
		parent::afterDelete();
		$folder = Yii::app()->basePath . '/../images/restro_slider/fullsized/';
		$folderthmb = Yii::app()->basePath . '/../images/restro_slider/thumbs/';
		$folderMedium = Yii::app()->basePath . '/../images/restro_slider/medium/';

		unlink($folder.$this->image);
		unlink($folderthmb.$this->image);
		unlink($folderMedium.$this->image);
	}
}
