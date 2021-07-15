<?php

//......................Все заказы пользователя..............................................

namespace app\controllers;

use app\engine\App;

class MyordersController extends Controller
{
    public function actionAll() {

        $id = App::call()->request->getParams()['id']; //GET
        $order = App::call()->orderRepository->getMyOrders($id);
        $count_orders = count(App::call()->orderRepository->getMyOrders($id)) + 1;

        echo $this->render('myorders', [
            'order' => $order,
            'count_orders' => $count_orders
        ]);

    }

}