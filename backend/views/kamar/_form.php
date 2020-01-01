<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kamar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kamar_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kamar_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kamar_harga')->textInput() ?>

    <?= $form->field($model, 'kamar_deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kamar_foto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kamar_status')->dropDownList([ 'Tersedia' => 'Tersedia', 'Dibooking' => 'Dibooking', 'Tidak Tersedia' => 'Tidak Tersedia', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
