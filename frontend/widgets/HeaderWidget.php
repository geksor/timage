<?php
namespace frontend\widgets;

use common\models\Contact;
use common\models\HomePage;
use yii\base\Widget;

class HeaderWidget extends Widget
{
    public function run()
    {
        $paramsHomePage = new HomePage();
        $paramsHomePage->load(\Yii::$app->params);

        $paramsContact = new Contact();
        $paramsContact->load(\Yii::$app->params);

        return $this->render('header-widget', [
            'paramsHomePage' => $paramsHomePage,
            'paramsContact' => $paramsContact,
        ]);
    }
}