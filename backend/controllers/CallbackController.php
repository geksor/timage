<?php

namespace backend\controllers;

use Yii;
use common\models\Callback;
use common\models\CallbackSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CallbackController implements the CRUD actions for Callback model.
 */
class CallbackController extends Controller
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
                            'view',
                            'success',
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
     * Lists all Callback models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CallbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Callback model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->viewed = 2;
        $model->update(false);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Callback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Callback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Callback::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена');
    }

    /**
     * @param $id
     * @param $success
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionSuccess($id, $success)
    {
        if (Yii::$app->request->isAjax){

            $model = $this->findModel($id);

            $model->viewed = (integer) $success;
            $model->done_at = time();

            if ($model->save(false)){
                return $this->redirect(['index']);
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * @param \yii\base\Action $action
     * @param mixed $result
     * @return mixed
     */
    public function afterAction($action, $result)
    {
        if ($action->id === 'index'){
            CallBack::updateAll(['viewed' => 1], 'viewed = 0');
        }
        return parent::afterAction($action, $result);
    }
}
