<?php

namespace common\models;

use common\behaviors\ImgUploadBehavior;
use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property int $publish
 * @property int $rank
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'string'],
            [['publish', 'rank'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'image' => 'Изображение',
            'publish' => 'Публикация',
            'rank' => 'Порядок вывода',
        ];
    }

    public function behaviors()
    {
        return [
            'ImgUploadBehavior' => [
                'class' => ImgUploadBehavior::className(),
                'noImage' => 'no_image.png',
                'folder' => '/uploads/images/partners',
                'propImage' => 'image',
            ],

        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!$this->rank){
            $this->rank = 100;
        }
        return parent::beforeSave($insert);
    }
}
