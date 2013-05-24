<?php
/* @var $this MenuCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('MenuCat', 'Menu categories'),
);

$this->menu=array(
	array('label'=>Yii::t('MenuCat', 'Create menu category'), 'url'=>array('create')),
	array('label'=>Yii::t('MenuCat', 'Manage menu categories'), 'url'=>array('admin')),
);
?>

<h1><?php print Yii::t('MenuCat', 'Menu categories') ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
