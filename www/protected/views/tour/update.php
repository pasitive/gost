<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs=array(
    Yii::t('Tour', 'Tours')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
    Yii::t('Tour', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('Tour', 'List Tours'), 'url'=>array('index')),
	array('label'=>Yii::t('Tour', 'Create Tour'), 'url'=>array('create')),
	array('label'=>Yii::t('Tour', 'View Tour'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('Tour', 'Update Tour').' '.$model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>