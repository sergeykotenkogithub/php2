<?php

namespace app\models;

class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;

    public function __construct($name = '', $description = '', $price = '')
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    protected function getTableName() {
        return 'goods';
    }
}