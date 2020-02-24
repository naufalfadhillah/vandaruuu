<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kamar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kamar-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kamar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'kamar_id',
            'kamar_nama',
            'kamar_type',
            'kamar_harga',
            // 'kamar_deskripsi:ntext',
            //'kamar_foto:ntext',
            //'kamar_status',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{view} &nbsp {update} &nbsp {delete}',
            'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('<i class ="glyphicon glyphicon-eye-open"></i>',['view', 'id'=>$model->kamar_id], [
                            'class' => 'btn btn-success btn-xs'
                        ]);
                    },
                    'update' => function($url, $model, $key) {
                        return Html::a('<i class ="glyphicon glyphicon-pencil"></i> ', ['update', 'id'=>$model->kamar_id], [
                            'class' => 'btn btn-primary btn-xs',
                            ]);
                    },
                    'delete' => function($url, $model, $key){
                        return Html::a('<i class = "glyphicon glyphicon-trash"></i>',['delete', 'id'=>$model->kamar_id], [
                            'class' => 'btn btn-warning btn-xs',
                        ]);
                    }
            ]
        ],
    ],
]); ?>
</div>
