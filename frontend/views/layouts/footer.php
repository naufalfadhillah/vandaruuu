<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 08/12/19
 * Time: 7:38
 */
use common\models\Setting;

use common\models\FotoGaleri;

$model = Setting::findOne(1);
$model2 = FotoGaleri::find()->all();
?>
</body>
<!-- Footer start -->
<footer class="main-footer clearfix">
    <div class="container">
        <!-- Footer info-->
        <div class="footer-info">
            <div class="row">
                <!-- About us -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-item">
                    <div class="main-title-2">
                            <h1>Lokasi</h1>
                        </div>
                        <div id="map"></div>

                        <script>
                            function initMap() {

                                var locations = [
                                    <?php //
                                        // $n = 0;
                                        // foreach($dataProvider AS $model){
                                       // ?>
                                        ['<strong><?= $model->setting_nama ?></strong><br>Alamat: \
                                        <?= $model->setting_alamat ?><br>Nomor HP: <?= $model->setting_phone ?><br><?= $model->setting_fax?>',
                                        <?= $model->latitudeP ?>, <?= $model->longitudeP ?>],
                                    <?php // } ?>
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
                </div>
                <!-- Contact Us -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Contact Us</h1>
                        </div>
                        <ul class="personal-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <!-- Address: 44 New Design Street, -->
                                <?= $model->setting_alamat ?>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                Email:<a href="mailto:<?= $model->setting_email ?>"><?= $model->setting_email ?></a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                Phone: <a href="tel:<?= $model->setting_phone ?>"><?= $model->setting_phone ?></a>
                            </li>
                            <li>
                                <i class="fa fa-fax"></i>
                                Fax: <?= $model->setting_fax ?>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="social-list">
                            <li><a href="<?= $model->setting_instagram ?>" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?= $model->setting_facebook ?>" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <!-- <li><a href="index.html#" class="rss-bg"><i class="fa fa-rss"></i></a></li> -->
                            <li><a href="<?= $model->setting_whatsapp ?>" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <!-- <li><a href="index.html#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <!-- Gallery -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item gallery">
                        <div class="main-title-2">
                            <h1>Gallery</h1>
                        </div>
                        <ul>
                            <?php foreach ($model2 as $foto){ ?>
                            <li>
                                <a href="gallery-3column.html">
                                    <img src="<?= Yii::$app->request->baseUrl.'/backend/web/'.$foto->file ?>" alt="small-img-2" height="57px" width="77px">
                                </a>
                            </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<!-- Footer end -->
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-submenu.js"></script>
<script src="js/jquery.mb.YTPlayer.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.scrollUp.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.filterizr.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->


<!-- Custom javascript -->


</html>
