<?php

//........................Форма регистрации и входа......................................

namespace app\controllers;

use app\engine\App;

class LoginController extends Controller
{
    //......Сообщение о том что "Такой логин уже есть" или "Неверный логин или пароль".........

    public function actionEnter() {

        echo $this->render('login', [
            'noAuth' => App::call()->session->get('noAuth'),
            'noRegistration' => App::call()->session->get('message'),
        ]);

    }

}