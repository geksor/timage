<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "callback_section".
 *
 * prop first_name - trap from bot
 *
 * @property int $id
 * @property int $created_at
 * @property int $done_at
 * @property int $viewed
 * @property string $name
 * @property string $phone
 * @property string $section_name
 * @property string $first_name
 */
class CallbackSection extends \yii\db\ActiveRecord
{
    public $first_name;
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
            [['name', 'phone'], 'required'],
            ['phone', 'match', 'pattern' => '/^([+]?[0-9\s-\(\)]{3,25})*$/i']
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
            'viewed' => 'Состояние',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'section_name' => 'Раздел',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param $setTo
     * @param string $email the target email address
     * @return bool whether the email was sent
     *
     */
    public function sendEmail($setTo)
    {
        $mailHead = 'Запрос информации:'.$this->section_name;
        $body = '<h1>'.$mailHead.'</h1>
                <p>
                    <a href="'. Yii::$app->request->hostInfo .'/admin/callback-section/view/'. $this->id .'">Ссылка на запрос</a>
                </p>
                <h2>Информация</h2>
                <p> Дата запроса: '.Yii::$app->formatter->asDate($this->created_at, 'long').'</p>
                <p> Время запроса: '.Yii::$app->formatter->asTime($this->created_at).'</p>
                <p> Раздел: '.$this->section_name.'</p>
                <p> Имя: '.$this->name.'</p>
                <p> Телефон: '.$this->phone . '</p>';

        return Yii::$app->mailer->compose()
            ->setTo($setTo)
            ->setFrom([Yii::$app->params['notificEmail'] => Yii::$app->name])
            ->setSubject($mailHead.': '. $this->name)
            ->setHtmlBody($body)
            ->send();
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
        if ($this->phone){
            $this->phone = preg_replace("/[^0-9]/", '', $this->phone);
        }
        return parent::beforeSave($insert);
    }
}
