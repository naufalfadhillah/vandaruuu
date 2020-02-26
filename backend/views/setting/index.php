<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use marekpetras\yii2ajaxboxwidget\Box;


/* @var $this yii\web\View */
/* @var $model common\models\Setting */

$this->title = 'Setting';
$this->params['breadcrumbs'][] = ['label' => 'Setting'];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <!-- <p>
        <?php // Html::a('Update', ['update', 'id' => $model->id_setting], ['class' => 'btn btn-primary']) ?>
        <?php // Html::a('Delete', ['delete', 'id' => $model->id_setting], [
            // 'class' => 'btn btn-danger',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
        //]) ?>
    </p> -->

    <?php // DetailView::widget([
    //     'model' => $model,
    //     'attributes' => [
    //         // 'id_setting',
    //         'setting_nama',
    //         'setting_alamat',
    //         'setting_email:email',
    //         'setting_phone',
    //         'setting_fax',
    //         'setting_facebook',
    //         'setting_instagram',
    //         'setting_whatsapp',
    //         'latitudeP:ntext',
    //         'longitudeP:ntext',
    //     ],
    // ]) ?>

    <div class="row">
        <div class="col-lg-12">
            <label></label>
            <div class="form-group">
                <?= Html::a('Update', ['update', 'id' => $model->id_setting], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group field-setting-setting_nama">
                <label class="control-label" for="setting-setting_nama">Nama Penginapan</label>
                <input type="text" id="setting-setting_nama" class="form-control" name="Setting[setting_nama]" value="<?= $model->setting_nama ?>" disabled="">
                <div class="help-block"></div>
            </div> 
            <div class="form-group field-setting-setting_alamat">
                <label class="control-label" for="setting-setting_alamat">Alamat Penginapan</label>
                <input type="text" id="setting-setting_alamat" class="form-control" name="Setting[setting_alamat]" value="<?= $model->setting_alamat ?>" disabled="">
                <div class="help-block"></div>
            </div>            
            <div class="form-group field-setting-setting_email">
                <label class="control-label" for="setting-setting_email">Email</label>
                <input type="text" id="setting-setting_email" class="form-control" name="Setting[setting_email]" value="<?= $model->setting_email ?>" disabled="">
                <div class="help-block"></div>
            </div>            
            <div class="form-group field-setting-setting_phone">
                <label class="control-label" for="setting-setting_phone">Phone</label>
                <input type="text" id="setting-setting_phone" class="form-control" name="Setting[setting_phone]" value="<?= $model->setting_phone ?>" disabled="">
                <div class="help-block"></div>
            </div>            
            <div class="form-group field-setting-setting_fax">
                <label class="control-label" for="setting-setting_fax">Fax</label>
                <input type="text" id="setting-setting_fax" class="form-control" name="Setting[setting_fax]" value="<?= $model->setting_fax ?>" disabled="">
                <div class="help-block"></div>
            </div>        
        </div>
        <div class="col-lg-6">
            <div class="form-group field-setting-setting_facebook">
                <label class="control-label" for="setting-setting_facebook">Facebook</label>
                <input type="text" id="setting-setting_facebook" class="form-control" name="Setting[setting_facebook]" value="<?= $model->setting_facebook ?>" disabled="">
                <div class="help-block"></div>
            </div>            
            <div class="form-group field-setting-setting_instagram">
                <label class="control-label" for="setting-setting_instagram">Instagram</label>
                <input type="text" id="setting-setting_instagram" class="form-control" name="Setting[setting_instagram]" value="<?= $model->setting_instagram ?>" disabled="">
                <div class="help-block"></div>
            </div>           
            <div class="form-group field-setting-setting_whatsapp">
                <label class="control-label" for="setting-setting_whatsapp">Whatsapp</label>
                <input type="text" id="setting-setting_whatsapp" class="form-control" name="Setting[setting_whatsapp]" value="<?= $model->setting_whatsapp ?>" disabled="">
                <div class="help-block"></div>
            </div>        
        </div>
            
    
    </div>
        
        <div class="col-lg-6">
            
        </div>

        
    </div>

</div>
