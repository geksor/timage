<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogSections */
/* @var $disableItems array */
/* @var $showSelect array */

$this->title = 'Создание раздела';
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-sections-create">

    <div class="box box-primary">
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
                'disableItems' => $disableItems,
                'showSelect' => $showSelect,
            ]) ?>

        </div>
    </div>

</div>
