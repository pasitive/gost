<?php

/**
 * This is the model class for table "tbl_menu_items".
 *
 * The followings are the available columns in table 'tbl_menu_items':
 * @property integer $id
 * @property integer $catid
 * @property string $title
 * @property string $desc
 * @property string $img
 *
 * The followings are the available model relations:
 * @property MenuCat $cat
 */
class MenuItem extends CActiveRecord
{

    public $fileSize = array(100, 450);

    public function getImg($size = 450, $onlyFileName = false)
    {
        return $this->getResourcePath($this->img, $size, array('onlyFileName' => $onlyFileName));
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_menu_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catid', 'numerical', 'integerOnly'=>true),
			array('title, img', 'length', 'max'=>255),
			array('desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, catid, title, desc, img', 'safe', 'on'=>'search'),
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
			'cat' => array(self::HAS_ONE, 'MenuCat', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'catid' => 'Catid',
			'title' => 'Title',
			'desc' => 'Desc',
			'img' => 'Img',
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

    protected function afterSave()
    {
        // Генерируем hash пути
        $pathHash = $this->generatePathHash();

        $img = CUploadedFile::getInstance($this, 'img');

        // Обрабатываем картинку
        $meta = $this->processImage($this, $img, false, $pathHash);

        // Обрезаем картинки до нужных размеров
        foreach ($this->fileSize as $size) {
            $this->processImage($this, $img, $size, $pathHash);
        }

        if($meta) {
            MenuItem::model()->updateByPk($this->id, array(
                'img' => $meta['fileName']
            ));
        }

        parent::afterSave(); // TODO: Change the autogenerated stub
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
		$criteria->compare('catid',$this->catid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('img',$this->img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
