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
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= \frontend\widgets\HeaderWidget::widget() ?>

<main style="flex: 1">

    <?= $content ?>

</main>

<?= \frontend\widgets\FooterWidget::widget() ?>

<div class="modal fade" id="exampleModalHeader" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title main__about-popup-info-text">Поможем сэкономить
                    до 10%<br>Узнай как</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="main__about-popup-info">Заполните обязательные поля (имя, телефон)</p>
                <input class="main__about-popup-name" type="text" placeholder="Ваше имя"><br>
                <input class="main__about-popup-number" type="number" placeholder="Номер телефона"><br>
                <div class="main__about-popup-agree-wrapper">
                    <p class="main__about-popup-agree-text">Нажимая кнопку отправить, я даю согласие на обработку
                        своей <span><a href="personal-information.html">персональной информациии.</a></span></p>
                </div>
                <button class="main__about-popup-info-send-button" type="submit">Отправить</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalConsult" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title main__about-popup-info-text">Бесплатная консультация</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="main__about-popup-info">Заполните обязательные поля (имя, телефон)</p>
                <input class="main__about-popup-name" type="text" placeholder="Ваше имя"><br>
                <input class="main__about-popup-number" type="number" placeholder="Номер телефона"><br>
                <div class="main__about-popup-agree-wrapper">
                    <p class="main__about-popup-agree-text">Нажимая кнопку отправить, я даю согласие на обработку
                        своей <span><a href="personal-information.html">персональной информациии.</a></span></p>
                </div>
                <button class="main__about-popup-info-send-button" type="submit">Отправить</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalOrder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title main__about-popup-info-text" id="exampleModalLongTitle">Заказать расчет</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="main__about-popup-info">Заполните обязательные поля (имя, телефон)</p>
                <input class="main__about-popup-name" type="text" placeholder="Ваше имя"><br>
                <input class="main__about-popup-number" type="number" placeholder="Номер телефона"><br>
                <div class="main__about-popup-agree-wrapper">
                    <p class="main__about-popup-agree-text">Нажимая кнопку отправить, я даю согласие на
                        обработку
                        своей <span><a href="personal-information.html">персональной информациии.</a></span></p>
                </div>
                <button class="main__about-popup-info-send-button" type="submit">Отправить</button>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
