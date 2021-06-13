<?php
//................Псевдонимы................

use app\models\{Basket, Feedback, Gallery, Headline, Order, Product, User};
use app\models\example\Product as ExampleProduct;
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

// ТЗ

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

$one = $taskProductOne->ThisPrice();
$digital = $taskProductDigital->ThisPrice();
$weightParams = 1200;
$weight = $taskProductWeight->ThisPrice($weightParams);

echo "<br>";
echo "У штучного товара цена: {$one} рублей при количестве 1 штуки";
echo "<br>";
echo "У цифрового товара цена: {$digital} рублей при количестве 1 штуки";
echo "<br>";
echo "У весого товара цена: {$weight} рублей за {$weightParams} грамм";
echo "<br>";
echo "<br>";

//...........Проверка общей стримости..................

//// Штучный
//echo ".........Штучный................";
//echo "<br>";
//echo "После первого вызова " . $taskProductOne::$total;
//echo "<br>";
//echo "Второй вызов " . $taskProductOne->ThisPrice();
//echo "<br>";
//echo "Третий вызов " . $taskProductOne->ThisPrice();
//echo "<br>";
//echo "Общая стоимость:" . $taskProductOne::$total;
//echo "<br>";
//echo "<br>";
//
//// Цифровой
//echo ".........Цифровой................";
//echo "<br>";
//echo "После первого вызова " . $taskProductDigital::$total;
//echo "<br>";
//echo "Второй вызов " . $taskProductDigital->ThisPrice();
//echo "<br>";
//echo "Третий вызов " . $taskProductDigital->ThisPrice();
//echo "<br>";
//echo "Четвёртый вызов " . $taskProductDigital->ThisPrice();
//echo "<br>";
//echo "Общая стоимость:" .  $taskProductDigital::$total;
//echo "<br>";
//echo "<br>";
//
//// Весовой
//echo ".........Весовой................";
//echo "<br>";
//echo "После первого вызова " . $taskProductWeight::$total;
//echo "<br>";
//echo "Второй вызов " . $taskProductWeight->ThisPrice(1900);
//echo "<br>";
//echo "Вызов со скидкой " . $taskProductWeight->ThisPrice(51000);
//echo "<br>";
//echo "Общая стоимость: " . $taskProductWeight::$total;
//echo "<br>";
//echo "<br>";
//echo ".........Общая стоимость................";
//echo "<br>";
//// Общая стоимость выручки
//$result = $taskProductOne::$total + $taskProductDigital::$total + $taskProductWeight::$total;
//echo "Общая стоимость: {$taskProductOne::$total}(Штучный) + {$taskProductDigital::$total}(Цифровой) + {$taskProductWeight::$total}(Весовой) = {$result} рублей";
