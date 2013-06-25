<?php
/* @var $this MenuCatController */
/* @var $model MenuCat */

$this->breadcrumbs = array(
    Yii::t('app', 'Menu categories')=>array('index'),
    $model->title => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('MenuCat', 'List menu categories'), 'url' => array('index')),
    array('label' => Yii::t('MenuCat', 'Create menu category'), 'url' => array('create')),
    array('label' => Yii::t('MenuCat', 'View menu category'), 'url' => array('view', 'id' => $model->id)),
);
?>

    <h1><?php echo Yii::t('MenuCat', 'Update menu category'); ?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>