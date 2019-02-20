<?
/* @var $models \common\models\CatalogSections */
?>

<div class="main__preview">
    <div class="container-fluid background-grey main__quality-slider-block-wrapper">
        <div class="container padding-partners">
            <h2 class="main__preview-title-text">Наши изделия из нержавейки</h2>
            <? if ($models) {?>
                <div class="row slider">
                    <? foreach ($models as $model) {/* @var $model \common\models\CatalogSections */?>
                        <div class="main__preview-image">
                            <div class="main__preview-image-wrapper">
                                <img src="<?= $model->getThumbImage('main_image') ?>" alt="<?= $model->title ?>" style="width: 100%">
                            </div>
                            <p class="main__preview-text"><?= $model->title ?></p>
                            <?= \yii\helpers\Html::a('', "/catalog/$model->alias") ?>
                        </div>
                    <?}?>
                </div>
            <?}?>
        </div>
    </div>
</div>
