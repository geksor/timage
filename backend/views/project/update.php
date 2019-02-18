<?php


/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = 'Редактирование проэкта: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проэкты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="project-update">

    <div class="box box-primary">
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>
