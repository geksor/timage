<?php

namespace common\models;

use yii\base\Model;

/**
 * Class Contact
 * @package backend\models
 *
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $menuTitle
 *
 * @property string $email
 * @property string $phone_1
 * @property string $phone_2
 * @property string $phone_3
 * @property string $address_1
 * @property string $address_2
 * @property string $address_3
 * @property string $mapScript
 *
 *
 * @property string $company_name
 * @property string $corpAddress
 * @property string $inn
 * @property string $kpp
 * @property string $ogrn
 *
 * @property int $chatId
 */
class Contact extends Model
{
    public $title;
    public $meta_title;
    public $meta_description;
    public $menuTitle;

    public $email;
    public $phone_1;
    public $phone_2;
    public $phone_3;
    public $address_1;
    public $address_2;
    public $address_3;
    public $mapScript;

    public $company_name;
    public $corpAddress;
    public $inn;
    public $kpp;
    public $ogrn;

    public $chatId;

    public function rules()
    {
        return [
            [
                [
                    'title',
                    'meta_title',
                    'meta_description',
                    'menuTitle',

                    'email',
                    'phone_1',
                    'phone_2',
                    'phone_3',
                    'address_1',
                    'address_2',
                    'address_3',
                    'mapScript',

                    'company_name',
                    'corpAddress',
                    'inn',
                    'kpp',
                    'ogrn',

                    'chatId',
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

            'email' => 'E-mail',
            'phone_1' => 'Телефон-1',
            'phone_2' => 'Телефон-2',
            'phone_3' => 'Телефон-3',
            'address_1' => 'Адрес-1',
            'address_2' => 'Адрес-2',
            'address_3' => 'Адрес-3',
            'mapScript' => 'Код карты',

            'company_name' => 'Название фирмы',
            'corpAddress' => 'Юридический адрес',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'ogrn' => 'ОГРН',

            'chatId' => 'ID чата',
        ];
    }

    public function save($request){
        if ($request){
            $tempParams = json_encode($request);
        }else{
            $tempParams = '{}';
        }
        $setPath = dirname(dirname(__DIR__)).'/common/config/json_params/contact.json';
        if (file_put_contents($setPath , $tempParams)){
            return true;
        };
        return false;
    }
}