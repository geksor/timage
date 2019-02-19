<aside class="main-sidebar">

    <section class="sidebar">


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню админпанели', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Обратная связь',
                        'icon' => 'reply',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Общая',
                                'icon' => 'phone-square',
                                'url' => ['/callback'],
                                "active" => Yii::$app->controller->id === 'callback',
                            ],
                            ['label' => 'Разделы', 'icon' => 'comments', 'url' => ['/callback-section'], "active" => Yii::$app->controller->id === 'callback-section',],
                        ],
                    ],
                    [
                        'label' => 'Настройки сайта',
                        'icon' => 'cogs',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Домашняя страница', 'icon' => 'address-card', 'url' => ['/site/home-page']],
                            ['label' => 'Страница наши работы', 'icon' => 'address-card', 'url' => ['/site/project-page']],
                            ['label' => 'Страница партнеры', 'icon' => 'address-card', 'url' => ['/site/partners-page']],
                            ['label' => 'Контакты', 'icon' => 'address-card', 'url' => ['/site/contact']],
                            ['label' => 'О компании', 'icon' => 'info', 'url' => ['/site/about-page']],
                        ],
                    ],
                    [
                        'label' => 'Каталог',
                        'icon' => 'shopping-basket',
                        'url' => ['/catalog-sections'],
                        "active" => Yii::$app->controller->id === 'catalog-sections',
                    ],
                    [
                        'label' => 'Проэкты',
                        'icon' => 'shopping-basket',
                        'url' => ['/project'],
                        "active" => Yii::$app->controller->id === 'project',
                    ],
                    [
                        'label' => 'Партнеры',
                        'icon' => 'shopping-basket',
                        'url' => ['/partners'],
                        "active" => Yii::$app->controller->id === 'partners',
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
