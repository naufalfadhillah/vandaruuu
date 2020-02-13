<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

$this->title = "Change Password";
$this->params['breadcrumbs'][] = $this->title;

// $model = User::findOne(Yii::$app->user->identity->id);
// $key = $model->auth_key;
// $model->password_hash = Yii::$app->getSecurity()->decryptByPassword($model->password_hash, $key);
?>
<div class="user-form row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-7">
        <?php // $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>
        <?= $form->field($model, 'old_password')->passwordInput() ?>
        <?= $form->field($model, 'new_password')->passwordInput() ?>
        <?= $form->field($model, 'confirm_password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-save"></i> Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>