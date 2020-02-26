<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Pesan Kamar";
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
            <?php endif; ?>
            <?php
            $this->title = 'Pesan Kamar';
            $this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
            $this->params['breadcrumbs'][] = $this->title;
            ?>
            <div class="booking-create">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                    'pemesanan' => $pemesanan,

                ]) ?>

            </div>