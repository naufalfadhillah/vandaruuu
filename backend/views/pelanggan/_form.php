<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pelanggan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelanggan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pelanggan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelanggan_jk')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pelanggan_alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pelanggan_tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'pelanggan_no_hp')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
