<?php
/* @var $this PlaceTypeController */
/* @var $model PlaceType */

$this->breadcrumbs=array(
	'Place Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlaceType', 'url'=>array('index')),
);
?>

<h1>Create PlaceType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>