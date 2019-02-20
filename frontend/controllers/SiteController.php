<?php
namespace frontend\controllers;

use common\models\AboutPage;
use common\models\Callback;
use common\models\CallbackSection;
use common\models\Contact;
use common\models\HomePage;
use common\models\Partners;
use common\models\PartnersPage;
use common\models\Project;
use common\models\ProjectPage;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $propHomePage = new HomePage();
        $propHomePage->load(Yii::$app->params);

        $propContact = new Contact();
        $propContact->load(Yii::$app->params);

        return $this->render('index', [
            'propHomePage' => $propHomePage,
            'propContact' => $propContact,
        ]);
    }

    /**
     * Displays projects page.
     *
     * @return mixed
     */
    public function actionProjects()
    {
        $pageParam = new ProjectPage();
        $pageParam->load(Yii::$app->params);

        $models = Project::find()->where(['publish' => 1])->orderBy(['rank' => SORT_ASC])->all();

        return $this->render('projects', [
            'pageParam' => $pageParam,
            'models' => $models,
        ]);
    }

    /**
     * Displays partners page.
     *
     * @return mixed
     */
    public function actionPartners()
    {
        $pageParam = new PartnersPage();
        $pageParam->load(Yii::$app->params);

        $models = Partners::find()->where(['publish' => 1])->orderBy(['rank' => SORT_ASC])->all();

        return $this->render('partners', [
            'pageParam' => $pageParam,
            'models' => $models,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $pageParam = new Contact();
        $pageParam->load(Yii::$app->params);


        return $this->render('contact', [
            'pageParam' => $pageParam,
        ]);

    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $pageParam = new AboutPage();
        $pageParam->load(Yii::$app->params);

        $contact = new Contact();
        $contact->load(Yii::$app->params);

        $contactForm = new ContactForm();

        if ($contactForm->load(Yii::$app->request->post()) && !$contactForm->first_name){
            if ($contact->email){
                $contactForm->sendEmail($contact->email);
                Yii::$app->session->setFlash('popUp', 'Ваше сообщение принято.');
            }else{
                Yii::$app->session->setFlash('popUp', 'Что то пошло не так. Попробуйте повторить действие позже');
            }
            return $this->refresh();
        }

        return $this->render('about', [
            'pageParam' => $pageParam,
            'contactForm' => $contactForm,
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionCallBack()
    {
        $callBackModel = new CallBack();
        $contact = new Contact();
        $contact->load(Yii::$app->params);

        if ( $callBackModel->load( Yii::$app->request->post() ) && !$callBackModel->first_name ) {
            if ($callBackModel->save()){
                Yii::$app->session->setFlash('popUp', ' Мы свяжемся с Вами в ближайшее время.');

                $messHeader = $callBackModel->type===2?'Запрос консультации':'Запрос информации о скидках';
                if ($contact->chatId){
                    $message = "$messHeader\n Имя: $callBackModel->name \n Телефон: $callBackModel->phone";
                    \Yii::$app->bot->sendMessage((integer)$contact->chatId, $message);
                }
                if ($contact->email){
                    $callBackModel->sendEmail($contact->email);
                }
                return $this->refresh();
            }
        }
        Yii::$app->session->setFlash('popUp', 'Что то пошло не так.');
        return $this->refresh();
    }

    /**
     * @return \yii\web\Response
     */
    public function actionCallBackSection()
    {
        $callBackModel = new CallbackSection();
        $contact = new Contact();
        $contact->load(Yii::$app->params);

        if ( $callBackModel->load( Yii::$app->request->post() ) && !$callBackModel->first_name ) {
            if ($callBackModel->save()){
                Yii::$app->session->setFlash('popUp', ' Мы свяжемся с Вами в ближайшее время.');

                $messHeader = 'Запрос информации' . $callBackModel->section_name;
                if ($contact->chatId){
                    $message = "$messHeader\n Имя: $callBackModel->name \n Телефон: $callBackModel->phone";
                    \Yii::$app->bot->sendMessage((integer)$contact->chatId, $message);
                }
                if ($contact->email){
                    $callBackModel->sendEmail($contact->email);
                }
                return $this->refresh();
            }
        }
        Yii::$app->session->setFlash('popUp', 'Что то пошло не так.');
        return $this->refresh();
    }

}
