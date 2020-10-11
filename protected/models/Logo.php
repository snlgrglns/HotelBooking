<?php

/**
 * This is the model class for table "tbl_logo".
 *
 * The followings are the available columns in table 'tbl_logo':
 * @property integer $id
 * @property string $logo
 * @property integer $status
 */
class Logo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_logo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('logo', 'required'),
//			array('logo', 'file', 'types'=>'jpeg,jpg,gif,png', 'maxSize'=>100*1024, 'allowEmpty'=>true),
            array('logo', 'file', 'types'=>'jpg,gif,png,jpeg','allowEmpty' => false,'maxSize'=>100*1024,'tooLarge'=>'File has to be smaller than 100KB'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('logo', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, logo, status', 'safe', 'on'=>'search'),
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
    public static function checkStat($stat){
        if($stat == '0'){
            return 'Not Active';
        }elseif($stat == '1'){
            return 'Active';
        }
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'logo' => 'Logo',
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
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder' => 'status DESC, id DESC',
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Logo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
