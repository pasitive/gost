<?php
/* @var $this ServiceCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Service Cats',
);

$this->menu=array(
	array('label'=>'Create ServiceCat', 'url'=>array('create')),
	array('label'=>'Manage ServiceCat', 'url'=>array('admin')),
);
?>

<h1>Service Cats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
