<?php


namespace app\controllers;


use app\engine\App;

class AdminController extends Controller
{

    //................Все заказы, всех пользователей.................................................

    public function actionIndex() {

        $isAdmin = App::call()->userRepository->isAdmin();
        $page = App::call()->request->getParams()['page'] ?? 3;
        $orderAll = App::call()->orderRepository->getLimitDesc($page * 2);

        echo $this->render('admin', [
            'isAdmin' => $isAdmin,
            'page' => ++$page,
            'orderAll' => $orderAll
        ]);
    }

    //............Показывает 1 заказ и возможность изменять статус заказа...............................

    public function actionAdminOrder() {

        //.................GET и POST................................

        $id = App::call()->request->getParams()['id']; // GET
        $status_id = App::call()->request->getParams()['status_id']; // POST
        $adminOrder = App::call()->request->getParams()['change']; // POST

        //................Проверка это админ или нет

        $isAdmin = App::call()->userRepository->isAdmin();

        //.................orderRepository...........................

        $status = App::call()->orderRepository->adminOrderStatus($id);
        $order_basket_goods = App::call()->orderRepository->adminOrderItem($id);
        $order = App::call()->orderRepository->getOne($id);

        //..................Обновление статуса......................

        if (isset($status_id) && isset($adminOrder)) {
            $order->status = $adminOrder;
            App::call()->orderRepository->update($order);
            header("Location: /admin/adminOrder/?id={$status_id}");
        }

        //...................Рендер.................................

        echo $this->render('adminOrder', [
            'isAdmin' => $isAdmin,
            'status' => $status,
            'order' => $order_basket_goods,
            'summ' => $order
        ]);
    }
}