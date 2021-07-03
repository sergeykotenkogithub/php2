<?php


namespace app\controllers;

use app\engine\Cookie;
use app\engine\Request;
use app\engine\Session;
use app\models\repositories\UserRepository;
use app\models\entities\User;

class AuthController extends Controller
{
    public function actionLogin() {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];

        if ((new UserRepository())->auth($login, $pass)) {
          if (isset($_POST['save'])) {
              $hash = uniqid(rand(), true);
              $update = (new UserRepository())->getOne($_SESSION['id']);
              $update->hash = $hash;
              (new UserRepository())->update($update); // Изменяет хэш
//              (new UserRepository())->insert($update); // Изменяет хэш
              (new Cookie())->set('hash', $hash); // добавляет куку
          }
        $myId = (new Session())->get('id');
        header("Location: /myorders/all/?id={$myId}"); // Сразу перебрасывает на заказы клиента
        (new Session())->unset('noAuth'); // разрушает сессию с выводом сообщения о неправильнои логине/пароле
        die();
        }  else {
            (new Session())->set('noAuth', 'Неверный логин или пароль');
            header("Location:" . $_SERVER['HTTP_REFERER']);
        }
    }

    //.......................Вызод из аккаунта.............................................

    public function actionLogout() {
        (new Cookie())->destroy("hash"); // удаление куки
        (new Session())->regenerate(); // чтобы корзина сбросилась
        (new Session())->destroy(); // удаление сессии
        header("Location: /");
        die();
    }
}