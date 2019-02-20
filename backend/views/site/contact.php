<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;


/* @var $this yii\web\View */
/* @var $model \common\models\Contact */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-params">

    <?= \common\widgets\Alert::widget() ?>

    <div class="box box-primary">
        <div class="box-body">

            <?php $form = ActiveForm::begin(); ?>

            <h2>Настройки страницы</h2>

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <?= $form->field($model, 'title') ?>
                    <?= $form->field($model, 'menuTitle') ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <?= $form->field($model, 'meta_title') ?>
                    <?= $form->field($model, 'meta_description')->textarea() ?>
                </div>
            </div>


            <h2>Контакты</h2>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'address_1') ?>
                    <?= $form->field($model, 'address_2') ?>
                    <?= $form->field($model, 'address_3') ?>
                </div>
                <div class="col-xl-12 col-md-6 col-lg-3">
                    <?= $form->field($model, 'phone_1') ?>
                    <?= $form->field($model, 'phone_2') ?>
                    <?= $form->field($model, 'phone_3') ?>
                </div>
                <div class="col-xl-12 col-md-6 col-lg-3">
                    <?= $form->field($model, 'phone_consult') ?>
                    <?= $form->field($model, 'mapScript') ?>
                    <?= $form->field($model, 'email') ?>
                </div>
            </div>


            <h2>Реквизиты</h2>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'company_name') ?>
                </div>
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'corpAddress') ?>
                </div>
                <div class="col-xl-12 col-md-6 col-lg-4">
                    <?= $form->field($model, 'inn') ?>
                </div>
                <div class="col-xl-12 col-md-6 col-lg-4">
                    <?= $form->field($model, 'kpp') ?>
                </div>
                <div class="col-xl-12 col-md-6 col-lg-4">
                    <?= $form->field($model, 'ogrn') ?>
                </div>

            </div>

            <h2>Прочие настройки</h2>

            <?= $form->field($model, 'chatId') ?>


            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
