<?php


namespace app\controllers;


use app\models\Order;

class MyordersController extends Controller
{
    public function actionAll() {
        $id = $_GET['id'];
        $order = Order::getMyOrders($id);
        $count_orders = count(Order::getMyOrders($id)) + 1;
        echo $this->render('myorders', [
            'order' => $order,
            'count_orders' => $count_orders
        ]);
    }
}