<?php

/**
 * This is the model class for table "tbl_tour_cats".
 *
 * The followings are the available columns in table 'tbl_tour_cats':
 * @property integer $id
 * @property integer $placeid
 * @property integer $pid
 * @property string $title
 *
 * The followings are the available model relations:
 * @property Place $place
 */
class TourCat extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_tour_cats';
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
            'id' => 'ID',
            'placeid' => 'Placeid',
            'pid' => 'Pid',
            'title' => 'Title',
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
     * @return TourCat the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getCatsChildren($placeid, $pid)
    {
        $cats = TourCat::model()->findAll('placeid=:id AND pid=:pid', array(':id' => $placeid, ':pid' => $pid));

        $ret = array();

        foreach ($cats as $element) {
            $new = & $ret[];
            $new['id'] = $element->id;
            $new['name'] = $element->title;

            $tours = Tour::model()->findAll('catid=:catid', array(':catid' => $element->id));
            $tourItems = array();
            foreach ($tours as $tour) {
                $newItem = & $tourItems[];
                $newItem['id'] = $tour->id;
                $newItem['name'] = $tour->title;
                $newItem['desc'] = $tour->desc;
                $newItem['category_id'] = $element->id;
                $newItem['images'] = array();
                foreach ($tour->images as $image) {
                    $newItem['images'][] = Yii::app()->request->getBaseUrl(true) . $image->img;
                }
            }

            $new['tours'] = $tourItems;

        }

        foreach ($ret as &$element) {
            $subcats = TourCat::getCatsChildren($placeid, $element['id']);
            if (!empty($subcats)) {
                $element['categories'] = $subcats;
            } else {
                $element['categories'] = array();
            }
        }
        return $ret;
    }
}
