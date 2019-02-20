<?php

namespace frontend\controllers;

use backend\actions\SetImage;
use Yii;
use common\models\CatalogSections;
use common\models\CatalogSectionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use zxbodya\yii2\galleryManager\GalleryManagerAction;

/**
 * CatalogController
 */
class CatalogController extends Controller
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
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays a single CatalogSections model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($alias)
    {
        return $this->render('view', [
            'model' => $this->findModel($alias),
        ]);
    }

    /**
     * Finds the CatalogSections model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatalogSections the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($alias)
    {
        if (($model = CatalogSections::findOne(['alias' => $alias])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не обнаружена.');
    }

}
