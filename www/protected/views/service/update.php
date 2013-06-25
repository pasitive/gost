<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
    Yii::t('app', 'Services')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
    Yii::t('app', 'Update'),
);

$this->menu=array(
    array('label'=>Yii::t('Service', 'List service'), 'url'=>array('index')),
    array('label'=>Yii::t('Service', 'Create service'), 'url'=>array('create')),
	array('label'=>Yii::t('Service', 'View service'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('Service', 'Update service'); ?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>