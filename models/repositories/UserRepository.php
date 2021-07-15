<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\User;
use app\engine\App;

class UserRepository extends Repository
{
    public function auth($login, $pass) {

        $user = $this->getOneWhere('login', $login);

        if (password_verify($pass, $user->pass )) {
            App::call()->session->set('login', $login);
            App::call()->session->set('id', $user->id);
            return true;
        } else {
            return false;
        }

    }

    public function isAuth() {

        if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
            $hash = App::call()->cookie->get("hash");
            $result = $this->getOneWhere('hash', $hash);
            if ($result) {
                $user = $result->login;
                if (!empty($user)) {
                    App::call()->session->set('login', $user);
                    return true;
                }
            }
        }

        $login = App::call()->session->get('login');
        return isset($login);

    }

    public function isAdmin() {

        $login = App::call()->session->get('login');
        return $this->getOneAndWhere('login', $login, 'role', 'admin');

    }

    public function getName() {

        return App::call()->session->get('login');

    }

    protected function getTableName() {
        return 'users';
    }

    protected function getEntityClass() {
        return User::class;
    }
}