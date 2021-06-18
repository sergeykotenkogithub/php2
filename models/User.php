<?php

namespace app\models;

class User extends Model
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;

    public function __construct($login = '', $pass = '', $hash = '')
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }

    protected function getTableName() {
        return 'users';
    }
}