<?
/* @var $paramsHomePage \common\models\HomePage */
/* @var $paramsContact \common\models\Contact */
?>

<div class="footer">
    <div class="container-fluid footer__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 footer__logo-wrapper">
                    <a href="/"><img src="/public/img/timedj-plus-logo.svg" alt="<?= $paramsHomePage->logoText ?>" style="width: 75%"></a>
                    <p class="footer__logo-text"><?= $paramsHomePage->logoText ?></p>
                </div>
                <div class="col-lg-3 footer__tel-wrapper">
                    <a class="footer__tel" href="tel:<?= preg_replace("/[^0-9]/", '', $paramsContact->phone_1) ?>">
                        <?= $paramsContact->phone_1 ?>
                    </a>
                    <a class="footer__tel" href="tel:<?= preg_replace("/[^0-9]/", '', $paramsContact->phone_2) ?>">
                        <?= $paramsContact->phone_2 ?>
                    </a>
                    <a class="footer__tel" href="tel:<?= preg_replace("/[^0-9]/", '', $paramsContact->phone_3) ?>">
                        <?= $paramsContact->phone_3 ?>
                    </a>
                </div>
                <div class="col-lg-3 footer__adress-wrapper">
                    <p class="footer__adress-text"><?= $paramsContact->address_1 ?></p><br>
                    <p class="footer__adress-text"><?= $paramsContact->address_2 ?></p><br>
                    <p class="footer__adress-text"><?= $paramsContact->address_3 ?></p>
                </div>
                <div class="col-lg-2 footer__email-wrapper"><a class="footer__email" href="mailto:timej_plus@mail.ru"><?= $paramsContact->email ?></a></div>
            </div>
            <p class="footer__copyright">Все права защищены (с) <?= date('Y') ?> | <a href="http://web-elitit.ru/">design by ELIT-IT</a></p>
        </div>
    </div>
</div>
