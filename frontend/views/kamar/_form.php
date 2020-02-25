<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'action' => Url::to(['/pemesanan']),
    ]); ?>
    <?= $form->field($model, 'pelanggan_nama')->textInput() ?>
    <?= $form->field($model, 'pelanggan_alamat')->textarea() ?>
    <?= $form->field($model, 'pelanggan_jk')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pelanggan_tgl_lahir')->widget(
        DatePicker::className(), [

        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>
    <?= $form->field($model, 'pelanggan_no_hp')->textInput() ?>
    <?= $form->field($pemesanan, 'booking_durasi')->textInput() ?>
    <?= $form->field($pemesanan, 'booking_id_kamar')->textInput() ?>
    <?= $form->field($pemesanan, 'booking_tgl_check_in')->widget(
        DatePicker::className(), [

        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>
    <div class="form-group">
        <button type="submit" class="btn btn-default"><?=yii::t('app','Submit');?> <i class="glyphicon glyphicon-ok"></i></button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
