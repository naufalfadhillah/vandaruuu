<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\money\MaskMoney;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kamar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kamar_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kamar_type')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'kamar_harga')->textInput() ?>
    <?= $form->field($model, 'kamar_harga')->widget(MaskMoney::classname(), [
            'name' => 'amount_german',
            'value' => 0,
            'pluginOptions' => [
                'prefix' => 'Rp ',
                'thousands' => '.',
                'decimal' => ',',
                'precision' => 0
            ],
     ])?>

    <?php // $form->field($model, 'kamar_deskripsi')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'kamar_deskripsi')->widget(CKEditor::className(),[
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserUploadUrl' => 'site/url']
    ]);?>

    <?php // $form->field($model, 'filesaver[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('Foto') ?>
    <?= $form->field($model, 'filesaver[]')->widget(FileInput::className(),[
        'options' => ['multiple'=>true, 'accept' => 'image/*'],
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
     ])->label('Foto')?>

    <?= $form->field($model, 'created_by')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'created_date')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'updated_by')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'updated_date')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'kamar_status')->dropDownList([ 'Tersedia' => 'Tersedia', 'Dibooking' => 'Dibooking', 'Tidak Tersedia' => 'Tidak Tersedia', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
