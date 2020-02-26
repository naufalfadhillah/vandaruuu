<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\SettingSearch;
use common\models\Setting;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= $this->render('header') ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <div class="">



        <?= $content ?>

    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?php // Html::encode(Yii::$app->name) ?> <?php // date('Y') ?></p>

        <p class="pull-right"><?php // Yii::powered() ?></p>
    </div>
</footer> -->

<?php $this->endBody() ?>

<?= $this->render('footer') ?>
<?php $this->endPage() ?>
