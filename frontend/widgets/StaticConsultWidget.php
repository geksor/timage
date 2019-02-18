<?php
namespace frontend\widgets;

use common\models\Callback;
use yii\base\Widget;

class StaticConsultWidget extends Widget
{
    public function run()
    {
        $model = new Callback();

        return $this->render('staticConsult-widget', [
            'model' => $model,
        ]);
    }
}