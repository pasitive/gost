<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */

$this->breadcrumbs=array(
    Yii::t('app', 'Service category')=>array('index'),
    Yii::t('ServiceCat', 'Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('ServiceCat', 'Create ServiceCat'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#service-cat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('ServiceCat', 'Manage Service Cats'); ?></h1>

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
	'id'=>'service-cat-grid',
	'dataProvider'=>$model->search(),
    'mergeColumns' => 'place.title',
	'filter'=>null,
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