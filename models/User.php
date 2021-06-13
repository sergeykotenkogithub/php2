<?php

namespace app\models;

class User extends Model
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;

    protected function getTableName() {
        return 'user';
    }
}