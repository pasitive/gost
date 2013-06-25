<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
    Yii::t('app', 'Menu items')=>array('index'),
    Yii::t('app', 'Create'),
);

$this->menu=array(
    array('label'=>Yii::t('MenuItem', 'List menu item'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('MenuItem', 'Create menu item'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>