<?php

use yii\helpers\FileHelper;

/**
 * @param string $fileName
 * @return string
 * @throws \yii\base\Exception
 */
function jsonFile($fileName){
    $dir = __DIR__. '/json_params/';
    $file = $dir.$fileName.'.json';
    if (!is_dir($dir)){
        FileHelper::createDirectory($dir);
    }

    if (!is_file($file)){
        file_put_contents($file, '{}');
    }
    return json_decode(file_get_contents($file), true);
}

$contact = jsonFile('contact');

$projectPage = jsonFile('project-page');

$partnersPage = jsonFile('partners-page');

$aboutPage = jsonFile('about-page');

$homePage = jsonFile('home-page');

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'Contact' => $contact,
    'ProjectPage' => $projectPage,
    'PartnersPage' => $partnersPage,
    'AboutPage' => $aboutPage,
    'HomePage' => $homePage,
];
