<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'booking_id_pelanggan')->textInput() ?>

    <?= $form->field($model, 'booking_id_kamar')->textInput() ?>

    <?= $form->field($model, 'booking_durasi')->textInput() ?>

    <?= $form->field($model, 'booking_tgl_pesan')->textInput() ?>

    <?= $form->field($model, 'booking_tgl_check_in')->textInput() ?>

    <?= $form->field($model, 'booking_status')->dropDownList([ 'Menunggu Pembayaran' => 'Menunggu Pembayaran', 'Sudah dibayar' => 'Sudah dibayar', 'Dibatalkan' => 'Dibatalkan', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
