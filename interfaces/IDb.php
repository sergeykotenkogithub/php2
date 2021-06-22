<?php

namespace app\interfaces;

interface IDb
{
    public function queryOne($sql);
    public function queryAll($sql, $class, $params);
    public function executeSql($sql, $params);
}