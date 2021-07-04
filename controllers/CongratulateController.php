<?php

namespace app\controllers;

use app\engine\Session;
use app\models\entities\Order;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrderRepository;

class CongratulateController extends Controller
{
    public function actionIndex() {

        $id = (new Session())->get('id');
        $session = (new Session())->getId();
        $tel = (int)$_POST['tel'];
        $email = $_POST['email'];
        $sum = (new BasketRepository())->countSum('price', 'session_id', $session);

        if (isset($tel) && isset($email)) {
                // Если пользователь зарегестрировался
                if(isset($id)) {
                    // Обязательно нужно указывать все поля ПОЧЕМУ?
                    // users_id, date и status же по умолчанию есть в значениях базы данных, раньше так не надо было писать.
                    $order = new Order($session, $tel, $email, $sum, $id, '2021-06-14', 'Ожидайте звонка');
                    (new OrderRepository())->insert($order);
                    (new Session())->regenerate();
                }
                // Если не зарегестрированный
                else {
                    $order = new Order($session, $tel, $email, $sum, 1, '2021-06-14', 'Ожидайте звонка');
                    (new OrderRepository())->insert($order);
                    (new Session())->regenerate();
                }

        }


        echo $this->render('congratulate');
    }
}