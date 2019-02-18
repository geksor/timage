<?php

namespace backend\controllers;

use backend\actions\SetImage;
use Yii;
use common\models\CatalogSections;
use common\models\CatalogSectionsSearch;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use zxbodya\yii2\galleryManager\GalleryManagerAction;

/**
 * CatalogSectionsController implements the CRUD actions for CatalogSections model.
 */
class CatalogSectionsController extends Controller
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
            'galleryApi' => [
                'class' => GalleryManagerAction::className(),
                // mappings between type names and model classes (should be the same as in behaviour)
                'types' => [
                    'section' => CatalogSections::className(),
                ]
            ],
            'set-main-image' => [
                'class' => SetImage::className(),
                'folder' => 'section_images',
                'propImage' => 'main_image',
                'title' => 'Основное изображение',
                'width' => 540,
                'height' => 490,
            ],
            'set-second-image-1' => [
                'class' => SetImage::className(),
                'folder' => 'section_images',
                'propImage' => 'second_image_1',
                'title' => 'Дополнительное изображение',
                'width' => 255,
                'height' => 176,
            ],
            'set-second-image-2' => [
                'class' => SetImage::className(),
                'folder' => 'section_images',
                'propImage' => 'second_image_2',
                'title' => 'Дополнительное изображение',
                'width' => 255,
                'height' => 176,
            ],
        ];
    }

    /**
     * Lists all CatalogSections models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatalogSectionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatalogSections model.
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
     * Creates a new CatalogSections model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatalogSections();
        $model->show_on_home = 0;

        $disableItems = [];

        $one = 0;
        $two = 0;
        $three = 0;
        $showSelect = true;

        if (CatalogSections::find()->where(['show_on_home' => 1])->one()){
            $disableItems[] = 1;
            $one = 1;
        }
        if (CatalogSections::find()->where(['show_on_home' => 2])->one()){
            $disableItems[] = 2;
            $two = 1;
        }
        if (CatalogSections::find()->where(['show_on_home' => 3])->one()){
            $disableItems[] = 3;
            $three = 1;
        }

        if ($one && $two && $three && ! $model->show_on_home){
            $showSelect = false;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Успешно');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'disableItems' => $disableItems,
            'showSelect' => $showSelect,
        ]);
    }

    /**
     * Updates an existing CatalogSections model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $disableItems = [];

        $one = 0;
        $two = 0;
        $three = 0;
        $showSelect = true;

        if (CatalogSections::find()->where(['show_on_home' => 1])->one()){
            if ($model->show_on_home !== 1){
                $disableItems[] = 1;
            }
            $one = 1;
        }
        if (CatalogSections::find()->where(['show_on_home' => 2])->one()){
            if ($model->show_on_home !== 2){
                $disableItems[] = 2;
            }
            $two = 1;
        }
        if (CatalogSections::find()->where(['show_on_home' => 3])->one()){
            if ($model->show_on_home !== 3){
                $disableItems[] = 3;
            }
            $three = 1;
        }

        if ($one && $two && $three && !$model->show_on_home){
            $showSelect = false;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Успешно');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'disableItems' => $disableItems,
            'showSelect' => $showSelect,
        ]);
    }

    /**
     * Deletes an existing CatalogSections model.
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
     * Finds the CatalogSections model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatalogSections the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = CatalogSections::findOne($id)) !== null) {
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
