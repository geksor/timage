<?php

/* @var $this yii\web\View */
/* @var $propHomePage \common\models\HomePage */
/* @var $propContact \common\models\Contact */

$this->title = $propHomePage->title;
$this->registerMetaTag([
    'name' => 'title',
    'content' => $propHomePage->meta_title,
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $propHomePage->meta_description,
]);
?>

<div class="main__intro">
    <div class="container-fluid main__intro-banner">
        <div class="container main__intro-wrapper">
            <div class="row main__intro-mobile">
                <div class="col-lg-12">
                    <h2 class="main__intro-title"><?= $propHomePage->banner_firstTitle ?></h2>
                    <p class="main__intro-info"><?= $propHomePage->banner_secondTitle ?></p>

                <div class="intro__bottom-wrapper">
<!--                    <div class="col-lg-2">-->
                        <img src="frontend/web/public/img/best-choice-image.png" alt="Логотип">
<!--                    </div>-->
<!--                    <div class="col-lg-4">-->
                    <div class="text-wrapper">
                        <p class="text-wrapper-item-one">Гарантия лучшей цены</p>
                        <p class="text-wrapper-item-two">Нашли дешевле?</p>
                        <p class="text-wrapper-item-three">Снизим цену!</p>
                    </div>
<!--                    </div>-->
<!--                    <div class="col-lg-6"></div>-->
                </div>
                </div>
            </div>
            <div class="row main__intro-mobile">
                <div class="main__intro-cost-wrapper">
                    <a class="main__intro-cost" data-toggle="modal" data-target="#exampleModalConsult" href="#">Бесплатная
                        консультация</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main__product">
    <div class="container-fluid background-grey main__quality-block-wrapper">
        <div class="container main__product-wrapper">
            <h2><?= $propHomePage->FFB_title ?></h2>
            <div class="row">
                <div class="col-lg-7">
                    <div class="main__product-text-wrapper background-white">
                        <?= $propHomePage->FFB_text ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img class="main__product-stairs-image" src="<?= $propHomePage->getThumbImage('FFB_image') ?>" alt="Перила из нержавеющей стали"
                         style="width: 100%">
                </div>
            </div>
        </div>
    </div>
</div>

<?= \frontend\widgets\WeProjectWidget::widget() ?>

<div class="main__quality">
    <div class="container-fluid background-grey main__quality-block-wrapper">
        <div class="container">
            <h2 class="main__quality-title-text"><?= $propHomePage->FSB_title ?></h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-lg-12 main__quality-product-wrapper background-white">
                        <?= $propHomePage->FSB_text ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="main__quality-image-new" src="<?= $propHomePage->getThumbImage('FSB_image') ?>" alt="Качественная работа"
                         style="width: 100%">
                </div>
            </div>
        </div>
    </div>

    <?= \frontend\widgets\HomeProductWidget::widget() ?>

</div>

<?= \frontend\widgets\WeProductWidget::widget() ?>

<?= \frontend\widgets\WePartnerWidget::widget() ?>

<?= \frontend\widgets\StaticConsultWidget::widget() ?>

<div class="main__map">
    <?= $propContact->mapScript ?>
    
</div>
