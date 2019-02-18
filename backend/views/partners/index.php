<?php

use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use backend\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PartnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Партнеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <?= \common\widgets\Alert::widget() ?>

    <div class="box box-primary">
        <div class="box-body">
            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Создать партнера', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title:ntext',
                    [
                        'attribute' => 'image',
                        'filter' => false,
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\Partners */
                            return Html::img($data->getThumbImage(), ['style' => 'max-width: 70px;']);
                        },
                        'headerOptions' => ['width' => 60]
                    ],
                    [
                        'attribute' => 'rank',
                        'format' => 'raw',
                        'content' => function ($data){
                            /* @var $data \common\models\Partners */
                            return "<div class='input-group'>" . Html::activeInput('number', $data, 'rank', ['class' => 'form-control', 'data-id' => $data->id, 'id' => "rank_$data->id"]) .
                                "<span class='input-group-btn'>" . Html::button('<span class="glyphicon glyphicon-ok"></span>', ['class'=>'btn btn-primary rankSuccess', 'data-input'=>"#rank_$data->id"]) . "</span></div>";
                        }

                    ],
                    [
                        'attribute' => 'publish',
                        'filter'=>[0=>"Не опубликованные",1=>"Опубликованные"],
                        'filterInputOptions' => ['prompt' => 'Все', 'class' => 'form-control form-control-sm'],
                        'headerOptions' => ['width' => '170'],
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\Partners */
                            return SwitchInput::widget([
                                'name' => "publish_$data->id",
                                'value' => $data->publish,
                                'class' => 'col-center',
                                'pluginOptions' => [
                                    'onColor' => 'success',
                                    'offColor' => 'danger',
                                    'onText' => '<i class="glyphicon glyphicon-ok"></i>',
                                    'offText' => '<i class="glyphicon glyphicon-remove"></i>',
                                ],
                                'options' => [
                                    'data-id' => $data->id,
                                ],
                                'pluginEvents' => [
                                    'switchChange.bootstrapSwitch' => 'function() {
                                                                                    $.ajax({
                                                                                    type: "GET",
                                                                                    url: "/admin/partners/publish",
                                                                                    data: "id="+ $(this).data("id") + "&publish=" + Number($(this).prop("checked")),
                                                                                }) }'
                                ]
                            ]);
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
<?
$js = <<< JS
$('.rankSuccess').on('click', function(){
    var inputRank = $($(this).data('input'));
    var btn = $(this);
    $.ajax({
        type: "GET",
        url: "/admin/partners/rank",
        data: 'id='+ inputRank.data('id') +'&rank='+ inputRank.val(),
        success: function(data) {
          if (data === 'success'){
              btn.removeClass('btn-primary').addClass('btn-success').blur();
              setTimeout(function() {
                btn.removeClass('btn-success').addClass('btn-primary');
              }, 5000)
          } else {
              btn.blur();
          } 
        }
    })
});

JS;

$this->registerJs($js, $position = yii\web\View::POS_END, $key = null);
?>
<?php Pjax::end(); ?>
        </div>
    </div>
</div>
