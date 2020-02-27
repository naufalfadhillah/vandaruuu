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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0867115044193!2d110.33844931477326!3d-6.999069994944016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708aa29cbb7bcf%3A0x79425c4d29c9c5af!2sRumah%20Vandaroe%20Penginapan%20Harian%2CMingguan%20-%20Kost%20%26%20Paviliun%20Bulanan!5e0!3m2!1sid!2sid!4v1582559113564!5m2!1sid!2sid" width="500" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>


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
