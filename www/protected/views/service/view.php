<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
    Yii::t('app', 'Services')=>array('index'),
	$model->title,
);

$this->menu=array(
    array('label'=>Yii::t('Service', 'List service'), 'url'=>array('index')),
    array('label'=>Yii::t('Service', 'Create service'), 'url'=>array('create')),
	array('label'=>Yii::t('Service', 'Update service'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('Service', 'Delete service'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app', 'Are you sure?'))),
);
?>

<h1><?php echo Yii::t('Service', 'View service'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'catid',
		'title',
		'desc',
		'price',
		array(
            'type' => 'image',
            'value' => $model->getImg(450),
        ),
	),
)); ?>
