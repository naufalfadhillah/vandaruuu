<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Booking', ['create'], ['class' => 'btn btn-success']) ?>
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

            'booking_id',
            // 'booking_id_pelanggan',
            // 'booking_id_kamar',
            // 'booking_durasi',
            [
                'attribute' => 'booking_durasi',
                'format' => 'html',    
                'value' => function ($data) {
                    return $data->booking_durasi." Hari";
                },                
            ],
            // 'booking_tgl_pesan',
            [
                'attribute' => 'booking_tgl_pesan',
                'format' => 'html',    
                'value' => function ($data) {
                    return date('d F Y', strtotime($data->booking_tgl_pesan));
                },                
            ],
            //'booking_tgl_check_in',
            'booking_status',
            //'booking_harga',

            // ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            // 'template' => '{view} &nbsp {update} &nbsp {delete}',
            'template' => '{view} &nbsp {update}',
            'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('<i class ="glyphicon glyphicon-eye-open"></i>',['view', 'id'=>$model->booking_id], [
                            'class' => 'btn btn-info btn-xs'
                        ]);
                        
                    },
                    'update' => function($url, $model, $key) {
                        // return Html::a('<i class ="glyphicon glyphicon-upload"></i> Upload Bukti Pembayaran ', ['upload', 'id'=>$model->booking_id], [
                        //     'class' => 'btn btn-primary btn-xs',
                        //     ]);
                        return Html::button('<i class ="glyphicon glyphicon-upload"></i> Upload Bukti Pembayaran ',
                         ['value'=> Url::to(['booking/update', 'id'=>$model->booking_id]), 'class' => 'showModalButton btn btn-primary btn-xs']);
                    }
                    // 'delete' => function($url, $model, $key){
                    //     return Html::a('<i class = "glyphicon glyphicon-trash"></i>',['delete', 'id'=>$model->booking_id], [
                    //         'class' => 'btn btn-danger btn-xs',
                    //     ]);
                    // }
            ]
            ]
        ],
    ]); ?>
</div>
