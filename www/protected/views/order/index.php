<?php
$this->breadcrumbs=array(
	'Orders',
);

$this->menu=array(
	array('label'=>'Create order', 'url'=>array('create')),
	array('label'=>'Manage order', 'url'=>array('admin')),
);
?>

<h1>Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
