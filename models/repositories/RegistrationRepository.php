<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\User;
use app\models\Repository;

class RegistrationRepository extends Repository
{
    public static function registration($login, $pass, $pass_hash, $check) {

        if (isset($login) && isset($pass)) {

            if ($check) {
                App::call()->session->set('message', 'Такой логин уже есть');
                header("Location:" . App::call()->config['backHttp']);
            }  else {
                App::call()->session->unset('message');

                // Тоже надо вводить role и hash иначе ошибка, ПОЧЕМУ?
                $user = new User($login, "$pass_hash", 'user',11);

                App::call()->userRepository->insert($user);
                $message = 'Поздравляю! Вы зарегистрировались.';
            }

        }

        return $message;

    }

    protected function getTableName() {
        return 'registration';
    }

    protected function getEntityClass() {}

}