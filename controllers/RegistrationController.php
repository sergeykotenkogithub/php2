<?php

namespace app\controllers;

use app\models\entities\Registration;
use app\models\entities\User;
use app\models\repositories\RegistrationRepository;
use app\models\repositories\UserRepository;

class RegistrationController extends Controller
{
    public function actionIndex() {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $pass_hash = password_hash($pass,PASSWORD_DEFAULT); // Создаёт хэшированный пароль
//        $check = User::getOneWhere('login', $login); // Проверка существует ли такой логин
        $check = (new UserRepository())->getOneWhere('login', $login); // Проверка существует ли такой логин
//        $message = Registration::registration($login, $pass, $pass_hash, $check); // Добавляет пользователя, возращает сообщение
//        $message = (new RegistrationRepository())->registration($login, $pass, $pass_hash, $check); // Добавляет пользователя, возращает сообщение
        $message = (new RegistrationRepository())->registration($login, $pass, $pass_hash, $check); // Добавляет пользователя, возращает сообщение
//          Registration::registration($login, $pass, $pass_hash, $check);

        echo $this->render('registration', [
            'message' => $message,
            'check' => $check,
            'login' => $login,
            'test' => 'тест'
        ]);
    }
}