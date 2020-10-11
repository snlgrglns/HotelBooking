<?php

/**
 * This is the model class for table "tbl_customer_info".
 *
 * The followings are the available columns in table 'tbl_customer_info':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $country
 * @property string $email1
 * @property string $email2
 * @property string $state_province
 * @property string $city
 * @property string $zip_code
 * @property string $personal_message
 * @property string $pick_up_at_airport
 * @property string $payment_card_no
 * @property integer $status
 */
class CustomerInfo extends CActiveRecord
{
    public $check_in_date;
    public $check_out_date;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_customer_info';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        Yii::import('ext.validators.ECCValidator');

        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('first_name, last_name, phone, country, email1, state_province, city, zip_code, flight_details, pick_up_at_airport', 'required'),
            array('view_stat, created_on','safe'),
            array('first_name, last_name', 'length', 'min'=>2),
            array('email1, email2','email'),
            array('payment_card_no', 'required', 'on'=>'bookCust'),
            array('payment_card_no','ext.validators.ECCValidator',
                'format'=>array(
                    ECCValidator::ALL,
                )
            ),
            // You can also check multiple type of cards
            // 'format'=>array(ECCValidator::MASTERCARD, ECCValidator::VISA)),
            array('status', 'numerical', 'integerOnly'=>true),
            array('first_name, last_name, country, email1, email2, state_province, city', 'length', 'max'=>100),
            array('phone', 'length', 'max'=>30),
            array('zip_code', 'length', 'max'=>20),
            array('pick_up_at_airport', 'length', 'max'=>3),
            array('payment_card_no', 'length', 'max'=>50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, first_name, last_name, phone, country, email1, email2, state_province, city, zip_code, flight_details, personal_message, pick_up_at_airport, payment_card_no, created_on, status, view_stat, check_in_date, check_out_date', 'safe', 'on'=>'search'),
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
            'booked_room'=>array(self::HAS_MANY, 'BookedRoom', 'customer_id'),
//            'booked_room_search'=>array(self::HAS_MANY, 'BookedRoom', 'customer_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'view_stat'=>'View Status',
            'phone' => 'Phone',
            'country' => 'Country',
            'email1' => 'Email1',
            'email2' => 'Email2',
            'state_province' => 'State Province',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'flight_details'=>'Flight Details',
            'personal_message' => 'Personal Message',
            'pick_up_at_airport' => 'Pick Up At Airport',
            'created_on'=>'Created On',
            'payment_card_no' => 'Payment Card No',
            'status' => 'Status',
            '$check_in_date'=>'Check In Date',
        );
    }
    static function checkStatus($status)
    {
        if ($status == '0') {
            return "Pending";
        } else if ($status == '1') {
            return "Booked";
        } else if ($status == '2') {
            return "Cancelled";
        }
    }
    static function checkView($view){
        if ($view == '0') {
            return "Not Viewed";
        } else if ($view == '1') {
            return "Viewed";
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
        $criteria->with = array(
            'booked_room'=>array(
                'select' => false,
                'together'=>true
            )
        );
        $criteria->compare('booked_room.check_in',$this->check_in_date,true);
        $criteria->compare('booked_room.check_out',$this->check_out_date,true);
        $criteria->compare('first_name',$this->first_name,true);
        $criteria->compare('last_name',$this->last_name,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('email1',$this->email1,true);
        $criteria->compare('email2',$this->email2,true);
        $criteria->compare('state_province',$this->state_province,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('zip_code',$this->zip_code,true);
        $criteria->compare('flight_details',$this->flight_details,true);
        $criteria->compare('personal_message',$this->personal_message,true);
        $criteria->compare('pick_up_at_airport',$this->pick_up_at_airport,true);
        $criteria->compare('payment_card_no',$this->payment_card_no,true);
        $criteria->compare('created_on',$this->created_on,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('view_stat',$this->view_stat);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'attributes'=>array(
                    'check_in_date'=>array(
                        'asc'=>'booked_room.check_in',
                        'desc'=>'booked_room.check_in DESC',
                    ),
                    'check_out_date'=>array(
                        'asc'=>'booked_room.check_out',
                        'desc'=>'booked_room.check_out DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchArr()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->with = array(
            'booked_room'=>array(
                'select' => false,
                'together'=>true
            )
        );
        $criteria->compare('booked_room.check_in',$this->check_in_date,true);
        $criteria->compare('booked_room.check_out',$this->check_out_date,true);
        $criteria->compare('first_name',$this->first_name,true);
        $criteria->compare('last_name',$this->last_name,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('email1',$this->email1,true);
        $criteria->compare('email2',$this->email2,true);
        $criteria->compare('state_province',$this->state_province,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('zip_code',$this->zip_code,true);
        $criteria->compare('flight_details',$this->flight_details,true);
        $criteria->compare('personal_message',$this->personal_message,true);
        $criteria->compare('pick_up_at_airport',$this->pick_up_at_airport,true);
        $criteria->compare('payment_card_no',$this->payment_card_no,true);
        $criteria->compare('created_on',$this->created_on,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('view_stat',$this->view_stat);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'attributes'=>array(
                    'check_in_date'=>array(
                        'asc'=>'booked_room.check_in',
                        'desc'=>'booked_room.check_in DESC',
                    ),
                    'check_out_date'=>array(
                        'asc'=>'booked_room.check_out',
                        'desc'=>'booked_room.check_out DESC',
                    ),
                    '*',
                ),
                'defaultOrder' => 'booked_room.check_in ASC',
            ),
        ));
    }

    public function searchPick()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->with = array(
            'booked_room'=>array(
                'select' => false,
                'together'=>true
            )
        );
        $criteria->compare('booked_room.check_in',$this->check_in_date,true);
        $criteria->compare('booked_room.check_out',$this->check_out_date,true);
        $criteria->compare('first_name',$this->first_name,true);
        $criteria->compare('last_name',$this->last_name,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('email1',$this->email1,true);
        $criteria->compare('email2',$this->email2,true);
        $criteria->compare('state_province',$this->state_province,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('zip_code',$this->zip_code,true);
        $criteria->compare('flight_details',$this->flight_details,true);
        $criteria->compare('personal_message',$this->personal_message,true);
        $criteria->compare('pick_up_at_airport',$this->pick_up_at_airport,true);
        $criteria->compare('payment_card_no',$this->payment_card_no,true);
        $criteria->compare('created_on',$this->created_on,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('view_stat',$this->view_stat);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'attributes'=>array(
                    'check_in_date'=>array(
                        'asc'=>'booked_room.check_in',
                        'desc'=>'booked_room.check_in DESC',
                    ),
                    'check_out_date'=>array(
                        'asc'=>'booked_room.check_out',
                        'desc'=>'booked_room.check_out DESC',
                    ),
                    '*',
                ),
                'defaultOrder' => 'booked_room.check_in ASC',
            ),
        ));
    }

    public function searchLeav()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->with = array(
            'booked_room'=>array(
                'select' => false,
                'together'=>true
            )
        );
        $criteria->compare('booked_room.check_in',$this->check_in_date,true);
        $criteria->compare('booked_room.check_out',$this->check_out_date,true);
        $criteria->compare('first_name',$this->first_name,true);
        $criteria->compare('last_name',$this->last_name,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('email1',$this->email1,true);
        $criteria->compare('email2',$this->email2,true);
        $criteria->compare('state_province',$this->state_province,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('zip_code',$this->zip_code,true);
        $criteria->compare('flight_details',$this->flight_details,true);
        $criteria->compare('personal_message',$this->personal_message,true);
        $criteria->compare('pick_up_at_airport',$this->pick_up_at_airport,true);
        $criteria->compare('payment_card_no',$this->payment_card_no,true);
        $criteria->compare('created_on',$this->created_on,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('view_stat',$this->view_stat);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'attributes'=>array(
                    'check_in_date'=>array(
                        'asc'=>'booked_room.check_in',
                        'desc'=>'booked_room.check_in DESC',
                    ),
                    'check_out_date'=>array(
                        'asc'=>'booked_room.check_out',
                        'desc'=>'booked_room.check_out DESC',
                    ),
                    '*',
                ),
                'defaultOrder' => 'booked_room.check_out ASC',
            ),
        ));
    }

    public function checkInDate() {
        foreach ($this->booked_room as $check_in) {
            return $this->check_in_date = $check_in->check_in;
        }
    }

    public function checkOutDate() {
        foreach ($this->booked_room as $check_out) {
            return $this->check_in_date = $check_out->check_out;
        }
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CustomerInfo the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
