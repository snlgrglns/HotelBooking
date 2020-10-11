<?php

/**
 * This is the model class for table "tbl_booked_room".
 *
 * The followings are the available columns in table 'tbl_booked_room':
 * @property integer $br_id
 * @property integer $customer_id
 * @property integer $room_type
 * @property integer $no_of_room
 * @property integer $no_of_adults
 * @property integer $no_of_childs
 * @property string $check_in
 * @property string $check_out
 * @property integer $room_status
 */
class BookedRoom extends CActiveRecord
{
	public $custName;
	public $roomType;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_booked_room';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, room_type, no_of_room, no_of_adults, no_of_childs, check_in, check_out, room_status', 'required'),
			array('customer_id, room_type, no_of_room, no_of_adults, no_of_childs, room_status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('br_id, customer_id, room_type, custName, roomType, no_of_room, no_of_adults, no_of_childs, check_in, check_out, room_status', 'safe', 'on'=>'search'),
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
			'cust'=>array(self::BELONGS_TO, 'CustomerInfo', 'customer_id'),
			'room'=>array(self::BELONGS_TO, 'Room', 'room_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'br_id' => 'Id',
			'customer_id' => 'Customer',
			'room_type' => 'Room Type',
			'no_of_room' => 'No Of Room',
			'no_of_adults' => 'No Of Adults',
			'no_of_childs' => 'No Of Childs',
			'check_in' => 'Check In',
			'check_out' => 'Check Out',
			'room_status' => 'Room Status',
		);
	}


    public static function stat($stat){
        if($stat == '0'){
            return 'New Book';
        }elseif($stat == '1'){
            return 'Confirmed';
        }elseif($stat == '2'){
            return 'Cancelled';
        }
    }

	public function getFullName()
	{
		return $this->cust->first_name.' '.$this->cust->last_name;
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
		$criteria->with = array('cust','room');
		$criteria->compare('br_id',$this->br_id);
		$criteria->addSearchCondition('concat(cust.first_name,\' \',cust.last_name)', $this->custName);
		$criteria->compare('room.room_type', $this->roomType, true);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('room_type',$this->room_type);
		$criteria->compare('no_of_room',$this->no_of_room);
		$criteria->compare('no_of_adults',$this->no_of_adults);
		$criteria->compare('no_of_childs',$this->no_of_childs);
		$criteria->compare('check_in',$this->check_in,true);
		$criteria->compare('check_out',$this->check_out,true);
		$criteria->compare('room_status',$this->room_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'custName'=>array(
						'asc'=>'cust.first_name',
						'desc'=>'cust.first_name DESC',
					),
					'roomType'=>array(
						'asc'=>'room.room_type',
						'desc'=>'room.room_type DESC',
					),
					'*',
				),
                'defaultOrder' => 'FIELD(room_status, 0, 1, 2)',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BookedRoom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
