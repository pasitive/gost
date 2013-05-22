<?php
/* @var $this PlaceController */
/* @var $model Place */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'place-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'typeid'); ?>
		<?php echo CHtml::activeDropDownList($model, 'typeid', CHtml::listData(PlaceType::model()->findAll(), 'type_id', 'type_title')) ?>
		<?php echo $form->error($model,'typeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_lat'); ?>
		<?php echo $form->textField($model,'location_lat'); ?>
		<?php echo $form->error($model,'location_lat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_lng'); ?>
		<?php echo $form->textField($model,'location_lng'); ?>
		<?php echo $form->error($model,'location_lng'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->