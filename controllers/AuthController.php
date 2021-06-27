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
              $id = $_SESSION['id'];
              $sql = "UPDATE users SET hash = '{$hash}' WHERE id = {$id}";
              $result = mysqli_query(getDb(), $sql);
              $result2 = mysqli_query(getDb(), "SELECT * FROM users WHERE login = '{$login}' AND id = 1");
              $row = mysqli_fetch_assoc($result2);
              if ($row)   {
                  setcookie("adminhash", $hash, time() +3600, "/");
              }
              else {
                  setcookie("hash", $hash, time() +3600, "/");
              }
              header("Location: /");
              die();
          }

        header("Location:" . $_SERVER['HTTP_REFERER']);
        unset($_SESSION['noauth']); // разрушает сессию с выводом сообщения о неправильнои логине/пароле
        die();
        }  else {
            $_SESSION['noauth'] = 'Неверный логин или пароль';
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    public function actionLogout() {
        session_regenerate_id(); // чтобы корзина сбросилась
        session_destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die();
    }
}