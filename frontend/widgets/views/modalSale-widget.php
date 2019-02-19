<?
/* @var $model \common\models\Callback */

use yii\bootstrap\ActiveForm;

?>

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

            <? $form = ActiveForm::begin([
                'action' => '/site/call-back',
                'options' => [
                    'class' => 'modal-body'
                ]
            ]) ?>

            <div style="display: none">
                <?= $form->field($model, 'first_name')->label(false) ?>
                <?= $form->field($model, 'type')->label(false) ?>
            </div>

            <p class="main__about-popup-info">Заполните обязательные поля (имя, телефон)</p>

            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Ваше имя', 'class' => 'main__about-popup-name'])->label(false) ?>

            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Номер телефона', 'class' => 'main__about-popup-number'])->label(false) ?>

            <div class="main__about-popup-agree-wrapper">
                <p class="main__about-popup-agree-text">Нажимая кнопку отправить, я даю согласие на обработку
                    своей <span><a href="/personal-information">персональной информациии.</a></span></p>
            </div>

            <button class="main__about-popup-info-send-button" type="submit">Отправить</button>

            <? ActiveForm::end() ?>

        </div>
    </div>
</div>
