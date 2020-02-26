<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tipe */

$this->title = 'Update Tipe: ' . $model->tipe_nama;
$this->params['breadcrumbs'][] = ['label' => 'Tipe', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipe_nama, 'url' => ['view', 'id' => $model->tipe_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipe-update">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
