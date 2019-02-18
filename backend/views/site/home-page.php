<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model \common\models\HomePage */

$this->title = 'Настройки домашней страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-page-params">

    <div class="box box-primary">
        <div class="box-body">

            <?php $form = ActiveForm::begin(); ?>

            <h2>Шапка сайта</h2>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'title') ?>
                    <?= $form->field($model, 'logoText') ?>
                    <?= $form->field($model, 'headerMainText') ?>
                </div>
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'meta_title') ?>
                    <?= $form->field($model, 'meta_description')->textarea() ?>
                </div>
            </div>

            <h2>Банер</h2>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'banner_firstTitle') ?>
                </div>
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'banner_secondTitle') ?>
                </div>
            </div>

            <h2>Первый свободный блок</h2>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'FFB_title') ?>
                    <?= $form->field($model, 'FFB_text')->widget(CKEditor::className(),[
                        'editorOptions' => [
                            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                            'height' => 200,
                            'resize_enabled' => true,
                        ],
                    ]); ?>
                </div>
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'FFB_image')->hiddenInput() ?>
                    <div class="row" style="display: flex; align-items: center;">
                        <? if ($model->FFB_image) {?>
                            <div class="col-xs-6">
                                <?= Html::img($model->getThumbImage('FFB_image'), ['style' => 'max-width:100%']) ?>
                            </div>
                            <div class="col-xs-6">
                                <?= Html::a('Изменить', ['set-image-ffb'], ['class' => 'btn btn-warning']) ?>
                            </div>
                        <?}else{?>
                            <div class="col-xs-6">
                                <?= Html::a('Загрузить', ['set-image-ffb'], ['class' => 'btn btn-success']) ?>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>

            <h2>Второй свободный блок</h2>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'FSB_title') ?>
                    <?= $form->field($model, 'FSB_text')->widget(CKEditor::className(),[
                        'editorOptions' => [
                            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                            'height' => 200,
                            'resize_enabled' => true,
                        ],
                    ]); ?>
                </div>
                <div class="col-xl-12 col-md-6">
                    <?= $form->field($model, 'FSB_image')->hiddenInput() ?>
                    <div class="row" style="display: flex; align-items: center;">
                        <? if ($model->FSB_image) {?>
                            <div class="col-xs-6">
                                <?= Html::img($model->getThumbImage('FSB_image'), ['style' => 'max-width:100%']) ?>
                            </div>
                            <div class="col-xs-6">
                                <?= Html::a('Изменить', ['set-image-fsb'], ['class' => 'btn btn-warning']) ?>
                            </div>
                        <?}else{?>
                            <div class="col-xs-6">
                                <?= Html::a('Загрузить', ['set-image-fsb'], ['class' => 'btn btn-success']) ?>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
