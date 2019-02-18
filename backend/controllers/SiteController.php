<?php
namespace backend\controllers;

use backend\actions\SetImage;
use backend\actions\SetImageFromSettings;
use backend\models\WebVisitor;
use common\models\AboutPage;
use common\models\AgreePage;
use common\models\Contact;
use common\models\DeliveryPage;
use common\models\HomePage;
use common\models\PartnersPage;
use common\models\ProjectPage;
use common\models\SiteSettings;
use common\models\ThreeBlock;
use nox\components\http\userAgent\UserAgentParser;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

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
                'rules' => [
                    [
                        'actions' => [
                            'login',
                            'error',
                        ],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'logout',
                            'error',
                            'index',
                            'contact',
                            'about-page',
                            'set-image-about',
                            'home-page',
                            'set-image-ffb',
                            'set-image-fsb',
                            'project-page',
                            'partners-page',

                        ],
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
            'set-image-ffb' => [
                'class' => SetImageFromSettings::className(),
                'folder' => 'pages_img',
                'propImage' => 'FFB_image',
                'title' => 'Изображение блока',
                'fromModel' => new HomePage(),
                'backLink' => 'home-page',
                'width' => 445,
                'height' => 336,
            ],
            'set-image-fsb' => [
                'class' => SetImageFromSettings::className(),
                'folder' => 'pages_img',
                'propImage' => 'FSB_image',
                'title' => 'Изображение блока',
                'fromModel' => new HomePage(),
                'backLink' => 'home-page',
                'width' => 540,
                'height' => 379,
            ],
            'set-image-about' => [
                'class' => SetImageFromSettings::className(),
                'folder' => 'pages_img',
                'propImage' => 'image',
                'title' => 'Изображение страницы "О нас"',
                'fromModel' => new AboutPage(),
                'backLink' => 'about-page',
                'width' => 540,
                'height' => 485,
            ],

        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $counter_direct = WebVisitor::getStat(WebVisitor::TYPE_DIRECT);
        $counter_inner = WebVisitor::getStat(WebVisitor::TYPE_INNER);
        $counter_ads = WebVisitor::getStat(WebVisitor::TYPE_ADS);
        $counter_search = WebVisitor::getStat(WebVisitor::TYPE_SEARCH);

        $browserStat = WebVisitor::getBrowserStat();
        $labelsChart = [];
        $dataChart = [];
        $tempArr = [];
        if ($browserStat){
            foreach ($browserStat as $item){
                /* @var $item WebVisitor */
                $browser = UserAgentParser::parse($item->user_agent)['browser'];
                if (array_key_exists($browser, $tempArr)){
                    $tempArr[$browser][0] = $tempArr[$browser][0]+$item->visits;
                }else{
                    $tempArr[$browser][0] = $item->visits;
                }
            }
            foreach ($tempArr as $key => $item){
                $labelsChart[] = $key;
                $dataChart[] = $item[0];
            }
        }

        return $this->render('index', [
            'counter_direct' => $counter_direct,
            'counter_inner' => $counter_inner,
            'counter_ads' => $counter_ads,
            'counter_search' => $counter_search,
            'labelsChart' => json_encode($labelsChart),
            'dataChart' => json_encode($dataChart),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionContact()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->params)) {
            if (Yii::$app->request->post()) {
                if ($model->save(Yii::$app->request->post('Contact'))){
                    Yii::$app->session->setFlash('success', 'Операция выполнена успешно');
                }else{
                    Yii::$app->session->setFlash('error', 'Что то пошло не так, попробуйте еще раз.');
                };
                return $this->redirect(['contact']);
            }
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    /**
     * @return string|\yii\web\Response
     */
    public function actionAboutPage()
    {
        $model = new AboutPage();

        if ($model->load(Yii::$app->params)) {
            if (Yii::$app->request->post()) {
                if ($model->save(Yii::$app->request->post('AboutPage'))){
                    Yii::$app->session->setFlash('success', 'Операция выполнена успешно');
                }else{
                    Yii::$app->session->setFlash('error', 'Что то пошло не так, попробуйте еще раз.');
                };
                return $this->redirect(['about-page']);
            }
        }

        return $this->render('about-page', [
            'model' => $model,
        ]);
    }
    /**
     * @return string|\yii\web\Response
     */
    public function actionHomePage()
    {
        $model = new HomePage();

        if ($model->load(Yii::$app->params)) {
            if (Yii::$app->request->post()) {
                if ($model->save(Yii::$app->request->post('HomePage'))){
                    Yii::$app->session->setFlash('success', 'Операция выполнена успешно');
                }else{
                    Yii::$app->session->setFlash('error', 'Что то пошло не так, попробуйте еще раз.');
                };
                return $this->redirect(['home-page']);
            }
        }

        return $this->render('home-page', [
            'model' => $model,
        ]);
    }
    /**
     * @return string|\yii\web\Response
     */
    public function actionProjectPage()
    {
        $model = new ProjectPage();

        if ($model->load(Yii::$app->params)) {
            if (Yii::$app->request->post()) {
                if ($model->save(Yii::$app->request->post('ProjectPage'))){
                    Yii::$app->session->setFlash('success', 'Операция выполнена успешно');
                }else{
                    Yii::$app->session->setFlash('error', 'Что то пошло не так, попробуйте еще раз.');
                };
                return $this->redirect(['project-page']);
            }
        }

        return $this->render('project-page', [
            'model' => $model,
        ]);
    }
    /**
     * @return string|\yii\web\Response
     */
    public function actionPartnersPage()
    {
        $model = new PartnersPage();

        if ($model->load(Yii::$app->params)) {
            if (Yii::$app->request->post()) {
                if ($model->save(Yii::$app->request->post('PartnersPage'))){
                    Yii::$app->session->setFlash('success', 'Операция выполнена успешно');
                }else{
                    Yii::$app->session->setFlash('error', 'Что то пошло не так, попробуйте еще раз.');
                };
                return $this->redirect(['partners-page']);
            }
        }

        return $this->render('partners-page', [
            'model' => $model,
        ]);
    }




    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
