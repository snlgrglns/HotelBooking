<?php

/**
 * This is the model class for table "tbl_staff".
 *
 * The followings are the available columns in table 'tbl_staff':
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $post
 * @property string $fb_link
 * @property string $twitter_link
 * @property integer $status
 */
class Staff extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_staff';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, image, post, fb_link, twitter_link', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('image', 'file', 'types'=>'jpg,gif,png,jpeg','maxSize'=>150*1024,'on'=>'insert'),
			array('image', 'file', 'allowEmpty'=>true,'types'=>'jpg,gif,png,jpeg','maxSize'=>150*1024,'on'=>'update'),
			array('name', 'length', 'max'=>30),
			array('image', 'length', 'max'=>50),
			array('post', 'length', 'max'=>20),
			array('fb_link, twitter_link', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, image, post, fb_link, twitter_link, status', 'safe', 'on'=>'search'),
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
			'image' => 'Image',
			'post' => 'Post/Designation',
			'fb_link' => 'Fb Link',
			'twitter_link' => 'Twitter Link',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('fb_link',$this->fb_link,true);
		$criteria->compare('twitter_link',$this->twitter_link,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Staff the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    protected function afterDelete() {
        parent::afterDelete();
        $folder = Yii::app()->basePath . '/../images/staff/'.$this->id;
        unlink($folder.$this->image);
    }
}
