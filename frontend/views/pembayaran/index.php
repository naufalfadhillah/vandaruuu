<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Tipe;
use common\models\Kamar;

$this->title = "Pembayaran";
?>
<!DOCTYPE html>

</div>
</header>



<!-- Hotel alpha start -->
<div class="hotel-alpha content-area-12">
    <div class="container">
        <div class="row">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <p style="background-color: green;color: white">
                    Pemesanan Berhasil ... <?= Yii::$app->session->getFlash('success') ?>
                </p>
            <?php elseif(Yii::$app->session->hasFlash('warning')): ?>
                <p style="background-color: orange;color: white">
                    Maaf ... <?= Yii::$app->session->getFlash('warning') ?>
                </p>
            <?php
                endif; ?>
            <?php
            $this->title = 'Pembayaran';
            $this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
            $this->params['breadcrumbs'][] = $this->title;
            ?>
            <div class="booking-create">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'booking' => $booking,


                ]) ?>
                <?php
                    if (Yii::$app->session->hasFlash('success')){
                        ?>
                        <table class="table table-responsive">
                            <thead class="thead-dark">
                            <tr>

                                <th scope="col">Nama</th>
                                <th scope="col">Nomor HP</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Tanggal Check In</th>
                                <th scope="col">Jumlah Pembayaran</th>
                            </tr>
                            <tr>
                                <td><?= $pelanggan['pelanggan_nama']?></td>
                                <td><?= $pelanggan['pelanggan_no_hp']?></td>

                                <td><?= $pesan['booking_tgl_pesan']?></td>
                                <td><?= $pesan['booking_durasi']?> Hari</td>
                                <td><?= $pesan['booking_tgl_check_in']?></td>
                                <td>Rp. <?= $pesan['booking_harga']?></td>
                            </tr>
                        </table>
                        <h3>Detail Kamar</h3>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>

                                <th scope="col">Nama</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Harga/Hari</th>
                            </tr>
                            <?php

                            foreach ($kamar as $k){
                                $room = Kamar::findOne($k);
                                $tipe = Tipe::findOne($room['kamar_tipe']);
                                ?>
                                <tr>
                                    <td><?= $room['kamar_nama']?></td>
                                    <td> <img width="70px" height="70px" src="<?= Yii::$app->request->baseUrl . '/backend/web' . $tipe['tipe_gambar'] ?>"</td>
                                    <td>Rp. <?= $tipe['tipe_harga']?></td>
                                </tr>
                            <?php
                            }?>

                        </table>
<?php
                        /*
                         * Disini Form Untuk Melakukan Pembayaran
                         */
                        ?>
                        <h1><?= Html::encode($this->title) ?></h1>

                        <?= $this->render('_form_bayar', [
                            'pembayaran' => $pembayaran,


                        ]) ?>

                    <?php
                    }
                ?>
            </div>