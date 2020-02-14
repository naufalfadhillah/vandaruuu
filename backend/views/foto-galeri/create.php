<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FotoGaleri */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Galeri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-galeri-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpload', [
        'model' => $model,
    ]) ?>

</div>
