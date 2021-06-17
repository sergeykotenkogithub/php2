<?php
//................Псевдонимы................

use app\models\{Basket, Feedback, Gallery, Headline, Order, Product, User};
use app\models\example\Product as ExampleProduct; // Просто тестовый
use app\engine\Db;
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

$db = new Db(); // База данных

$basket = new Basket($db ); // Корзина
$feedback = new Feedback($db ); // Отзывы
$gallery = new Gallery($db ); // Галлерея
$news = new Headline($db); // Новости
$order = new Order($db ); // Заказы
$product = new Product($db ); // Товары
$user = new User($db ); // Пользователи



// 3 Задание:

$taskProductOne = new One();
$taskProductDigital = new Digital();
$taskProductWeight = new Weight();


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