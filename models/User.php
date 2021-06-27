<?php

namespace app\models;

final class User extends DBModel
{
    public $id;
    protected $login;
    protected $pass;
    protected $hash;

    //..................Сетеры и гетеры........................

    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false,
    ];

    //.................................................................

    public function __construct($login = null, $pass = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }

    protected static function getTableName() {
        return 'users';
    }

    public static function auth($login, $pass) {
        $user = User::getOneWhere('login', $login);
        if (password_verify($pass, $user->pass )) {
            $_SESSION['login'] = $login;
            return true;
        }
//        return true;
//        else {
//            die('Неверный логин или пароль');
//        }
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function isAdmin() {
        return $_SESSION['login'] == 'admin';
    }

    public static function getName() {
        return $_SESSION['login'];
    }
}