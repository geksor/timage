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
                            <img class="header__timedj-plus-logo" src="public/img/timedj-plus-logo.svg" alt="<?= $paramsHomePage->logoText ?>"
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
                        <img class="header__call-icon" src="public/img/call-icon.svg" alt="Иконка телефона">
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
                            <img src="public/img/contacts-icon-1.svg" alt="Иконка телефона">
                        </a>
                        <a class="contacts-navigation-mail" href="/contacts">
                            <img src="public/img/contacts-icon-2.svg" alt="Иконка контакты">
                        </a>
                        <div class="row">
                            <div class="col-lg-12 d-flex">
                                <?= \frontend\widgets\HeaderMenuWidget::widget() ?>
                                <button class="nav-link main__intro-action btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalHeader">
                                    Узнай о скидках
                                </button>
<!--                                <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--                                    <ul class="navbar-nav m-auto">-->
<!--                                        <li class="nav-item dropdown">-->
<!--                                            <a class="nav-link dropdown-toggle header__navigation-item" href="#" id="navbarDropdown"-->
<!--                                               role="button" data-toggle="dropdown" aria-haspopup="true"-->
<!--                                               aria-expanded="false">-->
<!--                                                Каталог продукции-->
<!--                                            </a>-->
<!--                                            <div class="dropdown-menu">-->
<!--                                                <a class="dropdown-item header__navigation-item-dropdown" href="catalog.html">Раздел-->
<!--                                                    продукции</a>-->
<!--                                                <a class="dropdown-item header__navigation-item-dropdown" href="catalog.html">Раздел-->
<!--                                                    продукции</a>-->
<!--                                                <a class="dropdown-item header__navigation-item-dropdown" href="catalog.html">Раздел-->
<!--                                                    продукции</a>-->
<!--                                                <a class="dropdown-item header__navigation-item-dropdown" href="catalog.html">Раздел-->
<!--                                                    продукции</a>-->
<!--                                                <a class="dropdown-item header__navigation-item-dropdown" href="catalog.html">Раздел-->
<!--                                                    продукции</a>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="nav-item">-->
<!--                                            <a class="nav-link header__navigation-item" href="projects.html">Наши-->
<!--                                                работы</a>-->
<!--                                        </li>-->
<!--                                        <li class="nav-item">-->
<!--                                            <a class="nav-link header__navigation-item" href="partners.html">Партнёры</a>-->
<!--                                        </li>-->
<!--                                        <li class="nav-item">-->
<!--                                            <a class="nav-link header__navigation-item" href="about.html">О-->
<!--                                                компании</a>-->
<!--                                        </li>-->
<!--                                        <li class="nav-item">-->
<!--                                            <a class="nav-link header__navigation-item" href="contacts.html">Контакты</a>-->
<!--                                        </li>-->
<!--                                        <li class="nav-item">-->
<!--                                            <button class="nav-link main__intro-action btn btn-primary" data-toggle="modal"-->
<!--                                                    data-target="#exampleModalHeader">-->
<!--                                                Узнай о скидках-->
<!--                                            </button>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

