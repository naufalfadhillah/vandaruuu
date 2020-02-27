<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'pembayaran_id',
            'pembayaran_id_booking',
            'pembayaran_jumlah',
            // 'pembayaran_tgl_bayar',
            [
                'attribute' => 'pembayaran_tgl_bayar',
                'format' => 'html',    
                'value' => function ($data) {
                    return date('d F Y', strtotime($data->pembayaran_tgl_bayar));
                },                
            ],
            // 'pembayaran_resi:ntext',
            //'status',

            // ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{view} &nbsp {update} &nbsp {delete}',
            // 'template' => '{view} &nbsp {update}',
            'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('<i class ="glyphicon glyphicon-eye-open"></i>',['view', 'id'=>$model->pembayaran_id], [
                            'class' => 'btn btn-info btn-xs'
                        ]);
                        
                    },
                    'update' => function($url, $model, $key) {
                        return Html::a('<i class ="glyphicon glyphicon-ok"></i> Approve ', ['approve', 'id'=>$model->pembayaran_id], [
                            'class' => 'btn btn-success btn-xs',
                            ]);
                        // return Html::button('<i class ="glyphicon glyphicon-upload"></i> Upload Bukti Pembayaran ',
                        //  ['value'=> Url::to(['booking/update', 'id'=>$model->booking_id]), 'class' => 'showModalButton btn btn-primary btn-xs']);
                    },
                    'delete' => function($url, $model, $key){
                        return Html::a('<i class = "glyphicon glyphicon-remove"></i> Decline',['decline', 'id'=>$model->pembayaran_id], [
                            'class' => 'btn btn-danger btn-xs',
                        ]);
                    }
                ]
            ]
        ],
    ]); ?>
</div>
