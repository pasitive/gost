<?php
/* @var $this PlaceTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Place Types',
);

$this->menu=array(
	array('label'=>'Create PlaceType', 'url'=>array('create')),
	array('label'=>'Manage PlaceType', 'url'=>array('admin')),
);
?>

<h1>Place Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
