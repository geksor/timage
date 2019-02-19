<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CallbackSection */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Обратная связь разделы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="callback-section-view">

    <?= \common\widgets\Alert::widget() ?>
    <div class="box box-primary">
        <div class="box-body">
            <?php Pjax::begin(); ?>

            <p>
                <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i>', ['index'], ['class' => 'btn btn-default']) ?>
                <? if ($model->viewed !== 2) {?>
                    <?= Html::a('Обработать', ['success', 'id' => $model->id, 'success' => 2], ['class' => 'btn btn-success'])?>
                <?}?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name:ntext',
                    'phone:ntext',
                    'section_name:ntext',
                    'created_at:datetime',
                    'done_at:datetime',
                ],
            ]) ?>

            <?php Pjax::end(); ?>
        </div>
    </div>

</div>
