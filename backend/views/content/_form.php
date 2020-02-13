<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content_judul')->textInput(['maxlength' => true]) ?>
    <?php // $form->field($model, 'content_judul')->widget(CKEditor::className(),[
        // 'preset' => 'full',
        // 'options' => ['rows' => 2],
        // 'clientOptions' => [
        //     'filebrowserUploadUrl' => 'site/url']
        //     // 'kcfinder' => true,
        // ]) ?>

    <?php // $form->field($model, 'content_isi')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'content_isi')->widget(CKEditor::className(),[
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserUploadUrl' => 'site/url']
            // 'kcfinder' => true,
    ]) ?>

    <?= $form->field($model, 'created_by')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'created_date')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'updated_by')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'updated_date')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'status')->dropdownList([
            'Aktif' => 'Aktif', 
            'Tidak Aktif' => 'Tidak Aktif',
            ['prompt' => 'Pilih Status'],
    ]) ?>

    <?php if ($model->file == null) {
        echo $form->field($model, 'filesaver')->fileInput()->hint('Rekomendasi rasio foto sampul adalah 7:4.', ['class' => 'form-text text-muted'])->label('Foto Sampul');
    } else { ?>
        <?= Html::img(Yii::getAlias('@web').'/'.$model->file, ['width' => '200px', 'style' => ['margin-bottom' => '1rem']]); ?> <br>
        <?= $form->field($model, 'filesaver')->fileInput()->label('Ganti Foto')->hint('Rekomendasi rasio foto sampul adalah 7:4.', ['class' => 'form-text text-muted'])->label('Foto Sampul') ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
