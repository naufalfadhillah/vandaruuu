<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fasilitas */

$this->title = 'Update Fasilitas: ' . $model->fasilitas_id;
$this->params['breadcrumbs'][] = ['label' => 'Fasilitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fasilitas_id, 'url' => ['view', 'id' => $model->fasilitas_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fasilitas-update">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
