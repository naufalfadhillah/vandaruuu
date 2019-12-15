<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/animate.min.css',
        'css/bootstrap-submenu.css',
        'css/bootstrap-select.min.css',
        'fonts/font-awesome/css/font-awesome.min.css',
        'fonts/flaticon/font/flaticon.css',
        'fonts/linearicons/style.css',
        'css/jquery.mCustomScrollbar.css',
        'css/bootstrap-datepicker.min.css',
        'css/style.css',
        'css/skins/blue-light-2.css',
        'css/ie10-viewport-bug-workaround.css',
    ];
    public $js = [
        'js/ie-emulation-modes-warning.js',
        'js/app.js',
        'js/ie10-viewport-bug-workaround.js',
        'js/bootstrap-datepicker.min.js',
        'js/jquery.filterizr.js',
        'js/jquery.mCustomScrollbar.concat.min.js',
        'js/jquery.scrollUp.js',
        'js/jquery.easing.1.3.js',
        'js/bootstrap-select.min.js',
        'js/wow.min.js',
        'js/jquery.mb.YTPlayer.js',
        'js/bootstrap-submenu.js',
        'js/bootstrap.min.js',
        'js/jquery-2.2.0.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
