<?php

namespace app\controllers;

use app\models\Registration;
use app\models\User;

class RegistrationController extends Controller
{
    public function actionIndex() {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $pass_hash = password_hash($pass,PASSWORD_DEFAULT); // Создаёт хэшированный пароль
        $check = User::getOneWhere('login', $login); // Проверка существует ли такой логин
        $message = Registration::registration($login, $pass, $pass_hash, $check); // Добавляет пользователя, возращает сообщение

        echo $this->render('registration', [
            'message' => $message,
            'check' => $check,
            'login' => $login
        ]);
    }
}