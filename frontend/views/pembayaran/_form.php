<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $booking common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'action' => Url::to(['/pembayaran']),
    ]); ?>
    <div class="form-group row col-lg-8">
        <label class="col-sm-4">Masukkan Kode Pemesanan</label>
        <div class="col-sm-8">
    <?= $form->field($booking, 'booking_id')->textInput()->label(false) ?>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default"><?=yii::t('app','Submit');?> <i class="glyphicon glyphicon-ok"></i></button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
