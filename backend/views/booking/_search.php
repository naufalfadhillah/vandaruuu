<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BookingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'booking_id') ?>

    <?= $form->field($model, 'booking_id_pelanggan') ?>

    <?= $form->field($model, 'booking_id_kamar') ?>

    <?= $form->field($model, 'booking_durasi') ?>

    <?= $form->field($model, 'booking_tgl_pesan') ?>

    <?php // echo $form->field($model, 'booking_tgl_check_in') ?>

    <?php // echo $form->field($model, 'booking_status') ?>

    <?php // echo $form->field($model, 'booking_harga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
