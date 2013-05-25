<?php
/* @var $this TourCatController */
/* @var $model TourCat */

$this->breadcrumbs=array(
	'Tour Cats'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List TourCat', 'url'=>array('index')),
	array('label'=>'Create TourCat', 'url'=>array('create')),
	array('label'=>'Update TourCat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TourCat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View TourCat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'placeid',
		'pid',
		'title',
	),
)); ?>
