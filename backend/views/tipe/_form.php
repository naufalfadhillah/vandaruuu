<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\money\MaskMoney;
use kartik\file\FileInput;
use common\models\Fasilitas;

/* @var $this yii\web\View */
/* @var $model common\models\Tipe */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="tipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipe_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipe_harga')->widget(MaskMoney::classname(), [
            'name' => 'amount_german',
            'value' => 0,
            'pluginOptions' => [
                'prefix' => 'Rp ',
                'thousands' => '.',
                'decimal' => ',',
                'precision' => 0
            ],
     ])?>

    <?php // $form->field($model, 'tipe_deskripsi')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'tipe_deskripsi')->widget(CKEditor::className(),[
        'preset' => 'full',
        'clientOptions' => [
        'filebrowserUploadUrl' => 'site/url']
    ]);?>

    <?php // $form->field($model, 'tipe_fasilitas')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'tipe_gambar')->textInput(['maxlength' => true]) ?>
    
    <!-- <?php // foreach ($fasilitas as $j ) : ?>
                    <div class="col-md-4">
                        <input type="checkbox" name="fasilitas[]" value="<?php // echo ' '.$j['fasilitas_id']; ?>" <?php // if(in_array($j['fasilitas_id'],$ccd)){echo "checked";}?> disabled>
                        <label for="fasilitas"><?php // echo $j['fasilitas_nama']; ?></label><br>
                    </div>
    <?php // endforeach; ?> -->


    <?php echo $form->field($model, 'tipe_fasilitas')->checkboxList(
			Fasilitas::getFasilitasList()
    ); ?>

    <?= $form->field($model, 'filesaver[]')->widget(FileInput::className(),[
        'options' => ['multiple'=>true, 'accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove'=> true,
            'showUpload' => false,
            'showCancel' => false,
            'overwriteInitial' => false,
            // 'initialPreviewConfig' => $json,
            'previewFileType' => 'image',
            // 'initialPreview' => $img,
            // 'uploadAsync'=> true,
            // 'maxFileSize' => 3*1024*1024,
            // 'deleteUrl' => Url::to(['/file/delete-upload']),
            'allowedExtensions' => ['jpg','png','jpeg'],
            'maxFileCount'=> 10,
        ]
     ])->label('Foto')?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
