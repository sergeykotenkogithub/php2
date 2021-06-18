<?php

namespace app\models;

class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;

    protected function getTableName() {
        return 'goods';
    }
}