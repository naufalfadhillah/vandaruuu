<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kamars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kamar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kamar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kamar_id',
            'kamar_nama',
            'kamar_type',
            'kamar_harga',
            'kamar_deskripsi:ntext',
            //'kamar_foto:ntext',
            //'kamar_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
