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

    <?php
    $allPlaces = Place::model()->findAll();
    $firstPlace = $allPlaces[0];
    ?>

	<div class="row">
		<?php echo $form->labelEx($model,'placeid'); ?>
		<?php echo $form->dropDownList(
            $model,
            'placeid',
            CHtml::listData(
                $allPlaces,
                'id',
                'title'
            ),
            array(
                'onchange' => '
                $.get("/index.php/serviceCat/ajaxGetCatsByPlace", {"place_id": this.value}, function(data) {
                    $("#ServiceCat_pid").empty();
                    $("#ServiceCat_pid").append($("<option value=\"0\">---</option>"));
                    for ( i in data ) {
                        $("#ServiceCat_pid").append($("<option value=\"" + data[i].id + "\">" + data[i].title + "</option>"));
                    }
                });
                '
            )
        ); ?>
		<?php echo $form->error($model,'placeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList(
            $model,
            'pid',
            CHtml::listData(
                $model->findAll('placeid=:placeid', array(':placeid'=>$firstPlace->id)),
                'id',
                'title'
            ),
            array('empty' => array(0 => '---'))
        ); ?>
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