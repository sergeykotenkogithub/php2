<?php


namespace app\controllers;


class LoginController extends Controller
{
    public function actionEnter() {
        echo $this->render('login', [
            'noAuth' => $_SESSION['noAuth'],
            'noRegistration' => $_SESSION['message']
        ]);
    }
}