<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "Vandaroe";
?>


</div>
</header>

<!-- Hotel section start -->
<div class="content-area hotel-section chevron-icon">
    <div class="overlay">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Daftar Kamar</h1>
            </div>
            <div class="row">
                <div class="carousel our-partners slide" id="ourPartners3">
                    
                    <div class="carousel-inner">

                        <?php if (count($kamar) > 0) {
                            $no = 0;
                            ?>
                            <?php foreach ($kamar as $k) { ?>
                                <div class="item <?php if ($no==0){ echo 'active';}?>">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="hotel-box">
                                            <!--header -->
                                            <div class="header clearfix">van
<!--                                                <img src="--><?//= Yii::$app->request->baseUrl . '/backend/web' .$k['tipe_gambar'] ?><!--" class=" img-responsive" >-->
                                            </div>
                                            <!-- Detail -->
                                            <div class="detail clearfix">
                                                <div class="pr float-right">
                                                    Rp 10000
<!--                                                    Rp. --><?//= Html::encode("{$k['tipe_harga']}") ?><!--<sub>/Hari</sub>-->
                                                </div>
                                                <h3>
                                                    Kantau
<!--                                                    <a href="--><?//= Url::to(['/kamar/pesan', 'id' =>$k['kamar_id']])?><!--">--><?//= $k['tipe_nama']?><!--</a>-->
                                                </h3>
                                                <h5 class="location">
                                                    <a href="rooms-details.html">
                                                        oke
<!--                                                        Type : --><?//= Html::encode("{$k['kamar_type']}") ?>
                                                    </a>
                                                </h5>

<!--                                                <p>--><?//= HTML::decode("{$k['kamar_deskripsi']}") ?><!--</p>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $no++;
                            }
                        } ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hotel section end -->
<!-- Gallery secion start -->

