<?php


namespace app\models\repositories;


use app\engine\Db;
use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public static function getMyOrders(int $id) {
        $sql = "SELECT o.hash, g.name, o.id, b.quantity, g.image, b.price, o.status, o.total FROM orders o JOIN basket b on b.session_id = o.hash join goods g on g.id = b.goods_id WHERE o.users_id = {$id} ORDER BY o.id DESC";
        return Db::getInstance()->queryAllArray($sql);
    }

    protected function getTableName() {
        return 'orders';
    }

    protected function getEntityClass() {
        return Order::class;
    }
}