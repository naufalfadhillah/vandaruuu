<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>


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
            'maxFileCount'=> 1,
        ]
     ])->label('Foto')?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
