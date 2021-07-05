<?php


namespace app\controllers;


use app\engine\App;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;

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

        $id = App::call()->request->getParams()['id'];
        $isAdmin = App::call()->userRepository->isAdmin();
        $status = App::call()->orderRepository->adminOrderStatus($id);
        $status_id = App::call()->request->getParams()['status_id'];

        $order_basket_goods = App::call()->orderRepository->adminOrderItem($id);
        $adminOrder = $_POST['change'];
        $summ = App::call()->orderRepository->getOne($id);

        if (isset($_POST['status_id']) && isset($_POST['change'])) {
            $update = App::call()->orderRepository->getOne($id);
            $update->status = $adminOrder;
            (new OrderRepository())->update($update);
            header("Location: /admin/adminOrder/?id={$status_id}");
        }

        echo $this->render('adminOrder', [
            'isAdmin' => $isAdmin,
            'status' => $status,
            'order' => $order_basket_goods,
            'summ' => $summ
        ]);
    }
}