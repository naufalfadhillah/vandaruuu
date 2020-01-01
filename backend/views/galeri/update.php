<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Galeri */

$this->title = 'Update Galeri: ' . $model->galeri_id;
$this->params['breadcrumbs'][] = ['label' => 'Galeris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->galeri_id, 'url' => ['view', 'id' => $model->galeri_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="galeri-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
