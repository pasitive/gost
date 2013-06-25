<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs=array(
    Yii::t('Tour', 'Tours')=>array('index'),
    Yii::t('Tour', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('Tour', 'Tours'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('Tour', 'Create Tour') ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>