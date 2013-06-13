<?php
/* @var $this ServiceCatController */
/* @var $model ServiceCat */
/* @var $form CActiveForm */
?>

<?php
if ( null == $model->place ) {
    $model->place = new Place();
    $firstPlace = $model->place->find(
        'typeid=:typeid',
        array(':typeid'=> 0)
    );
}
?>

<script>
function loadDataIntoSelect(id, data, nullValues) {
    id.empty();
    if ( nullValues ) {
        id.append($("<option value=\"0\">---</option>"));
    }
    for ( i in data ) {
        id.append($("<option value=\"" + data[i].id + "\">" + data[i].title + "</option>"));
    }
}
function changePlaceID(id) {
    $.get("/index.php/serviceCat/ajaxGetCatsByPlace", {"place_id": id}, function(data) {
        loadDataIntoSelect($("#ServiceCat_pid"), data, true);
    });
}
function changeTypeID(id) {
    $.get("/index.php/place/ajaxGetPlacesByType", {"type_id": id}, function(data) {
        loadDataIntoSelect($("#ServiceCat_placeid"), data);
        changePlaceID(data[0].id);
    });
}
</script>

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
        <?php echo $form->labelEx($model->place, 'typeid'); ?>
        <?php echo $form->dropDownList(
            $model->place, 'typeid', Place::getAllTypes(),
            array('onchange' => 'changeTypeID(this.value);')
        ); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->dropDownList(
            $model, 'placeid',
            CHtml::listData(
                $model->place->findAll(
                    'typeid=:typeid',
                    array(':typeid'=> (null == $model->place->typeid) ? 0 : $model->place->typeid)
                ),
                'id', 'title'
            ),
            array('onchange' => 'changePlaceID(this.value);')
        ); ?>
		<?php echo $form->error($model,'placeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList(
            $model, 'pid',
            CHtml::listData(
                $model->findAll(
                    'placeid=:placeid',
                    array(':placeid' => (null == $model->place->id) ? $firstPlace->id : $model->place->id)
                ),
                'id', 'title'
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