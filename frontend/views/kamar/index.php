<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

use common\models\Tipe;
$this->title = "Vandaroe";
?>


</div>
</header>

</div>
<!-- Hotel section start -->
<div class="content-area hotel-section chevron-icon">
    <div class="overlay">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Daftar Kamar</h1>
            </div>
            <div class="row">


                    <div class="carousel-inner">

                        <?php if (count($kamar) > 0) {

                            ?>
                            <?php foreach ($kamar as $k) {
                                $tipe = Tipe::findOne(['tipe_id'=>$k['kamar_tipe']]);?>
                                <a href="<?= Url::to(['kamar/rincian', 'nomor' =>$k['kamar_id']])?>">
                                    <div class="item active">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="hotel-box">
                                                <!--header -->
                                                <div class="header clearfix">
                                                    <img src="<?= Yii::$app->request->baseUrl . '/backend/web' .$tipe['tipe_gambar'] ?>" class=" img-responsive" >
                                                </div>
                                                <!-- Detail -->
                                                <div class="detail clearfix">
                                                    <div class="pr float-right">
                                                        Rp. <?= Html::encode("{$tipe['tipe_harga']}") ?><sub>/Hari</sub>
                                                    </div>
                                                    <h3>
                                                        <a><?= $k['kamar_nama']?></a>
                                                    </h3>
                                                    <h5 class="location">
                                                        <a href="rooms-details.html">
                                                            Type : <?= Html::encode("{$tipe['tipe_nama']}") ?>
                                                        </a>
                                                    </h5>

                                                    <p><?= HTML::decode("{$tipe['tipe_deskripsi']}") ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                        } ?>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hotel section end -->
<!-- Gallery secion start -->

