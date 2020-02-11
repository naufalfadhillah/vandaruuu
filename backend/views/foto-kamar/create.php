<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FotoKamar */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-kamar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpload', [
        'model' => $model,
    ]) ?>

</div>
