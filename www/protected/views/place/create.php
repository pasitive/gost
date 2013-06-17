<?php
/* @var $this PlaceController */
/* @var $model Place */

$this->breadcrumbs=array(
    Yii::t('app', 'Places')=>array('index'),
    Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('Place', 'List place'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('Place', 'Create place'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>