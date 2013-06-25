<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */

$this->breadcrumbs=array(
    Yii::t('app', 'Service category')=>array('index'),
	$model->title,
);

$this->menu=array(
    array('label'=>Yii::t('ServiceCat', 'List ServiceCat'), 'url'=>array('index')),
    array('label'=>Yii::t('ServiceCat', 'Create ServiceCat'), 'url'=>array('create')),
	array('label'=>Yii::t('ServiceCat', 'Update ServiceCat'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('ServiceCat', 'Delete ServiceCat'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app', 'Are you sure?'))),
);
?>

<h1><?php echo Yii::t('ServiceCat', 'View ServiceCat'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'placeid',
		'pid',
		'title',
	),
)); ?>
