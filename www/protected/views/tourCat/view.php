<?php
/* @var $this TourCatController */
/* @var $model TourCat */

$this->breadcrumbs=array(
    Yii::t('TourCat', 'Tour Cats')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('TourCat', 'List Tour Cats'), 'url'=>array('index')),
	array('label'=>Yii::t('TourCat', 'Create TourCat'), 'url'=>array('create')),
	array('label'=>Yii::t('TourCat', 'Update TourCat'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('TourCat', 'Delete TourCat'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo Yii::t('TourCat', 'View TourCat').' #'.$model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'placeid',
		'pid',
		'title',
	),
)); ?>
