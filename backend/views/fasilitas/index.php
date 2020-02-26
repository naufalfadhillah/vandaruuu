<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FasilitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fasilitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Fasilitas', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('Create Fasilitas', ['value'=> Url::to(['create']), 'class' => 'showModalButton btn btn-success']) ?>
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

            // 'fasilitas_id',
            'fasilitas_nama',

            ['class' => 'yii\grid\ActionColumn', 'header' => 'Aksi','template' => '{reset} {delete}',
                'buttons' =>[
                    
                    'reset'=> function ($url, $model, $key){
                        
                        return Html::button('<i class ="glyphicon glyphicon-pencil"></i>', ['value'=> Url::to(['fasilitas/update', 'id'=>$model->fasilitas_id]), 'class' => 'showModalButton btn btn-primary btn-xs']);
                    },
                    // 'view'=>function($url, $model, $key){
                    //     return Html::button('<i class ="glyphicon glyphicon-eye-open"></i>', ['value'=> Url::to(['fasilitas/view', 'id'=>$model->fasilitas_id]), 'class' => 'showModalButton btn btn-success btn-xs']);
                    // },
                    'delete'=> function ($url, $model, $key){

                        return Html::a('<span class = "glyphicon glyphicon-trash"></span>', ['fasilitas/delete', 'id'=>$model->fasilitas_id],['class' => 'btn btn-danger btn-xs',
                            'data' => [
                                'confirm' => 'Apa Anda Ingin Menghapus Item Ini?',
                                'method' => 'post',
                            ],]);
                    },

                ],
			],
        ],
    ]); ?>
</div>
