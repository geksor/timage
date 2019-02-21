<?php

use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use backend\widgets\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveField;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CatalogSectionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-sections-index">

    <?= \common\widgets\Alert::widget() ?>
    <div class="box box-primary">
        <div class="box-body">
            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Создать раздел', ['create'], ['class' => 'btn btn-success']) ?>
            </p>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    'id',
                    [
                        'attribute' => 'title',
                        'contentOptions' => [
                            'style' => 'max-width:300px; white-space: normal;'
                        ],
                    ],
                    'price:integer',
//                    'short_desc',
//                    'desc:ntext',
                    //'main_image:ntext',
                    //'second_image_1:ntext',
                    //'second_image_2:ntext',
                    //'alias:ntext',
                    //'meta_title:ntext',
                    //'meta_description:ntext',
                    [
                        'attribute' => 'rank',
                        'format' => 'raw',
                        'content' => function ($data){
                            /* @var $data \common\models\CatalogSections */
//                            return Html::input('number', 'rank' ,$data->rank, ['class' => 'form-control', 'id' => $data->id]);
                            return "<div class='input-group'>" . Html::activeInput('number', $data, 'rank', ['class' => 'form-control', 'data-id' => $data->id, 'id' => "rank_$data->id"]) .
                                "<span class='input-group-btn'>" . Html::button('<span class="glyphicon glyphicon-ok"></span>', ['class'=>'btn btn-primary rankSuccess', 'data-input'=>"#rank_$data->id"]) . "</span></div>";
                        }

                    ],
                    [
                        'attribute' => 'show_on_home',
                        'filter'=>[0=>"Не показывать",1=>"Первым",2=>"Вторым",3=>"Третьим"],
                        'filterInputOptions' => ['prompt' => 'Все', 'class' => 'form-control form-control-sm'],
                        'headerOptions' => ['width' => '170'],
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\CatalogSections */
                            switch ($data->show_on_home){
                                case 0:
                                    return 'Не показывать';
                                case 1:
                                    return 'Первым';
                                case 2:
                                    return 'Вторым';
                                case 3:
                                    return 'Третьим';
                                default:
                                    return 'Не определено';
                            }
                        }
                    ],
                    [
                        'attribute' => 'publish',
                        'filter'=>[0=>"Не опубликованные",1=>"Опубликованные"],
                        'filterInputOptions' => ['prompt' => 'Все', 'class' => 'form-control form-control-sm'],
                        'headerOptions' => ['width' => '170'],
                        'format' => 'raw',
                        'value' => function ($data){
                            /* @var $data \common\models\CatalogSections */
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
                                                                            url: "/admin/catalog-sections/publish",
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
            url: "/admin/catalog-sections/rank",
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
