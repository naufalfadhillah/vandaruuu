<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Pesan Kamar";
?>
<!DOCTYPE html>
<html lang="zxx">
<div class="banner banner-2">
    <header class="main-header main-header-2 main-header-3" style="background-color: #0f0f0f">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header">

                    <a href="index.html" class="logo">
                        <img src="img/logos/white-logo.png" alt="logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <?= Html::a('Home ', ['/kamar'])?>
                        </li>
                        <li class="dropdown active">
                            <?= Html::a('Kamar ', ['/kamar'])?>
                        </li>
                        <li class="dropdown active">
                            <?= Html::a('Pemesanan ', ['/kamar'])?>
                        </li>
                        <li class="dropdown active">
                            <?= Html::a('Pembayaran ', ['/kamar'])?>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
                        <li>
                            <a class="btn-navbar btn btn-sm btn-white-sm-outline btn-round" href="login.html">Create
                                Account</a>
                        </li>
                    </ul>
                </div>

                <!-- /.navbar-collapse --><!-- /.container -->
            </nav>


        </div>
    </header>

</div>
<!-- Hotel alpha start -->
<div class="hotel-alpha content-area-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm::begin([
                    //'layout' => 'horizontal',\

                    'action' => ['index'],
                    'method' => 'get',
                    'class' => 'form-horizontal'
                ])
                ?>
                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Hotel alpha end -->

<!-- Hotel section start -->
<div class="content-area hotel-section chevron-icon">
    <div class="overlay">
        <div class="container">
            <!-- Main title -->

        </div>
    </div>
</div>
<!-- Hotel section end -->

<!-- Our facilties section start -->

<!-- News popular testimonials end -->

<!-- Gallery secion start -->

<!-- Gallery secion end -->

<!-- Blog section start -->

<!-- Blog section end -->


<!-- Copy end right-->

<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-submenu.js"></script>
<script src="js/jquery.mb.YTPlayer.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.scrollUp.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.filterizr.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->

</body>
</html>