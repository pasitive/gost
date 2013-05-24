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
 * @property string $images
 *
 *
 * The followings are the available model relations:
 * @property PlaceType $type
 */
class Place extends CActiveRecord
{
    // В первой версии принудительно установлены 2 типа мест: Гостиницы и Продавцы
    const TYPE_HOTEL = 0;
    const TYPE_SELLER = 1;

    public static $typeLabels = array(
        self::TYPE_HOTEL => 'Гостиница',
        self::TYPE_SELLER => 'Продавец',
    );

    public function getImageByName($name, $onlyFileName = false, $stripHashName = false)
    {
        return $this->getResourcePath($name, 0, array(
            'onlyFileName' => $onlyFileName,
            'stripHashName' => $stripHashName,
        ));
    }

    public static function getTypeLabel($typeId)
    {
        assert(in_array($typeId, array_keys(self::$typeLabels)));
        return self::$typeLabels[$typeId];
    }

    /**
     * @return $this
     */
    public function hotels()
    {
        return $this->typeScope(Place::TYPE_HOTEL);
    }

    /**
     * @return $this
     */
    public function seller()
    {
        return $this->typeScope(Place::TYPE_SELLER);
    }

    /**
     * @param $typeid
     * @return $this
     */
    protected function typeScope($typeid)
    {
        $criteria = $this->getDbCriteria();
        $criteria->addColumnCondition(array(
            'typeid' => $typeid
        ));
        return $this;
    }

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
            array('typeid', 'numerical', 'integerOnly' => true),
            array('location_lat, location_lng', 'numerical'),
            array('title', 'length', 'max' => 255),
            array('images', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, typeid, location_lat, location_lng', 'safe', 'on' => 'search'),
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
            'type' => array(self::HAS_ONE, 'PlaceType', 'id'),
//            'serviceCat' => array(self::BELONGS_TO, 'ServiceCat', 'placeid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('Place', 'ID'),
            'title' => Yii::t('Place', 'Title'),
            'typeid' => Yii::t('Place', 'Type ID'),
            'location_lat' => Yii::t('Place', 'Latitude'),
            'location_lng' => Yii::t('Place', 'Longitude'),
            'images' => Yii::t('Place', 'Images')
        );
    }

    public function behaviors()
    {
        return array(
            'ResourcesBehavior' => array(
                'class' => 'ext.resourcesBehavior.ResourcesBehavior',
                'resourcePath' => Yii::app()->params['uploadsDir'],
            ),
        );
    }

    public function afterSave()
    {
        $hashString = $this->generatePathHash();

        $files = CUploadedFile::getInstances($this, 'images');

        if (!empty($files)) {
            $texture = array();
            foreach ($files as $file) {
                if ($file !== null) {
                    $meta = $this->processImage($this, $file, false, $hashString);
                    $texture[] = Yii::app()->request->getBaseUrl(true) . $this->getImageByName($meta['fileName']);
                }
            }
            $this->updateByPk($this->id, array(
                'images' => CJSON::encode($texture),
            ));
            $this->setAttributes(array(
                'images' => CJSON::encode($texture),
            ));

        }

        return parent::afterSave();
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('typeid', $this->typeid);
        $criteria->compare('location_lat', $this->location_lat);
        $criteria->compare('location_lng', $this->location_lng);
        $criteria->compare('address', $this->address);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Place the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
