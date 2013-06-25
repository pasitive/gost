<?php
/* @var $this TourCatController */
/* @var $model TourCat */

$this->breadcrumbs=array(
    Yii::t('TourCat', 'Tour Cats')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
    Yii::t('TourCat', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('TourCat', 'List Tour Cats'), 'url'=>array('index')),
	array('label'=>Yii::t('TourCat', 'Create TourCat'), 'url'=>array('create')),
	array('label'=>Yii::t('TourCat', 'View TourCat'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('TourCat', 'Update TourCat').' #'.$model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>