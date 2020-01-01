<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelanggans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pelanggan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pelanggan_id',
            'pelanggan_nama',
            'pelanggan_jk',
            'pelanggan_alamat:ntext',
            'pelanggan_tgl_lahir',
            //'pelanggan_no_hp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
