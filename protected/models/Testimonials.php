<?php

/**
 * This is the model class for table "tbl_testimonials".
 *
 * The followings are the available columns in table 'tbl_testimonials':
 * @property integer $id
 * @property string $heading
 * @property string $name
 * @property string $company
 * @property string $image
 * @property string $message
 * @property integer $status
 */
class Testimonials extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_testimonials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('heading, name, company, image, message', 'required'),
			array('type','safe'),
			array('image', 'file', 'types'=>'jpg,gif,png,jpeg','allowEmpty' => false,'maxSize'=>100*1024,'tooLarge'=>'File has to be smaller than 100KB'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('heading', 'length', 'max'=>30),
			array('name, company', 'length', 'max'=>50),
			array('image', 'length', 'max'=>100),
			array('type', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, heading, name, company, image, message, status', 'safe', 'on'=>'search'),
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
			'type'=>'Type',
			'heading' => 'Heading',
			'name' => 'Name',
			'company' => 'Company',
			'image' => 'Image',
			'message' => 'Message',
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
        $criteria->compare('type',$this->type, true);
        $criteria->compare('heading',$this->heading,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Testimonials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
