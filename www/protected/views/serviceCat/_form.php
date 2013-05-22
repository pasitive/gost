<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-cat-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'placeid'); ?>
		<?php echo $form->dropDownList( $model,'placeid', CHtml::listData(Place::model()->findAll(), 'id', 'title'), array('empty' => array(0 => '---')) ); ?>
		<?php echo $form->error($model,'placeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList( $model,'pid', CHtml::listData($model->findAll(), 'id', 'title'), array('empty' => array(0 => '---')) ); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->