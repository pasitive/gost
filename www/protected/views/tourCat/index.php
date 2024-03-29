<?php
/* @var $this TourCatController */
/* @var $model TourCat */

$this->breadcrumbs=array(
    Yii::t('TourCat', 'Tour Cats')=>array('index'),
    Yii::t('TourCat', 'List Tour Cats'),
);

$this->menu=array(
	array('label'=>Yii::t('TourCat', 'List Tour Cats'), 'url'=>array('index')),
	array('label'=>Yii::t('TourCat', 'Create TourCat'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tour-cat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('TourCat', 'List Tour Cats'); ?></h1>

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

<?php $this->widget('ext.groupGridView.GroupGridView', array(
	'id'=>'tour-cat-grid',
	'dataProvider'=>$model->search(),
	'filter'=>null,
    'mergeColumns' => 'place.title',
	'columns'=>array(
        'place.title',
		'id',
		'pid',
		'title',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
