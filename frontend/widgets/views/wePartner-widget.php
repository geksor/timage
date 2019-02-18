<?
/* @var $models \common\models\Partners */
?>

<div class="main__partners">
    <div class="container">
        <h2 class="main__partners-title-text">Наши партнёры</h2>
        <? if ($models) {?>
            <div class="row slider-partners">
                <? foreach ($models as $model) {/* @var $model \common\models\Partners */?>
                    <div class="padding-partners">
                        <img class=" main__partners-image-item" src="<?= $model->getThumbImage() ?>" alt="<?= $model->title ?>" style="width: 100%">
                    </div>
                <?}?>
            </div>
        <?}?>
    </div>
</div>
