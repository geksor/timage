<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "callback".
 *
 * @property int $id
 * @property int $created_at
 * @property int $done_at
 * @property int $viewed
 * @property string $name
 * @property string $phone
 * @property int $type
 */
class Callback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'done_at', 'viewed', 'type'], 'integer'],
            [['name', 'phone'], 'string'],
            [['name', 'phone'], 'required', 'message' => 'Обязательное поле'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'done_at' => 'Done At',
            'viewed' => 'Viewed',
            'name' => 'Name',
            'phone' => 'Phone',
            'type' => 'Type',
        ];
    }
}
