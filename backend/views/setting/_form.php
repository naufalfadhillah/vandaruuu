<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'setting_nama')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_alamat')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_email')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_phone')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_fax')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_facebook')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_instagram')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_whatsapp')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'latitudeP')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'longitudeP')->textarea(['rows' => 6]) ?>

    <!-- <div class="form-group"> -->
        <?php // Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <!-- </div> -->

    <?php // ActiveForm::end(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'setting_nama')->textInput(['maxlength' => true]) ?> 
            <?= $form->field($model, 'setting_alamat')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_fax')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-lg-6">
            <?= $form->field($model, 'setting_facebook')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_instagram')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_whatsapp')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-lg-12">
            <style>
                /* Always set the map height explicitly to define the size of the div
                 * element that contains the map. */
                #map {
                    height: 500px;
                    width: 800px;
                }
            </style>
            <div id="map"></div>
            <script>
                var map;
                var center = ({lat: 0.508111, lng: 101.4477539});
                var markers = [];
                //                var inputLng = $("#pelanggan-pelangganlongitude");
                //                var inputLat = $("#pelanggan-pelangganlatitude");

                function setMarker(center) {
                    removeMarkers();
                    var marker = new google.maps.Marker({position: center, map: map});
//                    inputLng.val(center.lng);
//                    inputLat.val(center.lat);
                    markers.push(marker);
                }

                function removeMarkers() {
                    for (i = 0; i < markers.length; i++) {
                        markers[i].setMap(null);
                    }
                }

                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 8,
                        center: center
                    });
                    setMarker(center);

                    google.maps.event.addListener(map, 'click', function (event) {
                        center = {lat: event.latLng.lat(), lng: event.latLng.lng()};
                        setMarker(center);
//                        alert('Latitude:'+ event.latLng.lat()+' '+' , Longitude:'+event.latLng.lng());

                        $("#longitudeP").val(event.latLng.lng());
                        $("#latitudeP").val(event.latLng.lat());
                    })
                }

                function resetMarker() {
//
//                    var longitude = $("#pelanggan-pelangganlongitude").val();
//                    var latitude = $("#pelanggan-pelangganlatitude").val();

                    var center = {
                        lat: parseFloat(latitude),
                        lng: parseFloat(longitude)
                    };

                    setMarker(center);
                }

            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYfcArGhWPhdYiMAULigrL0336mSoO6GE&callback=initMap">
            </script>
        </div>
        <br>
        <div class="col-lg-6">

            <?= $form->field($model, 'latitudeP')->textInput(['placeholder' => 'Tentukan Titik Pada Peta Terlebih Dahulu', 'id' => 'latitudeP']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'longitudeP')->textInput(['placeholder' => 'Tentukan Titik Pada Peta Terlebih Dahulu', 'id' => 'longitudeP']) ?>
        </div>

        <div class="col-lg-6">
            <label></label>
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <!-- <div class="form-group"> -->
        <?php //Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <!-- </div> -->

    <?php ActiveForm::end(); ?>

</div>
