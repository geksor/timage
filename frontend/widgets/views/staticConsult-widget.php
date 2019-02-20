<?
/* @var $model \common\models\Callback
 * @var $contact \common\models\Contact
 */

use yii\bootstrap\ActiveForm;

?>

<div class="main__questions">
    <div class="container-fluid main__questions-image">
        <div class="container">
            <div class="main__questions-info-wrapper">
                <h2 class="main__questions-title-text">Остались вопросы</h2>
                <p class="main__questions-text">Звоните прямо сейчас</p>
<!--                <div class="">-->
                <a class="main__questions-number" href="tel:<?= preg_replace("/[^0-9]/", '', $contact->phone_consult) ?>"><?= $contact->phone_consult ?></a>
<!--                </div>-->
                <p class="main__questions-text">Оставьте Вашу заявку</p>
            </div>
            <div class="row">
                <? $form = ActiveForm::begin([
                        'action' => '/site/call-back',
                        'options' => [
                                'class' => 'col-lg-12 main__questions-inputs-wrapper'
                        ]
                ]) ?>
                    <div style="display: none">
                        <?= $form->field($model, 'first_name')->label(false) ?>
                        <?= $form->field($model, 'type')->label(false) ?>
                    </div>
                    <div class="main__questions-input-name">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя'])->label(false) ?>
                    </div>

                    <div class="main__questions-input-number">
                        <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Телефон'])->label(false) ?>
                    </div>

                    <div class="main__questions-input-submit">
                        <input type="submit" value="Бесплатная консультация">
                    </div>

                <? ActiveForm::end() ?>
            </div>
            <p class="main__questions-call-text">Наш специалист перезвонит вам в течении 15 минут.</p>
        </div>
    </div>
</div>
