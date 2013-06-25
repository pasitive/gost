<?php
/* @var $this MenuCatController */
/* @var $model MenuCat */

$this->breadcrumbs = array(
    Yii::t('app', 'Menu categories')=>array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('MenuCat', 'List menu categories'), 'url' => array('index')),
    array('label' => Yii::t('MenuCat', 'Create menu category'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menu-cat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php print Yii::t('MenuCat', 'Manage menu categories') ?></h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'menu-cat-grid',
    'dataProvider' => $model->search(),
    'filter' => null,
    'columns' => array(
        'id',
        'placeid',
        'pid',
        'title',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
