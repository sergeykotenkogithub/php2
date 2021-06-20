<?php


namespace app\models;


use app\engine\Db;

abstract class DBModel extends Model
{
    //..........Получает название таблицы................

    abstract protected static function getTableName();

    //..............Запросы..............................

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        // return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert() {

        foreach ($this->props as $key => $value) {
            if ($key == 'id') continue;
            $myArray[] = $key;
            $myArray2[] = ":{$key}";
            $full_params[$key] = $value['value'];

        };

        $separated_key = implode(", ", $myArray);
        $separated_value = implode(", ", $myArray2);
        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}`($separated_key) VALUES($separated_value)";

        Db::getInstance()->executeSql($sql, $full_params);
        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }

    public function update() {

        foreach ($this->props as $key => $value) {
            if ($key == 'id') continue;
            if ($value['boolean'] == true) {
                $set .= "{$key} = :{$key}, ";
                $full_params[$key] = $this->$key;
            }
        }

        $trimmedSet = rtrim($set, " ,"); // Избавляет от запятой и пробела в конце

        $tableName = static::getTableName();
        $sql = "UPDATE `{$tableName}` SET {$trimmedSet} WHERE id = {$this->id}";

        Db::getInstance()->executeSql($sql, $full_params);
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->executeSql($sql, ['id' => $this->id]);
    }

}