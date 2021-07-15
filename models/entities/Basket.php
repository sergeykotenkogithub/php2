<?php

namespace app\models\entities;
use app\models\Model;

final class Basket extends Model
{
    protected $id;
    protected $goods_id;
    protected $session_id;
    protected $price;   //общая стоимость цены
    protected $price_origin;
    protected $quantity;

    protected $props = [
        'goods_id' => false,
        'session_id' => false,
        'price' => false,
        'price_origin' => false,
        'quantity' => false,
    ];

    //...............................................................................................

    public function __construct($goods_id = null, $session_id = null, $price = null, $price_origin = null, $quantity = null)
    {
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->price_origin = $price_origin;
    }
}