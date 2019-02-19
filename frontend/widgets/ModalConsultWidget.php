<?php
namespace frontend\widgets;

use common\models\Callback;
use yii\base\Widget;

class ModalConsultWidget extends Widget
{
    public function run()
    {
        $model = new Callback();
        $model->type = 2;

        return $this->render('modalConsult-widget', [
            'model' => $model,
        ]);
    }
}