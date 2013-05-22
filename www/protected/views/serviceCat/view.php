<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */

$this->breadcrumbs=array(
	'Service Cats'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ServiceCat', 'url'=>array('index')),
	array('label'=>'Create ServiceCat', 'url'=>array('create')),
	array('label'=>'Update ServiceCat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ServiceCat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServiceCat', 'url'=>array('admin')),
);
?>

<h1>View ServiceCat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'placeid',
		'pid',
		'title',
	),
)); ?>
