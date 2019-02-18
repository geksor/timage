<?php

namespace common\models;

use common\behaviors\ImgUploadBehavior;
use yii\base\Model;

/**
 * Class HomePage
 * @package backend\models
 *
 * @property string $title
 * @property string $logoText
 * @property string $headerMainText
 * @property string $meta_title
 * @property string $meta_description
 *
 * @property string $banner_firstTitle
 * @property string $banner_secondTitle
 *
 * @property string $FFB_title
 * @property string $FFB_text
 * @property string $FFB_image
 *
 * @property string $FSB_title
 * @property string $FSB_text
 * @property string $FSB_image
 */
class HomePage extends Model
{
    public $title;
    public $logoText;
    public $headerMainText;
    public $meta_title;
    public $meta_description;

    public $banner_firstTitle;
    public $banner_secondTitle;

    public $FFB_title;
    public $FFB_text;
    public $FFB_image;

    public $FSB_title;
    public $FSB_text;
    public $FSB_image;

    public function rules()
    {
        return [
            [
                [
                    'title',
                    'logoText',
                    'headerMainText',
                    'meta_title',
                    'meta_description',

                    'banner_firstTitle',
                    'banner_secondTitle',

                    'FFB_title',
                    'FFB_text',
                    'FFB_image',

                    'FSB_title',
                    'FSB_text',
                    'FSB_image',
                ],
                'safe'
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
            'logoText' => 'Текст заголовка',
            'meta_title' => 'Meta-title',
            'meta_description' => 'Meta-description',

            'banner_firstTitle' => 'Заголово банера',
            'banner_secondTitle' => 'Текст под заголовком',

            'FFB_title' => 'Заголовок',
            'FFB_text' => 'Текст',
            'FFB_image' => 'Изображение',

            'FSB_title' => 'Заголовок',
            'FSB_text' => 'Текст',
            'FSB_image' => 'Изображение',
        ];
    }

    public function behaviors()
    {
        return [
            'ImgUploadBehavior' => [
                'class' => ImgUploadBehavior::className(),
                'noImage' => 'no_image.png',
                'folder' => '/uploads/images/pages_img',
                'propImage' => 'FFB_image'
            ],

        ];
    }


    public function save($request){
        if ($request){
            $tempParams = json_encode($request);
        }else{
            $tempParams = '{}';
        }
        $setPath = dirname(dirname(__DIR__)).'/common/config/json_params/home-page.json';
        if (file_put_contents($setPath , $tempParams)){
            return true;
        }
        return false;
    }
}