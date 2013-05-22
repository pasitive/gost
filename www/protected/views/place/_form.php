<?php
/* @var $this PlaceController */
/* @var $model Place */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'place-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'typeid'); ?>
        <?php echo $form->dropDownList($model, 'typeid', Place::$typeLabels); ?>
        <?php echo $form->error($model, 'typeid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="row">
        <div id="map" style="height: 400px;"></div>
    </div>

    <?php echo $form->hiddenField($model, 'location_lng'); ?>
    <?php echo $form->hiddenField($model, 'location_lat'); ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->


<script type="text/javascript">

    $(function () {

        var map = null;

        ymaps.ready(init);

        // Инициализации карты
        function init() {

            var mapOptions = {center: [55.76, 37.64], zoom: 8, type: "yandex#map"},
                placemark = null;

            initMap();

            function initMap() {
                map = new ymaps.Map('map', mapOptions);
                map.behaviors.enable('scrollZoom');

                var address = $('#Place_address');
                if (address.val().length != 0) {
                    geocode(address);
                }
            }

            function geocode(obj) {

                // Получаем значение поля Адрес
                var address = obj.val();

                // Геокодируем его и кладем полученные координаты в скрытые поля формы location_lng и location_lat
                ymaps.geocode(address, {results: 1, boundedBy: map.getBounds()}).then(function (result) {
                    if (placemark != null) {
                        map.geoObjects.remove(placemark);
                    }
                    var obj = result.geoObjects.get(0);
                    placemark = new ymaps.Placemark(obj.geometry.getCoordinates(), {
                        hintContent: address
                    }, {
                        preset: 'twirl#houseIcon'
                    });

                    setHiddenCoords(placemark.geometry.getCoordinates());

                    map.setCenter(placemark.geometry.getCoordinates());
                    map.setZoom(16);
                    map.geoObjects.add(placemark);
                });
            }

            // Вспомогательный метод установки координат
            function setHiddenCoords(coords) {
                $('#Place_location_lng').val(coords[0]);
                $('#Place_location_lat').val(coords[1]);
            }

            // При изменении ареса - геокодируем заново
            // Если нажали Enter - геокодируем
            $('#Place_address').change(function () {
                geocode($(this));
            }).keypress(function (e) {
                    if (e.which == 13) {
                        e.preventDefault();
                        geocode($(this))
                    }
                });

        }
    });
</script>