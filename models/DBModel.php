<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
    //..........Получает название таблицы................

    abstract protected static function getTableName();

    //..............Запросы..........................................................................//


    //...................Один. id................................................

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    //...................Один. Где Значение равно...................................

    public static function getOneWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}` = :value";
        return Db::getInstance()->queryOneObject($sql, ['value' => $value], static::class);
    }

    //...................Один. Где Значение равно и другое значение равно...........

    public static function getOneAndWhere($name, $value, $name2, $value2) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}` = :value AND `{$name2}` = :value2";
        return Db::getInstance()->queryOneObject($sql, ['value' => $value, 'value2' => $value2], static::class);
    }


    //......................Все. Объект...............................................

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql, static::class);
    }

    //......................С ограниченим...............................................

    public static function getLimit($limit) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit, static::class);
    }

    //......................С ограниченим. Сколько показывать от ограничения............

    public static function getLimitAjax($before, $after) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?, ?";
        return Db::getInstance()->queryLimitAjax($sql,$before, $after);
    }

    //......................Вставка значения............................................

    public function insert() {

        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[":{$key}"] = $this->$key;
            $columns[] = $key;
        }
        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$value})";

        DB::getInstance()->executeSql($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    //......................Обновление значения............................................

    public function update() {

        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $this->$key;
            $columns[] = "`{$key}` = :{$key}";
            //$boolean для того чтобы поменять значение после запроса, если вдруг запрос не выполниться
            $boolean[$key] = $this->props[$key];
        }
        $columns = implode(", ", $columns);
        $tableName = static::getTableName();
        $params['id'] = $this->id;
        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE id = :id";

        // Меняется флаг с true на false
        foreach ($boolean as $key => $value) {
            $this->props[$key] = false;
        }

        Db::getInstance()->executeSql($sql, $params);
    }

    //......................Удаление значения............................................

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->executeSql($sql, ['id' => $this->id]);
    }

    //.................Автоматическое определение значения обновление или вставка........

    public function save() {
        if (is_null($this->id)) {
            return $this->insert();
        } else {
            return $this->update();
        }
        return $this;
    }

}