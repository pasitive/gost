<?php

/**
 * This is the model class for table "tbl_places".
 *
 * The followings are the available columns in table 'tbl_places':
 * @property integer $id
 * @property string $title
 * @property integer $typeid
 * @property float $location_lat
 * @property float $location_lng
 * @property string $address
 *
 * The followings are the available model relations:
 * @property TblPlaceTypes $type
 */
class Place extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_places';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, address', 'required'),
			array('typeid', 'numerical', 'integerOnly'=>true),
			array('location_lat, location_lng', 'numerical'),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, typeid, location_lat, location_lng', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'TblPlaceTypes', 'typeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'typeid' => 'Typeid',
			'location_lat' => 'Location Lat',
			'location_lng' => 'Location Lng',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('typeid',$this->typeid);
		$criteria->compare('location_lat',$this->location_lat);
		$criteria->compare('location_lng',$this->location_lng);
		$criteria->compare('address',$this->address);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Place the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
