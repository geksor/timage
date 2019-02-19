<?php
namespace frontend\widgets;

use common\models\Callback;
use yii\base\Widget;

class ModalSaleWidget extends Widget
{
    public function run()
    {
        $model = new Callback();
        $model->type = 1;

        return $this->render('modalSale-widget', [
            'model' => $model,
        ]);
    }
}