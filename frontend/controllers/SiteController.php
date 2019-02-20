<?php
namespace frontend\controllers;

use common\models\AboutPage;
use common\models\Callback;
use common\models\CallbackSection;
use common\models\Contact;
use common\models\HomePage;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
