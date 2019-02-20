<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            .workarea-cropbox{width: 100%!important;}
            .bg-cropbox{width: 100%!important;}
            .image-form .workarea-cropbox{height: 600px!important;}
            .image-form .bg-cropbox{height: 600px!important;}
            .newRow{
                background-color: #ffdcdc!important;
            }
            .noReadRow{
                background-color: #fffdce!important;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
