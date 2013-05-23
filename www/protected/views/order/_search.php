<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'room_number'); ?>
        <?php echo $form->textField($model, 'room_number'); ?>
        <?php echo $form->error($model, 'room_number'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'placeid'); ?>
        <?php echo $form->dropDownList($model, 'placeid', CHtml::listData(Place::model()->findAll(), 'id', 'title')); ?>
        <?php echo $form->error($model, 'placeid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone'); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->