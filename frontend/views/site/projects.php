<?php

/* @var $this \yii\web\View */
/* @var $pageParam \common\models\ProjectPage */
/* @var $models array|\common\models\Project[]|\yii\db\ActiveRecord[] */

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


<div class="main__projects">
    <div class="container">
        <h2 class="main__projects-title-text"><?= $pageParam->title ?></h2>

        <? if ($models) {?>
            <? foreach ($models as $model) {?>
                <?  $images = $model->getBehavior('galleryBehavior')->getImages(); ?>
                <? if ($images){?>
                    <div id="project_<?= $model->id ?>">
                        <h3 class="main__projects-text"><?= $model->title ?></h3>
                        <div class="row">
                            <? foreach ($images as $image) {?>
                                <div class="col-lg-3 col-md-6 col-sm-12 main__projects-image-wrapper">
                                    <a href="<?= $image->getUrl('original') ?>" data-fancybox="project_gallery_<?= $model->id ?>">
                                        <img src="<?= $image->getUrl('preview') ?>" alt="<?= $image->name ?>" style="width: 100%">
                                    </a>
                                </div>
                            <?}?>
                        </div>
                    </div>
                <?}?>
            <?}?>
        <?}?>
    </div>
</div>
