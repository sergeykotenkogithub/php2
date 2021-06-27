<?php

//password_hash("123", PASSWORD_DEFAULT);
//password_verify("123", 'тут хэш');

//................Старт сессии................

session_start();

//................Псевдонимы................

use app\models\{Basket, Feedback, Gallery, Headline, Order, Product, User};
use app\engine\Render;
use app\engine\TwigRender;
use app\engine\Autoload;

//.....Конфигурационый файл.....................

include dirname( __DIR__ ) . "/config/config.php";

//................Автозагрузка и Db...............

include ROOT . "/engine/Autoload.php";
include ROOT . '/vendor/autoload.php'; // Twig Автозагрузка
spl_autoload_register( [new Autoload(), 'loadClass']);

//................ЧПУ.............................

// 1 - имя контролера(страницы к примеру Каталог), 2 - action, который у нас на 'a' был

$url = explode('/', $_SERVER['REQUEST_URI']);
$controllerName = $url[1] ?: 'product'; // ?: - краткий if
$actionName = $url[2];

//..................Роутер.........................


$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render()); // - свой рендер
//    $controller = new $controllerClass(new TwigRender()) ; // - twig render
    $controller->runAction($actionName);
} else {
    echo "404";
}

//.........................Проверка............................................................

//.................Классы модели...............

$basket = new Basket( ); // Корзина
$feedback = new Feedback( ); // Отзывы
$gallery = new Gallery( ); // Галлерея
$news = new Headline( ); // Новости
$order = new Order( ); // Заказы
$product = new Product( ); // Товары
$user = new User(); // Пользователи


//..................Для того чтобы PhpStorm распознавал................

/** @var Product $product */
/** @var Headline $news */
/** @var Basket $basket */


//.....................Проверка Insert................

//$product = new Product('Ананас','Белый', 25500, 'apple.jpg');
//$product->insert();
//
//$news = new Headline('592sa','sqqqw');
//$news->insert();

//........... Проверка Update....................

//$product = Product::getOne(42);
//$product->price = 25;
//$product->name = "Сок";
//$product->save();

//$product = Product::getOne(42);
//$product->price = 1500;
//$product->name = "Кофе";
//$product->save();

//........... Проверка Delete....................

//$news = Headline::getOne(70);
//$news->delete();

//............Проверка Select...................

//var_dump($news = Headline::getOne(2));
//var_dump($news->getAll());
//var_dump(Headline::getAll());
