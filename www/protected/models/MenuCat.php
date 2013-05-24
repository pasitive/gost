<?php

/**
 * This is the model class for table "tbl_menu_cats".
 *
 * The followings are the available columns in table 'tbl_menu_cats':
 * @property integer $id
 * @property integer $placeid
 * @property integer $pid
 * @property string $title
 *
 * The followings are the available model relations:
 * @property Place $place
 */
class MenuCat extends CActiveRecord
{

    public $level;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_menu_cats';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('placeid, pid', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, placeid, pid, title', 'safe', 'on' => 'search'),
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
            'place' => array(self::HAS_ONE, 'Place', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('MenuCat', 'ID'),
            'placeid' => Yii::t('MenuCat', 'Place ID'),
            'pid' => Yii::t('MenuCat', 'Parent ID'),
            'title' => Yii::t('MenuCat', 'Title'),
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('placeid', $this->placeid);
        $criteria->compare('pid', $this->pid);
        $criteria->compare('title', $this->title, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MenuCat the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
