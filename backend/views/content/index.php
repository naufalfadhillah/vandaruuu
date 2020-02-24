<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'content_id',
            // 'content_judul:ntext',
            // 'content_isi:ntext',
            // 'created_by',
            // 'created_date',
            //'updated_by',
            //'updated_date',
            //'status',
            //'file',
            [
                'attribute' => 'file',
                'label' => 'Foto Sampul',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/'. $data['file'],
                        ['width' => '100px']);
                },
            ],
            [
                'attribute' => 'content_judul',
                'contentOptions' => ['style'=>'vertical-align: middle;'],
            ],
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
                'buttons' => [
                    'view' => function ($url, $model){
                        $url = Url::to(['content/view', 'id' => $model->content_id]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),'class' => 'btn btn-success btn-xs',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        $url = Url::to(['content/update', 'id' => $model->content_id]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,[
                            'title' => Yii::t('app', 'update'),'class' => 'btn btn-primary btn-xs',
                        ]);
                    },
                    'delete' => function ($url, $model){
                        $url = Url::to(['content/delete', 'id' => $model->content_id]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'delete'),'class' => 'btn btn-warning btn-xs',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                        ]);
                    }
                    ],
            ],
        ],
    ]); ?>
</div>
