<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model \common\models\AboutPage */

$this->title = 'Настройки страницы о компании';
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
            <div class="row margin-bottom">
                <div class="col-xs-12 col-md-6">
                    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
                        'editorOptions' => [
                            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                            'height' => 300,
                            'resize_enabled' => true,
                        ],
                    ]); ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <?= $form->field($model, 'image')->hiddenInput() ?>
                    <div class="row" style="display: flex; align-items: center;">
                        <? if ($model->image) {?>
                            <div class="col-xs-6">
                                <?= Html::img($model->getThumbImage(), ['style' => 'max-width:100%']) ?>
                            </div>
                            <div class="col-xs-6">
                                <?= Html::a('Изменить', ['set-image-about'], ['class' => 'btn btn-warning']) ?>
                            </div>
                        <?}else{?>
                            <div class="col-xs-6">
                                <?= Html::a('Загрузить', ['set-image-about'], ['class' => 'btn btn-success']) ?>
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
