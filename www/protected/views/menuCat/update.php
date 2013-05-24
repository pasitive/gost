<?php
/* @var $this MenuCatController */
/* @var $model MenuCat */

$this->breadcrumbs = array(
    Yii::t('MenuCat', 'Menu categories'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => Yii::t('MenuCat', 'List menu categories'), 'url' => array('index')),
    array('label' => Yii::t('MenuCat', 'Create menu category'), 'url' => array('create')),
    array('label' => Yii::t('MenuCat', 'View menu category'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('MenuCat', 'Manage menu categories'), 'url' => array('admin')),
);
?>

    <h1>Update MenuCat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>