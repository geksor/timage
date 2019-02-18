<?
/* @var $firstProduct \common\models\CatalogSections */
/* @var $secondProduct \common\models\CatalogSections */
/* @var $lastProduct \common\models\CatalogSections */
?>
<? if ($firstProduct) {?>
    <div class="container-fluid background-white main__quality-block-padding">
        <div class="container">
            <div class="row main__quality-block-padding">
                <div class="col-lg-6">
                    <img class="main__quality-image" src="<?= $firstProduct->getThumbImage('main_image') ?>" alt="<?= $firstProduct->title ?>"
                         style="width: 100%">
                </div>
                <div class="col-lg-6">
                    <div class="row main__quality-image-wrapper">
                        <div class="col-lg-6">
                            <img class="main__quality-image" src="<?= $firstProduct->getThumbImage('second_image_1') ?>" alt="<?= $firstProduct->title ?>"
                                 style="width: 100%">
                        </div>
                        <div class="col-lg-6">
                            <img class="main__quality-image" src="<?= $firstProduct->getThumbImage('second_image_2') ?>" alt="<?= $firstProduct->title ?>"
                                 style="width: 100%">
                        </div>
                        <div class="col-lg-12 ">
                            <div class="col-lg-12 col-lg-12 main__quality-product-wrapper background-grey">
                                <h3><?= $firstProduct->title ?></h3>
                                <p><?= $firstProduct->short_desc ?></p>
                                <div>
                                    <a href="#" data-toggle="modal" data-target="#exampleModalOrder">Заказать
                                        расчет</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>
<? if ($secondProduct) {?>
    <div class="container-fluid background-grey">
        <div class="container">
            <div class="row main__quality-image-padding-wrapper">
                <div class="col-lg-6">
                    <div class="row main__quality-image-wrapper">
                        <div class="col-lg-6">
                            <img class="main__quality-image" src="<?= $secondProduct->getThumbImage('second_image_1') ?>" alt="<?= $secondProduct->title ?>"
                                 style="width: 100%">
                        </div>
                        <div class="col-lg-6">
                            <img class="main__quality-image" src="<?= $secondProduct->getThumbImage('second_image_2') ?>" alt="<?= $secondProduct->title ?>"
                                 style="width: 100%">
                        </div>
                    </div>
                    <div class="col-lg-12 main__quality-product-wrapper background-white">
                        <h3 class="main__quality-product-title"><?= $secondProduct->title ?></h3>
                        <p class="main__quality-product-text"><?= $secondProduct->short_desc ?>
                        </p>
                        <div class="main__quality-order-button button-left">
                            <a href="#" data-toggle="modal" data-target="#exampleModalOrder">Заказать расчет</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="main__quality-image" src="<?= $secondProduct->getThumbImage('main_image') ?>" alt="<?= $secondProduct->title ?>"
                         style="width: 100%">
                </div>
            </div>
        </div>
    </div>
<?}?>
<? if ($lastProduct) {?>
    <div class="container-fluid background-white">
        <div class="container">
            <div class="row main__quality-image-padding-wrapper">
                <div class="col-lg-6">
                    <img class="main__quality-image" src="<?= $lastProduct->getThumbImage('main_image') ?>" alt="<?= $lastProduct->title ?>"
                         style="width: 100%">
                </div>
                <div class="col-lg-6">
                    <div class="row main__quality-image-wrapper">
                        <div class="col-lg-6">
                            <img class="main__quality-image" src="<?= $lastProduct->getThumbImage('second_image_1') ?>" alt="<?= $lastProduct->title ?>"
                                 style="width: 100%">
                        </div>
                        <div class="col-lg-6">
                            <img class="main__quality-image" src="<?= $lastProduct->getThumbImage('second_image_2') ?>" alt="<?= $lastProduct->title ?>"
                                 style="width: 100%">
                        </div>
                    </div>
                    <div class="col-lg-12 main__quality-product-wrapper background-grey">
                        <h3><?= $lastProduct->title ?></h3>
                        <p><?= $lastProduct->short_desc ?></p>
                        <div>
                            <a href="#" data-toggle="modal" data-target="#exampleModalOrder">Заказать расчет</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>

