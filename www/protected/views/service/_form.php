<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'service-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx(Place::model(), 'title'); ?>
        <?php echo $form->dropDownList( Place::model(),'id', CHtml::listData(Place::model()->findAll(), 'id', 'title'), array('empty' => array(0 => '---')) ); ?>
        <?php echo $form->error($model,'catid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'catid'); ?>
        <?php echo $form->dropDownList( $model, 'catid', CHtml::listData(ServiceCat::model()->findAll(), 'id', 'title'), array('empty' => array(0 => '---')) ); ?>
        <?php echo $form->error($model, 'catid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'desc'); ?>
        <?php echo $form->textArea($model, 'desc', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'desc'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'img'); ?>
        <?php echo $form->fileField($model, 'img', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'img'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->