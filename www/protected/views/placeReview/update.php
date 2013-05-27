<?php
/* @var $this PlaceReviewController */
/* @var $model PlaceReview */

$this->breadcrumbs=array(
	'Place Reviews'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlaceReview', 'url'=>array('index')),
	array('label'=>'Create PlaceReview', 'url'=>array('create')),
	array('label'=>'View PlaceReview', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PlaceReview', 'url'=>array('admin')),
);
?>

<h1>Update PlaceReview <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>