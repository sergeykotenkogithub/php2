<?php

namespace app\controllers;

use app\models\repositories\OrderRepository;

class MyordersController extends Controller
{
    public function actionAll() {
        $id = $_GET['id'];
        $order = (new OrderRepository())->getMyOrders($id);
        $count_orders = count((new OrderRepository())->getMyOrders($id)) + 1;
        echo $this->render('myorders', [
            'order' => $order,
            'count_orders' => $count_orders
        ]);
    }
}