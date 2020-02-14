<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\FotoGaleri */

$this->title = 'Update Foto Galeri: ' . $model->nama_foto;
$this->params['breadcrumbs'][] = ['label' => 'Galeri', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $galeri->galeri_nama, 'url' => Url::to(['galeri/view', 'id' => $galeri->galeri_id])];
$this->params['breadcrumbs'][] = ['label' => $model->nama_foto, 'url' => ['view', 'id' => $model->id, 'galeri'=> $galeri->galeri_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="foto-galeri-update">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
