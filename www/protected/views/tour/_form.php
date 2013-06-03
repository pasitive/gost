<?php
/* @var $this TourController */
/* @var $model Tour */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tour-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php
        $allPlaces = Place::model()->findAll();
        $firstPlace = $allPlaces[0];
    ?>
    <div class="row">
        <?php echo $form->labelEx(Place::model(),'title'); ?>
        <?php echo $form->dropDownList(
            Place::model(), 'id',
            CHtml::listData(Place::model()->findAll(), 'id', 'title'),
            array(
                'onchange' => '
                $.get("/index.php/tourCat/ajaxGetCatsByPlace", {"place_id": this.value}, function(data) {
                    $("#Tour_catid").empty();
                    for ( i in data ) {
                        $("#Tour_catid").append($("<option value=\"" + data[i].id + "\">" + data[i].title + "</option>"));
                    }
                });
                '
            )
        ); ?>
    </div>

	<div class="row">
        <?php echo $form->labelEx($model,'catid'); ?>
        <?php echo $form->dropDownList(
            $model,
            'catid',
            CHtml::listData(
                TourCat::model()->findAll('placeid=:placeid', array(':placeid'=>$firstPlace->id)), 'id', 'title'
            )
        ); ?>
        <?php echo $form->error($model,'catid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>

    <?php if(!empty($model->images)) {
        foreach($model->images as $image) {
            echo CHtml::image($image->img);
        }
    }
    ?>


    <div class="row">
        <?php echo $form->labelEx($model,'images'); ?>
        <?php $this->widget('CMultiFileUpload', array('model'=>$model, 'attribute'=>'images')); ?>
        <?php echo $form->error($model,'images'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->