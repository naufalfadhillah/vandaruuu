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

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_setting], ['class' => 'btn btn-primary']) ?>
        <?php // Html::a('Delete', ['delete', 'id' => $model->id_setting], [
            // 'class' => 'btn btn-danger',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
        //]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_setting',
            'setting_nama',
            'setting_alamat',
            'setting_email:email',
            'setting_phone',
            'setting_fax',
            'setting_facebook',
            'setting_instagram',
            'setting_whatsapp',
            'latitudeP:ntext',
            'longitudeP:ntext',
        ],
    ]) ?>

</div>
