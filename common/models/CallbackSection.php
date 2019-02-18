<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "callback_section".
 *
 * @property int $id
 * @property int $created_at
 * @property int $done_at
 * @property int $viewed
 * @property string $name
 * @property string $phone
 * @property string $section_name
 */
class CallbackSection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback_section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'done_at', 'viewed'], 'integer'],
            [['name', 'phone', 'section_name'], 'string'],
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
            'section_name' => 'Section Name',
        ];
    }
}
