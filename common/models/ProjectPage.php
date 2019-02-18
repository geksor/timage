<?php

namespace common\models;

use yii\base\Model;

/**
 * Class ProjectPage
 * @package backend\models
 *
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $menuTitle
 */
class ProjectPage extends Model
{
    public $title;
    public $meta_title;
    public $meta_description;
    public $menuTitle;

    public function rules()
    {
        return [
            [
                [
                    'title',
                    'meta_title',
                    'meta_description',
                    'menuTitle',
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
            'meta_title' => 'Meta-title',
            'meta_description' => 'Meta-description',
            'menuTitle' => 'Заголовок в меню',
        ];
    }

    public function save($request){
        if ($request){
            $tempParams = json_encode($request);
        }else{
            $tempParams = '{}';
        }
        $setPath = dirname(dirname(__DIR__)).'/common/config/json_params/project-page.json';
        if (file_put_contents($setPath , $tempParams)){
            return true;
        }
        return false;
    }
}