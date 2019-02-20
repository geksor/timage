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
                            ['label' => 'Разделы', 'icon' => 'phone-square', 'url' => ['/callback-section'], "active" => Yii::$app->controller->id === 'callback-section',],
                        ],
                    ],
                    [
                        'label' => 'Настройки сайта',
                        'icon' => 'cogs',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Домашняя страница', 'icon' => 'home', 'url' => ['/site/home-page']],
                            ['label' => 'Страница наши работы', 'icon' => 'product-hunt', 'url' => ['/site/project-page']],
                            ['label' => 'Страница партнеры', 'icon' => 'handshake-o', 'url' => ['/site/partners-page']],
                            ['label' => 'Контакты', 'icon' => 'address-card', 'url' => ['/site/contact']],
                            ['label' => 'О компании', 'icon' => 'info', 'url' => ['/site/about-page']],
                        ],
                    ],
                    [
                        'label' => 'Каталог',
                        'icon' => 'shopping-cart',
                        'url' => ['/catalog-sections'],
                        "active" => Yii::$app->controller->id === 'catalog-sections',
                    ],
                    [
                        'label' => 'Проэкты',
                        'icon' => 'product-hunt',
                        'url' => ['/project'],
                        "active" => Yii::$app->controller->id === 'project',
                    ],
                    [
                        'label' => 'Партнеры',
                        'icon' => 'handshake-o',
                        'url' => ['/partners'],
                        "active" => Yii::$app->controller->id === 'partners',
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
