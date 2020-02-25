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
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <h1>
        <?= Yii::$app->session->getFlash('success') ?>
    </h1>
<?php endif; ?>
<!-- Hotel alpha start -->
<div class="hotel-alpha content-area-12">
    <div class="container">
        <div class="row">
            <h1>Formulir Pemesanan</h1>
            <?php
            $this->title = 'Create Booking';
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