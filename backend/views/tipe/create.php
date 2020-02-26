<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tipe */

$this->title = 'Create Tipe';
$this->params['breadcrumbs'][] = ['label' => 'Tipe', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
