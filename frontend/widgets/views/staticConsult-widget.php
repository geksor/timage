<?
/* @var $model \common\models\Callback */

use yii\bootstrap\ActiveForm;

?>

<div class="main__questions">
    <div class="container-fluid main__questions-image">
        <div class="container">
            <div class="main__questions-info-wrapper">
                <h2 class="main__questions-title-text">Остались вопросы</h2>
                <p class="main__questions-text">Звоните прямо сейчас</p>
                <a class="main__questions-number" href="tel:+79283219118">8 928 321 91 18</a>
                <p class="main__questions-text">Оставьте Вашу заявку</p>
            </div>
            <div class="row">
                <? $form = ActiveForm::begin([
                        'options' => [
                                'class' => 'col-lg-12 main__questions-inputs-wrapper'
                        ]
                ]) ?>
                    <div style="display: none">
                        <?= $form->field($model, 'first_name')->label(false) ?>
                    </div>
                    <div class="main__questions-input-name">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя'])->label(false) ?>
                    </div>

                    <div class="main__questions-input-number">
                        <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Телефон'])->label(false) ?>
                    </div>

                    <div class="main__questions-input-submit">
                        <input type="button" value="Бесплатная консультация">
                    </div>

                <? ActiveForm::end() ?>
            </div>
            <p class="main__questions-call-text">Наш специалист перезвонит вам в течении 15 минут.</p>
        </div>
    </div>
</div>
