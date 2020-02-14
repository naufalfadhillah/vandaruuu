<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */

$this->title = $model->kamar_nama;
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$kamar = $model;
?>
<div class="kamar-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kamar_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kamar_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kamar_id',
            'kamar_nama',
            'kamar_type',
            'kamar_harga',
            'kamar_deskripsi:ntext',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
            'kamar_status',
        ],
    ]) ?>

<div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin:: Widgets/Stats2-1 -->
                <div class="kt-widget1">
                    <div class="foto-kamar-index">
                        <p>
                        <?= Html::a('Tambah Foto', ['foto-kamar/create', 'kamar' => $kamar->kamar_id], ['class' => 'btn btn-primary']) ?>
                        </p>
                        <div class="table-responsive">
                            <?php Pjax::begin(); ?>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'layout' => '{items}{summary}{pager}',
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    [
                                        'attribute' => 'foto_kamar',
                                        'contentOptions' => ['style'=>'vertical-align: middle;'],
                                    ],
                                    // [
                                    //     'attribute' => 'Keterangan_foto',
                                    //     'format' => 'html',    
                                    //     'value' => function ($data) {
                                    //         if (strlen($data->Keterangan_foto) > 200) {
                                    //             return substr($data->Keterangan_foto, 0, 200) . '. . . . .';
                                    //         } else return $data->Keterangan_foto;
                                    //     },
                                    //     'contentOptions' => ['style'=>'vertical-align: middle;'],
                                    // ],
                                    [
                                        'attribute' => 'file',
                                        'format' => 'html',    
                                        'value' => function ($data) {
                                            return Html::img(Yii::getAlias('@web').'/'. $data['file'],
                                                ['width' => '100px']);
                                            // echo Yii::getAlias('@web').'/'. $data['file'];
                                        },
                                        'label' => 'Foto',
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
                                        'contentOptions' => ['class' => 'text-center', 'style'=>'vertical-align: middle;'], 
                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'buttons' => [
                                            'view' => function ($url, $model) use ($kamar) {
                                                $url = Url::to(['foto-kamar/view', 'id' => $model->foto_id_foto, 'kamar' => $kamar->kamar_id]);
                                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                    'title' => Yii::t('app', 'view'),'class' => 'btn btn-success btn-xs',
                                                ]);
                                            },
                                            'update' => function ($url, $model) use ($kamar) {
                                                $url = Url::to(['foto-kamar/update', 'id' => $model->foto_id_foto, 'kamar' => $kamar->kamar_id]);
                                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,[
                                                    'title' => Yii::t('app', 'update'),'class' => 'btn btn-primary btn-xs',
                                                ]);
                                            },
                                            'delete' => function ($url, $model) use ($kamar) {
                                                $url = Url::to(['foto-kamar/delete', 'id' => $model->foto_id_foto, 'kamar' => $kamar->kamar_id]);
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
                            <?php Pjax::end(); ?>
                        </div>

                    </div>

                </div>

                <!--end:: Widgets/Stats2-1 -->

    </div>

</div>
