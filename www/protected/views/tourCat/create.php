<?php
/* @var $this TourCatController */
/* @var $model TourCat */

$this->breadcrumbs=array(
	'Tour Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TourCat', 'url'=>array('index')),
	array('label'=>'Manage TourCat', 'url'=>array('admin')),
);
?>

<h1>Create TourCat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>