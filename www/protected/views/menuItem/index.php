<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
    Yii::t('app', 'Menu items')=>array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu=array(
    array('label'=>Yii::t('MenuItem', 'List menu item'), 'url'=>array('index')),
    array('label'=>Yii::t('MenuItem', 'Create menu item'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menu-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('MenuItem', 'Manage menu items'); ?></h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menu-item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>null,
	'columns'=>array(
		'id',
		'cat.title',
		'title',
		'desc',
		'img',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
