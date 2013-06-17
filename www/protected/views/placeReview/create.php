<?php
/* @var $this PlaceReviewController */
/* @var $model PlaceReview */

$this->breadcrumbs=array(
    Yii::t('app', 'Place reviews')=>array('index'),
    Yii::t('app', 'Create'),
);

$this->menu=array(
    array('label'=>Yii::t('PlaceReview', 'List place review'), 'url'=>array('index')),
    array('label'=>Yii::t('PlaceReview', 'Manage place reviews'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('PlaceReview', 'Create place review'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>