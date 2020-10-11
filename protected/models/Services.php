<?php

/**
 * This is the model class for table "tbl_services".
 *
 * The followings are the available columns in table 'tbl_services':
 * @property integer $id
 * @property string $icon_image
 * @property string $heading
 * @property string $short_description
 * @property string $full_description
 * @property integer $status
 */
class Services extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('icon_image, heading, short_description, full_description', 'required'),
//            array('icon_image', 'required', 'on'=>'bookCust'),
            array('icon_image', 'file', 'types'=>'jpg,gif,png,jpeg','maxSize'=>50*1024,'tooLarge'=>'File has to be smaller than 50KB','on'=>'insert'),
            array('icon_image', 'file', 'types'=>'jpg,gif,png,jpeg','allowEmpty' => true,'maxSize'=>50*1024,'tooLarge'=>'File has to be smaller than 50KB','on'=>'update'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('icon_image, short_description', 'length', 'max'=>255),
			array('heading', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, icon_image, heading, short_description, full_description, status', 'safe', 'on'=>'search'),
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
			'icon_image' => 'Icon Image',
			'heading' => 'Heading',
			'short_description' => 'Short Description',
			'full_description' => 'Full Description',
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
		$criteria->compare('icon_image',$this->icon_image,true);
		$criteria->compare('heading',$this->heading,true);
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('full_description',$this->full_description,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Services the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    static function checkStatus($status)
    {
        if ($status == '0') {
            return "Not Active";
        } else if ($status == '1') {
            return "Active";
        }
    }

    protected function afterDelete() {
        parent::afterDelete();
        $folder = Yii::app()->basePath . '/../images/services/'.$this->id.'/';
        $idFolder = Yii::app()->basePath . '/../images/services/';
        unlink($folder.$this->icon_image);
        rmdir($idFolder.$this->id);
    }
}
