<?php

/**
 * This is the model class for table "tbl_place_reviews".
 *
 * The followings are the available columns in table 'tbl_place_reviews':
 * @property integer $id
 * @property integer $placeid
 * @property integer $rating
 * @property string $text
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Place $place
 */
class PlaceReview extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_place_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('placeid, rating', 'numerical', 'integerOnly'=>true),
            array('rating', 'in', 'range' => array(1,2,3,4,5)),
			array('text', 'length', 'max'=>255),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, placeid, rating, text, create_time, update_time', 'safe', 'on'=>'search'),
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
			'place' => array(self::BELONGS_TO, 'Place', 'placeid'),
		);
	}

    public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
            )
        );
    }

    /**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('PlaceReview', 'ID'),
			'placeid' => Yii::t('PlaceReview', 'Place ID'),
            'place' => Yii::t('PlaceReview', 'Place'),
			'rating' => Yii::t('PlaceReview', 'Rating'),
			'text' => Yii::t('PlaceReview', 'Text'),
			'create_time' => Yii::t('PlaceReview', 'Create time'),
			'update_time' => Yii::t('PlaceReview', 'Update time'),
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
		$criteria->compare('placeid',$this->placeid);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlaceReview the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
