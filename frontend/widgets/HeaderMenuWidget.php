<?php
namespace frontend\widgets;

use common\models\AboutPage;
use common\models\CatalogSections;
use common\models\Contact;
use common\models\PartnersPage;
use common\models\ProjectPage;
use yii\base\Widget;

class HeaderMenuWidget extends Widget
{
    public function run()
    {
        $projectPage = new ProjectPage();
        $projectPage->load(\Yii::$app->params);

        $partnersPage = new PartnersPage();
        $partnersPage->load(\Yii::$app->params);

        $aboutPage = new AboutPage();
        $aboutPage->load(\Yii::$app->params);

        $contact = new Contact();
        $contact->load(\Yii::$app->params);

        $models = CatalogSections::find()->where(['publish' => 1])->orderBy(['rank' => SORT_ASC])->all();

        return $this->render('headerMenu-widget', [
            'projectPage' => $projectPage,
            'partnersPage' =>$partnersPage,
            'aboutPage' => $aboutPage,
            'contact' => $contact,
            'models' => $models,
        ]);
    }
}