<?php
$this->breadcrumbs=array(
    Yii::t('app', 'Orders')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
    Yii::t('app', 'Update'),
);

$this->menu=array(
    array('label'=>Yii::t('Order', 'List order'), 'url'=>array('index')),
    array('label'=>Yii::t('Order', 'Create order'), 'url'=>array('create')),
	array('label'=>Yii::t('Order', 'View order'), 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('Order', 'Update order'); ?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>