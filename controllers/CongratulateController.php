<?php

//.......................Страница с поздравлением покупки товара.......................................

namespace app\controllers;

use app\engine\App;
use app\models\entities\Order;

class CongratulateController extends Controller
{
    public function actionIndex() {

        $id = App::call()->session->get('id');
        $session = App::call()->session->getId();

        $tel = (int)App::call()->request->getParams()['tel']; // POST
        $email = App::call()->request->getParams()['email']; // POST

        $sum = App::call()->basketRepository->countSum('price', 'session_id', $session);

        if (isset($tel) && isset($email)) {

            // Если пользователь зарегистрировался

            if(isset($id)) {
                // Обязательно нужно указывать все поля ПОЧЕМУ?
                // users_id, date и status же по умолчанию есть в значениях базы данных.
                // Раньше так не надо было писать все параметры. Те что по умолчанию в базе данных автоматически учитывались.
                $order = new Order($session, $tel, $email, $sum, $id, '2021-06-14', 'Ожидайте звонка');
            }

            // Если не зарегестрированный

            else {
                $order = new Order($session, $tel, $email, $sum, 1, '2021-06-14', 'Ожидайте звонка');
            }

            //........Добавление товара в базу данных и обновление сессии чтобы корзина сбрасывалась....................

            App::call()->orderRepository->insert($order);
            App::call()->session->regenerate();

        }


        echo $this->render('congratulate');
    }
}