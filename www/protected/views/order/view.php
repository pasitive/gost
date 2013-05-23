<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List order', 'url'=>array('index')),
	array('label'=>'Create order', 'url'=>array('create')),
	array('label'=>'Update order', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage order', 'url'=>array('admin')),
);
?>

<h1>View order #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_number',
		'placeid',
		'phone',
	),
)); ?>
