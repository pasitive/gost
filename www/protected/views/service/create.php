<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
    Yii::t('app', 'Services')=>array('index'),
    Yii::t('app', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('Service', 'List service'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('Service', 'Create service'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>