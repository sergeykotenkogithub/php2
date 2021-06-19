<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image;


    //...............Сетеры и гетеры................................

    public $props = [
        'name' => false,
        'description' => false,
        'price' => false,
        'image' => false,
    ];


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