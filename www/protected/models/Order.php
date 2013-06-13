<?php

/**
 * This is the model class for table "tbl_orders".
 *
 * The followings are the available columns in table 'tbl_orders':
 * @property integer $id
 * @property integer $room_number
 * @property string $placeid
 * @property string $phone
 *
 * The followings are the available model relations:
 * @property Place $place
 */
class Order extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return Order the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_orders';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('room_number, placeid', 'numerical', 'integerOnly' => true),
            array('phone', 'safe'),
            array('lt, lg', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, room_number, placeid, phone', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'place' => array(self::BELONGS_TO, 'Place', 'placeid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('Order', 'ID'),
            'room_number' => Yii::t('Order', 'Room number'),
            'placeid' => Yii::t('Order', 'Place ID'),
            'phone' => Yii::t('Order', 'Phone'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);

        $criteria->compare('room_number', $this->room_number);

        $criteria->compare('placeid', $this->placeid, true);

        $criteria->compare('phone', $this->phone, true);

        return new CActiveDataProvider('Order', array(
            'criteria' => $criteria,
        ));
    }
}