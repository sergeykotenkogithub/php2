<?php

namespace app\models;

use app\engine\App;

abstract class Repository
{
    //..........Получает название таблицы................

    abstract protected function getTableName();
    abstract protected function getEntityClass();

    //..............Запросы..........................................................................//


            //...................Один. id................................................//

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryOneObject($sql, ['id' => $id], $this->getEntityClass());
    }

            //...................Один. Где Значение равно...................................//

    public function getOneWhere($name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}` = :value";
        return App::call()->db->queryOneObject($sql, ['value' => $value], $this->getEntityClass());
    }

            //...................Один. Где Значение равно и другое значение равно...........//

    public function getOneAndWhere($name, $value, $name2, $value2) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}` = :value AND `{$name2}` = :value2";
        return App::call()->db->queryOneObject($sql, ['value' => $value, 'value2' => $value2], $this->getEntityClass());
    }


            //......................Все. Объект...............................................//

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql, $this->getEntityClass());
    }

            //......................С ограниченим...............................................//

    public function getLimit($limit) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return App::call()->db->queryLimit($sql, $limit, $this->getEntityClass());
    }

    public function getLimitDesc($limit) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY id DESC LIMIT 0, ? ";
        return App::call()->db->queryLimit($sql, $limit, $this->getEntityClass());
    }

            //......................С ограниченим. Сколько показывать от ограничения............//

    public function getLimitAjax($before, $after) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?, ?";
        return App::call()->db->queryLimitAjax($sql,$before, $after);
    }
    public function getLimitAjaxObject($before, $after) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?, ?";
        return App::call()->db->queryLimitAjaxObject($sql,$before, $after, $this->getEntityClass());
    }

    public function getLimitAjaxDesc($before, $after) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY id DESC LIMIT ?, ?" ;
        return App::call()->db->queryLimitAjax($sql,$before, $after);
    }

            //...................... Cумма. С условием .........................................//

    public function countSum($sum, $table ,$value) {
        $tableName = $this->getTableName();
//        $sql = "SELECT sum($sum) as `count` FROM {$tableName} WHERE '{$table}' = :value ";
        $sql = "SELECT sum($sum) as `count` FROM {$tableName} WHERE `{$table}` =  '$value'";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

            //......................Вставка значения............................................//

    public function insert(Model $entity) {

        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = $key;
        }
        $columns = implode(', ', $columns);
        $value = implode(', ', array_keys($params));
        $tableName = $this->getTableName();

        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$value})";

        App::call()->db->executeSql($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
    }

            //......................Обновление значения...........................................//

    public function update(Model $entity) {

        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {
            if (!$value) continue;
            $params["{$key}"] = $entity->$key;
            $columns[] = "`{$key}` = :{$key}";
            //$boolean для того чтобы поменять значение после запроса, если вдруг запрос не выполниться
            $boolean[$key] = $entity->props[$key];
        }
        $columns = implode(", ", $columns);
        $tableName = $this->getTableName();
        $params['id'] = $entity->id;
        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE id = :id";

        // Меняется флаг с true на false
        foreach ($boolean as $key => $value) {
            $entity->props[$key] = false;
        }

        App::call()->db->executeSql($sql, $params);
    }

    //......................Удаление значения............................................

    public function delete(Model $entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->executeSql($sql, ['id' => $entity->id]);
    }

    //.................Автоматическое определение значения обновление или вставка........

    public function save(Model $entity) {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }

}