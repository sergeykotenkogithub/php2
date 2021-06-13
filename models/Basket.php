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

    protected function getTableName() {
        return 'basket';
    }
}