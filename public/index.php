<?php
//................Псевдонимы................

use app\models\{Basket, Feedback, Gallery, Headline, Order, Product, User};
use app\models\example\Product as ExampleProduct;
use app\engine\Db;
use app\interfaces\IModel;

//..........Абсолютный путь для работы в Windows и Linux(nginx).........

define( 'ROOT', str_replace( "\\", "/", realpath( dirname( __DIR__ ) ) ) );

//................Автозагрузка и Db...............

include ROOT . "/engine/Autoload.php";
spl_autoload_register( [new engine\Autoload(), 'loadClass']);

//....................Тест....................

$productExample = new ExampleProduct(); // Для теста, чтоб узнать работает ли в других папках

//.................Классы модели...............

$basket = new Basket(new Db()); // Корзина
$feedback = new Feedback(new Db()); // Отзывы
$gallery = new Gallery(new Db()); // Галлерея
$news = new Headline(new Db()); // Новости
$order = new Order(new Db()); // Заказы
$product = new Product(new Db()); // Товары
$user = new User(new Db()); // Пользователи

$db = new Db(); // База данных

//.....................Проверка................

function getModel(IModel $model, $id) {
    $model->getOne($id);
    echo "<br>";
    $model->getAll();
    echo "<br>";
    echo "...........................................................................";
    echo "<br>";
}

getModel($basket, 5);
getModel($feedback, 15);
getModel($gallery, 1);
getModel($news, 2);
getModel($order, 18);
getModel($product, 8);
getModel($user, 3);