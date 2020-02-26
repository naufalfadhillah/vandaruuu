<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = 'Update Content: ' . $model->content_judul;
$this->params['breadcrumbs'][] = ['label' => 'Content', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->content_judul, 'url' => ['view', 'id' => $model->content_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-update">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
