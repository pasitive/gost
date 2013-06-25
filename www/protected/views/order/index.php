<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
    Yii::t('app', 'Orders')=>array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu=array(
    array('label'=>Yii::t('Order', 'List order'), 'url'=>array('index')),
	array('label'=>Yii::t('Order', 'Create order'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('Order', 'Manage orders'); ?></h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>null,
	'columns'=>array(
		'id',
		'phone',
		'place.title',
		'room_number',
        array(
            'type' => 'raw',
            'value' => 'CHtml::link("На карте", "http://maps.google.com?ll={$data->location_lat},{$data->location_lng}&z=11")',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
