<?php
/* @var $this PlaceTypeController */
/* @var $model PlaceType */

$this->breadcrumbs=array(
	'Place Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlaceType', 'url'=>array('index')),
	array('label'=>'Create PlaceType', 'url'=>array('create')),
	array('label'=>'View PlaceType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PlaceType', 'url'=>array('admin')),
);
?>

<h1>Update PlaceType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>