<?php


namespace app\models;


class Registration
{
    public static function registration($login, $pass, $pass_hash, $check) {
        if (isset($login) && isset($pass)) {
            if ($check) {
                $_SESSION['message'] = 'Такой логин уже есть';
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
            else {
                unset($_SESSION['message']);
                (new User($login,$pass_hash))->save();
                $message = 'Поздравляю! Вы зарегистрировались. ';
            }
        }
        return $message;
    }
}