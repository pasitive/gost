<?php
/* @var $this MenuCatController */
/* @var $model MenuCat */

$this->breadcrumbs = array(
    Yii::t('MenuCat', 'Menu categories'),
    'Manage',
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

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

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
