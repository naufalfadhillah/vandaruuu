<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Kamar;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\FotoKamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foto-kamar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'foto_id_kamar')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'foto_kamar')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'file')->textarea(['rows' => 6]) ?>
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
