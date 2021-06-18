<?php
//................Псевдонимы................

use app\models\{Basket, Feedback, Gallery, Headline, Order, Product, User};
use app\models\example\Product as ExampleProduct; // Просто тестовый
use app\engine\Db;
use app\interfaces\IModel;
use app\models\task\{One, Digital, Weight};

//..........Абсолютный путь для работы в Windows и Linux(nginx).........

define( 'ROOT', str_replace( "\\", "/", realpath( dirname( __DIR__ ) ) ) );

//................Автозагрузка и Db...............

include ROOT . "/engine/Autoload.php";
spl_autoload_register( [new app\engine\Autoload(), 'loadClass']);

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

//.................................Task.......................................

echo "<br>";
echo ".........................3 Задание..........................................";
echo "<br>";
echo "<br>";
echo "Изначальная цена:58. Указана в классе Product";
echo "<br>";
echo "<br>";

//.......................Штучный......................................

echo ".........Штучный................";
echo "<br>";
$quantity = 1;
$one = $taskProductOne->ThisPrice($quantity);
echo "<br>";
echo "У штучного товара цена: {$one} рублей при количестве {$quantity} штуки";
echo "<br>";
$quantity = 2;
$one = $taskProductOne->ThisPrice($quantity);
echo "У штучного товара цена: {$one} рублей при количестве {$quantity} штуки";
echo "<br>";
$quantity = 3;
$one = $taskProductOne->ThisPrice($quantity);
echo "У штучного товара цена: {$one} рублей при количестве {$quantity} штуки";
echo "<br>";
echo "У штучного товара общая стоимость:  {$taskProductOne::$total} рублей";
echo "<br>";
echo "<br>";

//.......................Цифровой......................................

echo ".........Цифровой................";
echo "<br>";
echo "<br>";
$quantity = 1;
$digital = $taskProductDigital->ThisPrice($quantity);
echo "У цифрового товара цена: {$digital} рублей при количестве {$quantity} штуки";
echo "<br>";
$quantity = 12;
$digital = $taskProductDigital->ThisPrice($quantity);
echo "У цифрового товара цена: {$digital} рублей при количестве {$quantity} штуки";
echo "<br>";
echo "У цифрового товара общая стоимость:  {$taskProductDigital::$total} рублей";
echo "<br>";
echo "<br>";

//.......................Весовой......................................

echo ".........Весовой................";
echo "<br>";
echo "<br>";
echo "Скидка предоставляется свыше 50000 грамм";
echo "<br>";
echo "<br>";
$weightParams = 1000;
$weight = $taskProductWeight->ThisPrice($weightParams);
echo "У весового товара цена: {$weight} рублей за {$weightParams} грамм";
echo "<br>";
$weightParams = 1900;
$weight = $taskProductWeight->ThisPrice($weightParams);
echo "У весового товара цена: {$weight} рублей за {$weightParams} грамм";
echo "<br>";
$weightParams = 51000;
$weight = $taskProductWeight->ThisPrice($weightParams);
echo "У весового товара цена со скидкой: {$weight} рублей за {$weightParams} грамм. ";
echo "Ваша скидка {$taskProductWeight::$totalDiscount} рублей";
echo "<br>";
$weightParams = 75000;
$weight = $taskProductWeight->ThisPrice($weightParams);
echo "У весового товара цена со скидкой: {$weight} рублей за {$weightParams} грамм. ";
echo "Ваша скидка {$taskProductWeight::$totalDiscount} рублей";
echo "<br>";
echo "У весового товара общая стоимость:  {$taskProductWeight::$total} рублей";
echo "<br>";
echo "<br>";
echo "<br>";

//...........Проверка общей стримости..................

echo ".........Общая стоимость................";
echo "<br>";
echo "<br>";
// Общая стоимость выручки
$result = $taskProductOne::$total + $taskProductDigital::$total + $taskProductWeight::$total;
echo "{$taskProductOne::$total}(Штучный) + {$taskProductDigital::$total}(Цифровой) + {$taskProductWeight::$total}(Весовой) = {$result} рублей";