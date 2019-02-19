<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "callback".
 *
 * type 1 - sale
 *
 * type 2 - consult
 *
 * prop first_name - trap from bot
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
    public $first_name;
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
            [['first_name', 'name', 'phone'], 'string'],
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
            'created_at' => 'Дата создания',
            'done_at' => 'Дата изменения',
            'viewed' => 'Viewed',
            'name' => 'Name',
            'phone' => 'Phone',
            'type' => 'Type',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if ($this->created_at){

            $this->created_at =
                is_string($this->created_at)
                    ? strtotime($this->created_at)
                    : $this->created_at;
        }else{
            $this->created_at = time();
        }
        return parent::beforeSave($insert);
    }
}
