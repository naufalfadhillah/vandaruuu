<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galeri';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Galeri-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Galeri', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'galeri_id',
            [
                'attribute' => 'galeri_nama',
                'contentOptions' => ['style'=>'vertical-align: middle;'],
            ],
            [
                'attribute' => 'galeri_keterangan',
                'format' => 'html',    
                            'value' => function ($data) {
                                if (strlen($data->galeri_keterangan) > 200) {
                                    return substr($data->galeri_keterangan, 0, 200) . '. . . . .';
                                } else return $data->galeri_keterangan;
                            },
                            'contentOptions' => ['style'=>'vertical-align: middle;'],

            ],
            // 'created_by',
            // 'created_date',
            //'updated_by',
            //'updated_date',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($data) {
                    if ($data->status == 'Aktif') {
                        $content = Html::tag('p', 'Aktif', ['class' => 'kt-badge kt-badge--inline kt-badge--success']);
                    } else {
                        $content = Html::tag('p', 'Tidak Aktif', ['class' => 'kt-badge kt-badge--inline kt-badge--danger']);
                    }
                    return Html::tag('span', $content);
                },
                'contentOptions' => ['class' => 'text-center','style'=>'vertical-align: middle;']
            ],

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{view} &nbsp {update} &nbsp {delete}',
            'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('<i class ="glyphicon glyphicon-eye-open"></i>',['view', 'id'=>$model->galeri_id], [
                            'class' => 'btn btn-success btn-xs'
                        ]);
                    },
                    'update' => function($url, $model, $key) {
                        return Html::a('<i class ="glyphicon glyphicon-pencil"></i> ', ['update', 'id'=>$model->galeri_id], [
                            'class' => 'btn btn-primary btn-xs',
                            ]);
                    },
                    'delete' => function($url, $model, $key){
                        return Html::a('<i class = "glyphicon glyphicon-trash"></i>',['delete', 'id'=>$model->galeri_id], [
                            'class' => 'btn btn-warning btn-xs',
                        ]);
                    }
                ],
            ]
        ],
    ]); ?>
</div>
