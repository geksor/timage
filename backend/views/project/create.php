<?php

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = 'Создание проэкта';
$this->params['breadcrumbs'][] = ['label' => 'Проэкты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <div class="box box-primary">
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>
