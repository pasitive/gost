<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List order', 'url'=>array('index')),
	array('label'=>'Create order', 'url'=>array('create')),
	array('label'=>'View order', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage order', 'url'=>array('admin')),
);
?>

<h1>Update order <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>