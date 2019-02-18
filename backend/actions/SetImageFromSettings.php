<?php
/**
 * Created by PhpStorm.
 * User: Geksor
 * Date: 17.11.2018
 * Time: 20:42
 */

namespace backend\actions;


use common\models\ImageUpload;
use Yii;
use yii\base\Action;
use yii\web\UploadedFile;

/**
 * Class SetImage
 * @package backend\actions
 *
 * @property string $folder
 * @property string $propImage
 * @property string $title
 * @property object $fromModel
 * @property string $backLink
 * @property string $width
 * @property string $height
 * @property string $minWidth
 * @property string $minHeight
 * @property string $maxWidth
 * @property string $maxHeight
 */

class SetImageFromSettings extends Action
{
    public $folder;
    public $propImage;
    public $title;
    public $fromModel;
    public $backLink;
    public $width;
    public $height;
    public $minWidth;
    public $minHeight;
    public $maxWidth;
    public $maxHeight;


    public function run()
    {
        $model = new ImageUpload();
        $imageFrom = $this->fromModel;
        $imageFrom->load(Yii::$app->params);


        if (Yii::$app->request->isPost && Yii::$app->request->post('ImageUpload')['crop_info'])
        {
            $file = UploadedFile::getInstance($model, 'image');
            $cropInfo = Yii::$app->request->post('ImageUpload')['crop_info'];
            $image = $this->propImage;

            if ($imageFrom->saveImage($model->uploadFile($file, $imageFrom->$image, $cropInfo, $this->folder), $image, $imageFrom))
            {
                Yii::$app->session->setFlash('success', 'Операция выполнена успешно');
                return $this->controller->redirect([$this->backLink]);
            }
        }

        return $this->controller->render('@backend/actions/views/set-photo', [
            'model' => $model,
            'imageFrom' => $imageFrom,
            'title' => $this->title,
            'width' => $this->width,
            'height' => $this->height,
            'minWidth' => $this->minWidth,
            'minHeight' => $this->minHeight,
            'maxWidth' => $this->maxWidth,
            'maxHeight' => $this->maxHeight,
        ]);
    }
}