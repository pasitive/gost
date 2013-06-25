<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
    Yii::t('app', 'Menu items')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
    Yii::t('app', 'Update'),
);

$this->menu=array(
    array('label'=>Yii::t('MenuItem', 'List menu item'), 'url'=>array('index')),
    array('label'=>Yii::t('MenuItem', 'Create menu item'), 'url'=>array('create')),
	array('label'=>Yii::t('MenuItem', 'View Menu item'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

    <h1><?php echo Yii::t('MenuItem', 'Update menu item'); ?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>