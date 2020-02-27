<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Pelanggan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelanggan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Dari Tanggal</label>
        <div class="col-sm-6">
    <?= $form->field($model, 'dari')->widget(
        DatePicker::className(), [

        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->label(false);
    ?>
        </div>
    </div>

    <div class="form-group row col-lg-offset-4">
        <label class="col-sm-2 col-form-label">Sampai Tanggal</label>
        <div class="col-sm-6">
    <?= $form->field($model, 'sampai')->widget(
        DatePicker::className(), [

        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ])->label(false);
    ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Download Excel', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
