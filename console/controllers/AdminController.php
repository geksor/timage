<?php
namespace console\controllers;

use common\models\User;
use yii\console\Controller;


class AdminController extends Controller
{
    public function actionCreate($password)
    {
        if ($password){
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@example.ru';
            $user->setPassword($password);
            $user->generateAuthKey();

            if ($user->save()){
                print 'success';
            }else{
                print 'save error';
            }
        }else{
            print 'need inter password';
        }
    }
}