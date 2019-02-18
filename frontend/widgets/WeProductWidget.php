<?php
namespace frontend\widgets;

use common\models\CatalogSections;
use yii\base\Widget;

class WeProductWidget extends Widget
{
    public function run()
    {
        $models = CatalogSections::find()->where(['publish' => 1])->orderBy(['rank' => SORT_ASC])->all();

        return $this->render('weProduct-widget', [
            'models' => $models,
        ]);
    }
}