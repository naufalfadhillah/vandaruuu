<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
        <?= Html::button('Create Kamar', ['value'=> Url::to(['create']), 'class' => 'showModalButton btn btn-success']) ?>
    </p>

    <?php
        yii\bootstrap\Modal::begin([
            
            'id' => 'modal',
            'size' => 'modal-lg',   
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
        ]);
        echo "<div id='modalContent'></div>";
        yii\bootstrap\Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'kamar_id',
            'kamar_nama',
            // 'kamar_tipe',
            [
                'attribute' => 'Tipe Kamar',
                'value' => function($model){
                    return \common\models\Tipe::findOne($model->kamar_tipe)['tipe_nama'];
                }
        ],
            // 'kamar_harga',
            // 'kamar_deskripsi:ntext',
            //'kamar_foto:ntext',
            'kamar_status',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{view} &nbsp {update} &nbsp {delete}',
            'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::button('<i class ="glyphicon glyphicon-eye-open"></i>',['value'=> Url::to(['kamar/view', 'id'=>$model->kamar_id]), 'class' => 'showModalButton btn btn-info btn-xs'
                        ]);
                    },
                    'update' => function($url, $model, $key) {
                        return Html::button('<i class ="glyphicon glyphicon-pencil"></i> ',['value'=> Url::to(['kamar/update', 'id'=>$model->kamar_id]), 'class' => 'showModalButton btn btn-primary btn-xs'
                            ]);
                    },
                    'delete' => function($url, $model, $key){
                        return Html::a('<span class = "glyphicon glyphicon-trash"></span>', ['kamar/delete', 'id'=>$model->kamar_id],['class' => 'btn btn-danger btn-xs',
                            'data' => [
                                'confirm' => 'Apa Anda Ingin Menghapus Item Ini?',
                                'method' => 'post',
                            ],]);
                    }
            ]
        ],
    ],
]); ?>
</div>
