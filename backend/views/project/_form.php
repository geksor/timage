<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'publish')->widget(SwitchInput::classname()) ?>

<!--    --><?//= $form->field($model, 'rank')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
