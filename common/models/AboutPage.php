<?php

namespace common\models;

use common\behaviors\ImgUploadBehavior;
use yii\base\Model;

/**
 * Class AboutPage
 * @package backend\models
 *
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $menuTitle
 * @property string $text
 * @property string $image
 */
class AboutPage extends Model
{
    public $title;
    public $meta_title;
    public $meta_description;
    public $menuTitle;
    public $text;
    public $image;

    public function rules()
    {
        return [
            [
                [
                    'title',
                    'meta_title',
                    'meta_description',
                    'menuTitle',
                    'text',
                    'image',
                ],
                'safe'
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'ImgUploadBehavior' => [
                'class' => ImgUploadBehavior::className(),
                'noImage' => 'no_image.png',
                'folder' => '/uploads/images/pages_img',
                'propImage' => 'image',
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок страницы',
            'meta_title' => 'Meta-title',
            'meta_description' => 'Meta-description',
            'menuTitle' => 'Заголовок в меню',
            'text' => 'Текст о нас',
            'image' => 'Изображение',
        ];
    }

    public function save($request){
        if ($request){
            $tempParams = json_encode($request);
        }else{
            $tempParams = '{}';
        }
        $setPath = dirname(dirname(__DIR__)).'/common/config/json_params/about-page.json';
        if (file_put_contents($setPath , $tempParams)){
            return true;
        };
        return false;
    }
}