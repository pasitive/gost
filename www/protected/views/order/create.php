<?php
$this->breadcrumbs=array(
    Yii::t('app', 'Order')=>array('index'),
    Yii::t('app', 'Create'),
);

$this->menu=array(
    array('label'=>Yii::t('Order', 'List order'), 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('Order', 'Create order'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>