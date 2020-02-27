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

    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-6">
            <?= $form->field($model, 'pelanggan_nama')->textInput(['placeholder' => "Nama"])->label(false)?>
        </div>
    </div>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-6">
    <?= $form->field($model, 'pelanggan_alamat')->textarea(['placeholder' => "Alamat"])->label(false) ?>
        </div>
    </div>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-6">
    <?= $form->field($model, 'pelanggan_jk')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => ''])->label(false) ?>
        </div>
    </div>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-6">
    <?= $form->field($model, 'pelanggan_tgl_lahir')->widget(
        DatePicker::className(), [

        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->label(false);
    ?>
        </div>
    </div>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Nomor Hp</label>
        <div class="col-sm-6">
    <?= $form->field($model, 'pelanggan_no_hp')->textInput(['placeholder' => "Nomor HP"])->label(false) ?>
        </div>
    </div>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Durasi/Hari</label>
        <div class="col-sm-6">
            <?= $form->field($pemesanan, 'booking_durasi')->textInput(['placeholder' => "Durasi"])->label(false) ?>
        </div>
    </div>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Pilih Kamar</label>
        <div class="col-sm-6">
    <?= $form->field($pemesanan, 'booking_id_kamar')->checkboxList(\common\models\Software::getKamarList())->label(false);
    ?>
        </div>
    </div>
    <br>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Tanggal Checkin</label>
        <div class="col-sm-6">
    <?= $form->field($pemesanan, 'booking_tgl_check_in')->widget(
        DatePicker::className(), [

        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->label(false);?>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default"><?=yii::t('app','Submit');?> <i class="glyphicon glyphicon-ok"></i></button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
