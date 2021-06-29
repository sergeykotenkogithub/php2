<?php

namespace app\models;

final class Product extends DBModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;

    //...............Сетеры и гетеры................................

    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false,
        'image' => false,
    ];

    //.....................................................................................


    public function __construct($name = null, $description = null, $price = null, $image = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    protected static function getTableName() {
        return 'goods';
    }
}