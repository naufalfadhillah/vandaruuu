<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fasilitas */

$this->title = 'Create Fasilitas';
$this->params['breadcrumbs'][] = ['label' => 'Fasilitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
