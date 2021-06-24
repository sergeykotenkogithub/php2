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

    public static function getWhere($name, $value) {
            // Where 'login' = 'admin'
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql, static::class);
    }

    public static function getLimit($limit) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit, static::class);
    }

    public static function getLimitAjax($before, $after) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?, ?";
        return Db::getInstance()->queryLimitAjax($sql,$before, $after);
    }

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

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->executeSql($sql, ['id' => $this->id]);
    }

    public function save() {
        if (is_null($this->id)) {
            return $this->insert();
        } else {
            return $this->update();
        }
    }

}