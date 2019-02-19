<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Callback */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Обратная связь общая', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="callback-view">

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
                        [
                            'attribute' => 'type',
                            'value' => function ($data){
                                /* @var $data \common\models\CallBack */
                                if ($data->type===2){
                                    return 'Консультация';
                                }
                                return 'Скидки';
                            }
                        ],
                        'created_at:datetime',
                        'done_at:datetime',
                    ],
                ]) ?>

            <?php Pjax::end(); ?>
        </div>
    </div>

</div>
