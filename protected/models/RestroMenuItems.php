<?php

/**
 * This is the model class for table "restro_menu_items".
 *
 * The followings are the available columns in table 'restro_menu_items':
 * @property integer $id
 * @property integer $category_id
 * @property string $item_name
 * @property string $sub_title
 * @property string $image
 * @property double $price
 * @property integer $status
 */
class RestroMenuItems extends CActiveRecord
{
    public $category;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'restro_menu_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, item_name, sub_title, image, price', 'required'),
			array('category_id, status', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('item_name, sub_title, image', 'length', 'max'=>255),
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, item_name, sub_title, image, price, status', 'safe', 'on'=>'search'),
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
            'cat'=>array(self::BELONGS_TO, 'RestroMenuCategory', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'item_name' => 'Item Name',
			'sub_title' => 'Sub Title',
			'image' => 'Image',
			'price' => 'Price',
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
        $criteria->with = array('cat');
		$criteria->compare('category_id',$this->category_id);
        $criteria->compare('cat.category_name', $this->category, true);
		$criteria->compare('item_name',$this->item_name,true);
		$criteria->compare('sub_title',$this->sub_title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RestroMenuItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    protected function afterDelete() {
        parent::afterDelete();
        $folder = Yii::app()->basePath . '/../images/restro_item/fullsized/';
        $folderthmb = Yii::app()->basePath . '/../images/restro_item/thumbs/';
        $folderMedium = Yii::app()->basePath . '/../images/restro_item/medium/';

        unlink($folder.$this->image);
        unlink($folderthmb.$this->image);
        unlink($folderMedium.$this->image);
    }
}
