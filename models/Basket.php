<?php

namespace app\models;

use app\engine\Db;

final class Basket extends DBModel
{
    protected $id;
    protected $goods_id;
    protected $session_id;
    protected $quantity;
    protected $price;   //общая стоимость цены
    protected $price_origin;

    protected $props = [
        'goods_id' => false,
        'session_id' => false,
        'quantity' => false,
        'price' => false,
        'price_origin' => false,
    ];


    //...............................................................................................

    public function __construct($goods_id = null, $session_id = null, $quantity = null, $price = null, $price_origin = null)
    {
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->price_origin = $price_origin;
    }

    public static function getBasket() {
        $sql =  "SELECT basket.id as basket_id, goods.id as goods_id, goods.name as name, basket.price as price, basket.session_id as session_id, goods.image as image, basket.quantity FROM basket, goods WHERE basket.goods_id=goods.id AND session_id='d7gu0h0qcqro5852kmr432lm9bvifusg'";
//        return Db::getInstance()->queryAll($sql, static::class);
        return Db::getInstance()->queryAllArray($sql);
    }

    protected static function getTableName() {
        return 'basket';
    }


}