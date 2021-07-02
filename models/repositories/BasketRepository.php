<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{

    public function getBasket($session) {
        $sql =  "SELECT basket.id as basket_id, goods.id as goods_id, goods.name as name, basket.price as price, basket.session_id as session_id, goods.image as image, basket.quantity FROM basket, goods WHERE basket.goods_id=goods.id AND session_id='{$session}'";
        return Db::getInstance()->queryAllArray($sql);
    }

    protected function getTableName() {
        return 'basket';
    }

    protected function getEntityClass() {
        return Basket::class;
    }
}