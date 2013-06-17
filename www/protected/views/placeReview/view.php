<?php
/* @var $this PlaceReviewController */
/* @var $model PlaceReview */

$this->breadcrumbs=array(
    Yii::t('app', 'Place reviews')=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>Yii::t('PlaceReview', 'List place review'), 'url'=>array('index')),
    array('label'=>Yii::t('PlaceReview', 'Create place review'), 'url'=>array('create')),
	array('label'=>Yii::t('PlaceReview', 'Update place review'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('PlaceReview', 'Delete place review'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app', 'Are you sure?'))),
    array('label'=>Yii::t('PlaceReview', 'Manage place reviews'), 'url'=>array('admin')),
);
?>

<h1>View PlaceReview #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'placeid',
		'rating',
		'text',
		'create_time',
		'update_time',
	),
)); ?>
