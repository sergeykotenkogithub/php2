<?php

namespace app\controllers;

use app\models\repositories\RegistrationRepository;
use app\models\repositories\UserRepository;

class RegistrationController extends Controller
{
    public function actionIndex() {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $pass_hash = password_hash($pass,PASSWORD_DEFAULT); // Создаёт хэшированный пароль
        $check = (new UserRepository())->getOneWhere('login', $login); // Проверка существует ли такой логин
        $message = (new RegistrationRepository())->registration($login, $pass, $pass_hash, $check); // Добавляет пользователя, возращает сообщение

        echo $this->render('registration', [
            'message' => $message,
            'check' => $check,
            'login' => $login,
            'test' => 'тест'
        ]);
    }
}