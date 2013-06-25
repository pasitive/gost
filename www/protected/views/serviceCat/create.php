<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */

$this->breadcrumbs=array(
    Yii::t('app', 'Service category')=>array('index'),
    Yii::t('app', 'Create'),
);

$this->menu=array(
    array('label'=>Yii::t('ServiceCat', 'List service cat'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('ServiceCat', 'Create service cat'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>