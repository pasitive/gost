<?php
/* @var $this PlaceController */
/* @var $model Place */

$this->breadcrumbs=array(
    Yii::t('app', 'Places')=>array('index'),
    Yii::t('Place', 'List place'),
);

$this->menu=array(
	array('label'=>Yii::t('Place', 'List place'), 'url'=>array('index')),
	array('label'=>Yii::t('Place', 'Create place'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#place-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('Place', 'List place'); ?></h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'place-grid',
	'dataProvider'=>$model->search(),
	'filter'=>null,
	'columns'=>array(
		'id',
		'title',
		array(
            'value' => 'Place::getTypeLabel($data->typeid)',
            'header' => Yii::t('Place', 'Type')
        ),
		'location_lat',
		'location_lng',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
