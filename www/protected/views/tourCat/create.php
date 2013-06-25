<?php
/* @var $this TourCatController */
/* @var $model TourCat */

$this->breadcrumbs=array(
    Yii::t('TourCat', 'Tour Cats')=>array('index'),
    Yii::t('TourCat', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('TourCat', 'List Tour Cats'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('TourCat', 'Create TourCat'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>