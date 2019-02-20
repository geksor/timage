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

$images = $model->getBehavior('galleryBehavior')->getImages();

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
                    <a class="main__catalog-consult-button" data-toggle="modal" data-target="#exampleModalOrder"
                       href="#">Бесплатная консультация</a>
                </div>
            </div>
        </div>
        <? if ($images) {?>
            <h3 class="main__catalog-title-text">Примеры выполненных работ</h3>
            <div class="row">
                <? foreach ($images as $image) {?>
                    <div class="col-lg-3 col-md-6 col-sm-12 main__catalog-wrapper">
                        <a href="<?= $image->getUrl('original') ?>" data-fancybox="section_gallery">
                            <img src="<?= $image->getUrl('preview') ?>" alt="<?= $image->name ?>" style="width: 100%">
                        </a>
                    </div>
                <?}?>
            </div>
        <?}?>
    </div>
</div>

<?= \frontend\widgets\ModalSectionWidget::widget([
    'sectionName' => $model->title,
]) ?>