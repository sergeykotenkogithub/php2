<?php
//................Псевдонимы................

use app\models\{Basket, Feedback, Gallery, Headline, Order, Product, User};
use app\models\example\Product as ExampleProduct;

//..........Абсолютный путь для работы в Windows и Linux(nginx).........

define( 'ROOT', str_replace( "\\", "/", realpath( dirname( __DIR__ ) ) ) );

//................Автозагрузка...............

include ROOT . "/engine/Autoload.php";
spl_autoload_register( [new autoload\Autoload(), 'loadClass']);

//....................Тест....................

$productExample = new ExampleProduct(); // Для теста, чтоб узнать работает ли в других папках

//.................Классы модели...............

$basket = new Basket(); // Корзина
$feedback = new Feedback(); // Отзывы
$gallery = new Gallery(); // Галлерея
$news = new Headline(); // Новости
$order = new Order(); // Заказы
$product = new Product(); // Товары
$user = new User(); // Пользователи

//.....................Проверка................

var_dump($productExample);
var_dump($basket);
var_dump($feedback);
var_dump($gallery);
var_dump($news);
var_dump($order);
var_dump($product);
var_dump($user);
