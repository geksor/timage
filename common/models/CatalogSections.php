<?php

namespace common\models;

use common\behaviors\ImgUploadBehavior;
use Imagine\Image\ImageInterface;
use Yii;
use yii\helpers\Inflector;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "catalog_sections".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property string $short_desc
 * @property string $desc
 * @property string $main_image
 * @property string $second_image_1
 * @property string $second_image_2
 * @property string $alias
 * @property string $meta_title
 * @property string $meta_description
 * @property int $publish
 * @property int $rank
 * @property int $show_on_home
 */
class CatalogSections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog_sections';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'section',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@uploads') . '/images/sections',
                'url' => '/uploads/images/sections',
                'versions' => [
                    'preview' => function ($img) {
                        /** @var ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(255, 165));
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
            'ImgUploadBehavior' => [
                'class' => ImgUploadBehavior::className(),
                'noImage' => 'no_image.png',
                'folder' => '/uploads/images/section_images',
                'propImage' => 'main_image',
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'desc', 'main_image', 'second_image_1', 'second_image_2', 'alias', 'meta_title', 'meta_description'], 'string'],
            [['title'], 'required'],
            [['alias'], 'unique'],
            [['price', 'publish', 'rank', 'show_on_home'], 'integer'],
            [['short_desc'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'price' => 'Цена',
            'short_desc' => 'Короткое описание',
            'desc' => 'Описание',
            'main_image' => 'Основное изображение',
            'second_image_1' => 'Доп изображение 1',
            'second_image_2' => 'Доп изображение 2',
            'alias' => 'Имя в адресной строке',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'publish' => 'Публикация',
            'rank' => 'Порядок вывода',
            'show_on_home' => 'Показывать на главной',
        ];
    }

    /**
     * @return bool
     * For the Inflector to work, need an extension intl in php.ini
     */
    public function beforeValidate()
    {
        if (!$this->alias){
            $this->alias = $this->title;
        }

        $this->alias = Inflector::slug($this->alias);

        return parent::beforeValidate();
    }


    public function beforeSave($insert)
    {
        if (!$this->rank){
            $this->rank = 100;
        }
        return parent::beforeSave($insert);
    }
}
