<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pembayaran */

$this->title = 'Create pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
