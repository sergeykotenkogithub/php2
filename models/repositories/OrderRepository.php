<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public static function getMyOrders(int $id) {
        $sql = "SELECT o.hash, g.name, o.id, b.quantity, g.image, b.price, o.status, o.total FROM orders o JOIN basket b on b.session_id = o.hash join goods g on g.id = b.goods_id WHERE o.users_id = {$id} ORDER BY o.id DESC";
        return App::call()->db->queryAllArray($sql);
    }

    public function getAllOrder() {
        $sql = "SELECT * FROM orders ORDER BY id DESC";
        return App::call()->db->queryAll($sql, $this->getEntityClass());
    }

    public function adminOrderStatus($id) {
        $sql = "SELECT id, status FROM orders WHERE id = {$id} ";
        return App::call()->db->queryOne($sql);
    }

    public function adminOrderItem($id) {
        $sql = "SELECT * FROM basket,orders,goods WHERE basket.session_id = orders.hash AND orders.id = '{$id}' AND basket.goods_id = goods.id";
        return App::call()->db->queryAllArray($sql);
    }

    protected function getEntityClass() {
        return Order::class;
    }

    public function getTableName() {
        return 'orders';
    }


}