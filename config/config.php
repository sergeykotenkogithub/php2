<?php

use \app\engine\Db;
use \app\engine\Request;
use \app\engine\Session;
use \app\engine\Cookie;
use \app\models\repositories\BasketRepository;
use \app\models\repositories\FeedbackRepository;
use \app\models\repositories\OrderRepository;
use \app\models\repositories\ProductRepository;
use \app\models\repositories\RegistrationRepository;
use \app\models\repositories\UserRepository;

return [
    'root' => dirname(__DIR__), // Абсолютный путь для работы в Windows и Linux(nginx)
    'controller_namespace' => "app\\controllers\\", // Для читаемого отображения
    'product_per_page' => 2,
    'views_dir' => dirname(__DIR__) . '/views/',
    'backHttp' => $_SERVER['HTTP_REFERER'], // для того чтобы на предыдущую страницу попасть
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost:3307',
            'login' => 'pakko',
            'password' => '123',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'feedbackRepository' => [
            'class' => FeedbackRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'registrationRepository' => [
            'class' => RegistrationRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'session' => [
            'class' => Session::class
        ],
        'cookie' => [
            'class' => Cookie::class
        ]
    ]
];