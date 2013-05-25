<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */

$this->breadcrumbs=array(
	'Service Cats'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServiceCat', 'url'=>array('index')),
	array('label'=>'Create ServiceCat', 'url'=>array('create')),
	array('label'=>'View ServiceCat', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update ServiceCat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>