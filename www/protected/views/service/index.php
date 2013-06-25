<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
    Yii::t('app', 'Services')=>array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu=array(
    array('label'=>Yii::t('Service', 'List service'), 'url'=>array('index')),
	array('label'=>Yii::t('Service', 'Create service'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('Service', 'Manage services'); ?></h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.groupGridView.GroupGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$model->groupByPlaceCatSearch(),
    'mergeColumns' => array('cat.place.title', 'cat.title'),
	'filter'=>null,
	'columns'=>array(
        'cat.place.title',
		'cat.title',
        'id',
        'title',
		'desc',
		'price',
		'img',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>