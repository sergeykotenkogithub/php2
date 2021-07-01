<?php

namespace app\models\repositories;

use app\engine\Session;
use app\models\Repository;
use app\models\User;

class UserRepository extends Repository
{
    public function auth($login, $pass) {
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

    public function isAuth() {
        if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
            $hash = $_COOKIE["hash"];
            $result = User::getOneWhere('hash', $hash);
            if ($result) {
                $user = $result->login;
                if (!empty($user)) {
                    (new Session())->set('login', $user);
                    return true;
                }
            }
        }
        $session = (new Session())->get('login');
        return isset($session);
    }

    public function isAdmin() {
        $login = (new Session())->get('login');
//        return User::getOneAndWhere('login', $login, 'role', 'admin');
        return $this->getOneAndWhere('login', $login, 'role', 'admin');
    }

    public function getName() {
        return (new Session())->get('login');;
    }

    protected function getTableName() {
        return 'users';
    }

    protected function getEntityClass() {
        return User::class;
    }
}