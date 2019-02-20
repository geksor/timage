<?php
namespace frontend\widgets;

use common\models\Callback;
use common\models\Contact;
use yii\base\Widget;

class StaticConsultWidget extends Widget
{
    public function run()
    {
        $model = new Callback();
        $model->type = 2;

        $contact = new Contact();
        $contact->load(\Yii::$app->params);

        return $this->render('staticConsult-widget', [
            'model' => $model,
            'contact' => $contact,
        ]);
    }
}