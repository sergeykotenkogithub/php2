<?php

namespace app\models;

final class Basket extends DBModel
{
    protected $id;
    protected $goods_id;
    protected $session_id;
    protected $quantity;
    protected $price;   //общая стоимость цены
    protected $price_origin; // начальная стоимость цены

    public function __construct($goods_id = null, $session_id = null, $quantity = null, $price = null, $price_origin = null)
    {
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->price_origin = $price_origin;
    }

    protected static function getTableName() {
        return 'basket';
    }
}