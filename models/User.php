<?php

namespace app\models;

class User extends Model
{
    public $id;
    protected $login;
    protected $pass;
    protected $hash;

    public function __construct($login = null, $pass = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }

    protected static function getTableName() {
        return 'users';
    }
}