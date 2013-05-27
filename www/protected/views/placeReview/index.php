<?php
/* @var $this PlaceReviewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Place Reviews',
);

$this->menu=array(
	array('label'=>'Create PlaceReview', 'url'=>array('create')),
	array('label'=>'Manage PlaceReview', 'url'=>array('admin')),
);
?>

<h1>Place Reviews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
