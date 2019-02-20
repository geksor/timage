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
        'public/css/bootstrap.min.css',
        'public/slick/slick.css',
        'public/slick/slick-theme.css',
        'public/slick/slick-theme.css',
        'public/css/reset.css',
        'public/css/style.css',
        'public/css/jquery.fancybox.min.css',
    ];
    public $js = [
        'public/js/sticky-header.js',
        'public/slick/slick.min.js',
        'public/js/slider-slick.js',
        'public/js/popper.min.js',
        'public/js/bootstrap.min.js',
        'public/js/jquery.fancybox.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
