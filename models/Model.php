<?php


namespace app\models;
use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
       return $this->$name;
    }

    abstract protected function getTableName();

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getOne($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id={$id}";
        echo $this->db->queryOne($sql);
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        echo $this->db->queryAll($sql);
    }

    public function insert() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        echo $this->db->queryAll($sql);
    }

    public function update() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        echo $this->db->queryAll($sql);
    }

    public function delete() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        echo $this->db->queryAll($sql);
    }

}