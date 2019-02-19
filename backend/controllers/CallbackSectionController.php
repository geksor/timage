<?php

namespace backend\controllers;

use Yii;
use common\models\CallbackSection;
use common\models\CallbackSectionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CallbackSectionController implements the CRUD actions for CallbackSection model.
 */
class CallbackSectionController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CallbackSection models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CallbackSectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CallbackSection model.
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
     * Finds the CallbackSection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CallbackSection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CallbackSection::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
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
            CallbackSection::updateAll(['viewed' => 1], 'viewed = 0');
        }
        return parent::afterAction($action, $result);
    }
}
