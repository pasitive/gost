<?php
/* @var $this TourCatController */
/* @var $model TourCat */

$this->breadcrumbs=array(
	'Tour Cats'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TourCat', 'url'=>array('index')),
	array('label'=>'Create TourCat', 'url'=>array('create')),
	array('label'=>'View TourCat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TourCat', 'url'=>array('admin')),
);
?>

<h1>Update TourCat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>