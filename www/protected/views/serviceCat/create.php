<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */

$this->breadcrumbs=array(
	'Service Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceCat', 'url'=>array('index')),
	array('label'=>'Manage ServiceCat', 'url'=>array('admin')),
);
?>

<h1>Create ServiceCat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>