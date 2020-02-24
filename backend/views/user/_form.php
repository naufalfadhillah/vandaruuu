<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'Input First Name']) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Input Last Name']) ?>
    <?= $form->field($model, 'gender')->dropDownList(
            ['M' => 'Male', 'F' => 'Female'],
            ['prompt' => 'Choose Gender..']
        ) ?>
    <?= $form->field($model, 'hp')->textInput(['maxlength' => true, 'placeholder' => 'Input Phone Number']) ?>
    <?= $form->field($model, 'email')->textInput(['type' => 'email','maxlength' => true,'placeholder'=>'Input email ex:user@example.com']) ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Input Username']) ?>
    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true, 'placeholder' => 'Input Password']) ?>
    <?= $form->field($model, 'role')->dropDownList(
            ['1' => 'Super Admin', '2' => 'Admin'],
            ['prompt' => 'Choose Role..']
        ) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
