<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */

$this->breadcrumbs=array(
    Yii::t('app', 'Service category')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('ServiceCat', 'List ServiceCat'), 'url'=>array('index')),
    array('label'=>Yii::t('ServiceCat', 'Create ServiceCat'), 'url'=>array('create')),
	array('label'=>Yii::t('ServiceCat', 'View ServiceCat'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('ServiceCat', 'Update ServiceCat'); ?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>