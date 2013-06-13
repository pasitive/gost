<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>

<?php
if ( null == $model->cat ) {
    $model->cat = new ServiceCat();
    $model->cat->place = new Place();
    $firstPlace = $model->cat->place->find(
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
            loadDataIntoSelect($("#Service_catid"), data);
        });
    }

    function changeTypeID(id) {
        $.get("/index.php/place/ajaxGetPlacesByType", {"type_id": id}, function(data) {
            loadDataIntoSelect($("#Place_id"), data);
            changePlaceID(data[0].id);
        });
    }
</script>

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
        <?php echo $form->labelEx($model->cat->place, 'typeid'); ?>
        <?php echo $form->dropDownList(
            $model->cat->place, 'typeid', Place::getAllTypes(),
            array('onchange' => 'changeTypeID(this.value);')
        ); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model->cat, 'place'); ?>
        <?php echo $form->dropDownList(
            $model->cat->place,'id',
            CHtml::listData(
                $model->cat->place->findAll(
                    'typeid=:typeid',
                    array(':typeid'=> (null == $model->cat->place->typeid) ? 0 : $model->cat->place->typeid)
                ),
                'id', 'title'
            ),
            array('onchange' => 'changePlaceID(this.value);')
        ); ?>
        <?php echo $form->error($model,'catid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'cat'); ?>
        <?php echo $form->dropDownList(
            $model, 'catid',
            CHtml::listData(
                ServiceCat::model()->findAll(
                    'placeid=:placeid',
                    array(':placeid'=> (null == $model->cat->place->id) ? $firstPlace->id : $model->cat->place->id)
                ),
                'id', 'title'
            )
        ); ?>
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