<?php

/**
 * This is the model class for table "tbl_contact".
 *
 * The followings are the available columns in table 'tbl_contact':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property integer $status
 */
class Contact extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_contact';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, email, message', 'required'),
            array('subject', 'safe', 'on'=>'hotel'),
            array('type','safe'),
            array('status', 'numerical', 'integerOnly'=>true),
            array('name, email', 'length', 'max'=>50),
            array('subject', 'length', 'max'=>255),
            array('type', 'length', 'max'=>6),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, type, email, subject, message, received_on, status', 'safe', 'on'=>'search'),
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
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'message' => 'Message',
            'received_on' => 'Received On',
            'status' => 'Status',
        );
    }

    public static function checkView($view){
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
        $criteria->compare('type',$this->type,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('subject',$this->subject,true);
        $criteria->compare('message',$this->message,true);
        $criteria->compare('received_on',$this->received_on,true);
        $criteria->compare('status',$this->status);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder' => 'status ASC, received_on DESC',
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Contact the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
