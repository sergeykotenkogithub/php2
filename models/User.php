<?php

namespace app\models;

use app\engine\Session;

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
            (new Session())->set('login', $login);
            (new Session())->set('id', $user->id);
            return true;
        }
        else {
            return false;
        }
    }

    public static function isAuth() {
        if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
            $hash = $_COOKIE["hash"];
            $result = User::getOneWhere('hash', $hash);
            if ($result) {
                $user = $result->login;
                if (!empty($user)) {
                    (new Session())->set('login', $user);
//                    $_SESSION['login'] = $user;
                    return true;
                }
            }
        }
        $session = (new Session())->get('login');
        return isset($session);
    }

    public static function isAdmin() {
        $login = (new Session())->get('login');
        return User::getOneAndWhere('login', $login, 'role', 'admin');
    }

    public static function getName() {
        return (new Session())->get('login');;
    }
}