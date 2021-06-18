<?php


namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{

    //...........Сетеры и Гетеры.......................

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
       return $this->$name;
    }

    //..........Получает название таблицы................

    abstract protected function getTableName();

    //..............Запросы..............................

    public function getOne($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        // return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }

//    public function insert() {
//        $sql = "SELECT * FROM {$this->getTableName()}";
//        return Db::getInstance()->queryAll($sql);
//    }

    public function insert() {
        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $myArray[] = $key;
            $myArray2[] = "'{$value}'";
        };

        $separated_key = implode(", ", $myArray);
        $separated_value = implode(", ", $myArray2);

        $sql = "INSERT INTO `{$this->getTableName()}`($separated_key) VALUES($separated_value)";

        $this->id = Db::getInstance()->lastInsertId();
        var_dump($sql);

        return Db::getInstance()->executeSql($sql, ['separated_valssue' => "ss"]);

    }

    public function update() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }
}