<?
/* @var $paramsHomePage \common\models\HomePage */
/* @var $paramsContact \common\models\Contact */
?>

<div class="header-fixed">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__company-name-wrapper">
                        <a href="/">
                            <img class="header__timedj-plus-logo" src="/public/img/timedj-plus-logo.svg" alt="<?= $paramsHomePage->logoText ?>"
                                         style="width: 70%">
                        </a>
                        <a class="header__company-name" href="/"><?= $paramsHomePage->logoText ?></a>
                    </div>
                </div>
                <div class="col-lg-6 main__intro-action-wrapper">
                    <p><?= $paramsHomePage->headerMainText ?></p>
                </div>
                <div class="col-lg-3 header__contacts-wrapper">
                    <div class="icon-tel-wrapper">
                        <img class="header__call-icon" src="/public/img/call-icon.svg" alt="Иконка телефона">
                        <ul class="header__contacts__list">
                            <li>
                                <a class="header__contacts__item tel-top" href="tel:<?= preg_replace("/[^0-9]/", '', $paramsContact->phone_1) ?>">
                                    <?= $paramsContact->phone_1 ?>
                                </a>
                            </li>
                            <li>
                                <ul class=" header__contacts-tel-wrapper">
                                    <li>
                                        <a class="header__contacts__item tel-bottom" href="tel:<?= preg_replace("/[^0-9]/", '', $paramsContact->phone_2) ?>">
                                            <?= $paramsContact->phone_2 ?>
                                        </a>
                                    </li>
                                    <li class="tel-bottom">&nbsp;//&nbsp;</li>
                                    <li>
                                        <a class="header__contacts__item tel-bottom" href="tel:<?= preg_replace("/[^0-9]/", '', $paramsContact->phone_3) ?>">
                                            <?= $paramsContact->phone_3 ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="header__contacts-tel-info">Звоните прямо сейчас</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__navigation-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 header__navigation-wrapper">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-white">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="contacts-navigation-tel" href="tel:<?= preg_replace("/[^0-9]/", '', $paramsContact->phone_1) ?>">
                            <img src="/public/img/contacts-icon-1.svg" alt="Иконка телефона">
                        </a>
                        <a class="contacts-navigation-mail" href="/contact#mapLink">
                            <img src="/public/img/contacts-icon-2.svg" alt="Иконка контакты">
                        </a>
                        <div class="row">
                            <div class="col-lg-12 d-flex">
                                <?= \frontend\widgets\HeaderMenuWidget::widget() ?>
                                <button class="nav-link main__intro-action btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalHeader">
                                        Узнай о скидках
                                </button>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

