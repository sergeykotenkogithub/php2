<?php

namespace app\models\repositories;

use app\models\entities\Registration;
use app\models\entities\User;
use app\models\Repository;
use app\models\repositories\UserRepository;

class RegistrationRepository extends Repository
{
    public function registration($login, $pass, $pass_hash, $check) {
        if (isset($login) && isset($pass)) {
            if ($check) {
                $_SESSION['message'] = 'Такой логин уже есть';
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
            else {
                unset($_SESSION['message']);
//                $user = new User($login, $pass_hash, 'NULLL', 'user');
                $user = new User($login, $pass_hash, 'user', 11);
//                (new UserRepository())->save($user);

//                (new UserRepository())->insert($user);
                (new UserRepository())->insert($user);

//                $update = (new UserRepository())->getOne(2);
//                $update->hash = 1221;
//                (new UserRepository())->insert($update); // Изменяет хэш

                $message = 'Поздравляю! Вы зарегистрировались.';
            }
        }
        return $message;
    }

    protected function getTableName() {
        return 'registration';
    }

    protected function getEntityClass() {
        return Registration::class;
    }
}