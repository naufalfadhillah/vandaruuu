<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\FotoKamar */

$this->title = 'Update Foto Kamar: ' . $model->foto_kamar;
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tipe->tipe_nama, 'url' => Url::to(['tipe/view', 'id' => $tipe->tipe_id])];
$this->params['breadcrumbs'][] = ['label' => $model->foto_kamar, 'url' => ['view', 'id' => $model->foto_id_foto,'tipe'=> $tipe->tipe_id ]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="foto-kamar-update">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
