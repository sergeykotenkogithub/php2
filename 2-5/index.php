<?php

//............................................2 задание........................................................

/*
 2* Добавьте метод andWhere в класс Db, который обеспечит реализацию цепочеки:
echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get();
что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5
*/

class Db {
    protected $tableName;
    protected $wheres = [];


    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->tableName}";
        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
            foreach ($this->wheres as $value) {
                $sql .= $value['field'] . " = " . $value['value'];
                if ($value != end($this->wheres)) $sql .= " AND ";
            }
            $this->wheres = [];
        }


        return $sql . PHP_EOL;
    }

    public function getOne($id) {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id}" . PHP_EOL;
    }

    public function where($field, $value) {
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function andWhere($field, $value) {
        return $this->where($field, $value);
    }
}

$db = new Db();
echo $db->table('goods')->getAll();
echo $db->table('goods')->getOne(1);
echo $db->table('user')->where('name', 'admin')->getAll();
echo $db->table('users')->where('login', 'admin')->where('pass', 123)->getAll();
echo $db->table('goods')->where('name', 'чай')->andWhere('price', 12)->getAll();
echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->getAll();


//........................... Задание с 3-го по 5-е:............................................................


//..................................3 Задание.................................................

/*

3. Дан код. Что он выведет на каждом шаге? Почему?:

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

*/

// ..................... Ответ: 3 Задание..................................................


/*

Выведет 1, потом 2, далее 3 и 4
Так как x static то значение в классе будет сохранено для класса А.
++$x - это префиксный инкремент за счёт чего значение сразу прибавляется и получается на 1 больше

*/

//..................................4 Задание.................................................
/*
4. Объясните результаты в этом случае

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo()
*/

// ..................... Ответ: 4 Задание..................................................

/*
Будет 1122.
Так как static $x запоминает значение для класса А и получается вызывается от Класса А прибавляется на 1, а при вызове класса B считывается
статичная сохранённая переменная для класса А в которой содержится значение 1 и получается 11 и далее А вызывается и прибавляет значение на 1, получается 2, так как это А.
В конце класс B считывает статичную переменную для класса А в которой хранится значение 2.
 */

//..................................5 Задание.................................................

/*5. Дан код. Что он выведет на каждом шаге? Почему?:

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

*/

// ..................... Ответ: 5 Задание..................................................

/* Тоже самое что и в 6м только при вызове $a1 = new A; и $b1 = new B; нет скобок. Если нет параметров скобки можно не писать.
