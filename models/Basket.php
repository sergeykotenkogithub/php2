<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $goods_id;
    public $session_id;
    public $quantity;
    public $price;   //общая стоимость цены
    public $price_origin; // начальная стоимость цены

    protected function getTableName() {
        return 'basket';
    }
}