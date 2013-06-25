<?php
$this->breadcrumbs=array(
    Yii::t('app', 'Orders')=>array('index'),
	$model->id,
);

$this->menu=array(
    array('label'=>Yii::t('Order', 'List order'), 'url'=>array('index')),
    array('label'=>Yii::t('Order', 'Create order'), 'url'=>array('create')),
	array('label'=>Yii::t('Order', 'Update order'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('Order', 'Delete order'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app', 'Are you sure?'))),
);
?>

<h1><?php echo Yii::t('Order', 'View order'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'room_number',
		'placeid',
		'phone',
	),
)); ?>
