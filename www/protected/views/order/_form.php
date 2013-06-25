<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'order-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

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
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->