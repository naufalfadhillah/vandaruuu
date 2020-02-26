<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\FotoKamar */

$this->title = $model->foto_kamar;
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['kamar/index']];
$this->params['breadcrumbs'][] = ['label' => $tipe->tipe_nama, 'url' => Url::to(['tipe/view', 'id' => $tipe->tipe_id])];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="foto-kamar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->foto_id_foto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->foto_id_foto], [
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
            'foto_id_foto',
            'foto_id_tipe',
            'foto_kamar:ntext',
            // 'file:ntext',
            [
                'attribute' => 'file',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/'. $data['file'],
                        ['width' => '100px']);
                },
            ],
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
            'status',
        ],
    ]) ?>

</div>
