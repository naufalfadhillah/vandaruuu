<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pembayaran_id_booking')->textInput() ?>

    <?= $form->field($model, 'pembayaran_jumlah')->textInput() ?>

    <?= $form->field($model, 'pembayaran_tgl_bayar')->textInput() ?>

    <?= $form->field($model, 'pembayaran_resi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Belum' => 'Belum', 'Sudah' => 'Sudah', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
