<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use dosamigos\tinymce\TinyMce;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Galeri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galeri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'galeri_nama')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'galeri_keterangan')->widget(CKEditor::className(),[
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserUploadUrl' => 'site/url']
    ]);?>
    <?php // $form->field($model, 'galeri_keterangan')->widget(TinyMce::className(), [
    //     'options' => ['rows' => 6],
    //     'clientOptions' => [
    //         'plugins' => [
    //             "advlist autolink lists link charmap print preview anchor",
    //             "searchreplace visualblocks code fullscreen",
    //             "insertdatetime media table contextmenu paste"
    //         ],
    //         'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    //     ]
    // ]);?>

    <?= $form->field($model, 'created_by')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'created_date')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'updated_by')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'updated_date')->hiddenInput(['maxlength' => true])->label(false) ?>
    
    <?= $form->field($model, 'status')->dropdownList([
            'Aktif' => 'Aktif', 
            'Tidak Aktif' => 'Tidak Aktif',
            ['prompt' => 'Pilih Status'],
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
