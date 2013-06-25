<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
    Yii::t('app', 'MenuItems')=>array('index'),
    $model->title,
);

$this->menu=array(
    array('label'=>Yii::t('MenuItem', 'List menu item'), 'url'=>array('index')),
    array('label'=>Yii::t('MenuItem', 'Create menu item'), 'url'=>array('create')),
	array('label'=>Yii::t('MenuItem', 'Update menu item'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('MenuItem', 'Delete menu item'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo Yii::t('MenuItem', 'View menu item'); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'catid',
		'title',
		'desc',
		'img',
	),
)); ?>
