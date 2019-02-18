<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model \common\models\PartnersPage */

$this->title = 'Настройки страницы наши партнеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-page-params">

    <div class="box box-primary">
        <div class="box-body">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'title') ?>
                    <?= $form->field($model, 'menuTitle') ?>
                </div>
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'meta_title') ?>
                    <?= $form->field($model, 'meta_description')->textarea() ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
