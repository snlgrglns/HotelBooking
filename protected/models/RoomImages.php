<?php

/**
 * This is the model class for table "tbl_room_images".
 *
 * The followings are the available columns in table 'tbl_room_images':
 * @property integer $id
 * @property integer $room_id
 * @property string $image
 * @property integer $image_status
 */
class RoomImages extends CActiveRecord
{
    public $roomType;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_room_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_id, image, image_status', 'safe'),
			array('room_id, image_status', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, room_id, image, roomType, image_status', 'safe', 'on'=>'search'),
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
            'room'=>array(self::BELONGS_TO, 'Room', 'room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'room_id' => 'Room',
			'image' => 'Image',
			'image_status' => 'Status',
		);
	}

    public static function stat($stat){
        if($stat == '0'){
            return 'Not Active';
        }elseif($stat == '1'){
            return 'Active';
        }
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
        $criteria->with = array('room');
		$criteria->compare('id',$this->id);
		$criteria->compare('room_id',$this->room_id);
        $criteria->compare('room.room_type', $this->roomType, true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('image_status',$this->image_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RoomImages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function afterDelete() {
		parent::afterDelete();
		$folder = Yii::app()->basePath . '/../images/roomImages/fullsized/';
		$folderthmb = Yii::app()->basePath . '/../images/roomImages/thumbs/';
		$folderMedium = Yii::app()->basePath . '/../images/roomImages/medium/';

		unlink($folder.$this->image);
		unlink($folderthmb.$this->image);
		unlink($folderMedium.$this->image);
	}

}
