<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $email
 * @property string $user_name
 * @property string $password
 * @property string $reset_token
 * @property string $created_date
 * @property string $updated_date
 * @property integer $status
 */
class Admin extends CActiveRecord
{
    public $repeat_password;
    public $old_password;
    public $new_password;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'admin';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fname, lname, email, user_name, password, repeat_password', 'required'),
            array('status', 'numerical', 'integerOnly'=>true),
            array('fname, mname, lname, user_name', 'length', 'max'=>50),
            array('email, reset_token', 'length', 'max'=>100),
            array('password', 'length', 'max'=>255),
            array('email, user_name', 'unique'),
            array('email', 'email'),
            array('user_name', 'length', 'max'=>20, 'min' => 3,'message' =>("Incorrect username (length between 3 and 20 characters).")),
            array('password,new_password', 'length', 'max'=>100, 'min' => 6,'message' =>("Incorrect username (length between 3 and 20 characters).")),
            array('user_name', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => ("Incorrect symbols (A-z0-9).")),
            array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
            array('old_password', 'findPasswords', 'on' => 'changePwd'),
            array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),
            array('repeat_password', 'compare', 'compareAttribute'=>'password', 'on'=>'createUser'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, fname, mname, lname, email, user_name, password, reset_token, created_date, updated_date, status', 'safe', 'on'=>'search'),
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
    public function beforeSave()
    {
        $Pass = sha1(md5($this->password));
        $this->password = $Pass;
        return true;
    }
    public function findPasswords($attribute, $params)
    {
        $user = Admin::model()->findByPk(Yii::app()->user->id);
        if ($user->password != sha1(md5($this->old_password)))
            $this->addError($attribute, 'Old password is incorrect.');
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'fname' => 'First Name',
            'mname' => 'Middle Name',
            'lname' => 'Last Name',
            'email' => 'Email',
            'user_name' => 'User Name',
            'password' => 'Password',
            'reset_token' => 'Reset Token',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
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
        $criteria->compare('fname',$this->fname,true,'or');
        $criteria->compare('mname',$this->fname,true,'or');
        $criteria->compare('lname',$this->fname,true,'or');
        $criteria->compare('email',$this->fname,true,'or');
        $criteria->compare('user_name',$this->fname,true,'or');
        /*		$criteria->compare('password',$this->password,true);
                $criteria->compare('reset_token',$this->reset_token,true);
                $criteria->compare('created_date',$this->created_date,true);
                $criteria->compare('updated_date',$this->updated_date,true);
                $criteria->compare('status',$this->status);*/

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    public function searchCol()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('fname',$this->fname,true);
        $criteria->compare('mname',$this->mname,true);
        $criteria->compare('lname',$this->lname,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('user_name',$this->user_name,true);
        /*		$criteria->compare('password',$this->password,true);
                $criteria->compare('reset_token',$this->reset_token,true);
                $criteria->compare('created_date',$this->created_date,true);
                $criteria->compare('updated_date',$this->updated_date,true);
                $criteria->compare('status',$this->status);*/

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Admin the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
