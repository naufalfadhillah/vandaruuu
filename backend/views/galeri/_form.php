<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Galeri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galeri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'galeri_gambar')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'galeri_deskripsi')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
