<?php

/* @var $this yii\web\View */
/* @var $pageParam \common\models\Contact */

$this->title = $pageParam->title;
$this->registerMetaTag([
    'name' => 'title',
    'content' => $pageParam->meta_title,
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $pageParam->meta_description,
]);
?>

<div class="main__contacts">
    <div class="container">
        <h2 class="main__contacts-title-text"><?= $pageParam->title ?></h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="main__contacts-address-wrapper"><span class="main__contacts-address">Адрес:</span><br>
                    <p class="main__contacts-address-text"><?= $pageParam->address_1 ?></p>
                </div>
                <div class="main__contacts-tel-wrapper"><span class="main__contacts-tel-title">Телефон:</span><br>
                    <ul class="main__contacts-tel-list">
                        <li class="main__contacts-tel">
                            <a href="tel:<?= preg_replace("/[^0-9]/", '', $pageParam->phone_1) ?>">
                                <?= $pageParam->phone_1 ?>
                            </a>
                        </li>
                        <li class="main__contacts-tel">
                            <a href="tel:<?= preg_replace("/[^0-9]/", '', $pageParam->phone_2) ?>">
                                <?= $pageParam->phone_2 ?>
                            </a>
                        </li>
                        <li class="main__contacts-tel">
                            <a href="tel:<?= preg_replace("/[^0-9]/", '', $pageParam->phone_3) ?>">
                                <?= $pageParam->phone_3 ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="main__contacts-mail-wrapper"><span class="main__contacts-mail-title">E-mail:</span><br>
                    <a class="main__contacts-mail" href="mailto:<?= $pageParam->email ?>"><?= $pageParam->email ?></a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="main__contacts-map-wrapper">
                    <?= $pageParam->mapScript ?>
                </div>
            </div>
        </div>
    </div>
</div>
