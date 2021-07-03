<?php


namespace app\controllers;


use app\models\entities\Order;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;

class AdminController extends Controller
{

    public function actionIndex() {

        $isAdmin = (new UserRepository())->isAdmin();
        $orderAll = (new OrderRepository())->getAllOrder();

        echo $this->render('admin', [
            'isAdmin' => $isAdmin,
            'orderAll' => $orderAll
        ]);
    }

    public function actionAdminOrder() {

        $id = (int)$_GET['id'];
        $isAdmin = (new UserRepository())->isAdmin();
        $status = (new OrderRepository())->adminOrderStatus($id);
        $status_id = (int)$_POST['status_id'];
        $order = (new OrderRepository())->adminOrderItem($id);
        $adminOrder = $_POST['change'];
        $summ = (new OrderRepository())->getOne($id);

        if (isset($_POST['status_id']) && isset($_POST['change'])) {
            $update = (new OrderRepository())->getOne($id);
            $update->status = $adminOrder;
            (new OrderRepository())->update($update);
            header("Location: /admin/adminOrder/?id=$status_id");
        }

//        $params['summ'] = adminOrderTotal($id);

        echo $this->render('adminOrder', [
            'isAdmin' => $isAdmin,
            'status' => $status,
            'order' => $order,
            'summ' => $summ
        ]);
    }
}