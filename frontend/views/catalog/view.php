<?php

/* @var $this \yii\web\View */
/* @var $model \common\models\CatalogSections */

$this->title = $model->title;
$this->registerMetaTag([
    'name' => 'title',
    'content' => $model->meta_title,
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->meta_description,
]);

?>

<div class="main__catalog">
    <div class="container">
        <h2 class="main__catalog-title-text"><?= $model->title ?></h2>
        <div class="row">
            <div class="col-lg-4 main__catalog-image-wrapper">
                <img src="<?= $model->getThumbImage('main_image') ?>" alt="<?= $model->title ?>" style="width: 100%">
            </div>
            <div class="col-lg-8 main-catalog-info">
                <p>от <?= Yii::$app->formatter->asInteger($model->price) ?> руб.</p>
                <p><?= $model->desc ?></p>
                <div class="main__catalog-consult-button-wrapper">
                    <a class="main__catalog-consult-button" data-toggle="modal" data-target="#exampleModalConsult"
                       href="#">Бесплатная консультация</a>
                </div>
            </div>
        </div>
        <h3 class="main__catalog-title-text">Примеры выполненных работ</h3>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper">
                <img src="img/catalog-image-2.jpg" alt="Изображение работ" style="width: 100%">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper">
                <img src="img/catalog-image-2.jpg" alt="Изображение работ" style="width: 100%">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper">
                <img src="img/catalog-image-2.jpg" alt="Изображение работ" style="width: 100%">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper">
                <img src="img/catalog-image-2.jpg" alt="Изображение работ" style="width: 100%">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper">
                <img src="img/catalog-image-2.jpg" alt="Изображение работ" style="width: 100%">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper">
                <img src="img/catalog-image-2.jpg" alt="Изображение работ" style="width: 100%">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper">
                <img src="img/catalog-image-2.jpg" alt="Изображение работ" style="width: 100%">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper main__catalog-wrapper-bottom">
                <img src="img/catalog-image-2.jpg" alt="Изображение работ" style="width: 100%">
            </div>
        </div>
    </div>
</div>
