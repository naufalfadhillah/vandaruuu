<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_setting') ?>

    <?= $form->field($model, 'setting_nama') ?>

    <?= $form->field($model, 'setting_alamat') ?>

    <?= $form->field($model, 'setting_email') ?>

    <?= $form->field($model, 'setting_phone') ?>

    <?php // echo $form->field($model, 'setting_fax') ?>

    <?php // echo $form->field($model, 'setting_facebook') ?>

    <?php // echo $form->field($model, 'setting_instagram') ?>

    <?php // echo $form->field($model, 'setting_whatsapp') ?>

    <?php // echo $form->field($model, 'latitudeP') ?>

    <?php // echo $form->field($model, 'longitudeP') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
