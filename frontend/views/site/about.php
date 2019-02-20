<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;

/* @var $pageParam \common\models\AboutPage */
/* @var $contact \common\models\Contact */
/* @var $contactForm \frontend\models\ContactForm */

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

<div class="main__about">
    <div class="container">
        <h2 class="main__about-title-text"><?= $pageParam->title ?></h2>
        <div class="row">
            <div class="col-lg-6 main__about-text-wrapper">
                <?= $pageParam->text ?>
                <div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Письмо
                        руководству</button>
                </div>
            </div>
            <div class="col-lg-6 main__about-image-wrapper">
                <img src="<?= $pageParam->getThumbImage() ?>" alt="<?= $pageParam->title ?>" style="width: 100%">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title main__about-popup-title-text" id="exampleModalLongTitle">Если остались
                    вопросы задайте их нам</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <? $form = ActiveForm::begin([
                'options' => [
                    'class' => 'modal-body'
                ]
            ]) ?>

            <div style="display: none">
                <?= $form->field($contactForm, 'first_name')->label(false) ?>
            </div>

            <?= $form->field($contactForm, 'name')->textInput(['placeholder' => 'Ваше имя', 'class' => 'main__about-popup-name'])->label(false) ?>

            <?= $form->field($contactForm, 'phone')->textInput(['placeholder' => 'Номер телефона', 'class' => 'main__about-popup-number'])->label(false) ?>

            <?= $form->field($contactForm, 'body')->textarea(['placeholder' => 'Текст сообщения...', 'class' => 'main__about-popup-textfield', 'cols' => 30, 'rows' => 10])->label(false) ?>

            <div class="main__about-popup-agree-wrapper">
                <p class="main__about-popup-agree-text">Нажимая кнопку отправить, я даю согласие на обработку
                    своей <span><a href="/personal-information">персональной информациии.</a></span></p>
            </div>

            <button class="main__about-popup-info-send-button" type="submit">Отправить</button>

            <? ActiveForm::end() ?>

        </div>
    </div>
</div>
