<?php
/* @var $this PlaceReviewController */
/* @var $model PlaceReview */

$this->breadcrumbs=array(
    Yii::t('app', 'Place reviews')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
    Yii::t('app', 'Update'),
);

$this->menu=array(
    array('label'=>Yii::t('PlaceReview', 'List place review'), 'url'=>array('index')),
    array('label'=>Yii::t('PlaceReview', 'Create place review'), 'url'=>array('create')),
	array('label'=>Yii::t('PlaceReview', 'View place review'), 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>Yii::t('PlaceReview', 'Manage place reviews'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('PlaceReview', 'View place review'); ?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>