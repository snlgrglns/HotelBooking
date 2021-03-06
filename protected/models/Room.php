<?php

/**
 * This is the model class for table "tbl_room".
 *
 * The followings are the available columns in table 'tbl_room':
 * @property integer $id
 * @property string $room_type
 * @property integer $total_such_room
 * @property integer $no_of_person
 * @property double $room_price
 * @property integer $status
 */
class Room extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_room';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_type, total_such_room, no_of_person, room_price', 'required'),
			array('total_such_room, no_of_person, status', 'numerical', 'integerOnly'=>true),
			array('room_price', 'numerical'),
			array('room_type', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, room_type, total_such_room, no_of_person, room_price, description, status', 'safe', 'on'=>'search'),
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
			'room_type' => 'Room Type',
			'total_such_room' => 'Total Such Room',
			'no_of_person' => 'No Of Person',
			'room_price' => 'Room Price',
			'description'=> 'Description',
			'status' => 'Status',
		);
	}
	static function checkStatus($status)
	{
		if ($status == '0') {
			return "Close";
		} else if ($status == '1') {
			return "Open";
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

		$criteria->compare('id',$this->id);
		$criteria->compare('room_type',$this->room_type,true);
		$criteria->compare('total_such_room',$this->total_such_room);
		$criteria->compare('no_of_person',$this->no_of_person);
		$criteria->compare('room_price',$this->room_price);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Room the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
