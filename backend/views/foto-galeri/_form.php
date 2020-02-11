<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use common\models\Galeri;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\FotoGaleri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foto-galeri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'id_galeri')->textInput() ?>
    <?= $form->field($model, 'id_galeri')->dropdownList(
        ArrayHelper::map(Galeri::find()->all(), 'galeri_id', 'galeri_nama'),
        ['prompt' => 'Pilih Galeri']
    )->label('Nama Galeri')?>

    <?= $form->field($model, 'nama_foto')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'Keterangan_foto')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'Keterangan_foto')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'custom',
            // 'kcfinder' => true,
        ]) ?>

    <?php // $form->field($model, 'filesaver2')->fileInput()->label('File') ?>
    <?= $form->field($model, 'filesaver2')->widget(FileInput::className(),[
        'options' => ['multiple'=>false, 'accept' => 'image/*'],
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
            // 'maxFileCount'=> 10,
        ]
     ])->label('Foto')?>


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
