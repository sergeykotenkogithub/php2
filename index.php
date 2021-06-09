<?php


/*
1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п. или любой другой области. Опишите свойства и методы, придумайте наследника, расширяющего функционал родителя. Приведите пример использования. ВАЖНОЕ.
*/

/*
Ответ:
   Goods -  это общее название товара.
   Cвойства: Имя, цена, название бренда, описание.
   Метод: Добавлении товара в корзину.
   Laptops - наследник Goods. Добавляется свойства: дисплей, модель, процессор, оперативная память, цвет и метод добавление в сравнении.
*/

//..................................Классы........................................................

// Товары
class Goods
{
    public $name;
    public $price;
    public $brand;
    public $description;

    public function __construct($name, $price, $brand)
    {
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
    }

    // Добавление в корзину
    public function addBasket()
    {
        echo "Товар {$this->name} добавлен в корзину <br>";
    }
}

// Ноутбуки, нетбуки
class Laptops extends Goods
{
    public $display;
    public $model;
    public $processor;
    public $memory;
    public $color;

    public function __construct($name, $price, $brand, $display, $model, $processor, $memory, $color)
    {
        parent::__construct($name, $price, $brand);
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
        $this->display = $display;
        $this->model = $model;
        $this->processor = $processor;
        $this->memory = $memory;
        $this->color = $color;
    }

    // Добавить в сравнении с другими ноутбуками, чтобы сравнить характеристики двух ноутбуков
    public function addToComparison()
    {
        echo "Товар {$this->name} {$this->brand}  {$this->model}  добавлен  в сравнении <br>";
    }

}

//..........................Вызов....................................................................

// Бумага

$paper = new Goods("Бумага", 110, "Buro");
$paper->description = "Бумага Buro A4/80г/м2/100л./ общего назначения(офисная)";
$paper->addBasket();

// Ноутбук

$laptop = new Laptops("Ноутбук", 525040, 17.3, "ACER", "ConceptD 9 Pro CN917-71P-98EN", "2.4 ГГц", "32768", "black");
$laptop->description = "Отличную производительность и бесперебойную работу ноутбука-трансформера ACER ConceptD 9 Pro CN917-71P-98EN обеспечивает 8-ми ядерный процессор Intel Core i9 9980HK";
$laptop->addBasket();
$laptop->addToComparison();

//...................................Проверка...............................................

var_dump($laptop);
var_dump($paper);

//...........................................................................................................

echo "==================================================================================== <br>";

//...................................Другой класс...............................................................

class Car
{
    public $name; // Название машины
    public $model; // Модель
    public $engine; // движок
    public $color; // цвет

    public function __construct($name, $model, $engine, $color)
    {
        $this->name = $name;
        $this->model = $model;
        $this->engine = $engine;
        $this->color = $color;
    }

    public function start()
    {
        echo "Двигатель объёмом {$this->engine} куб.см запустился <br>";
    }
}

class Сargo extends Car // Грузовая машина
{
    public $tonnage; // вместимость тон

    public function __construct($name, $model, $engine, $color, $tonnage)
    {
        parent::__construct($name, $model, $engine, $color);
        $this->tonnage = $tonnage;
    }

    public function ascent()
    {
        echo " {$this->name}  сможет погрузить {$this->tonnage} тонн ";
    }

}

$mersedes = new Car('mersedes', 'A 200', 1332, 'white');
$mersedes->start();
$ural = new Сargo('Урал-М', '4320-3171-80', 1332, 'white', 9.5);
$ural->ascent();


var_dump($mersedes);
var_dump($ural);


//........................................RPG...............................................

echo ".......................................RPG.........................................................................";

// Грут

class Human
{
    public $name;
    public $health;
    public $superattack;

    public function __construct($name = '', $health = 100, $superattack = 0)
    {
//        var_dump("Я родился! " . self::class);
        $this->name = $name;
        $this->health = $health;
        $this->superattack = $superattack;
//        echo "Я родился! " . self::class;
    }

    public function sayName()
    {
        echo "Я есть $this->name <br>";

    }

    public function health() {
        echo "У {$this->name}a осталось {$this->health} здоровья  <br>";
    }

    public function attack(Warrior $target) {
        $target->health -= $this->superattack;
        echo "$this->name наносит урон {$target->name}у на {$this->superattack} урона.<br>";
    }

    //echo "$human1->name з и наносит несколько ударов и суперудар <br>";

    public function supeAttack(Warrior $target) {
        $target->health -= $this->superattack;
        echo "$this->name заковывает врага {$target->name} и наносит урон на {$this->superattack} .<br>";
    }
}


// Воин

class Warrior extends Human {

    public $attack;
    public $superattack;

    public function __construct($name = '', $health = 100, $attack = 0, $superattack = 0)
    {
        parent::__construct($name, $health, $attack);
        $this->attack = $attack;
        $this->superattack = $superattack;
    }

    public function sayName()
    {
        parent::sayName();
        echo " и я Воин<br>";

    }

    public function attack(Human $target) {
        $target->health -= $this->attack;
        echo "Воин наносит урон {$target->name} на {$this->attack} урона.<br>";
    }

    public function superattack(Human $target) {
        $target->health -= $this->superattack;
        echo "$this->name наносит суперудар вихрем, урон {$target->name} на {$this->superattack} урона.<br>";
    }

}

// Хилер

class Healer extends Human
{
    public $attack;
    public $massHealt;

    public function __construct($name, $health) {
        parent::__construct($name, $health);
    }

    public function healerAttack(Human $target) {
        $target->health += $this->healerAttack;
        echo "{$this->name} иcцелила {$target->name} на {$this->healerAttack} здоровья <br>";
    }

}




//..................................Схватка........................................................

echo " <h2>Боевая схватка Грута и Священой жрицы против босса Конана: </h2>";


$human1 = new Human("Грут", 100);
$warrior1 = new Warrior("Конан", 500, 20, 40);
$healer1 = new Healer("Священная жрица", 60);


$warrior1->attack($human1);
$human1->health();
echo "Грут в гневе, он говорит: ";
$human1->sayName();
$human1->superattack = 60;
$human1->attack($warrior1);
$warrior1->health();
echo "Воин наносит ответный удар: <br> ";
$warrior1->attack($human1);
$human1->health();
$healer1->healerAttack = 20;
$healer1->healerAttack($human1);
$human1->health();

$warrior1->superattack($human1);
echo "А также вихрем попадает по {$healer1->name} <br>";
$warrior1->superattack($healer1);
$human1->health();
$healer1->health();
echo "$healer1->name применяет Массовый хилл <br>";
$healer1->healerAttack = 15;
$healer1->healerAttack($human1);
$healer1->healerAttack($healer1);
$human1->superattack = 80;
$human1->supeAttack($warrior1);
$warrior1->health();
echo "$warrior1->name не двигается <br>";
$human1->attack($warrior1);
$human1->attack($warrior1);
$human1->attack($warrior1);
$human1->attack($warrior1);
$warrior1->health();
echo "$warrior1->name распутался <br>";
$warrior1->superattack = 0;
$warrior1->superattack($human1);
$warrior1->superattack($healer1);
echo "{$human1->name} и {$healer1->name} увернулись от удара <br>";
$human1->health();
$healer1->health();
$human1->attack($warrior1);
$warrior1->health();
echo "$warrior1->name Побеждён";

var_dump($human1);
var_dump($warrior1);
var_dump($healer1);