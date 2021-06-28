<?php

namespace app\models;

use app\engine\Db;

final class Order extends DBModel
{
    protected $id;
    protected $hash;
    protected $email;
    protected $date;
    protected $user_id;
    protected $status;
    protected $total;

    protected $props = [
        'hash' => false,
        'email' => false,
        'date' => false,
        'user_id' => false,
        'status' => false,
        'total' => false,
    ];

    public static function getMyOrders(int $id) {
        $sql = "SELECT o.hash, g.name, o.id, b.quantity, g.image, b.price, o.status, o.total FROM orders o JOIN basket b on b.session_id = o.hash join goods g on g.id = b.goods_id WHERE o.users_id = {$id} ORDER BY o.id DESC";
        return Db::getInstance()->queryAllArray($sql);
    }

    //......................................................................................................

    public function __construct($hash = null, $email = null, $date = null, $user_id = null, $status = null, $total = null)
    {
        $this->hash = $hash;
        $this->email = $email;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->total = $total;
    }

    protected static function getTableName() {
        return 'orders';
    }
}