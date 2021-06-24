<?php

namespace app\models;

final class Basket extends DBModel
{
    protected $id;
//    protected $goods_id;
//    protected $session_id;
//    protected $quantity;
//    protected $price;   //общая стоимость цены
//    protected $price_origin;

    //.................Сетеры и гетеры....................................

//    public function setGoodsId($goods_id)
//    {
//        $this->goods_id = $goods_id;
//        $this->props['goods_id']['boolean'] = true;
//    }
//
//
//    public function setSessionId($session_id)
//    {
//        $this->session_id = $session_id;
//        $this->props['session_id']['boolean'] = true;
//    }
//
//
//    public function setQuantity($quantity)
//    {
//        $this->quantity = $quantity;
//        $this->props['quantity']['boolean'] = true;
//    }
//
//    public function setPrice($price): void
//    {
//        $this->price = $price;
//        $this->props['price']['boolean'] = true;
//    }
//
//    public function setPriceOrigin($price_origin)
//    {
//        $this->price_origin = $price_origin;
//        $this->props['price_origin']['boolean'] = true;
//    }


    public $props = [
        'goods_id' => [
            'value' => null,
            'boolean' => false
        ],
        'session_id' => [
            'value' => null,
            'boolean' => false
        ],
        'quantity' => [
            'value' => null,
            'boolean' => false
        ],
        'price' => [
            'value' => null,
            'boolean' => false
        ],
        'price_origin' => [
            'value' => null,
            'boolean' => false
        ]
    ];


    //...............................................................................................

    public function __construct($goods_id = null, $session_id = null, $quantity = null, $price = null, $price_origin = null)
    {
//        $this->goods_id = $goods_id;
//        $this->session_id = $session_id;
//        $this->quantity = $quantity;
//        $this->price = $price;
//        $this->price_origin = $price_origin;

        $this->props['goods_id']['value'] = $goods_id;
        $this->props['session_id']['value'] = $session_id;
        $this->props['quantity']['value'] = $quantity;
        $this->props['price']['value'] = $price;
        $this->props['price_origin']['value'] = $price_origin;

    }

    protected static function getTableName() {
        return 'basket';
    }
}