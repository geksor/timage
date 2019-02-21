<?
/* @var $projectPage \common\models\ProjectPage
 * @var $partnersPage \common\models\PartnersPage
 * @var $aboutPage \common\models\AboutPage
 * @var $contact \common\models\Contact
 * @var $models \common\models\CatalogSections
 */

$dropDownItems = '';

foreach ($models as $model){
    /* @var $model \common\models\CatalogSections */
    $dropDownItems .= "<a class='dropdown-item header__navigation-item-dropdown' href='/catalog/$model->alias'>$model->title</a>";
}

?>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <?= \yii\widgets\Menu::widget([
        'items' => [
            ['label' => 'Главная', 'url' => [ '/' ]],
            [
                'label' => 'Каталог продукции',
                'options' => ['class' => 'nav-item dropdown'],
                'template' => '<a class="nav-link dropdown-toggle header__navigation-item" href="#" id="navbarDropdown"
                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">{label}</a>
                                               <div class="dropdown-menu">'.
                                                    $dropDownItems
                                               .'</div>',
            ],
            ['label' => $projectPage->menuTitle, 'url' => [ '/site/projects' ]],
            ['label' => $partnersPage->menuTitle, 'url' => [ '/site/partners' ]],
            ['label' => $aboutPage->menuTitle, 'url' => [ '/site/about' ]],
            ['label' => $contact->menuTitle, 'url' => [ '/site/contact' ]],
        ],
        'options' => [
            'class' => 'navbar-nav m-auto',
        ],
        'linkTemplate' => '<a class="nav-link header__navigation-item" href="{url}">{label}</a>',
        'itemOptions'=>['class'=>'nav-item'],
    ]) ?>

</div>
