<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <div class="col-lg-12">
            <?= $form->field($model, 'pelanggan_nama')->textInput(['class'=>'form-control'])->label('Nama',['class'=>'label-class']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <?= $form->field($model, 'pelanggan_nama')->textInput(['class'=>'form-control'])->label('Nama',['class'=>'label-class']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <?= $form->field($model, 'pelanggan_nama')->textInput(['class'=>'form-control'])->label('Nama',['class'=>'label-class']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <?= $form->field($model, 'pelanggan_nama')->textInput(['class'=>'form-control'])->label('Nama',['class'=>'label-class']) ?>
        </div>
    </div><div class="form-group">
        <div class="col-lg-12">
            <?= $form->field($model, 'pelanggan_nama')->textInput(['class'=>'form-control'])->label('Nama',['class'=>'label-class']) ?>
        </div>
    </div><div class="form-group">
        <div class="col-lg-12">
            <?= $form->field($model, 'pelanggan_nama')->textInput(['class'=>'form-control'])->label('Nama',['class'=>'label-class']) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <?= $form->field($model, 'pelanggan_nama')->textInput(['class'=>'form-control'])->label('Nama',['class'=>'label-class']) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
