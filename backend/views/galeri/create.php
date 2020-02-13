<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Galeri */

$this->title = 'Create Galeri';
$this->params['breadcrumbs'][] = ['label' => 'Galeri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
