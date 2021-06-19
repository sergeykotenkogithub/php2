<?php

namespace app\interfaces;

interface IDb
{
    public function queryOne($sql);
    public function queryAll($sql);
    public function executeSql($sql, $params);
}