<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List order', 'url'=>array('index')),
);
?>

<h1>Create order</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>