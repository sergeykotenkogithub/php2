<?php


namespace app\controllers;


use app\engine\Session;
use app\models\entities\Order;
use app\models\repositories\OrderRepository;

class CongratulateController extends Controller
{
    public function actionIndex() {

        $id = (new Session())->get('id');
        $session = (new Session())->getId();
        $tel = $_POST['tel'];
        $email = $_POST['email'];
//        var_dump($tel, $email, $session, $id);
        if (isset($tel) && isset($email)) {

            $order = new Order($session, $tel, $email, 650 );

            (new OrderRepository())->insert($order);

        }

        echo $this->render('congratulate');
    }
}