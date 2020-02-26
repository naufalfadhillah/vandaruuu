<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'setting_nama')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_alamat')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_email')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_phone')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_fax')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_facebook')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_instagram')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'setting_whatsapp')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'latitudeP')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'longitudeP')->textarea(['rows' => 6]) ?>

    <!-- <div class="form-group"> -->
        <?php // Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <!-- </div> -->

    <?php // ActiveForm::end(); ?>

    <div class="row">
        <div class="col-lg-12">
            <label></label>
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'setting_nama')->textInput(['maxlength' => true]) ?> 
            <?= $form->field($model, 'setting_alamat')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_fax')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-lg-6">
            <?= $form->field($model, 'setting_facebook')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_instagram')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'setting_whatsapp')->textInput(['maxlength' => true]) ?>
        </div>

        
    </div>

    <!-- <div class="form-group"> -->
        <?php //Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <!-- </div> -->

    <?php ActiveForm::end(); ?>

</div>
