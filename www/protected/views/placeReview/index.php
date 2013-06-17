<?php
/* @var $this PlaceReviewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    Yii::t('PlaceReview', 'Place Reviews'),
);

$this->menu=array(
    array('label'=>Yii::t('PlaceReview', 'Create place review'), 'url'=>array('create')),
    array('label'=>Yii::t('PlaceReview', 'Manage place reviews'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('PlaceReview', 'Place Reviews'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
