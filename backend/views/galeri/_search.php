<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GaleriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galeri-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'galeri_id') ?>

    <?= $form->field($model, 'galeri_nama') ?>

    <?= $form->field($model, 'galeri_keterangan') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
