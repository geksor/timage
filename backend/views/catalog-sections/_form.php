<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogSections */
/* @var $form kartik\form\ActiveForm */
/* @var $disableItems array */
/* @var $showSelect array */
?>

<div class="catalog-sections-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL
    ]);
    $showHomeData = [0 => 'Не показывать', 1 => 'Первым', 2 => 'Вторым', 3 => 'Третьим']
    ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'short_desc')->textarea(['maxlength' => true, 'rows' => 6]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'meta_title') ?>

    <?= $form->field($model, 'meta_description') ?>

    <?= $form->field($model, 'publish')->widget(SwitchInput::classname(), []) ?>

    <? if ($showSelect) {?>
        <?= $form->field($model, 'show_on_home')->radioButtonGroup($showHomeData, ['disabledItems'=>$disableItems]) ?>
    <?}?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
