<?
/* @var $models \common\models\Project */
?>

<div class="main__our-projects">
    <div class="container-fluid background-white">
        <div class="container">
            <h2 class="main__our-projects-title-text">Проекты выполненные нами</h2>
            <? if ($models) {?>
                <div class="row slider">
                    <? foreach ($models as $model) {/* @var $model \common\models\Project */?>
                        <div class="main__our-projects-image-wrapper">
                            <?
                                $firstImg = $model->getBehavior('galleryBehavior')->getImages()[0];
                                $img = $firstImg?$firstImg->getUrl('preview'):'/no_image.png';
                            ?>
                            <img src="<?= $img ?>" alt="<?= $model->title ?>" style="width: 100%">
                            <p class="main__our-project-text"><?= $model->title ?></p>
                        </div>
                    <?}?>
                </div>
            <?}?>
        </div>
    </div>
</div>

