<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use zxbodya\yii2\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogSections */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="catalog-sections-view">

    <?= \common\widgets\Alert::widget() ?>
    <div class="box box-primary">
        <div class="box-body">

            <p>
                <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i>', ['index'], ['class' => 'btn btn-default']) ?>
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Продолжить удаление?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('Создать раздел', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title:ntext',
                    'price:integer',
                    'short_desc',
                    'desc:ntext',
                    [
                        'attribute' => 'main_image',
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\CatalogSections */
                            if ($data->getImageIsSet('main_image')){
                                return '<div class="row imageRow">'
                                        .'<div class="col-xs-5 col-md-3 col-lg-1">'
                                            .Html::img($data->getThumbImage('main_image'), ['style' => 'max-width: 100%;'])
                                        .'</div>'
                                        .'<div class="col-xs-3">'
                                            .Html::a('Изменить', ['set-main-image', 'id' => $data->id], ['class' => 'btn btn-warning'])
                                        .'</div>'
                                    .'</div>';
                            }
                            return Html::a('Установить', ['set-main-image', 'id' => $data->id], ['class' => 'btn btn-success']);
                        }

                    ],
                    [
                        'attribute' => 'second_image_1',
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\CatalogSections */
                            if ($data->getImageIsSet('second_image_1')){
                                return '<div class="row imageRow">'
                                        .'<div class="col-xs-5 col-md-3 col-lg-1">'
                                            .Html::img($data->getThumbImage('second_image_1'), ['style' => 'max-width: 100%;'])
                                        .'</div>'
                                        .'<div class="col-xs-3">'
                                            .Html::a('Изменить', ['set-second-image-1', 'id' => $data->id], ['class' => 'btn btn-warning'])
                                        .'</div>'
                                    .'</div>';
                            }
                            return Html::a('Установить', ['set-second-image-1', 'id' => $data->id], ['class' => 'btn btn-success']);
                        }

                    ],
                    [
                        'attribute' => 'second_image_2',
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\CatalogSections */
                            if ($data->getImageIsSet('second_image_2')){
                                return '<div class="row imageRow">'
                                        .'<div class="col-xs-5 col-md-3 col-lg-1">'
                                            .Html::img($data->getThumbImage('second_image_2'), ['style' => 'max-width: 100%;'])
                                        .'</div>'
                                        .'<div class="col-xs-3">'
                                            .Html::a('Изменить', ['set-second-image-2', 'id' => $data->id], ['class' => 'btn btn-warning'])
                                        .'</div>'
                                    .'</div>';
                            }
                            return Html::a('Установить', ['set-second-image-2', 'id' => $data->id], ['class' => 'btn btn-success']);
                        }

                    ],
                    'alias:ntext',
                    'meta_title:ntext',
                    'meta_description:ntext',
                    'publish:boolean',
                    'rank',
                    [
                        'attribute' => 'show_on_home',
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\CatalogSections */
                            switch ($data->show_on_home){
                                case 0:
                                    return 'Не показывать';
                                case 1:
                                    return 'Первым';
                                case 2:
                                    return 'Вторым';
                                case 3:
                                    return 'Третьим';
                                default:
                                    return 'Не определено';
                            }
                        }
                    ],
                ],
            ]) ?>

        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Изображения</h3>
        </div>
        <div class="box-body">
            <? if ($model->isNewRecord) {
                echo 'Нельзя загружать изображения до создания галлереи';
            } else {
                echo GalleryManager::widget(
                    [
                        'model' => $model,
                        'behaviorName' => 'galleryBehavior',
                        'apiRoute' => 'catalog-sections/galleryApi'
                    ]
                );
            }?>
        </div>
    </div>


</div>

<?php
$css= <<< CSS

.imageRow{
    display: flex;
    align-items: center;
}

CSS;

$this->registerCss($css, ["type" => "text/css"], "catalogView" );
?>​
