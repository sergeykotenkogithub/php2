<?php

//.................Нижний уровень для работы с запросами................................................................

namespace app\engine;
use app\interfaces\IDb;

final class Db implements IDb
{
    protected $config;

    protected $connection = null;

    public function __construct($driver = null, $host = null, $login = null, $password = null, $database = null, $charset = 'utf8')
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }

    //..........................Соеденение........................................................


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

    public function queryLimitAjax($sql, $before, $after) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(1, $before, \PDO::PARAM_INT); // 1 это замена ?, 2 будет указывать на второй ?
        $stmt->bindValue(2, $after, \PDO::PARAM_INT); // 1 это замена ?, 2 будет указывать на второй ?
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function queryLimitAjaxObject($sql, $before, $after, $class) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(1, $before, \PDO::PARAM_INT); // 1 это замена ?, 2 будет указывать на второй ?
        $stmt->bindValue(2, $after, \PDO::PARAM_INT); // 1 это замена ?, 2 будет указывать на второй ?
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , $class);
        return $stmt->fetchAll();
    }

    public function queryOneObject($sql, $params, $class) {
        $stmt = $this->query($sql, $params); //Statement - $stmt
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , $class);
        $obj = $stmt->fetch();
        return $obj;
    }

    public function queryOne($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $class, $params = [] ) {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE , $class);
        return $stmt->fetchAll();
    }

    public function queryAllArray($sql, $params = [] ) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    public function executeSql($sql, $params = []) {

        // UPDATE, INSERT, DELETE

//        var_dump($sql, $params);
//        die();

        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }

}