<?php
/* @var $this TourController */
/* @var $model Tour */

$this->breadcrumbs=array(
    Yii::t('Tour', 'Tours')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('Tour', 'List Tours'), 'url'=>array('index')),
	array('label'=>Yii::t('Tour', 'Create Tour'), 'url'=>array('create')),
	array('label'=>Yii::t('Tour', 'Update Tour'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('Tour', 'Delete Tour'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo Yii::t('Tour', 'View Tour').' #'.$model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'catid',
		'title',
		'desc',
	),
)); ?>
