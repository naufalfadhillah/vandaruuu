<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kamar */

$this->title = 'Create Kamar';
$this->params['breadcrumbs'][] = ['label' => 'Kamar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kamar-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
