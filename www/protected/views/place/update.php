<?php
/* @var $this PlaceController */
/* @var $model Place */

$this->breadcrumbs=array(
    Yii::t('app', 'Places')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
    Yii::t('app', 'Update'),
);

$this->menu=array(
    array('label'=>Yii::t('Place', 'List place'), 'url'=>array('index')),
    array('label'=>Yii::t('Place', 'Create place'), 'url'=>array('create')),
	array('label'=>Yii::t('Place', 'View place'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('Place', 'Update place'); ?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>