<?php
/* @var $this PlaceTypeController */
/* @var $model PlaceType */

$this->breadcrumbs=array(
	'Place Types'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List PlaceType', 'url'=>array('index')),
	array('label'=>'Create PlaceType', 'url'=>array('create')),
	array('label'=>'Update PlaceType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PlaceType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View PlaceType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
	),
)); ?>
