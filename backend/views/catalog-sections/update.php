<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatalogSections */
/* @var $disableItems array */
/* @var $showSelect boolean */

$this->title = 'Редактирование раздела: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="catalog-sections-update">

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
