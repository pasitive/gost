<?php
/* @var $this PlaceController */
/* @var $model Place */

$this->breadcrumbs=array(
    Yii::t('app', 'Places')=>array('index'),
	$model->title,
);

$this->menu=array(
    array('label'=>Yii::t('Place', 'List place'), 'url'=>array('index')),
    array('label'=>Yii::t('Place', 'Create place'), 'url'=>array('create')),
    array('label'=>Yii::t('Place', 'Update place'), 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>Yii::t('Place', 'Delete place'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app', 'Are you sure?'))),
);
?>

<h1><?php echo Yii::t('Place', 'Update place'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'typeid',
		'location_lat',
		'location_lng',
	),
)); ?>
