<?php
//................Псевдонимы................

use app\models\{Basket, Feedback, Gallery, Headline, Order, Product, User};
use app\models\example\Product as ExampleProduct; // Просто тестовый
use app\interfaces\IModel;
use app\models\task\{One, Digital, Weight};

//.....Конфигурационый файл

include dirname( __DIR__ ) . "/config/config.php";

//................Автозагрузка и Db...............

include ROOT . "/engine/Autoload.php";
spl_autoload_register( [new app\engine\Autoload(), 'loadClass']);

//....................Тест....................

$productExample = new ExampleProduct(); // Для теста, чтоб узнать работает ли в других папках

//.................Классы модели...............

$basket = new Basket( ); // Корзина
$feedback = new Feedback( ); // Отзывы
$gallery = new Gallery( ); // Галлерея
$news = new Headline( ); // Новости
$order = new Order( ); // Заказы
$product = new Product( ); // Товары
$user = new User(); // Пользователи

//.....................Проверка................

//$pd = $product->getOne(1);

$product = new Product("Книга", "Грокаем алгоритмы", 500000);
$product->insert();

var_dump($product->insert());

var_dump($product);

//$product = $user->getOne(5);
//var_dump($product->getOne('1'));
//var_dump($product);

// Сделать чтобы $user->getOne(5) вернул объект с данными
