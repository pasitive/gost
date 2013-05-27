<?php
/* @var $this PlaceReviewController */
/* @var $model PlaceReview */

$this->breadcrumbs=array(
	'Place Reviews'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PlaceReview', 'url'=>array('index')),
	array('label'=>'Create PlaceReview', 'url'=>array('create')),
	array('label'=>'Update PlaceReview', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlaceReview', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlaceReview', 'url'=>array('admin')),
);
?>

<h1>View PlaceReview #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'placeid',
		'rating',
		'text',
		'create_time',
		'update_time',
	),
)); ?>
