<?php
/* @var $this MenuCatController */
/* @var $model MenuCat */

$this->breadcrumbs = array(
    Yii::t('MenuCat', 'Menu categories'),
    $model->title,
);

$this->menu = array(

    array('label' => Yii::t('MenuCat', 'List menu categories'), 'url' => array('index')),
    array('label' => Yii::t('MenuCat', 'Create menu category'), 'url' => array('create')),
    array('label' => Yii::t('MenuCat', 'View menu category'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('MenuCat', 'Manage menu categories'), 'url' => array('admin')),


    array('label' => Yii::t('MenuCat', 'Update menu category'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('MenuCat', 'Delete menu category'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<h1><?php print Yii::t('MenuCat', 'View menu category') ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'placeid',
        'pid',
        'title',
    ),
)); ?>
