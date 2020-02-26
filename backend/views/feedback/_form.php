<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'feedback_id_booking')->textInput() ?>

    <?= $form->field($model, 'feedback_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'feedback_tanggal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
