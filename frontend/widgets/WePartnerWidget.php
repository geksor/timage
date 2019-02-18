<?php
namespace frontend\widgets;

use common\models\Partners;
use yii\base\Widget;

class WePartnerWidget extends Widget
{
    public function run()
    {
        $models = Partners::find()->where(['publish' => 1])->orderBy(['rank' => SORT_ASC])->all();

        return $this->render('wePartner-widget', [
            'models' => $models,
        ]);
    }
}