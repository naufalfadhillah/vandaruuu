<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "Daftar Kamar";
?>


</div>
</header>
<div class="banner-inner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img/banner/banner-slider-3.jpg" alt="banner-slider-3">
                <div class="carousel-caption banner-slider-inner banner-top-align">
                    <div class="banner-content text-center">
                        <h1 data-animation="animated fadeInDown delay-05s"><span>Selamat Datang di</span> Vandaroe
                        </h1>
                        <p data-animation="animated fadeInUp delay-1s">Lorem ipsum dolor sit amet, conconsectetuer
                            adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                        <a href="index.html#" class="btn btn-md btn-theme"
                           data-animation="animated fadeInUp delay-15s">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/banner/banner-slider-2.jpg" alt="banner-slider-2">
                <div class="carousel-caption banner-slider-inner banner-top-align">
                    <div class="banner-content text-center">
                        <h1 data-animation="animated fadeInLeft delay-05s"><span>Best Place To</span> Find Room</h1>
                        <p data-animation="animated fadeInUp delay-05s">Lorem ipsum dolor sit amet, conconsectetuer
                            adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                        <a href="index.html#" class="btn btn-md btn-theme"
                           data-animation="animated fadeInUp delay-15s">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/banner/banner-slider-1.jpg" alt="banner-slider-1">
                <div class="carousel-caption banner-slider-inner banner-top-align">
                    <div class="banner-content text-center">
                        <h1 data-animation="animated fadeInLeft delay-05s"><span>Best Place</span> for relux</h1>
                        <p data-animation="animated fadeInLeft delay-1s">Lorem ipsum dolor sit amet, conconsectetuer
                            adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                        <a href="index.html#" class="btn btn-md btn-theme"
                           data-animation="animated fadeInUp delay-15s">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="<?= Yii::$app->request->baseUrl ?>#carousel-example-generic"
           role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="glyphicon glyphicon-menu-left"></i>
            </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="index.html#carousel-example-generic" role="button"
           data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="glyphicon glyphicon-menu-right"></i>
            </span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Main header start -->

    <!-- Main header end -->
</div>
</div>

