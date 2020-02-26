<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use marekpetras\yii2ajaxboxwidget\Box;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemetaan Peternak';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    #map {
        height: 400px;
        width: 100% !important;
    }
</style>

<div class="pelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id="map"></div>

    <script>
        function initMap() {

            var locations = [
                <?php
                    $n = 0;
                    foreach($dataProvider AS $model){
                    ?>
                    ['<strong><?= $model->setting_nama ?></strong><br>Alamat: \
                    <?= $model->setting_alamat ?><br>Nomor HP: <?= $model->setting_phone ?><br><?= $model->setting_fax?>',
                     <?= $model->latitudeP ?>, <?= $model->longitudeP ?>],
                <?php } ?>
            ];
            var iconBase = '<?= Yii::$app->request->baseUrl ?>/img/';
            var icons = iconBase + 'icon.png';
              
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,

                center: new google.maps.LatLng(0.506381, 101.446577),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow({});

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    icon: icons,
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        //alert('Latitude:'+ event.latLng.lat()+' '+' , Longitude:'+event.latLng.lng());
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
//            google.maps.event.addListener(map,'click',function(event){
//                marker = new google.maps.Marker({position: event.latLng});
//                alert('Latitude:'+ event.latLng.lat()+' '+' , Longitude:'+event.latLng.lng());
//            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYfcArGhWPhdYiMAULigrL0336mSoO6GE&callback=initMap"
            async defer></script>


</div>


<?php $this->registerJs("
    $('#Searchform').submit(function(e){
        e.preventDefault();
        var data = $(this).serialize(); // this will be loaded via post on submit
        $('#report .box-init').each(function(){
            $(this).box('reload',data).box('hide');
        });
    });
");?>