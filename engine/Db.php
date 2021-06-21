<?php

//.................Нижний уровень для работы с запросами................................................................

namespace app\engine;
use app\interfaces\IDb;
use app\traits\TSingletone;
use http\Params;

class Db implements IDb
{
    protected $config = [
        'driver' => 'mysql',
        'host' => 'localhost:3307',
        'login' => 'pakko',
        'password' => '123',
        'database' => 'gallerybase',
        'charset' => 'utf8'
    ];

    //........................Патерн Сингтон.......................................................

    use TSingletone;

    //..........................Соеденение........................................................

    protected $connection = null;

    protected function getConnection() {
        if (is_null($this->connection)) {
            // \PDO - \ ставиться как глобальная, так как в пространстве имён нет PDO класса, а в глобальном есть
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    protected function prepareDsnString() {
        // return "mysql:host={$this->config['host']};dbname={$this->config['database']}";
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    //......................Запросы........................................

    // id последнего insert
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }

    private function query($sql, $params) {
        $stmt = $this->getConnection()->prepare($sql); // Запрос с :id например, а может и не плейсхолдера
        $stmt->execute($params);
        return $stmt;
    }

    public function queryLimit($sql, $limit, $class) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(1, $limit, \PDO::PARAM_INT); // 1 это замена ?, 2 будет указывать на второй ?
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , $class);
        return $stmt->fetchAll();
    }

    public function queryOneObject($sql, $params, $class) {
        //Statement - $stmt
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , $class);
        return $stmt->fetch();
    }

    public function queryOne($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $class, $params = [] ) {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , $class);
        return $stmt->fetchAll();
    }

    public function executeSql($sql, $params) {
        // UPDATE, INSERT, DELETE

        $stmt = $this->query($sql, $params);
        // $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , $class);
        return $stmt->rowCount();
    }

}