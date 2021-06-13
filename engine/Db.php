<?php

// Нижний уровень для работы с запросами

namespace app\engine;

use app\interfaces\IDb;

class Db implements IDb
{
    public function queryOne($sql) {
        return $sql;
    }

    public function queryAll($sql) {
        return $sql;
    }

    public function executeSql($sql) {
        return $sql;
    }
}