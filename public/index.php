<?php
//................Псевдонимы................

use app\models\{Basket, Feedback, Gallery, Headline, Order, Product, User};
use app\models\example\Product as ExampleProduct; // Просто тестовый
use app\interfaces\IModel;
use app\models\task\{One, Digital, Weight};

//.....Конфигурационый файл.....................

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
//$news = new Headline( ); // Новости
$order = new Order( ); // Заказы
$product = new Product( ); // Товары
$user = new User(); // Пользователи


//..................Для того чтобы PhpStorm распознавал................

/** @var Product $product */
/** @var Headline $news */

//.....................Проверка................

//
//$product = new Product('Xfs','sqqqw', 620, '1.jpg');
//$product->insert();
//$news = new Headline('Xfs','sqqqw');
//$news->insert();


//var_dump($product);

// Update

$news = Headline::getOne(65);
$news->setTitle('2a');
$news->setText('a2');
//$news->title = 'ssqq';
$news->update();

//$product = Headline::getOne(15);
//$product->price = 22225;
//$product->update();






//.................Задание.......................

// Сделать update