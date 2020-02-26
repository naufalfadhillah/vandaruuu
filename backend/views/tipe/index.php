<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipe';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'tipe_id',
            // 'tipe_gambar',
            [
                'attribute' => 'tipe_gambar',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/'. $data['tipe_gambar'],
                    ['width' => '100px']);
                    // echo Yii::getAlias('@web').'/'. $data['file'];
                },
                'label' => 'Foto',
                'contentOptions' => ['style'=>'vertical-align: middle;'],
            ],
            'tipe_nama',
            // 'tipe_harga',
            [
                'attribute' => 'tipe_harga',
                'format' => 'html',    
                'value' => function ($data) {
                    return "Rp. ".number_format($data->tipe_harga);
                },                
            ],
            // 'tipe_deskripsi:ntext',
            ['attribute' => 'tipe_deskripsi',
                'format' => 'html',    
                'value' => function ($data) {
                    return $data->tipe_deskripsi;
                },
            ],
            // 'tipe_fasilitas:ntext',


            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{view} &nbsp {update} &nbsp {delete}',
            'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('<i class ="glyphicon glyphicon-eye-open"></i>',['view', 'id'=>$model->tipe_id], [
                            'class' => 'btn btn-info btn-xs'
                        ]);
                    },
                    'update' => function($url, $model, $key) {
                        return Html::a('<i class ="glyphicon glyphicon-pencil"></i> ', ['update', 'id'=>$model->tipe_id], [
                            'class' => 'btn btn-primary btn-xs',
                            ]);
                    },
                    'delete' => function($url, $model, $key){
                        return Html::a('<i class = "glyphicon glyphicon-trash"></i>',['delete', 'id'=>$model->tipe_id], [
                            'class' => 'btn btn-danger btn-xs',
                        ]);
                    }
            ]
        ],
        ],
    ]); ?>
</div>
