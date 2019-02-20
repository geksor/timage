<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500" rel="stylesheet">
    <link  rel= "apple-touch-icon"  sizes= "57x57"  href= "/apple-icon-57x57.png" >
    <link  rel= "apple-touch-icon"  sizes= "60x60"  href= "/apple-icon-60x60.png" >
    <link  rel= "apple-touch-icon"  sizes= "72x72"  href= "/apple-icon-72x72.png" >
    <link  rel= "apple-touch-icon"  sizes= "76x76"  href= "/apple-icon-76x76.png" >
    <link  rel= "apple-touch-icon"  sizes= "114x114"  href= "/apple-icon-114x114.png" >
    <link  rel= "apple-touch-icon"  sizes= "120x120"  href= "/apple-icon-120x120.png" >
    <link  rel= "apple-touch-icon"  sizes= "144x144"  href= "/apple-icon-144x144.png" >
    <link  rel= "apple-touch-icon"  sizes= "152x152"  href= "/apple-icon-152x152.png" >
    <link  rel= "apple-touch-icon"  sizes= "180x180"  href= "/apple-icon-180x180.png" >
    <link  rel= "icon"  type= "image/png"  sizes= "192x192"   href= "/android-icon-192x192.png" >
    <link  rel= "icon"  type= "image/png"  sizes= "32x32"  href= "/favicon-32x32.png" >
    <link  rel= "icon"  type= "image/png"  sizes= "96x96"  href= "/favicon-96x96.png" >
    <link  rel= "icon"  type= "image/png"  sizes= "16x16"  href= "/favicon-16x16.png" >
    <link  rel= "manifest"  href= "/manifest.json" >
    <meta  name= "msapplication-TileColor"  content= "#ffffff" >
    <meta  name= "msapplication-TileImage"  content= "/ms-icon-144x144.png" >
    <meta  name= "theme-color"  content= "#ffffff">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - OOO фирма "Тимедж+"</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= \frontend\widgets\HeaderWidget::widget() ?>

<main style="flex: 1">

    <?= $content ?>

</main>

<?= \frontend\widgets\FooterWidget::widget() ?>

<?= \frontend\widgets\ModalSaleWidget::widget() ?>

<?= \frontend\widgets\ModalConsultWidget::widget() ?>

<? if (Yii::$app->session->hasFlash('popUp')) {?>

<div class="modal fade" id="" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title main__about-popup-info-text"> <?= Yii::$app->session->getFlash('popUp') ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Ок</span>
                </button>
            </div>

<?}?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
