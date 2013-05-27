<?php
/* @var $this PlaceReviewController */
/* @var $model PlaceReview */

$this->breadcrumbs=array(
	'Place Reviews'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlaceReview', 'url'=>array('index')),
	array('label'=>'Manage PlaceReview', 'url'=>array('admin')),
);
?>

<h1>Create PlaceReview</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>