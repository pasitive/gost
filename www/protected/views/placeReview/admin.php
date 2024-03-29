<?php
/* @var $this PlaceReviewController */
/* @var $model PlaceReview */

$this->breadcrumbs=array(
    Yii::t('app', 'Place reviews')=>array('index'),
    Yii::t('PlaceReview', 'Manage'),
);

$this->menu=array(
    array('label'=>Yii::t('PlaceReview', 'List place review'), 'url'=>array('index')),
    array('label'=>Yii::t('PlaceReview', 'Create place review'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#place-review-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('PlaceReview', 'Manage place reviews'); ?></h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'place-review-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'placeid',
		'rating',
		'text',
		'create_time',
		'update_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
