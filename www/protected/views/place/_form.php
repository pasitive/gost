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
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->dropDownList($model, 'typeid', Place::$typeLabels); ?>
        <?php echo $form->error($model, 'typeid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'images'); ?>
        <?php $this->widget('CMultiFileUpload', array(
            'model' => $model,
            'attribute' => 'images',
            'accept' => 'jpg|gif|png',
        )); ?>
        <?php echo $form->error($model, 'images'); ?>
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
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->


<script type="text/javascript">

    $(function () {

        var map = null;
        var point = null;
        ymaps.ready(init);

        // Инициализации карты
        function init() {

            var mapOptions = {
                    center: [55.76, 37.64],
                    zoom: 8,
                    type: "yandex#map"
                },
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
                    if ( null != point ) {
                        map.geoObjects.remove(point);
                    }
                    var obj = result.geoObjects.get(0);

                    createPoint(obj.geometry.getCoordinates());
                    map.setCenter(point.geometry.getCoordinates());
                    map.setZoom(16);
                });
            }

            // Вспомогательный метод установки координат
            function setHiddenCoords(coords) {
                $('#Place_location_lng').val(coords[0]);
                $('#Place_location_lat').val(coords[1]);
            }

            // Вспомогательный метод создания точки на карте
            function createPoint(coords) {
                point = new ymaps.Placemark(coords, {}, {"draggable":true, "preset": "twirl#houseIcon"});
                point.events.add('dragend', function (e) {
                    var _this = e.get('target');
                    $("#Place_address").val("");
                    setHiddenCoords( _this.geometry.getCoordinates() );
                });
                map.geoObjects.add(point);
                setHiddenCoords(coords);
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

            map.events.add('click', function(e) {
                var coords = e.get('coordPosition');
                if ( null == point ) {
                    createPoint(coords);
                }
            });

        }
    });
</script>