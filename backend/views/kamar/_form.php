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

    <?php // $form->field($model, 'kamar_tipe')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'kamar_tipe')->widget(\kartik\select2\Select2::className(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Tipe::find()->all(), 'tipe_id', 'tipe_nama'),
                'language' => 'en',
                'options' => [
                    'placeholder' => 'Pilih Tipe',
                    'onchange' => '$.post("index.php?r=tipe&id='.'"+$(this).val(), function(data) {
                $("select#tipeid").html(data);
                });'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

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
