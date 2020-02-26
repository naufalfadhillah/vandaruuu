<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FotoGaleriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foto Galeri';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-galeri-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Foto Galeri', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_galeri',
            // 'nama_foto',
            // 'Keterangan_foto:ntext',
            // 'file',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'status',
            'nama_foto',
            [
                'attribute' => 'id_galeri',
                'value' => 'galeri.galeri_nama'
            ],
            [
                'attribute' => 'keterangan_foto',
                'format' => 'html',    
                'value' => function ($data) {
                    if (strlen($data->Keterangan_foto) > 200) {
                        return substr($data->Keterangan_foto, 0, 200) . '. . . . .';
                    } else return $data->Keterangan_foto;
                },
            ],
            [
                'attribute' => 'file',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/'. $data['file'],
                        ['width' => '100px']);
                },
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
                'contentOptions' => ['class' => 'text-center']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
