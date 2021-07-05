<?php

//.................................Регистрация........................................................................


namespace app\controllers;

use app\engine\App;

class RegistrationController extends Controller
{
    public function actionIndex() {

        $login = App::call()->request->getParams()['login']; // POST
        $pass = App::call()->request->getParams()['pass']; // POST
        $pass_hash = password_hash($pass,PASSWORD_DEFAULT); // Создаёт хэшированный пароль
        $check = App::call()->userRepository->getOneWhere('login', $login); // Проверка существует ли такой логин
        $message = App::call()->registrationRepository->registration($login, $pass, $pass_hash, $check); // Добавляет пользователя, возращает сообщение

        echo $this->render('registration', [
            'message' => $message,
            'check' => $check,
            'login' => $login
        ]);
    }
}