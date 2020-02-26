<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fasilitas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fasilitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fasilitas_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
