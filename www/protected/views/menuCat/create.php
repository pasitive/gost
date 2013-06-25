<?php
/* @var $this MenuCatController */
/* @var $model MenuCat */

$this->breadcrumbs=array(
    Yii::t('app', 'Menu categories')=>array('index'),
    Yii::t('app', 'Create'),
);

$this->menu=array(
    array('label' => Yii::t('MenuCat', 'List menu categories'), 'url' => array('index')),
);
?>

<h1><?php print Yii::t('MenuCat', 'Create menu category') ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>