<?php

namespace common\models;

use Imagine\Image\ImageInterface;
use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $title
 * @property int $publish
 * @property int $rank
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'project',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@uploads') . '/images/project',
                'url' => '/uploads/images/project',
                'versions' => [
                    'preview' => function ($img) {
                        /** @var ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(255, 190));
                    },
                    'small' => function ($img) {
                        /** @var ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(490, 490));
                    },
                    'medium' => function ($img) {
                        /** @var ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 980;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
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
            'publish' => 'Публикация',
            'rank' => 'Порядок вывода',
        ];
    }


    public function beforeSave($insert)
    {
        if (!$this->rank){
            $this->rank = 100;
        }
        return parent::beforeSave($insert);
    }
}
