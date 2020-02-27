<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $booking common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'options' => ['enctype' => 'multipart/form-data'],
        'action' => Url::to(['/fix_bayar']),
    ]); ?>

    <div class="form-group row col-md-offset-4">
        <label class="col-sm-2 col-form-label">Kode Pemesanan</label>
        <div class="col-sm-6">
    <?= $form->field($pembayaran, 'pembayaran_id_booking')->textInput()->label(false) ?>
        </div>
    </div>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-6">
    <?= $form->field($pembayaran, 'pembayaran_jumlah')->textInput()->label(false) ?>
        </div>
    </div>
    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Upload Resi</label>
        <div class="col-sm-6">
            <?= $form->field($pembayaran, 'pembayaran_resi')->fileInput([
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showRemove'=> true,
                    'showUpload' => false,
                    'showCancel' => false,
                    'overwriteInitial' => false,
                    // 'initialPreviewConfig' => $json,
                    'previewFileType' => 'image',
                    // 'initialPreview' => $img,
                    // 'uploadAsync'=> true,
                    // 'maxFileSize' => 3*1024*1024,
                    // 'deleteUrl' => Url::to(['/file/delete-upload']),
                    'allowedExtensions' => ['jpg','png','jpeg'],
                    'maxFileCount'=> 10,
                ]
            ])->label(false)?>

        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default"><?=yii::t('app','Submit');?> <i class="glyphicon glyphicon-ok"></i></button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
