<?php

//................................Аторизация............................................................................

namespace app\controllers;

use app\engine\App;

class AuthController extends Controller
{
    public function actionLogin() {

        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];
        $save = App::call()->request->getParams()['save'];
        $auth = App::call()->userRepository->auth($login, $pass);


        if ($auth) {

          $id = App::call()->session->get('id');

          if ($save) {
              $hash = uniqid(rand(), true);
              $update = App::call()->userRepository->getOne($id);
              $update->hash = $hash;
              App::call()->userRepository->update($update); // Изменяет хэш
              App::call()->cookie->set('hash', $hash); // добавляет куку
          }

          // Если админ то перекидывает на страницу админ
          if( App::call()->userRepository->isAdmin()) {
              header("Location: /admin");
          }

            // Если пользователь то показывает, его заказы
          if( !App::call()->userRepository->isAdmin()) {
              header("Location: /myorders/all/?id={$id}"); // Сразу перебрасывает на заказы клиента
          }

          App::call()->session->unset('noAuth'); // разрушает сессию с выводом сообщения о неправильнои логине/пароле
          die();

        }  else {
            App::call()->session->set('noAuth', 'Неверный логин или пароль');
            $back = App::call()->config['backHttp'];
            header("Location:" . $back);
        }
    }

    //.......................Выход из аккаунта.............................................

    public function actionLogout() {
        App::call()->cookie->destroy("hash");
        App::call()->session->regenerate();
        App::call()->session->destroy();
        header("Location: /");
        die();
    }

}