<?php

namespace app\models;

class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;

    public function __construct($name = '', $description = '', $price = '', $image = '')
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    protected function getTableName() {
        return 'goods';
    }
}