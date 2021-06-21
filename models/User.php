<?php

namespace app\models;

final class User extends DBModel
{
//    public $id;
//    protected $login;
//    protected $pass;
//    protected $hash;

    //..................Сетеры и гетеры........................

    public function setLogin($login): void
    {
        $this->login = $login;
        $this->props['login'] = true;
    }

     public function setPass($pass): void
    {
        $this->pass = $pass;
        $this->props['pass'] = true;
    }

    public function setHash($hash): void
    {
        $this->hash = $hash;
        $this->props['hash'] = true;
    }

    public $props = [
        'login' => [
            'value' => null,
            'boolean' => false
        ],
        'pass' => [
            'value' => null,
            'boolean' => false
        ],
        'hash' => [
            'value' => null,
            'boolean' => false
        ]
    ];

    //.................................................................

    public function __construct($login = null, $pass = null, $hash = null)
    {
//        $this->login = $login;
//        $this->pass = $pass;
//        $this->hash = $hash;

        $this->props['login']['value'] = $login;
        $this->props['pass']['value'] = $pass;
        $this->props['hash']['value'] = $hash;
    }

    protected static function getTableName() {
        return 'users';
    }
}