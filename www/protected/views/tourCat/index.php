<?php
/* @var $this TourCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tour Cats',
);

$this->menu=array(
	array('label'=>'Create TourCat', 'url'=>array('create')),
	array('label'=>'Manage TourCat', 'url'=>array('admin')),
);
?>

<h1>Tour Cats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
