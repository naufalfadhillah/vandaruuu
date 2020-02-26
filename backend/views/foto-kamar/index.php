<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FotoKamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foto Kamar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-kamar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Foto Kamar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'foto_id_foto',
            // 'foto_id_kamar',
            [
                'attribute' => 'foto_id_kamar',
                'value' => 'kamar.kamar_nama'
            ],
            'foto_kamar:ntext',
            // 'file:ntext',
            [
                'attribute' => 'file',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/'. $data['file'],
                        ['width' => '100px']);
                },
            ],
            'created_by',
            // 'created_date',
            //'updated_by',
            //'updated_date',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
