<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tipe_id') ?>

    <?= $form->field($model, 'tipe_nama') ?>

    <?= $form->field($model, 'tipe_harga') ?>

    <?= $form->field($model, 'tipe_deskripsi') ?>

    <?= $form->field($model, 'tipe_fasilitas') ?>

    <?php // echo $form->field($model, 'tipe_gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
