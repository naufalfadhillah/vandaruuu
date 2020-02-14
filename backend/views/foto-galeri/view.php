<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\FotoGaleri */

$this->title = $model->nama_foto;
$this->params['breadcrumbs'][] = ['label' => 'Galeri', 'url' => ['galeri/index']];
$this->params['breadcrumbs'][] = ['label' => $galeri->galeri_nama, 'url' => Url::to(['galeri/view', 'id' => $galeri->galeri_id])];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="foto-galeri-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id,'galeri' => $galeri->galeri_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id,'galeri' => $galeri->galeri_id], [
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
            // 'id',
            // 'id_galeri',
            'nama_foto',
            'Keterangan_foto:html',
            [
                'attribute' => 'file',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/'. $data['file'],
                        ['width' => '100px']);
                },
            ],
            // 'file',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
            'status',
        ],
    ]) ?>

</div>
