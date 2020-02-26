<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */

$this->title = 'Update Setting Profile';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_setting, 'url' => ['view', 'id' => $model->id_setting]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-update">

    <!-- <h1><?php // Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
