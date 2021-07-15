<?php

//
namespace app\models\entities;
use app\models\Model;
use app\models\repositories\UserRepository;


class Registration extends Model
{
    public static function registration($login, $pass, $pass_hash, $check) {
        if (isset($login) && isset($pass)) {
            if ($check) {
                $_SESSION['message'] = 'Такой логин уже есть';
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
            else {
                unset($_SESSION['message']);
                $user2 = new User($login, "$pass_hash");

//                (new UserRepository())->save($user);
                (new UserRepository())->insert($user2);
//                (new UserRepository())->insert($user);
                $message = 'Поздравляю! Вы зарегистрировались.';
            }
        }
        return $message;
    }
}