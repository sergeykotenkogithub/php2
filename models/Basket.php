<?php

namespace app\models;

class Basket extends Model
{
    protected $id;
    protected $goods_id;
    protected $session_id;
    protected $quantity;
    protected $price;   //общая стоимость цены
    protected $price_origin; // начальная стоимость цены

    public function __construct($goods_id = '', $session_id = '', $quantity = '', $price = '', $price_origin = '')
    {
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->price_origin = $price_origin;
    }

    protected function getTableName() {
        return 'basket';
    }
}