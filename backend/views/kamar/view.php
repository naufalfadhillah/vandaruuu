<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */

$this->title = $model->kamar_nama;
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$kamar = $model;
?>
<div class="kamar-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <p>
        <?php // Html::a('Update', ['update', 'id' => $model->kamar_id], ['class' => 'btn btn-primary']) ?>
        <?php // Html::a('Delete', ['delete', 'id' => $model->kamar_id], [
        //     'class' => 'btn btn-danger',
        //     'data' => [
        //         'confirm' => 'Are you sure you want to delete this item?',
        //         'method' => 'post',
        //     ],
        // ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'kamar_id',
            'kamar_nama',
            'kamar_tipe',
            // 'created_by',
            // 'created_date',
            // 'updated_by',
            // 'updated_date',
            'kamar_status',
        ],
    ]) ?>