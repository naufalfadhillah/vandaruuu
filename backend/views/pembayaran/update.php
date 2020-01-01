<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pembayaran */

$this->title = 'Update Pembayaran: ' . $model->pembayaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pembayaran_id, 'url' => ['view', 'id' => $model->pembayaran_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
