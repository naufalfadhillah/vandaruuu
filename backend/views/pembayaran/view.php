<?php

use common\models\Tipe;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pembayaran */

$this->title = $model->pembayaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pembayaran-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Approve', ['approve', 'id' => $model->pembayaran_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Decline', ['decline', 'id' => $model->pembayaran_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php //DetailView::widget([
    //     'model' => $model,
    //     'attributes' => [
    //         'pembayaran_id',
    //         'pembayaran_id_booking',
    //         'pembayaran_jumlah',
    //         'pembayaran_tgl_bayar',
    //         'pembayaran_resi:ntext',
    //         'status',
    //     ],
    // ]) ?>

    <div class="row">

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="prod_title">Booking ID : <?= $model2->booking_id ?></h3>
                <h5 class="prod_title">Tanggal Pesan : <?= date('d F Y', strtotime($model2->booking_tgl_pesan ))?> </h5>
                <h5 class="prod_title">Lama Menginap : <?= $model2->booking_durasi ?> Hari</h5>
                <h5 class="prod_title">Tanggal Check in : <?= date('d F Y', strtotime($model2->booking_tgl_check_in)) ?> </h5>
            </div>
            <div class="box-body">
                <h4>Data Pelanggan</h4>
                <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>&nbsp;  : </td>
                        <td>
                            <?= $model4->pelanggan_nama ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td  >&nbsp;  : </td>
                        <td>
                            <?= $model4->pelanggan_jk ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>&nbsp;  : </td>
                        <td>
                            <?= date('d F Y', strtotime($model4->pelanggan_tgl_lahir)) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td >&nbsp;  : </td>
                        <td>
                            <?= $model4->pelanggan_alamat ?>
                        </td>
                    </tr>
                    <tr>
                        <th>No Hp</th>
                        <td>&nbsp; : </td>
                        <td>
                            <?= $model4->pelanggan_no_hp ?>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="box-body">
                
            </div>
        </div>
    </div>
    <div class="row col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="prod_title">Pemesanan Kamar :</h3>
            </div>
            <div class="box-body">
                <?php 
                $uu=$model2->booking_id_kamar;
                $ccd=explode(",",$uu);
                $i = 0;
                // print_r($fasilitas);
                // exit();
                $harga = 0;
                ?>
                
                <?php foreach ($model3 as $kamar ) : ?>
                    <?php $no = $i+1?>
                <h4> Kamar <?=$no?> </h4>
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>Nama Kamar</th>
                        <td>&nbsp;  : </td>
                        <td>
                            <?php echo $kamar[0]['kamar_nama'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Tipe Kamar</th>
                        <td>&nbsp;  : </td>
                        <td>    <?php $tipe = Tipe::findOne($kamar[0]->kamar_tipe); ?> 
                            <?= $tipe->tipe_nama ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>&nbsp;  : </td>
                        <td> 
                            <?= "Rp. ".number_format($tipe->tipe_harga) ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php 
                    $harga = $harga + $tipe->tipe_harga;
                    $i++;
                    endforeach; 
                ?>
                
            </div>
        </div>         
    </div>
    <div class="row col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="prod_title">Bukti Transfer :</h3>
            </div>
            <div class="box-body">
                    <?= Html::img(Yii::getAlias('@web').'/'. $model->pembayaran_resi,['width' => '50%','height' => '50%']);?>
            </div>
        </div>
    </div>
    </div>
    
    <hr><!--Harga Layout-->
    <div class="product_price">
    <h3> Total Harga : </h3><h1 class="price"><?= "Rp. ".number_format($model2->booking_harga) ?></h1>
    <br>
</div>

</div>
