<?php


namespace app\controllers;

use app\models\User;

class AuthController extends Controller
{
    public function actionLogin() {
        $login = $_POST['login'];
        $pass = $_POST['pass'];


        if (User::auth($login, $pass)) {
          if (isset($_POST['save'])) {
              $hash = uniqid(rand(), true);
              $update = User::getOne($_SESSION['id']);
              $update->hash = $hash;
              $update->save();
              setcookie("hash", $hash, time() +3600, "/");
          }
        $myId = $_SESSION['id'];
        header("Location: /myorders/all/?id=$myId"); // Сразу перебрасывает на заказы клиента
        unset($_SESSION['noAuth']); // разрушает сессию с выводом сообщения о неправильнои логине/пароле
        die();
        }  else {
            $_SESSION['noAuth'] = 'Неверный логин или пароль';
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function actionLogout() {
        setcookie("hash", "", time()-1, "/" );
        session_regenerate_id(); // чтобы корзина сбросилась
        session_destroy();
//        header("Location:" . $_SERVER['HTTP_REFERER']);
        header("Location: /");
        die();
    }
}