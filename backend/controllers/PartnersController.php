<?php

namespace backend\controllers;

use backend\actions\SetImage;
use Yii;
use common\models\Partners;
use common\models\PartnersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PartnersController implements the CRUD actions for Partners model.
 */
class PartnersController extends Controller
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
     * @return array
     */
    public function actions()
    {
        return [
            'set-image' => [
                'class' => SetImage::className(),
                'folder' => 'partners',
                'propImage' => 'image',
                'title' => 'Изображение партнера',
                'width' => 160,
                'height' => 160,
                'maxWidth' => 255,
                'maxHeight' => 160,
                'minWidth' => 160,
                'minHeight' => 160,
            ],
        ];
    }

    /**
     * Lists all Partners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PartnersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Partners model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Partners model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Partners();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Partners model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Partners model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Partners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Partners the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Partners::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не обнаружена.');
    }

    /**
     * @param $id
     * @param $publish
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionPublish($id, $publish)
    {
        if (Yii::$app->request->isAjax && $id){

            $model = $this->findModel($id);

            $model->publish = (integer) $publish;

            if ($model->save()){
                return 'success';
            }

            Yii::$app->session->setFlash('error', 'Что то пошло не так');
            return $this->redirect(Yii::$app->request->referrer);

        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @param $id
     * @param $rank
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionRank($id, $rank)
    {
        if (Yii::$app->request->isAjax && $id){

            $model = $this->findModel($id);

            if ($model){

                if ($model->rank === (integer)$rank){
                    return 'no_change';
                }

                $model->rank = (integer) $rank;

                if ($model->save()){
                    return 'success';
                }

                Yii::$app->session->setFlash('error', 'Что то пошло не так');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
}
