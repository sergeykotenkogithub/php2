<?php

namespace app\models;

final class Product extends DBModel
{
//    public $id;
//    public $name;
//    public $description;
//    public $price;
//    public $image;

    //...............Сетеры и гетеры................................

    public function setName($name): void
    {
        $this->name = $name;
        $this->props['name'] = true;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
        $this->props['description'] = true;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
        $this->props['price'] = true;
    }

    public function setImage($image): void
    {
        $this->image = $image;
        $this->props['image'] = true;
    }


    public $props = [
        'name' => [
            'value' => null,
            'boolean' => false
        ],
        'description' => [
            'value' => null,
            'boolean' => false
        ],
        'price' => [
            'value' => null,
            'boolean' => false
        ],
        'image' => [
            'value' => null,
            'boolean' => false
        ],
    ];


    //.....................................................................................


    public function __construct($name = null, $description = null, $price = null, $image = null)
    {
//        $this->name = $name;
//        $this->description = $description;
//        $this->price = $price;
//        $this->image = $image;

        $this->props['name']['value'] = $name;
        $this->props['description']['value'] = $description;
        $this->props['price']['value'] = $price;
        $this->props['image']['value'] = $image;
    }

    protected static function getTableName() {
        return 'goods';
    }
}