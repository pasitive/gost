<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
	'Menu Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MenuItem', 'url'=>array('index')),
	array('label'=>'Create MenuItem', 'url'=>array('create')),
	array('label'=>'Update MenuItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MenuItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MenuItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'catid',
		'title',
		'desc',
		'img',
	),
)); ?>
