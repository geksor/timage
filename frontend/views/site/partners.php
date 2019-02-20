<?php

/* @var $this \yii\web\View */
/* @var $pageParam \common\models\PartnersPage */
/* @var $models array|\common\models\Partners[]|\yii\db\ActiveRecord[] */

$this->title = $pageParam->title;
$this->registerMetaTag([
    'name' => 'title',
    'content' => $pageParam->meta_title,
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $pageParam->meta_description,
]);

?>

<div class="main__partners">
    <div class="container">
        <h2 class="main__partners-title-text"><?= $pageParam->title ?></h2>
        <div class="row main__partners-wrapper">
            <? if ($models) {?>
                <? foreach ($models as $model) {?>
                    <div class="col-lg-3 col-md-4 col-sm-6 main__partners-image-wrapper">
                        <img src="<?= $model->getThumbImage() ?>" alt="<?= $model->title ?>" style="width: 100%">
                    </div>
                <?}?>
            <?}?>
        </div>
    </div>
</div>
