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

//..................Роутер.........................

$controllerName = $_GET['c'] ?: 'product'; // ?: - краткий if
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "404";
}

//............................................................................//
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


//..................Для того чтобы PhpStorm распознавал................

/** @var Product $product */
/** @var Headline $news */
/** @var Basket $basket */


//.....................Проверка Insert................


//$product = new Product('Xfs','sqqqw', 500, '1.jpg');
//$product->insert();
//
//$news = new Headline('592sa','sqqqw');
//$news->insert();

//........... Проверка Update....................

//$news = Headline::getOne(71);
//$news->setTitle('2s');
//$news->setText('2sdWWW');
//$news->update();


//$news = Headline::getOne(65);
//$news->setText('tTTaa Text');
//$news->update();


//$product = Product::getOne(15);
//$product->setName('Name');
//$product->update();

//........... Проверка Delete....................

//$news = Headline::getOne(70);
//$news->delete();

//............Проверка Select...................

//var_dump($news = Headline::getOne(2));
//var_dump($news->getAll());
//var_dump(Headline::getAll());
